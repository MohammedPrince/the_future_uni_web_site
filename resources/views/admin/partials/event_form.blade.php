{{-- Add event form, shown on Admin > News & Events (posts to /add_event). --}}
<form action="{{ url('add_event') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="form" value="event">
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
        <textarea name="event_desc" class="form-control " data-rich-editor 
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


    @include('admin.partials.faculty_order_fields', ['item' => null])

    @include('admin.partials.image_upload', ['name' => 'event_imgs', 'editing' => false])

    <div class="card-body">
        <input type="hidden" name="publish" value="0">
        <label class="form-check">
            <input class="form-check-input" type="checkbox" name="publish" value="1" {{ old('publish', '1') === '1' ? 'checked' : '' }}>
            <span class="form-check-label">Publish now (untick to save it hidden and publish it later)</span>
        </label>
    </div>

    <div class="text-center">

        <button class="btn btn btn-success">Add Event</button>
    </div>
</form>
