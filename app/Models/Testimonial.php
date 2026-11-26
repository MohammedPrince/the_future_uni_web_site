<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/** One quote in the Alumni Testimonials section of the home page. */
class Testimonial extends Model
{
    public $table = 'testimonials';

    protected $fillable = ['name', 'position', 'quote', 'photo', 'sort_order', 'is_visible'];

    protected $casts = ['is_visible' => 'boolean', 'sort_order' => 'integer'];

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('id');
    }

    public function isUploaded(): bool
    {
        return str_starts_with((string) $this->photo, 'storage/testimonials/');
    }
}
