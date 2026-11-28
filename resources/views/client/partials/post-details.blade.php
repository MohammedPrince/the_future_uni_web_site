{{--
    One news item or event (the title is in the page banner).
    Expects: $type (News|Event), $title, $date, $time (or null), $office,
    $folder (news_imgs|event_imgs), $images (file names), $html (cleaned text),
    $short (share link, e.g. "n/12"), $url (this page).
--}}
@php
    $photos = array_map(fn ($f) => \App\Support\Media::url('storage/' . $folder . '/' . $f), $images);
    $latest = \App\Support\NewsFeed::newestFirst()->reject(fn ($i) => $i['url'] === $url)->take(4);
    $when = strtotime((string) $date);
@endphp

<section class="fu-post">
    <div class="container fu-post-grid">
        <article class="fu-post-main">
            @if ($photos)
                <div class="fu-post-media">
                    <a href="{{ $photos[0] }}" target="_blank" rel="noopener" data-post-full>
                        <img class="post-full-img" src="{{ $photos[0] }}" alt="{{ $title }}" fetchpriority="high" decoding="async" data-post-main>
                    </a>
                    @if (count($photos) > 1)
                        <span class="fu-photos"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 7h3l2-3h6l2 3h3a1 1 0 0 1 1 1v11a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1z"/><circle cx="12" cy="13" r="4"/></svg><span data-post-n>1</span>/{{ count($photos) }}</span>
                    @endif
                </div>
                @if (count($photos) > 1)
                    <div class="fu-post-thumbs" role="list" aria-label="{{ $type }} images">
                        @foreach ($photos as $i => $photo)
                            <button type="button" role="listitem" class="{{ $i === 0 ? 'is-active' : '' }}" data-post-thumb="{{ $photo }}"
                                aria-label="Show image {{ $i + 1 }} of {{ count($photos) }}">
                                <img src="{{ $photo }}" alt="" loading="lazy" decoding="async">
                            </button>
                        @endforeach
                    </div>
                @endif
            @endif

            <div class="fu-post-body">
                <div class="fu-post-meta">
                    <span class="fu-type {{ $type === 'Event' ? 'is-event' : '' }}">{{ $type }}</span>
                    @if ($when)
                        <span><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="5" width="18" height="16" rx="2"/><path d="M3 10h18M8 3v4M16 3v4"/></svg>{{ date('d M Y', $when) }}</span>
                    @endif
                    @if ($time && strtotime($time))
                        <span><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg>{{ date('h:i A', strtotime($time)) }}</span>
                    @endif
                    @if ($office)
                        <span><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M3 21h18M5 21V9l7-5 7 5v12M9 21v-6h6v6"/></svg>{{ $office }}</span>
                    @endif
                </div>

                <div class="fu-post-text" dir="auto">{!! $html !!}</div>

                <div class="fu-post-share">
                    @include('components.client-share', ['title' => $title, 'short' => $short])
                </div>
            </div>
        </article>

        <aside class="fu-post-side">
            <div class="fu-side-box">
                <h2>Search</h2>
                <div class="search-widget">
                    <input type="text" id="search-input" class="form-control" placeholder="Search news and events" aria-label="Search news and events">
                    <button type="button" aria-label="Search"><i class="ti-search" aria-hidden="true"></i></button>
                </div>
                <div id="search-results"></div>
            </div>

            @if ($latest->isNotEmpty())
                <div class="fu-side-box">
                    <h2>Latest News &amp; Events</h2>
                    @foreach ($latest as $item)
                        <a class="fu-side-post" href="{{ $item['url'] }}">
                            <img src="@img($item['image'] ?: 'client/img/fu_logo-120.png')" alt="" width="76" height="60" loading="lazy" decoding="async">
                            <span>
                                <strong dir="auto">{{ $item['title'] }}</strong>
                                <small>{{ $item['type'] }} &middot; {{ date('d M Y', strtotime($item['date'])) }}</small>
                            </span>
                        </a>
                    @endforeach
                    <a class="fu-more" href="{{ route('NewsAndEvents') }}">All News &amp; Events &rarr;</a>
                </div>
            @endif

            <div class="fu-side-box">
                <h2>FU Centers &amp; Units</h2>
                <div class="fu-side-tags">
                    <a href="{{ route('CESD') }}">CESD</a>
                    <a href="{{ route('CTS') }}">CTS</a>
                    <a href="{{ route('IRDC') }}">IRDC</a>
                </div>
            </div>

            <div class="fu-side-box">
                <h2>Quick Links</h2>
                <ul class="fu-side-links">
                    <li><a href="{{ route('About-FU') }}">About FU</a></li>
                    <li><a href="{{ route('Undergraduate-Programs') }}">Undergraduate Programs</a></li>
                    <li><a href="{{ route('Postgraduates-Programs') }}">Postgraduate Programs</a></li>
                    <li><a href="{{ route('Undergraduate-Admission') }}">Undergraduate Admission</a></li>
                    <li><a href="{{ route('Postgraduate-Admission') }}">Postgraduate Admission</a></li>
                    <li><a href="{{ route('Fu-Linkages') }}">FU Linkages</a></li>
                    <li><a href="{{ route('barChart') }}">Facts &amp; Figures</a></li>
                </ul>
            </div>
        </aside>
    </div>
</section>
