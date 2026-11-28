@extends('components.client-layout', ['seo' => [
    'title' => $news->news_title,
    'description' => $news->news_desc,
    'image' => 'storage/news_imgs/' . rawurlencode(trim(explode(',', (string) $news->news_imgs)[0])),
    'type' => 'article',
    'date' => $news->news_date,
    'modified' => optional($news->updated_at)->toAtomString(),
]])
@section('main-client-content')
    @include('client.partials.post-details', [
        'type' => 'News',
        'title' => $news->news_title,
        'date' => $news->news_date,
        'time' => null,
        'office' => $news_office,
        'folder' => 'news_imgs',
        'images' => \App\Support\PostImages::list($news->news_imgs),
        'html' => Purifier::clean($news->news_desc),
        'short' => 'n/' . $news->id,
        'url' => route('newsDetails', base64_encode($news->id)),
    ])
@endsection
