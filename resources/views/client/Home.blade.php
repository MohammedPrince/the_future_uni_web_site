@extends('components.client-layout')
@section('preload')
    {{-- The first slide is the largest thing on the page: start loading it at once. --}}
    @if ($first = $slides->first())
        <link rel="preload" as="image" fetchpriority="high" href="{{ $first->src() }}"
            imagesrcset="{{ $first->srcset() }}" imagesizes="100vw">
    @endif
@endsection

@section('main-client-content')
    @php
        $applyUrl = \App\Models\Setting::get('admission_url') ?: route('Undergraduate-Admission');
        $elearningUrl = \App\Models\Setting::get('elearning_url') ?: 'https://elearning.fu.edu.sd/';
        // "A, B, C." -> the part after the last comma is shown in orange.
        $splitTitle = function ($title) {
            $pos = mb_strrpos($title, ',');
            return $pos === false ? [$title, ''] : [mb_substr($title, 0, $pos + 1), trim(mb_substr($title, $pos + 1))];
        };
    @endphp

    {{-- ===== Hero slider (Admin > Home Slider) ===== --}}
    <section class="hero-section fu-hero">
        <div class="hero-slider owl-carousel">
            <div class="owl-stage-outer">
                @foreach ($slides as $slide)
                    @php
                        [$titleMain, $titleAccent] = $splitTitle($slide->title);
                    @endphp
                    <div class="owl-item {{ $loop->first ? 'active' : '' }}">
                        <div class="hs-item">
                            @if ($loop->first)
                                <img class="hs-bg" src="{{ $slide->src() }}" srcset="{{ $slide->srcset() }}"
                                    sizes="100vw" width="{{ $slide->img_width }}" height="{{ $slide->img_height }}"
                                    alt="{{ $slide->alt ?: $slide->title }}" fetchpriority="high">
                            @else
                                <img class="hs-bg" data-src="{{ $slide->src() }}" data-srcset="{{ $slide->srcset() }}"
                                    sizes="100vw" width="{{ $slide->img_width }}" height="{{ $slide->img_height }}"
                                    alt="{{ $slide->alt ?: $slide->title }}">
                            @endif
                            <div class="fu-hero-text">
                                <div class="container">
                                    @if ($slide->subtitle)
                                        <span class="fu-hero-eyebrow"><i aria-hidden="true"></i>{{ $slide->subtitle }}</span>
                                    @endif
                                    @if ($loop->first)
                                        <h1 class="fu-hero-title">{{ $titleMain }} @if ($titleAccent)<em>{{ $titleAccent }}</em>@endif</h1>
                                    @else
                                        <h2 class="fu-hero-title">{{ $titleMain }} @if ($titleAccent)<em>{{ $titleAccent }}</em>@endif</h2>
                                    @endif
                                    <div class="fu-hero-ctas">
                                        @if ($slide->button_text && $slide->button_url)
                                            <a href="{{ $slide->button_url }}" @ext($slide->button_url) class="fu-btn fu-btn-orange">{{ $slide->button_text }} &rarr;</a>
                                        @else
                                            <a href="{{ $applyUrl }}" @ext($applyUrl) class="fu-btn fu-btn-orange">Apply now &rarr;</a>
                                        @endif
                                        <a href="{{ route('Undergraduate-Programs') }}" class="fu-btn fu-btn-ghost">Explore programs</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ===== Why FU ===== --}}
    <section class="fu-why">
        <div class="container fu-why-grid">
            <div class="fu-why-card">
                <h2>Embedded Learning</h2>
                <p>Real-world projects, internships and research partnerships built into every course, so you graduate ready to work.</p>
                <a class="fu-more" href="{{ route('About-FU') }}">Learn more &rarr;</a>
            </div>
            <div class="fu-why-card">
                <h2>Sustainability Focus</h2>
                <p>Sustainable practice across curriculum, campus and community, so our students can take on the challenges of our time.</p>
                <a class="fu-more" href="{{ route('About-FU') }}">Learn more &rarr;</a>
            </div>
            <div class="fu-why-card">
                <h2>Global Engagement</h2>
                <p>Exchange programs, virtual collaboration and cross-cultural learning that prepare you for an interconnected world.</p>
                <a class="fu-more" href="{{ route('Fu-Linkages') }}">Learn more &rarr;</a>
            </div>
        </div>
    </section>

    {{-- ===== E-Learning ===== --}}
    <section class="fu-el">
        <div class="container">
            <div class="fu-el-box">
                <div class="fu-el-main">
                    <span class="fu-el-ic"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M22 10 12 5 2 10l10 5 10-5z"/><path d="M6 12v5c3 2 9 2 12 0v-5"/></svg></span>
                    <div>
                        <h2>E-Learning Platform</h2>
                        <p>Your courses, lectures and assignments online. Available anytime, no matter what.</p>
                        <a class="fu-btn fu-btn-orange" href="{{ $elearningUrl }}" target="_blank" rel="noopener">Open E-Learning &rarr;</a>
                    </div>
                </div>
                <div class="fu-el-stats">
                    <div><b>7</b><span>Days a week</span></div>
                    <div><b>24</b><span>Hours a day</span></div>
                    <div><b>100%</b><span>Online</span></div>
                    <div><b>Any</b><span>Device</span></div>
                </div>
            </div>
        </div>
    </section>

    @php
        $faculties = [
            ['Faculty of Engineering', 'engineering.jpg', 'Undergraduate-Programs'],
            ['Faculty of Computer Science', 'cs.jpg', 'Undergraduate-Programs'],
            ['Faculty of Information Technology', 'it.jpg', 'Undergraduate-Programs'],
            ['Faculty of Telecommunication Engineering', 'tcom.jpg', 'Undergraduate-Programs'],
            ['Faculty of Architecture Engineering', 'arch.jpg', 'Undergraduate-Programs'],
            ['Faculty of Fine Arts and Design', 'fad.jpg', 'Undergraduate-Programs'],
            ['Faculty of Geoinformatics', 'geo.jpg', 'Undergraduate-Programs'],
            ['Faculty of Business Administration', 'ba.jpg', 'Undergraduate-Programs'],
            ['Faculty of Postgraduate Studies', 'post.jpg', 'Postgraduates-Programs'],
        ];
        $helpdesk = \App\Models\Setting::get('helpdesk_url') ?: 'https://hdesk.fu.edu.sd/';
    @endphp

    {{-- ===== Our Faculties ===== --}}
    <section class="fu-sec fu-bg">
        <div class="container">
            <div class="fu-head">
                <span class="fu-eyebrow">Academics</span>
                <h2>Our Faculties</h2>
                <p>Nine faculties, one goal: preparing you for life and work.</p>
            </div>
            <div class="fu-fac-grid">
                @foreach ($faculties as [$name, $logo, $route])
                    <a class="fu-fac" href="{{ route($route) }}">
                        <img src="@img('client/img/main_imgs/faculites/sm/' . $logo)" width="72" height="72" alt="" loading="lazy" decoding="async">
                        <span class="fu-fac-text"><strong>{{ $name }}</strong><small>View programs</small></span>
                        <span class="fu-go" aria-hidden="true">&rsaquo;</span>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ===== Steps to join ===== --}}
    <section class="fu-sec fu-steps">
        <div class="container">
            <div class="fu-head fu-light">
                <span class="fu-eyebrow">External &amp; Internal Transfer / Bridging</span>
                <h2>Eight steps to join us</h2>
                <p>From the transfer form to your first day: here is the whole path.</p>
            </div>
            <ol class="fu-timeline">
                <li><span class="fu-n">1</span><h3>Fill up the transfer form</h3><p>Apply through our <a href="{{ $helpdesk }}" target="_blank" rel="noopener">Help Desk</a>.</p></li>
                <li><span class="fu-n">2</span><h3>Admission &amp; Registration</h3><p>Admission and registration confirm your eligibility.</p></li>
                <li><span class="fu-n">3</span><h3>Faculty review</h3><p>Your transcript is evaluated and credit transfer subjects identified.</p></li>
                <li><span class="fu-n">4</span><h3>Finance &amp; fees</h3><p>Complete the payment through the accepted means.</p></li>
                <li><span class="fu-n">5</span><h3>Index number</h3><p>Obtain your new Ministry and university index number.</p></li>
                <li><span class="fu-n">6</span><h3>E-Learning profile</h3><p>Technical services create your e-learning account.</p></li>
                <li><span class="fu-n">7</span><h3>Student ID &amp; profile</h3><p>Track your application on the <a href="{{ $helpdesk }}" target="_blank" rel="noopener">Help Desk</a> to get your ID.</p></li>
                <li class="fu-last"><span class="fu-n" aria-hidden="true">&#10003;</span><h3>Welcome to FU!</h3><p>You are now part of our family.</p></li>
            </ol>
            <div class="fu-cta">
                <a class="fu-btn fu-btn-orange" href="{{ $helpdesk }}" target="_blank" rel="noopener">Start on the Help Desk &rarr;</a>
                <a class="fu-btn fu-btn-white" href="{{ route('Fees') }}">Fee Structure</a>
            </div>
        </div>
    </section>

    {{-- ===== Facts ===== --}}
    <section class="fu-facts" aria-label="Facts and figures">
        <div class="container">
            <div class="fu-fact-row">
                <div class="fu-fact"><span class="fu-ic"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M3 21h18M5 21V9l7-5 7 5v12M9 21v-6h6v6"/></svg></span><span><b>1991</b><small>Established</small></span></div>
                <div class="fu-fact"><span class="fu-ic"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20V3H6.5A2.5 2.5 0 0 0 4 5.5v14zM4 19.5A2.5 2.5 0 0 0 6.5 22H20v-5"/></svg></span><span><b>35</b><small>Programs</small></span></div>
                <div class="fu-fact"><span class="fu-ic"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="9" cy="8" r="4"/><path d="M2 21c0-4 3-6 7-6s7 2 7 6M17 11a3 3 0 1 0 0-6M22 21c0-3-2-5-5-5.5"/></svg></span><span><b>2000+</b><small>Active students</small></span></div>
                <div class="fu-fact"><span class="fu-ic"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M22 10 12 5 2 10l10 5 10-5z"/><path d="M6 12v5c3 2 9 2 12 0v-5"/></svg></span><span><b>8000+</b><small>Graduates</small></span></div>
            </div>
        </div>
    </section>

    {{-- ===== Our Centers ===== --}}
    <section class="fu-sec">
        <div class="container">
            <div class="fu-head">
                <span class="fu-eyebrow">Beyond the classroom</span>
                <h2>Our Centers</h2>
                <p>Technical centers that build, support and innovate.</p>
            </div>
            <div class="fu-center-grid">
                <a class="fu-center" href="{{ route('CESD') }}">
                    <span class="fu-badge" style="background:#1d5191"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="4" width="18" height="12" rx="2"/><path d="M8 20h8M12 16v4M9 9l-2 1.5L9 12M15 9l2 1.5-2 1.5"/></svg></span>
                    <span class="fu-tag">CESD</span>
                    <h3>Center of E-Learning and Software Development</h3>
                    <p>A hub that harnesses technology to transform education: e-learning platforms and software solutions that help students and professionals thrive in the digital age.</p>
                    <span class="fu-more">Learn more &rarr;</span>
                </a>
                <a class="fu-center" href="{{ route('CTS') }}">
                    <span class="fu-badge" style="background:#e2730f"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="3" width="18" height="7" rx="1.5"/><rect x="3" y="14" width="18" height="7" rx="1.5"/><path d="M7 6.5h.01M7 17.5h.01"/></svg></span>
                    <span class="fu-tag">CTS</span>
                    <h3>Center of Technological Services</h3>
                    <p>State-of-the-art facilities and specialised support for students, faculty and researchers, from computing infrastructure to prototyping tools.</p>
                    <span class="fu-more">Learn more &rarr;</span>
                </a>
                <a class="fu-center" href="{{ route('IRDC') }}">
                    <span class="fu-badge" style="background:#15803d"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M9 18h6M10 22h4M12 2a7 7 0 0 0-4 12.7V17h8v-2.3A7 7 0 0 0 12 2z"/></svg></span>
                    <span class="fu-tag">IRDC</span>
                    <h3>Innovation Research and Development Center</h3>
                    <p>Where pioneering ideas come to life: cross-disciplinary collaboration and access to cutting-edge resources for researchers and innovators.</p>
                    <span class="fu-more">Learn more &rarr;</span>
                </a>
            </div>
        </div>
    </section>

    <!-- /////////////////////// -->
    {{-- ===== News & Events (order: Admin > Manage News / Events > "Order on the home page") ===== --}}
    @if ($homeItems->isNotEmpty())
    <section class="fu-sec fu-bg">
        <div class="container" data-ne-slider>
            <div class="fu-head-row">
                <div class="fu-head">
                    <span class="fu-eyebrow">Stay updated</span>
                    <h2>News &amp; Events</h2>
                </div>
                <div class="fu-news-tools">
                    <div class="widget fu-search">
                        <div class="search-widget">
                            <input type="text" id="search-input" class="form-control" placeholder="Search news and events" aria-label="Search news and events">
                            <button type="button" aria-label="Search"><i class="ti-search" aria-hidden="true"></i></button>
                        </div>
                    </div>
                    <button type="button" class="ne-arrow ne-prev" aria-label="Previous news" hidden><i class="fa fa-angle-left" aria-hidden="true"></i></button>
                    <button type="button" class="ne-arrow ne-next" aria-label="Next news" hidden><i class="fa fa-angle-right" aria-hidden="true"></i></button>
                </div>
            </div>
            <div class="text-center" id="search-results"></div>

            <div class="ne-track" tabindex="0" role="region" aria-label="News and events">
                @foreach ($homeItems as $item)
                    @php
                        $d = strtotime($item['date']);
                        // More than one image: the card shows them in turn (site.js, [data-photos]).
                        $photos = array_map(fn ($p) => \App\Support\Media::url($p), array_slice($item['images'] ?? [], 0, 8));
                    @endphp
                    <article class="ne-slide">
                        <a class="fu-card" href="{{ $item['url'] }}">
                            <span class="fu-card-img" @if (count($photos) > 1) data-photos="{{ json_encode($photos) }}" @endif>
                                <img loading="lazy" decoding="async" src="@img($item['image'] ?: 'client/img/fu_logo.png')" width="570" height="356"
                                    alt="" @unless ($item['image']) style="object-fit:contain;padding:30px" @endunless>
                                <span class="fu-type {{ $item['type'] === 'Event' ? 'is-event' : '' }}">{{ $item['type'] }}</span>
                                <span class="fu-date"><b>{{ date('d', $d) }}</b>{{ date('M Y', $d) }}</span>
                                @if (count($photos) > 1)
                                    <span class="fu-photos" aria-label="{{ count($photos) }} photos"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 7h3l2-3h6l2 3h3a1 1 0 0 1 1 1v11a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1z"/><circle cx="12" cy="13" r="4"/></svg><span data-photo-n>1</span>/{{ count($photos) }}</span>
                                @endif
                            </span>
                            <span class="fu-card-body" dir="auto">
                                <h3 dir="auto">{{ $item['title'] }}</h3>
                                <p dir="auto">{{ \Illuminate\Support\Str::words($item['excerpt'], 28, '...') }}</p>
                                <span class="fu-more">Read more <span class="visually-hidden">about {{ $item['title'] }}</span>&rarr;</span>
                            </span>
                        </a>
                    </article>
                @endforeach
            </div>
            <div class="ne-dots"></div>
            <div class="fu-cta">
                <a class="fu-btn fu-btn-line" href="{{ route('NewsAndEvents') }}">All News &amp; Events &rarr;</a>
            </div>
        </div>
    </section>
    @endif

    {{-- ===== Alumni testimonials (Admin > Testimonials) ===== --}}
    @if ($testimonials->isNotEmpty())
    <section class="fu-sec">
        <div class="container fu-tm-wrap">
            <div>
                <div class="fu-head fu-left">
                    <span class="fu-eyebrow">Alumni testimonials &middot; 1991 - now</span>
                    <h2>Our graduates lead across the region</h2>
                    <p>Hear it from the people who studied here.</p>
                </div>
                <div class="fu-faces" aria-hidden="true">
                    @foreach ($testimonials->take(6) as $t)
                        <img src="@img($t->photo ?: 'client/img/fu_logo.png')" width="52" height="52" alt="" loading="lazy">
                    @endforeach
                </div>
            </div>
            <div class="fu-tm">
                <span class="fu-mark" aria-hidden="true">&ldquo;</span>
                @foreach ($testimonials as $t)
                    <figure class="fu-tm-item">
                        <blockquote>{{ $t->quote }}</blockquote>
                        <figcaption class="fu-who">
                            <img src="@img($t->photo ?: 'client/img/fu_logo.png')" width="64" height="64" alt="" loading="lazy">
                            <span><b>{{ $t->name }}</b>@if ($t->position)<small>{{ $t->position }}</small>@endif</span>
                        </figcaption>
                    </figure>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- ===== Partners ===== --}}
    <section class="fu-sec fu-bg">
        <div class="container">
            <div class="fu-head">
                <span class="fu-eyebrow">Working together</span>
                <h2>Our Partners</h2>
                <p>Universities and institutions we learn and grow with.</p>
            </div>
            <div class="fu-partners">
                @foreach ([
                    ['Multimedia University', 'mmu.png', 'https://mmu.edu.my/'],
                    ['Sudan Airways', 'sudan-airways.png', 'https://www.sudanair.com/'],
                    ['National Information Center', 'nic.png', 'https://www.facebook.com/nicsudan.sd/'],
                    ['University of Nottingham', 'nottingham_university.png', 'https://www.nottingham.ac.uk/'],
                    ['Universitas Islam Indonesia', 'uni_of_ini.png', 'https://www.uii.ac.id/'],
                ] as [$name, $logo, $url])
                    <a class="fu-partner" href="{{ $url }}" target="_blank" rel="noopener">
                        <span class="fu-partner-logo"><img src="@img('client/img/main_imgs/members/' . $logo)" width="150" height="150" alt="{{ $name }} logo" loading="lazy" decoding="async"></span>
                        <span>{{ $name }}</span>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
@endsection
