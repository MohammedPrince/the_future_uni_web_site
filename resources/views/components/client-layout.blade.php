<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('components.client-seo')
    <meta name="theme-color" content="#1d5191">

    <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="48x48">
    <link rel="icon" href="@img('client/img/icon-192.png')" type="image/png" sizes="192x192">
    <link rel="apple-touch-icon" href="@img('client/img/apple-touch-icon.png')">

    @yield('preload')
    @php $homeCss = Request::is('/') ? \App\Support\Media::inlineCss('client/dist/home.min.css') : ''; @endphp
    @if ($homeCss !== '')
        <style>
            {!! $homeCss !!}
        </style>
        <link rel="prefetch" href="@img('client/dist/site.min.css')" as="style">
    @else
        <link rel="preload" href="{{ asset('public/client/fonts/ubuntu-400-latin.woff2') }}" as="font" type="font/woff2"
            crossorigin>
        <link rel="stylesheet" href="@img('client/dist/site.min.css')">
    @endif

    @if (Request::is('Facts-Figures'))
        <script src="@img('client/dist/chart.umd.js')" defer></script>
    @endif

    @if (Request::is('Fu-Historical-Gallery') || Request::is('Students-Gallery'))
        <link rel="stylesheet" href="@img('client/css/swiper-bundle.min.css')">
        <script src="@img('client/js/swiper-bundle.min.js')" defer></script>
    @endif
    <script src="@img('client/dist/site.min.js')" defer></script>
</head>

