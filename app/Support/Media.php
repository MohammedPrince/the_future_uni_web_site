<?php

namespace App\Support;

/**
 * URLs for files under /public. Serves the ".webp" copy of an image when one
 * exists (made by `php artisan media:webp`) and adds a version to the URL, so
 * browsers can cache files for a year and still see changes at once.
 */
class Media
{
    private static array $cache = [];

    public static function url(?string $path): string
    {
        $path = ltrim((string) $path, './');

        return self::$cache[$path] ??= self::build($path);
    }

    /** A built stylesheet, ready to print inside a <style> tag. Empty if missing. */
    public static function inlineCss(string $path): string
    {
        $file = public_path($path);

        return is_file($file) ? str_replace('__BASE__', asset('public/client'), file_get_contents($file)) : '';
    }

    private static function build(string $path): string
    {
        $file = public_path($path);

        if (is_file($file . '.webp')) {
            $path .= '.webp';
            $file .= '.webp';
        }

        $encoded = implode('/', array_map('rawurlencode', explode('/', $path)));
        $version = is_file($file) ? '?v=' . substr(md5(filesize($file) . '-' . filemtime($file)), 0, 8) : '';

        return asset('public/' . $encoded) . $version;
    }
}
