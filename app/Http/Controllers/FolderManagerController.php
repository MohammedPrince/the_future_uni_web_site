<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Concerns\ConfirmsPassword;
use Illuminate\Http\Request;

/**
 * Admin > Folders: browse the server folders listed in site.folder_roots
 * (env FOLDER_MANAGER_ROOTS), look inside a folder, then delete it.
 *
 * Safety rules:
 *  - Admin login plus the admin's own password again; locks after 15 minutes.
 *  - Every path is resolved with realpath() and must lie inside one of the roots,
 *    so "../" and symbolic links cannot reach anything else.
 *  - A folder is deleted only from its own page (after its content was shown),
 *    by typing its name. Symbolic links inside it are removed, never followed.
 *  - Never deletable: the roots themselves, the website's own folder and every
 *    folder around it, symbolic links, and the names in site.folder_protected_names.
 *  - Every view, delete and unlock is written to storage/logs/folder-manager.log.
 */
class FolderManagerController extends Controller
{
    use ConfirmsPassword;

    private const UNLOCK_SESSION_KEY = 'folder_manager_unlocked';
    private const AUDIT_LOG = 'folder-manager.log';

    private const LIST_LIMIT = 2000;      // entries shown in one folder
    private const SCAN_LIMIT = 50000;     // entries counted for the size summary
    private const SCAN_SECONDS = 4;

    public function index(Request $request)
    {
        $roots = $this->roots();

        if (!$this->isUnlocked($request)) {
            return view('admin.folders', ['locked' => true, 'roots' => $roots]);
        }

        $requested = (string) $request->query('path', '');
        $path = $requested === '' ? null : $this->resolve($requested);

        if ($requested !== '' && $path === null) {
            return redirect()->route('folders.index')->with('failure', 'That folder is not allowed or does not exist.');
        }

        $data = ['locked' => false, 'roots' => $roots, 'path' => $path];

        if ($path !== null) {
            $data += [
                'breadcrumbs' => $this->breadcrumbs($path),
                'parent' => $this->parentInRoots($path),
                'entries' => $this->entries($path),
                'summary' => $this->scan($path),
                'protectedReason' => $this->protectedReason($path),
                'writable' => is_writable(dirname($path)),
            ];
        }

        return view('admin.folders', $data);
    }

    public function unlock(Request $request)
    {
        if (!$this->tryUnlock($request)) {
            return redirect()->route('folders.index')->with('failure', 'Wrong password.');
        }

        return redirect()->route('folders.index');
    }

    public function lock(Request $request)
    {
        $this->lockPage($request);

        return redirect()->route('folders.index');
    }

    public function delete(Request $request)
    {
        if (!$this->isUnlocked($request)) {
            return redirect()->route('folders.index')->with('failure', 'Folders are locked. Enter your password again.');
        }

        $data = $request->validate([
            'path' => ['required', 'string', 'max:4096'],
            'confirm_name' => ['required', 'string', 'max:255'],
        ]);

        $path = $this->resolve($data['path']);
        if ($path === null) {
            return redirect()->route('folders.index')->with('failure', 'That folder is not allowed or does not exist.');
        }

        $back = redirect()->route('folders.index', ['path' => $path]);

        if ($reason = $this->protectedReason($path)) {
            $this->audit('delete REFUSED (' . $reason . ')', [$path], $request);

            return $back->with('failure', 'This folder cannot be deleted: ' . $reason);
        }

        if (!hash_equals(basename($path), trim($data['confirm_name']))) {
            return $back->withErrors(['confirm_name' => 'Type the folder name exactly as shown to confirm.']);
        }

        @set_time_limit(0);
        @ignore_user_abort(true);

        $parent = $this->parentInRoots($path);
        [$ok, $failed] = $this->deleteTree($path);
        clearstatcache();

        if ($ok && !file_exists($path)) {
            $this->audit('delete', [$path], $request);

            return redirect()->route('folders.index', $parent ? ['path' => $parent] : [])
                ->with('success', 'Folder "' . basename($path) . '" and everything in it was deleted.');
        }

        $this->audit('delete PARTLY FAILED', array_merge([$path], array_slice($failed, 0, 20)), $request);

        return $back->with('failure', 'Some items could not be deleted (no permission?): '
            . implode(', ', array_map('basename', array_slice($failed, 0, 10)))
            . (count($failed) > 10 ? ' and ' . (count($failed) - 10) . ' more' : '') . '.');
    }

    // ----- Paths ------------------------------------------------------------

    /** Existing roots, resolved, without duplicates. */
    private function roots(): array
    {
        $roots = [];
        foreach ((array) config('site.folder_roots', []) as $root) {
            $real = realpath((string) $root);
            if ($real !== false && is_dir($real)) {
                $roots[] = $real;
            }
        }

        return array_values(array_unique($roots));
    }

    /** The real path of an existing folder inside a root, or null. */
    private function resolve(string $path): ?string
    {
        if ($path === '' || str_contains($path, "\0")) {
            return null;
        }
        $real = realpath($path);
        if ($real === false || !is_dir($real)) {
            return null;
        }

        foreach ($this->roots() as $root) {
            if ($this->isInside($real, $root, true)) {
                return $real;
            }
        }

        return null;
    }

