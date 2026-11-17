<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

/**
 * Admin-only incident-response page: finds injected files, quarantines them,
 * restores the front controller and kicks other sessions/accounts out.
 *
 * Safety rules:
 *  - Disabled (404) unless config('app.security_scanner_key') is >= 24 chars.
 *  - Requires admin login AND the key, re-locks after 30 minutes.
 *  - Only files listed by the last scan can be quarantined; files are MOVED
 *    (never deleted) to storage/app/security-quarantine and renamed so they
 *    cannot execute.
 *  - No user input ever reaches a shell. The only shell commands are fixed,
 *    read-only ones (crontab -l, ps).
 */
class SecurityScanController extends Controller
{
    private const UNLOCK_TTL = 1800;          // seconds
    private const MAX_FINDINGS = 600;
    private const MAX_FILES = 600000;
    private const MAX_READ_BYTES = 2000000;

    /** Directory names skipped anywhere in the tree. */
    private const SKIP_DIRS = ['.git', 'node_modules', 'vendor', 'security-quarantine'];

    /** Directories skipped only directly under the cPanel home directory. */
    private const SKIP_HOME_DIRS = [
        'mail', 'etc', 'ssl', 'logs', 'access-logs', 'tmp', '.cpanel', '.trash', '.cagefs',
        '.spamassassin', '.npm', '.cache', '.composer', '.subaccounts', '.cphorde', '.razor',
        '.softaculous', 'perl5', '.cl.selector', 'lscache',
    ];

    private const PHP_EXT = ['php', 'php3', 'php4', 'php5', 'php7', 'php8', 'phtml', 'phar', 'pht', 'phps', 'inc'];
    private const TEXT_EXT = ['html', 'htm', 'js', 'txt', 'xml'];

    /** Folders where a PHP file should never exist. */
    private const UPLOAD_MARKERS = [
        '/storage/app/public/', '/public/storage/', '/uploads/', '/wp-content/uploads/',
        '/images/', '/img/', '/assets/', '/media/', '/files/',
    ];

    /** Webshell / backdoor patterns (PHP files). */
    private const PHP_SIGNATURES = [
        'eval of obfuscated/user input' => '~\beval\s*\(\s*@?\s*(?:base64_decode|gzinflate|gzuncompress|gzdecode|str_rot13|strrev|rawurldecode|hex2bin|\$_(?:POST|GET|REQUEST|COOKIE|SERVER|FILES))~i',
        'assert of user input'          => '~\bassert\s*\(\s*@?\s*\$_(?:POST|GET|REQUEST|COOKIE)~i',
        'command exec of user input'    => '~\b(?:shell_exec|passthru|system|exec|popen|proc_open|pcntl_exec)\s*\(\s*@?\s*\$_(?:POST|GET|REQUEST|COOKIE|SERVER)~i',
        'include of user input'         => '~\b(?:include|require)(?:_once)?\s*\(?\s*@?\s*\$_(?:POST|GET|REQUEST|COOKIE)~i',
        'user input called as function' => '~\$_(?:POST|GET|REQUEST|COOKIE)\s*\[[^\]]{1,40}\]\s*\(~',
        'file write of user input'      => '~\b(?:file_put_contents|fwrite|fputs)\s*\([^;]{0,200}\$_(?:POST|GET|REQUEST|COOKIE)~i',
        'raw upload handler'            => '~\bmove_uploaded_file\s*\(\s*\$_FILES~i',
        'preg_replace /e'               => '~preg_replace\s*\(\s*([\'"]).{1,200}/[a-df-z]*e[a-z]*\1~i',
        'create_function'               => '~\bcreate_function\s*\(~i',
        'long base64 payload'           => '~base64_decode\s*\(\s*[\'"][A-Za-z0-9+/=\r\n]{300,}~',
        'long hex payload'              => '~(?:\\\\x[0-9a-fA-F]{2}){40,}~',
        'chr() chain obfuscation'       => '~(?:chr\s*\(\s*\d+\s*\)\s*\.\s*){12,}~i',
        'known webshell name'           => '~(?:FilesMan|b374k|c99shell|r57shell|IndoXploit|AlfaTeam|wso_version|WSOsetcookie|Mini\s?Shell|marijuana\s?shell|\$auth_pass\s*=)~i',
    ];

