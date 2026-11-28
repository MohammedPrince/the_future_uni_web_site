@extends('components.admin-layout')
@section('main-admin-content')
    <main class="content">
        @include('admin.partials.alerts')

        <div class="container-fluid p-0">
            <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
                <h1 class="h3 mb-0">Alumni Testimonials</h1>
                <a href="{{ url('/') }}" target="_blank" rel="noopener" class="btn btn-outline-primary">View the home page</a>
            </div>
            <p class="text-muted">Shown one at a time in the "Alumni Testimonials" section of the home page, in the order below. If none is shown, the section is hidden.</p>

            <div class="card">
                <div class="card-header"><h5 class="card-title mb-0">Add a testimonial</h5></div>
                <div class="card-body">
                    <form action="{{ route('testimonials.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @include('admin.partials.testimonial_fields', ['testimonial' => null])
                        <div class="text-center"><button class="btn btn-success">Add Testimonial</button></div>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header"><h5 class="card-title mb-0">Testimonials</h5></div>
                <div class="card-body table-responsive">
                    @if ($testimonials->isEmpty())
                        <p class="text-muted mb-0">None yet.</p>
                    @else
                        <table class="table table-striped align-middle">
                            <thead>
                                <tr><th>Order</th><th>Photo</th><th>Name</th><th>Quote</th><th>Status</th><th>Action</th></tr>
                            </thead>
                            <tbody>
                                @foreach ($testimonials as $t)
                                    <tr @unless ($t->is_visible) class="text-muted" @endunless>
                                        <td>{{ $t->sort_order }}</td>
                                        <td><img src="@img($t->photo ?: 'client/img/fu_logo.png')" alt="" loading="lazy" style="width:56px;height:56px;border-radius:50%;object-fit:cover"></td>
                                        <td><strong>{{ $t->name }}</strong><div class="small text-muted">{{ $t->position }}</div></td>
                                        <td style="min-width:260px">{{ \Illuminate\Support\Str::limit($t->quote, 140) }}</td>
                                        <td>
                                            @if ($t->is_visible)
                                                <span class="badge bg-success">Shown</span>
                                            @else
                                                <span class="badge bg-secondary">Hidden</span>
                                            @endif
                                        </td>
                                        <td class="text-nowrap">
                                            <a href="{{ route('testimonials.edit', $t) }}" class="btn btn-sm btn-info">Edit</a>
                                            <form action="{{ route('testimonials.toggle', $t) }}" method="POST" class="d-inline">
                                                @csrf
                                                <button class="btn btn-sm {{ $t->is_visible ? 'btn-secondary' : 'btn-primary' }}">{{ $t->is_visible ? 'Hide' : 'Show' }}</button>
                                            </form>
                                            <form action="{{ route('testimonials.destroy', $t) }}" method="POST" class="d-inline"
                                                onsubmit="return confirm(@js('Delete the testimonial of ' . $t->name . '?'))">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection
