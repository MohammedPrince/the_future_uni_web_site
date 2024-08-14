@extends('components.client-layout')
@section('main-client-content')

<div class="site-breadcrumb">
    <div class="container">
        <a href="/Home"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-right"></i>
        <span style="color: #d1291f;">Center of E-Learning and Software Development</span>
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
                             Centre of E-Learning and Software Development <strong>CESD</strong>
                        </span>
                    </blockquote>
                    </p> -->

                    <div class="hr-sect new4"><span>About</span></div>
                    
                    <p style="font-size: 16px; text-align: justify;">
                    The Centre of E-Learning and Software Development (CESD) is focused on advancing e-learning technologies and develop innovative software solutions, design immersive learning environments, and conduct research to transform education. Our expertise empowers students and organizations to thrive in the digital era.
                    </p>

                    <hr class="new4">

                    <div class="container" style="padding-top: 30px;">
                        
                        <div class="row" style="padding: 20px;">

                            <div class="col-lg-6">
                                <div class="single-feature">
                                    <div class="title">
                                        <h4>MISSION</h4>
                                    </div>
                                    <div class="desc-wrap" >
                                        <p style="text-align: justify;"> 
                                            To revolutionize education through the power of technology. We strive to create innovative e-learning solutions and software applications that enhance learning experiences, empower learners, and promote lifelong learning. By bridging the gap between education and technology, we aim to foster knowledge, skills, and personal growth in individuals and communities
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
                                        To be a global leader in e-learning and software development, driving the future of education. We envision a world where technology seamlessly integrates with learning, enabling personalized, accessible, and engaging educational experiences. Through our innovative solutions, we aspire to empower learners, educators, and organizations to unlock their full potential and thrive in the digital age.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <section class="skills aos-init aos-animate" data-aos="fade-up">
                            <div class="container">
                      
                                <p></p>
                                <div class="hr-sect new6"><span>Services</span></div>
                                <p></p>
                      
                              <div class="skills-content">
                      
                                <div class="progress">
                                  <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                    <span class="skill">Web Applications<i class="val">100%</i></span>
                                  </div>
                                </div>
                      
                                <div class="progress">
                                  <div class="progress-bar bg-info" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                    <span class="skill">Mobile Apps <i class="val">100%</i></span>
                                  </div>
                                </div>
                      
                                <div class="progress">
                                  <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                    <span class="skill">System Analysis & Design <i class="val">100%</i></span>
                                  </div>
                                </div>
                      
                                <div class="progress">
                                  <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                    <span class="skill">System Administration<i class="val">100%</i></span>
                                  </div>
                                </div>
                      
                                <div class="progress">
                                  <div class="progress-bar bg-dark" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                    <span class="skill">Technical Support <i class="val">100%</i></span>
                                  </div>
                                </div>
                      
                              </div>
                      
                            </div>
                          </section>

                

                        <!-- <section class="testimonial-section spad" style="background-color: white;padding-top: 0px">
                            <div class="container">
                                <div class="section-title text-center">
                                    
                                    
                                </div>
                                <div class="testimonial-slider owl-carousel text-center" >
                    
                                    <div class="ts-item">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="ts-author-pic set-bg" data-setbg="public/client/img/main_imgs/members/mave.jpg"></div>
                                            </div>
                                            <div class="col-md-9 ts-text">
                                                <p></p><p></p><p></p><br>
                                                <h5>Mr. Mohammed Abuelgassim Hussain</h5>
                                                <span>CESD Director, Software Engineer</span>
                                                <div class="about-widget">
                                                <div class="social pt-1">
                                                    <a href="mailto:mohammed.beng@fu.edu.sd" style="color: #ef7e22"><i class="fa fa-envelope"></i> mohammed.beng@fu.edu.sd</a>
                                                </div>
                                                </div>
                                                <br><br>
                                            </div>
                                        </div>
                                    </div>
                    
                                    <div class="ts-item">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="ts-author-pic set-bg" data-setbg="{{asset('./public/storage/staff_imgs/cesd2.jpg')}}"></div>
                                            </div>
                                            <div class="col-md-9 ts-text">
                                                <p></p><p></p><p></p><br>
                                                <h5>Ms. Hadeel El-Mutassim </h5>
                                                <span>Senior Software Developer</span>
                                                <div class="about-widget">
                                                <div class="social pt-1">
                                                    <a href="mailto:hadeel_elmutassim@fu.edu.sd" style="color: #ef7e22"><i class="fa fa-envelope"></i> hadeel_elmutassim@fu.edu.sd</a>
                                                </div>
                                                </div>
                                                <br><br>
                                            </div>
                                        </div>
                                    </div>
                    
                                    <div class="ts-item">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="ts-author-pic set-bg" data-setbg="{{asset('./public/storage/staff_imgs/niceone.jpg')}}"></div>
                                            </div>
                                            <div class="col-md-9 ts-text">
                                                <p></p><p></p><p></p><br>
                                                <h5>Mr. Nader Nageeb</h5>
                                                <span>Senior Software Develope</span>
                                                <div class="about-widget">
                                                <div class="social pt-1">
                                                    <a href="mailto:nadernageeb@fu.edu.sd" style="color: #ef7e22"><i class="fa fa-envelope"></i> nader_najeeb@fu.edu.sd</a>
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
                                                <h5>Ms. Maraim Alnour Ahmed</h5>
                                                <span>Senior Software Developer</span>
                                                <div class="about-widget">
                                                <div class="social pt-1">
                                                    <a href="mailto:maraim_alnour@fu.edu.sd" style="color: #ef7e22"><i class="fa fa-envelope"></i> maraim_alnour@fu.edu.sd</a>
                                                </div>
                                                </div>
                                                <br><br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ts-item">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="ts-author-pic set-bg" data-setbg="{{asset('./public/storage/staff_imgs/cesd1.jpg')}}"></div>
                                            </div>
                                            <div class="col-md-9 ts-text">
                                                <p></p><p></p><p></p><br>
                                                <h5>Mr. Mohammed Al-Mamoun</h5>
                                                <span>Junior Software Developer</span>
                                                <div class="about-widget">
                                                <div class="social pt-1">
                                                    <a href="mailto:mohammed_almamoun@fu.edu.sd" style="color: #ef7e22"><i class="fa fa-envelope"></i> mohammed_almamoun@fu.edu.sd</a>
                                                </div>
                                                </div>
                                                <br><br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ts-item">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="ts-author-pic set-bg" data-setbg="{{asset('./public/storage/staff_imgs/gaziCesd.jpg')}}"></div>
                                            </div>
                                            <div class="col-md-9 ts-text">
                                                <p></p><p></p><p></p><br>
                                                <h5>Mr. Ghazi Abdallah</h5>
                                                <span>Junior Software Developer</span>
                                                <div class="about-widget">
                                                <div class="social pt-1">
                                                    <a href="mailto:ghazi_abdallah@fu.edu.sd" style="color: #ef7e22"><i class="fa fa-envelope"></i> ghazi_abdallah@fu.edu.sd</a>
                                                </div>
                                                </div>
                                                <br><br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section> -->
                        
                        <div class="row">

                        <p><div class="hr-sect new6"><span>CESD Team</span></div></p>

                    