    /** Text from this specific injection (any text file). */
    private const SPAM_SIGNATURE = '~CUMI787|slot\s*gacor|anak-desa\.xyz|dataklmsad|gambarlp\.com|littleprettyqueent|situs\s+slot|judi\s+slot~i';

    /** Suspicious .htaccess directives. */
    private const HTACCESS_SIGNATURE = '~auto_(?:prepend|append)_file|SetHandler|AddHandler|AddType\s+application/x-httpd|php_value|php_flag\s+engine|RewriteRule[^\n]*https?://(?!(?:[a-z0-9-]+\.)*fu\.edu\.sd)|ErrorDocument[^\n]*https?://(?!(?:[a-z0-9-]+\.)*fu\.edu\.sd)~i';

    /** Known-good front controllers (from git). */
    private const GOOD_ROOT_INDEX = <<<'PHP'
<?php

/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylor@laravel.com>
 */

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

// This file allows us to emulate Apache's "mod_rewrite" functionality from the
// built-in PHP web server. This provides a convenient way to test a Laravel
// application without having installed a "real" web server software here.
if ($uri !== '/' && file_exists(__DIR__.'/public'.$uri)) {
    return false;
}

require_once __DIR__.'/public/index.php';
PHP;

    private const GOOD_PUBLIC_INDEX = <<<'PHP'
<?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Check If The Application Is Under Maintenance
|--------------------------------------------------------------------------
|
| If the application is in maintenance / demo mode via the "down" command
| we will load this file so that any pre-rendered content can be shown
| instead of starting the framework, which could cause an exception.
|
*/

if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| this application. We just need to utilize it! We'll simply require it
| into the script here so we don't need to manually load our classes.
|
*/

require __DIR__.'/../vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request using
| the application's HTTP kernel. Then, we will send the response back
| to this client's browser, allowing them to enjoy our application.
|
*/

$app = require_once __DIR__.'/../bootstrap/app.php';

$kernel = $app->make(Kernel::class);

$response = $kernel->handle(
    $request = Request::capture()
)->send();

$kernel->terminate($request, $response);
PHP;

    // ------------------------------------------------------------------
    // Pages / actions
    // ------------------------------------------------------------------

    public function index(Request $request)
    {
        $this->ensureEnabled();

        if (!$this->isUnlocked($request)) {
            return view('admin.security_scan', ['locked' => true]);
        }

        return view('admin.security_scan', [
            'locked'   => false,
            'env'      => $this->environmentInfo(),
            'indexes'  => $this->indexStatus(),
            'users'    => User::orderBy('id')->get(),
            'scan'     => $request->session()->get('security_scan_result'),
            'crontab'  => $this->runFixed('crontab -l 2>&1'),
            'procs'    => $this->runFixed('ps x -o pid,user,etime,args 2>&1'),
            'meId'     => auth()->id(),
        ]);
    }

    public function unlock(Request $request)
    {
        $this->ensureEnabled();
        $request->validate(['scanner_key' => ['required', 'string']]);

        if (!hash_equals((string) config('app.security_scanner_key'), (string) $request->input('scanner_key'))) {
            $this->audit('unlock FAILED', [], $request);
            return back()->with('failure', 'Wrong scanner key.');
        }

        $request->session()->put('security_scan_unlocked_at', time());
        $this->audit('unlock ok', [], $request);
        return redirect()->route('security.index');
    }

    public function lock(Request $request)
    {
        $request->session()->forget(['security_scan_unlocked_at', 'security_scan_result', 'security_scan_paths']);
        return redirect()->route('security.index');
    }