<body class="{{ Request::is('/') ? 'fu-home' : 'fu-inner' }}">
    @php
        // Managed in Admin > Site Settings (defaults in config/site.php).
        $site = \App\Models\Setting::allValues();
        $footerNews = rescue(fn() => \App\Models\News::published()->orderByDesc('news_date')->orderByDesc('id')->take(2)->get(['id', 'news_title', 'news_date']), collect(), false);
    @endphp
    <a class="skip-link" href="#main-content">Skip to content</a>

    @php
        $applyUrl = $site['admission_url'] ?? '' ?: route('Undergraduate-Admission');
        $is = fn(...$p) => Request::is(...$p);
        $menu = [
            ['Home', route('Home'), $is('/'), []],
            [
                'About',
                null,
                $is('About-FU', 'Fu-Linkages', 'Facts-Figures', 'Fu-Historical-Gallery'),
                [
                    ['History', route('About-FU')],
                    ['Facts & Figures', route('barChart')],
                    ['Linkages', route('Fu-Linkages')],
                    ['Gallery', route('Fu-Historical-Gallery')],
                ]
            ],
            ['News & Events', route('NewsAndEvents'), $is('News-and-Events', 'News-Details/*', 'Event-Details/*'), []],
            [
                'Programs',
                null,
                $is('Undergraduate-Programs', 'Postgraduates-Programs'),
                [
                    ['Undergraduate Programs', route('Undergraduate-Programs')],
                    ['Postgraduate Programs', route('Postgraduates-Programs')],
                ]
            ],
            [
                'Admission',
                null,
                $is('Undergraduate-Admission', 'Postgraduate-Admission', 'External-Transfer', 'Fee-Structure', 'Scholarships'),
                [
                    ['Undergraduate Admission', route('Undergraduate-Admission')],
                    ['Postgraduate Admission', route('Postgraduate-Admission')],
                    ['Transfer / Bridging', route('External-Transfer')],
                    ['Fee Structure', route('Fees')],
                    ['Scholarships', route('Scholarships')],
                ]
            ],
            [
                'Students',
                null,
                $is('Student-Affairs', 'Students-Gallery'),
                [
                    ['Students Affairs', route('Student-Affairs')],
                    ['Students Gallery', route('Students-Gallery')],
                ]
            ],
            [
                'Research',
                null,
                $is('Fu-Journal'),
                [
                    ['The Technology Horizon Journal', 'https://thj.fu.edu.sd/'],
                ]
            ],
            [
                'Centers',
                null,
                $is('CESD', 'CTS', 'UNESCO', 'ICDL', 'Space-Technology-Center', 'IRDC'),
                [
                    ['E-Learning & Software Development (CESD)', route('CESD')],
                    ['Technical Services (CTS)', route('CTS')],
                    ['Innovation, Research & Development (IRDC)', route('IRDC')],
                    ['UNESCO', route('UNESCO')],
                    ['Space Technology Research Center', route('Space-Technology-Center')],
                    ['ICDL', route('ICDL')],
                ]
            ],
        ];
        $social = array_filter([
            'Facebook' => [$site['facebook_url'] ?? '', 'M13.5 21v-7.5h2.5l.4-3h-2.9V8.6c0-.9.3-1.5 1.5-1.5h1.6V4.4c-.3 0-1.2-.1-2.3-.1-2.3 0-3.9 1.4-3.9 4V10.5H8v3h2.4V21h3.1z'],
            'LinkedIn' => [$site['linkedin_url'] ?? '', 'M5 3.5a2.2 2.2 0 1 1 0 4.4 2.2 2.2 0 0 1 0-4.4zM3.1 9.2h3.8V21H3.1zM9.3 9.2h3.6v1.6h.1c.5-.9 1.7-1.9 3.6-1.9 3.8 0 4.5 2.5 4.5 5.8V21h-3.8v-5.5c0-1.3 0-3-1.8-3s-2.1 1.4-2.1 2.9V21H9.3z'],
            'Instagram' => [$site['instagram_url'] ?? '', 'M12 2.2c3.2 0 3.6 0 4.8.1 1.2.1 1.8.2 2.2.4.6.2 1 .5 1.4.9.4.4.7.8.9 1.4.2.4.4 1 .4 2.2.1 1.3.1 1.6.1 4.8s0 3.6-.1 4.8c-.1 1.2-.2 1.8-.4 2.2-.2.6-.5 1-.9 1.4-.4.4-.8.7-1.4.9-.4.2-1 .4-2.2.4-1.3.1-1.6.1-4.8.1s-3.6 0-4.8-.1c-1.2-.1-1.8-.2-2.2-.4-.6-.2-1-.5-1.4-.9-.4-.4-.7-.8-.9-1.4-.2-.4-.4-1-.4-2.2C2.2 15.6 2.2 15.2 2.2 12s0-3.6.1-4.8c.1-1.2.2-1.8.4-2.2.2-.6.5-1 .9-1.4.4-.4.8-.7 1.4-.9.4-.2 1-.4 2.2-.4C8.4 2.2 8.8 2.2 12 2.2zm0 4.7a5.1 5.1 0 1 0 0 10.2 5.1 5.1 0 0 0 0-10.2zm0 8.4a3.3 3.3 0 1 1 0-6.6 3.3 3.3 0 0 1 0 6.6zm5.3-9.8a1.2 1.2 0 1 0 0 2.4 1.2 1.2 0 0 0 0-2.4z'],
            'TikTok' => [$site['tiktok_url'] ?? '', 'M16.6 2h-3.3v13.4a2.9 2.9 0 1 1-2.9-2.9c.3 0 .6 0 .8.1V9.2a6.3 6.3 0 1 0 5.4 6.2V8.8a7.9 7.9 0 0 0 4.4 1.4V6.9a4.6 4.6 0 0 1-4.4-4.9z'],
        ], fn($s) => $s[0] !== '');
        $portals = array_filter([
            'Admission' => $site['admission_url'] ?? '',
            'E-Learning' => $site['elearning_url'] ?? '',
            'Help Desk' => $site['helpdesk_url'] ?? '',
        ]);
    @endphp

    {{-- Announcement (Admin > Site Settings) --}}
    @if (($site['announcement_enabled'] ?? '0') === '1' && !empty($site['announcement_text']))
        <div class="fu-announce" role="region" aria-label="Announcement">
            <div class="container">
                <svg class="fu-i" viewBox="0 0 24 24" aria-hidden="true">
                    <path
                        d="M3 11v2a1 1 0 0 0 1 1h2l5 4V6L6 10H4a1 1 0 0 0-1 1zM15.5 8.5a5 5 0 0 1 0 7M18.5 5.5a9 9 0 0 1 0 13" />
                </svg>
                <span>{{ $site['announcement_text'] }}</span>
                @if (!empty($site['announcement_url']))
                    <a class="fu-announce-btn" href="{{ $site['announcement_url'] }}" @ext($site['announcement_url'])>Learn more
                        &rarr;</a>
                @endif
            </div>
        </div>
    @endif

    {{-- Contact and portals --}}
    <div class="fu-util">
        <div class="container">
            @if (!empty($site['contact_email']))
                <a class="fu-util-item fu-hide-md" href="mailto:{{ $site['contact_email'] }}"><svg class="fu-i"
                        viewBox="0 0 24 24" aria-hidden="true">
                        <rect x="3" y="5" width="18" height="14" rx="2" />
                        <path d="m3 7 9 6 9-6" />
                    </svg>{{ $site['contact_email'] }}</a>
            @endif
            @if (!empty($site['contact_phone']))
                <a class="fu-util-item" href="tel:{{ preg_replace('/[^0-9+]/', '', $site['contact_phone']) }}"><svg
                        class="fu-i" viewBox="0 0 24 24" aria-hidden="true">
                        <path
                            d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1.9.4 1.8.7 2.7a2 2 0 0 1-.5 2.1L8 9.8a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.4c.9.3 1.8.6 2.7.7a2 2 0 0 1 1.7 2z" />
                    </svg><span dir="ltr">{{ $site['contact_phone'] }}</span></a>
            @endif
            <span class="fu-util-space"></span>
            <span class="fu-util-links fu-hide-md">
                @foreach ($portals as $label => $url)
                    <a href="{{ $url }}" target="_blank" rel="noopener">{{ $label }}</a>
                @endforeach
            </span>
            <span class="fu-social">
                @foreach ($social as $name => [$url, $icon])
                    <a href="{{ $url }}" target="_blank" rel="noopener" aria-label="{{ $name }}"><svg viewBox="0 0 24 24"
                            aria-hidden="true">
                            <path d="{{ $icon }}" />
                        </svg></a>
                @endforeach
            </span>
        </div>
    </div>

    {{-- Logo, menu, Apply --}}
    <header class="fu-header">
        <div class="container">
            <a class="fu-brand" href="{{ route('Home') }}">
                <img src="@img('client/img/fu_logo.png')" width="58" height="58" alt="">
                <span><b>The Future University</b><small lang="ar">جامعة المستقبل</small></span>
            </a>
            <nav class="fu-nav" aria-label="Main">
                <ul class="fu-menu">
                    @foreach ($menu as [$label, $url, $active, $children])
                        <li class="{{ $active ? 'is-active' : '' }} {{ $children ? 'has-sub' : '' }}">
                            @if ($children)
                                <a role="button" tabindex="0" aria-haspopup="true" aria-expanded="false"
                                    class="sub-menu-arrow">{{ $label }}</a>
                                <ul class="fu-sub">
                                    @foreach ($children as [$childLabel, $childUrl])
                                        <li><a href="{{ $childUrl }}" @ext($childUrl)>{{ $childLabel }}</a></li>
                                    @endforeach
                                </ul>
                            @else
                                <a href="{{ $url }}" @if ($active) aria-current="page" @endif>{{ $label }}</a>
                            @endif
                        </li>
                    @endforeach
                    <li class="fu-menu-portals">
                        @foreach ($portals as $label => $url)
                            <a href="{{ $url }}" target="_blank" rel="noopener">{{ $label }}</a>
                        @endforeach
                    </li>
                </ul>
            </nav>
            <a class="fu-apply" href="{{ $applyUrl }}" @ext($applyUrl)>Apply now</a>
            <button type="button" class="nav-switch fu-burger" aria-label="Menu" aria-expanded="false">
                <svg viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M4 7h16M4 12h16M4 17h16" />
                </svg>
            </button>
        </div>
    </header>

    <!-- main content -->

    <main id="main-content">
        @unless (Request::is('/'))
            @php
                $pagePath = trim(request()->path(), '/');
                $pageSeo = config('seo.pages.' . $pagePath);
                $pageTitle = $seo['title'] ?? ($pageSeo[0] ?? config('seo.site_name'));
                $pageIntro = isset($seo['title']) ? null : ($pageSeo[1] ?? null);
                $groups = [
                    'About' => ['About-FU', 'Facts-Figures', 'Fu-Linkages', 'Fu-Historical-Gallery'],
                    'Programs' => ['Undergraduate-Programs', 'Postgraduates-Programs'],
                    'Admission' => ['Undergraduate-Admission', 'Postgraduate-Admission', 'External-Transfer', 'Fee-Structure', 'Scholarships'],
                    'Students' => ['Student-Affairs', 'Students-Gallery'],
                    'Research' => ['Fu-Journal'],
                    'Centers' => ['CESD', 'CTS', 'IRDC', 'UNESCO', 'ICDL', 'Space-Technology-Center'],
                ];
                $pageGroup = Request::is('News-and-Events', 'News-Details/*', 'Event-Details/*') ? 'News & Events' : null;
                foreach ($groups as $label => $pages) {
                    if (in_array($pagePath, $pages, true)) {
                        $pageGroup = $label;
                    }
                }
            @endphp
            {{-- Page banner (inner pages). The only visible <h1> of the page. --}}
                <section class="fu-page-hero">
                    <div class="container">
                        <nav class="fu-crumbs" aria-label="Breadcrumb">
                            <a href="{{ route('Home') }}">Home</a>
                            @if ($pageGroup)
                                <span aria-hidden="true">/</span>
                                @if ($pageGroup === 'News & Events' && !Request::is('News-and-Events'))
                                    <a href="{{ route('NewsAndEvents') }}">News &amp; Events</a>
                                @else
                                    <span>{{ $pageGroup }}</span>
                                @endif
                            @endif
                        </nav>
                        <h1 dir="auto">{{ $pageTitle }}</h1>
                        @if ($pageIntro)
                            <p>{{ $pageIntro }}</p>
                        @endif
                    </div>
                </section>
        @endunless
            @yield('main-client-content')
    </main>

    <!-- main content End -->

    <!-- Zoom Floating Button Start-->
    @if (!empty($site['support_url']))
        <a href="{{ $site['support_url'] }}" target="_blank" rel="noopener" class="zoom-float"
            title="Live Technical Support">
            <img src="@img('client/img/ts.png')" alt="Live technical support on Zoom" width="60" height="60" loading="lazy"
                style="border-radius: 5px;">
        </a>
    @endif
    <style>
        .zoom-float {
            position: fixed;
            width: 80px;
            height: 80px;
            bottom: 80px;
            right: 20px;
            background-color: #87420a;
            /* color: #2D8CFF; */
            border-radius: 50%;
            text-align: center;
            box-shadow: 2px 2px 3px rgba(0, 0, 0, 0.3);
            z-index: 1000;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .zoom-float:hover {
            background-color: #6e4229;
        }
    </style>
    <!-- Zoom Floating Button End-->

    <footer class="fu-footer {{ Request::is('/') ? '' : 'fu-footer-plain' }}">
        <div class="container">
            {{-- "Ready to join" banner: home page only. --}}
            @if (Request::is('/'))
                <div class="fu-footer-cta">
                    <div>
                        <h2>Ready to join The Future University?</h2>
                        <p>Apply online, or talk to our Admission office. We are happy to help.</p>
                    </div>
                    <div class="fu-footer-cta-btns">
                        <a class="fu-btn fu-btn-white" href="{{ $applyUrl }}" @ext($applyUrl)>Apply now &rarr;</a>
                        @if (!empty($site['helpdesk_url']))
                            <a class="fu-btn fu-btn-ghost" href="{{ $site['helpdesk_url'] }}" target="_blank" rel="noopener">Ask
                                the Help Desk</a>
                        @endif
                    </div>
                </div>
            @endif

            <div class="fu-footer-grid">
                <div class="fu-footer-brand">
                    <a class="fu-brand fu-brand-light" href="{{ route('Home') }}">
                        <img src="@img('client/img/fu_logo.png')" width="58" height="58" alt="" loading="lazy">
                        <span><b>The Future University</b><small lang="ar">جامعة المستقبل</small></span>
                    </a>
                    <p>{{ $site['footer_about'] ?? '' }}</p>
                    <span class="fu-social">
                        @foreach ($social as $name => [$url, $icon])
                            <a href="{{ $url }}" target="_blank" rel="noopener" aria-label="{{ $name }}"><svg
                                    viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="{{ $icon }}" />
                                </svg></a>
                        @endforeach
                    </span>
                </div>

                <nav class="fu-footer-col" aria-label="Explore">
                    <h2>Explore</h2>
                    <ul>
                        <li><a href="{{ route('About-FU') }}">About FU</a></li>
                        <li><a href="{{ route('Undergraduate-Programs') }}">Undergraduate Programs</a></li>
                        <li><a href="{{ route('Postgraduates-Programs') }}">Postgraduate Programs</a></li>
                        <li><a href="{{ route('Undergraduate-Admission') }}">Admission</a></li>
                        <li><a href="{{ route('Fees') }}">Fee Structure</a></li>
                        <li><a href="{{ route('Scholarships') }}">Scholarships</a></li>
                        <li><a href="{{ route('NewsAndEvents') }}">News &amp; Events</a></li>
                    </ul>
                </nav>

                <nav class="fu-footer-col" aria-label="Portals and centers">
                    <h2>Portals &amp; Centers</h2>
                    <ul>
                        @if (!empty($site['elearning_url']))
                            <li><a href="{{ $site['elearning_url'] }}" target="_blank" rel="noopener">E-Learning</a></li>
                        @endif
                        @if (!empty($site['helpdesk_url']))
                            <li><a href="{{ $site['helpdesk_url'] }}" target="_blank" rel="noopener">Help Desk</a></li>
                        @endif
                        @if (!empty($site['students_portal_url']))
                            <li><a href="{{ $site['students_portal_url'] }}" target="_blank" rel="noopener">Student
                                    Result</a></li>
                        @endif
                        <li><a href="{{ route('CESD') }}">CESD</a></li>
                        <li><a href="{{ route('CTS') }}">CTS</a></li>
                        <li><a href="{{ route('IRDC') }}">IRDC</a></li>
                    </ul>
                </nav>

                <div class="fu-footer-col">
                    <h2>Recent News</h2>
                    <ul class="fu-footer-news">
                        @forelse ($footerNews as $recent)
                            <li>
                                <a href="{{ route('newsDetails', base64_encode($recent->id)) }}"
                                    dir="auto">{{ \Illuminate\Support\Str::limit($recent->news_title, 70) }}</a>
                                <small>{{ \Illuminate\Support\Carbon::parse($recent->news_date)->format('d M Y') }}</small>
                            </li>
                        @empty
                            <li><a href="{{ route('NewsAndEvents') }}">News &amp; Events</a></li>
                        @endforelse
                    </ul>
                </div>

                <div class="fu-footer-col">
                    <h2>Get in touch</h2>
                    <ul class="fu-footer-contact">
                        @if (!empty($site['address']))
                            <li><svg class="fu-i" viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M12 22s7-6.2 7-12a7 7 0 0 0-14 0c0 5.8 7 12 7 12z" />
                                    <circle cx="12" cy="10" r="2.5" />
                                </svg>
                                @if (!empty($site['map_url']))<a href="{{ $site['map_url'] }}" target="_blank"
                                rel="noopener">{{ $site['address'] }}</a>@else<span>{{ $site['address'] }}</span>@endif
                            </li>
                        @endif
                        @if (!empty($site['contact_phone']))
                            <li><svg class="fu-i" viewBox="0 0 24 24" aria-hidden="true">
                                    <path
                                        d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1.9.4 1.8.7 2.7a2 2 0 0 1-.5 2.1L8 9.8a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.4c.9.3 1.8.6 2.7.7a2 2 0 0 1 1.7 2z" />
                                </svg>
                                <a href="tel:{{ preg_replace('/[^0-9+]/', '', $site['contact_phone']) }}"
                                    dir="ltr">{{ $site['contact_phone'] }}</a>
                            </li>
                        @endif
                        @if (!empty($site['contact_email']))
                            <li><svg class="fu-i" viewBox="0 0 24 24" aria-hidden="true">
                                    <rect x="3" y="5" width="18" height="14" rx="2" />
                                    <path d="m3 7 9 6 9-6" />
                                </svg>
                                <a href="mailto:{{ $site['contact_email'] }}">{{ $site['contact_email'] }}</a>
                            </li>
                        @endif
                        @php($visitorCount = (new \App\Http\Controllers\VisitorController())->getVisitorCount())
                        <li><svg class="fu-i" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M2 12s3.6-7 10-7 10 7 10 7-3.6 7-10 7S2 12 2 12z" />
                                <circle cx="12" cy="12" r="3" />
                            </svg>
                            <span>Visitors: <b>{{ number_format($visitorCount) }}</b></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="fu-footer-bottom">
            <div class="container">
                <span>&copy; {{ date('Y') }} The Future University. All rights reserved.</span>
                <span>Designed and developed by <a href="{{ route('CESD') }}">CESD</a></span>
            </div>
        </div>
    </footer>

</body>

</html>