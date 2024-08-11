@extends('components.client-layout')
@section('main-client-content')
    <div class="site-breadcrumb">
        <div class="container">
            <a href="{{route('Home')}}"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-right"></i>
            <span style="color: #d1291f;">Space Technology Research Center</span>
        </div>
    </div>

    <section class="about-section">

    <div class="container">

        <div class="post-item post-details" style="padding-top: 0px;">
            <div class="section-title ">
                <div class="post-content">
                    <p></p>

                    <!-- <p>
                    <blockquote class="text-center" style="background-color: whitesmoke;">
                        <span style="font-size: 19px;">
                            Innovation Research and Development Center <strong>IRDC</strong>
                        </span>
                    </blockquote>
                    </p> -->

                    <div class="hr-sect new4"><span>About</span></div>

                    <p style="font-size: 16px; text-align:justify">
                    The Space Technology Research Center (STRC) at Future University is a leading hub for cutting-edge research and development in space technology. The center brings together world-class faculty, 
                    researchers, and students to tackle some of the most pressing challenges in the aerospace industry. The Center for Space Technology Research Center organizes, integrates,
                     and facilitates Future University research activities.(STRC)brings together a wide range in Future University who are active in space-related research and functions as a focal point for the growth of the space industry in the the Sudan. 
                    </p>

                    <hr class="new4">

                    <div class="container" style="padding-top: 10px;">
                        
                        <div class="row" style="padding: 10px;">

                            <div class="col-lg-6">
                                <div class="single-feature">
                                    <div class="title">
                                        <h4>MISSION</h4>
                                    </div>
                                    <div class="desc-wrap">
                                        <p style="text-align: justify;">
                                        The mission of the Space Technology Research Center (STRC) at Future University is to be a world-leading hub for innovative space technology research, education, and collaboration.
                                         By bringing together top-tier faculty, researchers, and students, the STRC aims to push the boundaries of space exploration and satellite engineering,
                                         driving technological advancements that benefit humanity and expand our understanding of the cosmos.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="single-feature">
                                    <div class="title">
                                        <h4>VISION</h4>
                                    </div>
                                    <div class="desc-wrap">
                                        <p style="text-align: justify;">
                                        The STRC's vision is to be a premier global destination for space technology innovation and discovery. Through cutting-edge research, state-of-the-art facilities, and interdisciplinary collaboration, the center strives to:
Foster the next generation of space industry leaders and innovators by providing transformative educational and research opportunities for students.


                                           
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
<!-- 
                        <p><div class="hr-sect new6"><span>IRDC Team</span></div></p>

                        <section class="testimonial-section spad" style="background-color: white;padding-top: 0px">
                            <div class="container">
                                <div class="section-title text-center">
                                    
                                    
                                </div>
                                <div class="testimonial-slider owl-carousel text-center" >
                    
                                    <div class="ts-item">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="ts-author-pic set-bg" data-setbg="{{asset('./public/storage/staff_imgs/IMG_7417.jpg')}}"></div>
                                            </div>
                                            <div class="col-md-9 ts-text">
                                                <p></p><p></p><p></p><br>
                                                <h5>Se. Dr. Khalid Sheikhidris Mohamed</h5>
                                                <span>IRDC Director</span>
                                                <div class="about-widget">
                                                <div class="social pt-1">
                                                    <a href="mailto:khalidkaradh@fu.edu.sd" style="color: #ef7e22"><i class="fa fa-envelope"></i> khalidkaradh@fu.edu.sd</a>
                                                </div>
                                                </div>
                                                <br><br>
                                            </div>
                                        </div>
                                    </div>
                    
                                    <div class="ts-item">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="ts-author-pic set-bg" data-setbg="{{asset('./public/storage/staff_imgs/woman_user_noimage.png')}}"></div>
                                            </div>
                                            <div class="col-md-9 ts-text">
                                                <p></p><p></p><p></p><br>
                                                <h5>Dr. Sayda Mamoun</h5>
                                                <span>Assistant Director</span>
                                                <div class="about-widget">
                                                <div class="social pt-1">
                                                    <a href="mailto:sayda@fu.edu.sd" style="color: #ef7e22"><i class="fa fa-envelope"></i> sayda@fu.edu.sd</a>
                                                </div>
                                                </div>
                                                <br><br>
                                            </div>
                                        </div>
                                    </div>
                    
                                    <div class="ts-item">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="ts-author-pic set-bg" data-setbg="{{asset('./public/storage/staff_imgs/woman_user_noimage.png')}}"></div>
                                            </div>
                                            <div class="col-md-9 ts-text">
                                                <p></p><p></p><p></p><br>
                                                <h5>Ms. Muhaira Mohamed</h5>
                                                <span>Administrative Coordinator</span>
                                                <div class="about-widget">
                                                <div class="social pt-1">
                                                    <a href="mailto:muhaira.sharief@fu.edu.sd" style="color: #ef7e22"><i class="fa fa-envelope"></i> muhaira.sharief@fu.edu.sd</a>
                                                </div>
                                                </div>
                                                <br><br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section> -->

