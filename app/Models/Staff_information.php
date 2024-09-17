<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff_information extends Model
{
    use HasFactory;

    public $table = 'staff_information';


    protected $fillable = [
        'staff_name',
        'staff_dep_id',
        'staff_email',
        'staff_position',
        'staff_phone',
    ];

}
