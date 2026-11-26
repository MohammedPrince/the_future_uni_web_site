{{--
    Share buttons for a news item or event. Plain links: no Facebook or other
    scripts are loaded, so the page stays fast and visitors are not tracked.
    Expects $title.
--}}
@php
    $shareUrl = config('seo.url') . '/' . ltrim(request()->path(), '/');
    $u = rawurlencode($shareUrl);
    $t = rawurlencode($title);
    $networks = [
        ['Facebook', "https://www.facebook.com/sharer/sharer.php?u={$u}", '#1877f2',
            'M13.5 21v-7.5h2.5l.4-3h-2.9V8.6c0-.9.3-1.5 1.5-1.5h1.6V4.4c-.3 0-1.2-.1-2.3-.1-2.3 0-3.9 1.4-3.9 4V10.5H8v3h2.4V21h3.1z'],
        ['WhatsApp', "https://wa.me/?text={$t}%20{$u}", '#25d366',
            'M12 3a9 9 0 0 0-7.8 13.5L3 21l4.6-1.2A9 9 0 1 0 12 3zm0 16.4c-1.4 0-2.8-.4-4-1.1l-.3-.2-2.7.7.7-2.6-.2-.3A7.4 7.4 0 1 1 12 19.4zm4.1-5.5c-.2-.1-1.3-.7-1.5-.7-.2-.1-.4-.1-.5.1l-.7.9c-.1.2-.3.2-.5.1a6 6 0 0 1-3-2.6c-.2-.4.2-.4.6-1.2.1-.1 0-.3 0-.4l-.7-1.6c-.2-.4-.4-.4-.5-.4h-.5c-.2 0-.4.1-.6.3-.2.2-.8.8-.8 1.9s.8 2.2.9 2.4c.1.1 1.6 2.5 3.9 3.5 1.5.6 2 .7 2.7.6.4-.1 1.3-.5 1.5-1.1.2-.5.2-1 .1-1.1l-.4-.2z'],
        ['X', "https://twitter.com/intent/tweet?url={$u}&text={$t}", '#000000',
            'M17.8 3h3.1l-6.8 7.7L22 21h-6.2l-4.9-6.4L5.3 21H2.2l7.3-8.3L2 3h6.4l4.4 5.8L17.8 3zm-1.1 16.2h1.7L7.4 4.7H5.6l11.1 14.5z'],
        ['LinkedIn', "https://www.linkedin.com/sharing/share-offsite/?url={$u}", '#0a66c2',
            'M5 3.5a2.2 2.2 0 1 1 0 4.4 2.2 2.2 0 0 1 0-4.4zM3.1 9.2h3.8V21H3.1zM9.3 9.2h3.6v1.6h.1c.5-.9 1.7-1.9 3.6-1.9 3.8 0 4.5 2.5 4.5 5.8V21h-3.8v-5.5c0-1.3 0-3-1.8-3s-2.1 1.4-2.1 2.9V21H9.3z'],
        ['Telegram', "https://t.me/share/url?url={$u}&text={$t}", '#229ed9',
            'M21.4 4.3 18.3 19c-.2 1-.8 1.3-1.7.8l-4.6-3.4-2.2 2.1c-.2.2-.5.5-1 .5l.3-4.7 8.6-7.8c.4-.3-.1-.5-.6-.2L6.5 13 1.9 11.6c-1-.3-1-1 .2-1.5L20 3.2c.8-.3 1.6.2 1.4 1.1z'],
    ];
@endphp

<div class="share-box" aria-label="Share">
    <span class="share-label">Share:</span>
    @foreach ($networks as [$name, $href, $color, $icon])
        <a class="share-btn" href="{{ $href }}" target="_blank" rel="noopener noreferrer" style="background:{{ $color }}"
            aria-label="Share on {{ $name }}" title="Share on {{ $name }}">
            <svg viewBox="0 0 24 24" width="18" height="18" aria-hidden="true"><path fill="#fff" d="{{ $icon }}"/></svg>
        </a>
    @endforeach
    <button type="button" class="share-btn share-copy" data-share-copy="{{ $shareUrl }}" style="background:#6b7280"
        aria-label="Copy link" title="Copy link">
        <svg viewBox="0 0 24 24" width="18" height="18" aria-hidden="true"><path fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" d="M10 14a4 4 0 0 0 5.7 0l3-3a4 4 0 0 0-5.7-5.7l-1 1M14 10a4 4 0 0 0-5.7 0l-3 3a4 4 0 0 0 5.7 5.7l1-1"/></svg>
    </button>
    <button type="button" class="share-btn share-native" data-share-native data-title="{{ $title }}" data-url="{{ $shareUrl }}"
        style="background:#fb8b24" aria-label="More ways to share" title="More ways to share" hidden>
        <svg viewBox="0 0 24 24" width="18" height="18" aria-hidden="true"><path fill="#fff" d="M18 16a3 3 0 0 0-2.4 1.2l-6.7-3.4a3 3 0 0 0 0-1.6l6.7-3.4A3 3 0 1 0 15 7l-6.7 3.4a3 3 0 1 0 0 3.2L15 17a3 3 0 1 0 3-1z"/></svg>
    </button>
    <span class="share-done" role="status" aria-live="polite"></span>
</div>
