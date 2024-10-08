@extends('components.client-layout')
@section('main-client-content')

    <div class="site-breadcrumb">
        <div class="container">
            <a href="{{ route('Home') }}"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-right"></i>
            <span style="color: #fb8b24;">News & Events</span>
        </div>
    </div>


    <section class="blog-page-section spad pt-0">

        <div class="container">

            <div class="row">

                <div class="col-lg-8 post-list">



                    @if ($news_value)
                        <hr class="new4">
                      

                        @foreach ($news as $newz)
                            <div class="post-item">
                                @foreach (array_slice(explode(',', $newz->news_imgs), 0, 1) as $image)
                                    <div class="post-thumb set-bg"
                                        data-setbg="public/storage/news_imgs/{{ $image }}"></div>
                                @endforeach
                                <div class="post-content">
                                    <!-- <h3><a href="News-Details/{{ $newz->id }}">{{ $newz->news_title }}</a></h3> -->
                                    <h3><a
                                            href="{{ route('newsDetails', base64_encode($newz->id)) }}">{{ $newz->news_title }}</a>
                                    </h3>


                                    <div class="post-meta">
                                        <span><i class="fa fa-calendar-o"></i> {{ $newz->news_date }}</span>
                                        <span><i class="fa fa-home"></i> The Future University</span>
                                    </div>

                                    <p>
										{{ Str::words($newz->news_desc, 50, '...') }}<a
											style="color: #ef7e22"
											href="{{ route('newsDetails', base64_encode($newz->id)) }}">Read
											More</a>
									</p>
                                </div>
                            </div>
                        @endforeach


                        <div class="site-pageination">
                            {{ $news->links() }}
                        </div>
                    @endif


                    {{-- @if ($event_value)
                        <h5>Fu Events</h5>
                        <p></p>

                        @foreach ($events as $event)
                            <div class="post-item">

                                @foreach (array_slice(explode(',', $event->event_imgs), 0, 1) as $image)
                                    <!-- <div class="post-thumb set-bg" data-setbg="public/storage/event_imgs/{{ $image }}"></div> -->
                                    <div class="post-thumb set-bg"
                                        data-setbg="{{ asset('./public/storage/event_imgs/' . $image) }}"></div>

                                    <!-- {{ asset('./public/storage/event_imgs/' . $image) }} -->
                                @endforeach

                                <div class="post-content">
                                    <h3><a
                                            href="{{ route('eventDetails', base64_encode($event->id)) }}">{{ $event->event_title }}</a>
                                    </h3>

                                    <div class="post-meta">
                                        <span style="color:black"><i class="fa fa-calendar-o"></i>
                                            {{ $event->event_date }}</span>
                                        <span style="color:black"><i class="fa fa-home"></i> The Future University</span>
                                    </div>

                                    <p style="font-size:17px;">
                                        {{ Str::words($event->event_desc, 3, '...') }}
                                        <!-- <span><a href="Event-Details/{{ $event->id }}" style="color:#d1291f; font-size:16px;" >Read More</a></span> -->
                                        <span><a href="{{ route('eventDetails', base64_encode($event->id)) }}"
                                                style="color:#d1291f; font-size:16px;">Read More</a></span>

                                    </p>

                                </div>
                            </div>
                        @endforeach

                        <div class="site-pageination">
                            {{ $events->links() }}
                        </div>
                    @endif --}}

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

                    @include('components.client-sub-menu')

                </div>
            </div>
        </div>
    </section>



@endsection
