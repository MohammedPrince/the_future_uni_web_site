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

						<p>
						<blockquote class="text-center" style="background-color: whitesmoke;">
							<span style="font-size: 18px;">
								Our wide range of programs are continually developing and are revised in response to changes in the outside world and job market. 
                                So, once you have finished school, our undergraduate studies give an opportunity for you to extend your knowledge so that you can 
                                become an expert in your chosen field.
							</span>
						</blockquote>
						</p>

						<hr class="new4">

						<div class="container">
							
							
							<div class="feature">
								
									<div class="circle" style="width: 250px; height: 250px; ">
										<img src="/client/img/main_imgs/members/Ust.-Kawther-Abuelnaja.jpg" alt="" >
									</div>
								  <span>
									<p class="image-text"><strong>Dr. Test Test Test-Test </strong></p>
								  	<p class="image-text">Head of Scientific and Academic Affairs</p>
								</span>
								
							</div>	

                            <div class="hr-sect new6"><span>Future University Undergraduate Programs</span></div> <p></p>
							

                        <div class="container text-center">
                            <div class="tab">
                                <button class="tablinks" onclick="openTab(event, 'Computer Science')">Computer Science</button>
                                <button class="tablinks" onclick="openTab(event, 'Information Technology')">Information Technology</button>
                                <button class="tablinks" onclick="openTab(event, 'Engineering')">Engineering</button>
                                <button class="tablinks" onclick="openTab(event, 'Telecommunication & Space Technology')">Telecommunication & Space Technology</button>
                            </div>
                       
                            <div class="tab">
                                <button class="tablinks" onclick="openTab(event, 'Architecture')">Architecture</button>
                                <button class="tablinks" onclick="openTab(event, 'Arts & Design')">Arts & Design</button>
                                <button class="tablinks" onclick="openTab(event, 'Geoinformatics')">Geoinformatics</button>
                                <button class="tablinks" onclick="openTab(event, 'Business Administration')">Business Administration</button>
                                <button class="tablinks" onclick="openTab(event, 'Postgraduates')">Postgraduates</button>
                            </div>
                        </div>	

							<div class="row text-center">

								<div class="col tabcontent" style="background-color: rgba(255, 255, 255, 0.51);" id="Computer Science">
									<div class="hr-sect new6"><img src="/client/img/main_imgs/faculites/cs.jpg" height="150px" width="150px" alt="Computer Sci" ><span></span></div>
									<p style="color: black;">
                                        <p class="text-center"><strong>Faculty of Computer Science</strong></p>

                                        <b>Description: </b>
                                        Computer science deals with the fundamental scientific laws and engineering principles which 
                                        govern the design, manufacture, and use of computers. A computer scientist is involved in work ranging from mathematical studies of 
                                        problem solving procedures to engineering research in advanced computing systems.
                                        The computer science courses are the fundamentals needed by every computer scientist. As the software industry evolves, 
                                        practitioners are increasingly expected to build reliable systems for mission and life-critical 
                                        applications. Such professionals distinguish themselves through mastery of scientific and 
                                        mathematical foundations, mastery of software tools and methods, and experience in collaborative work on large projects.
									</p>
                                        <p> 

                                        <b>Majors of the Program:</b> <br>
                                        <li>Bachelor of Science (Honors) in Computer Science </li>
                                        <li>Bachelor of Science (Honors) in Software Engineering</li>
                                        </p>
								</div>

								<div class="col tabcontent" style="background-color: rgba(255, 255, 255, 0.51);" id="Information Technology">
									<div class="hr-sect new6"><img src="/client/img/main_imgs/faculites/it.jpg" height="150px" width="150px" alt="Computer Sci" ><span></span></div>
									<p style="color: black;">
                                        <p class="text-center"><strong>Faculty of Information Technology</strong></p>
                                        
                                        <b>Description: </b>

                                        The Faculty of Information Technology focuses on the study, design, development, implementation, 
                                        support, and management of computer based information systems. Its courses are designed to provide a coherent view of the significance of 
                                        information relevant in today’s context. Emphasis is placed on practical application of knowledge and the use of computer.

									</p>
                                        <p> 

                                        <b>Majors of the Program:</b> <br>
                                        <li>Bachelor of Science (Honors) in Information Technology</li>
                                        <li>Bachelor of Science (Honors) in Knowledge Management</li>
                                        <li>Diploma in Information Technology</li>
                                        <li>Diploma in E-Commerce Technology</li>
                                        <li>Diploma in IT in Business & Accounting</li>
                                        <li>Diploma in Web Design</li>
                                        </p>
								</div>

								<div class="col tabcontent" style="background-color: rgba(255, 255, 255, 0.51);" id="Engineering">
									<div class="hr-sect new6"><img src="/client/img/main_imgs/faculites/engineering.jpg" height="150px" width="150px" alt="Computer Sci" ><span></span></div>
									<p style="color: black;">
                                        <p class="text-center"><strong>Faculty of Engineering</strong></p>

										 <b>Description: </b>
                                        
                                         The Faculty of Engineering of the Future University, Sudan is dedicated to producing 
                                         professionals who are critical thinkers and problem solvers. Its task is to develop young engineers with the best that science and technology can 
                                         offer in a manner that can transform them into responsible professionals.
                                        Engineering programs of the Future University-Sudan produce worldclass engineers who can synthesize a broad range of disciplinary 
                                        knowledge while keeping the systemic nature of the problem within their view. As we face the challenges that come our way, it will be the engineers with their critical and analytical minds that can transform our dreams into reality.

									</p>
                                        <p> 
                                        <b>Majors of the Program:</b> <br>
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
                                        </p>
								</div>

                                <div class="col tabcontent" style="background-color: rgba(255, 255, 255, 0.51);" id="Telecommunication & Space Technology">
									<div class="hr-sect new6"><img src="/client/img/main_imgs/faculites/tcom.jpg" height="150px" width="150px" alt="Computer Sci" ><span></span></div>
									<p style="color: black;">

                                        <p class="text-center"><strong>Faculty of Telecommunications & Space Technology </strong></p>
                                        
                                        <b>Description: </b>
                                        Telecommunications and Space Technology at the Future University is a gateway into this rapidly advancing, global field. The faculty 
                                        offers world-class programs at both undergraduate and graduate levels. Students have access to research across a wide range of 
                                        subjects related to telecommunications engineering and satellite communication. They also have opportunities to develop skills 
                                        through community action projects.
                                        The faculty has on campus training facilities such as the workshop for basic training, satellite unit, telephone exchange and the university network. 
                                        In addition the faculty organises industrial training via an agreement with a local telecommunications operator and various ICT organisations.
									    </p>
                                        <p> 

                                        <b>Majors of the Program:</b> <br>
                                        <li>Bachelor of Science (Honors) in Telecom. Engineering</li>
                                        <li>Bachelor of Science (Honors) in Satellite Engineering</li>
                                        <li>Diploma In Telecom. Engineering</li>
                                        
                                        </p>

									</p>
								</div>
							</div>
						  </div>

                        <div class="container">

                            <div class="row text-center">

								<div class="col tabcontent" style="background-color: rgba(255, 255, 255, 0.51);"  id="Architecture">
									<div class="hr-sect new6"><img src="/client/img/main_imgs/faculites/arch.jpg" height="150px" width="150px" alt="Computer Sci" ><span></span></div>
									<p style="color: black;">
                                        <p class="text-center"><strong>Faculty of Architecture</strong></p>

                                        <b>Description: </b>
                                        Architecture, the art and science of building, is peculiarly approached in a way that contemporary design techniques are focused on employing advanced drawing and design programs such as ArchiCAD and 3D max.
                                        The program, the only in Sudan, offers students’ “digital design know-how” of all building types. 
                                        Recent up-to-date challenges of architecture require specialties that are answerable to such challenging issues. All courses offered in 
                                        the Faculty address contemporary architecture digital design approach to style, function, and technology.
									    </p>
                                        <p> 

                                        <b>Majors of the Program:</b> <br>
                                        <li>Bachelor of Science (Honors) in Architecture Engneering</li>
                                    </p>
								</div>

								<div class="col tabcontent" style="background-color: rgba(255, 255, 255, 0.51);" id="Arts & Design">
									<div class="hr-sect new6"><img src="/client/img/main_imgs/faculites/fad.jpg" height="150px" width="150px" alt="Computer Sci" ><span></span></div>
									<p style="color: black;">
                                        <p class="text-center"><strong>Faculty of Arts & Design</strong></p>

                                        <b>Description: </b>
                                        The Faculty of Art and Design develops highly skilled individuals using state-of-the-art facilities and a novel, digital approach. 
                                        It is a home of excellence and innovation across many fields of art, multimedia, and design.
                                        The Faculty is committed to educate individuals whose strengths are in arts based around expertise 
                                        with computers such as: web site design, graphic design, animation, video production. 
                                        The students will still have a strong base in traditional art and design theory but the 
                                        grounding in IT application will distinguish them as leaders of the future of their fields. 
                                        The programs prepare students for professional careers by emphasizing critical thinking, innovation, and formal design.
									    </p>
                                        <p> 

                                        <b>Majors of the Program:</b> <br>
                                        <li>Bachelor of Science (Honors) in Creative Multimedia</li>
                                        <li>Bachelor of Science (Honors) in Interior Design</li>
                                        <li>Bachelor of Science (Honors) in Graphic Technology Art</li>
									</p>
								</div>

								<div class="col tabcontent" style="background-color: rgba(255, 255, 255, 0.51);" id="Geoinformatics">
									<div class="hr-sect new6"><img src="/client/img/main_imgs/faculites/geo.jpg" height="150px" width="150px" alt="Computer Sci" ><span></span></div>
									<p style="color: black;">
                                        <p class="text-center"><strong>Faculty of Geoinformatics</strong></p>

                                        <b>Description: </b>
                                        Geoinformation technology is a rapid growth industry driven by increasing market demands. 
                                        Understanding the latest developments is important to professionals and students alike 
                                        and the Future University Faculty of GeoInformatics plays an important role in this. 
                                        The faculty actively disseminates knowledge of current theory and application of geoinformatics. As the field continues to develop 
                                        there is a great need for specialized training courses worldwide as well as specifically here in Sudan.
									    </p>
                                        <p> 

                                        <b>Majors of the Program:</b> <br>
                                        <li>Bachelor of Science (Honors) in Geoinformatics</li>
                                        <li>Bachelor of Science (Honors) in Remote Sensing</li>
									</p>
								</div>

                                <div class="col tabcontent" style="background-color: rgba(255, 255, 255, 0.51);" id="Business Administration">
									<div class="hr-sect new6"><img src="/client/img/main_imgs/faculites/ba.jpg" height="150px" width="150px" alt="Computer Sci" ><span></span></div>
									<p style="color: black;">
                                        <p class="text-center"><strong>Faculty of Business Administration</strong></p>

                                        <b>Description: </b>
                                        The Faculty of Business Administration is wholly committed to foster business leadership and guide 
                                        future ethical business professionals through the intricacies of business life in an age of change and uncertainty. 
                                        We desire to offer fruitful learning experiences. To us, learning experiences mean a bright future.
									    </p>
                                        <p> 

                                        <b>Majors of the Program:</b> <br>
                                        <li>Bachelor of Science (Honors) in Business Administration</li>
                                        <li>Bachelor of Science (Honors) in Human Resource</li>
                                        <li>Bachelor of Science (Honors) in Marketing</li>

									</p>
								</div>

                                <div class="col tabcontent" style="background-color: rgba(255, 255, 255, 0.51);" id="Postgraduates">
									<div class="hr-sect new6"><img src="/client/img/main_imgs/faculites/ba.jpg" height="150px" width="150px" alt="Computer Sci" ><span></span></div>
									<p style="color: black;">
                                        <p class="text-center"><strong>Faculty of Postgraduates</strong></p>

                                        <b>Description: </b>

                                        The Future University Post Graduate Studies offers a world class graduate education that is inspired by the excellent management of faculty members. The Graduate Programs are supported by academic and research curriculum that are recognized by the experts in their respective fields.
                                        The Faculty of Postgraduate Studies offers specialized inter-related Information and Communication Technology (ICT) graduate degree programs that promote interdisciplinary scientific research and development (R & D) in both the fundamentals and frontiers of engineering, computer science, information technology, creative multimedia, architecture, space science, and business administration. We ensure quality, excellence, and distinction for our graduates. We believe that a high quality research environment informs high quality education.
                                        The aim of the post graduate studies is to develop high level of knowledge and skilled leaders through creative and critical learning. This offers both coursework and research graduate programs.
                                        We prepare our postgraduate students for a professional career and for academic research development. The emphasis of the program is on both theoretical and practical techniques for the design and development of communication networks and landscape architecture, enabling the postgraduate students to apply their knowledge and skills in a variety of settings and applications.
                                        The curricular program is distinctive from traditional masters program since it offers information and communication technologies (ICT) modern concepts and innovative education to achieve the objectives. This provides opportunities to students to acquire appropriate skills and expertise necessary to lead a team and to undertake research and development in the different fields of postgraduate studies.
                                        The postgraduate students in the University will have the chance to attend classes online or on site in international universities where the institution is affiliated with. The graduates gain employments in the consultancies, local government offices ad in other institutions.
									    </p>
                                        <p> 

                                        <b>Majors of the Program:</b> <br>
                                        <li>Master of Business Administration (MBA)</li>
                                        <li>Master of Landscape Architecture</li>
                                        <li>Master of Science in Information Systems</li>
                                        <li>Master of Science in Computer Science</li>
                                        <li>Master of Science in Computer Engineering</li>
                                        <li>Master of Science in Communication Networks Engineering</li>
								
									</p>
								</div>
							</div>

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