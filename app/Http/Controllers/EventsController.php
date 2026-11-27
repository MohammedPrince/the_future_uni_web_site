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

        $event = Events::published()->findOrFail((int) base64_decode($event_id));

        return view('client.Event-Details', [
            'event' => $event,
            'event_office' => MainApp::getFacultiesAndOffices($event->faculty_id),
        ]);
    }

    public function addEvent(Request $request){
        $incomingFields = $request->validate([
            'event_title' => ['required' , 'min:5' , 'max:100' , Rule::unique('fu_events' , 'event_title') ] ,
            'event_desc' =>['required' ] ,
            'event_time' => ['required'],
            'event_date' => ['required'],
            'faculty_id' => ['required', 'string', \Illuminate\Validation\Rule::in(array_map('strval', array_keys(\App\Models\MainApp::facultyCodes())))],
            'home_order' => ['nullable', 'integer', 'min:1', 'max:99'],
            'event_imgs' => 'required|array|max:20',
            'event_imgs.*' => 'image|mimes:jpg,jpeg,png,webp|max:10000',
        ],[
            'faculty_id.required' => 'Choose the faculty or department.',
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
        // Faculty / department chosen in the form (validated above).
        // New events are published at once unless "Publish now" is unticked.
        $incomingFields['event_status'] = $request->boolean('publish', true) ? 1 : 0;

        // SECURITY: never trust the client filename; images are re-encoded as JPEG.
        $incomingFields['event_imgs'] = implode(',', \App\Support\PostImages::store($request->file('event_imgs'), 'event_imgs'));

        if (Events::create(collect($incomingFields)->map(fn ($v, $k) => is_string($v) && $k !== 'event_desc' ? strip_tags($v) : $v)->all())){

            return redirect()->route('news_events.manage', ['tab' => 'event'])->with('success','Event '.$incomingFields['event_title']. ' Created Successfully !');
        }else{
            return redirect()->route('news_events.manage', ['tab' => 'event'])->with('failure','Error While Creating '.$incomingFields['event_title']. ' Event !');
        }
    }

    public function deleteEvent($event_id){

        $event_imgs = Events :: GetEventColumn('event_imgs',$event_id);
        $images = explode(",", $event_imgs);
        
        if (Events::where('id', $event_id)->update(['del' => '1'])){

            foreach($images as $image){
                $image_path = public_path().'/storage/event_imgs/'.basename($image);
                $del = File::delete($image_path);
                File::delete($image_path . '.webp');
             }

             if($del){
                    return redirect()->route('news_events.manage', ['tab' => 'event'])->with('success','Event Deleted Successfully !');
            }else{
                    return redirect()->route('news_events.manage', ['tab' => 'event'])->with('failure','File Not exists or already deleted !');
                }
        }else{
            return redirect()->route('news_events.manage', ['tab' => 'event'])->with('failure','Error While Deleting Event !');
        }
    }

    public function eventStatus($event_id , $event_status){

            if (Events::where('id', $event_id)->update(['event_status' => $event_status === '1' ? 1 : 0])){
                return redirect()->route('news_events.manage', ['tab' => 'event'])->with('success','Event status successfully updated!');
            }else{
                return redirect()->route('news_events.manage', ['tab' => 'event'])->with('failure','Error while updating event status !');
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
            'faculty_id' => ['required', 'string', \Illuminate\Validation\Rule::in(array_map('strval', array_keys(\App\Models\MainApp::facultyCodes())))],
            'home_order' => ['nullable', 'integer', 'min:1', 'max:99'],
            'event_imgs_remove' => ['nullable', 'array'],
            'event_imgs_remove.*' => ['string'],
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
        // Faculty / department chosen in the form (validated above).
    
        // Images: keep the current ones (from the database, not the form) except the
        // ticked ones, and add the new uploads after them.
        $remove = $incomingFields['event_imgs_remove'] ?? [];
        $uploads = $request->file('event_imgs', []);
        if (count(\App\Support\PostImages::list($event->event_imgs)) - count($remove) + count($uploads) > \App\Support\PostImages::MAX) {
            return back()->withInput()->withErrors(['event_imgs' => 'An event can have up to ' . \App\Support\PostImages::MAX . ' images.']);
        }
        $images = \App\Support\PostImages::update($event->event_imgs, $remove, $uploads, 'event_imgs');
        if ($images === null) {
            return back()->withInput()->withErrors(['event_imgs_remove' => 'Keep at least one image, or upload a new one.']);
        }
        $incomingFields['event_imgs'] = $images;
        unset($incomingFields['event_imgs_remove']);
    
        // Update event
        if ($event->update($incomingFields)) {
            return redirect()->route('news_events.manage', ['tab' => 'event'])->with('success', 'Event Successfully Updated!');
        } else {
            return redirect()->route('news_events.manage', ['tab' => 'event'])->with('failure', 'Error While Updating Event!');
        }
    }





}
