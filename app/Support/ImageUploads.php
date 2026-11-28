<?php

namespace App\Support;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Interfaces\ImageInterface;

/**
 * Turns admin uploads into small, fast web images. The original upload is
 * never kept and never served: every file is decoded and saved again, which
 * also removes anything hidden inside it.
 */
class ImageUploads
{
    public const SLIDE_WIDTHS = [640, 1024, 1600, 2200];

    /** Opens an upload with GD (photos taken sideways on phones are turned upright). */
    public static function read(string $path): ImageInterface
    {
        return ImageManager::gd()->read($path);
    }

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
        $original = self::read($file->getRealPath());
        $origWidth = $original->width();
        $origHeight = $original->height();

        // Never make an image larger than the upload.
        $widths = array_values(array_filter(self::SLIDE_WIDTHS, fn ($w) => $w <= $origWidth));
        if ($widths === []) {
            $widths = [$origWidth];
        }

        foreach ($widths as $width) {
            $copy = (clone $original)->scaleDown(width: $width);
            $encoded = $ext === 'webp' ? $copy->toWebp(quality: 78) : $copy->toJpeg(quality: 82);
            $encoded->save("{$dir}/{$name}-{$width}.{$ext}");
            unset($copy, $encoded);
        }
        unset($original);

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
        $image = self::read($file->getRealPath())->cover(240, 240);
        self::saveWithWebp($image, "{$dir}/{$name}");

        return 'storage/testimonials/' . $name;
    }

    /**
     * News and event photos: the whole picture is kept (posters are not cut),
     * only made smaller when it is bigger than 1600 x 2400. Cards on the lists
     * crop it for display; the details page shows all of it.
     */
    public static function keepWhole(ImageInterface $img): void
    {
        $img->scaleDown(1600, 2400);
    }

    /** Saves name.jpg plus name.jpg.webp (used automatically by @img when present). */
    public static function saveWithWebp(ImageInterface $img, string $path): void
    {
        $img->toJpeg(quality: 85)->save($path);
        if (function_exists('imagewebp')) {
            $img->toWebp(quality: 80)->save($path . '.webp');
        }
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
