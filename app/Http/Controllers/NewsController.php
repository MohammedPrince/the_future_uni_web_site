<?php

namespace App\Http\Controllers;

use File;
use Validator;
use App\Models\News;
use App\Models\Events;
use App\Models\MainApp;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

class NewsController extends Controller
{
    //

    public function index()
    {
        return view("client.Home");
    }
    public function search(Request $request)
    {
        $searchTerm = $request->get('term');
        $news_value= false;
        $event_value= false;

    $news = News::where('news_title', 'like', '%'.$searchTerm.'%')->where('del','=','0')->where('news_status','1')->get();
    $events = Events::where('event_title', 'like', '%'.$searchTerm.'%')->where('del','=','0')->where('event_status','1')->get();

    if ($news->count() > 0){

        $news_value = true;

    }elseif($events->count() > 0){

        $event_value = true;

    }

    return view('client.search',['news' => $news , 'events' => $events , 'news_value' =>$news_value ,'event_value' =>$event_value]);
      
       // return view('client.search', compact('news'));
    }

    public function newsDetails($news_id){

        $events='';

        $event_value = false;
        $news = News::find($news_id);

        $faculty_id = News :: GetNewsColumn('faculty_id',$news_id);
        $event_by_id = News :: GetNewsColumn('news_by',$news_id);

        $news_office = MainApp::getFacultiesAndOffices($faculty_id) ;

        $user_name = MainApp::GetUserDetails('user_fullname',$event_by_id);

       strip_tags(Str::markdown($news));

        if (Events :: getEvents() != null ){
                $event_value = true ;
                $events = Events::getEvents() ;
        }
      
        return view("client.News-Details" , compact('news'),['news_office'=>$news_office,'news_by'=>$user_name,'events'=>$events,'event_value' =>$event_value]);
    }


    public function NewsAndEvents(){

        $news='';
        $events='';
        $event_value = false;
        $news_value = false;

       if (News::getNews()!= null ){

        $news_value = true ;
        //$news = News::getNews() ;
        $news = News::paginate(2);
    
       }

       if (Events :: getEvents() != null ){
            $event_value = true ;
            //$events = Events::getEvents() ;
            $events = Events::paginate(2);
        }

        return view("client.News-and-Events" ,compact('events'), ['news'=>$news,'events'=>$events,'news_value' =>$news_value,'event_value' =>$event_value]);
    }

    public function viewNews(News $news){

        $news_value = false;

        if($news->getTheLastTwoNews()==null){

            $news_value = false;
        }else{

            $news_value = true;
        }
        return view("client.Home" ,['news' => $news->getTheLastTwoNews() , 'news_value' =>$news_value]);
    }

    public function addNews(Request $request){

        $incomingFields = $request->validate([
            'news_title' => ['required' , 'min:5' , 'max:100' , Rule::unique('fu_news' , 'news_title') ] ,
            'news_desc' =>['required' ] ,
            'news_date' => ['required'],
            'news_imgs' => 'required|max:10000',
        ],[
            'news_title.required' => 'News Title is must.',
            'news_desc.required' => 'News Description is must.',
            'news_date.required' => 'News Date is must.',
            'news_imgs.required' => 'News Image is must.',
        ]);

        $incomingFields['news_by'] = auth()->user()->id ;
        $incomingFields['faculty_id'] = "1" ;

        foreach($request->file('news_imgs') as $image)
            {
                $name=$image->getClientOriginalName();
                $destinationPathThumbnail = public_path('/storage/news_imgs');
                $img = Image::make($image->path());
                $img->fit(570, 320);
                $img->save($destinationPathThumbnail.'/'.$name);
                $data[] = $name;  
                $fileNameToStore = implode (",", $data);
            }

            $incomingFields['news_imgs'] = $fileNameToStore ;

            $news = News::create($incomingFields);

        if ($news){
            return redirect('/add_news')->with('success',''.$incomingFields['news_title']. ' Created Successfully !');
        }else{
            return redirect('/add_news')->with('failure','Error While Creating '.$incomingFields['news_title']. ' !');
        }


    }
    public function showNews(News $news){
            
$news_by ='';
$faculty_id='';

        if ($news->getNews()->first() != null ){

            $news_by  = $news->getNews()->first()->news_by ; 
            $faculty_id  = $news->getNews()->first()->faculty_id  ;
        }

        
        $username = MainApp::GetUserDetails('user_fullname',$news_by);

        $dept_name = MainApp::getFacultiesAndOffices($faculty_id);

        return view("admin.add_news" , ['news' => $news->getNews(),'news_by'=>$username,'dept_name'=>$dept_name]);
    }

    public function showEditForm(News $news){

        return view("admin.edit_news" , ['news' => $news]);
    }

    public function editNews(Request $request , News $news ){

        $incomingFields = $request->validate([
            'news_title' => ['required' , 'min:5' , 'max:100'  ] ,
            'news_desc' =>['required' ] ,
            'news_date' => ['required'],
            'news_imgs_old'=>[],
            'news_imgs'=>[],
        ],[
            'news_title.required' => 'News Title is must.',
            'news_desc.required' => 'News Description is must.',
            'news_date.required' => 'News Date is must.',
            'news_imgs.required' => 'News Image is must.',
        ]);

        $incomingFields['news_by'] = auth()->user()->id ;
        $incomingFields['faculty_id'] = auth()->user()->user_faculty ;

            if ($request->hasFile('news_imgs')) {

                foreach($incomingFields['news_imgs']  as $image)
                    {

                        $name=$image->getClientOriginalName();
                        $destinationPathThumbnail = public_path('/storage/news_imgs');
                        $img = Image::make($image->path());
                        $img->fit(570, 320);
                        $img->save($destinationPathThumbnail.'/'.$name);
                        $data[] = $name;  
                        $fileNameToStore = implode (",", $data);

                   if($incomingFields['news_imgs_old'] !=null) {

                        foreach(explode(',', $incomingFields['news_imgs_old']) as $image){
                            $image_path = public_path().'/storage/news_imgs/'.$image;
                           File::delete($image_path);
                        }
                    }
                }
    
                $incomingFields['news_imgs'] = $fileNameToStore ;
            }else{
                $incomingFields['news_imgs'] = $incomingFields['news_imgs_old'] ;
            }
            
            strip_tags($incomingFields) ;
            if(  $news ->update($incomingFields)){

                return redirect('/add_news')->with('success','News Successfully Updated !');
            }else{
                return redirect('/add_news')->with('failure','Error While Update News !');
            }
    }

    public function deleteNews($news_id){

        $news_imgs = News :: GetNewsColumn('news_imgs',$news_id);
        $images = explode(",", $news_imgs);
        
        if (News::where('id', $news_id)->update(['del' => '1'])){

            foreach($images as $image){
                $image_path = public_path().'/storage/news_imgs/'.$image;
                $del = File::delete($image_path);
             }

             if($del){
                    return redirect('/add_news')->with('success','News Deleted Successfully !');
            }else{
                    return redirect('/add_news')->with('failure','File Not exists or already deleted !');
                }
        }else{
            return redirect('/add_news')->with('failure','Error While Deleting News !');
        }
    }

}
