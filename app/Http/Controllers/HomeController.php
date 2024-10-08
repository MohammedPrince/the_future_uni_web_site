<?php

namespace App\Http\Controllers;
use App\Models\News;
use App\Models\Events;
use App\Http\Controllers\VisitorController;



use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $news = '';
        $events = '';
        $event_value = false;
        $news_value = false;

        if (News::getNews() != null) {

            $news_value = true;
            //$news = News::getNews() ;
            $news = News::paginate(3);

            $shuffledNews = $news->getCollection()->shuffle();


            $news->setCollection($shuffledNews);

        }

        if (Events::getEvents() != null) {
            $event_value = true;
            //$events = Events::getEvents() ;
            $events = Events::paginate(3);

            $shuffledEvents = $events->getCollection()->shuffle();

            // Replace the original collection with the shuffled one
            $events->setCollection($shuffledEvents);
        }

        $visitorController = new VisitorController();
        $visitorController->user_log($request);
        

        return view("client.Home", compact('events'), ['news' => $news, 'events' => $events, 'news_value' => $news_value, 'event_value' => $event_value]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
