<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Events extends Model
{
    use HasFactory;
    public $table = 'fu_events';

    protected $fillable = [
        'id',
        'event_title',
        'event_desc',
        'event_time',
        'event_date',
        'event_imgs' ,
        'faculty_id' ,
        'event_by' ,
    ];

    public static function getEvents(){

        $events = Events::where('del','=','0')->where('event_status','1')->get(); 
        if ($events->count() === 0){
           return false ;
          }else{
            return $events ;
          }
    }

    public static function getTheLastTwoEvents(){

        $events = Events::where('del','=','0')->where('event_status','1')->orderBy('id', 'desc')->take(2)->get();
        if ($events->count() === 0){
           return false ;
          }else{
            return $events ;
          }
    }

    public static function GetEventColumn($column_name,$event_id){
        
        $res = DB::table('fu_events')->where('id', $event_id)->select($column_name)->pluck($column_name)->first();
        return $res ;

    }
    public function users(){
        return $this->belongsTo(User::class , 'event_by');
    }


}
