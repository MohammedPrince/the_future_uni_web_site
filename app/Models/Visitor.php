<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;

    public $table = 'visitors';

    protected $guarded = ['visit_id'];


    protected $fillable = [
        'ip_address',
        'location',
        'device_name',
        'visit_date',
        'platform',
        
    ];






}
