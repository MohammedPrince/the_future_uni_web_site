<?php

namespace App\Support;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

/**
 * Turns admin uploads into small, fast web images. The original upload is
 * never kept and never served: every file is decoded and saved again, which
 * also removes anything hidden inside it.
 */
class ImageUploads
{
    public const SLIDE_WIDTHS = [640, 1024, 1600, 2200];

    /**
     * Home slider image in several widths, e.g. storage/slides/<name>-640.webp.
     * @return array{image: string, widths: string, ext: string, img_width: int, img_height: int}
     */
    public static function slide(UploadedFile $file): array
    {
        $dir = public_path('storage/slides');
        File::ensureDirectoryExists($dir);

        $name = Str::random(20);
        $ext = function_exists('imagewebp') ? 'webp' : 'jpg';
        $original = Image::make($file->getRealPath());
        $origWidth = $original->width();
        $origHeight = $original->height();

        // Never make an image larger than the upload.
        $widths = array_values(array_filter(self::SLIDE_WIDTHS, fn ($w) => $w <= $origWidth));
        if ($widths === []) {
            $widths = [$origWidth];
        }

        foreach ($widths as $width) {
            $copy = clone $original;
            $copy->resize($width, null, fn ($c) => $c->aspectRatio());
            $copy->save("{$dir}/{$name}-{$width}.{$ext}", $ext === 'webp' ? 78 : 82, $ext);
            $copy->destroy();
        }
        $original->destroy();

        $largest = max($widths);

        return [
            'image' => 'storage/slides/' . $name,
            'widths' => implode(',', $widths),
            'ext' => $ext,
            'img_width' => $largest,
            'img_height' => (int) round($origHeight * $largest / max(1, $origWidth)),
        ];
    }

    /** Square photo for a testimonial: storage/testimonials/<name>.jpg plus a .webp copy. */
    public static function portrait(UploadedFile $file): string
    {
        $dir = public_path('storage/testimonials');
        File::ensureDirectoryExists($dir);

        $name = Str::random(20) . '.jpg';
        $image = Image::make($file->getRealPath())->fit(240, 240);
        $image->save("{$dir}/{$name}", 85, 'jpg');
        if (function_exists('imagewebp')) {
            $image->save("{$dir}/{$name}.webp", 80, 'webp');
        }
        $image->destroy();

        return 'storage/testimonials/' . $name;
    }

    public static function deleteSlide(string $image, string $widths, string $ext): void
    {
        if (!str_starts_with($image, 'storage/slides/')) {
            return; // the original slides that came with the site stay
        }
        foreach (explode(',', $widths) as $width) {
            File::delete(public_path($image . '-' . (int) $width . '.' . basename($ext)));
        }
    }

    public static function deletePortrait(?string $photo): void
    {
        if ($photo && str_starts_with($photo, 'storage/testimonials/')) {
            File::delete([public_path($photo), public_path($photo . '.webp')]);
        }
    }
}
