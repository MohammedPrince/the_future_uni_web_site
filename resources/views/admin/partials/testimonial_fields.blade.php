@php($v = fn ($k) => old($k, $testimonial ? $testimonial->$k : null))

<div class="row">
    <div class="col-12 col-lg-4 mb-3">
        <label class="form-label">Name <span class="text-danger">*</span></label>
        <input type="text" name="name" value="{{ $v('name') }}" maxlength="150" class="form-control" required>
        @error('name') <div class="text-danger small">{{ $message }}</div> @enderror
    </div>
    <div class="col-12 col-lg-8 mb-3">
        <label class="form-label">Job and company</label>
        <input type="text" name="position" value="{{ $v('position') }}" maxlength="250" class="form-control" placeholder="e.g. IT Manager, On Target Consulting Dubai, UAE.">
        @error('position') <div class="text-danger small">{{ $message }}</div> @enderror
    </div>
    <div class="col-12 mb-3">
        <label class="form-label">What they say <span class="text-danger">*</span></label>
        <textarea name="quote" rows="3" maxlength="1000" class="form-control" required placeholder="Without quotation marks; they are added on the page.">{{ $v('quote') }}</textarea>
        @error('quote') <div class="text-danger small">{{ $message }}</div> @enderror
    </div>
    <div class="col-12 col-lg-6 mb-3">
        <label class="form-label">Photo</label>
        <input type="file" name="photo" accept="image/jpeg,image/png,image/webp" class="form-control">
        <div class="form-text">A face photo. It is cut to a square and made small automatically.@if ($testimonial && $testimonial->photo) Leave empty to keep the current photo.@endif</div>
        @error('photo') <div class="text-danger small">{{ $message }}</div> @enderror
        @if ($testimonial && $testimonial->photo)
            <label class="form-check mt-2">
                <input class="form-check-input" type="checkbox" name="remove_photo" value="1">
                <span class="form-check-label">Remove the photo (the university logo is shown instead)</span>
            </label>
        @endif
    </div>
    <div class="col-6 col-lg-3 mb-3">
        <label class="form-label">Order</label>
        <input type="number" name="sort_order" min="0" value="{{ $v('sort_order') }}" class="form-control" placeholder="Last">
        @error('sort_order') <div class="text-danger small">{{ $message }}</div> @enderror
    </div>
    <div class="col-6 col-lg-3 mb-3 d-flex align-items-end">
        <input type="hidden" name="is_visible" value="0">
        <label class="form-check mb-2">
            <input class="form-check-input" type="checkbox" name="is_visible" value="1"
                @checked((string) old('is_visible', $testimonial ? (int) $testimonial->is_visible : 1) === '1')>
            <span class="form-check-label">Show on the home page</span>
        </label>
    </div>
</div>
