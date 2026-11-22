<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\News;
use Illuminate\Support\Carbon;

class SitemapController extends Controller
{
    public function index()
    {
        $base = config('seo.url');
        $urls = [];

        foreach (array_keys(config('seo.pages')) as $path) {
            $urls[] = ['loc' => $path === '/' ? $base . '/' : $base . '/' . $path];
        }

        foreach (News::published()->orderByDesc('news_date')->get() as $news) {
            $urls[] = $this->entry('/News-Details/', $news, 'news_imgs');
        }

        foreach (Events::published()->orderByDesc('event_date')->get() as $event) {
            $urls[] = $this->entry('/Event-Details/', $event, 'event_imgs');
        }

        return response()
            ->view('sitemap', ['urls' => $urls])
            ->header('Content-Type', 'application/xml; charset=UTF-8');
    }

    private function entry(string $path, $row, string $folder): array
    {
        $date = $row->updated_at ?? $row->created_at;
        $image = trim(explode(',', (string) $row->{$folder})[0]);

        return [
            'loc' => config('seo.url') . $path . base64_encode($row->id),
            'lastmod' => $date ? Carbon::parse($date)->toAtomString() : null,
            'image' => $image !== '' ? config('seo.url') . '/public/storage/' . $folder . '/' . rawurlencode($image) : null,
        ];
    }
}