<!-- 
                        <p><div class="hr-sect new6"><span>IRDC Labs</span></div></p>
                        <p></p>

           

                        <div class="row text-center">
                            <div class="col" style="background-color: rgba(170, 167, 158, 0.51);">
                                <div class="hr-sect new6"><span>3D Printing Research Lab</span></div>
                                <p style="color: black;">
                                    Making innovative and evolutionary futuristic architectures, 
                                    technologies, and structures a reality all by using the 3d technology in our labs.
                                </p>
                            </div>

                            <div class="col" style="background-color: rgba(204,102,51,0.53);">
                                <div class="hr-sect new6"><span>Robotics Research Lab</span></div>
                                <p style="color: black;">
                                    Finding reliable solutions to mechanical and automated 
                                    manufacturing challenges in the era of intelligent robotism is made easy in our labs.
                                </p>
                            </div>

                            <div class="col" style="background-color: rgba(51,153,204,0.51);">
                                <div class="hr-sect new6"><span>IoT Research Lab</span></div>
                                <p style="color: black;">
                                    Allowing for intelligent communication in between peripherals and inventing unique solutions 
                                    using artificial intelligence is only possible in our labs.
                                </p>
                            </div>

                            <div class="col" style="background-color: rgba(204,153,51,0.51);">
                                <div class="hr-sect new6"><span>Artificial Intelligence Research Lab</span></div>
                                <p style="color: black;">
                                    Enabling automated machine-based, smart, 
                                    and fast response to incidental and forecasted challenges using artificial intelligence is made easy in our labs.
                                </p>
                            </div>

                        </div> -->

                        <div class="hr-sect new4" style="padding-top: 30px"><span>Research Focus and Expertise</span></div>

                        <p style="font-size: 16px;padding-top: 0px ; text-align:justify">
                        Research Focus and Expertise

                        The Space Technology Research Center (STRC) at Future University focuses on a selected number of strategic research areas in space technology and aerospace engineering. The center's faculty and researchers have deep expertise in the following domains:

                        Satellite design and system engineering
                        Spacecraft propulsion and power systems
                        Remote sensing and Earth observation technologies
                        Space communications and navigation
                        While the STRC may not have the elaborate testing facilities of larger research centers, the team leverages partnerships with industry, government agencies, and other academic institutions to access specialized equipment and infrastructure as needed. This collaborative approach allows the center to punch above its weight and make meaningful contributions to the advancement of space technology.

                        The STRC also places a strong emphasis on hands-on student engagement, providing undergraduates and graduate students with research opportunities and project-based learning experiences. This helps cultivate the next generation of space technology innovators and leaders.

                        By focusing its efforts on select research areas and fostering a culture of collaboration, the Space Technology Research Center at Future University aims to have a notable impact on the space industry and the broader scientific community.
                        </p>
    
                        <hr class="new4">

                      </div>
                    <p></p>
                </div>
            </div>
        </div>
    </div>
  </section>



@endsection
