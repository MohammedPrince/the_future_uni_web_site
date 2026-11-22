<?php

namespace Tests\Feature;

use App\Http\Middleware\PageCache;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Tests\TestCase;

/**
 * Uses the configured database read-only: no test here writes to it.
 *
 *   php artisan test --filter=PublicSiteTest
 */
class PublicSiteTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        config(['cache.stores.pages' => ['driver' => 'array']]);
        // Counting a visit writes a row, so mark this address as already counted.
        Cache::store('pages')->forever('visitor:' . sha1('127.0.0.1'), 1);
    }

    private function admin(): User
    {
        return (new User())->forceFill(['id' => 0, 'username' => 'test', 'isAdmin' => '1', 'del' => 0]);
    }

    public function test_every_page_in_the_sitemap_works_and_has_its_own_seo_tags()
    {
        $titles = [];
        foreach (array_keys(config('seo.pages')) as $path) {
            $html = $this->get('/' . ltrim($path, '/'))->assertOk()->getContent();

            $this->assertMatchesRegularExpression('#<title>[^<]{10,}</title>#', $html, $path);
            $this->assertStringContainsString('<link rel="canonical" href="https://fu.edu.sd/', $html, $path);
            $this->assertSame(1, preg_match_all('#<h1[\s>]#', $html), "One h1 on {$path}");
            preg_match('#application/ld\+json">(.*?)</script>#s', $html, $m);
            $this->assertNotNull(json_decode($m[1] ?? ''), "Structured data on {$path}");
            preg_match('#<title>(.*?)</title>#', $html, $t);
            $titles[] = $t[1];
        }
        $this->assertSame(count($titles), count(array_unique($titles)), 'Titles are unique');
    }

    public function test_sitemap_is_valid_xml()
    {
        $response = $this->get('/sitemap.xml')->assertOk();
        $this->assertStringContainsString('xml', $response->headers->get('Content-Type'));
        $xml = simplexml_load_string($response->getContent());
        $this->assertGreaterThanOrEqual(count(config('seo.pages')), count($xml->url));
    }

    public function test_public_pages_set_no_cookies_and_send_security_headers()
    {
        $response = $this->get('/About-FU')->assertOk();
        $this->assertEmpty($response->headers->getCookies());
        foreach (['Content-Security-Policy', 'X-Frame-Options', 'X-Content-Type-Options', 'Referrer-Policy'] as $name) {
            $this->assertTrue($response->headers->has($name), $name);
        }
        $this->assertFalse($response->headers->has('X-Robots-Tag'));
    }

    public function test_page_cache_is_used_and_can_be_cleared()
    {
        config(['seo.page_cache' => true]);
        $this->get('/CESD')->assertHeader('X-Page-Cache', 'miss');
        $this->get('/CESD')->assertHeader('X-Page-Cache', 'hit');
        PageCache::clear();
        $this->get('/CESD')->assertHeader('X-Page-Cache', 'miss');
        $this->assertFalse($this->get('/CESD?junk=1')->headers->has('X-Page-Cache'));
    }

    public function test_old_addresses_redirect_and_unknown_news_is_404()
    {
        $this->get('/Home')->assertStatus(301);
        $this->get('/news_events')->assertStatus(301);
        $this->get('/News-Details/' . base64_encode('99999999'))->assertNotFound();
        $this->get('/Event-Details/not-base64')->assertNotFound();
    }

    public function test_admin_needs_login_and_is_not_indexed()
    {
        $this->get('/add_news')->assertForbidden();
        $this->get('/admin_panel')->assertOk()->assertHeader('X-Robots-Tag', 'noindex, nofollow');
    }

    public function test_delete_links_do_not_work_from_other_sites()
    {
        $this->actingAs($this->admin());
        // Ids that do not exist: even a failure of the check could not delete anything.
        $this->get('/add_news/99999999/delete', ['Sec-Fetch-Site' => 'cross-site'])->assertForbidden();
        $this->get('/add_news/99999999/delete', ['referer' => 'https://evil.example/'])->assertForbidden();
        $this->get('/add_news/99999999/delete', ['Sec-Fetch-Site' => 'same-origin'])->assertRedirect();
    }

    public function test_google_ownership_file()
    {
        $this->get('/googleafbc0ccb2ebc472f.html')->assertOk()
            ->assertSee('google-site-verification: googleafbc0ccb2ebc472f.html');
        $this->get('/google0000000000000000.html')->assertNotFound();
    }

    public function test_server_tools_need_admin_and_password()
    {
        $this->get('/server_tools')->assertForbidden();

        $admin = $this->admin()->forceFill(['password' => bcrypt('right-password')]);
        $this->actingAs($admin)->get('/server_tools')->assertOk()->assertSee('Confirm your password')->assertDontSee('Compress uploaded images');
        $this->post('/server_tools/run', ['tool' => 'migrate_status'])->assertSessionHas('failure');
        $this->post('/server_tools/unlock', ['password' => 'wrong'])->assertSessionHas('failure');
        $this->post('/server_tools/unlock', ['password' => 'right-password'])->assertRedirect('/server_tools');
        $this->get('/server_tools')->assertSee('Compress uploaded images');
    }

    public function test_server_tools_run_only_listed_commands()
    {
        $this->actingAs($this->admin())->withSession(['server_tools_unlocked' => ['user' => 0, 'at' => time()]]);

        $this->post('/server_tools/run', ['tool' => 'migrate:fresh'])->assertSessionHasErrors('tool');
        $this->post('/server_tools/run', ['tool' => 'migrate'])->assertSessionHasErrors('backup_done');
        foreach (['pages', 'migrate_status', 'migrate_preview'] as $tool) {
            $result = $this->post('/server_tools/run', ['tool' => $tool])->assertSessionHas('tool_result')->getSession()->get('tool_result');
            $this->assertTrue($result['ok'], $tool . ': ' . $result['output']);
        }
    }

    public function test_search_box()
    {
        $this->get('/search?term=%25')->assertOk()->assertDontSee('News-Details');
        $this->get('/search?term[]=x')->assertOk();
    }
}
