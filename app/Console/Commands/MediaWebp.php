<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Finder\Finder;

class MediaWebp extends Command
{
    protected $signature = 'media:webp {folder=storage : Folder inside /public} {--force : Rebuild existing copies}';

    protected $description = 'Create small WebP copies (name.jpg.webp) next to images. Originals are not changed.';

    /** Widest size needed per folder. First match wins. */
    private const MAX_WIDTH = [
        'client/img/main_imgs/faculites' => 240,
        'client/img/main_imgs/centers' => 600,
        'client/img/main_imgs/members' => 400,
        'client/img/main_imgs/trustee' => 480,
        'client/img/main_imgs/general/fu.jpg' => 1024,
        'client/img/main_imgs/general/fu_img' => 1509,
        'client/img/main_imgs/general' => 300,
        'client/img/ts.png' => 120,
        'client/img/fu_logo.png' => 220,
        'storage/fu_alumni' => 220,
        'storage/staff_imgs' => 400,
    ];

    public function handle(): int
    {
        if (!function_exists('imagewebp')) {
            $this->warn('PHP GD has no WebP support here; skipped. Pages keep using the originals.');

            return self::SUCCESS;
        }

        $root = public_path(trim($this->argument('folder'), '/'));
        if (!is_dir($root)) {
            $this->warn("Folder not found: {$root}");

            return self::SUCCESS;
        }

        $made = 0;
        $before = 0;
        $after = 0;

        foreach (Finder::create()->files()->in($root)->name('/\.(jpe?g|jfif|png)$/i') as $file) {
            $source = $file->getPathname();
            $target = $source . '.webp';

            if (!$this->option('force') && is_file($target) && filemtime($target) >= filemtime($source)) {
                continue;
            }

            $info = @getimagesize($source);
            // Skip anything that is not really an image, or too big for memory.
            if (!$info || $info[0] * $info[1] > 40000000) {
                continue;
            }

            $image = @imagecreatefromstring(file_get_contents($source));
            if (!$image) {
                continue;
            }

            imagepalettetotruecolor($image);
            $image = $this->rotate($image, $source, $info[2]);

            $w = imagesx($image);
            $h = imagesy($image);
            $max = $this->maxWidth($source);
            if ($w > $max) {
                $small = imagecreatetruecolor($max, (int) round($h * $max / $w));
                imagealphablending($small, false);
                imagesavealpha($small, true);
                imagecopyresampled($small, $image, 0, 0, 0, 0, $max, imagesy($small), $w, $h);
                imagedestroy($image);
                $image = $small;
            }

            imagesavealpha($image, true);
            imagewebp($image, $target, 78);
            imagedestroy($image);

            // Keep the copy only when it is actually smaller.
            if (filesize($target) >= filesize($source)) {
                unlink($target);
                continue;
            }

            $made++;
            $before += filesize($source);
            $after += filesize($target);
        }

        $this->info(sprintf('%d WebP copies made: %.1f MB -> %.1f MB', $made, $before / 1048576, $after / 1048576));

        return self::SUCCESS;
    }

    private function maxWidth(string $file): int
    {
        $relative = str_replace('\\', '/', substr($file, strlen(public_path()) + 1));

        foreach (self::MAX_WIDTH as $prefix => $width) {
            if (str_starts_with($relative, $prefix)) {
                return $width;
            }
        }

        return 1280;
    }

    private function rotate($image, string $source, int $type)
    {
        if ($type !== IMAGETYPE_JPEG || !function_exists('exif_read_data')) {
            return $image;
        }

        $exif = @exif_read_data($source);
        $angle = [3 => 180, 6 => -90, 8 => 90][$exif['Orientation'] ?? 1] ?? 0;

        return $angle ? imagerotate($image, $angle, 0) : $image;
    }
}
