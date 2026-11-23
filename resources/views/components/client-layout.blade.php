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
        <style>{!! $homeCss !!}</style>
        <link rel="prefetch" href="@img('client/dist/site.min.css')" as="style">
    @else
        <link rel="preload" href="{{ asset('public/client/fonts/ubuntu-400-latin.woff2') }}" as="font" type="font/woff2" crossorigin>
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

<body>
    @php
        // Managed in Admin > Site Settings (defaults in config/site.php).
        $site = \App\Models\Setting::allValues();
        $footerNews = rescue(fn () => \App\Models\News::published()->orderByDesc('news_date')->orderByDesc('id')->take(2)->get(['id', 'news_title', 'news_date']), collect(), false);
    @endphp
    <a class="skip-link" href="#main-content">Skip to content</a>

    @if (($site['announcement_enabled'] ?? '0') === '1' && !empty($site['announcement_text']))
        <div class="site-announcement" role="region" aria-label="Announcement"
            style="background: #fb8b24; color: #fff; text-align: center; padding: 8px 16px; font-size: 15px; line-height: 1.4;">
            @if (!empty($site['announcement_url']))
                <a href="{{ $site['announcement_url'] }}" style="color: #fff; text-decoration: underline;">{{ $site['announcement_text'] }}</a>
            @else
                {{ $site['announcement_text'] }}
            @endif
        </div>
    @endif

    <header class="header-section">
        <div class="container">

            <a href="{{ route('Home') }}" class="site-logo"><img src="@img('client/img/fu_logo.png')"
                    height="100" width="100" alt="The Future University, home"></a>
            <button type="button" class="nav-switch" aria-label="Menu" aria-expanded="false">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </button>

            <div class="header-info" style="margin-top: 20px;float: right;">
                @if (!empty($site['contact_email']))
                <div class="hf-item">
                    <i class="fa fa-envelope"></i>
                    <a href="mailto:{{ $site['contact_email'] }}" target="_blank" rel="noopener">
                        <p><span>Email</span>{{ $site['contact_email'] }}</p>
                    </a>
                </div>
                @endif
                @if (!empty($site['contact_phone']))
                <div class="hf-item">
                    <i class="fa fa-phone"></i>
                    <p><span>Phone:</span>{{ $site['contact_phone'] }}</p>
                </div>
                @endif
            </div>
        </div>
    </header>

    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-3 col-3 header-top-left no-padding">
                    <ul class="social-links">
                        @if (!empty($site['facebook_url']))
                        <li><a href="{{ $site['facebook_url'] }}" target="_blank" rel="noopener" aria-label="Facebook"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
                        @endif
                        @if (!empty($site['linkedin_url']))
                        <li><a href="{{ $site['linkedin_url'] }}" target="_blank" rel="noopener" aria-label="LinkedIn"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
                        @endif
                    </ul>
                </div>
                <div class="col-lg-9 col-sm-9 col-9" style="text-align: end;">
                    {{-- <a href="https://result.fu.edu.sd/" target="_blank" rel="noopener">Students Portal <b
                            style="color: #fec169;">|</b></a> --}}
                    @php
                        $topLinks = array_filter([
                            'Admission' => $site['admission_url'] ?? '',
                            'E-Learning' => $site['elearning_url'] ?? '',
                            'Help Desk' => $site['helpdesk_url'] ?? '',
                        ]);
                    @endphp
                    @foreach ($topLinks as $label => $url)
                        <a href="{{ $url }}" target="_blank" rel="noopener">{{ $label }}@unless ($loop->last) <b
                            style="color: #fec169;">|</b>@endunless</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <nav class="nav-section HeaderMainColor" aria-label="Main">
        <div class="container">
            <ul class="main-menu">

                <li class="{{ Request::is('/', 'Home') ? 'ActiveMenuMainColor' : '' }}">
                    <a href="{{ route('Home') }}">Home</a>
                </li>

                <li
                    class="{{ Request::is('About-FU', 'Fu-Linkages', 'Facts-Figures', 'barChart', 'Fu-Historical-Gallery', 'Staff-Directory', 'Staff-Details') ? 'ActiveMenuMainColor' : '' }}">
                    <a role="button" tabindex="0" aria-haspopup="true" aria-expanded="false" class="sub-menu-arrow">About</a>
                    <ul class="sub-main-menu">
                        <li><a href="{{ route('About-FU') }}" style="text-align: left;">History</a></li>
                        {{-- <li><a href="{{ route('Staff-Directory') }}" style="text-align: left;">Staff Directory</a></li> --}}
                        <li><a href="{{ route('barChart') }}" style="text-align: left;">Facts & Figures</a></li>
                        <li><a href="{{ route('Fu-Linkages') }}" style="text-align: left;">Linkages</a></li>
                        <li><a href="{{ route('Fu-Historical-Gallery') }}" style="text-align: left;">Gallery</a></li>
                    </ul>
                </li>

                <li
                    class="{{ request()->is('News-Details/*') || request()->is('Event-Details/*') || Request::is('News-and-Events') ? 'ActiveMenuMainColor' : '' }}">
                    <a href="{{ route('NewsAndEvents') }}">News & Events</a>
                </li>

                <li
                    class="{{ Request::is('Undergraduate-Programs', 'Postgraduates-Programs') ? 'ActiveMenuMainColor' : '' }}">
                    <a role="button" tabindex="0" aria-haspopup="true" aria-expanded="false" class="sub-menu-arrow">Programs</a>
                    <ul class="sub-main-menu">
                        <li><a href="{{ route('Undergraduate-Programs') }}" style="text-align: left;">Undergraduate
                                Programs</a></li>
                        <li><a href="{{ route('Postgraduates-Programs') }}" style="text-align: left;">Postgraduate
                                Programs</a></li>
                    </ul>
                </li>

                <li
                    class="{{ Request::is('Undergraduate-Admission', 'Postgraduate-Admission', 'External-Transfer', 'Fee-Structure', 'Scholarships') ? 'ActiveMenuMainColor' : '' }}">
                    <a role="button" tabindex="0" aria-haspopup="true" aria-expanded="false" class="sub-menu-arrow">Admission</a>
                    <ul class="sub-main-menu">
                        <li><a href="{{ route('Undergraduate-Admission') }}" style="text-align: left;">Undergraduates
                                Admission</a></li>
                        <li><a href="{{ route('Postgraduate-Admission') }}" style="text-align: left;">Postgraduates
                                Admission</a></li>
                        <li><a href="{{ route('External-Transfer') }}" style="text-align: left;">External & Internal
                                Transfer / Bridging</a></li>
                        <li><a href="{{ route('Fees') }}" style="text-align: left;">Fee Structure</a></li>
                        <li><a href="{{ route('Scholarships') }}" style="text-align: left;">Scholarships</a></li>
                    </ul>
                </li>

                <li class="{{ Request::is('Student-Affairs', 'Students-Gallery') ? 'ActiveMenuMainColor' : '' }}">
                    <a role="button" tabindex="0" aria-haspopup="true" aria-expanded="false" class="sub-menu-arrow">Students</a>
                    <ul class="sub-main-menu">
                        <li><a href="{{ route('Student-Affairs') }}" style="text-align: left;">Students Affairs</a>
                        </li>
                    </ul>
                </li>

                <li class="{{ Request::is('Fu-Journal') ? 'ActiveMenuMainColor' : '' }}">
                    <a role="button" tabindex="0" aria-haspopup="true" aria-expanded="false" class="sub-menu-arrow">Research & Publications</a>
                    <ul class="sub-main-menu">
                        <li><a href="https://thj.fu.edu.sd/" target="_blank" rel="noopener" style="text-align: left;">The Technology
                                Horizon Journal</a></li>
                    </ul>
                </li>

                <li
                    class="{{ Request::is('CESD', 'CTS', 'UNESCO', 'ICDL', 'Space-Technology-Center', 'IRDC') ? 'ActiveMenuMainColor' : '' }}">
                    <a role="button" tabindex="0" aria-haspopup="true" aria-expanded="false" class="sub-menu-arrow">Centers</a>
                    <ul class="sub-main-menu">
                        <li><a href="{{ route('CESD') }}" style="text-align: left;">Center of E-learning and
                                Software Development</a></li>
                        <li><a href="{{ route('CTS') }}" style="text-align: left;">Center of Technical
                                Services</a></li>
                        <li><a href="{{ route('IRDC') }}" style="text-align: left;">Innovation Research and
                                Development Center</a></li>
                        <li><a href="{{ route('UNESCO') }}" style="text-align: left;">UNESCO</a></li>
                        <li><a href="{{ route('Space-Technology-Center') }}" style="text-align: left;">Space
                                Technology Research Center</a></li>
                        <li><a href="{{ route('ICDL') }}" style="text-align: left;">ICDL</a></li>
                    </ul>
                </li>


            </ul>
        </div>
    </nav>

    <!-- main content -->

    <main id="main-content">
        @unless (Request::is('/'))
            <h1 class="visually-hidden">{{ $seo['title'] ?? (config('seo.pages.' . trim(request()->path(), '/'))[0] ?? config('seo.site_name')) }}</h1>
        @endunless
        @yield('main-client-content')
    </main>

    <!-- main content End -->

    <!-- Zoom Floating Button Start-->
    @if (!empty($site['support_url']))
    <a href="{{ $site['support_url'] }}" target="_blank" rel="noopener" class="zoom-float"
        title="Live Technical Support">
        <img src="@img('client/img/ts.png')" alt="Live technical support on Zoom" width="60" height="60" loading="lazy" style="border-radius: 5px;">
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

    <footer class="footer-section FooterMainColor">
        <div class="container footer-top">
            <div class="row">

                <div class="col-sm-6 col-lg-3 footer-widget">
                    <div class="about-widget">
                        <img src="@img('client/img/fu_logo.png')" alt="The Future University"
                            width="80" height="80" loading="lazy" style="margin-left: 0px;">
                        <p>
                            {{ $site['footer_about'] ?? '' }}
                        </p>

                    </div>
                </div>

                <div class="col-sm-6 col-lg-3 footer-widget">
                    <h6 class="fw-title" role="heading" aria-level="2">USEFUL LINK</h6>
                    <div class="dobule-link">
                        <ul>
                            <li><a href="{{ route('Home') }}">Home</a></li>
                            @if (!empty($site['elearning_url']))
                            <li><a href="{{ $site['elearning_url'] }}" target="_blank" rel="noopener">E-Learning</a></li>
                            @endif
                            @if (!empty($site['helpdesk_url']))
                            <li><a href="{{ $site['helpdesk_url'] }}" target="_blank" rel="noopener">Help Desk</a></li>
                            @endif
                            @if (!empty($site['students_portal_url']))
                            <li><a href="{{ $site['students_portal_url'] }}" target="_blank" rel="noopener">Students Portal</a></li>
                            @endif
                            <li><a href="{{ route('About-FU') }}">Why FU ?</a></li>
                        </ul>
                        <ul>
                            <li><a href="{{ route('CESD') }}">CESD</a></li>
                            <li><a href="{{ route('CTS') }}">CTS</a></li>
                            <li><a href="{{ route('IRDC') }}">IRDC</a></li>
                            <li><a href="{{ route('Undergraduate-Admission') }}">Admission</a></li>
                            <li><a href="{{ route('NewsAndEvents') }}">News & Events</a></li>

                        </ul>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3 footer-widget">
                    <h6 class="fw-title" role="heading" aria-level="2">RECENT NEWS</h6>
                    <ul class="recent-post">
                        @forelse ($footerNews as $recent)
                        <li>
                            <a href="{{ route('newsDetails', base64_encode($recent->id)) }}"><p>{{ \Illuminate\Support\Str::limit($recent->news_title, 70) }}</p></a>
                            <span><i class="fa fa-clock-o SubFooterText"></i>{{ \Illuminate\Support\Carbon::parse($recent->news_date)->format('d M Y') }}</span>
                        </li>
                        @empty
                        <li>
                            <a href="{{ route('NewsAndEvents') }}"><p>News &amp; Events</p></a>
                        </li>
                        @endforelse
                    </ul>
                </div>

                <div class="col-sm-6 col-lg-3 footer-widget">
                    <h6 class="fw-title" role="heading" aria-level="2">FIND US</h6>
                    <ul class="contact">
                        @if (!empty($site['address']))
                        <li>
                            @if (!empty($site['map_url']))
                            <a href="{{ $site['map_url'] }}" target="_blank" rel="noopener">
                                <p><i class="fa fa-map-marker"></i> {{ $site['address'] }}</p>
                            </a>
                            @else
                            <p><i class="fa fa-map-marker"></i> {{ $site['address'] }}</p>
                            @endif
                        </li>
                        @endif

                        @if (!empty($site['contact_phone']))
                        <li>
                            <p><i class="fa fa-phone"></i> {{ $site['contact_phone'] }}</p>
                        </li>
                        @endif

                        {{-- <li>
							<p>Fax:  (+249) 155 182 880</p>
						</li> --}}

                        @if (!empty($site['contact_email']))
                        <li>
                            <a href="mailto:{{ $site['contact_email'] }}" target="_blank" rel="noopener">
                                <p><i class="fa fa-envelope"></i> {{ $site['contact_email'] }}</p>
                            </a>
                        </li>
                        @endif
                        @php
                            $visitorCount = (new \App\Http\Controllers\VisitorController())->getVisitorCount();
                        @endphp
                        <li>
                            <p style="color: #fff;">Visitor Counter: <strong style="color: #fec169">{{ number_format($visitorCount) }}</strong></p>
                        </li>

                        <li>
                            <div class="social pt-1">
                                @if (!empty($site['facebook_url']))
                                <a href="{{ $site['facebook_url'] }}" target="_blank" rel="noopener" aria-label="Facebook"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                                @endif
                                @if (!empty($site['linkedin_url']))
                                <a href="{{ $site['linkedin_url'] }}" target="_blank" rel="noopener" aria-label="LinkedIn"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
                                @endif

                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="copyright">
            <div class="container">
                <p style="color: #fff;font-size:11px;">
                    Copyright &copy;
                    {{ date('Y') }}
                    All rights reserved for <strong style="color: #fec169">The Future
                        University.</strong> Designed and Developed by
                    <a href="{{ route('CESD') }}" target="_blank" rel="noopener" style="color: #fec169"><strong>CESD</strong></a> &
                    <a href="{{ route('CTS') }}" target="_blank" rel="noopener" style="color: #fec169"><strong>CTS</strong></a>
                </p>
            </div>
        </div>
    </footer>

</body>

</html>
