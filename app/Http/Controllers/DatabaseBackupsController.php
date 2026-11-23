<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Concerns\ConfirmsPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use ZipArchive;

/**
 * Admin > Database Backups: list, download and delete the database backup files
 * in one folder on the server (config site.db_backups_path, env DB_BACKUPS_PATH).
 *
 * Safety rules:
 *  - Admin login plus the admin's own password again; locks after 15 minutes.
 *  - Only plain files directly inside that folder. A file name from the browser
 *    is used only if it matches a file in the current listing (no paths, no ../).
 *  - Hidden files (.htaccess) and sub folders are never listed, downloaded or deleted.
 *  - Downloads, deletes and unlocks are written to storage/logs/db-backups.log.
 */
class DatabaseBackupsController extends Controller
{
    use ConfirmsPassword;

    private const UNLOCK_SESSION_KEY = 'db_backups_unlocked';
    private const AUDIT_LOG = 'db-backups.log';

    public function index(Request $request)
    {
        $dir = $this->dir();
        $unlocked = $this->isUnlocked($request);
        $files = $unlocked && $dir ? $this->files($dir) : [];

        return view('admin.db_backups', [
            'locked' => !$unlocked,
            'path' => (string) config('site.db_backups_path'),
            'dirOk' => $dir !== null,
            'files' => $files,
            'totalSize' => array_sum(array_column($files, 'size')),
            'webProtected' => $dir ? $this->webProtected($dir) : true,
            'publicFolder' => $dir ? $this->insidePublicHtml($dir) : false,
        ]);
    }

    public function unlock(Request $request)
    {
        if (!$this->tryUnlock($request)) {
            return redirect()->route('backups.index')->with('failure', 'Wrong password.');
        }

        return redirect()->route('backups.index');
    }

    public function lock(Request $request)
    {
        $this->lockPage($request);

        return redirect()->route('backups.index');
    }

    /** One file, as it is. */
    public function download(Request $request, string $file)
    {
        if ($redirect = $this->guard($request)) {
            return $redirect;
        }

        $path = $this->resolve($file);
        abort_if($path === null, 404);

        $this->audit('download', [basename($path)], $request);

        return response()->download($path, basename($path), [
            'Content-Type' => 'application/octet-stream',
            'Cache-Control' => 'no-store',
        ]);
    }

    /** Selected files (or all) in one ZIP file. */
    public function downloadZip(Request $request)
    {
        if ($redirect = $this->guard($request)) {
            return $redirect;
        }

        $paths = $this->selected($request);
        if ($paths === []) {
            return redirect()->route('backups.index')->with('failure', 'Select at least one file.');
        }

        if (count($paths) === 1) {
            return $this->download($request, basename($paths[0]));
        }

        if (!class_exists(ZipArchive::class)) {
            return redirect()->route('backups.index')->with('failure', 'The PHP zip extension is not installed. Download the files one by one.');
        }

        @set_time_limit(0);
        @ignore_user_abort(true);

        $tmpDir = storage_path('app/tmp');
        File::ensureDirectoryExists($tmpDir);
        $zipPath = $tmpDir . '/db-backups-' . Str::random(16) . '.zip';

        // The ZIP is written to disk first: it needs as much free space as the files.
        $needed = array_sum(array_map('filesize', $paths));
        $free = @disk_free_space($tmpDir);
        if ($free !== false && $free < $needed * 1.05 + 50 * 1024 * 1024) {
            return redirect()->route('backups.index')->with('failure', sprintf(
                'Not enough free disk space for one ZIP (%s MB needed, %s MB free). Download the files one by one.',
                number_format($needed / 1048576), number_format($free / 1048576)
            ));
        }

        $zip = new ZipArchive();
        if ($zip->open($zipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE) !== true) {
            return redirect()->route('backups.index')->with('failure', 'Could not create the ZIP file. Download the files one by one.');
        }
        foreach ($paths as $path) {
            $name = basename($path);
            $zip->addFile($path, $name);
            // .gz/.zip backups are already compressed: store them as they are (much faster).
            if (preg_match('/\.(gz|tgz|zip|bz2|xz|7z|zst)$/i', $name)) {
                $zip->setCompressionName($name, ZipArchive::CM_STORE);
            }
        }
        if (!$zip->close()) {
            File::delete($zipPath);

            return redirect()->route('backups.index')->with('failure', 'Could not create the ZIP file (disk full?). Download the files one by one.');
        }

        $this->audit('download zip', array_map('basename', $paths), $request);

        return response()->download($zipPath, 'database-backups-' . now()->format('Y-m-d-His') . '.zip', [
            'Content-Type' => 'application/zip',
            'Cache-Control' => 'no-store',
        ])->deleteFileAfterSend(true);
    }

    /** Selected files (or all). */
    public function delete(Request $request)
    {
        if ($redirect = $this->guard($request)) {
            return $redirect;
        }

        $paths = $this->selected($request);
        if ($paths === []) {
            return redirect()->route('backups.index')->with('failure', 'Select at least one file.');
        }

        $deleted = [];
        $failed = [];
        foreach ($paths as $path) {
            (@unlink($path) ? $deleted[] = basename($path) : $failed[] = basename($path));
        }

        $this->audit('delete', $deleted, $request);
        if ($failed) {
            $this->audit('delete FAILED', $failed, $request);
        }

        $message = count($deleted) . ' file(s) deleted.';

        return $failed
            ? redirect()->route('backups.index')->with('failure', $message . ' Could not delete: ' . implode(', ', $failed) . ' (no permission?).')
            : redirect()->route('backups.index')->with('success', $message);
    }

    /** Writes a .htaccess that stops browsers from opening the folder. */
    public function protect(Request $request)
    {
        if ($redirect = $this->guard($request)) {
            return $redirect;
        }

        $dir = $this->dir();
        abort_if($dir === null, 404);

        $rules = "# Added by the admin panel (Database Backups): no web access to backup files.\n"
            . "<IfModule mod_authz_core.c>\n    Require all denied\n</IfModule>\n"
            . "<IfModule !mod_authz_core.c>\n    Order allow,deny\n    Deny from all\n</IfModule>\n"
            . "Options -Indexes\n";

        $file = $dir . DIRECTORY_SEPARATOR . '.htaccess';
        if (is_file($file) && !$this->webProtected($dir)) {
            $rules = rtrim((string) file_get_contents($file)) . "\n\n" . $rules;
        }

        if (@file_put_contents($file, $rules) === false) {
            return redirect()->route('backups.index')->with('failure', 'Could not write .htaccess in the folder (no permission). Ask the host to block web access to it.');
        }

        $this->audit('protect folder', [], $request);

        return redirect()->route('backups.index')->with('success', 'Web access to the folder is now blocked by .htaccess. Check it by opening a backup address in a private window: it must show "Forbidden".');
    }

    // ----- Helpers ----------------------------------------------------------

    private function guard(Request $request)
    {
        if (!$this->isUnlocked($request)) {
            return redirect()->route('backups.index')->with('failure', 'Database backups are locked. Enter your password again.');
        }
        if ($this->dir() === null) {
            return redirect()->route('backups.index')->with('failure', 'The backup folder was not found.');
        }

        return null;
    }

    /** The real backup folder, or null if it is missing. */
    private function dir(): ?string
    {
        $path = trim((string) config('site.db_backups_path'));
        $real = $path === '' ? false : realpath($path);

        return $real !== false && is_dir($real) ? $real : null;
    }

    /** Plain, visible files directly in the folder, newest first. */
    private function files(string $dir): array
    {
        $files = [];
        foreach (new \DirectoryIterator($dir) as $item) {
            if ($item->isDot() || $item->isLink() || !$item->isFile() || str_starts_with($item->getFilename(), '.')) {
                continue;
            }
            $files[] = [
                'name' => $item->getFilename(),
                'size' => $item->getSize(),
                'modified' => $item->getMTime(),
            ];
        }
        usort($files, fn ($a, $b) => [$b['modified'], $a['name']] <=> [$a['modified'], $b['name']]);

        return $files;
    }

    /** Full path of a listed file, or null. Never trusts the name for a path. */
    private function resolve(string $name): ?string
    {
        $dir = $this->dir();
        if ($dir === null || $name !== basename($name)) {
            return null;
        }
        foreach ($this->files($dir) as $file) {
            if (hash_equals($file['name'], $name)) {
                return $dir . DIRECTORY_SEPARATOR . $file['name'];
            }
        }

        return null;
    }

    /** Paths of the ticked files, or of all files with all=1. */
    private function selected(Request $request): array
    {
        $request->validate([
            'files' => ['nullable', 'array', 'max:1000'],
            'files.*' => ['string', 'max:255'],
            'all' => ['nullable', 'in:1'],
        ]);

        $names = $request->input('all') === '1'
            ? array_column($this->files($this->dir()), 'name')
            : (array) $request->input('files', []);

        return array_values(array_unique(array_filter(array_map(fn ($n) => $this->resolve((string) $n), $names))));
    }

    private function webProtected(string $dir): bool
    {
        $file = $dir . DIRECTORY_SEPARATOR . '.htaccess';

        return is_file($file) && preg_match('/Require\s+all\s+denied|Deny\s+from\s+all/i', (string) @file_get_contents($file)) === 1;
    }

    private function insidePublicHtml(string $dir): bool
    {
        return preg_match('#[\\\\/](public_html|httpdocs|www|htdocs)([\\\\/]|$)#i', $dir) === 1;
    }
}
