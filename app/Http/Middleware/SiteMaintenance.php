<?php

namespace App\Http\Middleware;

use App\Models\Setting;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Cookie;

/**
 * Maintenance mode, switched on in Admin > Site Settings.
 *
 * Visitors get a "back soon" page with status 503, which tells Google the
 * break is temporary. The admin panel keeps working. Admins can still see the
 * public site through the preview cookie (Site Settings > Preview the site).
 *
 * Public pages run without sessions, so the preview cookie is a plain signed
 * value (not encrypted, see EncryptCookies) that changes every time
 * maintenance mode is switched on.
 */
class SiteMaintenance
{
    public const PREVIEW_COOKIE = 'fu_preview';

    public function handle(Request $request, Closure $next)
    {
        if (!Setting::enabled('maintenance_enabled')) {
            return $next($request);
        }

        if (self::canPreview($request)) {
            $response = $next($request);
            // The real page, for this admin only: no shared caching.
            $response->headers->set('Cache-Control', 'private, no-store');
            $response->headers->set('X-Robots-Tag', 'noindex');

            return $response;
        }

        return response()
            ->view('errors.site-maintenance', [
                'message' => Setting::get('maintenance_message'),
            ], 503)
            ->header('Retry-After', '3600')
            ->header('Cache-Control', 'no-store');
    }

    public static function canPreview(Request $request): bool
    {
        $cookie = $request->cookies->get(self::PREVIEW_COOKIE);

        return is_string($cookie) && self::previewValue() !== '' && hash_equals(self::previewValue(), $cookie);
    }

    public static function previewValue(): string
    {
        $token = (string) Setting::get('maintenance_token', '');

        return $token === '' ? '' : hash_hmac('sha256', 'preview|' . $token, (string) config('app.key'));
    }

    public static function previewCookie(): Cookie
    {
        return Cookie::create(
            self::PREVIEW_COOKIE,
            self::previewValue(),
            now()->addHours(12),
            '/',
            config('session.domain'),
            config('session.secure'),
            true,
            false,
            'lax'
        );
    }
}
