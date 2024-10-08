@extends('components.client-layout')
@section('main-client-content')

<div class="site-breadcrumb">
    <div class="container">
        <a href="{{route('Home')}}"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-right"></i>
        <span style="color: #fb8b24;">Center of Technical Services</span>
    </div>
</div>


<section class="about-section">

    <div class="container">

        <div class="post-item post-details" style="padding-top: 0px;">
            <div class="section-title ">
                <div class="post-content">
                    <p></p>


                    <div class="hr-sect new4"><span>About</span></div>

                    <p style="font-size: 16px;">
                    The Center of Technical Services (CTS) is a dedicated hub of expertise in providing comprehensive technical support and solutions. With a diverse team of skilled professionals, we deliver reliable and efficient services, ranging from troubleshooting and maintenance to system integration and optimization. Our goal is to empower organizations with seamless technical operations and ensure their success.
                    </p>

                    <hr class="new4">

                    <div class="container" style="padding-top: 30px;">
                        
                        <div class="row" style="padding: 20px;">

                            <div class="col-lg-6">
                                <div class="single-feature">
                                    <div class="title">
                                        <h4>MISSION</h4>
                                    </div>
                                    <div class="desc-wrap">
                                        <p style="text-align: justify;">
                                        To provide exceptional technical services and support to empower organizations with reliable and efficient technology solutions. We strive to enhance operational efficiency, productivity, and customer satisfaction by delivering innovative and customized technical services tailored to meet the unique needs of our clients.
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
                                        To be the leading provider of technical services, renowned for our expertise, reliability, and customer-centric approach. We aim to continuously innovate and adapt to emerging technologies, ensuring our clients stay ahead in a rapidly evolving digital landscape. Through our services, we envision enabling organizations to achieve their goals and excel in their respective industries.
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
                                    <span class="skill">Electronic Maintenance<i class="val">100%</i></span>
                                  </div>
                                </div>
                      
                                <div class="progress">
                                  <div class="progress-bar bg-info" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                    <span class="skill">Network Management <i class="val">100%</i></span>
                                  </div>
                                </div>
                      
                                <div class="progress">
                                  <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                    <span class="skill">CCTV <i class="val">100%</i></span>
                                  </div>
                                </div>
                      
                                <div class="progress">
                                  <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                    <span class="skill">Electronic Gates <i class="val">100%</i></span>
                                  </div>
                                </div>
                      
                                <div class="progress">
                                  <div class="progress-bar bg-dark" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                    <span class="skill">BPX Exchange and Telephone System <i class="val">100%</i></span>
                                  </div>
                                </div>
                      
                              </div>
                      
                            </div>
                          </section>

                        <div class="row">

                        <p><div class="hr-sect new6"><span>CTS Team</span></div></p>

                    
<div class="col-md-6 col-lg-3">
<div class="member">
<div class="member-pic set-bg" data-setbg="{{asset('./public/storage/staff_imgs/IMG_7417.jpg')}}">
<div class="member-social">
<a href = "https://sd.linkedin.com/in/khalidkaradh" target="_blank"><i class="fa fa-linkedin-square"></i></a>
<a href = "https://scholar.google.com/citations?user=kzPAeHMAAAAJ&hl=en&oi=ao" target="_blank"><i class="fa fa-graduation-cap"></i></a>
<a href = "mailto:khalidkaradh@fu.edu.sd"><i class="fa fa-envelope" target="_blank"></i></a>

</div>
</div>
<h5>Se. Dr. Khalid Sheikhidris Mohamed</h5>
<p>CTS Acting Director</p>
</div>
</div>
<div class="col-md-6 col-lg-3">
<div class="member">
<div class="member-pic set-bg" data-setbg="{{asset('./public/storage/staff_imgs/mutazCTS.jpg')}}">
<div class="member-social">
<a href><i class="fa fa-facebook"></i></a>
<a href><i class="fa fa-twitter"></i></a>
<a href><i class="fa fa-pinterest"></i></a>
</div>
</div>
<h5>Mr. Mutaz Abdelmonem</h5>
<p>Junior Maintenance & Technical Support Engineer</p>
</div>
</div>
<div class="col-md-6 col-lg-3">
<div class="member">
<div class="member-pic set-bg" data-setbg="{{asset('./public/storage/staff_imgs/woman_user_noimage.png')}}">
<div class="member-social">
<a href><i class="fa fa-facebook"></i></a>
<a href><i class="fa fa-twitter"></i></a>
<a href><i class="fa fa-pinterest"></i></a>
</div>
</div>
<h5>Ms. Bashria Saidna</h5>
<p>Junior Maintenance & Technical Support Engineer</p>
</div>
</div>
<div class="col-md-6 col-lg-3">
<div class="member">
<div class="member-pic set-bg" data-setbg="{{asset('./public/storage/staff_imgs/test57992.jpg')}}">
<div class="member-social">
<a href><i class="fa fa-facebook"></i></a>
<a href><i class="fa fa-twitter"></i></a>
<a href><i class="fa fa-pinterest"></i></a>
</div>
</div>
<h5>Mr. Abdelrahman El-Tijani</h5>
<p>Junior Maintenance & Technical Support Engineer</p>
</div>
</div>

<div class="col-md-6 col-lg-3">
<div class="member">
<div class="member-pic set-bg" data-setbg="{{asset('./public/storage/staff_imgs/newmazinCTS.jpg')}}">
<div class="member-social">
<a href><i class="fa fa-facebook"></i></a>
<a href><i class="fa fa-twitter"></i></a>
<a href><i class="fa fa-pinterest"></i></a>
</div>
</div>
<h5>Mr. Mazen Khalafalla Hassan</h5>
<p>Junior Network Engineer</p>
</div>
</div><div class="col-md-6 col-lg-3">
<div class="member">
<div class="member-pic set-bg" data-setbg="{{asset('./public/storage/staff_imgs/asmaCTS.jpg')}}">
<div class="member-social">
<a href><i class="fa fa-facebook"></i></a>
<a href><i class="fa fa-twitter"></i></a>
<a href><i class="fa fa-pinterest"></i></a>
</div>
</div>
<h5>Ms. Asmaa Aamir</h5>
<p>Junior Maintenance & Technical Support Engineer</p>
</div>
</div><div class="col-md-6 col-lg-3">
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
</div>

                      </div>
                    <p></p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection