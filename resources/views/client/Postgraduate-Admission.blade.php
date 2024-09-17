@extends('components.client-layout')
@section('main-client-content')
    <div class="site-breadcrumb">
        <div class="container">
            <a href="{{ route('Home') }}"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-right"></i>
            <span style="color: #fb8b24;">Postgraduate-Admission</span>
        </div>
    </div>


    <div class="container_newenrollprocess">

        <div class="enrollment-steps">
            <div class="step">
                <div class="step-number">1</div>
                <div class="step-content">
                    <h3>Ministry of the higher education application</h3>
                    <p style="text-align: justify;">Apply through the faculty of Postgraduate studies, Future.</p>
                </div>
            </div>
            <div class="step">
                <div class="step-number">2</div>
                <div class="step-content">
                    <h3>Admission & Registration</h3>
                    <p style="text-align: justify;">Visit the admission and registration office to complete and track the
                        admission process.</p>
                </div>
            </div>
            <div class="step">
                <div class="step-number">3</div>
                <div class="step-content">
                    <h3>Interviews</h3>
                    <p style="text-align: justify;">Meet with the Future University Registrar, deans of student affairs, and
                        your faculty dean for short interviews.</p>
                </div>
            </div>
            <div class="step">
                <div class="step-number">4</div>
                <div class="step-content">
                    <h3>Complete the Payments</h3>
                    <p style="text-align: justify;">Pay your tuition and registration fees in Faisal Islamic Bank or
                        Khartoum bank via the mobile banking applications.</p>
                </div>
            </div>

            <div class="step">
                <div class="step-number">7</div>
                <div class="step-content">
                    <h3>Student ID card</h3>
                    <p style="text-align: justify;">Obtain your student ID card form the ID card office.</p>
                </div>
            </div>
            <div class="step">
                <div class="step-number">8</div>
                <div class="step-content">
                    <h3>Welcome to the Future University</h3>
                    <p style="text-align: justify;">You are now part of our family.</p>
                </div>
            </div>
        </div>
    </div>
    </section>
@endsection
