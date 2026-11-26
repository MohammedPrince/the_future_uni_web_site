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



                    {{-- News and events together, newest first (App\Support\NewsFeed). --}}
                    @if ($items->isNotEmpty())
                        <hr class="new4">
                        @foreach ($items as $item)
                            <div class="post-item">
                                <a href="{{ $item['url'] }}" tabindex="-1" aria-hidden="true">
                                    <div class="post-thumb set-bg"
                                        style="background-image:url('@img($item['image'] ?: 'client/img/fu_logo.png')');background-position:center;{{ $item['image'] ? '' : 'background-size:contain;background-repeat:no-repeat;' }}"></div>
                                </a>
                                <div class="post-content">
                                    <h3><a href="{{ $item['url'] }}">{{ $item['title'] }}</a></h3>
                                    <div class="post-meta">
                                        <span class="ne-type">{{ $item['type'] }}</span>
                                        <span><i class="fa fa-calendar-o"></i> {{ $item['date'] }}</span>
                                        <span><i class="fa fa-home"></i> The Future University</span>
                                    </div>
                                    <p>
                                        {{ $item['excerpt'] }}<a style="color: #ef7e22" href="{{ $item['url'] }}">Read More <span
                                                class="visually-hidden">about {{ $item['title'] }}</span></a>
                                    </p>
                                </div>
                            </div>
                        @endforeach
                        <div class="site-pageination">
                            {{ $items->links() }}
                        </div>
                    @else
                        <p class="text-muted">No news or events yet.</p>
                    @endif

                </div>

                <div class="col-sm-8 col-md-5 col-lg-4 col-xl-3 offset-xl-1 offset-0 pl-xl-0 sidebar">

                    <div class="widget">
                        <div class="search-widget">
                            <input type="text" id="search-input" class="form-control"
                                placeholder="Search for News and Events">
                            <button type="button" aria-label="Search"><i class="ti-search" aria-hidden="true"></i></button>
                        </div>
                        <div class="text-center" id="search-results" style="margin-top: 20px;"></div>
                    </div>

                    @include('components.client-sub-menu')

                </div>
            </div>
        </div>
    </section>



@endsection
