@extends('components.client-layout')
@section('main-client-content')

    <section class="hero-section">
        <div class="hero-slider owl-carousel">

            <div class="hs-item set-bg" data-setbg="/client/img/hero-slider/1.png">
                <div class="hs-text">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8">
                                <center>
                                    <div class="hs-subtitle">Award Winning UNIVERSITY</div>
                                </center>

                                <h2 class="hs-title">An investment in knowledge pays the best interest.</h2>
                                <p class="hs-des">Education is not just about going to school and getting a degree. It's
                                    about widening your<br> knowledge and absorbing the truth about life. Knowledge is
                                    power.</p>

                                <div class="site-btn">GET STARTED</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hs-item set-bg" data-setbg="/client/img/hero-slider/2.png">
                <div class="hs-text">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="hs-subtitle">Award Winning UNIVERSITY</div>
                                <h2 class="hs-title">An investment in knowledge pays the best interest.</h2>
                                <p class="hs-des">Education is not just about going to school and getting a degree. It's
                                    about widening your<br> knowledge and absorbing the truth about life. Knowledge is
                                    power.</p>
                                <div class="site-btn">GET STARTED</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="feature-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="single-feature">
                        <div class="title">
                            <h4>Learn Online Courses</h4>
                        </div>
                        <div class="desc-wrap">
                            <p>
                                Usage of the Internet is becoming more common due to rapid advancement
                                of technology.
                            </p>
                            <p>
                                Usage of the Internet is becoming more common due to rapid advancement
                                of technology.
                            </p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-feature">
                        <div class="title">
                            <h4>No.1 of universities</h4>
                        </div>
                        <div class="desc-wrap">
                            <p>
                                For many of us, our very first experience of learning about the celestial bodies begins
                                when we saw our first.
                            </p>
                            <p>
                                Usage of the Internet is becoming more common due to rapid advancement
                                of technology.
                            </p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-feature">
                        <div class="title">
                            <h4>Huge Library</h4>
                        </div>
                        <div class="desc-wrap">
                            <p>
                                If you are a serious astronomy fanatic like a lot of us are, you can probably remember
                                that one event.
                            </p>
                            <p>
                                Usage of the Internet is becoming more common due to rapid advancement
                                of technology.
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="counter-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-6">
                    <div class="big-icon">
                        <i class="fa fa-graduation-cap"></i>
                    </div>
                    <div class="counterx-content">
                        <h2>Future University E-Learning Platform</h2>
                        <p><i class="fa fa-calendar-o"></i>Online and Available no matter what happens...
                            <a href="https://elearning.fu.edu.sd/" target="_blank" style="color: #ef7e22"><strong>Check
                                    it</strong></a>
                        </p>
                    </div>
                </div>

                <div class="col-lg-5 col-md-6">
                    <div class="counterx">
                        <div class="counterx-item">
                            <h4>07</h4>Days
                        </div>
                        <div class="counterx-item">
                            <h4>24</h4>Hrs
                        </div>
                        <div class="counterx-item">
                            <h4>60</h4>Mins
                        </div>
                        <div class="counterx-item">
                            <h4>60</h4>secs
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="service-section spad">
        <div class="container services">
            <div class="section-title text-center">
                <h3>OUR Faculties</h3>
                <p>We provides the opportunity to prepare for life</p>
            </div>

			<div class="tab">
                <button class="tablinks" onclick="openTab(event, 'ENG')">Faculty of Engineering</button>
                <button class="tablinks" onclick="openTab(event, 'IT')">Faculty of Information Technology</button>
                <button class="tablinks" onclick="openTab(event, 'SCI')">Faculty of Computer Science</button>
				<button class="tablinks" onclick="openTab(event, 'TCOM')">Faculty of Telecommunication Engineering</button>
            </div>

            <div class="row">

				<div class="col" style="background-color: rgba(255, 255, 255, 0.51);">
					<div class="hr-sect new6"><img src="/client/img/main_imgs/faculites/engineering.jpg" height="100px"
							width="100px" alt="" loading="lazy"><span></span></div>
					<p style="color: black;">
					
						<div id="ENG" class="tabcontent">
							<p class="text-center"><strong>Faculty of Engineering<br>ENG</strong></p>
				
							The Faculty of Engineering of the Future University, Sudan is dedicated to 
							producing professionals who are critical thinkers and problem solvers. 
							Its task is to develop young engineers with the best that science and technology 
							can offer in a manner that can transform them into responsible professionals. 
							<br><br>
							<a href="/Undergraduate-Programs" class="read-more my-eventBtn" style="color:blanchedalmond;">More Details</a>
						</div>
				</p>
						
				</div>

				<div class="col" style="background-color: rgba(255, 255, 255, 0.51);">
					<div class="hr-sect new6"><img src="/client/img/main_imgs/faculites/it.jpg" height="100px"
							width="100px" alt="" loading="lazy"><span></span></div>
					<p style="color: black;">
					
						<div id="IT" class="tabcontent">
							<p class="text-center"><strong>Faculty of Information Technology<br>IT</strong></p>
							The Faculty of Information Technology focuses on the study, design, development, 
							implementation, support, and management of computer based information systems. 
							Its courses are designed to provide a coherent view of the significance of information 
							relevant in today’s context.
							<br><br>
					<a href="/Undergraduate-Programs" class="read-more my-eventBtn" style="color:blanchedalmond;">More Details</a>
						</div>
					</p>
				</div>

				<div class="col" style="background-color: rgba(255, 255, 255, 0.51);">
					<div class="hr-sect new6"><img src="/client/img/main_imgs/faculites/cs.jpg" height="100px"
							width="100px" alt="" loading="lazy"><span></span></div>
					<p style="color: black;">
					
						<div id="SCI" class="tabcontent">
							<p class="text-center"><strong>Faculty of Computer Science<br>SCI</strong></p>
							Computer science deals with the fundamental scientific laws and engineering principles which govern the design, 
							manufacture, and use of computers. A computer scientist is involved in work 
							ranging from mathematical studies of problem solving procedures to engineering research in advanced computing systems
							<br><br>
						<a href="/Undergraduate-Programs" class="read-more my-eventBtn" style="color:blanchedalmond;">More Details</a>
						</div>
					</p>
				</div>

				<div class="col" style="background-color: rgba(255, 255, 255, 0.51);" >
					<div class="hr-sect new6"><img src="/client/img/main_imgs/faculites/tcom.jpg" height="100px"
							width="100px" alt="" loading="lazy"><span></span></div>
					<p style="color: black;">
					
						<div id="TCOM" class="tabcontent">
							<p class="text-center"><strong>Faculty of Telecommunication Engineering<br>TCOM</strong></p>
							Telecommunications and Space Technology at the Future University is a gateway into this rapidly advancing, 
							global field. The faculty offers world-class programs at both undergraduate and graduate levels. 
						 <br><br>
						 <a href="/Undergraduate-Programs" class="read-more my-eventBtn" style="color:blanchedalmond;">More Details</a>
						</div>
					</p>
				</div>
			</div>

			<div class="tab">
                <button class="tablinks" onclick="openTab(event, 'ARCH')">Faculty of Architecture Engineering</button>
                <button class="tablinks" onclick="openTab(event, 'FAD')">Faculty of Fine Arts and Design</button>
                <button class="tablinks" onclick="openTab(event, 'GIS')">Faculty of Geoinformatics</button>
            </div>

			<div class="row">

				<div class="col" style="background-color: rgba(255, 255, 255, 0.51);" >
					<div class="hr-sect new6"><img src="/client/img/main_imgs/faculites/arch.jpg" height="100px"
							width="100px" alt="" loading="lazy"><span></span></div>
					<p style="color: black;">
					
						<div id="ARCH" class="tabcontent">
							<p class="text-center"><strong>Faculty of Architecture Engineering<br>ARCH</strong></p>
							Architecture, the art and science of building, is peculiarly 
							approached in a way that contemporary design techniques are focused on employing advanced drawing and design programs such as ArchiCAD and 3D max. 
							<br><br>
							<a href="/Undergraduate-Programs" class="read-more my-eventBtn" style="color:blanchedalmond;">More Details</a>
						</div>
					</p>
				</div>

				<div class="col" style="background-color: rgba(255, 255, 255, 0.51);" >
					<div class="hr-sect new6"><img src="/client/img/main_imgs/faculites/fad.jpg" height="100px"
							width="100px" alt="" loading="lazy"><span></span></div>
					<p style="color: black;">
					
						<div id="FAD" class="tabcontent">
							<p class="text-center"><strong>Faculty of Fine Arts and Design<br>FAD</strong></p>
							The Faculty of Art and Design develops highly skilled individuals using state-of-the-art facilities and a novel, 
							digital approach. It is a home of excellence and innovation across many fields of art, multimedia, 
							and design. The Faculty is committed to educate individuals whose 
							strengths are in arts based around expertise with computers such as: web site design, graphic design, animation, video production. 
						<br><br>
						<a href="/Undergraduate-Programs" class="read-more my-eventBtn" style="color:blanchedalmond;">More Details</a>
						</div>
					</p>
				</div>

				<div class="col" style="background-color: rgba(255, 255, 255, 0.51);" >
					<div class="hr-sect new6"><img src="/client/img/main_imgs/faculites/geo.jpg" height="100px"
							width="100px" alt="" loading="lazy"><span></span></div>
					<p style="color: black;">
					
						<div id="GIS" class="tabcontent">
							<p class="text-center"><strong>Faculty of Geoinformatics<br>GIS</strong></p>
							Geoinformation technology is a rapid growth industry driven by increasing market demands. 
							Understanding the latest developments is important to professionals and students alike and 
							the Future University Faculty of GeoInformatics plays an important role in this. 
							The faculty actively disseminates knowledge of current theory and application of geoinformatics. 
					<br><br>
					<a href="/Undergraduate-Programs" class="read-more my-eventBtn" style="color:blanchedalmond;">More Details</a>
						</div>
					</p>
				</div>
			</div>

			<div class="tab">
                <button class="tablinks" onclick="openTab(event, 'BA')">Faculty of Business Administration</button>
                <button class="tablinks" onclick="openTab(event, 'POST')">Faculty of Postgraduate Studies</button>
            </div>

				<div class="row">

				<div class="col" style="background-color: rgba(255, 255, 255, 0.51);" >
					<div class="hr-sect new6"><img src="/client/img/main_imgs/faculites/ba.jpg" height="100px"
							width="100px" alt="" loading="lazy"><span></span></div>
					<p style="color: black;">
					
						<div id="BA" class="tabcontent">
							<p class="text-center"><strong>Faculty of Business Administration<br>BA</strong></p>
							The Faculty of Business Administration is wholly committed to foster business leadership and guide 
							future ethical business professionals through the intricacies of business life in an age of change and uncertainty. 
							We desire to offer fruitful learning experiences. To us, learning experiences mean a bright future.
							<br><br>
							<a href="/Undergraduate-Programs" class="read-more my-eventBtn" style="color:blanchedalmond;">More Details</a>
						</div>
					</p>
				</div>

				<div class="col" style="background-color: rgba(255, 255, 255, 0.51);" >
					<div class="hr-sect new6"><img src="/client/img/main_imgs/faculites/post.jpg" height="100px"
							width="100px" alt="" loading="lazy"><span></span></div>
					<p style="color: black;">
					
						<div id="POST" class="tabcontent">
							<p class="text-center"><strong>Faculty of Postgraduate Studies<br>POST</strong></p>
							The Future University Post Graduate Studies offers a world class graduate education that is 
							inspired by the excellent management of faculty members. The Graduate Programs are supported 
							by academic and research curriculum that are recognized by the experts in their respective fields. 
							The Faculty of Postgraduate Studies offers specialized inter-related Information and 
							Communication Technology (ICT) graduate degree programs that promote interdisciplinary 
							scientific research and development (R & D) in both the fundamentals and frontiers of engineering, 
							computer science, information technology, creative multimedia, architecture, space science, and business administration.
							<br><br>
							<a href="/Postgraduates-Programs" class="read-more my-eventBtn" style="color:blanchedalmond;">More Details</a>
						</div>
					</p>
				</div>

            </div>
        </div>
    </section>


    <section class="enroll-section overlay">
        </br>
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="section-title text-white">
                        <h3>Enrollment Process</h3>
                        <p>Get started with us to explore the future...</p>
                    </div>
                    <div class="enroll-list text-white">
                        <div class="enroll-list-item">
                            <span>1</span>
                            <h5>Ministry of the higher education </h5>
                            <p>Apply to admission system in Ministry of the higher education website <strong><a
                                        href="https://admission.gov.sd" target="_blank">(Admission)</a></strong></p>
                        </div>
                        <div class="enroll-list-item">
                            <span>2</span>
                            <h5>Admission & Registration</h5>
                            <p>Visit addmission and registration office to proceed with admission process.</p>
                        </div>
                        <div class="enroll-list-item">
                            <span>3</span>
                            <h5>Future University ODMS</h5>
                            <p>Apply to Future University using online addmission system <strong><a
                                        href="https://odms.fu.edu.sd" target="_blank">(ODMS)</a> </strong></p>
                        </div>
                        <div class="enroll-list-item">
                            <span>4</span>
                            <h5>Follow Your Application</h5>
                            <p>Track your application in <strong><a href="https://odms.fu.edu.sd"
                                        target="_blank">(ODMS)</a></strong> by your ministry number, to know your next
                                steps.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <!-- Content for the second row goes here -->
                    </br>
                    <div class="enroll-list text-white">
                        <div class="enroll-list-item">
                            <span>5</span>
                            <h5>Registrar interview</h5>
                            <p>Meet with The Future University Registrar for short interview.</p>
                        </div>
                        <div class="enroll-list-item">
                            <span>6</span>
                            <h5>Registration Fees</h5>
                            <p>Pay your year and registration fees in Faisal or Khartoum bank via thier mobile applications.
                            </p>
                        </div>
                        <div class="enroll-list-item">
                            <span>7</span>
                            <h5>Student ID card</h5>
                            <p>Get your student ID card form the ID card office.</p>
                        </div>
                        <div class="enroll-list-item">
                            <span>8</span>
                            <h5>Welcome to the Future</h5>
                            <p>Cheering up you joining our family.</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <div></div>
    <section class="fact-section spad set-bg " data-setbg="/client/img/fact-bg.jpg">

        <div class="container">
            <section class="feature-area">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-3">
                            <div class="single-feature">
                                <div class="title">
                                    <h4>Graduates</h4>
                                </div>
                                <div class="desc-wrap">
                                    <img src="/client/img/main_imgs/general/graduatesII.png" class="circle" loading="lazy">
                                    <div class="title">
                                        <h4>5000+</h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="single-feature">
                                <div class="title">
                                    <h4>Programs</h4>
                                </div>
                                <div class="desc-wrap">
                                    <img src="/client/img/main_imgs/general/fav.png" class="circle" loading="lazy">
                                    <div class="title">
                                        <h4>35</h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="single-feature">
                                <div class="title">
                                    <h4>Established</h4>
                                </div>
                                <div class="desc-wrap">
                                    <img src="/client/img/main_imgs/general/established.png" class="circle" loading="lazy">
                                    <div class="title">
                                        <h4>1991</h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="single-feature">
                                <div class="title">
                                    <h4>Students</h4>
                                </div>
                                <div class="desc-wrap">
                                    <img src="/client/img/main_imgs/general/students.png" class="circle" loading="lazy">
                                    <div class="title">
                                        <h4>3000+</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>

    <section class="courses-section spad">
        <div class="container">
            <div class="section-title text-center">
                <h3>Future University Centers & Units</h3>
                <p>Building a better world, one course at a time</p>
            </div>
            <div class="row">

                <div class="container">


                    <div class="row text-center">

                        <div class="col" style="background-color: rgba(255, 255, 255, 0.51);" >
                            <div class="hr-sect new6"><img src="/client/img/main_imgs/centers/cesd.png" height="150px"
                                    width="150px" alt="" loading="lazy"><span></span></div>
                            <p style="color: black;">
                            <p class="text-center"><strong>Center of E-Learning and Software Development<br>CESD</strong></p>
                            CESD is responsible for developing and managing multimedia E-learning Contents and development of other software systems. 
							It will also be doing research and development for Learning Management System (LMS) and Learning Content Management System (LCMS). <br><br>

							<a href="/CESD" class="read-more my-eventBtn" style="color:blanchedalmond;">More Details</a>
							
                            </p>

                        </div>

                        <div class="col" style="background-color: rgba(255, 255, 255, 0.51);">
                            <div class="hr-sect new6"><img src="/client/img/main_imgs/centers/cesd.png" height="150px"
                                    width="150px" alt="" loading="lazy"><span></span></div>
                            <p style="color: black;">
                            <p class="text-center"><strong>Center of Technological Services<br>CTS</strong></p>
                            The Center of Technological Services provides specialized technical services for all faculties, 
							departments, units, professors and students inside the university.<br><br>

							<a href="/CTS" class="read-more my-eventBtn" style="color:blanchedalmond;">More Details</a>

                            </p>

                        </div>

                        <div class="col" style="background-color: rgba(255, 255, 255, 0.51);">
                            <div class="hr-sect new6"><img src="/client/img/main_imgs/centers/cesd.png" height="150px"
                                    width="150px" alt="" loading="lazy"><span></span></div>
                            <p style="color: black;">
                            <p class="text-center"><strong>Innovation Research and Development Center<br>IRDC</strong></p>

                            Our thump-print is a part of everyone’s life, we develop solutions and make dramatic change of humans’ lives. 
							Because we provide excellent chances for those who are enthusiastic to learn and improve using their established skills, 
							and motivate them to take on more responsibility for their own socities development and advancement. <br> <br>

							<a href="/IRDC" class="read-more my-eventBtn" style="color:blanchedalmond;">More Details</a>
                            </p>

                        </div>
                       
                    </div>

                </div>

            </div>
        </div>
    </section>

    <section class="testimonial-section spad">
        <div class="container">
            <div class="section-title text-center">
                <h3>ALUMNI SPEAK</h3>
                <p>1991-Now</p>
            </div>
            <div class="testimonial-slider owl-carousel">
                <div class="ts-item">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="ts-author-pic set-bg" data-setbg="/client/img/main_imgs/members/mave.jpg"></div>
                        </div>
                        <div class="col-md-9 ts-text">
                            <p>“ I want to let you know that I am very absolutely delighted with the course in every
                                respect. It has been particularly pleasing for me, with an interest in seeing the
                                application and good educational practice to school education. Learn a different
                                approach that leads to better outcomes. ”</p>
                            <h5>Mr. Peter Crough</h5>
                            <span>Student’s Parent</span>
                        </div>
                    </div>
                </div>
                <div class="ts-item">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="ts-author-pic set-bg" data-setbg="/client/img/main_imgs/members/mave.jpg"></div>
                        </div>
                        <div class="col-md-9 ts-text">
                            <p>“ I want to let you know that I am very absolutely delighted with the course in every
                                respect. It has been particularly pleasing for me, with an interest in seeing the
                                application and good educational practice to school education. Learn a different
                                approach that leads to better outcomes. ”</p>
                            <h5>Mr. Peter Crough</h5>
                            <span>Student’s Parent</span>
                        </div>
                    </div>
                </div>
                <div class="ts-item">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="ts-author-pic set-bg" data-setbg="/client/img/main_imgs/members/mave.jpg"></div>
                        </div>
                        <div class="col-md-9 ts-text">
                            <p>“ I want to let you know that I am very absolutely delighted with the course in every
                                respect. It has been particularly pleasing for me, with an interest in seeing the
                                application and good educational practice to school education. Learn a different
                                approach that leads to better outcomes. ”</p>
                            <h5>Mr. Peter Crough</h5>
                            <span>Student’s Parent</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    @if ($news_value)

    <section class="event-section" >
        <div class="container">
            <div class="section-title text-center">
                <h3>Future University News</h3>
                <p>follow the latest news and updates in FU...</p>
            </div>
            <div class="row">

                @foreach ($news as $news)
                    <div class="col-md-6 event-item">
                        <div class="event-thumb">

                            @foreach (array_slice(explode(',', $news->news_imgs), 0, 1) as $image)
                                <img src="/storage/news_imgs/{{ $image }}" alt="Futrue Uinversity" loading="lazy">
                            @endforeach

                            <div class="event-date">
                                <span> {{ $news->news_date }} </span>
                            </div>
                        </div>
                        <div class="event-info">
                            <h4>{{ $news->news_title }}</h4>
                            <p><i class="fa fa-map-marker"></i> The Future University</p>
                            <div class="card">
                                <p style="font-size: 17px;">
                                    
                                    {!! Str::words($news->news_desc, 20, ' ...') !!}

                                    {{-- <span class="text" style="font-size: 16px;">{!! Str::words($event->event_desc, 5, ' ...') !!}</span> --}}
                                </p>
                                <a href="/News-Details/{{ $news->id }}" style="color:#ef7e22;" target="_blank">Read More - المزيد</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <section class="team-section spad">

        <div class="container">
         
            <div class="section-title text-center">
                <h3>Proud Partnerships</h3>
                <p>Future University professional partners</p>
            </div>

            <div class="container">
                <div class="row text-center">
         
                         <div class="col">
                             <div class="col" style="background-color: rgba(255, 255, 255, 0.51);">
                                 <img src="/client/img/main_imgs/members/nottingham_university.png" height="150px" width="150px" alt="" loading="lazy">
                                
                                <a href="https://www.nottingham.ac.uk/" target="_blank"><h6 class="text-center" style="margin-top: 10px"><strong>University of Nottingham</strong></h6></a>
                                
                             </div>
                         </div>
                         <div class="col">
                             <div class="col" style="background-color: rgba(255, 255, 255, 0.51);">
                                 <img src="/client/img/main_imgs/members/University_of_Turin.png" height="150px" width="150px" alt="" loading="lazy">
                                
                                 <a href="https://en.unito.it/" target="_blank"><h6 class="text-center" style="margin-top: 10px"><strong>University of Turin</strong></h6></a>
                                
                             </div>
                         </div>
                         <div class="col">
                             <div class="col" style="background-color: rgba(255, 255, 255, 0.51);">
                                 <img src="/client/img/main_imgs/members/Pennsylvania_University.png" height="150px" width="150px" alt="" loading="lazy">
                                
                                 <a href="https://www.psu.edu/" target="_blank"><h6 class="text-center" style="margin-top: 10px"><strong>Pennsylvania State University</strong></h6></a>
                                
                             </div>
                         </div>
                         <div class="col">
                             <div class="col" style="background-color: rgba(255, 255, 255, 0.51);">
                                 <img src="/client/img/main_imgs/members/jhon.png" height="150px" width="150px" alt="" loading="lazy">
                                
                                 <a href="https://www.jhu.edu/" target="_blank"><h6 class="text-center" style="margin-top: 10px"><strong>Johns Hopkins University</strong></h6></a>
                                
                             </div>
                         </div>
                         <div class="col">
                             <div class="col" style="background-color: rgba(255, 255, 255, 0.51);">
                                 <img src="/client/img/main_imgs/members/boston_uni.png" height="150px" width="150px" alt="" loading="lazy">
                                
                                 <a href="https://www.bu.edu/" target="_blank"><h6 class="text-center" style="margin-top: 10px"><strong>Boston University</strong></h6></a>
                                
                             </div>
                         </div>
                         <div class="col">
                             <div class="col" style="background-color: rgba(255, 255, 255, 0.51);">
                                 <img src="/client/img/main_imgs/members/uni_of_ini.png" height="150px" width="150px" alt="" loading="lazy">
                                
                                 <a href="https://www.uii.ac.id/" target="_blank"><h6 class="text-center" style="margin-top: 10px"><strong>Universitas Islam Indonesia</strong></h6></a>
                                
                             </div>
                         </div>
                     </div>
             </div> 

        </div>
      
    </section>


    <!-- <div class="gallery-section">
     <div class="gallery">
      <div class="grid-sizer"></div>
      <div class="gallery-item gi-big set-bg" data-setbg="img/gallery/1.jpg">
       <a class="img-popup" href="img/gallery/1.jpg"><i class="ti-plus"></i></a>
      </div>
      <div class="gallery-item set-bg" data-setbg="img/gallery/2.jpg">
       <a class="img-popup" href="img/gallery/2.jpg"><i class="ti-plus"></i></a>
      </div>
      <div class="gallery-item set-bg" data-setbg="img/gallery/3.jpg">
       <a class="img-popup" href="img/gallery/3.jpg"><i class="ti-plus"></i></a>
      </div>
      <div class="gallery-item gi-long set-bg" data-setbg="img/gallery/5.jpg">
       <a class="img-popup" href="img/gallery/5.jpg"><i class="ti-plus"></i></a>
      </div>
      <div class="gallery-item gi-big set-bg" data-setbg="img/gallery/8.jpg">
       <a class="img-popup" href="img/gallery/8.jpg"><i class="ti-plus"></i></a>
      </div>
      <div class="gallery-item gi-long set-bg" data-setbg="img/gallery/4.jpg">
       <a class="img-popup" href="img/gallery/4.jpg"><i class="ti-plus"></i></a>
      </div>
      <div class="gallery-item set-bg" data-setbg="img/gallery/6.jpg">
       <a class="img-popup" href="img/gallery/6.jpg"><i class="ti-plus"></i></a>
      </div>
      <div class="gallery-item set-bg" data-setbg="img/gallery/7.jpg">
       <a class="img-popup" href="img/gallery/7.jpg"><i class="ti-plus"></i></a>
      </div>
     </div>
    </div> -->


    <!-- <section class="blog-section spad">
     <div class="container">
      <div class="section-title text-center">
       <h3>LATEST NEWS</h3>
       <p>Get latest breaking news & top stories today</p>
      </div>
      <div class="row">
       <div class="col-xl-6">
        <div class="blog-item">
         <div class="blog-thumb set-bg" data-setbg="img/blog/1.jpg"></div>
         <div class="blog-content">
          <h4>Parents who try to be their children’s best friends</h4>
          <div class="blog-meta">
           <span><i class="fa fa-calendar-o"></i> 24 Mar 2018</span>
           <span><i class="fa fa-user"></i> Owen Wilson</span>
          </div>
          <p>Integer luctus diam ac scerisque consectetur. Vimus dot euismod neganeco lacus sit amet.
           Aenean interdus mid vitae sed accumsan...</p>
         </div>
        </div>
       </div>
       <div class="col-xl-6">
        <div class="blog-item">
         <div class="blog-thumb set-bg" data-setbg="img/blog/2.jpg"></div>
         <div class="blog-content">
          <h4>Graduations could be delayed as external examiners</h4>
          <div class="blog-meta">
           <span><i class="fa fa-calendar-o"></i> 23 Mar 2018</span>
           <span><i class="fa fa-user"></i> Owen Wilson</span>
          </div>
          <p>Integer luctus diam ac scerisque consectetur. Vimus dot euismod neganeco lacus sit amet.
           Aenean interdus mid vitae sed accumsan...</p>
         </div>
        </div>
       </div>
       <div class="col-xl-6">
        <div class="blog-item">
         <div class="blog-thumb set-bg" data-setbg="img/blog/3.jpg"></div>
         <div class="blog-content">
          <h4>Private schools adopt a Ucas style application system</h4>
          <div class="blog-meta">
           <span><i class="fa fa-calendar-o"></i> 24 Mar 2018</span>
           <span><i class="fa fa-user"></i> Owen Wilson</span>
          </div>
          <p>Integer luctus diam ac scerisque consectetur. Vimus dot euismod neganeco lacus sit amet.
           Aenean interdus mid vitae sed accumsan...</p>
         </div>
        </div>
       </div>
       <div class="col-xl-6">
        <div class="blog-item">
         <div class="blog-thumb set-bg" data-setbg="img/blog/4.jpg"></div>
         <div class="blog-content">
          <h4>Cambridge digs in at the top of university league table</h4>
          <div class="blog-meta">
           <span><i class="fa fa-calendar-o"></i> 23 Mar 2018</span>
           <span><i class="fa fa-user"></i> Owen Wilson</span>
          </div>
          <p>Integer luctus diam ac scerisque consectetur. Vimus dot euismod neganeco lacus sit amet.
           Aenean interdus mid vitae sed accumsan...</p>
         </div>
        </div>
       </div>
      </div>
     </div>
    </section> -->





    <section class="newsletter-section">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-lg-7">
                    <div class="section-title mb-md-0">
                        <h3>NEWSLETTER</h3>
                        <p>Subscribe and get the latest news and useful tips, advice and best offer.</p>
                    </div>
                </div>
                <div class="col-md-7 col-lg-5">
                    <form class="newsletter">
                        <input type="text" placeholder="Enter your email">
                        <button class="site-btn">SUBSCRIBE</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
