<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\FeeItem;
use App\Models\News;
use App\Models\Setting;
use App\Models\User;

/** Admin home: what is on the site now, and shortcuts to change it. */
class DashboardController extends Controller
{
    public function index()
    {
        $count = fn (callable $query) => rescue($query, 0, false);

        return view('admin.dashboard', [
            'stats' => [
                'news' => $count(fn () => News::where('del', 0)->where('news_status', 1)->count()),
                'news_hidden' => $count(fn () => News::where('del', 0)->where('news_status', '!=', 1)->count()),
                'events' => $count(fn () => Events::where('del', 0)->where('event_status', 1)->count()),
                'events_hidden' => $count(fn () => Events::where('del', 0)->where('event_status', '!=', 1)->count()),
                'fees' => $count(fn () => FeeItem::where('is_visible', true)->count()),
                'users' => $count(fn () => User::where('del', 0)->count()),
                'visitors' => $count(fn () => (new VisitorController())->getVisitorCount()),
            ],
            'latestNews' => rescue(fn () => News::where('del', 0)->orderByDesc('news_date')->orderByDesc('id')->take(5)->get(), collect(), false),
            'latestEvents' => rescue(fn () => Events::where('del', 0)->orderByDesc('event_date')->orderByDesc('id')->take(5)->get(), collect(), false),
            'maintenance' => Setting::enabled('maintenance_enabled'),
            'announcement' => Setting::enabled('announcement_enabled') ? Setting::get('announcement_text') : null,
        ]);
    }
}
