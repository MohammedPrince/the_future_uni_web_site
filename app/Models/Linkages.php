<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Linkages extends Model
{
    use HasFactory;
    
    public $table = 'linkages';

    protected $fillable = [
        'link_name',
        'link_type',
        'link_date',
        'link_duration',
        'link_url' ,
        'link_desc' ,
        'link_logo' ,
       
    ];

}
