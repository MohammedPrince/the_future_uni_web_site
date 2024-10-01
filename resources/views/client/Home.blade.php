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
                                    Minds,Transforming Future.</h2>
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
                            <p style="text-align: justify;">
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
                            <p style="text-align: justify;">
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
                            <p style="text-align: justify;">
                                Our university fosters a globally-minded community, encouraging students to engage with
                                diverse perspectives through international exchange programs, virtual collaborations, and
                                cross-cultural learning opportunities. By cultivating a global mindset, we empower our
                                graduates to navigate the interconnected world and make a lasting impact on a global scale.
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
                    <div class="counterx-content" class="text-center">
                        <h5 class="text-center" style="color: #fb8b24;">E-Learning Platform</h5>
                        <p style="font-size:12px" class="text-center">
                            Online and Available, No matter what <a
                                href="https://elearning.fu.edu.sd/"style="color:#fb8b24;" target="_blank">Check Here</a>
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
                    <h4>Our Faculties</h4>
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

    <section class="courses-section spad">
        <div class="container">
            <div class="section-title text-center">
                <h4>Our Centers</h5>
                    <p>Know more about our techinal Centers</p>
            </div>
            <div class="row">
                <div class="container">
                    <div id="facultyCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="row">
                                    <!-- Center 1 -->
                                    <div class="col-lg-4 col-sm-6 course-item" style="margin-bottom:10px;">
                                        <div class="service-content course-item">
                                            <p class="text-center"><strong style="color: #ef7e22;">Center of
                                                    E-Learning and Software Development<br>CESD</strong>
                                            </p>
                                            <p>
                                                The Center of E-Learning and Software Development is a cutting-edge hub
                                                that harnesses the
                                                power
                                                of technology to transform education and drive digital innovation. By
                                                developing innovative
                                                e-learning platforms and cutting-edge software solutions, the center
                                                empowers students and
                                                professionals to thrive in the digital age<a style="color: #ef7e22"
                                                    href="{{ route('CESD') }}">...Read More</a>
                                            </p>
                                        </div>
                                    </div>
                                    <!-- Center 2 -->
                                    <div class="col-lg-4 col-sm-6 course-item" style="margin-bottom:10px;">
                                        <div class="service-content course-item">
                                            <p class="text-center"><strong style="color: #ef7e22;">Center of
                                                    Technological Services<br>CTS</strong></p>
                                            <p>
                                                The Center of Technological Services is a comprehensive resource hub
                                                that provides
                                                state-of-the-art facilities and specialized support to students,
                                                faculty, and researchers.
                                                From
                                                advanced computing infrastructure to cutting-edge prototyping tools, the
                                                center enables
                                                innovation and discovery across disciplines<a style="color: #ef7e22"
                                                    href="{{ route('CTS') }}">...Read More</a>
                                            </p>
                                        </div>
                                    </div>
                                    <!-- Center 3 -->
                                    <div class="col-lg-4 col-sm-6 course-item" style="margin-bottom:10px;">
                                        <div class="service-content course-item">
                                            <p class="text-center"><strong style="color: #ef7e22;">Innovation Research
                                                    and Development Center<br>IRDC</strong>
                                            </p>
                                            <p>
                                                The Innovation Research and Development Center is a dynamic hub where
                                                pioneering ideas
                                                come
                                                to
                                                life. By fostering cross-disciplinary collaboration and providing access
                                                to cutting-edge
                                                resources, the center empowers researchers and innovators to push the
                                                boundaries of
                                                knowledge<a style="color: #ef7e22" href="{{ route('IRDC') }}">...Read
                                                    More</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /////////////////////// -->
    @if (!empty($news_value) || !empty($event_value))
        <hr>
        {{-- <div class="Faculties-Desktop-View"> --}}
        <section class="service-section">
            <div class="container services">
                <div class="section-title text-center">
                    <h4>News & Events</h4>
                    <p>Stay updated with our latest news and events!</p>
                </div>

                <div class="widget">
                    <div class="search-widget">
                        <input type="text" id="search-input" class="form-control"
                            placeholder="Search for News and Events">
                        <button><i class="ti-search"></i></button>
                    </div>
                    <div class="text-center" id="search-results" style="margin-top: 20px;"></div>
                </div>

                <div id="facultyCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
                    <div class="carousel-inner">

                        <div class="carousel-item active">
                            <div class="row d-flex flex-nowrap">
                                <!-- Loop news Here Start -->
                                @if ($news_value)
                                    @foreach ($news as $news_data)
                                        <div class="col-lg-4 col-sm-6 event-item">
                                            <div class="event-thumb">
                                                <div class="service-icon">
                                                    @foreach (array_slice(explode(',', $news_data->news_imgs), 0, 1) as $image)
                                                        @if ($image != '')
                                                            <img src="public/storage/news_imgs/{{ $image }}"
                                                                width="100%" alt="Future University"
                                                                style="border-radius:20px;object-fit:cover;">
                                                        @else
                                                            <img src="public/client/img/fu_logo.png" width="100%"
                                                                alt="Future University"
                                                                style="border-radius:20px;object-fit:cover;">
                                                        @endif
                                                    @endforeach
                                                </div>
                                                <div class="event-date">
                                                    <span> {{ $news_data->news_date }} </span>
                                                </div>
                                            </div>
                                            <div class="service-content course-item">
                                                <h4 style="color:#ef7e22;"><a
                                                        href="{{ route('newsDetails', base64_encode($news_data->id)) }}"
                                                        style="color: #ef7e22">{{ $news_data->news_title }}</a></h4>
                                                <div class="post-meta">
                                                    <span class="cusSpan" style="color: #281e32;">
                                                        <i class="fa fa-clock-o"></i>
                                                        {{ date('d-M-Y | h:i A', strtotime($news_data->created_at)) }}
                                                    </span>
                                                </div>
                                                <p>
                                                    {{ Str::words($news_data->news_desc, 50, '...') }}<a
                                                        style="color: #ef7e22"
                                                        href="{{ route('newsDetails', base64_encode($news_data->id)) }}">Read
                                                        More</a>
                                                </p>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <!-- Loop news Here End -->

                        <!-- Loop events Here Start -->
                        {{-- <div class="carousel-item">
                                <div class="row d-flex flex-nowrap">
                                    @if ($event_value)
                                        @foreach ($events as $event_data)
                                            <div class="col-lg-4 col-sm-6 event-item">
                                                <div class="event-thumb">
                                                    <div class="service-icon">
                                                        @foreach (array_slice(explode(',', $event_data->event_imgs), 0, 1) as $image)
                                                            @if ($image != '')
                                                                <img src="public/storage/event_imgs/{{ $image }}"
                                                                    width="100%" alt="Future University"
                                                                    style="border-radius:20px;">
                                                            @else
                                                                <img src="public/client/img/fu_logo.png"
                                                                    width="100%" alt="Future University"
                                                                    style="border-radius:20px;">
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                    <div class="event-date">
                                                        <span> {{ $event_data->event_date }} </span>
                                                    </div>
                                                </div>
                                                <div class="service-content course-item">
                                                    <h4 style="color:#ef7e22;">{{ $event_data->event_title }}</h4>
                                                    <div class="post-meta">
                                                        <span class="cusSpan" style="color: #281e32;">
                                                            <i class="fa fa-clock-o"></i>
                                                            {{ date('d-M-Y | h:i A', strtotime($event_data->created_at)) }}
                                                        </span>
                                                    </div>
                                                    <p>
                                                        {{ Str::words($event_data->news_desc, 50, '...') }}<a
                                                            style="color: #ef7e22"
                                                            href="{{ route('newsDetails', base64_encode($event_data->id)) }}">Read
                                                            More</a>
                                                    </p>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div> --}}
                        <!-- Loop events Here End -->

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
        </section>
        {{-- </div> --}}

    @endif

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
                            <div class="ts-author-pic set-bg"
                                data-setbg="./public/storage/fu_alumni/BaraaMohammedBashir-100x100.jpg">
                            </div>
                        </div>
                        <div class="col-md-9 ts-text">
                            <p>“ Computerman as it was called before, now The Future University, is my door to the future.
                                It is a place where my base skills and knowledge started from. ”</p>
                            <h5>Baraa Mohammed Bashir</h5>
                            <span>HR Officer, DAL Group.</span>
                        </div>
                    </div>
                </div>
                <div class="ts-item">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="ts-author-pic set-bg"
                                data-setbg="./public/storage/fu_alumni/NajeebAhmadZai-100x100.jpg">
                            </div>
                        </div>
                        <div class="col-md-9 ts-text">
                            <p>“ Being a FU graduated student, I can say that it is one of the best institutions to learn
                                modern and up-to-date technology education. ”</p>
                            <h5>Najeeb Ahmad Zai</h5>
                            <span>Supervisor, Dubai, UAE.</span>
                        </div>
                    </div>
                </div>
                <div class="ts-item">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="ts-author-pic set-bg"
                                data-setbg="./public/storage/fu_alumni/KhalidFaza-100x100.jpg">
                            </div>
                        </div>
                        <div class="col-md-9 ts-text">
                            <p>“ It is really great to be an alumnus of the Future University (Computer Man College) which
                                had such a strong system. I believe that whatever I have achieved today is just because of
                                what I had learned in FU. ”</p>
                            <h5>Khalid Faza</h5>
                            <span>Chief Commercial Officer (CCO), Zain.</span>
                        </div>
                    </div>
                </div>
                <div class="ts-item">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="ts-author-pic set-bg"
                                data-setbg="./public/storage/fu_alumni/Ahmed-Mohammed-Osman-Ali-100x100.jpg">
                            </div>
                        </div>
                        <div class="col-md-9 ts-text">
                            <p>“ Future University (formerly Computer Man College) is not just a University; it’s a way of
                                life. You learn to see the real world with a broaden mind for its system allows you to
                                easily adapt to the dynamic environment that fosters a culture of professional growth. ”</p>
                            <h5>Ahmed Mohammed Osman Ali</h5>
                            <span>Director IT for Sudan & Ethiopia, Ericsson AB- Branch Sudan.</span>
                        </div>
                    </div>
                </div>
                <div class="ts-item">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="ts-author-pic set-bg"
                                data-setbg="./public/storage/fu_alumni/Amar-Hamdi-100x100.jpg">
                            </div>
                        </div>
                        <div class="col-md-9 ts-text">
                            <p>“ Future University, as we knew it back then as Computer Man College, gave me so much in many
                                ways.”</p>
                            <h5>Amar Hamdi</h5>
                            <span>IT Manager, On Target Consulting Dubai, UAE.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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


@endsection
