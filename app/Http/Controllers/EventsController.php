<?php

namespace App\Http\Controllers;

use File;
use App\Models\News;
use App\Models\User;
use App\Models\Events;
use App\Models\MainApp;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class EventsController extends Controller
{

    
    public function viewEvents(Events $events){

        $event_value = false;

        if($events->getTheLastTwoEvents()==null){

            $event_value = false;
        }else{
    
            $event_value = true;
        }

        return view("client.Home" , ['events' => $events->getTheLastTwoEvents() , 'event_value' =>$event_value]);
    }

    public function viewNewsInEvents(News $news){

        $news_value = false;

        if($news->getNews()==null){

            $news_value = false;
        }else{
    
            $news_value = true;
        }
        
       // return view("client.event_details" , ['news' => $news->getNews() , 'news_value' =>$news_value]);
    }


    public function eventDetails($event_id){

        $news='';
        $news_faculty_id='';
        $news_value = false;
        $new_event_id = (int) base64_decode($event_id);
        $event = Events::published()->findOrFail($new_event_id);

        $faculty_id = Events :: GetEventColumn('faculty_id',$new_event_id);
        $event_by_id = Events :: GetEventColumn('event_by',$new_event_id);

        $event_office = MainApp::getFacultiesAndOffices($faculty_id) ;

        $user_name = MainApp::GetUserDetails('user_fullname',$event_by_id);

       ///strip_tags(Str::markdown($event));

       if (News :: getNews() != null ){
            $news_value = true ;
            $news = News::getNews() ;


       }
      
        return view("client.Event-Details" , compact('event'),['event_office'=>$event_office,'event_by'=>$user_name,'news'=>$news,'news_value' =>$news_value]);
    }

    public function addEvent(Request $request){
        $incomingFields = $request->validate([
            'event_title' => ['required' , 'min:5' , 'max:100' , Rule::unique('fu_events' , 'event_title') ] ,
            'event_desc' =>['required' ] ,
            'event_time' => ['required'],
            'event_date' => ['required'],
            'event_imgs' => 'required|array|max:20',
            'event_imgs.*' => 'image|mimes:jpg,jpeg,png,webp|max:10000',
        ],[
            'event_title.required' => 'Event Title is must.',
            'event_desc.required' => 'Event Description is must.',
            'event_time.required' => 'Event Time is must.',
            'event_date.required' => 'Event Date is must.',
            'event_imgs.required' => 'Event Image is must.',
        ]);

        $incomingFields['event_by'] = auth()->user()->id ;

        // Description comes from the HTML editor: keep only safe formatting.
        if (\App\Support\RichText::isEmpty($incomingFields['event_desc'])) {
            return back()->withInput()->withErrors(['event_desc' => 'Event Description is must.']);
        }
        $incomingFields['event_desc'] = \App\Support\RichText::clean($incomingFields['event_desc']);
        $incomingFields['faculty_id'] = auth()->user()->user_faculty ;
        // New events are published at once unless "Publish now" is unticked.
        $incomingFields['event_status'] = $request->boolean('publish', true) ? 1 : 0;

        foreach($request->file('event_imgs') as $image)
            {
                // SECURITY: never trust the client filename; re-encode as JPEG.
                // (Also fixes a bug: the file was saved under the client name but
                // the DB recorded $img_name, so the image never displayed.)
                $img_name = \Illuminate\Support\Str::random(32).'.jpg';

                $destinationPathThumbnail = public_path('/storage/event_imgs');
                $img = Image::make($image->path());

                $img->fit(570, 320);
                $img->save($destinationPathThumbnail.'/'.$img_name, 85, 'jpg');
                $data[] = $img_name;  
                $fileNameToStore = implode (",", $data);
            }

            $incomingFields['event_imgs'] = $fileNameToStore ;

        if (Events::create(collect($incomingFields)->map(fn ($v, $k) => is_string($v) && $k !== 'event_desc' ? strip_tags($v) : $v)->all())){

            return redirect('/add_event')->with('success','Event '.$incomingFields['event_title']. ' Created Successfully !');
        }else{
            return redirect('/add_event')->with('failure','Error While Creating '.$incomingFields['event_title']. ' Event !');
        }
    }

    public function showEvents(){
        // All events that are not deleted, published or hidden. (Before, new events
        // were saved hidden and this list showed only published ones, so they vanished.)
        return view("admin.add_events" , ['events' => Events::forAdmin()]);
    }

    public function deleteEvent($event_id){

        $event_imgs = Events :: GetEventColumn('event_imgs',$event_id);
        $images = explode(",", $event_imgs);
        
        if (Events::where('id', $event_id)->update(['del' => '1'])){

            foreach($images as $image){
                $image_path = public_path().'/storage/event_imgs/'.basename($image);
                $del = File::delete($image_path);
             }

             if($del){
                    return redirect('/add_event')->with('success','Event Deleted Successfully !');
            }else{
                    return redirect('/add_event')->with('failure','File Not exists or already deleted !');
                }
        }else{
            return redirect('/add_event')->with('failure','Error While Deleting Event !');
        }
    }

    public function eventStatus($event_id , $event_status){

            if (Events::where('id', $event_id)->update(['event_status' => $event_status === '1' ? 1 : 0])){
                return redirect('/add_event')->with('success','Event status successfully updated!');
            }else{
                return redirect('/add_event')->with('failure','Error while updating event status !');
            }
    }

    public function showEditForm(Events $event){

        return view("admin.edit_events" , ['event' => $event,'action' => 'edit']);
    }

    public function editEvent(Request $request, Events $event)
    {
        $incomingFields = $request->validate([
            'event_title' => ['required', 'min:5', 'max:100'],
            'event_desc' => ['required'],
            'event_time' => ['required'],
            'event_date' => ['required'],
            'event_imgs_old' => ['nullable', 'string'],
            'event_imgs' => ['nullable', 'array', 'max:20'],
            'event_imgs.*' => ['image', 'mimes:jpg,jpeg,png,webp', 'max:10000'],
        ], [
            'event_title.required' => 'Event Title is must.',
            'event_desc.required' => 'Event Description is must.',
            'event_time.required' => 'Event Time is must.',
            'event_date.required' => 'Event Date is must.',
        ]);
    
        $incomingFields['event_by'] = auth()->user()->id;

        // Description comes from the HTML editor: keep only safe formatting.
        if (\App\Support\RichText::isEmpty($incomingFields['event_desc'])) {
            return back()->withInput()->withErrors(['event_desc' => 'Event Description is must.']);
        }
        $incomingFields['event_desc'] = \App\Support\RichText::clean($incomingFields['event_desc']);
        $incomingFields['faculty_id'] = auth()->user()->user_faculty;
    
        // Handle image uploads
        if ($request->hasFile('event_imgs')) {
            $data = [];
            foreach ($incomingFields['event_imgs'] as $image) {
                $name = \Illuminate\Support\Str::random(32).'.jpg';
                $destinationPathThumbnail = public_path('/storage/event_imgs');
                $img = Image::make($image->path());
                $img->fit(570, 320);
                $img->save($destinationPathThumbnail.'/'.$name, 85, 'jpg');
                $data[] = $name;
            }

            // Delete old images if new images are uploaded
            if (!empty($incomingFields['event_imgs_old'])) {
                foreach (explode(',', $incomingFields['event_imgs_old']) as $oldImage) {
                    // SECURITY: basename() blocks ../ path traversal deletes.
                    $image_path = public_path('/storage/event_imgs/'.basename($oldImage));
                    if (File::exists($image_path)) {
                        File::delete($image_path);
                    }
                }
            }
    
            $incomingFields['event_imgs'] = implode(",", $data);
        } else {
            $incomingFields['event_imgs'] = $incomingFields['event_imgs_old'];
        }
    
        // Update event
        if ($event->update($incomingFields)) {
            return redirect('/add_event')->with('success', 'Event Successfully Updated!');
        } else {
            return redirect('/add_event')->with('failure', 'Error While Updating Event!');
        }
    }





}
