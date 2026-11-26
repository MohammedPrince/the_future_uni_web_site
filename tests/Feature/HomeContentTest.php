<?php

namespace Tests\Feature;

use App\Http\Controllers\HomeController;
use App\Models\HomeSlide;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Tests\TestCase;

/**
 * Home slider, testimonials, News & Events slider, faculty / home order fields.
 * Database changes are rolled back (InnoDB tables only); uploaded files are removed.
 *
 *   php artisan test --filter=HomeContentTest
 */
class HomeContentTest extends TestCase
{
    use DatabaseTransactions;

    protected function setUp(): void
    {
        parent::setUp();
        config(['cache.stores.pages' => ['driver' => 'array']]);
        Cache::store('pages')->forever('visitor:' . sha1('127.0.0.1'), 1);
    }

    protected function tearDown(): void
    {
        foreach (HomeSlide::where('image', 'like', 'storage/slides/%')->get() as $slide) {
            foreach ($slide->widthList() as $w) {
                File::delete(public_path("{$slide->image}-{$w}.{$slide->ext}"));
            }
        }
        foreach (Testimonial::where('photo', 'like', 'storage/testimonials/%')->get() as $t) {
            File::delete([public_path($t->photo), public_path($t->photo . '.webp')]);
        }
        parent::tearDown();
    }

    private function admin(): User
    {
        return (new User())->forceFill(['id' => 0, 'username' => 'test', 'user_fullname' => 'Test', 'isAdmin' => '1', 'del' => 0]);
    }

    public function test_home_page_shows_slides_testimonials_and_the_news_slider()
    {
        $html = $this->get('/')->assertOk()->getContent();

        $first = HomeSlide::ordered()->where('is_visible', true)->first();
        $this->assertStringContainsString('<h1 class="hs-title"', $html);
        $this->assertStringContainsString(e($first->title), $html);
        $this->assertStringContainsString('rel="preload" as="image" fetchpriority="high" href="' . e($first->src()) . '"', $html);
        $this->assertStringContainsString('Alumni testimonials', $html);
        $this->assertStringContainsString(e(Testimonial::ordered()->where('is_visible', true)->first()->name), $html);
        $this->assertStringContainsString('data-ne-slider', $html);
    }

    public function test_hidden_slides_and_testimonials_are_not_shown()
    {
        $slide = HomeSlide::ordered()->get()->last();
        $slide->update(['is_visible' => false, 'title' => 'Hidden slide title']);
        Testimonial::query()->update(['is_visible' => false]);

        $this->get('/')->assertOk()
            ->assertDontSee('Hidden slide title')
            ->assertDontSee('Alumni testimonials');
    }

    public function test_admin_uploads_a_slide_in_several_sizes()
    {
        $this->actingAs($this->admin())->post('/home_slider', [
            'title' => 'Admission 2027 is open',
            'subtitle' => 'APPLY NOW',
            'button_text' => 'Apply',
            'button_url' => 'https://odms.fu.edu.sd/',
            'sort_order' => 1,
            'is_visible' => '1',
            'image' => UploadedFile::fake()->image('hero.jpg', 1800, 1200),
        ])->assertRedirect('/home_slider')->assertSessionHasNoErrors();

        $slide = HomeSlide::where('title', 'Admission 2027 is open')->firstOrFail();
        $this->assertSame([640, 1024, 1600], $slide->widthList(), 'No size larger than the upload');
        foreach ($slide->widthList() as $w) {
            $this->assertFileExists(public_path("{$slide->image}-{$w}.{$slide->ext}"));
        }
        $this->assertSame([1600, 1067], [(int) $slide->img_width, (int) $slide->img_height]);

        // Order 1 makes it the first slide, with the h1 and the preload.
        $this->get('/')->assertOk()->assertSee('<h1 class="hs-title" style="color:#ff8d51;">Admission 2027 is open</h1>', false)
            ->assertSee('href="https://odms.fu.edu.sd/" class="site-btn"', false);

        $this->actingAs($this->admin())->delete("/home_slider/{$slide->id}")->assertRedirect('/home_slider');
        foreach ($slide->widthList() as $w) {
            $this->assertFileDoesNotExist(public_path("{$slide->image}-{$w}.{$slide->ext}"));
        }
    }

