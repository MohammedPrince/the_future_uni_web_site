<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\MainApp;
use App\Models\News;
use App\Support\PostImages;
use Illuminate\Http\Request;

/**
 * Admin > News & Events: add news or an event, and manage both in one list.
 * Saving still goes through NewsController and EventsController.
 */
class NewsEventsAdminController extends Controller
{
    public function index(Request $request)
    {
        $tab = old('form', $request->query('tab')) === 'event' ? 'event' : 'news';

        $news = News::forAdmin()->map(fn (News $n) => [
            'type' => 'News',
            'title' => $n->news_title,
            'date' => (string) $n->news_date,
            'time' => '',
            'faculty' => MainApp::getFacultiesAndOffices($n->faculty_id),
            'by' => optional($n->users)->user_fullname,
            'order' => $n->home_order,
            'images' => PostImages::list($n->news_imgs),
            'folder' => 'news_imgs',
            'published' => (string) $n->news_status === '1',
            'base' => 'add_news/' . $n->id,
            'edit' => url('edit_news/' . $n->id . '/edit'),
            'view' => route('newsDetails', base64_encode($n->id)),
            'sort' => $n->news_date . ' ' . $n->created_at,
        ]);

        $events = Events::forAdmin()->map(fn (Events $e) => [
            'type' => 'Event',
            'title' => $e->event_title,
            'date' => (string) $e->event_date,
            'time' => (string) $e->event_time,
            'faculty' => MainApp::getFacultiesAndOffices($e->faculty_id),
            'by' => optional($e->users)->user_fullname,
            'order' => $e->home_order,
            'images' => PostImages::list($e->event_imgs),
            'folder' => 'event_imgs',
            'published' => (string) $e->event_status === '1',
            'base' => 'add_event/' . $e->id,
            'edit' => route('edit_event', $e->id),
            'view' => route('eventDetails', base64_encode($e->id)),
            'sort' => $e->event_date . ' ' . $e->created_at,
        ]);

        $items = $news->concat($events)->sortByDesc('sort')->values();

        return view('admin.news_events', [
            'items' => $items,
            'tab' => $tab,
            'counts' => [
                'news' => $news->count(),
                'events' => $events->count(),
                'hidden' => $items->where('published', false)->count(),
            ],
        ]);
    }
}
