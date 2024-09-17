@extends('components.client-layout')
@section('main-client-content')
    <section class="hero-section">
        <div class="hero-slider owl-carousel">

            <div class="hs-item set-bg" data-setbg="./public/client/img/hero-slider/1.png">
                <div class="hs-text">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="hs-subtitle" style="color:#ff8d51;">TOP PRIVATE UNIVERSITY</div>
                                <h2 class="hs-title" style="color:#ff8d51;">Inspiring Excellence, Empowering
                                    Minds,Transforming.</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hs-item set-bg" data-setbg="./public/client/img/hero-slider/2.png">
                <div class="hs-text">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="hs-subtitle" style="color:#ff8d51;">Why The Futrue University?</div>
                                <h2 class="hs-title" style="color:#ff8d51;">An investment in knowledge pays the best
                                    interest.</h2>
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
                            <h4 style="color: #fff;">Embedded Learning</h4>
                        </div>
                        <div class="desc-wrap">
                            <p>
                                Our university supports embedded learning by integrating real-world applications into
                                courses, facilitating experiential opportunities like internships and service-learning
                                projects, and promoting collaborative research partnerships. This commitment ensures that
                                our students gain practical skills, engage with real-world challenges, and graduate prepared
                                to make a meaningful impact in their fields.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-feature">
                        <div class="title">
                            <h4 style="color: #fff;">Sustainability Focus</h4>
                        </div>
                        <div class="desc-wrap">
                            <p>
                                Sustainability is at the core of our university's mission as we integrate sustainable
                                practices and environmental stewardship throughout our curriculum, campus operations, and
                                community engagement initiatives. By fostering a deep understanding of sustainable
                                development, our students are prepared to tackle the pressing global challenges of our time
                                and contribute to a more sustainable future.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-feature">
                        <div class="title">
                            <h4 style="color: #fff;">Global Engagement</h4>
                        </div>
                        <div class="desc-wrap">
                            <p>
                                Our university fosters a globally-minded community, encouraging students to engage with
                                diverse perspectives through international exchange programs, virtual collaborations, and
                                cross-cultural learning opportunities. By cultivating a global mindset, we empower our
                                graduates to navigate the interconnected world and make a lasting impact on a global scale.
                                <br><br>
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
                        <p>
                            <i class="fa fa-calendar-o"></i>Online and Available, No matter what <a
                                href="https://elearning.fu.edu.sd/" style="color:#ff8d51;" target="_blank">Check Here</a>
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

    <div class="Faculties-Desktop-View">
        <section class="service-section spad">
            <div class="container services">
                <div class="section-title text-center">
                    <h4>OUR Faculties</h4>
                    <p>We provides the opportunity to prepare for life</p>
                </div>
                <div id="facultyCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                                <!-- Faculty 1 -->
                                <div class="col-lg-4 col-sm-6 course-item">
                                    <div class="service-icon">
                                        <img src="./public/client/img/main_imgs/faculites/engineering.jpg"
                                            alt="Faculty of Engineering" width="100px" height="100px">
                                    </div>
                                    <div class="service-content course-item">
                                        <h6>Faculty of Engineering</h6>
                                        {{-- <p>Lorem ipsum dolor sitdo amet, consectetur dont adipis elit. Vivamus interdum ultrices augue.</p> --}}
                                    </div>
                                </div>
                                <!-- Faculty 2 -->
                                <div class="col-lg-4 col-sm-6 course-item">
                                    <div class="service-icon">
                                        <img src="./public/client/img/main_imgs/faculites/cs.jpg"
                                            alt="Faculty of Computer Science" width="100px" height="100px">
                                    </div>
                                    <div class="service-content course-item">
                                        <h6>Faculty of Computer Science</h6>
                                    </div>
                                </div>
                                <!-- Faculty 3 -->
                                <div class="col-lg-4 col-sm-6 course-item">
                                    <div class="service-icon">
                                        <img src="./public/client/img/main_imgs/faculites/it.jpg"
                                            alt="Faculty of Information Technology" width="100px" height="100px">
                                    </div>
                                    <div class="service-content course-item">
                                        <h6>Faculty of Information Technology</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <!-- Faculty 4 -->
                                <div class="col-lg-4 col-sm-6 course-item">
                                    <div class="service-icon">
                                        <img src="./public/client/img/main_imgs/faculites/tcom.jpg"
                                            alt="Faculty of Telecommunication Engineering" width="100px" height="100px">
                                    </div>
                                    <div class="service-content course-item">
                                        <h6>Faculty of Telecommunication Engineering</h6>
                                    </div>
                                </div>
                                <!-- Faculty 5 -->
                                <div class="col-lg-4 col-sm-6 course-item">
                                    <div class="service-icon">
                                        <img src="./public/client/img/main_imgs/faculites/arch.jpg"
                                            alt="Faculty of Architecture Engineering" width="100px" height="100px">
                                    </div>
                                    <div class="service-content course-item">
                                        <h6>Faculty of Architecture Engineering</h6>
                                    </div>
                                </div>
                                <!-- Faculty 6 -->
                                <div class="col-lg-4 col-sm-6 course-item">
                                    <div class="service-icon">
                                        <img src="./public/client/img/main_imgs/faculites/fad.jpg"
                                            alt="Faculty of Fine Arts" width="100px" height="100px">
                                    </div>
                                    <div class="service-content course-item">
                                        <h6>Faculty of Fine Arts and Design</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <!-- Faculty 7 -->
                                <div class="col-lg-4 col-sm-6 course-item">
                                    <div class="service-icon">
                                        <img src="./public/client/img/main_imgs/faculites/geo.jpg"
                                            alt="Faculty of Geoinformatics" width="100px" height="100px">
                                    </div>
                                    <div class="service-content course-item">
                                        <h6>Faculty of Geoinformatics</h6>
                                    </div>
                                </div>
                                <!-- Faculty 8 -->
                                <div class="col-lg-4 col-sm-6 course-item">
                                    <div class="service-icon">
                                        <img src="./public/client/img/main_imgs/faculites/ba.jpg"
                                            alt="Faculty of Business Administration" width="100px" height="100px">
                                    </div>
                                    <div class="service-content course-item">
                                        <h6>Faculty of Business Administration</h6>
                                    </div>
                                </div>
                                <!-- Faculty 9 -->
                                <div class="col-lg-4 col-sm-6 course-item">
                                    <div class="service-icon">
                                        <img src="./public/client/img/main_imgs/faculites/fad.jpg"
                                            alt="Faculty of Postgraduate Studies" width="100px" height="100px">
                                    </div>
                                    <div class="service-content course-item">
                                        <h6>Faculty of Postgraduate Studies</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Hidden controls -->
                    <button class="carousel-control-prev d-none" type="button" data-bs-target="#facultyCarousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next d-none" type="button" data-bs-target="#facultyCarousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>


            </div>
    </div>
    </section>
    </div>

    <div class="Faculties-Mobile-View">
        <section class="testimonial-section spad">
            <div class="container">
                <div class="section-title text-center">
                    <h6>OUR Faculties</h6>
                    <p>We provides the opportunity to prepare for life</p>
                </div>
                <div class="testimonial-slider owl-carousel">
                    <div class="ts-item">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="ts-author-pic set-bg"
                                    data-setbg="./public/client/img/main_imgs/faculites/engineering.jpg">
                                </div>
                            </div>
                            <div class="col-md-9 ts-text">
                                <h6>Faculty of Engineering</h6>
                            </div>
                        </div>
                    </div>
                    <div class="ts-item">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="ts-author-pic set-bg"
                                    data-setbg="./public/client/img/main_imgs/faculites/cs.jpg">
                                </div>
                            </div>
                            <div class="col-md-9 ts-text">
                                <h6>Faculty of Computer Science</h6>
                            </div>
                        </div>
                    </div>
                    <div class="ts-item">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="ts-author-pic set-bg"
                                    data-setbg="./public/client/img/main_imgs/faculites/it.jpg">
                                </div>
                            </div>
                            <div class="col-md-9 ts-text">
                                <h6>Faculty of Information Technology</h6>
                            </div>
                        </div>
                    </div>
                    <div class="ts-item">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="ts-author-pic set-bg"
                                    data-setbg="./public/client/img/main_imgs/faculites/tcom.jpg">
                                </div>
                            </div>
                            <div class="col-md-9 ts-text">
                                <h6>Faculty of Telecommunication Engineering</h6>
                            </div>
                        </div>
                    </div>
                    <div class="ts-item">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="ts-author-pic set-bg"
                                    data-setbg="./public/client/img/main_imgs/faculites/arch.jpg">
                                </div>
                            </div>
                            <div class="col-md-9 ts-text">
                                <h6>Faculty of Architecture Engineering</h6>
                            </div>
                        </div>
                    </div>
                    <div class="ts-item">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="ts-author-pic set-bg"
                                    data-setbg="./public/client/img/main_imgs/faculites/geo.jpg">
                                </div>
                            </div>
                            <div class="col-md-9 ts-text">
                                <h6>Faculty of Geoinformatics</h6>
                            </div>
                        </div>
                    </div>
                    <div class="ts-item">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="ts-author-pic set-bg"
                                    data-setbg="./public/client/img/main_imgs/faculites/ba.jpg">
                                </div>
                            </div>
                            <div class="col-md-9 ts-text">
                                <h6>Faculty of Business Administration</h6>
                            </div>
                        </div>
                    </div>
                    <div class="ts-item">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="ts-author-pic set-bg"
                                    data-setbg="./public/client/img/main_imgs/faculites/fad.jpg">
                                </div>
                            </div>
                            <div class="col-md-9 ts-text">
                                <h6>Faculty of Postgraduate Studies</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="Admission-Desktop">
        <section class="enroll-section overlay">
            <div class="container">
                <div class="row mt-5">
                    <div class="col-lg-5">
                        <div class="section-title text-white">
                            <h6>External & Internal Transfer / Bridging</h6>
                            <p>Below are the steps to join us ...</p>
                        </div>
                        <div class="enroll-list text-white">
                            <div class="enroll-list-item">
                                <span>1</span>
                                <h5>Fill Up the external transfer form </h5>
                                <p>Apply through our helpdesk <strong><a href="https://hdesk.fu.edu.sd/"
                                            target="_blank">form</a></strong></p>
                            </div>
                            <div class="enroll-list-item">
                                <span>2</span>
                                <h5>Admission & Registration</h5>
                                <p>Admission and registration to confirm the eligibility.</p>
                            </div>
                            <div class="enroll-list-item">
                                <span>3</span>
                                <h5>Faculty</h5>
                                <p>Evaluate the transcript and identify the credit transfer subjects.</p>
                            </div>
                            <div class="enroll-list-item">
                                <span>4</span>
                                <h5>Finance Unit and Fees Payment</h5>
                                <p>Complete the payment process through the acceptable means.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        </br>
                        <div class="enroll-list text-white">
                            <div class="enroll-list-item">
                                <span>5</span>
                                <h5>Admission and registration</h5>
                                <p>Obtain your new Ministry and university index number.</p>
                            </div>
                            <div class="enroll-list-item">
                                <span>6</span>
                                <h5>E-Learning Profile</h5>
                                <p>The technical services will create your e-learning profile.
                                </p>
                            </div>
                            <div class="enroll-list-item">
                                <span>7</span>
                                <h5>Student ID and Proifle</h5>
                                <p>Obtain your student ID info through tracking your application frfom the helpdesk <a
                                        href="https://hdesk.fu.edu.sd/" target="_blank">form</a></strong></p>
                            </div>
                            <div class="enroll-list-item">
                                <span>8</span>
                                <h5>Welcome to the Future University</h5>
                                <p>You are now part of our family.</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="Admission-Mobile">
        <section class="enroll-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="section-title text-white mt-5">
                            <h4 style="color: #fff;">External & Internal Transfer / Bridging</h4>
                            <p>Below are the steps to join us ...</p>
                        </div>
                        <div class="enroll-list text-white">
                            <div class="enroll-list-item">
                                <span>1</span>
                                <h5>Fill Up the external transfer form </h5>
                                <p>Apply through our helpdesk <strong><a href="https://hdesk.fu.edu.sd/"
                                            target="_blank">form</a></strong></p>
                            </div>
                            <div class="enroll-list-item">
                                <span>2</span>
                                <h5>Admission & Registration</h5>
                                <p>Admission and registration to confirm the eligibility.</p>
                            </div>
                            <div class="enroll-list-item">
                                <span>3</span>
                                <h5>Faculty</h5>
                                <p>Evaluate the transcript and identify the credit transfer subjects.</p>
                            </div>
                            <div class="enroll-list-item">
                                <span>4</span>
                                <h5>Finance Unit and Fees Payment</h5>
                                <p>Complete the payment process through the acceptable means.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        </br>
                        <div class="enroll-list text-white">
                            <div class="enroll-list-item">
                                <span>5</span>
                                <h5>Admission and registration</h5>
                                <p>Obtain your new Ministry and university index number.</p>
                            </div>
                            <div class="enroll-list-item">
                                <span>6</span>
                                <h5>E-Learning Profile</h5>
                                <p>The technical services will create your e-learning profile.
                                </p>
                            </div>
                            <div class="enroll-list-item">
                                <span>7</span>
                                <h5>Student ID and Proifle</h5>
                                <p>Obtain your student ID info through tracking your application frfom the helpdesk <a
                                        href="https://hdesk.fu.edu.sd/" target="_blank">form</a></strong></p>
                            </div>
                            <div class="enroll-list-item">
                                <span>8</span>
                                <h5>Welcome to the Future University</h5>
                                <p>You are now part of our family.</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="HideDiv">
        <section class="fact-section spad set-bg" data-setbg="img/fact-bg.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-lg-3 fact">
                        <div class="fact-icon">
                            <i class="ti-search"></i>
                        </div>
                        <div class="fact-text">
                            <h2>1991</h2>
                            <p>ESTABLISHED</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 fact">
                        <div class="fact-icon">
                            <i class="ti-briefcase"></i>
                        </div>
                        <div class="fact-text">
                            <h2>35</h2>
                            <p>PROGRAMS</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 fact">
                        <div class="fact-icon">
                            <i class="ti-user"></i>
                        </div>
                        <div class="fact-text">
                            <h2>2000+</h2>
                            <p>ACTIVE STUDENTS</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 fact">
                        <div class="fact-icon">
                            <i class="ti-crown"></i>
                        </div>
                        <div class="fact-text">
                            <h2>8000+</h2>
                            <p>GRADUATES</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="HideDiv">
        <section class="courses-section spad">
            <div class="container">
                <div class="section-title text-center">
                    <h4>Future University Centers</h4>
                </div>
                <div class="row">
                    <div class="container">
                        <div class="row text-left" style="text-align: justify;">
                            <div class="col" style="background-color: rgba(255, 255, 255, 0.51);">
                                <p style="color: black;">
                                <p class="text-center"><strong>Center of E-Learning and Software
                                        Development<br>CESD</strong>
                                </p>
                                The Center of E-Learning and Software Development is a cutting-edge hub that harnesses the
                                power
                                of technology to transform education and drive digital innovation. By developing innovative
                                e-learning platforms and cutting-edge software solutions, the center empowers students and
                                professionals to thrive in the digital age. <br><br>
                                </p>

                            </div>
                            <div class="col" style="background-color: rgba(255, 255, 255, 0.51);">
                                <p style="color: black;">
                                <p class="text-center"><strong>Center of Technological Services<br>CTS</strong></p>
                                The Center of Technological Services is a comprehensive resource hub that provides
                                state-of-the-art facilities and specialized support to students, faculty, and researchers.
                                From
                                advanced computing infrastructure to cutting-edge prototyping tools, the center enables
                                innovation and discovery across disciplines.<br><br>
                                </p>
                            </div>
                            <div class="col" style="background-color: rgba(255, 255, 255, 0.51);">
                                <p style="color: black;">
                                <p class="text-center"><strong>Innovation Research and Development Center<br>IRDC</strong>
                                </p>
                                The Innovation Research and Development Center is a dynamic hub where pioneering ideas come
                                to
                                life. By fostering cross-disciplinary collaboration and providing access to cutting-edge
                                resources, the center empowers researchers and innovators to push the boundaries of
                                knowledge
                                and develop transformative solutions. <br> <br>
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>

    <section class="testimonial-section spad">
        <div class="container">
            <div class="section-title text-center">
                <h4>ALUMNI TESTIMONIALS</h4>
                <p>1991-Now</p>
            </div>
            <div class="testimonial-slider owl-carousel">
                <div class="ts-item">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="ts-author-pic set-bg" data-setbg="./public/client/img/main_imgs/members/mave.jpg">
                            </div>
                        </div>
                        <div class="col-md-9 ts-text">
                            <p>“ I am absolutely delighted with this course in every respect. The innovative approach and
                                focus on practical application have been truly transformative, enabling me to develop new
                                strategies for achieving better educational outcomes. ”</p>
                            <h5>Mr. Mohamed Abuelgasim</h5>
                            <span>Alumni</span>
                        </div>
                    </div>
                </div>
                <div class="ts-item">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="ts-author-pic set-bg" data-setbg="./public/client/img/main_imgs/members/mave.jpg">
                            </div>
                        </div>
                        <div class="col-md-9 ts-text">
                            <p>“This program has been a game-changer for me. The cutting-edge curriculum, expert faculty,
                                and hands-on projects have equipped me with the skills and confidence to tackle complex
                                challenges in my field. I'm leaving here inspired and ready to make a real impact. ”</p>
                            <h5>Mr. Amin El-Shazaly</h5>
                            <span>Alumni</span>
                        </div>
                    </div>
                </div>
                <div class="ts-item">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="ts-author-pic set-bg" data-setbg="./public/client/img/main_imgs/members/mave.jpg">
                            </div>
                        </div>
                        <div class="col-md-9 ts-text">
                            <p>“Enrolling in this program was the best decision I've made. The supportive learning
                                environment, diverse learning opportunities, and dedicated professors have truly transformed
                                the way I approach problem-solving and creative thinking. ”</p>
                            <h5>Mr. Ali Ahmed</h5>
                            <span>Alumni</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    {{-- @if ($news_value) --}}

    {{-- <section class="event-section" >
        <div class="container">
            <div class="section-title text-center">
                <h6>Future University News</h6>
   
            </div>
            <div class="row">

                @foreach ($news as $news)
                    <div class="col-md-6 event-item">
                        <div class="event-thumb">

                            @foreach (array_slice(explode(',', $news->news_imgs), 0, 1) as $image)
                                <img src="./public/storage/news_imgs/{{ $image }}" alt="Futrue Uinversity" loading="lazy">
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

                                </p>
                                <a href="./News-Details/{{ $news->id }}" style="color:#ef7e22;" target="_blank">Read More - المزيد</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section> --}}
    {{-- @endif --}}

    <section class="team-section spad">

        <div class="container">

            <div class="section-title text-center">
                <h4>Our Partners</h4>
                <p>Future University professional partners</p>
            </div>

            <div class="container">
                <div class="row text-center">

                    <div class="col">
                        <div class="col" style="background-color: rgba(255, 255, 255, 0.51);">
                            <img src="./public/client/img/main_imgs/members/mmu.png" height="150px" width="150px"
                                alt="" loading="lazy">

                            <a href="https://mmu.edu.my/" target="_blank">
                                <h6 class="text-center" style="margin-top: 10px"><strong>Multimedia University</strong>
                                </h6>
                            </a>

                        </div>
                    </div>
                    <div class="col">
                        <div class="col" style="background-color: rgba(255, 255, 255, 0.51);">
                            <img src="./public/client/img/main_imgs/members/sudan-airways.png" height="150px"
                                width="150px" alt="" loading="lazy">

                            <a href="https://www.sudanair.com/" target="_blank">
                                <h6 class="text-center" style="margin-top: 10px"><strong>Sudan Airways</strong>
                                </h6>
                            </a>

                        </div>
                    </div>
                    <div class="col">
                        <div class="col" style="background-color: rgba(255, 255, 255, 0.51);">
                            <img src="./public/client/img/main_imgs/members/nic.png" height="150px" width="150px"
                                alt="" loading="lazy">

                            <a href="https://www.facebook.com/nicsudan.sd/" target="_blank">
                                <h6 class="text-center" style="margin-top: 10px"><strong>National Information
                                        Center</strong></h6>
                            </a>

                        </div>
                    </div>

                    <div class="col">
                        <div class="col" style="background-color: rgba(255, 255, 255, 0.51);">
                            <img src="./public/client/img/main_imgs/members/nottingham_university.png" height="150px"
                                width="150px" alt="" loading="lazy">

                            <a href="https://www.nottingham.ac.uk/" target="_blank">
                                <h6 class="text-center" style="margin-top: 10px"><strong>University of Nottingham</strong>
                                </h6>
                            </a>

                        </div>
                    </div>
                    <div class="col">
                        <div class="col" style="background-color: rgba(255, 255, 255, 0.51);">
                            <img src="./public/client/img/main_imgs/members/uni_of_ini.png" height="150px" width="150px"
                                alt="" loading="lazy">

                            <a href="https://www.uii.ac.id/" target="_blank">
                                <h6 class="text-center" style="margin-top: 10px"><strong>Universitas Islam
                                        Indonesia</strong></h6>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    {{-- <section class="newsletter-section">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-lg-7">
                    <div class="section-title mb-md-0">
                        <h6>NEWSLETTER</h6>
                        <p>Subscribe and get the latest news and useful tips, advice and best offer.</p>
                    </div>
                </div>
                <div class="col-md-7 col-lg-5">
                    <form class="newsletter">
                        <input type="text" placeholder="Enter your email">
                        <button class="site-btn FooterMainColor">SUBSCRIBE</button>
                    </form>
                </div>
            </div>
        </div>
    </section> --}}
@endsection
