<?php

namespace Tests\Feature;

use App\Http\Middleware\SiteMaintenance;
use App\Models\FeeItem;
use App\Models\FeeSection;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Cache;
use Tests\TestCase;

/**
 * Site Settings, maintenance mode, fees and the dashboard.
 * Every change is rolled back after each test (DatabaseTransactions).
 *
 *   php artisan test --filter=AdminControlTest
 */
class AdminControlTest extends TestCase
{
    use DatabaseTransactions;

    protected function setUp(): void
    {
        parent::setUp();
        config(['cache.stores.pages' => ['driver' => 'array']]);
        Cache::store('pages')->forever('visitor:' . sha1('127.0.0.1'), 1);
        Setting::forget();
    }

    protected function tearDown(): void
    {
        Setting::forget();
        parent::tearDown();
    }

    private function admin(): User
    {
        return (new User())->forceFill(['id' => 0, 'username' => 'test', 'user_fullname' => 'Test', 'isAdmin' => '1', 'del' => 0]);
    }

    public function test_admin_pages_open()
    {
        foreach (['/dashboard', '/site_settings', '/fee_structure', '/add_news', '/add_event'] as $path) {
            $this->actingAs($this->admin())->get($path)->assertOk();
        }
    }

    public function test_admin_pages_need_an_admin()
    {
        foreach (['/dashboard', '/site_settings', '/fee_structure'] as $path) {
            $this->get($path)->assertForbidden();
        }
        $this->post('/site_settings/maintenance', ['maintenance_enabled' => '1'])->assertForbidden();
        $this->assertFalse(Setting::enabled('maintenance_enabled'));
    }

    public function test_fee_page_shows_the_tables_from_the_database()
    {
        $section = FeeSection::create(['title' => 'Test Master Programs', 'sort_order' => 999, 'is_visible' => true]);
        FeeItem::create(['fee_section_id' => $section->id, 'program' => 'Test MBA', 'tuition_sdg' => 4250000, 'tuition_usd' => 3100, 'is_visible' => true]);
        FeeItem::create(['fee_section_id' => $section->id, 'program' => 'Hidden Program', 'tuition_sdg' => 1, 'is_visible' => false]);

        $this->get('/Fee-Structure')->assertOk()
            ->assertSee('Test Master Programs')
            ->assertSee('Test MBA')
            ->assertSee('4,250,000')
            ->assertSee('3,100')
            ->assertDontSee('Hidden Program');
    }

    public function test_admin_adds_edits_and_deletes_a_fee()
    {
        $section = FeeSection::create(['title' => 'Test Table', 'sort_order' => 999, 'is_visible' => true]);
        $admin = $this->admin();

        $this->actingAs($admin)->post('/fee_structure/items', [
            'fee_section_id' => $section->id,
            'program' => 'Test Robotics',
            'tuition_sdg' => '2,500,000',
            'registration_sdg' => '700000',
            'tuition_usd' => '',
            'is_visible' => '1',
        ])->assertRedirect('/fee_structure')->assertSessionHasNoErrors();

        $item = FeeItem::where('program', 'Test Robotics')->firstOrFail();
        $this->assertSame(2500000, (int) $item->tuition_sdg);
        $this->assertNull($item->tuition_usd);

        $this->actingAs($admin)->put("/fee_structure/items/{$item->id}", [
            'fee_section_id' => $section->id,
            'program' => 'Test Robotics',
            'tuition_sdg' => '2600000',
            'is_visible' => '0',
        ])->assertRedirect('/fee_structure');
        $this->assertSame(2600000, (int) $item->fresh()->tuition_sdg);
        $this->assertFalse($item->fresh()->is_visible);

        $this->actingAs($admin)->post('/fee_structure/items', [
            'fee_section_id' => $section->id,
            'program' => 'Bad',
            'tuition_sdg' => 'two million',
        ])->assertSessionHasErrors('tuition_sdg');

        $this->actingAs($admin)->delete("/fee_structure/sections/{$section->id}")->assertRedirect('/fee_structure');
        $this->assertNull(FeeItem::find($item->id));
    }

    public function test_maintenance_mode_closes_the_public_site_but_not_the_admin_panel()
    {
        $admin = $this->admin();

        $this->actingAs($admin)->post('/site_settings/maintenance', [
            'maintenance_enabled' => '1',
            'maintenance_message' => 'Back on Monday morning.',
        ])->assertRedirect('/site_settings')->assertCookie(SiteMaintenance::PREVIEW_COOKIE);

        foreach (['/', '/About-FU', '/Fee-Structure', '/News-and-Events', '/search?term=x'] as $path) {
            $this->get($path)->assertStatus(503)->assertSee('Back on Monday morning.')->assertHeader('Retry-After');
        }

        // The admin panel still works.
        $this->actingAs($admin)->get('/dashboard')->assertOk()->assertSee('Maintenance mode is ON');

        // Admin preview cookie shows the real page, not cached for others.
        $preview = $this->withUnencryptedCookie(SiteMaintenance::PREVIEW_COOKIE, SiteMaintenance::previewValue())->get('/About-FU');
        $preview->assertOk();
        $this->assertStringContainsString('no-store', $preview->headers->get('Cache-Control'));

        // A made-up cookie does not.
        $this->withUnencryptedCookie(SiteMaintenance::PREVIEW_COOKIE, 'guess')->get('/About-FU')->assertStatus(503);

        $this->actingAs($admin)->post('/site_settings/maintenance', ['maintenance_enabled' => '0'])->assertRedirect('/site_settings');
        $this->get('/About-FU')->assertOk();
    }

