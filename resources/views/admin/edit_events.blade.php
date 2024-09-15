@extends('components.admin-layout')
@section('main-admin-content')


    <main class="content">

        <center>
            @if (session()->has('success'))
                <div class="alert success text-center">

                    <p class="inner">
                        {{ session()->get('success') }}
                    </p>
                </div>
            @endif

            @if (session()->has('failure'))
                <div class="alert error text-center">

                    <p class="inner">
                        {{ session()->get('failure') }}
                    </p>
                </div>
            @endif
        </center>

        <div class="container-fluid p-0">

            <h1 class="h3 mb-3">Manage WebSite Events</h1>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Edit Website Events</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-lg-12">

                                    <div class="card">

                                        <!-- <form action="edit_event/{{ $event->id }}" method="POST" enctype="multipart/form-data"> -->
                                        <form action="{{route('eventsubmit',$event->id)}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="card-header">
                                                <h5 class="card-title mb-0">Title</h5>
                                            </div>

                                            <div class="card-body col-6 col-lg-6">
                                                <input type="text" value="{{ old('event_title',$event->event_title) }}" name="event_title"
                                                    class="form-control" placeholder="Enter Event Title">

                                                @error('event_title')
                                                    <div class="alert error text-center">
                                                        <p class="inner">{{ $message }}</p>
                                                    </div>
                                                @enderror

                                            </div>

                                            <div class="card-header">
                                                <h5 class="card-title mb-0">Description</h5>
                                            </div>
                                            <div class="card-body col-12 col-lg-12">
                                                <textarea name="event_desc" class="form-control" id="markdown-editor"
                                                    placeholder="Enter Event Description">{{ old('event_desc',$event->event_desc) }}</textarea>
                                                @error('event_desc')
                                                    <div class="alert error text-center">
                                                        <p class="inner">{{ $message }}</p>
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="card-header">
                                                <h5 class="card-title mb-0">Time</h5>
                                            </div>
                                            <div class="card-body col-6 col-lg-6">
                                                <input type="time" 
                                                    value="{{ old('event_time',$event->event_time) }}" name="event_time"
                                                    class="form-control" placeholder="Select Event Time">
                                                @error('event_time')
                                                    <div class="alert error text-center">
                                                        <p class="inner">{{ $message }}</p>
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="card-header">
                                                <h5 class="card-title mb-0">Date</h5>
                                            </div>
                                            <div class="card-body col-6 col-lg-6">
                                                <input type="date" 
                                                    value="{{ old('event_date',$event->event_date) }}" name="event_date"
                                                    class="form-control" placeholder="Select Event Date">
                                                @error('event_date')
                                                    <div class="alert error text-center">
                                                        <p class="inner">{{ $message }}</p>
                                                    </div>
                                                @enderror
                                            </div>

                                            <input type="hidden" value="{{ $event->event_imgs }}" name="event_imgs_old">

                                            <!-- <div class="card-header">
                                                <h5 class="card-title mb-0">Current Images</h5>
                                            </div> -->
                                        <!-- <div class="card-body col-6 col-lg-6">

                                           {{-- @foreach (explode(',', $event->event_imgs) as $image)
                                            <a  href="/storage/event_imgs/{{$image}}" target="_blank">
                                            <img src="/storage/event_imgs/{{$image}}" style="width:100px;height:100px">
                                            </a>
                                            @endforeach --}}
                                           
                                        </div> -->

                                            <div class="card-header">
                                                <h5 class="card-title mb-0">Upload New Images</h5>
                                            </div>
                                            <div class="card-body col-6 col-lg-6">
                                            {{ $event->event_imgs }}
                                                <input type="file" name="event_imgs[]" multiple  class="form-control" placeholder="Select Event Images">
                                                @error('event_imgs')
                                                    <div class="alert error text-center">
                                                        <p class="inner">{{ $message }}</p>
                                                    </div>
                                                @enderror
                                            </div>
                                            
                                           
                                            <div class="text-center">

                                                <button class="btn btn btn-success">Edit Event</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
