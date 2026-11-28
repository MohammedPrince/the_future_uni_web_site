<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * One slide of the big slider at the top of the home page.
 * The image exists in several widths: "<image>-<width>.<ext>" under /public,
 * so phones download a small file and large screens a sharp one.
 */
class HomeSlide extends Model
{
    public $table = 'home_slides';

    protected $fillable = [
        'subtitle', 'title', 'alt', 'button_text', 'button_url',
        'image', 'widths', 'ext', 'img_width', 'img_height', 'sort_order', 'is_visible',
    ];

    protected $casts = ['is_visible' => 'boolean', 'sort_order' => 'integer'];

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('id');
    }

    /** @return int[] */
    public function widthList(): array
    {
        $list = array_values(array_filter(array_map('intval', explode(',', (string) $this->widths))));
        sort($list);

        return $list ?: [1024];
    }

    public function url(int $width): string
    {
        return asset('public/' . $this->image . '-' . $width . '.' . $this->ext) . '?v=' . substr(md5((string) $this->updated_at), 0, 8);
    }

    /** The default file: about 1024 px wide, or the closest one. */
    public function src(): string
    {
        $list = $this->widthList();
        $pick = $list[0];
        foreach ($list as $w) {
            if ($w <= 1024) {
                $pick = $w;
            }
        }

        return $this->url($pick);
    }

    public function srcset(): string
    {
        return implode(', ', array_map(fn ($w) => $this->url($w) . ' ' . $w . 'w', $this->widthList()));
    }

    /** True for images uploaded in the admin panel (they may be deleted with the slide). */
    public function isUploaded(): bool
    {
        return str_starts_with($this->image, 'storage/slides/');
    }
}
