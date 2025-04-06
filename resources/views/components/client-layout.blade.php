<!DOCTYPE html>
<html lang="en">

<head>
    <title>The Future University</title>
    <meta charset="UTF-8">
    <meta name="description" content="The Future University">
    <meta name="keywords" content="The Future University">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

    <link href="{{ asset('./public/client/img/fu_logo.png') }}" rel="shortcut icon" />

    <!-- <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i" rel="stylesheet"> -->
    <link href="https://fonts.googleapis.com/css?family=Ubuntu:400,400i,500,500i,700,700i" rel="stylesheet">

    {{-- <link rel="stylesheet" href="{{ asset('./public/client/css/bootstrap.min.css') }}" /> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{ asset('./public/client/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('./public/client/css/themify-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('./public/client/css/magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ asset('./public/client/css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('./public/client/css/owl.carousel.css') }}" />
    <link rel="stylesheet" href="{{ asset('./public/client/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('./public/client/css/style.css') }}" />

    @if (Request::is('Facts-Figures'))
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @endif

    @if (Request::is('Fu-Historical-Gallery') || Request::is('Students-Gallery'))
        <link rel="stylesheet" href="{{ asset('./public/client/css/swiper-bundle.min.css') }}" />
        <script src="{{ asset('./public/client/js/swiper-bundle.min.js') }}"></script>
    @endif
</head>

<body>
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <header class="header-section">
        <div class="container">

            <a href="Home" class="site-logo"><img src="{{ asset('./public/client/img/fu_logo.png') }}"
                    height="100px" width="100px" alt></a>
            <div class="nav-switch">
                <i class="fa fa-bars"></i>
            </div>

            <div class="header-info" style="margin-top: 20px;float: right;">
                <div class="hf-item">
                    <i class="fa fa-envelope"></i>
                    <a href="mailto:info@fu.edu.sd" target="_blank">
                        <p><span>Email</span>info@fu.edu.sd</p>
                    </a>
                </div>
                <div class="hf-item">
                    <i class="fa fa-phone"></i>
                    <p><span>Phone:</span>(+249) 183 411 818</p>
                </div>
            </div>
        </div>
    </header>

    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-3 col-3 header-top-left no-padding">
                    <ul>

                        <a href="https://www.facebook.com/TheFutureUniversity/" target="_blank"><i
                                class="fa fa-facebook-square"></i></a>
                        <a href="https://www.linkedin.com/school/sudan-civil-aviation-authority" target="_blank"><i
                                class="fa fa-linkedin-square"></i></a>

                    </ul>
                </div>
                <div class="col-lg-9 col-sm-9 col-9" style="text-align: end;">
                    <a href="https://result.fu.edu.sd/" target="_blank">Students Portal <b
                            style="color: #fec169;">|</b></a>
                    <a href="https://elearning.fu.edu.sd/" target="_blank">E-Learning <b
                            style="color: #fec169;">|</b></a>
                    <a href="https://hdesk.fu.edu.sd/" target="_blank">Help Desk</a>
                </div>
            </div>
        </div>
    </div>

    <nav class="nav-section HeaderMainColor">
        <div class="container">
            <ul class="main-menu">

                <li class="{{ Request::is('/', 'Home') ? 'ActiveMenuMainColor' : '' }}">
                    <a href="{{ route('Home') }}">Home</a>
                </li>

                <li
                    class="{{ Request::is('About-FU', 'Fu-Linkages', 'Facts-Figures', 'barChart', 'Fu-Historical-Gallery', 'Staff-Directory', 'Staff-Details') ? 'ActiveMenuMainColor' : '' }}">
                    <a href="javascript:void(0);" class="sub-menu-arrow">About</a>
                    <ul class="sub-main-menu">
                        <li><a href="{{ route('About-FU') }}" style="text-align: left;">History</a></li>
                        <li><a href="{{ route('Staff-Directory') }}" style="text-align: left;">Staff Directory</a></li>
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
                    <a href="javascript:void(0);" class="sub-menu-arrow">Programs</a>
                    <ul class="sub-main-menu">
                        <li><a href="{{ route('Undergraduate-Programs') }}" style="text-align: left;">Undergraduate
                                Programs</a></li>
                        <li><a href="{{ route('Postgraduates-Programs') }}" style="text-align: left;">Postgraduate
                                Programs</a></li>
                    </ul>
                </li>

                <li
                    class="{{ Request::is('Undergraduate-Admission', 'Postgraduate-Admission', 'External-Transfer', 'Fee-Structure', 'Scholarships') ? 'ActiveMenuMainColor' : '' }}">
                    <a href="javascript:void(0);" class="sub-menu-arrow">Admission</a>
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
                    <a href="javascript:void(0);" class="sub-menu-arrow">Students</a>
                    <ul class="sub-main-menu">
                        <li><a href="{{ route('Student-Affairs') }}" style="text-align: left;">Students Affairs</a>
                        </li>
                    </ul>
                </li>

                <li class="{{ Request::is('Fu-Journal') ? 'ActiveMenuMainColor' : '' }}">
                    <a href="javascript:void(0);" class="sub-menu-arrow">Research & Publications</a>
                    <ul class="sub-main-menu">
                        <li><a href="https://thj.fu.edu.sd/" target="_blank" style="text-align: left;">The Technology
                                Horizon Journal</a></li>
                    </ul>
                </li>

                <li
                    class="{{ Request::is('CESD', 'CTS', 'UNESCO', 'ICDL', 'Space-Technology-Center', 'IRDC') ? 'ActiveMenuMainColor' : '' }}">
                    <a href="javascript:void(0);" class="sub-menu-arrow">Centers</a>
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

    @yield('main-client-content')

    <!-- main content End -->.

    <!-- Zoom Floating Button Start-->
    <a href="https://fu-edu-sd.zoom.us/my/thefutureuniversity" target="_blank" class="zoom-float"
        title="Live Technical Support">
        <img src="{{ asset('./public/client/img/ts.png') }}" alt="Zoom"
            style="width: 60px; height: 60px;border-radius: 5px;">
    </a>
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
                        <img src="{{ asset('./public/client/img/fu_logo.png') }}" alt="The Future University"
                            width="80px" height="80px" loading="lazy" style="margin-left: 0px;">
                        <p>
                            The Future University is an institution of higher learning committed in producing well -
                            rounded professionals who will be responsible in providing quality
                            of life in the society.
                        </p>

                    </div>
                </div>

                <div class="col-sm-6 col-lg-3 footer-widget">
                    <h6 class="fw-title">USEFUL LINK</h6>
                    <div class="dobule-link">
                        <ul>
                            <li><a href="{{ route('Home') }}">Home</a></li>
                            <li><a href="https://elearning.fu.edu.sd/" target="_blank">E-Learning</a></li>
                            <li><a href="https://hdesk.fu.edu.sd/" target="_blank">Help Desk</a></li>
                            <li><a href="https://result.fu.edu.sd/" target="_blank">Students Portal</a></li>
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
                    <h6 class="fw-title">RECENT NEWS</h6>
                    <ul class="recent-post">
                        <li>
                            <p>Launching Future University E-Learning Platform</p>
                            <span><i class="fa fa-clock-o SubFooterText"></i>05 MAY 2019</span>
                        </li>
                        <li>
                            <p>Launching Future University Student Desk Mobile App</p>
                            <span><i class="fa fa-clock-o SubFooterText"></i>11 Sep 2020</span>
                        </li>
                    </ul>
                </div>

                <div class="col-sm-6 col-lg-3 footer-widget">
                    <h6 class="fw-title">FIND US</h6>
                    <ul class="contact">
                        <li>
                            <a href="https://maps.app.goo.gl/7HzpquiBAVvo6RBt7" target="_blank">
                                <p><i class="fa fa-map-marker"></i> Africa Street - Khartoum, Sudan</p>
                            </a>
                        </li>

                        <li>
                            <p><i class="fa fa-phone"></i> (+249) 183 411 818</p>
                        </li>

                        {{-- <li>
							<p>Fax:  (+249) 155 182 880</p>
						</li> --}}

                        <li>
                            <a href="mailto:info@fu.edu.sd" target="_blank">
                                <p><i class="fa fa-envelope"></i> info@fu.edu.sd</p>
                            </a>
                        </li>
                        @php
                            $visitorCount = (new \App\Http\Controllers\VisitorController())->getVisitorCount();
                        @endphp
                        <li>
                            <p style="color: #fff;">Visitor Counter: <strong
                                    style="color: #fec169">{{ $visitorCount }}</strong></p>
                        </li>

                        <li>
                            <div class="social pt-1">
                                <a href="https://www.facebook.com/TheFutureUniversity/" target="_blank"><i
                                        class="fa fa-facebook-square"></i></a>
                                <a href="https://www.linkedin.com/school/sudan-civil-aviation-authority"
                                    target="_blank"><i class="fa fa-linkedin-square"></i></a>

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
                    <script>
                        document.write(new Date().getFullYear());
                    </script>
                    All rights reserved for <strong style="color: #fec169">The Future
                        University.</strong> Designed and Developed by
                    <a href="{{ route('CESD') }}"target="_blank" style="color: #fec169"><strong>CESD</strong></a> &
                    <a href="{{ route('CTS') }}"target="_blank" style="color: #fec169"><strong>CTS</strong></a>
                </p>
            </div>
        </div>
    </footer>

    <script src="{{ asset('./public/client/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('./public/client/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('./public/client/js/jquery.countdown.js') }}"></script>
    <script src="{{ asset('./public/client/js/masonry.pkgd.min.js') }}"></script>
    <script src="{{ asset('./public/client/js/magnific-popup.min.js') }}"></script>
    <script src="{{ asset('./public/client/js/main.js') }}"></script>

    <!-- slide show for Facultys start-->
    <script src="{{ asset('./public/client/js/splide.min.js') }}"></script>

    {{-- Hide show nav-section Start --}}
    <script>
        window.onscroll = function() {
            const nav = document.querySelector('.nav-section');
            const headerTop = document.querySelector('.header-top');

            if (window.pageYOffset > headerTop.clientHeight) {
                nav.classList.add('fixed');
            } else {
                nav.classList.remove('fixed');
            }
        };
    </script>

    {{-- Hide show nav-section End --}}

</body>

</html>
