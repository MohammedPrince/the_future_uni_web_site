@extends('components.admin-layout')
@section('main-admin-content')
    <main class="content">
        @include('admin.partials.alerts')

        <div class="container-fluid p-0">
            <h1 class="h3 mb-3"><a href="{{ route('slides.index') }}">Home Slider</a> / Edit slide</h1>
            <div class="card">
                <div class="card-body">
                    <img src="{{ $slide->src() }}" alt="" style="width:100%;max-width:520px;aspect-ratio:3/2;object-fit:cover;border-radius:8px" class="mb-3">
                    <form action="{{ route('slides.update', $slide) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @include('admin.partials.slide_fields')
                        <div class="text-center">
                            <a href="{{ route('slides.index') }}" class="btn btn-light">Cancel</a>
                            <button class="btn btn-success">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
