@extends('components.client-layout')
@section('main-client-content')

    <div class="site-breadcrumb">
        <div class="container">
            <a href="{{route('Home')}}"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-right"></i>
            <span style="color:#fb8b24;">Fu-Journal</span>
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
                                Develop Yourself, Publish a Paper in our Journal.
                            </span>
                        </blockquote>
                        </p>

                        <div class="hr-sect new4"><span>About Journal</span></div>

                        <p style="font-size: 16px;">
                            Future Technology Horizon is an interdisciplinary peer reviewed online journal (ISSN: 1858-6368) dedicated to the latest advancement of ICT technologies and Innovation published by the Future University of Sudan. The goal of the journal is to serve as a resource for dissemination of state-of-the-art research and educational material within the field of Science, Technology and Innovation. 
                            Themes to be covered in this journal include all aspects of Science, Technology and Innovation, included but are not limited to :<br>
                            
                            <li><strong>Engineering</strong></li>
                            <li><strong>Computer Science and Information Technology</strong></li>
                            <li><strong>Biomedical Informatics</strong></li>
                            <li><strong>Geoinformatics and Remote Sensing</strong></li>
                            <li><strong>Nanotechnology and Biotechnology</strong></li>

                        </p>
                        <hr class="new4">
                        <div class="container">
                            <div class="feature">

                                <div class="circle" style="width: 250px; height: 250px; ">
                                    <img src="/public/client/img/main_imgs/members/Dr.Ghazali-THJ.png"
                                        alt="Kawther-Abuelnaja">
                                </div>
                                <span>
                                    <p class="image-text"><strong>Editor in Chief</strong></p>
                                    <p class="image-text"><strong>Dr. Mohamed ElGhazali  Hamza Khalil </strong></p>
                                    <p class="image-text">Assistant Professor, Faculty of Telecommunication and Space Technology. </p>
                                  
                                </span>

                            </div>

                            <div class="container">
         
                                <div class="hr-sect new4"><span>Editorial Board</span></div>
                                <p></p>

                                <div class="container">
                                    <div class="row text-center">

                                        <div class="col">
                                            <div class="col" style="background-color: rgba(255, 255, 255, 0.51);">

                                                <div class="circle" style="width: 200px; height: 200px; ">
                                                    <img src="/public/client/img/main_imgs/members/capuno.jpg" alt="">
                                                </div>
                                              
                                                <h6 class="text-center" style="margin-top: 10px"><strong>Dr. Emmalyn Capuno</strong></h6>
                                                <span>Assistant President for Academic Affairs</span>
                                               
                                            </div>
                                        </div>

                                    
                                        <div class="col">
                                            <div class="col" style="background-color: rgba(255, 255, 255, 0.51);">

                                                <div class="circle" style="width: 200px; height: 200px; ">
                                                    <img src="/public/client/img/main_imgs/members/dr_isam.png" alt="">
                                                </div>
                                               
                                                <h6 class="text-center" style="margin-top: 10px"><strong>Dr. Isameldin M. Khair</strong></h6>
                                                <span>Vice President OF Future University</span>
                                               
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="col" style="background-color: rgba(255, 255, 255, 0.51);">

                                                <div class="circle" style="width: 200px; height: 200px; ">
                                                    <img src="/public/client/img/main_imgs/members/dr_salih.png" alt="">
                                                </div>
                                               
                                                <h6 class="text-center" style="margin-top: 10px"><strong>Dr. Saleih Dafalla</strong></h6>
                                                <span>Librarian</span>
                                               
                                            </div>
                                        </div>


                                    </div>
                                </div>

                                    <p></p>

                                <div class="container">
                                    <div class="row text-center">
                                    </div>
                                </div> <p></p>

                    
                            </div>


                        </div>

                        <p>
                            <hr class="new4">
                        </p>
                        <p></p>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
