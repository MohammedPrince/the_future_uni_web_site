<?php

namespace App\Support;

/**
 * Links to other websites (odms, elearning, hdesk, Facebook ...) open in a new tab.
 * In Blade: <a href="{{ $url }}" @ext($url)>
 */
class Links
{
    public static function isExternal(?string $url): bool
    {
        $host = parse_url((string) $url, PHP_URL_HOST);
        if (!$host) {
            return false; // "/Fee-Structure", "#top", "mailto:" ...
        }

        return !in_array(strtolower($host), array_map('strtolower', (array) config('seo.hosts', [])), true);
    }

    /** ' target="_blank" rel="noopener"' for external links, '' otherwise. */
    public static function target(?string $url): string
    {
        return self::isExternal($url) ? ' target="_blank" rel="noopener"' : '';
    }
}
