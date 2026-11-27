<?php

namespace Tests\Feature;

use App\Models\Events;
use App\Models\News;
use App\Support\ImageUploads;
use App\Support\NewsFeed;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;
use Tests\TestCase;

/**
 * News & Events list, details pages (whole picture, share buttons, no author name).
 * Read-only: uses the news and events already in the local database.
 *
 *   php artisan test --filter=NewsPagesTest
 */
class NewsPagesTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        config(['cache.stores.pages' => ['driver' => 'array']]);
        Cache::store('pages')->forever('visitor:' . sha1('127.0.0.1'), 1);
    }

    public function test_list_shows_news_and_events_newest_first()
    {
        $feed = NewsFeed::newestFirst();
        if ($feed->where('type', 'Event')->isEmpty() || $feed->where('type', 'News')->isEmpty()) {
            $this->markTestSkipped('Needs published news and events in the local database.');
        }

        $html = $this->get('/News-and-Events')->assertOk()->getContent();

        // Links are unique (titles may repeat, e.g. "test" inside "test II").
        $positions = $feed->take(10)->map(fn ($item) => strpos($html, '<h3><a href="' . e($item['url']) . '">'))->all();
        $this->assertNotContains(false, $positions, 'Every item of page 1 is listed');
        $sorted = $positions;
        sort($sorted);
        $this->assertSame($sorted, $positions, 'Newest first');
        $this->assertStringContainsString('<span class="ne-type">Event</span>', $html);

        $dates = $feed->pluck('sort')->all();
        $desc = $dates;
        rsort($desc);
        $this->assertSame($desc, $dates);
    }

    public function test_unknown_list_page_is_404()
    {
        $this->get('/News-and-Events?page=999')->assertNotFound();
    }

    public function test_details_pages_show_share_buttons_and_no_author()
    {
        $news = News::published()->first();
        $event = Events::published()->first();
        if (!$news || !$event) {
            $this->markTestSkipped('Needs a published news item and event.');
        }

        foreach ([
            '/News-Details/' . base64_encode($news->id) => [optional($news->users)->user_fullname, '/n/' . $news->id],
            '/Event-Details/' . base64_encode($event->id) => [optional($event->users)->user_fullname, '/e/' . $event->id],
        ] as $path => [$author, $short]) {
            $html = $this->get($path)->assertOk()->getContent();
            // The short address is shared (it opens the full page).
            $url = rawurlencode('https://fu.edu.sd' . $short);

            $this->assertStringContainsString('https://www.facebook.com/sharer/sharer.php?u=' . $url, $html, $path);
            $this->assertStringContainsString('https://wa.me/?text=', $html, $path);
            $this->assertStringContainsString('https://twitter.com/intent/tweet?url=' . $url, $html, $path);
            $this->assertStringContainsString('https://www.linkedin.com/sharing/share-offsite/?url=' . $url, $html, $path);
            $this->assertStringContainsString('data-share-copy=', $html, $path);
            $this->assertStringContainsString('class="post-full-img"', $html, $path);
            $this->assertStringNotContainsString('fa-user', $html, $path);
            if ($author) {
                $this->assertStringNotContainsString(e($author), $html, $path);
            }
        }
    }

    public function test_uploaded_pictures_are_kept_whole()
    {
        // A tall poster stays a tall poster (it used to be cut to 570 x 320).
        $poster = Image::canvas(1273, 1281, '#1d5191');
        ImageUploads::keepWhole($poster);
        $this->assertSame([1273, 1281], [$poster->width(), $poster->height()]);

        // A huge photo is only made smaller, with the same shape.
        $big = Image::canvas(4000, 2000, '#fb8b24');
        ImageUploads::keepWhole($big);
        $this->assertSame([1600, 800], [$big->width(), $big->height()]);
    }
}
