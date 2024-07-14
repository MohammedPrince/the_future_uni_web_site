<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class News extends Model
{
    use HasFactory;
    public $table = 'fu_news';

    protected $fillable = [
        'id',
        'news_title',
        'news_desc',
        'news_date',
        'news_imgs',
        'faculty_id' ,
        'news_by' ,
    ];

    public static function getNews(){
        $news = News::where('del','=','0')->where('news_status','1')->get();   
        if ($news->count() === 0){
           return false ;
          }else{
            return $news ;
          }
    }

    public static function getTheLastTwoNews(){

        $news = News::where('del','=','0')->where('news_status','1')->orderBy('id', 'desc')->take(2)->get();
        if ($news->count() === 0){
           return false ;
          }else{
            return $news ;
          }
    }

    public static function GetNewsColumn($column_name,$news_id){
        
        $res = DB::table('fu_news')->where('id', $news_id)->select($column_name)->pluck($column_name)->first();
        return $res ;
    }

    public function users(){
        return $this->belongsTo(User::class , 'news_by');
    }

}
