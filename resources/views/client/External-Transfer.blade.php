@extends('components.client-layout')
@section('main-client-content')
    <div class="site-breadcrumb">
        <div class="container">
            <a href="{{ route('Home') }}"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-right"></i>
            <span style="color: #fb8b24;">Transfer and Bridging</span>
        </div>
    </div>

    <p></p>



    <div class="container_newenrollprocess">

        <div class="enrollment-steps">
            <div class="step">
                <div class="step-number">1</div>
                <div class="step-content">
                    <h3>Fill Up the external transfer form </h3>
                    <p style="text-align: justify;">Apply through our helpdesk <strong><a href="https://hdesk.fu.edu.sd/"
                                style="color:orange;" target="_blank">form</a></strong></p>
                </div>
            </div>
            <div class="step">
                <div class="step-number">2</div>
                <div class="step-content">
                    <h3>Admission & Registration</h3>
                    <p style="text-align: justify;">Admission and registration to confirm the eligibility.</p>
                </div>
            </div>
            <div class="step">
                <div class="step-number">3</div>
                <div class="step-content">
                    <h3>Faculty</h3>
                    <p style="text-align: justify;">Evaluate the transcript and identify the credit transfer subjects.</p>
                </div>
            </div>
            <div class="step">
                <div class="step-number">4</div>
                <div class="step-content">
                    <h3>Finance Unit and Fees Payment</h3>
                    <p style="text-align: justify;">Complete the payment process through the acceptable means.</p>
                </div>
            </div>
            <div class="step">
                <div class="step-number">5</div>
                <div class="step-content">
                    <h3>Admission and registration</h3>
                    <p style="text-align: justify;">Obtain your new Ministry and university index number.</p>
                </div>
            </div>
            <div class="step">
                <div class="step-number">6</div>
                <div class="step-content">
                    <h3>E-Learning Profile</h3>
                    <p style="text-align: justify;">The technical services will create your e-learning profile. </p>
                </div>
            </div>
            <div class="step">
                <div class="step-number">7</div>
                <div class="step-content">
                    <h5>Student ID and Profile</h5>
                    <p style="text-align: justify;">Obtain your student ID info through tracking your application form the
                        helpdesk <a href="https://hdesk.fu.edu.sd/" style="color:orange" target="_blank">form</a></strong>
                    </p>
                </div>
            </div>
            <div class="step">
                <div class="step-number">8</div>
                <div class="step-content">
                    <h5>Welcome to the Future University</h5>
                    <p style="text-align: justify;">You are now part of our family.</p>
                </div>
            </div>
        </div>

    </div>

@endsection
