<?php

namespace App\Support;

use App\Models\Events;
use App\Models\News;
use Illuminate\Support\Collection;

/**
 * Published news and events as one list of cards, for the home page slider
 * and the News & Events page. Every card is an array:
 * type, title, date, meta, image (the cover), images (all), excerpt, url, order, sort.
 */
class NewsFeed
{
    /** Newest first (by date, then by when it was added). */
    public static function newestFirst(): Collection
    {
        return self::all()->sortByDesc('sort')->values();
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

    public static function all(): Collection
    {
        $news = News::published()->get()->map(fn ($n) => [
            'type' => 'News',
            'title' => $n->news_title,
            'date' => (string) $n->news_date,
            'meta' => date('d-M-Y | h:i A', strtotime($n->created_at)),
            'image' => self::firstImage('storage/news_imgs/', $n->news_imgs),
            'images' => self::images('storage/news_imgs/', $n->news_imgs),
            'excerpt' => RichText::excerpt($n->news_desc, 50),
            'url' => route('newsDetails', base64_encode($n->id)),
            'order' => $n->home_order,
            'sort' => $n->news_date . ' ' . $n->created_at,
        ]);

        $events = Events::published()->get()->map(fn ($e) => [
            'type' => 'Event',
            'title' => $e->event_title,
            'date' => (string) $e->event_date,
            'meta' => date('d-M-Y', strtotime($e->event_date))
                . (strtotime((string) $e->event_time) ? ' | ' . date('h:i A', strtotime($e->event_time)) : ''),
            'image' => self::firstImage('storage/event_imgs/', $e->event_imgs),
            'images' => self::images('storage/event_imgs/', $e->event_imgs),
            'excerpt' => RichText::excerpt($e->event_desc, 50),
            'url' => route('eventDetails', base64_encode($e->id)),
            'order' => $e->home_order,
            'sort' => $e->event_date . ' ' . $e->created_at,
        ]);

        return $news->concat($events)->values();
    }

    private static function images(string $folder, ?string $images): array
    {
        return array_map(fn ($f) => $folder . $f, PostImages::list($images));
    }

    private static function firstImage(string $folder, ?string $images): ?string
    {
        $first = trim(explode(',', (string) $images)[0] ?? '');

        return $first === '' ? null : $folder . basename($first);
    }
}
