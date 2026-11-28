{{-- Faculty / department and home page order, for news and events. Expects $item (or null). --}}
@php
    $currentFaculty = (string) old('faculty_id', $item ? $item->faculty_id : '');
    $currentOrder = old('home_order', $item ? $item->home_order : '');
@endphp

<div class="card-header">
    <h5 class="card-title mb-0">Faculty / Department</h5>
</div>
<div class="card-body col-6 col-lg-6">
    <select name="faculty_id" class="form-select" required>
        <option value="">Select Faculty / Department</option>
        @foreach (\App\Models\MainApp::FACULTIES_AND_OFFICES as $group => $options)
            <optgroup label="{{ $group }}">
                @foreach ($options as $code => $name)
                    <option value="{{ $code }}" @selected($currentFaculty === (string) $code)>{{ $name }}</option>
                @endforeach
            </optgroup>
        @endforeach
    </select>
    @error('faculty_id')
        <div class="alert error text-center">
            <p class="inner">{{ $message }}</p>
        </div>
    @enderror
</div>

<div class="card-header">
    <h5 class="card-title mb-0">Order on the home page</h5>
    <p class="text-muted mb-0">Optional. 1 shows first, then 2, 3 ... Leave empty to sort by date.</p>
</div>
<div class="card-body col-6 col-lg-6">
    <input type="number" name="home_order" min="1" max="99" value="{{ $currentOrder }}" class="form-control" placeholder="By date">
    @error('home_order')
        <div class="alert error text-center">
            <p class="inner">{{ $message }}</p>
        </div>
    @enderror
</div>
