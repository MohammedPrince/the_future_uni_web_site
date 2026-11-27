@extends('components.client-layout', ['seo' => [
    'title' => $event->event_title,
    'description' => $event->event_desc,
    'image' => 'storage/event_imgs/' . rawurlencode(trim(explode(',', (string) $event->event_imgs)[0])),
    'type' => 'article',
    'date' => $event->event_date,
    'modified' => optional($event->updated_at)->toAtomString(),
]])
@section('main-client-content')
    @include('client.partials.post-details', [
        'type' => 'Event',
        'title' => $event->event_title,
        'date' => $event->event_date,
        'time' => $event->event_time,
        'office' => $event_office,
        'folder' => 'event_imgs',
        'images' => \App\Support\PostImages::list($event->event_imgs),
        'html' => Purifier::clean($event->event_desc),
        'short' => 'e/' . $event->id,
        'url' => route('eventDetails', base64_encode($event->id)),
    ])
@endsection
