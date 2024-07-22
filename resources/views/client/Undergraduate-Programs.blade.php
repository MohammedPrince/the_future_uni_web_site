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
										<img src="./public/client/img/main_imgs/members/Ust.-Kawther-Abuelnaja.jpg" alt="" >
									</div>
								  <span>
									<p class="image-text"><strong>Dr. Test Test Test-Test </strong></p>
								  	<p class="image-text">Head of Scientific and Academic Affairs</p>
								</span>
								
							</div>	 -->

                            

                            <table class="table table-bordered table-hover">
								<tbody>
									<tr>  
										<th>
                                        <div class="tab" style="width: 80%;">
                                        <button class="tablinks" onclick="openTab(event, 'Computer Science')">Computer Science</button>
                                        </div>
                                    </th>
                                   
										<th style="width: 50%;">			
                                         <div class="col tabcontent" style="background-color: rgba(255, 255, 255, 0.51);" id="Computer Science">
									<!-- <div class="hr-sect new6"><img src="./public/client/img/main_imgs/faculites/cs.jpg" height="150px" width="150px" alt="Computer Sci" ><span></span></div> -->
									<p style="color: black; text-align:justify" >
                                        

                                        
                                       

                                        <b>Programs:</b> <br>
                                        <li>Bachelor of Science (Honors) in Computer Science </li>
                                        <li>Bachelor of Science (Honors) in Software Engineering</li>
                                        </p>
								</div>
                                </th>
                               </tr>
                               <tr>
                                <th >
                                <div class="tab" style="width: 80%;">
                                <button class="tablinks" onclick="openTab(event, 'Information Technology')">Information Technology</button>
                            </div>
                            </th>
                                <th style="width: 50%;">
                                <div class="col tabcontent" style="background-color: rgba(255, 255, 255, 0.51);" id="Information Technology">
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
                            
                            </th>

                               </tr>

                               <tr>
                                <th>
                                <div class="tab" style="width: 80%;">
                                <button class="tablinks" onclick="openTab(event, 'Engineering')">Engineering</button>
                            </div>
                                </th>
                                <th style="width: 50%;">
                                <div class="col tabcontent" style="background-color: rgba(255, 255, 255, 0.51);" id="Engineering">
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
                                </th>
                               </tr>
                               <tr>
                                <th>
                                <div class="tab" style="width: 80%;">
                                <button class="tablinks" onclick="openTab(event, 'Telecommunication & Space Technology')">Telecommunication & Space Technology</button>

                            </div>
                                </th>
                                <th style="width: 50%;">
                                <div class="col tabcontent" style="background-color: rgba(255, 255, 255, 0.51);" id="Telecommunication & Space Technology">
									<p style="color: black; text-align: justify;">

                                

                                        <b>Programs:</b> <br>
                                        <li>Bachelor of Science (Honors) in Telecom. Engineering</li>
                                        <li>Bachelor of Science (Honors) in Satellite Engineering</li>
                                        <li>Diploma In Telecom. Engineering</li>
                                        
                                        </p>

									</p>
								</div>
                                </th>
                               </tr>
                               <tr>
                                <th>
                                <div class="tab" style="width: 80%;">
                                <button class="tablinks" onclick="openTab(event, 'Architecture')">Architecture</button>
                            </div>
                                </th>
                                <th style="width: 50%;">
                                <div class="col tabcontent" style="background-color: rgba(255, 255, 255, 0.51);"  id="Architecture">
									<p style="color: black; text-align: justify;">
                                        
                                        <b>Programs:</b> <br>
                                        <li>Bachelor of Science (Honors) in Architecture Engneering</li>
                                    </p>
								</div>
                            
                            </th>
                               </tr>
                               <tr>
                                <th>
                                <div class="tab" style="width: 80%;">
                                <button class="tablinks" onclick="openTab(event, 'Arts & Design')">Arts & Design</button>
                            </div>
                                </th>
                                <th style="width: 50%;">
                                <div class="col tabcontent" style="background-color: rgba(255, 255, 255, 0.51);" id="Arts & Design">
									<p style="color: black; text-align: justify;">
                                        

                                        <b>Programs:</b> <br>
                                        <li>Bachelor of Science (Honors) in Creative Multimedia</li>
                                        <li>Bachelor of Science (Honors) in Interior Design</li>
                                        <li>Bachelor of Science (Honors) in Graphic Technology Art</li>
									</p>
								</div>
                            
                            </th>
                               </tr>
                               <tr>
                                <th>
                                <div class="tab" style="width: 80%;">
                                <button class="tablinks" onclick="openTab(event, 'Geoinformatics')">Geoinformatics</button>
                            </div>
                                </th>
                                <th style="width: 50%;">
                                <div class="col tabcontent" style="background-color: rgba(255, 255, 255, 0.51);" id="Geoinformatics">
									<p style="color: black; text-align: justify;">
                                        

                                        <b>Programs:</b> <br>
                                        <li>Bachelor of Science (Honors) in Geoinformatics</li>
                                        <li>Bachelor of Science (Honors) in Remote Sensing</li>
									</p>
								</div>
                            
                            </th>
                               </tr>
                               <tr>
                                <th>
                                <div class="tab" style="width: 80%;">
                                <button class="tablinks" onclick="openTab(event, 'Business Administration')">Business Administration</button>
                            </div>
                                </th>
                                <th style="width: 50%;">
                                <div class="col tabcontent" style="background-color: rgba(255, 255, 255, 0.51);" id="Business Administration">
									<p style="color: black; text-align: justify;">
                                        
                                        <b>Programs:</b> <br>
                                        <li>Bachelor of Science (Honors) in Business Administration</li>
                                        <li>Bachelor of Science (Honors) in Human Resource</li>
                                        <li>Bachelor of Science (Honors) in Marketing</li>

									</p>
								</div>
                            
                            </th>
                               </tr>

                               <!-- <tr>
                                <th>
                                <div class="tab" style="width: 80%;">
                                <button class="tablinks" onclick="openTab(event, 'Postgraduates')">Postgraduates</button>
                            </div>
                                </th>
                                <th style="width: 50%;">
                                <div class="col tabcontent" style="background-color: rgba(255, 255, 255, 0.51);" id="Postgraduates">
									<div class="hr-sect new6"><img src="./public/client/img/main_imgs/faculites/ba.jpg" height="150px" width="150px" alt="Computer Sci" ><span></span></div>
									<p style="color: black;">
                                        <p class="text-center"><strong>Faculty of Postgraduates</strong></p>

                                        <b>Description: </b>
                                        <div style="text-align: justify; style=text-align: justify;">
                                        The Future University Post Graduate Studies offers a world class graduate education that is inspired by the excellent management of faculty members. The Graduate Programs are supported by academic and research curriculum that are recognized by the experts in their respective fields.
                                        The Faculty of Postgraduate Studies offers specialized inter-related Information and Communication Technology (ICT) graduate degree programs that promote interdisciplinary scientific research and development (R & D) in both the fundamentals and frontiers of engineering, computer science, information technology, creative multimedia, architecture, space science, and business administration. We ensure quality, excellence, and distinction for our graduates. We believe that a high quality research environment informs high quality education.
                                        The aim of the post graduate studies is to develop high level of knowledge and skilled leaders through creative and critical learning. This offers both coursework and research graduate programs.
                                        We prepare our postgraduate students for a professional career and for academic research development. The emphasis of the program is on both theoretical and practical techniques for the design and development of communication networks and landscape architecture, enabling the postgraduate students to apply their knowledge and skills in a variety of settings and applications.
                                        The curricular program is distinctive from traditional masters program since it offers information and communication technologies (ICT) modern concepts and innovative education to achieve the objectives. This provides opportunities to students to acquire appropriate skills and expertise necessary to lead a team and to undertake research and development in the different fields of postgraduate studies.
                                        The postgraduate students in the University will have the chance to attend classes online or on site in international universities where the institution is affiliated with. The graduates gain employments in the consultancies, local government offices ad in other institutions.
                                        </div>
									    </p>
                                        <p> 
                                        <div style="text-align: justify;">
                                        <b>Majors of the Program:</b> <br>
                                        <li>Master of Business Administration (MBA)</li>
                                        <li>Master of Landscape Architecture</li>
                                        <li>Master of Science in Information Systems</li>
                                        <li>Master of Science in Computer Science</li>
                                        <li>Master of Science in Computer Engineering</li>
                                        <li>Master of Science in Communication Networks Engineering</li>
                                        </div>
									</p>
								</div>
                            
                            </th>
                               </tr>-->
                           </tbody>
							</table>

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