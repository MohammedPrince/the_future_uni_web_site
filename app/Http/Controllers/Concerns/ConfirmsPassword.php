<?php

namespace App\Http\Controllers\Concerns;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

/**
 * For admin pages that can do serious damage: the admin types their own
 * password again, and the page locks again after UNLOCK_TTL seconds.
 * The using class defines UNLOCK_SESSION_KEY and AUDIT_LOG constants.
 */
trait ConfirmsPassword
{
    protected int $unlockTtl = 900; // 15 minutes

    protected function isUnlocked(Request $request): bool
    {
        $state = $request->session()->get(static::UNLOCK_SESSION_KEY);

        return is_array($state)
            && ($state['user'] ?? null) === optional($request->user())->id
            && time() - (int) ($state['at'] ?? 0) < $this->unlockTtl;
    }

    /** True when the password is right; the page is then unlocked. */
    protected function tryUnlock(Request $request): bool
    {
        $request->validate(['password' => ['required', 'string', 'max:200']]);

        if (!Hash::check($request->input('password'), (string) $request->user()->password)) {
            $this->audit('unlock FAILED', [], $request);

            return false;
        }

        $request->session()->put(static::UNLOCK_SESSION_KEY, ['user' => $request->user()->id, 'at' => time()]);
        $this->audit('unlock ok', [], $request);

        return true;
    }

    protected function lockPage(Request $request): void
    {
        $request->session()->forget(static::UNLOCK_SESSION_KEY);
    }

    protected function audit(string $action, array $items, Request $request): void
    {
        $line = sprintf(
            "[%s] %s by %s (%s)%s\n",
            now()->toDateTimeString(),
            $action,
            optional($request->user())->username ?? '?',
            $request->ip(),
            $items ? ': ' . implode(', ', $items) : ''
        );
        rescue(fn () => File::append(storage_path('logs/' . static::AUDIT_LOG), $line), null, false);
        rescue(fn () => Log::info('[' . static::AUDIT_LOG . '] ' . trim($line)), null, false);
    }
}
