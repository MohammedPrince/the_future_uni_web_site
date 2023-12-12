<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MainApp extends Model
{
    use HasFactory;

    public static function getFacultiesAndOffices($id){
        $value ='';

        if($id =='0'){
            $value = 'Admin';
        }
        if($id =='1'){
            $value = 'Faculty of Engineering';
        }
        if($id =='2'){
            $value = 'Faculty of Computer Science';
        }
        if($id =='3'){
            $value = 'Faculty of Information Technology';
        }
        if($id =='4'){
            $value = 'Faculty of Telecommunication Engineering';
        }
        if($id =='5'){
            $value = 'Faculty of Faculty of Architecture Engineering';
        }
        if($id =='7'){
            $value = 'Faculty of Faculty of Fine Arts and Design';
        }
        if($id=='14'){
            $value = 'Faculty of Faculty of Geoinformatics';
        }
        if($id=='21'){
            $value = 'Faculty of Faculty of Basic Sciences';
        }
        if($id=='23'){
            $value = 'Faculty of Faculty of Business Administration';
        }
        //Officess//
        if($id=='01'){
            $value = 'CESD';
        }
        if($id=='02'){
            $value = 'CTS';
        }
        if($id=='04'){
            $value = 'IRDC';
        }
        if($id=='05'){
            $value = 'Admission and Registration';
        }
        if($id=='06'){
            $value = 'Marketing';
        }
        if($id=='07'){
            $value = 'Academic Affairs';
        }
        if($id=='08'){
            $value = ' Students Affairs';
        }

        return $value ;
    }

    public static function GetUserDetails($column_name,$id){
        
        $res = DB::table('users')->where('id', $id)->select($column_name)->pluck($column_name)->first();
        return $res ;
    }
}
