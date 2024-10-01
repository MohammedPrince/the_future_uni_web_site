@extends('components.client-layout')
@section('main-client-content')
    <div class="site-breadcrumb">
        <div class="container">
            <a href="{{ route('Home') }}"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-right"></i>
            <span style="color: #fb8b24;">Innovation Research and Development Center</span>
        </div>
    </div>

    <section class="about-section">

        <div class="container">

            <div class="post-item post-details" style="padding-top: 0px;">
                <div class="section-title ">
                    <div class="post-content">

                        <div class="hr-sect new4"><span>About</span></div>

                        <p style="font-size: 16px;">
                            Our thump-print is a part of everyone’s life, we develop solutions and make dramatic change of
                            humans’ lives.
                            Because we provide excellent chances for those who are enthusiastic to learn and improve using
                            their established skills,
                            and motivate them to take on more responsibility for their own socities development and
                            advancement.<br>
                            For more infomration visit our <a href="https://irdc.fu.edu.sd" target="_blank"><strong
                                    style="color:#ef7e22">IRDC</strong></a> Website
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
                                                Offer access to e-Infrastructure resources to support pilots, prototyping,
                                                scaling-up,
                                                designing, performance verification, testing, demonstration,
                                                etc. and increase projects visibility on National / International levels.
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
                                                Providing knowledge through various learning channels in a way that
                                                transcends the limitations of time and space,
                                                as well as integrating visions and concepts to achieve excellence in
                                                scientific research.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <p>
                                <div class="hr-sect new6"><span>IRDC Team</span></div>
                                </p>

                                <div class="col-md-6 col-lg-3">
                                    <div class="member">

                                        <div class="member-pic set-bg"
                                            data-setbg="{{ asset('./public/storage/staff_imgs/IMG_7417.jpg') }}">
                                            <div class="member-social">
                                                <a href="mailto:khalidkaradh@fu.edu.sd"><i class="fa fa-envelope"></i></a>

                                            </div>
                                        </div>
                                        <h5>Se. Dr. Khalid Sheikhidris Mohamed </h5>
                                        <p> IRDC Director</p>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3">
                                    <div class="member">
                                        <div class="member-pic set-bg"
                                            data-setbg="{{ asset('./public/storage/staff_imgs/woman_user_noimage.png') }}">
                                            <div class="member-social">

                                                <a href = "mailto:mailto:sayda@fu.edu.sd"><i class="fa fa-envelope"></i></a>
                                            </div>
                                        </div>
                                        <h5>Dr. Sayda Mamoun</h5>
                                        <p>Assistant Director</p>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3">
                                    <div class="member">
                                        <div class="member-pic set-bg"
                                            data-setbg="{{ asset('./public/storage/staff_imgs/woman_user_noimage.png') }}">
                                            <div class="member-social">
                                                <a href = "mailto:mailto:muhaira.sharief@fu.edu.sd"><i
                                                        class="fa fa-envelope"></i></a>
                                            </div>
                                        </div>
                                        <h5>Ms. Muhaira Mohamed </h5>
                                        <p>Administrative Coordinator</p>
                                    </div>
                                </div>
                            </div>
                            <p>
                            <div class="hr-sect new6"><span>IRDC Labs</span></div>
                            </p>
                            <p></p>

                            <div class="row text-center">
                                <div class="col" style="background-color: rgba(170, 167, 158, 0.51);">
                                    <div class="hr-sect new6"><span>3D Printing Research Lab</span></div>
                                    <p style="color: black;">
                                        Making innovative and evolutionary futuristic architectures,
                                        technologies, and structures a reality all by using the 3d technology in our labs.
                                    </p>
                                </div>

                                <div class="col" style="background-color: rgba(204,102,51,0.53);">
                                    <div class="hr-sect new6"><span>Robotics Research Lab</span></div>
                                    <p style="color: black;">
                                        Finding reliable solutions to mechanical and automated
                                        manufacturing challenges in the era of intelligent robotism is made easy in our
                                        labs.
                                    </p>
                                </div>

                                <div class="col" style="background-color: rgba(51,153,204,0.51);">
                                    <div class="hr-sect new6"><span>IoT Research Lab</span></div>
                                    <p style="color: black;">
                                        Allowing for intelligent communication in between peripherals and inventing unique
                                        solutions
                                        using artificial intelligence is only possible in our labs.
                                    </p>
                                </div>

                                <div class="col" style="background-color: rgba(204,153,51,0.51);">
                                    <div class="hr-sect new6"><span>Artificial Intelligence Lab</span></div>
                                    <p style="color: black;">
                                        Enabling automated machine-based, smart,
                                        and fast response to incidental and forecasted challenges using artificial
                                        intelligence is made easy in our labs.
                                    </p>
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