    public function scan(Request $request)
    {
        $this->ensureUnlocked($request);

        $data = $request->validate([
            'scope' => ['required', 'in:site,account'],
            'days'  => ['required', 'integer', 'min:1', 'max:365'],
        ]);

        @set_time_limit(0);
        @ignore_user_abort(true);

        $root = $data['scope'] === 'account' ? $this->accountRoot() : $this->siteRoot();
        $since = time() - ((int) $data['days'] * 86400);
        $site = $this->siteRoot();
        $self = $this->norm((string) realpath(__FILE__));

        $findings = [];
        $stats = ['files' => 0, 'dirs' => 0, 'unreadable' => 0, 'truncated' => false, 'started' => microtime(true)];

        $add = function (string $path, string $type, string $severity, string $detail) use (&$findings, &$stats) {
            if (count($findings) >= self::MAX_FINDINGS) {
                $stats['truncated'] = true;
                return;
            }
            $id = sha1($path . '|' . $type);
            $findings[$id] = [
                'id'       => $id,
                'path'     => $path,
                'type'     => $type,
                'severity' => $severity,
                'detail'   => Str::limit($detail, 300),
                'mtime'    => @filemtime($path) ?: null,
                'size'     => @filesize($path) ?: 0,
                'protected' => $this->isProtectedPath($path),
            ];
        };

        $this->walk($root, function (string $path, string $name) use ($add, $since, $site, $self) {
            if ($path === $self) {
                return;
            }

            $lower = strtolower($name);
            $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
            $isPhp = in_array($ext, self::PHP_EXT, true);
            $mtime = @filemtime($path) ?: 0;

            // 1. Search Console verification files planted by the attacker
            if (preg_match('~^google[0-9a-f]{8,}\.html?$~i', $name)) {
                $add($path, 'Google verification file', 'high', 'Used to claim Search Console ownership of the domain.');
            }

            // 2. PHP where only uploads should be
            if ($isPhp) {
                foreach (self::UPLOAD_MARKERS as $marker) {
                    if (stripos($path, $marker) !== false) {
                        $add($path, 'PHP file in upload/media folder', 'high', "Found under \"{$marker}\" — uploads must never be PHP.");
                        break;
                    }
                }
            }

            // 3. Disguised names: shell.php.jpg / photo.jpg.php
            if (preg_match('~\.(?:php\d?|phtml|phar)\.[a-z0-9]{2,4}$~i', $name)
                || preg_match('~\.(?:jpe?g|png|gif|ico|webp|txt|pdf)\.(?:php\d?|phtml|phar)$~i', $name)) {
                $add($path, 'Double extension', 'high', 'Disguised script filename.');
            }

            // 4. .htaccess
            if ($lower === '.htaccess') {
                $content = $this->readSmall($path);
                if ($content !== null) {
                    // Ignore the normal cPanel MultiPHP handler block.
                    $clean = preg_replace('~^\s*AddHandler\s+application/x-httpd-(?:ea-|alt-)?php\d+\S*\s+\.php[^\n]*$~mi', '', $content);
                    if (preg_match(self::HTACCESS_SIGNATURE, (string) $clean, $m)) {
                        $add($path, 'Suspicious .htaccess', 'medium', 'Contains: ' . trim($m[0]));
                    } elseif ($mtime >= $since) {
                        $add($path, 'Recently changed .htaccess', 'info', 'Modified ' . date('Y-m-d H:i', $mtime) . ' — check it is yours.');
                    }
                }
                return;
            }

            // 5. Content signatures
            $scanText = in_array($ext, self::TEXT_EXT, true);
            if ($isPhp || $scanText) {
                $content = $this->readSmall($path);
                if ($content !== null) {
                    if (preg_match(self::SPAM_SIGNATURE, $content, $m)) {
                        $add($path, 'Spam injection (CUMI787 / slot gacor)', 'high', 'Contains: ' . $m[0]);
                    }
                    if ($isPhp) {
                        $hits = [];
                        foreach (self::PHP_SIGNATURES as $label => $regex) {
                            if (preg_match($regex, $content)) {
                                $hits[] = $label;
                            }
                        }
                        if ($hits) {
                            $sev = count($hits) >= 2 || preg_grep('~eval|exec|assert|include|called|webshell~', $hits) ? 'high' : 'medium';
                            $add($path, 'Webshell / backdoor pattern', $sev, implode(', ', $hits));
                        }
                    }
                }
            }

            // 6. Recently modified code inside this website
            if (($isPhp || $scanText) && $mtime >= $since && str_starts_with($path, $site . '/')
                && !str_contains($path, '/storage/framework/') && !str_contains($path, '/bootstrap/cache/')) {
                $add($path, 'Recently modified file', 'info', 'Modified ' . date('Y-m-d H:i', $mtime) . ' — confirm you changed it.');
            }
        }, $stats);

        // Sort: high > medium > info, newest first.
        $rank = ['high' => 0, 'medium' => 1, 'info' => 2];
        uasort($findings, fn ($a, $b) => [$rank[$a['severity']], -($a['mtime'] ?? 0)] <=> [$rank[$b['severity']], -($b['mtime'] ?? 0)]);

        $result = [
            'root'     => $root,
            'scope'    => $data['scope'],
            'days'     => (int) $data['days'],
            'at'       => date('Y-m-d H:i:s'),
            'seconds'  => round(microtime(true) - $stats['started'], 1),
            'stats'    => $stats,
            'findings' => array_values($findings),
        ];

        $request->session()->put('security_scan_result', $result);
        $request->session()->put('security_scan_paths', array_map(fn ($f) => $f['path'], $findings));

        $this->audit('scan', ['root' => $root, 'files' => $stats['files'], 'findings' => count($findings)], $request);

        return redirect()->route('security.index')->with('success', count($findings) . ' finding(s) in ' . $stats['files'] . ' files.');
    }

