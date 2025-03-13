@extends('components.client-layout')
@section('main-client-content')

    <div class="site-breadcrumb">
        <div class="container">
            <a href="{{ route('Home') }}"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-right"></i>
            <span style="color: #fb8b24;">Staff Directory</span>
        </div>
    </div>

    <section class="about-section">
        <div class="container">
            <div class="post-item post-details" style="padding-top: 0px;">
                <div class="section-title">
                    <div class="post-content">

                        <div class="container">
                            <div style="background-color: whitesmoke;">
                                <span style="font-size: 18px;">

                                    <section class="contact-page spad pt-0">

                                        <div class="contact-form spad pb-0">
                                            <form action="Staff-Directory" method="POST">
                                                @csrf

                                                <div class="search-container">
                                                    <select name="staff_dep_id" class="search-dropdown">
                                                        <option value="">Select Staff Faculty / Department</option>
                                                        @foreach ($departments as $departments_query)
                                                            <option value="{{ $departments_query->deprt_id }}">
                                                                {{ $departments_query->Department_name_en }}</option>
                                                        @endforeach
                                                    </select>
                                                    <input type="text" name="keyword" placeholder="Search by name"
                                                        class="search-input">

                                                    <button class="search-button">Search</button>
                                                </div>

                                            </form>
                                        </div>

                                        <section class="testimonial-section spad"
                                            style="display: flex;justify-content: center; align-items: center;flex-direction: column; text-align: center;">

                                            <div class="row">
                                                @if (isset($search_data) && $search_data->count() > 0)
                                                    @foreach ($search_data as $search_result)
                                                        <div class="col-lg-3 col-md-3">
                                                            <div class="single-feature">
                                                                <div class="desc-wrap">

                                                                    @if ($search_result->cv_image == '')
                                                                        <img src="{{ asset('/storage/app/public/' . 'test57992.jpg') }}"
                                                                            alt="" >
                                                                    @else
                                                                        <img src="{{ asset('/storage/app/public/staff_imgs/' . $search_result->cv_image) }}"
                                                                            alt="">
                                                                    @endif


                                                                    <p class="additional-text text-center">
                                                                      

                                                                        <a href="{{ route('Staff-Details', base64_encode($search_result->staff_id)) }}"
                                                                            style="color: whitesmoke;"
                                                                            class="btn badge-secondary">View profile</a>

                                                                    </p>
                                                                </div>
                                                                <div>
                                                                    <h6>{{ $search_result->staff_name }}</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                            </div>
                                        </section>
                                    @else
                                        @endif
                                    </section>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
