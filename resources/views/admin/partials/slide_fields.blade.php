@php($v = fn ($k) => old($k, $slide ? $slide->$k : null))

<div class="row">
    <div class="col-12 col-lg-6 mb-3">
        <label class="form-label">Photo @if (!$slide)<span class="text-danger">*</span>@endif</label>
        <input type="file" name="image" accept="image/jpeg,image/png,image/webp" class="form-control" @if (!$slide) required @endif>
        <div class="form-text">Wide photo, at least 1000 × 500 px (best 2200 × 1467). It is resized and compressed automatically, so the page stays fast.
            @if ($slide) Leave empty to keep the current photo. @endif</div>
        @error('image') <div class="text-danger small">{{ $message }}</div> @enderror
    </div>
    <div class="col-12 col-lg-6 mb-3">
        <label class="form-label">Photo description (for blind visitors and Google)</label>
        <input type="text" name="alt" value="{{ $v('alt') }}" maxlength="200" class="form-control" placeholder="e.g. Students in the university library">
        @error('alt') <div class="text-danger small">{{ $message }}</div> @enderror
    </div>

    <div class="col-12 col-lg-4 mb-3">
        <label class="form-label">Small text above the title</label>
        <input type="text" name="subtitle" value="{{ $v('subtitle') }}" maxlength="150" class="form-control" placeholder="e.g. WHY THE FUTURE UNIVERSITY?">
        @error('subtitle') <div class="text-danger small">{{ $message }}</div> @enderror
    </div>
    <div class="col-12 col-lg-8 mb-3">
        <label class="form-label">Title <span class="text-danger">*</span></label>
        <input type="text" name="title" value="{{ $v('title') }}" maxlength="250" class="form-control" required placeholder="e.g. An investment in knowledge pays the best interest.">
        @error('title') <div class="text-danger small">{{ $message }}</div> @enderror
    </div>

    <div class="col-12 col-lg-4 mb-3">
        <label class="form-label">Button text (optional)</label>
        <input type="text" name="button_text" value="{{ $v('button_text') }}" maxlength="60" class="form-control" placeholder="e.g. Apply now">
        @error('button_text') <div class="text-danger small">{{ $message }}</div> @enderror
    </div>
    <div class="col-12 col-lg-4 mb-3">
        <label class="form-label">Button link (optional)</label>
        <input type="text" name="button_url" value="{{ $v('button_url') }}" maxlength="500" class="form-control" placeholder="https://odms.fu.edu.sd/ or /Fee-Structure">
        @error('button_url') <div class="text-danger small">{{ $message }}</div> @enderror
    </div>
    <div class="col-6 col-lg-2 mb-3">
        <label class="form-label">Order</label>
        <input type="number" name="sort_order" min="0" value="{{ $v('sort_order') }}" class="form-control" placeholder="Last">
        @error('sort_order') <div class="text-danger small">{{ $message }}</div> @enderror
    </div>
    <div class="col-6 col-lg-2 mb-3 d-flex align-items-end">
        <input type="hidden" name="is_visible" value="0">
        <label class="form-check mb-2">
            <input class="form-check-input" type="checkbox" name="is_visible" value="1"
                @checked((string) old('is_visible', $slide ? (int) $slide->is_visible : 1) === '1')>
            <span class="form-check-label">Show</span>
        </label>
    </div>
</div>
