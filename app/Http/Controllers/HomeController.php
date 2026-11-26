<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\HomeSlide;
use App\Models\News;
use App\Models\Testimonial;
use App\Support\RichText;
use Illuminate\Support\Collection;

class HomeController extends Controller
{
    /** Cards in the News & Events slider on the home page. */
    private const HOME_ITEMS = 9;

    public function index()
    {
        $items = $this->newsAndEvents();

        return view('client.Home', [
            'slides' => rescue(fn () => HomeSlide::ordered()->where('is_visible', true)->get(), collect(), false),
            'testimonials' => rescue(fn () => Testimonial::ordered()->where('is_visible', true)->get(), collect(), false),
            'homeItems' => $items,
            'news_value' => $items->isNotEmpty(),
            'event_value' => false,
        ]);
    }

    /**
     * News and events together: items with a home order first (1, 2, 3 ...),
     * then the rest, newest first.
     */
    private function newsAndEvents(): Collection
    {
        $news = News::published()
            ->orderByRaw('home_order IS NULL, home_order')->orderByDesc('news_date')->orderByDesc('id')
            ->take(self::HOME_ITEMS)->get()
            ->map(fn ($n) => [
                'type' => 'News',
                'title' => $n->news_title,
                'date' => (string) $n->news_date,
                'meta' => date('d-M-Y | h:i A', strtotime($n->created_at)),
                'image' => $this->firstImage('storage/news_imgs/', $n->news_imgs),
                'excerpt' => RichText::excerpt($n->news_desc, 50),
                'url' => route('newsDetails', base64_encode($n->id)),
                'order' => $n->home_order,
                'sort' => $n->news_date . ' ' . $n->created_at,
            ]);

        $events = Events::published()
            ->orderByRaw('home_order IS NULL, home_order')->orderByDesc('event_date')->orderByDesc('id')
            ->take(self::HOME_ITEMS)->get()
            ->map(fn ($e) => [
                'type' => 'Event',
                'title' => $e->event_title,
                'date' => (string) $e->event_date,
                'meta' => date('d-M-Y', strtotime($e->event_date))
                    . (strtotime((string) $e->event_time) ? ' | ' . date('h:i A', strtotime($e->event_time)) : ''),
                'image' => $this->firstImage('storage/event_imgs/', $e->event_imgs),
                'excerpt' => RichText::excerpt($e->event_desc, 50),
                'url' => route('eventDetails', base64_encode($e->id)),
                'order' => $e->home_order,
                'sort' => $e->event_date . ' ' . $e->created_at,
            ]);

        return self::homeOrder($news->concat($events))->take(self::HOME_ITEMS)->values();
    }

    /** Items with a home order first (1, 2, 3 ...), then the rest, newest first. */
    public static function homeOrder(Collection $items): Collection
    {
        return $items->sort(function ($a, $b) {
            if (($a['order'] === null) !== ($b['order'] === null)) {
                return $a['order'] === null ? 1 : -1;
            }
            if ($a['order'] !== null && $a['order'] !== $b['order']) {
                return $a['order'] <=> $b['order'];
            }

            return strcmp($b['sort'], $a['sort']);
        })->values();
    }

    private function firstImage(string $folder, ?string $images): ?string
    {
        $first = trim(explode(',', (string) $images)[0] ?? '');

        return $first === '' ? null : $folder . basename($first);
    }
}
