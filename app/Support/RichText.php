<?php

namespace App\Support;

use Illuminate\Support\Str;
use Mews\Purifier\Facades\Purifier;

/**
 * News and event descriptions are written in the admin HTML editor.
 * clean(): safe HTML to save and to show (rules in config/purifier.php).
 * excerpt(): plain text for lists, cards and search results.
 */
class RichText
{
    public static function clean(?string $html): string
    {
        return trim((string) Purifier::clean((string) $html));
    }

    public static function excerpt(?string $html, int $words = 50, string $end = '...'): string
    {
        // A space before each tag keeps words in separate paragraphs apart.
        $text = html_entity_decode(strip_tags(str_replace('<', ' <', (string) $html)), ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $text = trim(preg_replace('/\s+/u', ' ', $text));

        return Str::words($text, $words, $end);
    }

    /**
     * Value to load into the editor. Older descriptions are plain text with line
     * breaks; turn them into paragraphs so the editor keeps the layout.
     */
    public static function forEditor(?string $value): string
    {
        $value = (string) $value;
        if ($value === '' || $value !== strip_tags($value)) {
            return $value;
        }

        $paragraphs = preg_split('/\R\s*\R/u', trim($value));

        return implode("\n", array_map(
            fn ($p) => '<p>' . nl2br(e(trim($p)), false) . '</p>',
            $paragraphs
        ));
    }

    /** True when the editor sent nothing but empty markup (e.g. "<p><br></p>"). */
    public static function isEmpty(?string $html): bool
    {
        return trim(html_entity_decode(strip_tags((string) $html), ENT_QUOTES | ENT_HTML5, 'UTF-8'), " \t\n\r\0\x0B\u{A0}") === '';
    }
}
