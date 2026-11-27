{{-- Add news form, shown on Admin > News & Events (posts to /add_news). --}}
<form action="{{ url('add_news') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="form" value="news">
    <div class="card-header">
        <h5 class="card-title mb-0">Title</h5>
    </div>

    <div class="card-body col-6 col-lg-6">
        <input type="text" value="{{ old('news_title') }}" name="news_title"
            class="form-control" placeholder="Enter News Title">

        @error('news_title')
            <div class="alert error text-center">
                <p class="inner">{{ $message }}</p>
            </div>
        @enderror

    </div>

    <div class="card-header">
        <h5 class="card-title mb-0">Description</h5>
    </div>
    <div class="card-body col-12 col-lg-12">
        <textarea name="news_desc" class="form-control " data-rich-editor 
            placeholder="Enter News Description" rows="3">{{ old('news_desc') }}</textarea>
        @error('news_desc')
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
            value="{{ old('news_date') }}" name="news_date"
            class="form-control" placeholder="Select Event Date">
        @error('news_date')
            <div class="alert error text-center">
                <p class="inner">{{ $message }}</p>
            </div>
        @enderror
    </div>


    @include('admin.partials.faculty_order_fields', ['item' => null])

    @include('admin.partials.image_upload', ['name' => 'news_imgs', 'editing' => false])

    <div class="card-body">
        <input type="hidden" name="publish" value="0">
        <label class="form-check">
            <input class="form-check-input" type="checkbox" name="publish" value="1" {{ old('publish', '1') === '1' ? 'checked' : '' }}>
            <span class="form-check-label">Publish now (untick to save it hidden and publish it later)</span>
        </label>
    </div>

    <div class="text-center">

        <button class="btn btn btn-success">Add News</button>
    </div>
</form>
