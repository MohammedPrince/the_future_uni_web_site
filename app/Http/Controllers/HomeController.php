<?php

namespace App\Http\Controllers;

use App\Models\HomeSlide;
use App\Models\Testimonial;
use App\Support\NewsFeed;
use Illuminate\Support\Collection;

class HomeController extends Controller
{
    /** Cards in the News & Events slider on the home page. */
    private const HOME_ITEMS = 9;

    public function index()
    {
        $items = NewsFeed::homeOrder(NewsFeed::all())->take(self::HOME_ITEMS)->values();

        return view('client.Home', [
            'slides' => rescue(fn () => HomeSlide::ordered()->where('is_visible', true)->get(), collect(), false),
            'testimonials' => rescue(fn () => Testimonial::ordered()->where('is_visible', true)->get(), collect(), false),
            'homeItems' => $items,
            'news_value' => $items->isNotEmpty(),
            'event_value' => false,
        ]);
    }

    /** Items with a home order first (1, 2, 3 ...), then the rest, newest first. */
    public static function homeOrder(Collection $items): Collection
    {
        return NewsFeed::homeOrder($items);
    }
}
