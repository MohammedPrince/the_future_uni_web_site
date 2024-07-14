<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fee_structure extends Model
{
    use HasFactory;

    public $table = 'program_fees';

    protected $fillable = [
        'admission_year',
        'program_code',
        'fee',
        'fee_type',

       
    ];



}
