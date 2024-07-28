<!DOCTYPE html>
<html lang="en">

<head>
    <title>The Future University</title>
    <meta charset="UTF-8">
    <meta name="description" content="The Future University">
    <meta name="keywords" content="The Future University">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="{{ asset('./public/client/img/fu_logo.png') }}" rel="shortcut icon" />

    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('./public/client/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('./public/client/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('./public/client/css/themify-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('./public/client/css/magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ asset('./public/client/css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('./public/client/css/owl.carousel.css') }}" />
    <link rel="stylesheet" href="{{ asset('./public/client/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('./public/client/css/style.css') }}" />

    <!-- slide show start -->
    <link rel="stylesheet" href="{{ asset('./public/client/css/splide.min.css') }}" />

    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css"> -->
    <!-- slide show end -->


    <!--[if lt IE 9]>
 <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
 <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
 <![endif][]-->

    {{-- <script
	nonce="1e3b7c67-d2f3-4362-a5da-f9977a2f5706">(function (w, d) 
	{ !function (j, k, l, m) { j[l] = j[l] || {}; j[l].executed = []; j.zaraz = { deferred: [], listeners: [] }; j.zaraz.q = []; j.zaraz._f = function (n) { return async function () { var o = Array.prototype.slice.call(arguments); j.zaraz.q.push({ m: n, a: o }) } }; for (const p of ["track", "set", "debug"]) j.zaraz[p] = j.zaraz._f(p); j.zaraz.init = () => { var q = k.getElementsByTagName(m)[0], r = k.createElement(m), s = k.getElementsByTagName("title")[0]; s && (j[l].t = k.getElementsByTagName("title")[0].text); j[l].x = Math.random(); j[l].w = j.screen.width; j[l].h = j.screen.height; j[l].j = j.innerHeight; j[l].e = j.innerWidth; j[l].l = j.location.href; j[l].r = k.referrer; j[l].k = j.screen.colorDepth; j[l].n = k.characterSet; j[l].o = (new Date).getTimezoneOffset(); if (j.dataLayer) for (const w of Object.entries(Object.entries(dataLayer).reduce(((x, y) => ({ ...x[1], ...y[1] })), {}))) zaraz.set(w[0], w[1], { scope: "page" }); j[l].q = []; for (; j.zaraz.q.length;) { const z = j.zaraz.q.shift(); j[l].q.push(z) } r.defer = !0; for (const A of [localStorage, sessionStorage]) Object.keys(A || {}).filter((C => C.startsWith("_zaraz_"))).forEach((B => { try { j[l]["z_" + B.slice(7)] = JSON.parse(A.getItem(B)) } catch { j[l]["z_" + B.slice(7)] = A.getItem(B) } })); r.referrerPolicy = "origin"; 
	r.src = "/public/client/js/sd0d9.js?z=" + btoa(encodeURIComponent(JSON.stringify(j[l]))); 
	q.parentNode.insertBefore(r, q) };
	["complete", "interActiveMenuMainColor"].includes(k.readyState) ? zaraz.init() : j.addEventListener("DOMContentLoaded", zaraz.init) }(w, d, "zarazData", "script"); })(window, document);
	</script> --}}

    @if (Request::is('Facts-Figures'))
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @endif

	@if ( (Request::is('Fu-Historical-Gallery')) || (Request::is('Students-Gallery')  ) )

	<link rel="stylesheet" href="{{asset('./public/client/css/swiper-bundle.min.css')}}"/>
	<script src="{{asset('./public/client/js/swiper-bundle.min.js')}}"></script>
   
		@endif
		<!-- slide show design start -->
		<style>
    .splide__slide {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      background-color: #fff;
      padding: 1.5rem;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
      margin: 0 0.5rem;
    }

        .splide__slide img {
            width: 60px;
            height: 60px;
            margin-bottom: 0.75rem;
        }

        .splide__slide h3 {
            font-size: 1rem;
            margin-bottom: 0.4rem;
        }

    .splide__slide p {
      font-size: 0.8rem;
      color: #666;
    }
  </style>

    <!-- slide show design End -->
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
                <div class="col-lg-6 col-sm-6 col-8 header-top-left no-padding">
                    <ul>

                        <a href="https://www.facebook.com/TheFutureUniversity/" target="_blank"><i
                                class="fa fa-facebook-square"></i></a>
                        <a href="https://www.linkedin.com/school/sudan-civil-aviation-authority" target="_blank"><i
                                class="fa fa-linkedin-square"></i></a>
                    </ul>
                </div>
                <div class="col-lg-6 col-sm-6 col-4 header-top-right no-padding">

                    <a href="https://result.fu.edu.sd/" target="_blank">Students Portal</a>
                    <a href="https://elearning.fu.edu.sd/" target="_blank">E-Learning</a>
                    <!-- <a href="https://irdc.fu.edu.sd" target="_blank">IRDC</a> -->
                    <a href="https://hdesk.fu.edu.sd/" target="_blank">Help Desk</a>

                </div>
            </div>
        </div>
    </div>

    <nav class="nav-section HeaderMainColor">
        <div class="container">
            <!--
   <div class="nav-right">
    {{-- <a href><i class="fa fa-phone"></i></a>
				<a href><i class="fa fa-shopping-cart"></i></a> --}}
   </div> -->
            <ul class="main-menu">

                <li class="@if (Request::is('/Home'))  @endif ActiveMenuMainColorMenuMainColor "><a
                        href="{{ route('Home') }}">Home</a></li>



                <li class="@if (Request::is('About-FU') ||
                        Request::is('Fu-Linkages') ||
                        Request::is('Facts-Figures') ||
                        Request::is('Fu-Historical-Gallery'))  @endif ActiveMenuMainColor ">
                    <a href="{{ route('About-FU') }}" class="sub-menu-arrow">About</a>
                    <ul class="sub-main-menu">
                        <li><a href="{{ route('About-FU') }}" style="text-align: left;">History</a></li>
                        <!-- <li><a href="About-FU#WhyFutureUniversiy" style="text-align: left;">Why Future University</a></li> -->
                        <li><a href="{{ route('Staff-Directory') }}" style="text-align: left;">Staff Directory</a></li>
                        <!-- <li><a href="Facts-Figures" style="text-align: left;">Facts & Figures</a></li> -->
                        <li><a href="{{ route('Fu-Linkages') }}" style="text-align: left;">Linkages</a></li>
                        <li><a href="{{ route('Fu-Historical-Gallery') }}" style="text-align: left;">Gallery</a></li>
                    </ul>
                </li>
                {{-- Request::segment(3) =='' &&  --}}
                <li class="@if (request()->is('News-Details/*') || request()->is('Event-Details/*') || Request::is('News-and-Events')) ActiveMenuMainColor @endif ">
                    <a href="{{ route('NewsAndEvents') }}">News & Events</a>
                </li>

                <li class="@if (Request::is('Undergraduate-Programs') || Request::is('Postgraduates-Programs')) ActiveMenuMainColor @endif ">
                    <a href="#" class="sub-menu-arrow">Programs</a>
                    <ul class="sub-main-menu">
                        <!-- <li><a href="Postgraduates-Programs" style="text-align: left;">Bachelor Programs</a></li> -->
                        <li><a href="{{ route('Undergraduate-Programs') }}" style="text-align: left;">Undergraduate
                                Programs</a></li>
                        <li><a href="{{ route('Postgraduates-Programs') }}" style="text-align: left;"> Postgraduate
                                Programs</a></li>
                    </ul>
                </li>
                <li class="@if (Request::is('Undergraduate-Admission') || Request::is('Postgraduate-Admission')) ActiveMenuMainColor @endif ">
                    <a href="#" class="sub-menu-arrow">Admission</a>
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

                <li class="@if (Request::is('Student-Affairs') || Request::is('Students-Gallery')) ActiveMenuMainColor @endif ">
                    <a href="#" class="sub-menu-arrow">Students</a>
                    <ul class="sub-main-menu">
                        <li><a href="{{ route('Student-Affairs') }}" style="text-align: left;">Students Affairs</a>
                        </li>
                        <!-- <li><a href="/Students-Gallery">Gallery</a></li> -->
                    </ul>
                </li>

                <li class="@if (Request::is('Fu-Journal')) ActiveMenuMainColor @endif ">
                    <a href="#" class="sub-menu-arrow">Research & Publications</a>
                    <ul class="sub-main-menu">

                        <!-- <li><a href="Fu-Journal">FU Journal</a></li> -->
                        <li><a href="https://thj.fu.edu.sd/" target="_blank" style="text-align: left;">The Technology
                                Horizon Journal</a></li>
                    </ul>
                </li>
                <li class="@if (Request::is('CESD') || Request::is('CTS') || Request::is('IRDC')) ActiveMenuMainColor @endif ">
                    <a href="#" class="sub-menu-arrow">Centers</a>
                    <ul class="sub-main-menu">
                        <li><a href="{{ route('CESD') }}" style="text-align: left;">Center of E-learning and Software
                                Development</a></li>
                        <li><a href="{{ route('CTS') }}" style="text-align: left;">Center of Technical Services</a>
                        </li>
                        <li><a href="{{ route('IRDC') }}" style="text-align: left;">Innovation Research and
                                Development Center</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

    <!-- main content -->

    @yield('main-client-content')

    <!-- main content End -->.



    <!-- Whatsapp Floating action bottn -->
    <!-- <script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>
<div class="elfsight-app-84419fdb-f924-46ce-821b-9543fba30d7f" data-elfsight-app-lazy></div> -->

    <!-- <script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script> -->
    <!-- <div class="elfsight-app-22d3f62a-323f-45b5-be19-d8ebda313c39" data-elfsight-app-lazy></div> -->

    <script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>
    <div class="elfsight-app-248f02a1-1cba-4ac3-ac06-5b31d8f4b6df" data-elfsight-app-lazy></div>

    <!-- Whatsapp Floating action bottn -->




    <footer class="footer-section FooterMainColor">
        <div class="container footer-top">
            <div class="row">

                <div class="col-sm-6 col-lg-3 footer-widget">
                    <div class="about-widget">
                        <img src="{{ asset('./public/client/img/fu_logo.png') }}" alt="The Future University"
                            width="80px" height="80px" loading="lazy">
                        <p>The Future University is an institution of higher learning committed in producing well -
                            rounded professionals who will be responsible in providing quality
                            of life in the society.</p>

                    </div>
                </div>

                <div class="col-sm-6 col-lg-3 footer-widget">
                    <h6 class="fw-title">USEFUL LINK</h6>
                    <div class="dobule-link">
                        <ul>
                            <li><a href="{{ route('Home') }}">Home</a></li>
                            <li><a href="https://elearning.fu.edu.sd/" target="_blank">E-Learning</a></li>
                            <!-- <li><a href="About-FU#WhyFutureUniversiy">Why FU ?</a></li> -->
                            <li><a href="https://hdesk.fu.edu.sd/" target="_blank">Help Desk</a></li>
                            <li><a href="https://result.fu.edu.sd/" target="_blank">Students Portal</a></li>
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

                        <li>
                            <div class="social pt-1">

                                <a href="https://www.facebook.com/TheFutureUniversity/" target="_blank"><i
                                        class="fa fa-facebook-square"></i></a>
                                <a href="https://www.linkedin.com/school/sudan-civil-aviation-authority"
                                    target="_blank"><i class="fa fa-linkedin-square"></i></a>

                            </div>
                        </li>

                        <p>Visitor Counter:0
                          
                        </p>

                    </ul>
                </div>
            </div>
        </div>


        <div class="copyright">
            <div class="container">
                <p>
                    Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script> All rights reserved for <strong style="color: #fec169">The Future
                        University.</strong> Designed and Developed by
                    <a href="{{ route('CESD') }}"target="_blank" style="color: #fec169"><strong>CESD</strong></a>
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

    <!-- <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script> -->
    <script>
        var splide = new Splide('.splide', {
            type: 'loop',
            perPage: 3,
            focus: 'center',
            gap: '1rem',
        });

        splide.mount();
    </script>

    <!-- slide show for Facultys end-->

    <!-- Counter Start -->


    <script>
        // Set the date we're counting down to
        var countDownDate = new Date("Jan 5, 1991 15:37:25").getTime();

        // Update the count down every 1 second
        var x = setInterval(function() {

            // Get today's date and time
            var now = new Date().getTime();

            // Find the distance between now and the count down date
            //   var distance = countDownDate - now;
            var distance = now - countDownDate;

            // +249100944949
            // Time calculations for days, hours, minutes and seconds
            var years = Math.floor(distance / (1000 * 60 * 60 * 24 * 365));
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Output the result in an element with id="demo"
            //document.getElementById("demo").innerHTML = years + "Y " + days + "d " + hours + "h "
            // + minutes + "m " + seconds + "s ";

            document.getElementById("Year").innerHTML = years;
            document.getElementById("hours").innerHTML = hours;
            document.getElementById("minutes").innerHTML = minutes;
            document.getElementById("seconds").innerHTML = seconds;





            // If the count down is over, write some text 
            //   if (distance < 0) {
            //     clearInterval(x);
            //     document.getElementById("demo").innerHTML = "EXPIRED";
            //   }
        }, 1000);
    </script>

    <!-- Counter End -->


    <!-- DOMContentLoaded -->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var toggleContents = document.querySelectorAll('.toggle-content');
            toggleContents.forEach(function(toggleContent) {
                toggleContent.addEventListener('click', function() {
                    this.classList.toggle('ActiveMenuMainColor');
                    var content = this.parentElement.nextElementSibling;
                    content.style.display = content.style.display === 'none' ? 'block' : 'none';
                });
            });
        });
    </script>


    <!-- DOMContentLoaded End -->








    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v84a3a4012de94ce1a686ba8c167c359c1696973893317"
        integrity="sha512-euoFGowhlaLqXsPWQ48qSkBSCFs3DPRyiwVu3FjR96cMPx+Fr+gpWRhIafcHwqwCqWS42RZhIudOvEI+Ckf6MA=="
        data-cf-beacon='{"rayId":"8297c1a8dca9b47e","b":1,"version":"2023.10.0","token":"cd0b4b3a733644fc843ef0b185f98241"}'
        crossorigin="anonymous"></script>
</body>


</html>