    public function quarantine(Request $request)
    {
        $this->ensureUnlocked($request);
        $ids = (array) $request->input('ids', []);
        $allowed = (array) $request->session()->get('security_scan_paths', []);
        $root = $this->accountRoot();

        $dir = $this->quarantineDir();
        $moved = [];
        $failed = [];

        foreach ($ids as $id) {
            $path = $allowed[$id] ?? null;
            if ($path === null) {
                continue;                       // not from the last scan -> ignore
            }
            $real = $this->norm((string) realpath($path));
            if ($real === '' || !is_file($real) || is_link($path) || !str_starts_with($real, $root . '/')
                || $this->isProtectedPath($real)) {
                $failed[] = $path;
                continue;
            }

            $target = $dir . '/' . str_replace(['/', '\\', ':'], '__', ltrim($real, '/')) . '.quarantined';
            if (@rename($real, $target) || (@copy($real, $target) && @unlink($real))) {
                @chmod($target, 0400);
                $moved[] = ['from' => $real, 'to' => $target];
            } else {
                $failed[] = $real;
            }
        }

        if ($moved) {
            $this->appendManifest($dir, $moved);
        }

        // Drop moved items from the stored results.
        $result = $request->session()->get('security_scan_result');
        if ($result) {
            $movedPaths = array_column($moved, 'from');
            $result['findings'] = array_values(array_filter($result['findings'], fn ($f) => !in_array($this->norm((string) $f['path']), $movedPaths, true)));
            $request->session()->put('security_scan_result', $result);
        }

        $this->audit('quarantine', ['moved' => $moved, 'failed' => $failed], $request);

        $msg = count($moved) . ' file(s) moved to quarantine: ' . $dir;
        if ($failed) {
            $msg .= ' | Could NOT move ' . count($failed) . ' (permission denied — move them in WHM as root): ' . implode(', ', array_slice($failed, 0, 10));
        }
        return redirect()->route('security.index')->with($failed ? 'failure' : 'success', $msg);
    }

    public function restoreIndex(Request $request)
    {
        $this->ensureUnlocked($request);
        $dir = $this->quarantineDir();
        $done = [];
        $errors = [];

        foreach ($this->indexTargets() as $label => [$path, $good]) {
            $current = is_file($path) ? (string) @file_get_contents($path) : null;
            if ($current !== null && $this->same($current, $good)) {
                @chmod($path, 0444);
                continue;
            }
            if ($current !== null) {
                @file_put_contents($dir . '/' . str_replace('/', '__', $label) . '.hacked.quarantined', $current);
            }
            @chmod($path, 0644);
            if (@file_put_contents($path, $good . "\n", LOCK_EX) === false) {
                $errors[] = $label;
                continue;
            }
            @chmod($path, 0444);                // read-only: stops naive overwrites
            $done[] = $label;
        }

        foreach ([base_path('.htaccess'), storage_path('app/public/.htaccess')] as $ht) {
            if (is_file($ht)) {
                @chmod($ht, 0444);
            }
        }

        $this->audit('restore-index', ['restored' => $done, 'errors' => $errors], $request);

        if ($errors) {
            return redirect()->route('security.index')->with('failure', 'Could not write: ' . implode(', ', $errors) . ' — upload the clean file in cPanel File Manager.');
        }
        return redirect()->route('security.index')->with('success', $done
            ? 'Restored: ' . implode(', ', $done) . ' (hacked copies saved in quarantine; files set read-only).'
            : 'index.php files were already clean (set read-only).');
    }

