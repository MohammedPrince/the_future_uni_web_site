<?php

namespace App\Http\Controllers;

use App\Http\Middleware\PageCache;
use Illuminate\Container\Container;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Symfony\Component\Console\Output\BufferedOutput;

/**
 * Admin page with the maintenance commands that are needed on the server.
 *
 * Safety rules:
 *  - Admin login plus the admin's own password again; locks after 15 minutes.
 *  - Only the commands listed in TOOLS can run. No user input reaches a command.
 *  - POST with CSRF only, one at a time, and every run is written to
 *    storage/logs/server-tools.log.
 *  - Nothing here can drop tables or roll back (no migrate:fresh, reset, wipe).
 */
class ServerToolsController extends Controller
{
    private const UNLOCK_TTL = 900; // seconds
    private const SESSION_KEY = 'server_tools_unlocked';

    /** key => [title, what it does, button style, commands] */
    private const TOOLS = [
        'optimize' => ['Optimize', 'Rebuilds the configuration, route and view caches so pages open faster. Use after a deployment.', 'primary', [
            ['config:cache', []], ['route:cache', []], ['view:cache', []],
        ]],
        'clear' => ['Clear all caches', 'Clears configuration, routes, views, application cache and saved pages. Use when a change does not show. Run Optimize afterwards.', 'warning', [
            ['optimize:clear', []],
        ]],
        'pages' => ['Clear saved pages', 'Removes only the saved copies of public pages. They are rebuilt on the next visit.', 'secondary', []],
        'images' => ['Compress uploaded images', 'Makes small WebP copies of images uploaded in the admin panel. Originals are kept.', 'secondary', [
            ['media:webp', ['folder' => 'storage']],
        ]],
        'opcache' => ['Reset PHP OPcache', 'Makes PHP read changed code files again.', 'secondary', []],
        'migrate_status' => ['Migration status', 'Lists database migrations that ran or are pending. Changes nothing.', 'secondary', [
            ['migrate:status', []],
        ]],
        'migrate_preview' => ['Preview migration', 'Shows the SQL that Migrate would run. Changes nothing.', 'secondary', [
            ['migrate', ['--pretend' => true, '--force' => true]],
        ]],
        'migrate' => ['Migrate', 'Updates the live database structure. Back up the database first.', 'danger', [
            ['migrate', ['--force' => true]],
        ]],
    ];

    public function index(Request $request)
    {
        $unlocked = $this->isUnlocked($request);

        return view('admin.server_tools', [
            'locked' => !$unlocked,
            'tools' => self::TOOLS,
            'info' => $unlocked ? $this->info() : [],
            'result' => $unlocked ? $request->session()->get('tool_result') : null,
        ]);
    }

    public function unlock(Request $request)
    {
        $request->validate(['password' => ['required', 'string', 'max:200']]);

        if (!Hash::check($request->input('password'), $request->user()->password)) {
            $this->audit('unlock FAILED', [], $request);

            return redirect()->route('tools.index')->with('failure', 'Wrong password.');
        }

        $request->session()->put(self::SESSION_KEY, ['user' => $request->user()->id, 'at' => time()]);
        $this->audit('unlock ok', [], $request);

        return redirect()->route('tools.index');
    }

    public function lock(Request $request)
    {
        $request->session()->forget(self::SESSION_KEY);

        return redirect()->route('tools.index');
    }

    public function run(Request $request)
    {
        if (!$this->isUnlocked($request)) {
            return redirect()->route('tools.index')->with('failure', 'Server tools are locked. Enter your password again.');
        }

        $data = $request->validate([
            'tool' => ['required', 'string', 'in:' . implode(',', array_keys(self::TOOLS))],
            'backup_done' => ['accepted_if:tool,migrate'],
        ], [
            'backup_done.accepted_if' => 'Tick the backup box before running Migrate.',
        ]);

        $tool = $data['tool'];

        // Only one tool at a time, also across several admins.
        $lock = Cache::store('pages')->lock('server-tools', 300);
        if (!$lock->get()) {
            return redirect()->route('tools.index')->with('failure', 'Another server tool is still running. Try again in a moment.');
        }

        @set_time_limit(300);
        @ignore_user_abort(true);
        $start = microtime(true);
        $ok = true;

        try {
            [$ok, $output] = $this->execute($tool);
        } catch (\Throwable $e) {
            report($e);
            $ok = false;
            $output = class_basename($e) . ': ' . $e->getMessage();
        } finally {
            rescue(fn () => $lock->release());
        }

        $seconds = round(microtime(true) - $start, 1);
        $this->audit('run ' . $tool, ['ok' => $ok, 'seconds' => $seconds], $request);

        return redirect()->route('tools.index')
            ->with($ok ? 'success' : 'failure', self::TOOLS[$tool][0] . ($ok ? ' finished.' : ' failed. See the result below.'))
            ->with('tool_result', [
                'title' => self::TOOLS[$tool][0],
                'ok' => $ok,
                'seconds' => $seconds,
                'output' => Str::limit(trim($output) ?: 'Done.', 20000),
            ]);
    }

