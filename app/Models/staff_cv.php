<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class staff_cv extends Model
{
    use HasFactory;

    public $table = 'staff_cv';


    protected $fillable = [
        'staff_id',
        'title',
        'about',
        'work_experience',
        'education',
        'skills',
        'contact',
        'publication',
        'teaching_and_supervision',
        'academic_recognition_and_leadership',
        'cv_image',
        'another_information',
    ];
}
