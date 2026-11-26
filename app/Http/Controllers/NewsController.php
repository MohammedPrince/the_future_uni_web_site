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
use Illuminate\Support\Facades\Crypt;

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
        // Short plain text only; % and _ are wildcards in LIKE.
        $term = $request->query('term');
        $searchTerm = addcslashes(mb_substr(is_string($term) ? trim($term) : '', 0, 60), '%_\\');
        $news_value= false;
        $event_value= false;

    $news = News::where('news_title', 'like', '%'.$searchTerm.'%')->where('del','=','0')->where('news_status','1')->take(10)->get();
    $events = Events::where('event_title', 'like', '%'.$searchTerm.'%')->where('del','=','0')->where('event_status','1')->take(10)->get();

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
        $new_news_id  = (int) base64_decode($news_id);
        // Unknown or deleted news gives a 404 page (was a 500 error).
        $news = News::published()->findOrFail($new_news_id);

        $faculty_id = News :: GetNewsColumn('faculty_id',$new_news_id);
        $event_by_id = News :: GetNewsColumn('news_by',$new_news_id);

        $news_office = MainApp::getFacultiesAndOffices($faculty_id) ;

        $user_name = MainApp::GetUserDetails('user_fullname',$event_by_id);

    //    strip_tags(Str::markdown($news));

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
        $news = News::published()->orderByDesc('news_date')->orderByDesc('id')->paginate(2);
    
       }

       if (Events :: getEvents() != null ){
            $event_value = true ;
            //$events = Events::getEvents() ;
            $events = Events::published()->orderByDesc('event_date')->orderByDesc('id')->paginate(2);
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
            'faculty_id' => ['required', 'string', \Illuminate\Validation\Rule::in(array_map('strval', array_keys(\App\Models\MainApp::facultyCodes())))],
            'home_order' => ['nullable', 'integer', 'min:1', 'max:99'],
            'news_imgs' => 'required|array|max:20',
            'news_imgs.*' => 'image|mimes:jpg,jpeg,png,webp|max:10000',
        ],[
            'faculty_id.required' => 'Choose the faculty or department.',
            'news_title.required' => 'News Title is must.',
            'news_desc.required' => 'News Description is must.',
            'news_date.required' => 'News Date is must.',
            'news_imgs.required' => 'News Image is must.',
        ]);

        $incomingFields['news_by'] = auth()->user()->id ;

        // Description comes from the HTML editor: keep only safe formatting.
        if (\App\Support\RichText::isEmpty($incomingFields['news_desc'])) {
            return back()->withInput()->withErrors(['news_desc' => 'News Description is must.']);
        }
        $incomingFields['news_desc'] = \App\Support\RichText::clean($incomingFields['news_desc']);
        // Faculty / department chosen in the form (validated above).
        // New news is published at once unless "Publish now" is unticked.
        $incomingFields['news_status'] = $request->boolean('publish', true) ? 1 : 0;

        foreach($request->file('news_imgs') as $image)
            {
                // SECURITY: never trust the client filename; re-encode as JPEG.
                $name = \Illuminate\Support\Str::random(32).'.jpg';
                $destinationPathThumbnail = public_path('/storage/news_imgs');
                $img = Image::make($image->path());
                $img->fit(570, 320);
                $img->save($destinationPathThumbnail.'/'.$name, 85, 'jpg');
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
    public function showNews(){
        // All news that is not deleted, published or hidden, so admins can manage every item.
        return view("admin.add_news" , ['news' => News::forAdmin()]);
    }

    public function newsStatus($news_id , $news_status){

        if (News::where('id', $news_id)->where('del', 0)->update(['news_status' => $news_status === '1' ? 1 : 0])){
            return redirect('/add_news')->with('success', $news_status === '1' ? 'News published.' : 'News hidden from the website.');
        }

        return redirect('/add_news')->with('failure','Error while updating news status !');
    }

    public function showEditForm(News $news){

        return view("admin.edit_news" , ['news' => $news]);
    }

    public function editNews(Request $request , News $news ){

        $incomingFields = $request->validate([
            'news_title' => ['required' , 'min:5' , 'max:100'  ] ,
            'news_desc' =>['required' ] ,
            'news_date' => ['required'],
            'faculty_id' => ['required', 'string', \Illuminate\Validation\Rule::in(array_map('strval', array_keys(\App\Models\MainApp::facultyCodes())))],
            'home_order' => ['nullable', 'integer', 'min:1', 'max:99'],
            'news_imgs_old'=>['nullable','string'],
            'news_imgs'=>['nullable','array','max:20'],
            'news_imgs.*'=>['image','mimes:jpg,jpeg,png,webp','max:10000'],
        ],[
            'news_title.required' => 'News Title is must.',
            'news_desc.required' => 'News Description is must.',
            'news_date.required' => 'News Date is must.',
            'news_imgs.required' => 'News Image is must.',
        ]);

        $incomingFields['news_by'] = auth()->user()->id ;

        // Description comes from the HTML editor: keep only safe formatting.
        if (\App\Support\RichText::isEmpty($incomingFields['news_desc'])) {
            return back()->withInput()->withErrors(['news_desc' => 'News Description is must.']);
        }
        $incomingFields['news_desc'] = \App\Support\RichText::clean($incomingFields['news_desc']);
        // Faculty / department chosen in the form (validated above).

            if ($request->hasFile('news_imgs')) {

                foreach($incomingFields['news_imgs']  as $image)
                    {

                        $name = \Illuminate\Support\Str::random(32).'.jpg';
                        $destinationPathThumbnail = public_path('/storage/news_imgs');
                        $img = Image::make($image->path());
                        $img->fit(570, 320);
                        $img->save($destinationPathThumbnail.'/'.$name, 85, 'jpg');
                        $data[] = $name;
                        $fileNameToStore = implode (",", $data);

                   if(!empty($incomingFields['news_imgs_old'])) {

                        foreach(explode(',', $incomingFields['news_imgs_old']) as $image){
                            // SECURITY: basename() blocks ../ path traversal deletes.
                            $image_path = public_path().'/storage/news_imgs/'.basename($image);
                           File::delete($image_path);
                        }
                    }
                }
    
                $incomingFields['news_imgs'] = $fileNameToStore ;
            }else{
                $incomingFields['news_imgs'] = $incomingFields['news_imgs_old'] ;
            }
            
            // strip_tags($incomingFields) ;
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
                $image_path = public_path().'/storage/news_imgs/'.basename($image);
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
