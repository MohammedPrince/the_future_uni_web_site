<?php

namespace App\Support;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

/**
 * The images of a news item or an event: a comma separated list of file
 * names in the database, files in public/storage/<folder> (each with a .webp copy).
 * The first image is the cover; all of them show on the website.
 */
class PostImages
{
    public const MAX = 20;

    /** File names saved in the database, in order. */
    public static function list(?string $csv): array
    {
        return array_values(array_filter(array_map(fn ($f) => basename(trim($f)), explode(',', (string) $csv)), fn ($f) => $f !== ''));
    }

    /** Saves uploads (re-encoded, whole picture, never the client file name). Returns the new names. */
    public static function store(array $files, string $folder): array
    {
        $names = [];
        foreach ($files as $file) {
            if (!$file instanceof UploadedFile) {
                continue;
            }
            $name = Str::random(32) . '.jpg';
            $img = ImageUploads::read($file->path());
            ImageUploads::keepWhole($img);
            ImageUploads::saveWithWebp($img, public_path('storage/' . $folder . '/' . $name));
            $names[] = $name;
        }

        return $names;
    }

    public static function delete(array $names, string $folder): void
    {
        foreach ($names as $name) {
            $path = public_path('storage/' . $folder . '/' . basename($name));
            File::delete($path);
            File::delete($path . '.webp');
        }
    }

    /**
     * Edit form: keep the current images except the ticked ones, add the new
     * uploads after them. Returns the new list, or null when nothing would be left.
     * Only names that really belong to this item can be removed.
     */
    public static function update(?string $current, array $remove, array $uploads, string $folder): ?string
    {
        $old = self::list($current);
        $remove = array_values(array_intersect($old, array_map('basename', $remove)));
        $keep = array_values(array_diff($old, $remove));

        if (!$keep && !$uploads) {
            return null;
        }

        $all = array_merge($keep, self::store($uploads, $folder));
        self::delete($remove, $folder);

        return implode(',', $all);
    }
}