<div class="col-md-6 col-lg-3">
<div class="member">

<div class="member-pic set-bg" data-setbg="{{asset('public/client/img/main_imgs/members/mave.jpg')}}">
<div class="member-social">
<a href = "https://www.linkedin.com/in/mohammed-abuelgassim/" target="_blank"><i class="fa fa-linkedin-square"></i></a>
<!-- <a href = "https://scholar.google.com/citations?user=kzPAeHMAAAAJ&hl=en&oi=ao" target="_blank"><i class="fa fa-graduation-cap"></i></a> -->
<a href = "mailto:mohammed.beng@fu.edu.sd"><i class="fa fa-envelope"></i></a>

</div>
</div>
<h5>Mr. Mohammed Abuelgassim</h5>
<p>CESD Director, Software Engineer</p>
</div>
</div>
<div class="col-md-6 col-lg-3">
<div class="member">
<div class="member-pic set-bg" data-setbg="{{asset('./public/storage/staff_imgs/cesd2.jpg')}}">
<div class="member-social">
<!-- <a href><i class="fa fa-facebook"></i></a>
<a href><i class="fa fa-twitter"></i></a> -->
<a href = "https://eg.linkedin.com/in/hadeel-elmutasim-a24018222?trk=people-guest_people_search-card" target="_blank"><i class="fa fa-linkedin-square"></i></a>
<a href = "mailto:mailto:hadeel_elmutassim@fu.edu.sd"><i class="fa fa-envelope" ></i></a>
</div>
</div>
<h5>Ms. Hadeel El-Mutassim</h5>
<p>Senior Software Developer</p>
</div>
</div>
<div class="col-md-6 col-lg-3">
<div class="member">
<div class="member-pic set-bg" data-setbg="{{asset('./public/storage/staff_imgs/niceone.jpg')}}">
<div class="member-social">
<a href = "https://sd.linkedin.com/in/nader-nageeb-9ab7aa21b?trk=people-guest_people_search-card" target="_blank"><i class="fa fa-linkedin-square"></i></a>
<a href = "mailto:mailto:nadernageeb@fu.edu.sd"><i class="fa fa-envelope"></i></a>
<a href = "https://nadernageeb.github.io/Nader_Nageeb_Protofolio/" target="_blank"><i class="fa fa-external-link" aria-hidden="true"></i></a>
</div>
</div>
<h5>Ms. Nader Nageeb </h5>
<p>Senior Software Developer</p>
</div>
</div>
<div class="col-md-6 col-lg-3">
<div class="member">
<div class="member-pic set-bg" data-setbg="{{asset('./public/storage/staff_imgs/woman_user_noimage.png')}}">
<div class="member-social">
<a href><i class="fa fa-linkedin-square"></i></a>
<a href = "mailto:maraim_alnour@fu.edu.sd" ><i class="fa fa-envelope"></i></a>
<!-- <a href><i class="fa fa-pinterest"></i></a> -->
</div>
</div>
<h5>Ms. Maraim Alnour </h5>
<p>Senior Software Developer</p>
</div>
</div>

