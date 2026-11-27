<?php

namespace Tests\Feature;

use App\Models\Events;
use App\Models\News;
use App\Models\User;
use App\Support\PostImages;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

/**
 * Admin > News & Events (one page), several images per item, home cards,
 * and changing your own password on /profile.
 * fu_news, fu_events and users are MyISAM: every test deletes what it made.
 *
 *   php artisan test --filter=NewsEventsAdminTest
 */
class NewsEventsAdminTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        config(['cache.stores.pages' => ['driver' => 'array']]);
        Cache::store('pages')->forever('visitor:' . sha1('127.0.0.1'), 1);
    }

    private function admin(): User
    {
        return (new User())->forceFill(['id' => 0, 'username' => 'test', 'user_fullname' => 'Test', 'isAdmin' => '1', 'del' => 0]);
    }

    private function newsFields(array $extra = []): array
    {
        return $extra + [
            'news_title' => 'Test multi image news ' . uniqid(),
            'news_desc' => '<p>Test text.</p>',
            'news_date' => '2026-11-27',
            'faculty_id' => '07',
            'publish' => '1',
        ];
    }

    private function forget(?News $news): void
    {
        if ($news) {
            PostImages::delete(PostImages::list($news->news_imgs), 'news_imgs');
            News::whereKey($news->id)->delete();
        }
    }

    public function test_news_and_events_are_managed_on_one_page()
    {
        $this->actingAs($this->admin())->get('/add_news')->assertRedirect(route('news_events.manage', ['tab' => 'news']));
        $this->actingAs($this->admin())->get('/add_event')->assertRedirect(route('news_events.manage', ['tab' => 'event']));

        $html = $this->actingAs($this->admin())->get('/manage_news_events?tab=event')->assertOk()
            ->assertSee('All News &amp; Events', false)
            ->assertSee('action="' . url('add_news') . '"', false)
            ->assertSee('action="' . url('add_event') . '"', false)
            ->assertSee('name="news_imgs[]" multiple', false)
            ->assertSee('name="event_imgs[]" multiple', false)
            ->getContent();

        // The event form is the open one; the news form waits behind its tab.
        $this->assertMatchesRegularExpression('#data-ne-panel="news"\s+hidden#', $html);
        $this->assertDoesNotMatchRegularExpression('#data-ne-panel="event"\s+hidden#', $html);

        // One menu item instead of two.
        $this->assertStringContainsString('News &amp; Events</span>', $html);
        $this->assertStringNotContainsString('Manage Events</span>', $html);
    }

    public function test_several_images_are_saved_and_the_edit_page_adds_and_removes_them()
    {
        $news = null;
        try {
            $this->actingAs($this->admin())->post('/add_news', $this->newsFields([
                'news_title' => $title = 'Test multi image news ' . uniqid(),
                'news_imgs' => [UploadedFile::fake()->image('a.jpg', 800, 500), UploadedFile::fake()->image('b.png', 600, 600), UploadedFile::fake()->image('c.jpg', 400, 300)],
            ]))->assertRedirect(route('news_events.manage', ['tab' => 'news']))->assertSessionHasNoErrors();

            $news = News::where('news_title', $title)->firstOrFail();
            [$a, $b, $c] = PostImages::list($news->news_imgs);
            foreach ([$a, $b, $c] as $file) {
                $this->assertFileExists(public_path('storage/news_imgs/' . $file));
            }

            // The list shows the cover and the number of images.
            $this->actingAs($this->admin())->get('/manage_news_events')->assertSee($title)->assertSee('3 images');

            // Edit: remove the second, add one more. A name that is not this item's is ignored.
            $this->actingAs($this->admin())->post(route('editnews_submit', $news->id), $this->newsFields([
                'news_title' => $title,
                'news_imgs_remove' => [$b, '../../index.php', 'not-mine.jpg'],
                'news_imgs' => [UploadedFile::fake()->image('d.jpg', 500, 500)],
            ]))->assertSessionHasNoErrors();

            $now = PostImages::list($news->fresh()->news_imgs);
            $this->assertCount(3, $now);
            $this->assertSame([$a, $c], array_slice($now, 0, 2), 'Kept images stay first, in order.');
            $this->assertFileDoesNotExist(public_path('storage/news_imgs/' . $b));
            $this->assertFileExists(public_path('index.php'));

            // Removing everything without a new upload is refused.
            $this->actingAs($this->admin())->post(route('editnews_submit', $news->id), $this->newsFields([
                'news_title' => $title,
                'news_imgs_remove' => $now,
            ]))->assertSessionHasErrors('news_imgs_remove');
            $this->assertSame($now, PostImages::list($news->fresh()->news_imgs));

            // The edit page offers a "Remove" box for every image.
            $this->actingAs($this->admin())->get("/edit_news/{$news->id}/edit")->assertOk()
                ->assertSee('name="news_imgs_remove[]" value="' . $now[2] . '"', false);

            // Home: the card has all images and a counter.
            $home = $this->get('/')->assertOk()->getContent();
            $this->assertStringContainsString('aria-label="3 photos"', $home);
            $this->assertStringContainsString('data-photos="', $home);
        } finally {
            $this->forget($news);
        }
    }

    public function test_the_why_cards_have_no_icons()
    {
        $html = $this->get('/')->assertOk()->getContent();
        $start = strpos($html, '<section class="fu-why">');
        $why = substr($html, $start, strpos($html, '</section>', $start) - $start);
        $this->assertStringContainsString('Embedded Learning', $why);
        $this->assertStringNotContainsString('fu-badge', $why);
        $this->assertStringNotContainsString('<svg', $why);
    }

    public function test_pages_start_loading_the_fonts_and_use_small_images()
    {
        foreach (['/', '/About-FU'] as $path) {
            $html = $this->get($path)->assertOk()->getContent();
            foreach ([400, 500, 700] as $w) {
                $this->assertStringContainsString('fonts/ubuntu-' . $w . '-latin.woff2" as="font"', $html, $path);
            }
            $this->assertStringContainsString('fu_logo-120.png', $html, $path);
        }
        $this->get('/')->assertSee('faculites/sm/', false);
        $this->assertFileExists(public_path('client/img/fu_logo-120.png.webp'));
    }

    public function test_admin_changes_their_own_password()
    {
        $user = User::create([
            'username' => 'pwtest' . random_int(1000, 9999), 'user_fullname' => 'Password Test', 'user_phone' => '0912345678',
            'user_email' => 'pwtest' . uniqid() . '@example.test', 'isAdmin' => '1', 'user_faculty' => '07',
            'password' => Hash::make('OldPassword123'),
        ]);
        try {
            $this->actingAs($user)->get('/profile')->assertOk()->assertSee('Change Password')->assertSee('name="current_password"', false);

            // Wrong current password, weak or mismatched new ones: nothing changes.
            $this->actingAs($user)->put('/profile/password', ['current_password' => 'nope', 'password' => 'NewPassword456', 'password_confirmation' => 'NewPassword456'])
                ->assertSessionHasErrors('current_password');
            $this->actingAs($user)->put('/profile/password', ['current_password' => 'OldPassword123', 'password' => 'short1', 'password_confirmation' => 'short1'])
                ->assertSessionHasErrors('password');
            $this->actingAs($user)->put('/profile/password', ['current_password' => 'OldPassword123', 'password' => 'NewPassword456', 'password_confirmation' => 'Other456789'])
                ->assertSessionHasErrors('password');
            $this->assertTrue(Hash::check('OldPassword123', $user->fresh()->password));

            $this->actingAs($user)->put('/profile/password', ['current_password' => 'OldPassword123', 'password' => 'NewPassword456', 'password_confirmation' => 'NewPassword456'])
                ->assertRedirect(route('profile'))->assertSessionHasNoErrors();
            $this->assertTrue(Hash::check('NewPassword456', $user->fresh()->password));

            // Guests cannot use it.
            auth()->logout();
            $this->put('/profile/password', ['current_password' => 'x'])->assertForbidden();
        } finally {
            User::whereKey($user->id)->delete();
        }
    }
    public function test_share_buttons_use_a_short_link()
    {
        $news = News::published()->first();
        $event = Events::published()->first();
        if (!$news || !$event) {
            $this->markTestSkipped('Needs a published news item and event in the local database.');
        }

        $this->get('/n/' . $news->id)->assertStatus(301)->assertRedirect(route('newsDetails', base64_encode($news->id)));
        $this->get('/e/' . $event->id)->assertStatus(301)->assertRedirect(route('eventDetails', base64_encode($event->id)));
        $this->get('/n/abc')->assertNotFound();
        $this->get('/n/99999999')->assertStatus(301); // and the full page then says 404

        $base = config('seo.url');
        $html = $this->get(route('newsDetails', base64_encode($news->id)))->assertOk()->getContent();
        $this->assertStringContainsString('data-share-copy="' . $base . '/n/' . $news->id . '"', $html);
        $this->assertStringContainsString(rawurlencode($base . '/n/' . $news->id), $html);
        $this->assertStringNotContainsString('data-share-copy="' . $base . '/News-Details/', $html);

        $html = $this->get(route('eventDetails', base64_encode($event->id)))->assertOk()->getContent();
        $this->assertStringContainsString('data-share-copy="' . $base . '/e/' . $event->id . '"', $html);
    }

    public function test_service_bars_have_their_animation()
    {
        $css = file_get_contents(public_path('client/dist/site.min.css'));
        $this->assertStringContainsString('.fu-bars', $css);
        $this->assertStringContainsString('fuBarShine', $css);
        $this->assertStringContainsString('skills-content', file_get_contents(public_path('client/dist/site.min.js')));
        foreach (['/CESD', '/CTS'] as $path) {
            $this->get($path)->assertOk()->assertSee('class="skills-content"', false);
        }
    }

    public function test_announcement_bar_stays_on_top_with_the_header()
    {
        foreach (['site.min.css', 'home.min.css'] as $file) {
            $css = file_get_contents(public_path('client/dist/' . $file));
            $this->assertStringContainsString('.fu-announce{position:-webkit-sticky;position:sticky;top:0', $css);
            $this->assertStringContainsString('.fu-announce~.fu-header{top:var(--fu-ann-h,42px)}', $css);
        }
        $this->assertStringContainsString('--fu-ann-h', file_get_contents(public_path('client/dist/site.min.js')));
    }

    public function test_facts_and_figures_page_has_cards_charts_and_tables()
    {
        $html = $this->get('/Facts-Figures')->assertOk()
            ->assertSee('New Intake from 2015')->assertSee('Foreign Students Faculty Wise')
            ->assertSee('1,122')->assertSee('Show the numbers')
            ->assertSee('chart.umd.js', false)
            ->getContent();
        foreach (['ffIntake', 'ffEnrolment', 'ffCountries', 'ffFaculties'] as $id) {
            $this->assertStringContainsString('id="' . $id . '"', $html);
        }
        $css = file_get_contents(public_path('client/dist/site.min.css'));
        foreach (['.fu-ff-row{', '.fu-ff-column{', '.fu-ff-grid{'] as $rule) {
            $this->assertStringContainsString($rule, $css, 'Chart heights must survive the CSS build.');
        }
    }
    public function test_details_pages_use_the_new_layout()
    {
        $news = News::published()->first();
        $event = Events::published()->first();
        if (!$news || !$event) {
            $this->markTestSkipped('Needs a published news item and event in the local database.');
        }
        foreach ([route('newsDetails', base64_encode($news->id)), route('eventDetails', base64_encode($event->id))] as $url) {
            $html = $this->get($url)->assertOk()->getContent();
            foreach (['fu-post-grid"', 'class="fu-post-meta"', 'class="fu-post-text" dir="auto"', 'Latest News &amp; Events', 'id="search-input"', 'class="share-box"'] as $part) {
                $this->assertStringContainsString($part, $html, $url);
            }
            // The page itself is not listed under "Latest".
            $this->assertStringNotContainsString('class="fu-side-post" href="' . $url . '"', $html);
        }
    }
}
