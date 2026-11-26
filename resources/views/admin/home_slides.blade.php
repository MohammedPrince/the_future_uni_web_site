@extends('components.admin-layout')
@section('main-admin-content')
    <main class="content">
        @include('admin.partials.alerts')

        <div class="container-fluid p-0">
            <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
                <h1 class="h3 mb-0">Home Slider</h1>
                <a href="{{ url('/') }}" target="_blank" rel="noopener" class="btn btn-outline-primary">View the home page</a>
            </div>
            <p class="text-muted">The big pictures at the top of the home page. They change every 5 seconds, in the order below (lowest number first).
                The first slide loads at once; the others load only when they are shown, so the page stays fast.</p>

            <div class="card">
                <div class="card-header"><h5 class="card-title mb-0">Add a slide</h5></div>
                <div class="card-body">
                    <form action="{{ route('slides.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @include('admin.partials.slide_fields', ['slide' => null])
                        <div class="text-center"><button class="btn btn-success">Add Slide</button></div>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header"><h5 class="card-title mb-0">Slides</h5></div>
                <div class="card-body table-responsive">
                    <table class="table table-striped align-middle">
                        <thead>
                            <tr><th>Order</th><th>Photo</th><th>Text</th><th>Button</th><th>Status</th><th>Action</th></tr>
                        </thead>
                        <tbody>
                            @foreach ($slides as $slide)
                                <tr @unless ($slide->is_visible) class="text-muted" @endunless>
                                    <td>{{ $slide->sort_order }}</td>
                                    <td><img src="{{ $slide->url($slide->widthList()[0]) }}" alt="" loading="lazy"
                                            style="width:180px;aspect-ratio:3/2;object-fit:cover;border-radius:6px"></td>
                                    <td>
                                        @if ($slide->subtitle)<div class="small text-uppercase text-warning">{{ $slide->subtitle }}</div>@endif
                                        <strong>{{ $slide->title }}</strong>
                                    </td>
                                    <td>{{ $slide->button_text ?: '-' }}</td>
                                    <td>
                                        @if ($slide->is_visible)
                                            <span class="badge bg-success">Shown</span>
                                        @else
                                            <span class="badge bg-secondary">Hidden</span>
                                        @endif
                                    </td>
                                    <td class="text-nowrap">
                                        <a href="{{ route('slides.edit', $slide) }}" class="btn btn-sm btn-info">Edit</a>
                                        <form action="{{ route('slides.toggle', $slide) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button class="btn btn-sm {{ $slide->is_visible ? 'btn-secondary' : 'btn-primary' }}">{{ $slide->is_visible ? 'Hide' : 'Show' }}</button>
                                        </form>
                                        <form action="{{ route('slides.destroy', $slide) }}" method="POST" class="d-inline"
                                            onsubmit="return confirm(@js('Delete the slide "' . $slide->title . '"?'))">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
