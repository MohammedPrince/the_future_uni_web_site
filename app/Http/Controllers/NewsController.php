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

        // Unknown or deleted news gives a 404 page (was a 500 error).
        $news = News::published()->findOrFail((int) base64_decode($news_id));

        return view('client.News-Details', [
            'news' => $news,
            'news_office' => MainApp::getFacultiesAndOffices($news->faculty_id),
        ]);
    }


    /** News & Events page: news and events together, newest first, 10 per page. */
    public function NewsAndEvents(Request $request){

        $all = \App\Support\NewsFeed::newestFirst();
        $perPage = 10;
        $page = max(1, (int) $request->query('page', 1));
        $items = new \Illuminate\Pagination\LengthAwarePaginator(
            $all->forPage($page, $perPage)->values(),
            $all->count(),
            $perPage,
            $page,
            ['path' => route('NewsAndEvents')]
        );

        if ($page > 1 && $items->isEmpty()) {
            abort(404);
        }

        return view('client.News-and-Events', ['items' => $items]);
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

        // SECURITY: never trust the client filename; images are re-encoded as JPEG.
        $incomingFields['news_imgs'] = implode(',', \App\Support\PostImages::store($request->file('news_imgs'), 'news_imgs'));

        $news = News::create($incomingFields);

        if ($news){
            return redirect()->route('news_events.manage', ['tab' => 'news'])->with('success',''.$incomingFields['news_title']. ' Created Successfully !');
        }else{
            return redirect()->route('news_events.manage', ['tab' => 'news'])->with('failure','Error While Creating '.$incomingFields['news_title']. ' !');
        }


    }
    public function newsStatus($news_id , $news_status){

        if (News::where('id', $news_id)->where('del', 0)->update(['news_status' => $news_status === '1' ? 1 : 0])){
            return redirect()->route('news_events.manage', ['tab' => 'news'])->with('success', $news_status === '1' ? 'News published.' : 'News hidden from the website.');
        }

        return redirect()->route('news_events.manage', ['tab' => 'news'])->with('failure','Error while updating news status !');
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
            'news_imgs_remove'=>['nullable','array'],
            'news_imgs_remove.*'=>['string'],
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

        // Images: keep the current ones (from the database, not the form) except the
        // ticked ones, and add the new uploads after them.
        $remove = $incomingFields['news_imgs_remove'] ?? [];
        $uploads = $request->file('news_imgs', []);
        if (count(\App\Support\PostImages::list($news->news_imgs)) - count($remove) + count($uploads) > \App\Support\PostImages::MAX) {
            return back()->withInput()->withErrors(['news_imgs' => 'A news item can have up to ' . \App\Support\PostImages::MAX . ' images.']);
        }
        $images = \App\Support\PostImages::update($news->news_imgs, $remove, $uploads, 'news_imgs');
        if ($images === null) {
            return back()->withInput()->withErrors(['news_imgs_remove' => 'Keep at least one image, or upload a new one.']);
        }
        $incomingFields['news_imgs'] = $images;
        unset($incomingFields['news_imgs_remove']);

            if(  $news ->update($incomingFields)){

                return redirect()->route('news_events.manage', ['tab' => 'news'])->with('success','News Successfully Updated !');
            }else{
                return redirect()->route('news_events.manage', ['tab' => 'news'])->with('failure','Error While Update News !');
            }
    }

    public function deleteNews($news_id){

        $news_imgs = News :: GetNewsColumn('news_imgs',$news_id);
        $images = explode(",", $news_imgs);
        
        if (News::where('id', $news_id)->update(['del' => '1'])){

            foreach($images as $image){
                $image_path = public_path().'/storage/news_imgs/'.basename($image);
                $del = File::delete($image_path);
                File::delete($image_path . '.webp');
             }

             if($del){
                    return redirect()->route('news_events.manage', ['tab' => 'news'])->with('success','News Deleted Successfully !');
            }else{
                    return redirect()->route('news_events.manage', ['tab' => 'news'])->with('failure','File Not exists or already deleted !');
                }
        }else{
            return redirect()->route('news_events.manage', ['tab' => 'news'])->with('failure','Error While Deleting News !');
        }
    }

}
