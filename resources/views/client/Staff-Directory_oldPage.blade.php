@extends('components.client-layout')
@section('main-client-content')

    <div class="site-breadcrumb">
        <div class="container">
            <a href="{{route('Home')}}"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-right"></i>
            <span style="color: #fb8b24;">Staff Directory</span>
        </div>
    </div>

    <section class="about-section">

        <div class="container">

            <div class="post-item post-details" style="padding-top: 0px;">
                <div class="section-title">
                    <div class="post-content">

                        <div class="container">


                            <div class="hr-sect new4"><span>Directory of Expertise</span></div>

                            <p>
                            <blockquote class="text-center" style="background-color: whitesmoke;">
                                <span style="font-size: 18px;">

                                    <section class="contact-page spad pt-0">

                                        <div class="container">

                                            <div class="contact-form spad pb-0">

                                                <form class="comment-form --contact" action="Staff-Directory"
                                                    method="POST">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-lg-8">
                                                            <input type="text" name="keyword" placeholder="keyword...">
                                                        </div>

                                                        <div class="col-lg-8">

                                                            <select name="staff_dep_id" class="dropdown-select">
                                                                <option value="">Select Staff Faculty / Department
                                                                </option>
                                                                @foreach ($departments as $departments_query)
                                                                    <option value="{{ $departments_query->deprt_id }}">
                                                                        {{ $departments_query->Department_name_en }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            <br>
                                                            <div class="text-center">
                                                                <button class="site-btn">Search</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>



                                        <p style="font-size: 16px;color:black;">
                                            <!--  -->
                                        <section class="testimonial-section spad">
                                            <div class="container">
                                                <div id="Board Of Trustees">
                                                    <!-- <h3>FU Board Of Trustees</h3> -->

                                                    <div class="row">
                                                        @if (isset($search_data) && $search_data->count() > 0)
                                                            @foreach ($search_data as $search_result)
                                                                <div class="col-lg-3 col-md-3">
                                                                    <div class="single-feature">
                                                                        <div class="desc-wrap">

                                                                            @if ($search_result->cv_image == '')
                                                                                <img src="{{ asset('/storage/app/public/' . 'test57992.jpg') }}"
                                                                                    alt="Board of Trustees">
                                                                            @else
                                                                                <img src="{{ asset('/storage/app/public/staff_imgs/' . $search_result->cv_image) }}"
                                                                                    alt="Board of Trustees">
                                                                            @endif


                                                                            <p class="additional-text text-center">
                                                                                {{ $search_result->staff_position }} <br>

                                                                                <a href="{{ route('Staff-Details', Crypt::encrypt($search_result->staff_id)) }}"
                                                                                    target="_blank"
                                                                                    class="btn badge-secondary">View
                                                                                    profile</a>
                                                                                <!-- <a href="{{ route('Staff-Details', $search_result->staff_id) }}" target="_blank" class="btn badge-secondary">View profile</a> -->


                                                                            </p>
                                                                        </div>
                                                                        <div>
                                                                            <h6>{{ $search_result->staff_name }}</h6>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach

                                                    </div>


                                                </div>

                                            </div>

                                        </section>
                                    @else
                                        @endif


                                    </section>



                                </span>
                            </blockquote>
                            </p>

                            <hr class="hr-sect">


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