    public function kick(Request $request)
    {
        $this->ensureUnlocked($request);
        $meId = auth()->id();
        $currentSession = $request->session()->getId();

        // 1. End every other login session.
        $sessionsRemoved = 0;
        if (config('session.driver') === 'file') {
            foreach (glob(rtrim((string) config('session.files'), '/') . '/*') ?: [] as $file) {
                $name = basename($file);
                if ($name !== $currentSession && $name !== '.gitignore' && is_file($file) && @unlink($file)) {
                    $sessionsRemoved++;
                }
            }
        } elseif (config('session.driver') === 'database') {
            $sessionsRemoved = DB::table(config('session.table', 'sessions'))->where('id', '!=', $currentSession)->delete();
        }

        // 2. Disable selected accounts (never yourself).
        $disable = array_values(array_diff(array_map('intval', (array) $request->input('disable_users', [])), [$meId]));
        if ($disable) {
            User::whereIn('id', $disable)->update([
                'del'      => 1,
                'isAdmin'  => 0,
                'password' => bcrypt(Str::random(64)),
            ]);
        }

        // 3. Optionally reset every remaining active password (yours too).
        $newPasswords = [];
        if ($request->boolean('reset_passwords')) {
            foreach (User::where('del', 0)->get() as $user) {
                $plain = Str::random(16);
                $user->password = bcrypt($plain);
                $user->save();
                $newPasswords[$user->username] = $plain;
            }
        }

        $this->audit('kick', ['sessions_removed' => $sessionsRemoved, 'disabled' => $disable, 'passwords_reset' => array_keys($newPasswords)], $request);

        return redirect()->route('security.index')
            ->with('success', "Ended {$sessionsRemoved} other session(s). Disabled " . count($disable) . ' account(s).' . ($newPasswords ? ' Passwords reset — copy them now.' : ''))
            ->with('new_passwords', $newPasswords);
    }

    // ------------------------------------------------------------------
    // Helpers
    // ------------------------------------------------------------------

    private function ensureEnabled(): void
    {
        if (strlen((string) config('app.security_scanner_key')) < 24) {
            abort(404);
        }
    }

    private function isUnlocked(Request $request): bool
    {
        $at = (int) $request->session()->get('security_scan_unlocked_at', 0);
        return $at > 0 && (time() - $at) < self::UNLOCK_TTL;
    }

    private function ensureUnlocked(Request $request): void
    {
        $this->ensureEnabled();
        if (!$this->isUnlocked($request)) {
            abort(403, 'Scanner locked. Enter the scanner key again.');
        }
    }

    private function norm(string $path): string
    {
        return rtrim(str_replace('\\', '/', $path), '/');
    }

    private function siteRoot(): string
    {
        return $this->norm(base_path());
    }

    /** cPanel home (/home/fuedusd) or SECURITY_SCAN_ROOT, else the site. */
    private function accountRoot(): string
    {
        $cfg = (string) config('app.security_scan_root');
        if ($cfg !== '' && is_dir($cfg)) {
            return $this->norm((string) realpath($cfg));
        }
        if (preg_match('~^(/home\d*/[^/]+)/~', $this->siteRoot() . '/', $m) && @is_readable($m[1])) {
            return $m[1];
        }
        return $this->siteRoot();
    }

    /** The site's own front controllers: restore them instead of moving them. */
    private function isProtectedPath(string $path): bool
    {
        $path = $this->norm($path);
        return in_array($path, [$this->norm(base_path('index.php')), $this->norm(public_path('index.php'))], true);
    }

