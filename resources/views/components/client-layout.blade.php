<!DOCTYPE html>
<html lang="en">

<head>
	<title>The Future University</title>
	<meta charset="UTF-8">
	<meta name="description" content="Unica University Template">
	<meta name="keywords" content="event, unica, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link href="/client/img/fu_logo.png" rel="shortcut icon" />

	<link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i" rel="stylesheet">

	<link rel="stylesheet" href="/client/css/bootstrap.min.css" />
	<link rel="stylesheet" href="/client/css/font-awesome.min.css" />
	<link rel="stylesheet" href="/client/css/themify-icons.css" />
	<link rel="stylesheet" href="/client/css/magnific-popup.css" />
	<link rel="stylesheet" href="/client/css/animate.css" />
	<link rel="stylesheet" href="/client/css/owl.carousel.css" />
	<link rel="stylesheet" href="/client/css/owl.theme.default.min.css">
	<link rel="stylesheet" href="/client/css/style.css" />
	
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif][]-->

	{{-- <script
	nonce="1e3b7c67-d2f3-4362-a5da-f9977a2f5706">(function (w, d) 
	{ !function (j, k, l, m) { j[l] = j[l] || {}; j[l].executed = []; j.zaraz = { deferred: [], listeners: [] }; j.zaraz.q = []; j.zaraz._f = function (n) { return async function () { var o = Array.prototype.slice.call(arguments); j.zaraz.q.push({ m: n, a: o }) } }; for (const p of ["track", "set", "debug"]) j.zaraz[p] = j.zaraz._f(p); j.zaraz.init = () => { var q = k.getElementsByTagName(m)[0], r = k.createElement(m), s = k.getElementsByTagName("title")[0]; s && (j[l].t = k.getElementsByTagName("title")[0].text); j[l].x = Math.random(); j[l].w = j.screen.width; j[l].h = j.screen.height; j[l].j = j.innerHeight; j[l].e = j.innerWidth; j[l].l = j.location.href; j[l].r = k.referrer; j[l].k = j.screen.colorDepth; j[l].n = k.characterSet; j[l].o = (new Date).getTimezoneOffset(); if (j.dataLayer) for (const w of Object.entries(Object.entries(dataLayer).reduce(((x, y) => ({ ...x[1], ...y[1] })), {}))) zaraz.set(w[0], w[1], { scope: "page" }); j[l].q = []; for (; j.zaraz.q.length;) { const z = j.zaraz.q.shift(); j[l].q.push(z) } r.defer = !0; for (const A of [localStorage, sessionStorage]) Object.keys(A || {}).filter((C => C.startsWith("_zaraz_"))).forEach((B => { try { j[l]["z_" + B.slice(7)] = JSON.parse(A.getItem(B)) } catch { j[l]["z_" + B.slice(7)] = A.getItem(B) } })); r.referrerPolicy = "origin"; 
	r.src = "/client/js/sd0d9.js?z=" + btoa(encodeURIComponent(JSON.stringify(j[l]))); 
	q.parentNode.insertBefore(r, q) };
	["complete", "interactive"].includes(k.readyState) ? zaraz.init() : j.addEventListener("DOMContentLoaded", zaraz.init) }(w, d, "zarazData", "script"); })(window, document);
	</script> --}}

	@if ( (Request::is('Facts-Figures'))  ) 
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	@endif

	@if ( (Request::is('Fu-Historical-Gallery')) || (Request::is('Students-Gallery')  ) )

	<link rel="stylesheet" href="/client/css/swiper-bundle.min.css"/>
	<script src="/client/js/swiper-bundle.min.js"></script>
   
		@endif

	</head>

