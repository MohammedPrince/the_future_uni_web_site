@extends('components.client-layout')
@section('main-client-content')
    <div class="site-breadcrumb">
        <div class="container">
            <a href="/Home"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-right"></i>
            <span style="color: #d1291f;">Fu Historical Gallery</span>
        </div>
    </div>


    <section class="about-section">
        <div class="container">
            <div class="post-item post-details" style="padding-top: 0px;">
                <div class="section-title ">
                    <div class="post-content">
                        <p></p>

                        <p>
                        <blockquote class="text-center" style="background-color: whitesmoke;">
                            <span style="font-size: 18px;">
                                The Future Univesity Historical Gallery.
                            </span>
                        </blockquote>
                        </p>

                        <div class="hr-sect new4"><span>The Gallery</span></div>

                        <p style="font-size: 16px;">

                            Contain the the main events that happened at future university or the University was
                            part of it like Open Days, festival events , community and social events.

                        </p>

                        <div class="hr-sect new4"><span>FU Gallery</span></div><p></p>

                        <div class="tab">
                            <button class="tablinks" onclick="openTab(event, 'FU-Festival')">FU Festival 2011</button>
                            <button class="tablinks" onclick="openTab(event, 'Matrin-Luther-King')">Matrin Luther KingII</button>
                            <button class="tablinks" onclick="openTab(event, 'Fu-Forum')">Fu Forum</button>
                            <button class="tablinks" onclick="openTab(event, 'Fu-Korean-Visit')"> Korean Delegation Visit</button>
                            <button class="tablinks" onclick="openTab(event, 'Fu-Astronaut-Visit')">Astronaut Muhammed Faris Visit</button>
                        </div>

                        <div id="FU-Festival" class="tabcontent">

                            <div class="row">

                                <div class="col">

                                    <div class="swiper mySwiper">

                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <img class="object-cover w-full h-96"
                                                    src="/client/img/main_imgs/gallery/fu_festival/1.jpg" alt="image" />
                                            </div>
                                            <div class="swiper-slide">
                                                <img class="object-cover w-full h-96"
                                                    src="/client/img/main_imgs/gallery/fu_festival/2.jpg" alt="image" />
                                            </div>
                                            <div class="swiper-slide">
                                                <img class="object-cover w-full h-96"
                                                    src="/client/img/main_imgs/gallery/fu_festival/3.jpg" alt="image" />
                                            </div>
                                            <div class="swiper-slide">
                                                <img class="object-cover w-full h-96"
                                                    src="/client/img/main_imgs/gallery/fu_festival/4.jpg" alt="image" />
                                            </div>
                                            <div class="swiper-slide">
                                                <img class="object-cover w-full h-96"
                                                    src="/client/img/main_imgs/gallery/fu_festival/5.jpg" alt="image" />
                                            </div>
                                            <div class="swiper-slide">
                                                <img class="object-cover w-full h-96"
                                                    src="/client/img/main_imgs/gallery/fu_festival/6.jpg" alt="image" />
                                            </div>
                                            <div class="swiper-slide">
                                                <img class="object-cover w-full h-96"
                                                    src="/client/img/main_imgs/gallery/fu_festival/7.jpg" alt="image" />
                                            </div>
                                            <div class="swiper-slide">
                                                <img class="object-cover w-full h-96"
                                                    src="/client/img/main_imgs/gallery/fu_festival/8.jpg" alt="image" />
                                            </div>
                                            <div class="swiper-slide">
                                                <img class="object-cover w-full h-96"
                                                    src="/client/img/main_imgs/gallery/fu_festival/9.jpg" alt="image" />
                                            </div>
                                            <div class="swiper-slide">
                                                <img class="object-cover w-full h-96"
                                                    src="/client/img/main_imgs/gallery/fu_festival/10.jpg" alt="image" />
                                            </div>
                                            <div class="swiper-slide">
                                                <img class="object-cover w-full h-96"
                                                    src="/client/img/main_imgs/gallery/fu_festival/11.jpg" alt="image" />
                                            </div>
                                            <div class="swiper-slide">
                                                <img class="object-cover w-full h-96"
                                                    src="/client/img/main_imgs/gallery/fu_festival/12.jpg" alt="image" />
                                            </div>
                                        </div>

                                        <div class="swiper-button-next"></div>
                                        <div class="swiper-button-prev"></div>
                                        <div class="swiper-pagination"></div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div id="Matrin-Luther-King" class="tabcontent">

                            <div class="row">

                                <div class="col">

                                    <div class="swiper mySwiper">

                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <img class="object-cover w-full h-96"
                                                    src="/client/img/main_imgs/gallery/Matrin-Luther-King/12.jpg" alt="image" />
                                            </div>
                                            <div class="swiper-slide">
                                                <img class="object-cover w-full h-96"
                                                    src="/client/img/main_imgs/gallery/Matrin-Luther-King/2.jpg" alt="image" />
                                            </div>
                                            <div class="swiper-slide">
                                                <img class="object-cover w-full h-96"
                                                    src="/client/img/main_imgs/gallery/Matrin-Luther-King/3.jpg" alt="image" />
                                            </div>
                                            <div class="swiper-slide">
                                                <img class="object-cover w-full h-96"
                                                    src="/client/img/main_imgs/gallery/Matrin-Luther-King/4.jpg" alt="image" />
                                            </div>
                                            <div class="swiper-slide">
                                                <img class="object-cover w-full h-96"
                                                    src="/client/img/main_imgs/gallery/Matrin-Luther-King/5.jpg" alt="image" />
                                            </div>
                                            <div class="swiper-slide">
                                                <img class="object-cover w-full h-96"
                                                    src="/client/img/main_imgs/gallery/Matrin-Luther-King/6.jpg" alt="image" />
                                            </div>
                                            <div class="swiper-slide">
                                                <img class="object-cover w-full h-96"
                                                    src="/client/img/main_imgs/gallery/Matrin-Luther-King/7.jpg" alt="image" />
                                            </div>
                                            <div class="swiper-slide">
                                                <img class="object-cover w-full h-96"
                                                    src="/client/img/main_imgs/gallery/Matrin-Luther-King/8.jpg" alt="image" />
                                            </div>
                                            <div class="swiper-slide">
                                                <img class="object-cover w-full h-96"
                                                    src="/client/img/main_imgs/gallery/Matrin-Luther-King/9.jpg" alt="image" />
                                            </div>
                                            <div class="swiper-slide">
                                                <img class="object-cover w-full h-96"
                                                    src="/client/img/main_imgs/gallery/Matrin-Luther-King/10.jpg" alt="image" />
                                            </div>
                                            <div class="swiper-slide">
                                                <img class="object-cover w-full h-96"
                                                    src="/client/img/main_imgs/gallery/Matrin-Luther-King/11.jpg" alt="image" />
                                            </div>
                                            <div class="swiper-slide">
                                                <img class="object-cover w-full h-96"
                                                    src="/client/img/main_imgs/gallery/Matrin-Luther-King/1.jpg" alt="image" />
                                            </div>

                                        </div>

                                        <div class="swiper-button-next"></div>
                                        <div class="swiper-button-prev"></div>
                                        <div class="swiper-pagination"></div>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>

                        <div id="Fu-Forum" class="tabcontent">

                            <div class="row">

                                <div class="col">

                                    <div class="swiper mySwiper">

                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <img class="object-cover w-full h-96"
                                                    src="/client/img/main_imgs/gallery/Fu-Forum/1.jpg" alt="image" />
                                            </div>
                                            <div class="swiper-slide">
                                                <img class="object-cover w-full h-96"
                                                    src="/client/img/main_imgs/gallery/Fu-Forum/2.jpg" alt="image" />
                                            </div>
                                            <div class="swiper-slide">
                                                <img class="object-cover w-full h-96"
                                                    src="/client/img/main_imgs/gallery/Fu-Forum/3.jpg" alt="image" />
                                            </div>
                                            <div class="swiper-slide">
                                                <img class="object-cover w-full h-96"
                                                    src="/client/img/main_imgs/gallery/Fu-Forum/4.jpg" alt="image" />
                                            </div>
                                            <div class="swiper-slide">
                                                <img class="object-cover w-full h-96"
                                                    src="/client/img/main_imgs/gallery/Fu-Forum/5.jpg" alt="image" />
                                            </div>
                                            <div class="swiper-slide">
                                                <img class="object-cover w-full h-96"
                                                    src="/client/img/main_imgs/gallery/Fu-Forum/6.jpg" alt="image" />
                                            </div>
                                            <div class="swiper-slide">
                                                <img class="object-cover w-full h-96"
                                                    src="/client/img/main_imgs/gallery/Fu-Forum/7.jpg" alt="image" />
                                            </div>
                                            <div class="swiper-slide">
                                                <img class="object-cover w-full h-96"
                                                    src="/client/img/main_imgs/gallery/Fu-Forum/8.jpg" alt="image" />
                                            </div>
                                            <div class="swiper-slide">
                                                <img class="object-cover w-full h-96"
                                                    src="/client/img/main_imgs/gallery/Fu-Forum/9.jpg" alt="image" />
                                            </div>
                                            <div class="swiper-slide">
                                                <img class="object-cover w-full h-96"
                                                    src="/client/img/main_imgs/gallery/Fu-Forum/10.jpg" alt="image" />
                                            </div>
                                            <div class="swiper-slide">
                                                <img class="object-cover w-full h-96"
                                                    src="/client/img/main_imgs/gallery/Fu-Forum/11.jpg" alt="image" />
                                            </div>
                                            <div class="swiper-slide">
                                                <img class="object-cover w-full h-96"
                                                    src="/client/img/main_imgs/gallery/Fu-Forum/12.jpg" alt="image" />
                                            </div>

                                        </div>

                                        <div class="swiper-button-next"></div>
                                        <div class="swiper-button-prev"></div>
                                        <div class="swiper-pagination"></div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                        <div id="Fu-Korean-Visit" class="tabcontent">

                            <div class="row">

                                <div class="col">

                                    <div class="swiper mySwiper">

                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <img class="object-cover w-full h-96"
                                                    src="/client/img/main_imgs/gallery/Fu-Korean-Visit/1.jpg" alt="image" />
                                            </div>
                                            <div class="swiper-slide">
                                                <img class="object-cover w-full h-96"
                                                    src="/client/img/main_imgs/gallery/Fu-Korean-Visit/2.jpg" alt="image" />
                                            </div>
                                            <div class="swiper-slide">
                                                <img class="object-cover w-full h-96"
                                                    src="/client/img/main_imgs/gallery/Fu-Korean-Visit/3.jpg" alt="image" />
                                            </div>
                                            <div class="swiper-slide">
                                                <img class="object-cover w-full h-96"
                                                    src="/client/img/main_imgs/gallery/Fu-Korean-Visit/4.jpg" alt="image" />
                                            </div>
                                            <div class="swiper-slide">
                                                <img class="object-cover w-full h-96"
                                                    src="/client/img/main_imgs/gallery/Fu-Korean-Visit/5.jpg" alt="image" />
                                            </div>
                                            <div class="swiper-slide">
                                                <img class="object-cover w-full h-96"
                                                    src="/client/img/main_imgs/gallery/Fu-Korean-Visit/6.jpg" alt="image" />
                                            </div>
                                            <div class="swiper-slide">
                                                <img class="object-cover w-full h-96"
                                                    src="/client/img/main_imgs/gallery/Fu-Korean-Visit/7.jpg" alt="image" />
                                            </div>
                                            <div class="swiper-slide">
                                                <img class="object-cover w-full h-96"
                                                    src="/client/img/main_imgs/gallery/Fu-Korean-Visit/8.jpg" alt="image" />
                                            </div>
                                        
                                        </div>

                                        <div class="swiper-button-next"></div>
                                        <div class="swiper-button-prev"></div>
                                        <div class="swiper-pagination"></div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                        <div id="Fu-Astronaut-Visit" class="tabcontent">

                            <div class="row">

                                <div class="col">

                                    <div class="swiper mySwiper">

                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <img class="object-cover w-full h-96"
                                                    src="/client/img/main_imgs/gallery/Astronaut-Visit/1.jpg" alt="image" />
                                            </div>
                                            <div class="swiper-slide">
                                                <img class="object-cover w-full h-96"
                                                    src="/client/img/main_imgs/gallery/Astronaut-Visit/2.jpg" alt="image" />
                                            </div>
                                            <div class="swiper-slide">
                                                <img class="object-cover w-full h-96"
                                                    src="/client/img/main_imgs/gallery/Astronaut-Visit/3.jpg" alt="image" />
                                            </div>
                                            <div class="swiper-slide">
                                                <img class="object-cover w-full h-96"
                                                    src="/client/img/main_imgs/gallery/Astronaut-Visit/4.jpg" alt="image" />
                                            </div>
                                            <div class="swiper-slide">
                                                <img class="object-cover w-full h-96"
                                                    src="/client/img/main_imgs/gallery/Astronaut-Visit/5.jpg" alt="image" />
                                            </div>
                                            <div class="swiper-slide">
                                                <img class="object-cover w-full h-96"
                                                    src="/client/img/main_imgs/gallery/Astronaut-Visit/6.jpg" alt="image" />
                                            </div>
                                            <div class="swiper-slide">
                                                <img class="object-cover w-full h-96"
                                                    src="/client/img/main_imgs/gallery/Astronaut-Visit/7.jpg" alt="image" />
                                            </div>
                                            <div class="swiper-slide">
                                                <img class="object-cover w-full h-96"
                                                    src="/client/img/main_imgs/gallery/Astronaut-Visit/8.jpg" alt="image" />
                                            </div>
                                            <div class="swiper-slide">
                                                <img class="object-cover w-full h-96"
                                                    src="/client/img/main_imgs/gallery/Astronaut-Visit/9.jpg" alt="image" />
                                            </div>
                                            <div class="swiper-slide">
                                                <img class="object-cover w-full h-96"
                                                    src="/client/img/main_imgs/gallery/Astronaut-Visit/10.jpg" alt="image" />
                                            </div>
                                        
                                        </div>

                                        <div class="swiper-button-next"></div>
                                        <div class="swiper-button-prev"></div>
                                        <div class="swiper-pagination"></div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
    </section>

    </section>
@endsection
