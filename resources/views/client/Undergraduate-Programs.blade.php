@extends('components.client-layout')
@section('main-client-content')

    <div class="site-breadcrumb">
        <div class="container">
            <a href="/Home"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-right"></i>
            <span style="color: #d1291f;">Undergraduate Programs</span>
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
							<span style="font-size: 18px;">
								Our wide range of programs are continually developing and are revised in response to changes in the outside world and job market. 
                                So, once you have finished school, our undergraduate studies give an opportunity for you to extend your knowledge so that you can 
                                become an expert in your chosen field.
							</span>
						</blockquote>
						</p> -->

						

						<div class="container">



                            <!-- <div class="feature">

                                <div class="circle" style="width: 250px; height: 250px; ">
                                    <img src="./public/client/img/main_imgs/faculites/post.jpg" alt="">
                                </div>
                                <span>
                                    <p class="image-text"><strong>Dr. Test Test Test-Test </strong></p>
                                    <p class="image-text">Head of Postgraduate Faculty</p>
                                </span>

                            </div> -->

                            <!-- <div class="hr-sect new6"><span>Future University Undergraduate Programs</span></div>
                            <p></p> -->


                            <div class="container text-center">
                                <div class="tab">
                                    <button class="tablinks" onclick="openTab(event, 'Business Administration')">Business
                                        Administration</button>
                                    <button class="tablinks" onclick="openTab(event, 'Information Technology')">Information
                                        Technology</button>
                                    <button class="tablinks" onclick="openTab(event, 'Engineering')">Engineering</button>
                                    <button class="tablinks"
                                        onclick="openTab(event, 'Telecommunication & Space Technology')">Telecommunication &
                                        Space Technology</button>
                                        <button class="tablinks" onclick="openTab(event, 'Arts & Design')">Arts & Design</button>

                                    <button class="tablinks" onclick="openTab(event, 'Computer Science')">Computer Science</button>
                                        
                                        <button class="tablinks" onclick="openTab(event, 'Architecture')">Architecture</button>

                                    <button class="tablinks" onclick="openTab(event, 'Geoinformatics')">Geoinformatics</button>
                                </div>


                            </div>

                            <div class="row">

                                <div class="col tabcontent" style="background-color: rgba(255, 255, 255, 0.51);"
                                    id="Business Administration">
                                    <!-- <div class="hr-sect new6"><img src="./public/client/img/main_imgs/faculites/post.jpg"
                                            height="150px" width="150px" alt="Computer Sci"><span></span></div> -->
                                    
                                    <p class="text-center"><strong> Business Administration </strong></p>
                                    <b>Programs:</b>
                                    <p style="color: black; text-align: justify;">
                                         <br>
                                        <li>Bachelor of Science (Honors) in Business Administration</li>
                                        <li>Bachelor of Science (Honors) in Human Resource</li>
                                        <li>Bachelor of Science (Honors) in Marketing</li>

									</p>
                                    
                                </div>

                                <div class="col tabcontent" style="background-color: rgba(255, 255, 255, 0.51);"
                                    id="Information Technology">
                                    <!-- <div class="hr-sect new6"><img src="./public/client/img/main_imgs/faculites/post.jpg"
                                            height="150px" width="150px" alt="Computer Sci"><span></span></div> -->
                                    <p style="color: black; text-align: justify;">
                                    <p class="text-center"><strong>Information Technology</strong>
                                    </p>
                                    <p style="color: black; text-align: justify;">
                                        
                                        
                                        
                                        <b>Programs:</b> <br>
                                        <li>Bachelor of Science (Honors) in Information Technology</li>
                                        <li>Bachelor of Science (Honors) in Knowledge Management</li>
                                        <li>Bachelor of Science (Honors) in Knowledge Engineering</li>
                                        <li>Diploma in Information Technology</li>
                                        <li>Diploma in E-Commerce Technology</li>
                                        <li>Diploma in IT in Business & Accounting</li>
                                        <li>Diploma in Web Design</li>
                                        
                                        </p>

                                </div>


                                <div class="col tabcontent" style="background-color: rgba(255, 255, 255, 0.51);"
                                    id="Engineering">
                                    <!-- <div class="hr-sect new6"><img src="./public/client/img/main_imgs/faculites/post.jpg"
                                            height="150px" width="150px" alt="POST"><span></span></div> -->
                                    <p style="color: black; text-align: justify;">
                                    <p class="text-center"><strong>Engineering</strong>
                                    </p>
                                    <p style="color: black;  text-align: justify;">
                                        

                                        <b>Program:</b> <br>
                                        <div style="text-align: justify;">
                                        <li>Bachelor of Science (Honors) in Computer Engineering</li>
                                        <li>Bachelor of Science (Honors) in Computer Electronic</li>
                                        <li>Bachelor of Science (Honors) in Biomedical Engineering</li>
                                        <li>Bachelor of Science (Honors) in Electronics Engineering</li>
                                        <li>Bachelor of Science (Honors) in Mechatronics Engineering</li>
                                        <li>Bachelor of Science (Honors) in Renewable Energy</li>
                                        <li>Bachelor of Science (Honors) in Laser Engineering</li>
                                        <li>Diploma in Computer Engineering</li>
                                        <li>Diploma in Electronic Engineering</li>
                                        <li>Diploma in Network Engineering</li>
                                        <li>Diploma in Network Engineering</li>
                                        </div>
                                        </p>
                                </div>


                                <div class="col tabcontent" style="background-color: rgba(255, 255, 255, 0.51);"
                                    id="Computer Science">
                                    <!-- <div class="hr-sect new6"><img src="./public/client/img/main_imgs/faculites/post.jpg"
                                            height="150px" width="150px" alt="Computer Sci"><span></span></div> -->
                                    <p style="color: black; text-align: justify;">
                                    <p class="text-center"><strong> Computer Science 
                                           </strong></p>
                                
                                    <p style="color: black; text-align:justify" >
                                        

                                        <b>Programs:</b> <br>
                                        <li>Bachelor of Science (Honors) in Computer Science </li>
                                        <li>Bachelor of Science (Honors) in Software Engineering</li>
                                        </p>
                                </div>

                                <div class="col tabcontent" style="background-color: rgba(255, 255, 255, 0.51);"
                                    id="Telecommunication & Space Technology">
                                    <!-- <div class="hr-sect new6"><img src="./public/client/img/main_imgs/faculites/post.jpg"
                                            height="150px" width="150px" alt="Computer Sci"><span></span></div> -->
                                    <p style="color: black; text-align: justify;">
                                    <p class="text-center"><strong>Telecommunication & Space Technology</strong></p>
                                    <p style="color: black; text-align: justify;">
                                    <b>Programs:</b> <br>
                                    <li>Bachelor of Science (Honors) in Telecom. Engineering</li>
                                    <li>Bachelor of Science (Honors) in Satellite Engineering</li>
                                    <li>Diploma In Telecom. Engineering</li>

                                    </p>
                                </div>

                                <div class="col tabcontent" style="background-color: rgba(255, 255, 255, 0.51);"
                                    id="Arts & Design">
                                    <!-- <div class="hr-sect new6"><img src="./public/client/img/main_imgs/faculites/post.jpg"
                                            height="150px" width="150px" alt="Computer Sci"><span></span></div> -->
                                    <p style="color: black; text-align: justify;">
                                    <p class="text-center"><strong>Arts & Design</strong></p>
                                    <p style="color: black; text-align: justify;">
                                        

                                        <b>Programs:</b> <br>
                                        <li>Bachelor of Science (Honors) in Creative Multimedia</li>
                                        <li>Bachelor of Science (Honors) in Interior Design</li>
                                        <li>Bachelor of Science (Honors) in Graphic Technology Art</li>
									</p>
                                    </p>
                                </div>

                                <div class="col tabcontent" style="background-color: rgba(255, 255, 255, 0.51);"
                                    id="Architecture">
                                    <!-- <div class="hr-sect new6"><img src="./public/client/img/main_imgs/faculites/post.jpg"
                                            height="150px" width="150px" alt="Computer Sci"><span></span></div> -->
                                    <p style="color: black; text-align: justify;">
                                    <p class="text-center"><strong>Architecture</strong></p>
                                    <p style="color: black; text-align: justify;">
                                        
                                        <b>Programs:</b> <br>
                                        <li>Bachelor of Science (Honors) in Architecture Engneering</li>
                                    </p>
                                    </p>
                                </div>

                                <div class="col tabcontent" style="background-color: rgba(255, 255, 255, 0.51);"
                                    id="Geoinformatics">
                                    <!-- <div class="hr-sect new6"><img src="./public/client/img/main_imgs/faculites/post.jpg"
                                            height="150px" width="150px" alt="Computer Sci"><span></span></div> -->
                                    <p style="color: black; text-align: justify;">
                                    <p class="text-center"><strong>Geoinformatics</strong></p>
                                    <p style="color: black; text-align: justify;">
                                        

                                        <b>Programs:</b> <br>
                                        <li>Bachelor of Science (Honors) in Geoinformatics</li>
                                        <li>Bachelor of Science (Honors) in Remote Sensing</li>
									</p>
                                    </p>
                                </div>

                            </div>


                        <!-- ////////////////////////////////// -->
                         
							
		
  

                        </div>


{{-- 
						<p><hr class="new4"></p>
						<p></p> --}}

						{{-- <div class="container">

							<div class="row text-center">
								<div class="col" style="background-color: rgba(204,102,51,0.53);">
									<button class="modal-button" onclick="openModal(1)">How To Apply</button>
								</div>
								<div class="col" style="background-color: rgba(204,102,51,0.53);">
									<button class="modal-button" onclick="openModal(2)">Bachelor Program</button>
								</div>
								<div class="col" style="background-color: rgba(204,102,51,0.53);">
									<button class="modal-button" onclick="openModal(3)">Diploma Program</button>
								</div>
								
							</div>

							<div id="myModal" class="modal">
								<div class="modal-content">
								  <span class="close" onclick="closeModal()">&times;</span>
								  <h2 id="modalTitle" class="text-center">Modal Title</h2>
								  <p id="modalContent" class="text-center">Modal content goes here...</p>
								</div>
							</div>

						</div> --}}
						
					</div>
				</div>
			</div>
		</div>
	</section>

@endsection