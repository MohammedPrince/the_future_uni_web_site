@extends('components.admin-layout')
@section('main-admin-content')
    <main class="content">
        @include('admin.partials.alerts')

        <div class="container-fluid p-0">
            <h1 class="h3 mb-3"><a href="{{ route('testimonials.index') }}">Alumni Testimonials</a> / Edit</h1>
            <div class="card">
                <div class="card-body">
                    <img src="@img($testimonial->photo ?: 'client/img/fu_logo.png')" alt="" class="mb-3"
                        style="width:100px;height:100px;border-radius:50%;object-fit:cover">
                    <form action="{{ route('testimonials.update', $testimonial) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @include('admin.partials.testimonial_fields')
                        <div class="text-center">
                            <a href="{{ route('testimonials.index') }}" class="btn btn-light">Cancel</a>
                            <button class="btn btn-success">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