    private function isInside(string $path, string $root, bool $orSame = false): bool
    {
        $norm = fn ($p) => rtrim(str_replace('\\', '/', $p), '/');
        $path = $norm($path);
        $root = $norm($root);
        if (DIRECTORY_SEPARATOR === '\\') {
            $path = strtolower($path);
            $root = strtolower($root);
        }

        return ($orSame && $path === $root) || str_starts_with($path . '/', $root . '/') && $path !== $root;
    }

    private function parentInRoots(string $path): ?string
    {
        $parent = dirname($path);

        return $parent !== $path ? $this->resolve($parent) : null;
    }

    private function breadcrumbs(string $path): array
    {
        $crumbs = [];
        for ($p = $path; $p !== null; $p = $this->parentInRoots($p)) {
            array_unshift($crumbs, ['name' => basename($p) ?: $p, 'path' => $p]);
        }

        return $crumbs;
    }

    /** Why a folder must not be deleted, or null when it may be. */
    private function protectedReason(string $path): ?string
    {
        foreach ($this->roots() as $root) {
            if ($this->isInside($path, $root, true) && !$this->isInside($path, $root)) {
                return 'it is one of the main folders this page starts from.';
            }
        }

        $app = realpath(base_path());
        if ($app !== false && ($this->isInside($app, $path, true) || $this->isInside($path, $app))) {
            return 'the website itself runs from here.';
        }

        if (is_link($path)) {
            return 'it is a symbolic link.';
        }

        $protected = array_map('strtolower', (array) config('site.folder_protected_names', []));
        if (in_array(strtolower(basename($path)), $protected, true)) {
            return 'server and hosting folders named "' . basename($path) . '" are protected.';
        }

        return null;
    }

    // ----- Listing and size -------------------------------------------------

    private function entries(string $path): array
    {
        $dirs = [];
        $files = [];
        $total = 0;

        try {
            $iterator = new \DirectoryIterator($path);
        } catch (\Throwable $e) {
            return ['dirs' => [], 'files' => [], 'total' => 0, 'error' => 'The website cannot read this folder (no permission).'];
        }

        foreach ($iterator as $item) {
            if ($item->isDot()) {
                continue;
            }
            $total++;
            if ($total > self::LIST_LIMIT) {
                continue;
            }
            $entry = [
                'name' => $item->getFilename(),
                'path' => $item->getPathname(),
                'link' => $item->isLink(),
                'modified' => @$item->getMTime() ?: null,
            ];
            if ($item->isDir()) {
                $dirs[] = $entry;
            } else {
                $entry['size'] = @$item->getSize() ?: 0;
                $files[] = $entry;
            }
        }

        $byName = fn ($a, $b) => strnatcasecmp($a['name'], $b['name']);
        usort($dirs, $byName);
        usort($files, $byName);

        return ['dirs' => $dirs, 'files' => $files, 'total' => $total, 'error' => null];
    }

    /** Files, folders and bytes inside a folder (stops early on very large folders). */
    private function scan(string $path): array
    {
        $result = ['files' => 0, 'dirs' => 0, 'bytes' => 0, 'complete' => true];
        $deadline = microtime(true) + self::SCAN_SECONDS;
        $seen = 0;

        try {
            $iterator = new \RecursiveIteratorIterator(
                new \RecursiveDirectoryIterator($path, \FilesystemIterator::SKIP_DOTS),
                \RecursiveIteratorIterator::SELF_FIRST,
                \RecursiveIteratorIterator::CATCH_GET_CHILD
            );
            foreach ($iterator as $item) {
                if (++$seen > self::SCAN_LIMIT || microtime(true) > $deadline) {
                    $result['complete'] = false;
                    break;
                }
                if ($item->isDir() && !$item->isLink()) {
                    $result['dirs']++;
                } else {
                    $result['files']++;
                    $result['bytes'] += $item->isLink() ? 0 : (int) @$item->getSize();
                }
            }
        } catch (\Throwable $e) {
            $result['complete'] = false;
        }

        return $result;
    }

    // ----- Delete -----------------------------------------------------------

    /**
     * Deletes a folder and everything in it. Symbolic links are removed as
     * links; their targets are never touched. Returns [all ok, failed paths].
     */
    private function deleteTree(string $dir): array
    {
        $failed = [];

        try {
            $iterator = new \RecursiveIteratorIterator(
                new \RecursiveDirectoryIterator($dir, \FilesystemIterator::SKIP_DOTS),
                \RecursiveIteratorIterator::CHILD_FIRST,
                \RecursiveIteratorIterator::CATCH_GET_CHILD
            );
            foreach ($iterator as $item) {
                $p = $item->getPathname();
                if ($item->isLink()) {
                    $ok = @unlink($p) || (DIRECTORY_SEPARATOR === '\\' && @rmdir($p));
                } elseif ($item->isDir()) {
                    $ok = @rmdir($p);
                } else {
                    $ok = @unlink($p);
                }
                if (!$ok) {
                    $failed[] = $p;
                }
            }
        } catch (\Throwable $e) {
            $failed[] = $dir;
        }

        if (!@rmdir($dir)) {
            $failed[] = $dir;
        }

        return [$failed === [], $failed];
    }
}
