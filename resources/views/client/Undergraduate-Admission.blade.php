@extends('components.client-layout')
@section('main-client-content')

    <div class="site-breadcrumb">
        <div class="container">
            <a href="/Home"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-right"></i>
            <span style="color: #d1291f;">Undergraduate Admission</span>
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
								The Administration of Admission and Registration is in charge of admission and registration for all students of 
								Future University.
							</span>
						</blockquote>
						</p>

						<div class="hr-sect new4"><span>Admission</span></div>

						<p style="font-size: 16px;">
							The General Administration for Admission and Registration is a part of the Academic Affairs. 
							It is specialized in the admission of the university and is considered one of the fundamental pillars pertaining to auxiliary academic services. 
							To the newcomers its's the gateway to university and academic life playing a vital role in assisting the students throughout their study period with regards to procedures related to the Ministry of Higher Education and Scientific Research up to graduation. 
							The Administration carried it's duties in a modern up to date fashion consistent with the Ministry of Higher Education's electronic admission system, and facilitating student admission procedures.
						</p>

						<hr class="new4">

						<div class="container">
							<div class="feature">
								
									<div class="circle" style="width: 250px; height: 250px; ">
										<img src="/client/img/main_imgs/members/Ust.-Kawther-Abuelnaja.jpg" alt="Kawther-Abuelnaja" >
									</div>
								  <span>
									<p class="image-text"><strong>Ust. Kawther Majzoub Abu-Elnaja </strong></p>
								  	<p class="image-text">Future Univestiy Registrar</p>
								</span>
								
							</div>	

							<div class="row text-center">
								<div class="col" style="background-color: rgba(170, 167, 158, 0.51);">
									<div class="hr-sect new6"><span>ADMISSION SECTION</span></div>
									<p style="color: black;">
										This section is responsible for student admissions. It also coordinates between the Future University and the Ministry of
										Higher Education and Scientific Research. The office is also responsible for the preparation of the database of new
										students following digital registration.
									</p>
								</div>
								<div class="col" style="background-color: rgba(204,102,51,0.53);">
									<div class="hr-sect new6"><span>STATISTICS SECTION</span></div>
									<p style="color: black;">
										This section is responsible for preparing statistical data and keeping records of all of the students in the university as well as
										the relevant statistical data about graduates.
									</p>
								</div>
								<div class="col" style="background-color: rgba(51,153,204,0.51);">
									<div class="hr-sect new6"><span>CERTIFICATE SECTION</span></div>
									<p style="color: black;">
										The transcripts and certification section is responsible for preparation and issuing certificates of graduates and diploma holders.
									</p>
								</div>
								<div class="col" style="background-color: rgba(204,153,51,0.51);">
									<div class="hr-sect new6"><span>REGISTRATION SECTION</span></div>
									<p style="color: black;">
										This section is responsible for student admissions. It also coordinates between the Future University and the Ministry of
										Higher Education and Scientific Research. The office is also responsible for the preparation of the database of new
										students following digital registration.
									</p>
								</div>
							</div>
							
						  </div>

						<p><hr class="new4"></p>
						<p></p>

						<div class="container">

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

								<div class="col" style="background-color: rgba(204,102,51,0.53);">
									<a href="/Undergraduate-Programs"><button class="modal-button" >All Programs</button></a>
								</div>
								
							</div>

							<div id="myModal" class="modal">
								<div class="modal-content">
								  <span class="close" onclick="closeModal()">&times;</span>
								  <h2 id="modalTitle" class="text-center">Modal Title</h2>
								  <p id="modalContent" class="text-center">Modal content goes here...</p>
								</div>
							</div>

						</div>
						
					</div>
				</div>
			</div>
		</div>
	</section>

@endsection