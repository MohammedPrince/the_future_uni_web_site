
    <div class="container mt-4">
        <hr class="new4">
        <ul id="search-results" >

            {{-- Get News--}}
            @if($news_value)
            @foreach($news as $news)
            <div class="rp-content" style="margin-top: 10px">
                <h6 style="font-size: 19px"><a href="/News-Details/{{ ($news->id) }}">
                    {{ $news->news_title }}</a></h6>
                    <hr class="new4">
                    </div>
            @endforeach
            @endif
            {{-- Get Events--}}
            @if($event_value)
            @foreach($events as $events)
            <div class="rp-content" style="margin-top: 10px">
                <h6 style="font-size: 19px"><a href="/Event-Details/{{ base64_encode($events->id) }}">
                    {{ $events->event_title }}</a></h6>
                    <hr class="new4">
                    </div>
            @endforeach
            @endif

        </ul>
    </div>

   
