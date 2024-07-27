@extends('components.client-layout')
@section('main-client-content')
    <section class="hero-section">
        <div class="hero-slider owl-carousel">

            <div class="hs-item set-bg" data-setbg="./public/client/img/hero-slider/1.png">
                <div class="hs-text">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="hs-subtitle HeaderMainTxtColor">2ND TOP PRIVATE UNIVERSITY</div>
                                <h2 class="hs-title HeaderMainTxtColor">Inspiring Excellence, Empowering Minds, Transforming
                                    Future</h2>
                                <!--<p class="hs-des">Education is not just about going to school and getting a degree. It's
                                        about widening your<br> knowledge and absorbing the truth about life. Knowledge is
                                        power.</p>  -->

                                <!-- <div class="site-btn">GET STARTED</div> -->
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
                                <div class="hs-subtitle HeaderMainTxtColor">2ND TOP PRIVATE UNIVERSITY</div>
                                <h2 class="hs-title HeaderMainTxtColor">Inspiring Excellence, Empowering Minds, Transforming
                                    Future</h2>
                                <!-- <p class="hs-des">Education is not just about going to school and getting a degree. It's
                                        about widening your<br> knowledge and absorbing the truth about life. Knowledge is
                                        power.</p> -->
                                <!-- <div class="site-btn">GET STARTED</div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- DOMContentLoaded Start -->
    <section class="feature-area">
        <div class="container">
            <div class="row">

                <div class="col-lg-4">
                    <div class="single-feature">
                        <div class="title">
                            <h4 class="toggle-content" style="color: ##7c1104 !important;">Embedded Learning</h4>
                        </div>
                        <div class="desc-wrap" style="text-align: justify; display: none;">
                            <p style="color: #fff;">
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
                            <h4 class="toggle-content" style="color: ##7c1104 !important;">Sustainability Focus</h4>
                        </div>
                        <div class="desc-wrap" style="text-align: justify; display: none;">
                            <p style="color: #fff;">
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
                            <h4 class="toggle-content" style="color: ##7c1104 !important;">Global Engagement</h4>
                        </div>
                        <div class="desc-wrap" style="text-align: justify; display: none;">
                            <p style="color: #fff;">
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
    <!-- DOMContentLoaded End -->



    <section class="counter-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-6">
                    <div class="big-icon">
                        <i class="fa fa-graduation-cap"></i>
                    </div>
                    <div class="counterx-content">
                        <h2>Future University Life Span</h2>
                        <!--<p><i class="fa fa-calendar-o"></i>Online and Available no matter what happens...
                                <a href="https://elearning.fu.edu.sd/" target="_blank" style="color: #ef7e22"><strong>Check
                                        it</strong></a>
                            </p> -->
                    </div>
                </div>

                <div class="col-lg-5 col-md-6">
                    <div class="counterx">
                        <div class="counterx-item">

                            <h4 id="Year"></h4>Years
                        </div>
                        <div class="counterx-item">
                            <h4 id="hours"></h4>Hrs
                        </div>
                        <div class="counterx-item">
                            <h4 id="minutes"></h4>Mins
                        </div>
                        <div class="counterx-item">
                            <h4 id="seconds"></h4>secs
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
                <!-- <p>We provides the opportunity to prepare for life</p> -->
            </div>

            <!-- Slide Show Start -->

            <div class="splide">
                <div class="splide__track">
                    <ul class="splide__list">

                        <!-- Faculty of Information Technology start -->

                        <li class="splide__slide">
                            <p style="color: black;">

                            <div id="IT">
                                <p class="text-center"><strong>Faculty of Information Technology<br>IT</strong></p>
                                <div class="hr-sect new6"><img src="./public/client/img/main_imgs/faculites/it.jpg"
                                        height="100px" width="100px" alt="" loading="lazy"><span></span></div>
                                <div style="text-align: justify;">
                                    faculty of information technology at our university is at the forefront of digital
                                    innovation. With a focus on emerging technologies, our curriculum equips students with
                                    the skills to design, develop, and deploy transformative IT solutions. Through
                                    experiential learning, industry partnerships, and exposure to the latest tools and
                                    methodologies, our graduates are poised to lead the digital revolution.
                                </div>

                                <br><br>
                                <a href="Undergraduate-Programs" class="read-more my-eventBtn"
                                    style="color:blanchedalmond;">More Details</a>
                            </div>
                            </p>
                        </li>
                        <!-- Faculty of Information Technology End -->

                        <!-- Faculty of Engineering start -->
                        <li class="splide__slide">
                            <p style="color: black;">

                            <div id="ENG" style="text-align: justify;">
                                <p class="text-center"><strong>Faculty of Engineering<br>ENG</strong></p>
                                <div class="hr-sect new6"><img src="./public/client/img/main_imgs/faculites/engineering.jpg"
                                        height="100px" width="100px" alt="" loading="lazy"><span></span></div>
                                <div style="text-align: justify;">
                                    <div style="text-align: justify;"> Our faculty of engineering is renowned for its
                                        cutting-edge curriculum, state-of-the-art facilities, and world-class faculty. By
                                        blending theoretical knowledge with practical application, we empower our students
                                        to tackle complex challenges and develop innovative solutions that drive progress in
                                        various industries. Through hands-on projects, interdisciplinary collaboration, and
                                        access to advanced research opportunities, our graduates emerge as highly
                                        sought-after engineering professionals.

                                    </div>
                                </div>
                                <br><br>
                                <a href="Undergraduate-Programs" class="read-more my-eventBtn"
                                    style="color:blanchedalmond;">More Details</a>
                            </div>
                            </p>
                        </li>
                        <!-- Faculty of Engineering End -->

                        <!-- Faculty of Computer Science start -->
                        <li class="splide__slide">
                            <p style="color: black;">

                            <div id="SCI">
                                <p class="text-center"><strong>Faculty of Computer Science<br>SCI</strong></p>
                                <div class="hr-sect new6"><img src="./public/client/img/main_imgs/faculites/cs.jpg"
                                        height="100px" width="100px" alt="" loading="lazy"><span></span></div>
                                <div style="text-align: justify;">
                                    Our faculty of computer science is dedicated to cultivating the next generation of
                                    innovators and problem-solvers. By blending cutting-edge theory with practical
                                    application, we empower our students to master the fundamentals of computer science and
                                    push the boundaries of what's possible. Through cutting-edge research, hands-on
                                    projects, and collaborative learning, our graduates are prepared to excel in a wide
                                    range of tech-driven industries.
                                </div>

                                <a href="Undergraduate-Programs" class="read-more my-eventBtn"
                                    style="color:blanchedalmond;">More Details</a>
                            </div>
                            </p>
                        </li>
                        <!-- Faculty of Computer Science End -->

                        <!-- Faculty of Telecommunication Engineering start -->
                        <li class="splide__slide">
                            <p style="color: black;">

                            <div id="TCOM">
                                <p class="text-center"><strong>Faculty of Telecommunication Engineering<br>TCOM</strong>
                                </p>
                                <div class="hr-sect new6"><img src="./public/client/img/main_imgs/faculites/tcom.jpg"
                                        height="100px" width="100px" alt="" loading="lazy"><span></span></div>
                                <div style="text-align: justify;">
                                    At the forefront of technological advancement, our faculty of telecommunication
                                    engineering and space technology is committed to shaping the future of communication and
                                    space exploration. By integrating emerging trends in satellite technology, wireless
                                    systems, and aerospace engineering, we equip our students with the skills to design,
                                    develop, and deploy transformative solutions that redefine the boundaries of what's
                                    possible.
                                </div>

                                <br><br>
                                <a href="Undergraduate-Programs" class="read-more my-eventBtn"
                                    style="color:blanchedalmond;">More Details</a>
                            </div>
                            </p>
                        </li>
                        <!-- Faculty of Telecommunication Engineering End -->

                        <!-- Faculty of Architecture Engineering start -->
                        <li class="splide__slide">
                            <p style="color: black;">

                            <div id="ARCH">
                                <p class="text-center"><strong>Faculty of Architecture Engineering<br>ARCH</strong></p>
                                <div class="hr-sect new6"><img src="./public/client/img/main_imgs/faculites/arch.jpg"
                                        height="100px" width="100px" alt="" loading="lazy"><span></span></div>
                                <div style="text-align: justify;">
                                    The faculty of architecture engineering at our university is dedicated to cultivating
                                    visionary designers and innovative problem-solvers. By blending the art of architecture
                                    with the science of engineering, we empower our students to create sustainable,
                                    functional, and aesthetically-pleasing structures that enhance the built environment.
                                    Through hands-on studios, interdisciplinary collaboration, and exposure to cutting-edge
                                    technologies, our graduates are poised to shape the future of the industry.
                                </div>

                                <a href="Undergraduate-Programs" class="read-more my-eventBtn"
                                    style="color:blanchedalmond;">More Details</a>
                            </div>
                            </p>
                        </li>
                        <!-- Faculty of Architecture Engineering End -->


                        <!-- Faculty of Fine Arts and Design start -->
                        <li class="splide__slide">
                            <p style="color: black;">

                            <div id="FAD">
                                <p class="text-center"><strong>Faculty of Fine Arts and Design<br>FAD</strong></p>
                                <div class="hr-sect new6"><img src="./public/client/img/main_imgs/faculites/fad.jpg"
                                        height="100px" width="100px" alt="" loading="lazy"><span></span></div>
                                <div style="text-align: justify;">
                                    The faculty of fine arts and design at our university is a vibrant hub of creativity and
                                    innovation. By nurturing the artistic talents and technical skills of our students, we
                                    empower them to express their unique visions through a diverse range of mediums, from
                                    visual arts and graphic design to performance and digital media. Our graduates leave
                                    equipped to thrive as influential artists, designers, and creative professionals.
                                </div>

                                <a href="Undergraduate-Programs" class="read-more my-eventBtn"
                                    style="color:blanchedalmond;">More Details</a>
                            </div>
                            </p>
                        </li>
                        <!-- Faculty of Fine Arts and Design End -->


                        <!-- Faculty of Geoinformatics start -->
                        <li class="splide__slide">
                            <p style="color: black;">

                            <div id="GIS">
                                <p class="text-center"><strong>Faculty of Geoinformatics<br>GIS</strong></p>
                                <div class="hr-sect new6"><img src="./public/client/img/main_imgs/faculites/geo.jpg"
                                        height="100px" width="100px" alt="" loading="lazy"><span></span></div>
                                <div style="text-align: justify;">
                                    The faculty of geoinformatics at our university is at the forefront of spatial data
                                    analysis and visualization. By integrating cutting-edge technologies like GIS, remote
                                    sensing, and geospatial modeling, we equip our students with the skills to collect,
                                    interpret, and apply geospatial intelligence to solve complex challenges in fields
                                    ranging from urban planning to environmental management.
                                </div>

                                <br><br>
                                <a href="Undergraduate-Programs" class="read-more my-eventBtn"
                                    style="color:blanchedalmond;">More Details</a>
                            </div>
                            </p>
                        </li>
                        <!-- Faculty of Geoinformatics End -->

                        <!-- Faculty of Business Administration start -->
                        <li class="splide__slide">
                            <p style="color: black;">

                            <div id="BA">
                                <p class="text-center"><strong>Faculty of Business Administration<br>BA</strong></p>
                                <div class="hr-sect new6"><img src="./public/client/img/main_imgs/faculites/ba.jpg"
                                        height="100px" width="100px" alt="" loading="lazy"><span></span></div>
                                <div style="text-align: justify;">
                                    The faculty of business administration at our university is dedicated to nurturing the
                                    next generation of business leaders and entrepreneurs. By blending theoretical knowledge
                                    with practical application, we empower our students to develop the strategic thinking,
                                    decision-making, and problem-solving skills needed to thrive in the dynamic global
                                    marketplace. Through hands-on projects, experiential learning, and exposure to industry
                                    best practices, our graduates are prepared to excel in a wide range of business domains.
                                </div>

                                <br><br>
                                <a href="Undergraduate-Programs" class="read-more my-eventBtn"
                                    style="color:blanchedalmond;">More Details</a>
                            </div>
                            </p>
                        </li>
                        <!-- Faculty of Business Administration End -->

                        <!-- Faculty of Postgraduate Studies start -->
                        <li class="splide__slide">
                            <p style="color: black;">

                            <div id="POST">
                                <p class="text-center"><strong>Faculty of Postgraduate Studies<br>POST</strong></p>
                                <div class="hr-sect new6"><img src="./public/client/img/main_imgs/faculites/post.jpg"
                                        height="100px" width="100px" alt="" loading="lazy"><span></span></div>
                                <div style="text-align: justify;">
                                    The faculty of postgraduate studies at our university is a hub of advanced research and
                                    specialized knowledge. Catering to students seeking to deepen their expertise or
                                    transition into academic or research-focused careers, we offer a diverse range of
                                    master's and doctoral programs. Through rigorous coursework, mentorship from leading
                                    scholars, and opportunities for interdisciplinary collaboration, our postgraduate
                                    students become pioneers in their respective fields.
                                </div>

                                <br><br>
                                <a href="Postgraduates-Programs" class="read-more my-eventBtn"
                                    style="color:blanchedalmond;">More Details</a>
                            </div>
                            </p>
                        </li>
                        <!-- Faculty of Postgraduate Studies End -->

                    </ul>
                </div>
            </div>
            <!-- Slide Show End -->
        </div>
        </div>
    </section>


    <section class="enroll-section overlay">
        </br>
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="section-title text-white">
                        <h3>External & Internal Transfer / Bridging</h3>
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
                    <!-- Content for the second row goes here -->
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
    <div></div>

    <section class="fact-section spad set-bg " data-setbg="./public/client/img/fact-bg.jpg">

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
                                    <img src="./public/client/img/main_imgs/general/graduatesII.png" class="circle"
                                        loading="lazy">
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
                                    <img src="./public/client/img/main_imgs/general/fav.png" class="circle"
                                        loading="lazy">
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
                                    <img src="./public/client/img/main_imgs/general/established.png" class="circle"
                                        loading="lazy">
                                    <div class="title">
                                        <h4>1991</h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="single-feature">
                                <div class="title">
                                    <h4>Active Students</h4>
                                </div>
                                <div class="desc-wrap">
                                    <img src="./public/client/img/main_imgs/general/students.png" class="circle"
                                        loading="lazy">
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
                <h3>Future University Centers</h3>
                <!-- <p>Building a better world, one course at a time</p> -->
            </div>
            <div class="row">

                <div class="container">


                    <div class="row text-left" style="text-align: justify;">

                        <div class="col" style="background-color: rgba(255, 255, 255, 0.51);">
                            <!--<div class="hr-sect new6"><img src="./public/client/img/main_imgs/centers/cesd.png" height="150px"
                                        width="150px" alt="" loading="lazy"><span></span></div> -->
                            <p style="color: black;">
                            <p class="text-center"><strong>Center of E-Learning and Software Development<br>CESD</strong>
                            </p>
                            The Center of E-Learning and Software Development is a cutting-edge hub that harnesses the power
                            of technology to transform education and drive digital innovation. By developing innovative
                            e-learning platforms and cutting-edge software solutions, the center empowers students and
                            professionals to thrive in the digital age. <br><br>

                            <a href="{{ route('CESD') }}" class="read-more my-eventBtn"
                                style="color:blanchedalmond;">More Details</a>

                            </p>

                        </div>

                        <div class="col" style="background-color: rgba(255, 255, 255, 0.51);">
                            <!--<div class="hr-sect new6"><img src="./public/client/img/main_imgs/centers/cesd.png" height="150px"
                                        width="150px" alt="" loading="lazy"><span></span></div> -->
                            <p style="color: black;">
                            <p class="text-center"><strong>Center of Technological Services<br>CTS</strong></p>
                            The Center of Technological Services is a comprehensive resource hub that provides
                            state-of-the-art facilities and specialized support to students, faculty, and researchers. From
                            advanced computing infrastructure to cutting-edge prototyping tools, the center enables
                            innovation and discovery across disciplines.<br><br>

                            <a href="{{ route('CTS') }}" class="read-more my-eventBtn"
                                style="color:blanchedalmond;">More Details</a>

                            </p>

                        </div>

                        <div class="col" style="background-color: rgba(255, 255, 255, 0.51);">
                            <!--<div class="hr-sect new6"><img src="./public/client/img/main_imgs/centers/cesd.png" height="150px"
                                        width="150px" alt="" loading="lazy"><span></span></div> -->
                            <p style="color: black;">
                            <p class="text-center"><strong>Innovation Research and Development Center<br>IRDC</strong></p>

                            The Innovation Research and Development Center is a dynamic hub where pioneering ideas come to
                            life. By fostering cross-disciplinary collaboration and providing access to cutting-edge
                            resources, the center empowers researchers and innovators to push the boundaries of knowledge
                            and develop transformative solutions. <br> <br>

                            <a href="{{ route('IRDC') }}" class="read-more my-eventBtn"
                                style="color:blanchedalmond;">More Details</a>

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
                <h3>ALUMNI TESTIMONIALS</h3>
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
                <h3>Future University News</h3>
   
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
                <h3>Proud Partnerships</h3>
                <p>Future University professional partners</p>
            </div>

            <div class="container">
                <div class="row text-center">

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
                            <img src="./public/client/img/main_imgs/members/University_of_Turin.png" height="150px"
                                width="150px" alt="" loading="lazy">

                            <a href="https://en.unito.it/" target="_blank">
                                <h6 class="text-center" style="margin-top: 10px"><strong>University of Turin</strong></h6>
                            </a>

                        </div>
                    </div>
                    <div class="col">
                        <div class="col" style="background-color: rgba(255, 255, 255, 0.51);">
                            <img src="./public/client/img/main_imgs/members/Pennsylvania_University.png" height="150px"
                                width="150px" alt="" loading="lazy">

                            <a href="https://www.psu.edu/" target="_blank">
                                <h6 class="text-center" style="margin-top: 10px"><strong>Pennsylvania State
                                        University</strong></h6>
                            </a>

                        </div>
                    </div>
                    <div class="col">
                        <div class="col" style="background-color: rgba(255, 255, 255, 0.51);">
                            <img src="./public/client/img/main_imgs/members/jhon.png" height="150px" width="150px"
                                alt="" loading="lazy">

                            <a href="https://www.jhu.edu/" target="_blank">
                                <h6 class="text-center" style="margin-top: 10px"><strong>Johns Hopkins University</strong>
                                </h6>
                            </a>

                        </div>
                    </div>
                    <div class="col">
                        <div class="col" style="background-color: rgba(255, 255, 255, 0.51);">
                            <img src="./public/client/img/main_imgs/members/boston_uni.png" height="150px" width="150px"
                                alt="" loading="lazy">

                            <a href="https://www.bu.edu/" target="_blank">
                                <h6 class="text-center" style="margin-top: 10px"><strong>Boston University</strong></h6>
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
                        <button class="site-btn FooterMainColor">SUBSCRIBE</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