<div class="col-md-6 col-lg-3">
<div class="member">
<div class="member-pic set-bg" data-setbg="{{asset('./public/storage/staff_imgs/momunCESD.jpg')}}">
<div class="member-social">
<a href = "https://www.linkedin.com/in/mohamed-mamoun-5472b01aa/" target="_blank"><i class="fa fa-linkedin-square"></i></a>
<a href = "mailto:mohammed_almamoun@fu.edu.sd" ><i class="fa fa-envelope"></i></a>
<!-- <a href><i class="fa fa-pinterest"></i></a> -->
</div>
</div>
<h5>Mr. Mohammed Al-Mamoun</h5>
<p>Senior Mobile Application Developer</p>
</div>
</div>

<div class="col-md-6 col-lg-3">
<div class="member">
<div class="member-pic set-bg" data-setbg="{{asset('./public/storage/staff_imgs/gaziCesd_copy.jpg')}}">
<div class="member-social">
<!-- <a href><i class="fa fa-facebook"></i></a> -->
<a href = "https://www.linkedin.com/in/ghazi-abdallah-omer-mustafa-b602361a4/" target="_blank"><i class="fa fa-linkedin-square"></i></a>
<a href = "mailto:ghazi.abdallah@fu.edu.sd" ><i class="fa fa-envelope"></i></a>
</div>
</div>
<h5>Mr. Ghazi Abdallah </h5>
<p>Junior Software Developer</p>
</div>
</div> 

<!-- <div class="col-md-6 col-lg-3">
<div class="member">
<div class="member-pic set-bg" data-setbg="{{asset('./public/storage/staff_imgs/test57992.jpg')}}">
<div class="member-social">
<a href><i class="fa fa-facebook"></i></a>
<a href><i class="fa fa-twitter"></i></a>
<a href><i class="fa fa-pinterest"></i></a>
</div>
</div>
<h5>Mr. Bahaa A. Mutaal</h5>
<p>Junior Maintenance & Technical Support Engineer</p>
</div>
</div> -->

                    

                          

                        
                          </div>
                      </div>
                    <p></p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection