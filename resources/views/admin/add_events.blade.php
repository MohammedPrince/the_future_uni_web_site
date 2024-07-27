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
                            <h5 class="card-title mb-0">Add Website Events</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-lg-12">

                                    <div class="card">

                                        <form action="add_event" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="card-header">
                                                <h5 class="card-title mb-0">Title</h5>
                                            </div>

                                            <div class="card-body col-6 col-lg-6">
                                                <input type="text" value="{{ old('event_title') }}" name="event_title"
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
                                                <textarea name="event_desc" class="form-control " id="markdown-editor" 
                                                    placeholder="Enter Event Description" rows="3">{{ old('event_desc') }}</textarea>
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
                                                    value="{{ old('event_time') }}" name="event_time"
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
                                                    value="{{ old('event_date') }}" name="event_date"
                                                    class="form-control" placeholder="Select Event Date">
                                                @error('event_date')
                                                    <div class="alert error text-center">
                                                        <p class="inner">{{ $message }}</p>
                                                    </div>
                                                @enderror
                                            </div>


                                            <div class="card-header">
                                                <h5 class="card-title mb-0">Image</h5>
                                            </div>
                                            <div class="card-body col-6 col-lg-6">
                                                <input type="file" name="event_imgs[]" multiple  class="form-control" placeholder="Select Event Images">
                                                @error('event_imgs')
                                                    <div class="alert error text-center">
                                                        <p class="inner">{{ $message }}</p>
                                                    </div>
                                                @enderror
                                            </div>
                                           
                                            <div class="text-center">

                                                <button class="btn btn btn-success">Add Event</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if ($events != false)
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">View Website Events</h5>
                            </div>
                            <div class="card-body">

                                <table id="datatables-buttons" class="table table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Time</th>
                                            <th>Date</th>
                                            <th>Faculty</th>
                                            <th>By</th>
                                            <th>Current Status</th>
                                            <th>Status</th>
                                            <th>Edit</th>
                                            <th>DEL</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($events as $event)
                                            <tr>
                                                <td>{{ $event->event_title  }}</td>
                            
                                                <td>{{ $event->event_time }}</td>
                                                <td>{{ $event->event_date }}</td>
                                                <td>{{ $dept_name }}</td>

                                                
                                                <td>{{ $event_by}}</td>
                                                <td> 

                                                    @if ($event->event_status == '0')
                                                    Not Published
                                                    @endif
                                                    @if ($event->event_status == '1')
                                                    Published
                                                    @endif

                                                </td>
                                                <td>
                                                   @if ($event->event_status == '0')
                                                   <a href="add_event/{{$event->id}}/status/1" class="btn btn-primary">Published</a>    
                                                   @endif
                                                   @if ($event->event_status == '1')
                                                   <a href="add_event/{{$event->id}}/status/0" class="btn btn-danger">Not</a>   
                                                   @endif

                                                </td>
                                            
                                                <td><a href="{{route('edit_event',$event->id,'edit')}}" class="btn btn btn-info">Edit</a></td>
                                                <!-- {{-- old - edit_event/{{$event->id}}/edit --}} -->
                                                <td><a href="add_event/{{$event->id}}/delete" class="btn btn btn-danger" onClick="return confirm('Are You Sure You Want to Delete this event ?')">Delete</a></td>
                                            </tr>
                                            @endforeach

                                    </tbody>

                                </table>

                            </div>
                        </div>
                    </div>
                </div>
                @endif

        </div>

    </main>

@endsection
