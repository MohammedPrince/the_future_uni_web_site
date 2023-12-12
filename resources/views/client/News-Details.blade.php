@extends('components.client-layout')
@section('main-client-content')
    <div class="site-breadcrumb">
        <div class="container">
            <a href="/Home"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-right"></i>
            <span style="color: #d1291f;">News Details</span>
        </div>
    </div>


    <section class="blog-page-section spad pt-0">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="post-item post-details">

                        @foreach (array_slice(explode(',', $news->news_imgs), 0, 1) as $image)
                            <img src="/storage/news_imgs/{{ $image }}" alt="Futrue Uinversity">
                        @endforeach

                        <div class="post-content">
                            <p></p>
                            <h3><span>{{ $news->news_title }}</span></h3>
                            <div class="post-meta">
                                <span class="cusSpan" style="color: black"><i class="fa fa-calendar-o"></i>
                                    {{ $news->news_date }}</span>
                                <span class="cusSpan" style="color: black"><i class="fa fa-user"></i>
                                    {{ $news_by }}</span>
                                <span class="cusSpan" style="color: black"><i class="fa fa-home"></i> The Future
                                    University</span>
                            </div>

                            <p style="font-size: 33px;">
                            <blockquote>{!! Purifier::clean($news->news_desc) !!}</blockquote>
                            </p>


                            @if ($news->news_imgs != null && count(explode(',', $news->news_imgs)) > 1)
                                <p>
                                <h4><span> News Images </h4></span>
                                </p>

                                <div class="hero-slider owl-carousel">

                                    @foreach (explode(',', $news->news_imgs) as $news_image)
                                        <div class="hs-item set-bg" data-setbg="/storage/news_imgs/{{ $news_image }}">
                                        </div>
                                    @endforeach

                                </div>
                            @endif
                            <p></p>
                            <div class="tag" style="color: black;"><i class="fa fa-tag"></i>Office : {{ $news_office }}
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-sm-8 col-md-5 col-lg-4 col-xl-3 offset-xl-1 offset-0 pl-xl-0 sidebar">

                    <div class="widget">
                        <div class="search-widget">
                            <input type="text" id="search-input" class="form-control"
                                placeholder="Search for News and Events">
                            <button><i class="ti-search"></i></button>
                        </div>
                        <div class="text-center" id="search-results" style="margin-top: 20px;"></div>
                    </div>

                    @if ($event_value)
                        <div class="widget">
                            <h5 class="widget-title">Recent Events</h5>

                            @foreach ($events as $event_result)
                                <div class="recent-post-widget">


                                    <div class="rp-item">

                                        @foreach (array_slice(explode(',', $event_result->event_imgs), 0, 1) as $image)
                                            <div class="rp-thumb set-bg"
                                                data-setbg="/storage/event_imgs/{{ $image }}"></div>
                                        @endforeach

                                        <div class="rp-content">
                                            <h6 style="font-size: 19px"><a href="/Event-Details/{{ $event_result->id }}"
                                                    style="color:black">
                                                    {{ $event_result->event_title }}</a></h6>
                                            <p><i class="fa fa-calendar-o"></i>
                                                <strong>{{ $event_result->event_date }}</strong></p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <hr class="new4">
                        </div>
                    @endif

                    @include('components.client-sub-menu')

                </div>
            </div>
    </section>
@endsection
