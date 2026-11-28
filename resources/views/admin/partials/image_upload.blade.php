{{--
    Image upload for news and events. Several images can be chosen at once;
    the browser shows them before saving (admin layout script, [data-image-preview]).
    Expects $name (news_imgs | event_imgs) and $editing (bool).
--}}
<div class="card-header">
    <h5 class="card-title mb-0">{{ $editing ? 'Add More Images' : 'Images' }}</h5>
    <p class="text-muted mb-0">
        You can choose several images at once (hold Ctrl, or select them on the phone), up to {{ \App\Support\PostImages::MAX }}.
        {{ $editing ? 'New images are added after the current ones.' : 'The first image is the cover.' }}
        All images show on the website and move on the home page card.
    </p>
</div>
<div class="card-body col-12 col-lg-8">
    <input type="file" name="{{ $name }}[]" multiple accept="image/jpeg,image/png,image/webp" class="form-control" data-image-preview>
    <div class="d-flex flex-wrap gap-2 mt-2" data-image-preview-list></div>
    @foreach ([$name, $name . '.*'] as $field)
        @error($field)
            <div class="alert error text-center">
                <p class="inner">{{ $message }}</p>
            </div>
        @enderror
    @endforeach
</div>
