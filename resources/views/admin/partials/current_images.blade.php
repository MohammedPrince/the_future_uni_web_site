{{--
    Thumbnails of the images saved for a news item or event.
    Uploads live in public/storage/<folder>; Media::url() gives the right public
    address (with /public/, the .webp copy when there is one, and a version).
    With $removeName set, every image gets a "Remove" tick box.
--}}
@php
    $files = \App\Support\PostImages::list($images);
    $removeName = $removeName ?? null;
@endphp

<div class="d-flex flex-wrap gap-3">
    @forelse ($files as $file)
        @php
            $url = \App\Support\Media::url('storage/' . $folder . '/' . $file);
        @endphp
        <div class="text-center" style="width:130px">
            <a href="{{ $url }}" target="_blank" rel="noopener" class="d-block">
                <img src="{{ $url }}" alt="Current image {{ $loop->iteration }}" loading="lazy"
                    style="width:130px;height:110px;object-fit:cover;border:1px solid #dee2e6;border-radius:6px">
            </a>
            <small class="d-block text-muted">{{ $loop->first ? 'Cover' : 'Image ' . $loop->iteration }}</small>
            @if ($removeName)
                <label class="form-check d-inline-flex gap-1 mb-0 small">
                    <input class="form-check-input" type="checkbox" name="{{ $removeName }}[]" value="{{ $file }}"
                        @checked(in_array($file, (array) old($removeName, []), true))>
                    <span class="form-check-label text-danger">Remove</span>
                </label>
            @endif
        </div>
    @empty
        <p class="text-muted mb-0">No images.</p>
    @endforelse
</div>
@if ($removeName)
    @error($removeName)
        <div class="alert error text-center mt-2">
            <p class="inner">{{ $message }}</p>
        </div>
    @enderror
@endif
