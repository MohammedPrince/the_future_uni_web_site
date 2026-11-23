<?php

namespace Tests\Feature;

use App\Models\Events;
use App\Models\News;
use App\Models\User;
use App\Support\RichText;
use Tests\TestCase;

/**
 * HTML editor content for news and events, and the admin edit pages.
 * Read-only: nothing is written to the database.
 *
 *   php artisan test --filter=RichTextTest
 */
class RichTextTest extends TestCase
{
    public function test_unsafe_html_is_removed_and_formatting_is_kept()
    {
        $html = RichText::clean(
            '<h2 dir="rtl" onclick="alert(1)">عنوان</h2>'
            . '<p style="text-align: center; color: red">Hello <strong>world</strong><script>alert(1)</script></p>'
            . '<p><a href="javascript:alert(1)">bad</a> <a href="https://fu.edu.sd/" target="_blank">good</a></p>'
            . '<ul><li>one</li></ul><iframe src="https://evil.example"></iframe><img src="x" onerror="alert(1)">'
        );

        foreach (['<script', 'onclick', 'onerror', 'javascript:', '<iframe', 'color:'] as $bad) {
            $this->assertStringNotContainsStringIgnoringCase($bad, $html);
        }
        foreach (['<h2 dir="rtl">عنوان</h2>', '<strong>world</strong>', 'text-align:center', '<ul><li>one</li></ul>', 'href="https://fu.edu.sd/"', 'target="_blank"', 'noopener'] as $good) {
            $this->assertStringContainsString($good, $html);
        }
    }

    public function test_excerpt_is_plain_text()
    {
        $this->assertSame('First line Second &amp; more', e(RichText::excerpt('<p>First line</p><p>Second &amp; <b>more</b></p>')));
        $this->assertSame('one two...', RichText::excerpt('<p>one two three</p>', 2));
    }

    public function test_old_plain_text_opens_in_the_editor_as_paragraphs()
    {
        $this->assertSame("<p>Line 1<br>\nLine 2</p>\n<p>a &lt; b &amp; c</p>", RichText::forEditor("Line 1\nLine 2\n\na < b & c"));
        $this->assertSame('<p>html</p>', RichText::forEditor('<p>html</p>'));
        $this->assertTrue(RichText::isEmpty('<p><br></p>&nbsp;'));
        $this->assertFalse(RichText::isEmpty('<p>x</p>'));
    }

    public function test_edit_pages_show_images_from_the_public_folder_and_load_the_editor()
    {
        $admin = (new User())->forceFill(['id' => 0, 'username' => 'test', 'user_fullname' => 'Test', 'isAdmin' => '1', 'del' => 0]);

        $news = News::where('del', 0)->where('news_imgs', '!=', '')->first();
        $event = Events::where('del', 0)->where('event_imgs', '!=', '')->first();
        if (!$news || !$event) {
            $this->markTestSkipped('Needs a news item and an event with images in the local database.');
        }

        foreach (["/edit_news/{$news->id}/edit" => $news->news_imgs, "/edit_event/{$event->id}/edit" => $event->event_imgs] as $path => $images) {
            $html = $this->actingAs($admin)->get($path)->assertOk()->getContent();
            $first = explode(',', $images)[0];
            $this->assertMatchesRegularExpression('#src="[^"]*/public/storage/(news|event)_imgs/' . preg_quote(rawurlencode($first), '#') . '#', $html, $path);
            $this->assertStringNotContainsString('src="/storage/', $html, $path);
            $this->assertStringContainsString('data-rich-editor', $html, $path);
            $this->assertStringContainsString('tinymce.min.js', $html, $path);
        }
    }
}