    public function test_settings_change_the_public_pages()
    {
        $this->actingAs($this->admin())->post('/site_settings', [
            'contact_email' => 'admission@example.edu',
            'contact_phone' => '(+249) 111 222 333',
            'address' => 'Test Street',
            'facebook_url' => '',
            'linkedin_url' => 'https://www.linkedin.com/school/example',
            'announcement_enabled' => '1',
            'announcement_text' => 'Admission for 2027 is open',
            'announcement_url' => 'https://odms.fu.edu.sd/',
            'footer_about' => 'Test footer text.',
        ])->assertRedirect('/site_settings')->assertSessionHasNoErrors();

        $this->get('/About-FU')->assertOk()
            ->assertSee('admission@example.edu')
            ->assertSee('(+249) 111 222 333')
            ->assertSee('Test Street')
            ->assertSee('Admission for 2027 is open')
            ->assertSee('Test footer text.')
            ->assertDontSee('facebook.com/TheFutureUniversity', false);
    }

    public function test_settings_reject_unsafe_links()
    {
        $this->actingAs($this->admin())->post('/site_settings', [
            'facebook_url' => 'javascript:alert(1)',
            'contact_email' => 'not an email',
        ])->assertSessionHasErrors(['facebook_url', 'contact_email']);

        $this->actingAs($this->admin())->post('/site_settings', [
            'announcement_enabled' => '1',
            'announcement_text' => '',
        ])->assertSessionHasErrors('announcement_text');
    }

    public function test_error_pages_use_the_site_style()
    {
        $this->get('/no-such-page-here')->assertNotFound()
            ->assertSee('Page Not Found')
            ->assertSee('الصفحة غير موجودة')
            ->assertSee('info@fu.edu.sd')
            ->assertSee('client/img/fu_logo.png', false);

        $this->get('/dashboard')->assertForbidden()->assertSee('Access Denied');

        Setting::putMany(['maintenance_enabled' => '1', 'maintenance_message' => 'Closed for a short update.']);
        $this->get('/')->assertStatus(503)
            ->assertSee('We will be back soon')
            ->assertSee('Closed for a short update.')
            ->assertDontSee('Go back');
    }

    public function test_header_and_footer_link_to_all_social_pages()
    {
        $html = $this->get('/About-FU')->assertOk()->getContent();
        foreach ([
            'https://www.facebook.com/TheFutureUniversity/',
            'https://www.instagram.com/thefutureuniversitysd/',
            'https://www.tiktok.com/@thefutureuniversitysd',
        ] as $url) {
            // Once in the top bar and once in the footer.
            $this->assertSame(2, substr_count($html, 'href="' . e($url) . '"'), $url);
        }
        $this->assertStringContainsString('aria-label="Instagram"', $html);
        $this->assertStringContainsString('aria-label="TikTok"', $html);
    }

    public function test_links_to_other_websites_open_in_a_new_tab()
    {
        foreach (['https://odms.fu.edu.sd/', 'https://thj.fu.edu.sd/', 'https://www.facebook.com/x', 'http://example.com'] as $url) {
            $this->assertTrue(\App\Support\Links::isExternal($url), $url);
        }
        foreach (['/Fee-Structure', 'https://fu.edu.sd/About-FU', 'https://www.fu.edu.sd/', 'mailto:info@fu.edu.sd', '#top', null] as $url) {
            $this->assertFalse(\App\Support\Links::isExternal($url), (string) $url);
        }

        $html = $this->get('/')->assertOk()->getContent();
        // Apply now (admission portal), the journal in the menu, the portals in the top bar.
        $this->assertMatchesRegularExpression('#class="fu-apply" href="https://odms\.fu\.edu\.sd/"\s+target="_blank" rel="noopener"#', $html);
        $this->assertMatchesRegularExpression('#href="https://thj\.fu\.edu\.sd/"\s+target="_blank"#', $html);
        $this->assertMatchesRegularExpression('#href="https://elearning\.fu\.edu\.sd/" target="_blank"#', $html);
        // Pages of this site stay in the same tab.
        $this->assertDoesNotMatchRegularExpression('#href="' . preg_quote(route('Fees'), '#') . '"\s+target=#', $html);
    }

    public function test_join_banner_is_only_on_the_home_page()
    {
        $html = $this->get('/')->assertOk()->assertSee('Ready to join The Future University?')->getContent();
        $this->assertMatchesRegularExpression('/Student\s+Result/', $html);
        foreach (['/About-FU', '/Undergraduate-Programs', '/News-and-Events'] as $path) {
            $this->get($path)->assertOk()
                ->assertDontSee('Ready to join The Future University?')
                ->assertSee('fu-footer-plain', false)
                ->assertSee('rel="noopener">Student', false)
                ->assertDontSee('Students Portal');
        }
    }

    public function test_public_pages_still_show_the_default_contact_details()
    {
        $this->get('/About-FU')->assertOk()
            ->assertSee('info@fu.edu.sd')
            ->assertSee('(+249) 183 411 818')
            ->assertSee('https://odms.fu.edu.sd/', false)
            ->assertDontSee('site-announcement', false);
    }
}
