@extends('components.client-layout')
@section('main-client-content')

<div class="site-breadcrumb">
        <div class="container">
            <a href="{{route('Home')}}"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-right"></i>
            <span style="color: #fb8b24;">Scholarships</span>
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
								The office of the admission and registration is responsible for all scholarships applications.
								The applicants must fulfill the requirements given below for the admission and registration.
							</span>
						</blockquote>
						</p>

						<div class="hr-sect new4"><span> Procedure</span></div>

						<p style="font-size: 16px;">
								<li>Application forms and required documents for the specified program should be submitted to the registrar of university.</li>
								<li>An Applicant is required to submit the names of two (2) referees who have been acquainted with the applicant.</li>
						</p>

						<hr class="new4">

						<div class="container">
							
						  </div> 
						  <p></p>
							<p></p>

							<div class="row text-center">

								<div class="col" style="background-color: rgba(255, 255, 255, 0.53);">
									<a href="{{route('Undergraduate-Programs')}}" style="color:orange">Scholarships Programs</a>
								</div>
							</div>						
					</div>
				</div>
			</div>
		</div>
	</section>



@endsection