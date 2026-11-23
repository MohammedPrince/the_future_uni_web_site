<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/** One program row on the Fee Structure page. Empty amounts show as "-". */
class FeeItem extends Model
{
    public $table = 'fee_items';

    public const AMOUNTS = [
        'tuition_sdg' => 'Tuition Fees - Sudanese (SDG)',
        'registration_sdg' => 'Registration Fees (SDG)',
        'tuition_usd' => 'Tuition Fees - Foreigner (USD)',
        'registration_usd' => 'Registration Fees (USD)',
    ];

    protected $fillable = [
        'fee_section_id', 'program', 'tuition_sdg', 'registration_sdg',
        'tuition_usd', 'registration_usd', 'sort_order', 'is_visible',
    ];

    protected $casts = ['is_visible' => 'boolean', 'sort_order' => 'integer'];

    public function section()
    {
        return $this->belongsTo(FeeSection::class, 'fee_section_id');
    }

    public static function money($amount): string
    {
        return $amount === null || $amount === '' ? '-' : number_format((float) $amount);
    }
}
