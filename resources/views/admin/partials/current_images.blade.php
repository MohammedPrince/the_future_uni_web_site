{{--
    Thumbnails of the images saved for a news item or event.
    Uploads live in public/storage/<folder>; Media::url() gives the right public
    address (with /public/, the .webp copy when there is one, and a version).
--}}
@php($files = array_values(array_filter(array_map('trim', explode(',', (string) $images)))))

@forelse ($files as $file)
    @php($url = \App\Support\Media::url('storage/' . $folder . '/' . basename($file)))
    <a href="{{ $url }}" target="_blank" rel="noopener" class="d-inline-block me-2 mb-2">
        <img src="{{ $url }}" alt="Current image {{ $loop->iteration }}" loading="lazy"
            style="width:120px;height:120px;object-fit:cover;border:1px solid #dee2e6;border-radius:4px">
    </a>
@empty
    <p class="text-muted mb-0">No images.</p>
@endforelse
