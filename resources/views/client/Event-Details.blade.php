@extends('components.client-layout')
@section('main-client-content')
    <div class="site-breadcrumb">
        <div class="container">
            <a href="{{route('Home')}}"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-right"></i>
            <span style="color: #fb8b24;">Event Details</span>
        </div>
    </div>

  
    <section class="blog-page-section spad pt-0">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="post-item post-details">

                        @foreach (array_slice(explode(',', $event->event_imgs ), 0,1)  as $image)

					    <!-- <img src="/storage/event_imgs/{{$image}}" alt="Futrue Uinversity" > -->
					    <img src="{{ asset('./public/storage/event_imgs/' . $image) }}" alt="Futrue Uinversity" >

                        <!-- {{ asset('./public/storage/event_imgs/' . $image) }} -->

					    @endforeach
                        
                        <div class="post-content"><p></p>
                            <h3><span>{{ $event->event_title }}</span></h3>
                            <div class="post-meta">
                                <span class="cusSpan" style="color: black"><i class="fa fa-calendar-o"></i> {{ $event->event_date }}</span>
                                <span class="cusSpan" style="color: black"><i class="fa fa-user"></i> {{$event_by}}</span>
                                <span class="cusSpan" style="color: black"><i class="fa fa-home"></i> The Future University</span>
                            </div>
  
                            <p style="font-size: 33px;">
                                <blockquote>{!! Purifier::clean($event->event_desc) !!}</blockquote>
                            </p>

                            @if ($event->event_imgs != null && count(explode(',', $event->event_imgs)) > 1 ) 
                            <p>
                                <h4><span> Event Images </h4></span>
                            </p>

                            <div class="hero-slider owl-carousel">

                                @foreach (explode(',', $event->event_imgs) as $events_image)
		
                                <!-- <div class="hs-item set-bg" data-setbg="/storage/event_imgs/{{$events_image}}" ></div> -->
                                <div class="hs-item set-bg" data-setbg="{{ asset('./public/storage/event_imgs/' . $events_image) }}" ></div>

                                <!-- {{ asset('./public/storage/event_imgs/' . $events_image) }} -->

                                @endforeach

                            </div>
                                @endif
                            <p></p>
                            <div class="tag" style="color: black;"><i class="fa fa-tag"></i>Office : {{$event_office}}</div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-8 col-md-5 col-lg-4 col-xl-3 offset-xl-1 offset-0 pl-xl-0 sidebar">

                    <div class="widget">
                        <div class="search-widget">
                        <input type="text" id="search-input" class="form-control" placeholder="Search for News and Events">
                        <button><i class="ti-search"></i></button>
                        </div>
                        <div class="text-center" id="search-results" style="margin-top: 20px;"></div>
                    </div>

                    @if( $news_value ) 

                    <div class="widget">
                       <h5 class="widget-title">Recent News</h5>

                       @foreach ($news as $news_result)

                        <div class="recent-post-widget">
                            <div class="rp-item">
                                @foreach (array_slice(explode(',', $news_result->news_imgs ), 0,1)  as $image)
                                <!-- <div class="rp-thumb set-bg" data-setbg="/storage/news_imgs/{{$image}}"></div> -->
                                <div class="rp-thumb set-bg" data-setbg="{{ asset('./public/storage/news_imgs/' . $image) }}"></div>
                                <!-- {{ asset('./public/storage/news_imgs/' . $image) }} -->
                                @endforeach
                                <div class="rp-content">
                            <!-- <h6 style="font-size: 19px"><a href="/News-Details/{{ $news_result->id }}" style="color:black"> -->
                            <h6 style="font-size: 19px"><a href="{{route('newsDetails' , base64_encode($news_result->id))}}" style="color:black">

                            
                                {{ $news_result->news_title }}</a></h6>
                            <p><i class="fa fa-calendar-o"></i> <strong>{{ $news_result->news_date }}</strong></p>
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
