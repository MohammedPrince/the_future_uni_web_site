<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/** A table on the Fee Structure page, e.g. "Diploma Programs". */
class FeeSection extends Model
{
    public $table = 'fee_sections';

    protected $fillable = ['title', 'note', 'sort_order', 'is_visible'];

    protected $casts = ['is_visible' => 'boolean', 'sort_order' => 'integer'];

    public function items()
    {
        return $this->hasMany(FeeItem::class)->orderBy('sort_order')->orderBy('id');
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('id');
    }
}