    private function execute(string $tool): array
    {
        if ($tool === 'pages') {
            PageCache::clear();

            return [true, 'Saved pages cleared.'];
        }

        if ($tool === 'opcache') {
            if (!function_exists('opcache_reset')) {
                return [false, 'OPcache is not enabled on this server. Ask the hosting provider to enable it.'];
            }

            return opcache_reset()
                ? [true, 'OPcache reset.']
                : [false, 'OPcache could not be reset (disabled or restricted by the server).'];
        }

        // config:cache and route:cache start a second application and make it the
        // current one. Put ours back, or the rest of this request loses its session.
        $app = app();
        $ok = true;
        $output = '';
        foreach (self::TOOLS[$tool][3] as [$command, $arguments]) {
            $buffer = new BufferedOutput();
            try {
                $code = $app->make(Kernel::class)->call($command, $arguments, $buffer);
            } finally {
                Container::setInstance($app);
                Facade::clearResolvedInstances();
                Facade::setFacadeApplication($app);
            }
            $output .= '> php artisan ' . $command . "\n" . $this->plain($buffer->fetch()) . "\n";
            if ($code !== 0) {
                $ok = false;
                break;
            }
        }

        if (in_array($tool, ['optimize', 'clear', 'migrate', 'images'], true)) {
            PageCache::clear();
        }

        return [$ok, $output];
    }

    /** Console output without colour codes and long dotted lines. */
    private function plain(string $text): string
    {
        $text = preg_replace('/\e\[[0-9;]*m/', '', $text);
        $text = preg_replace('/\.{6,}/', ' ... ', $text);

        return trim(preg_replace("/\n{3,}/", "\n\n", $text));
    }

    private function info(): array
    {
        $size = fn ($bytes) => $bytes === false || $bytes === null ? 'unknown' : round($bytes / 1073741824, 1) . ' GB';
        $pending = rescue(fn () => $this->pendingMigrations(), null, false);
        $opcache = function_exists('opcache_get_status') ? @opcache_get_status(false) : false;

        // label => [value, is it as it should be on the live site]
        return [
            'Environment' => [app()->environment(), app()->environment('production')],
            'Debug mode' => [config('app.debug') ? 'On' : 'Off', !config('app.debug')],
            'Laravel' => [app()->version(), null],
            'PHP' => [PHP_VERSION, null],
            'Database' => [rescue(fn () => DB::select('select version() as v')[0]->v, 'not reachable', false), null],
            'Configuration cache' => [app()->configurationIsCached() ? 'On' : 'Off', app()->configurationIsCached()],
            'Route cache' => [app()->routesAreCached() ? 'On' : 'Off', app()->routesAreCached()],
            'Saved pages' => [config('seo.page_cache') ? 'On' : 'Off', (bool) config('seo.page_cache')],
            'OPcache' => [$opcache ? 'On' : 'Off or restricted', (bool) $opcache],
            'WebP images' => [function_exists('imagewebp') ? 'Supported' : 'Not supported', function_exists('imagewebp')],
            'Pending migrations' => [$pending === null ? 'unknown' : (string) count($pending), $pending === null ? null : $pending === []],
            'Free disk space' => [$size(@disk_free_space(base_path())), null],
            'Storage folder' => [is_writable(storage_path('framework/cache')) ? 'Writable' : 'Not writable', is_writable(storage_path('framework/cache'))],
        ];
    }

    private function pendingMigrations(): array
    {
        $migrator = app('migrator');
        $files = array_keys($migrator->getMigrationFiles(database_path('migrations')));

        return array_values(array_diff($files, $migrator->getRepository()->getRan()));
    }

    private function isUnlocked(Request $request): bool
    {
        $state = (array) $request->session()->get(self::SESSION_KEY, []);

        return ($state['user'] ?? null) === $request->user()->id
            && time() - (int) ($state['at'] ?? 0) < self::UNLOCK_TTL;
    }

    private function audit(string $action, array $context, Request $request): void
    {
        rescue(fn () => Log::build(['driver' => 'single', 'path' => storage_path('logs/server-tools.log')])
            ->warning($action, $context + [
                'user' => $request->user()->username,
                'ip' => $request->ip(),
            ]));
    }
}