<body>

	<div id="preloder">
		<div class="loader"></div>
	</div>

	<header class="header-section">
		<div class="container">

			<a href="/Home" class="site-logo"><img src="/client/img/fu_logo.png" height="100px" width="100px" alt></a>
			<div class="nav-switch">
				<i class="fa fa-bars"></i>
			</div>
			
			<div class="header-info" style="margin-top: 20px;float: right;">
				<div class="hf-item">
					<i class="fa fa-envelope"></i>
					<a href="mailto:info@fu.edu.sd" target="_blank"><p><span>Email</span>info@fu.edu.sd</p></a>
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
						
						<a href="https://www.facebook.com/TheFutureUniversity/" target="_blank"><i class="fa fa-facebook-square"></i></a>
						<a href="https://www.linkedin.com/school/sudan-civil-aviation-authority"  target="_blank"><i class="fa fa-linkedin-square"></i></a>
					</ul>
				</div>
				<div class="col-lg-6 col-sm-6 col-4 header-top-right no-padding">

					<a href="https://odms.fu.edu.sd/" target="_blank">ODMS</a>
					<a href="https://elearning.fu.edu.sd/" target="_blank">E-Learning</a>
					<a href="https://irdc.fu.edu.sd" target="_blank">IRDC</a>
					<a href="https://thj.fu.edu.sd/index.php/thj" target="_blank">Technology horizon journal (THJ)</a>

				</div>
			</div>
		</div>
	</div>

	<nav class="nav-section">
		<div class="container">

			<div class="nav-right">
				{{-- <a href><i class="fa fa-phone"></i></a>
				<a href><i class="fa fa-shopping-cart"></i></a> --}}
			</div>
			<ul class="main-menu">
				<li class="@if ( Request::is('Home') )  active @endif"><a href="/Home">Home</a></li>
				<li class="@if ( (Request::is('About-FU')) || (Request::is('Fu-Linkages')) || 
				(Request::is('Facts-Figures')) || (Request::is('Fu-Historical-Gallery')) )   active @endif ">
					<a href="/About-FU" class="sub-menu-arrow">About FU</a>
					<ul class="sub-main-menu">
						<li><a href="/About-FU">Fu History</a></li>
						<li><a href="/About-FU#WhyFutureUniversiy">Why Future University</a></li>
						<li><a href="/Facts-Figures">FU Facts & Figures</a></li>
						<li><a href="/Fu-Linkages">FU Linkages</a></li>
						<li><a href="/Fu-Historical-Gallery">FU Historical Gallery</a></li>
					</ul>
				</li>
				{{-- Request::segment(3) =='' &&  --}}
				<li class="@if ( request()->is('News-Details/*') || request()->is('Event-Details/*')  || (Request::is('News-and-Events')) ) active @endif "><a href="/News-and-Events">New & Events</a></li>
			
				<li class="@if ( (Request::is('Undergraduate-Programs')) || (Request::is('Postgraduates-Programs'))) active @endif ">
					<a href="#" class="sub-menu-arrow">Programs</a>
					<ul class="sub-main-menu">
						<li><a href="/Undergraduate-Programs">Undergraduate Programs</a></li>
						<li><a href="/Postgraduates-Programs">Postgraduates Programs</a></li>
					</ul>
				</li>
				<li class="@if ( (Request::is('Undergraduate-Admission')) || (Request::is('Postgraduate-Admission'))  )   active @endif ">
					<a href="#" class="sub-menu-arrow">Admission</a>
					<ul class="sub-main-menu">
						<li><a href="/Undergraduate-Admission">Undergraduate Admission</a></li>
						<li><a href="/Postgraduate-Admission">Postgraduate Admission</a></li>
						<li><a href="#">Fees Structure</a></li>
						<li><a href="#">Scholarships</a></li>
					</ul>
				</li>

				<li class="@if ( (Request::is('Student-Affairs')) || (Request::is('Students-Gallery')) )   active @endif ">
					<a href="#" class="sub-menu-arrow">Students</a>
					<ul class="sub-main-menu">
						<li><a href="/Student-Affairs">FU Student Affairs</a></li>
						<li><a href="/Students-Gallery">Students Gallery</a></li>
					</ul>
				</li>

				<li class="@if ( (Request::is('Fu-Journal')) )  active @endif ">
					<a href="#" class="sub-menu-arrow">Research & Publications</a>
					<ul class="sub-main-menu">
					
						<li><a href="/Fu-Journal">FU Journal</a></li>
						<li><a href="https://thj.fu.edu.sd/" target="_blank">The Technology Horizon Journal</a></li>
					</ul>
				</li>
				<li class="@if ( (Request::is('CESD')) || (Request::is('CTS'))  || (Request::is('IRDC')))   active @endif ">
					<a href="#" class="sub-menu-arrow">FU Centers</a>
					<ul class="sub-main-menu">
						<li><a href="/CESD">Center of E-learning and Software Development</a></li>
						<li><a href="/CTS">Center of Technical Services</a></li>
						<li><a href="/IRDC">Innovation Research and Development Center</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</nav>

	@yield('main-client-content')

	<footer class="footer-section">
		<div class="container footer-top">
			<div class="row">

				<div class="col-sm-6 col-lg-3 footer-widget">
					<div class="about-widget">
						<img src="/client/img/fu_logo.png" alt="The Future University" width="80px" height="80px" loading="lazy">
						<p>The Future University is an institution of higher learning committed in producing well - rounded professionals who will be responsible in providing quality 
							of life in the society.</p>
						
					</div>
				</div>

				<div class="col-sm-6 col-lg-3 footer-widget">
					<h6 class="fw-title">USEFUL LINK</h6>
					<div class="dobule-link">
						<ul>
							<li><a href="/Home">Home</a></li>
							<li><a href="/About-FU">About FU</a></li>
							<li><a href="/About-FU#WhyFutureUniversiy">Why FU ?</a></li>
							<li><a href="/Undergraduate-Programs">Undergraduate</a></li>
							<li><a href="/Postgraduates-Programs">Postgraduates </a></li>
						
						</ul>
						<ul>
												
							<li><a href="/CESD">CESD</a></li>
							<li><a href="/CTS">CTS</a></li>
							<li><a href="/IRDC">IRDC</a></li>
							<li><a href="/Undergraduate-Admission">Admission</a></li>
							<li><a href="/News-and-Events">News & Events</a></li>
							
						</ul>
					</div>
				</div>

				<div class="col-sm-6 col-lg-3 footer-widget">
					<h6 class="fw-title">RECENT NEWS</h6>
					<ul class="recent-post">
						<li>
							<p>Launching Future University E-Learning Platform</p>
							<span><i class="fa fa-clock-o"></i>05 MAY 2019</span>
						</li>
						<li>
							<p>Launching Future University Student Desk Mobile App</p>
							<span><i class="fa fa-clock-o"></i>11 Sep 2020</span>
						</li>
					</ul>
				</div>

			
				<div class="col-sm-6 col-lg-3 footer-widget">
					<h6 class="fw-title">FIND US</h6>
					<ul class="contact">
						<li>
							<a href="https://maps.app.goo.gl/7HzpquiBAVvo6RBt7" target="_blank"><p><i class="fa fa-map-marker"></i> Africa Street - Khartoum, Sudan</p></a>
						</li>

						<li>
							<p><i class="fa fa-phone"></i> (+249) 183 411 818</p>
						</li>

						{{-- <li>
							<p>Fax:  (+249) 155 182 880</p>
						</li> --}}
						
						<li>
							<a href="mailto:info@fu.edu.sd" target="_blank"><p><i class="fa fa-envelope"></i> info@fu.edu.sd</p></a>
						</li>
						
						<li>
							<div class="social pt-1">
						
								<a href="https://www.facebook.com/TheFutureUniversity/" target="_blank"><i class="fa fa-facebook-square"></i></a>
								<a href="https://www.linkedin.com/school/sudan-civil-aviation-authority"  target="_blank"><i class="fa fa-linkedin-square"></i></a>
								
							</div>
						</li>

						<p>Visitor Counter: 
							<?php
								$filePath = storage_path('app/public/visitor_count.txt');
								$count = file_exists($filePath) ? (int) file_get_contents($filePath) : 0;
								echo '<strong style="color:#ef7e22;">'.$count.'</strong>';
							?>
						</p>

					</ul>
				</div>
			</div>
		</div>

		<div class="copyright">
			<div class="container">
				<p>
					Copyright &copy;
	<script>document.write(new Date().getFullYear());</script> All rights reserved for <strong style="color: #d1291f">The Future University.</strong> Designed and Developed by 
	<a href="/CESD"target="_blank" style="color: #ef7e22"><strong>CESD</strong></a>
				</p>
			</div>
		</div>
	</footer>


	
	<script src="/client/js/jquery-3.2.1.min.js"></script>
	<script src="/client/js/owl.carousel.min.js"></script>
	<script src="/client/js/jquery.countdown.js"></script>
	<script src="/client/js/masonry.pkgd.min.js"></script>
	<script src="/client/js/magnific-popup.min.js"></script>
	<script src="/client/js/main.js"></script>


	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag() { dataLayer.push(arguments); }
		gtag('js', new Date());

		gtag('config', 'UA-23581568-13');
	</script>
	<script defer
		src="https://static.cloudflareinsights.com/beacon.min.js/v84a3a4012de94ce1a686ba8c167c359c1696973893317"
		integrity="sha512-euoFGowhlaLqXsPWQ48qSkBSCFs3DPRyiwVu3FjR96cMPx+Fr+gpWRhIafcHwqwCqWS42RZhIudOvEI+Ckf6MA=="
		data-cf-beacon='{"rayId":"8297c1a8dca9b47e","b":1,"version":"2023.10.0","token":"cd0b4b3a733644fc843ef0b185f98241"}'
		crossorigin="anonymous"></script>
</body>


</html>