    public function test_slide_rules()
    {
        $admin = $this->admin();
        $this->actingAs($admin)->post('/home_slider', ['title' => 'Small', 'image' => UploadedFile::fake()->image('s.jpg', 400, 300)])
            ->assertSessionHasErrors('image');
        $this->actingAs($admin)->post('/home_slider', ['title' => 'Bad link', 'button_text' => 'Go', 'button_url' => 'javascript:alert(1)',
            'image' => UploadedFile::fake()->image('h.jpg', 1200, 800)])->assertSessionHasErrors('button_url');

        // The last visible slide cannot be hidden.
        $keep = HomeSlide::ordered()->first();
        HomeSlide::where('id', '!=', $keep->id)->update(['is_visible' => false]);
        $keep->update(['is_visible' => true]);
        $this->actingAs($admin)->post("/home_slider/{$keep->id}/toggle")->assertSessionHas('failure');
        $this->assertTrue($keep->fresh()->is_visible);
    }

    public function test_admin_manages_testimonials()
    {
        $admin = $this->admin();
        $this->actingAs($admin)->get('/testimonials')->assertOk()->assertSee('Amar Hamdi');

        $this->actingAs($admin)->post('/testimonials', [
            'name' => 'Sara Test', 'position' => 'Engineer, Zain.', 'quote' => '"FU changed my life."', 'sort_order' => 1,
            'is_visible' => '1', 'photo' => UploadedFile::fake()->image('face.png', 600, 800),
        ])->assertRedirect('/testimonials')->assertSessionHasNoErrors();

        $t = Testimonial::where('name', 'Sara Test')->firstOrFail();
        $this->assertSame('FU changed my life.', $t->quote);
        $this->assertFileExists(public_path($t->photo));
        [$w, $h] = getimagesize(public_path($t->photo));
        $this->assertSame([240, 240], [$w, $h]);

        $this->get('/')->assertSee('<blockquote>FU changed my life.</blockquote>', false);

        $this->actingAs($admin)->put("/testimonials/{$t->id}", ['name' => 'Sara Test', 'quote' => 'Updated.', 'remove_photo' => '1', 'is_visible' => '1'])
            ->assertRedirect('/testimonials');
        $this->assertNull($t->fresh()->photo);
    }

    public function test_news_and_event_forms_have_faculty_and_home_order()
    {
        $admin = $this->admin();
        foreach (['/add_news', '/add_event'] as $path) {
            $this->actingAs($admin)->get($path)->assertOk()
                ->assertSee('name="faculty_id"', false)
                ->assertSee('Academic Affairs')
                ->assertSee('name="home_order"', false);
        }

        // Nothing is saved when the faculty is missing or unknown.
        $this->actingAs($admin)->post('/add_news', ['news_title' => 'Test title', 'news_desc' => 'x', 'news_date' => '2026-01-01'])
            ->assertSessionHasErrors('faculty_id');
        $this->actingAs($admin)->post('/add_event', ['event_title' => 'Test title', 'event_desc' => 'x', 'event_date' => '2026-01-01',
            'event_time' => '10:00', 'faculty_id' => '999'])->assertSessionHasErrors('faculty_id');
    }

    public function test_home_order_comes_first_then_newest()
    {
        $item = fn ($title, $order, $date) => ['title' => $title, 'order' => $order, 'sort' => $date];
        $sorted = HomeController::homeOrder(collect([
            $item('old', null, '2024-01-01'),
            $item('second', 2, '2020-01-01'),
            $item('new', null, '2026-01-01'),
            $item('first', 1, '2019-01-01'),
        ]))->pluck('title')->all();

        $this->assertSame(['first', 'second', 'new', 'old'], $sorted);
    }
}