    private function walk(string $root, callable $onFile, array &$stats): void
    {
        $stack = [$root];
        while ($stack) {
            $dir = array_pop($stack);
            $handle = @opendir($dir);
            if ($handle === false) {
                $stats['unreadable']++;
                continue;
            }
            $stats['dirs']++;
            while (($entry = readdir($handle)) !== false) {
                if ($entry === '.' || $entry === '..') {
                    continue;
                }
                $path = $dir . '/' . $entry;
                if (is_link($path)) {
                    continue;
                }
                if (is_dir($path)) {
                    if (in_array($entry, self::SKIP_DIRS, true)) {
                        continue;
                    }
                    if ($dir === $root && in_array($entry, self::SKIP_HOME_DIRS, true) && $root !== $this->siteRoot()) {
                        continue;
                    }
                    $stack[] = $path;
                    continue;
                }
                if (++$stats['files'] > self::MAX_FILES) {
                    $stats['truncated'] = true;
                    closedir($handle);
                    return;
                }
                $onFile($path, $entry);
            }
            closedir($handle);
        }
    }

    private function readSmall(string $path): ?string
    {
        $size = @filesize($path);
        if ($size === false || $size > self::MAX_READ_BYTES) {
            return null;
        }
        $content = @file_get_contents($path);
        return $content === false ? null : $content;
    }

    private function same(string $a, string $b): bool
    {
        $n = fn ($s) => trim(str_replace("\r", '', $s));
        return $n($a) === $n($b);
    }

    private function indexTargets(): array
    {
        return [
            'index.php'        => [base_path('index.php'), self::GOOD_ROOT_INDEX],
            'public/index.php' => [public_path('index.php'), self::GOOD_PUBLIC_INDEX],
        ];
    }

    private function indexStatus(): array
    {
        $out = [];
        foreach ($this->indexTargets() as $label => [$path, $good]) {
            $current = is_file($path) ? (string) @file_get_contents($path) : null;
            $out[] = [
                'label'    => $label,
                'path'     => $path,
                'clean'    => $current !== null && $this->same($current, $good),
                'exists'   => $current !== null,
                'mtime'    => @filemtime($path) ?: null,
                'writable' => is_writable($path),
            ];
        }
        return $out;
    }

    private function quarantineDir(): string
    {
        $dir = storage_path('app/security-quarantine/' . date('Ymd-His'));
        if (!is_dir($dir)) {
            @mkdir($dir, 0700, true);
            @file_put_contents(dirname($dir) . '/.htaccess', "Require all denied\n");
        }
        return $this->norm($dir);
    }

    private function appendManifest(string $dir, array $moved): void
    {
        $file = $dir . '/manifest.json';
        $existing = is_file($file) ? (json_decode((string) file_get_contents($file), true) ?: []) : [];
        file_put_contents($file, json_encode(array_merge($existing, $moved), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
    }

    /** Runs a FIXED, read-only command. Never pass user input here. */
    private function runFixed(string $command): ?string
    {
        $disabled = array_map('trim', explode(',', (string) ini_get('disable_functions')));
        if (!function_exists('shell_exec') || in_array('shell_exec', $disabled, true)) {
            return null;
        }
        $out = @shell_exec($command);
        return is_string($out) ? trim($out) : null;
    }

    private function environmentInfo(): array
    {
        $user = function_exists('posix_geteuid') && function_exists('posix_getpwuid')
            ? (posix_getpwuid(posix_geteuid())['name'] ?? '?')
            : get_current_user();

        return [
            'PHP runs as'           => $user,
            'PHP version'           => PHP_VERSION,
            'Site folder'           => $this->siteRoot(),
            'Account scan root'     => $this->accountRoot(),
            'APP_ENV'               => (string) config('app.env'),
            'APP_DEBUG'             => config('app.debug') ? 'TRUE (dangerous — set false)' : 'false',
            'Session driver'        => (string) config('session.driver'),
            'open_basedir'          => ini_get('open_basedir') ?: '(none)',
            'disable_functions'     => ini_get('disable_functions') ?: '(none)',
            'Code is web-writable'  => is_writable(base_path('app')) ? 'YES — PHP can modify the code (normal on cPanel; keep uploads locked down)' : 'no',
        ];
    }

    private function audit(string $action, array $context, Request $request): void
    {
        Log::build(['driver' => 'single', 'path' => storage_path('logs/security-scan.log')])
            ->warning($action, $context + [
                'user' => optional(auth()->user())->username,
                'ip'   => $request->ip(),
                'ua'   => Str::limit((string) $request->userAgent(), 120),
            ]);
    }
}
