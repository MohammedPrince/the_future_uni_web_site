<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MainApp extends Model
{
    use HasFactory;

    /**
     * Faculties and offices that news and events can belong to (fu_news.faculty_id,
     * fu_events.faculty_id). The codes are the ones already saved in the database.
     */
    public const FACULTIES_AND_OFFICES = [
        'Faculties' => [
            '1' => 'Faculty of Engineering',
            '2' => 'Faculty of Computer Science',
            '3' => 'Faculty of Information Technology',
            '4' => 'Faculty of Telecommunication Engineering',
            '5' => 'Faculty of Architecture Engineering',
            '7' => 'Faculty of Fine Arts and Design',
            '14' => 'Faculty of Geoinformatics',
            '21' => 'Faculty of Basic Sciences',
            '22' => 'Faculty of Postgraduate Studies',
            '23' => 'Faculty of Business Administration',
        ],
        'Centers and Offices' => [
            '0' => 'Administration',
            '07' => 'Academic Affairs',
            '05' => 'Admission and Registration',
            '08' => 'Students Affairs',
            '06' => 'Marketing',
            '01' => 'CESD',
            '02' => 'CTS',
            '04' => 'IRDC',
        ],
    ];

    /** Every code => name, for validation and lookups. */
    public static function facultyCodes(): array
    {
        $all = [];
        foreach (self::FACULTIES_AND_OFFICES as $group) {
            $all += $group;
        }

        return $all;
    }

    public static function getFacultiesAndOffices($id){
        return self::facultyCodes()[(string) $id] ?? '';
    }

    public static function GetUserDetails($column_name,$id){

        $res = DB::table('users')->where('id', $id)->select($column_name)->pluck($column_name)->first();
        return $res ;
    }
}
