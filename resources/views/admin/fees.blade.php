@extends('components.admin-layout')
@section('main-admin-content')
    <main class="content">

        @include('admin.partials.alerts')

        <div class="container-fluid p-0">

            <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
                <h1 class="h3 mb-0">Fee Structure</h1>
                <a href="{{ route('Fees') }}" target="_blank" rel="noopener" class="btn btn-outline-primary">View the public page</a>
            </div>
            <p class="text-muted">
                Each table below is one table on the public Fee Structure page. Changes show on the website at once.
                Amounts are whole numbers; leave an amount empty to show "-". The text above all tables is set in
                <a href="{{ route('site_settings') }}#fees">Site Settings</a>.
            </p>

            <div class="row">
                {{-- Add a program row --}}
                <div class="col-12 col-xl-7">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Add a program fee</h5>
                        </div>
                        <div class="card-body">
                            @if ($sections->isEmpty())
                                <p class="mb-0">Add a table first (on the right), then add programs to it.</p>
                            @else
                                <form action="{{ route('fees.items.store') }}" method="POST">
                                    @csrf
                                    @include('admin.partials.fee_item_fields', ['item' => null])
                                    <div class="text-center">
                                        <button class="btn btn-success">Add Program Fee</button>
                                    </div>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Add a table --}}
                <div class="col-12 col-xl-5">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Add a table</h5>
                            <p class="text-muted mb-0">For example "Master Programs".</p>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('fees.sections.store') }}" method="POST">
                                @csrf
                                @include('admin.partials.fee_section_fields', ['section' => null])
                                <div class="text-center">
                                    <button class="btn btn-success">Add Table</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            @foreach ($sections as $section)
                <div class="card">
                    <div class="card-header d-flex flex-wrap justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title mb-0">
                                {{ $section->title }}
                                @unless ($section->is_visible)
                                    <span class="badge bg-secondary">Hidden table</span>
                                @endunless
                            </h5>
                            @if ($section->note)
                                <p class="text-muted mb-0">{{ $section->note }}</p>
                            @endif
                        </div>
                        <div class="d-flex gap-2 mt-2 mt-md-0">
                            <a href="{{ route('fees.sections.edit', $section) }}" class="btn btn-info">Edit table</a>
                            <form action="{{ route('fees.sections.destroy', $section) }}" method="POST"
                                onsubmit="return confirm(@js('Delete the table "' . $section->title . '" and all ' . $section->items->count() . ' programs in it?'))">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Delete table</button>
                            </form>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        @if ($section->items->isEmpty())
                            <p class="mb-0 text-muted">No programs yet. Add one above. Empty tables are not shown on the website.</p>
                        @else
                            <table class="table table-striped align-middle">
                                <thead>
                                    <tr>
                                        <th>Order</th>
                                        <th>Program</th>
                                        @foreach (\App\Models\FeeItem::AMOUNTS as $label)
                                            <th class="text-end">{{ $label }}</th>
                                        @endforeach
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($section->items as $item)
                                        <tr @unless ($item->is_visible) class="text-muted" @endunless>
                                            <td>{{ $item->sort_order }}</td>
                                            <td>{{ $item->program }}</td>
                                            @foreach (array_keys(\App\Models\FeeItem::AMOUNTS) as $key)
                                                <td class="text-end">{{ \App\Models\FeeItem::money($item->$key) }}</td>
                                            @endforeach
                                            <td>
                                                @if ($item->is_visible)
                                                    <span class="badge bg-success">Shown</span>
                                                @else
                                                    <span class="badge bg-secondary">Hidden</span>
                                                @endif
                                            </td>
                                            <td class="text-nowrap">
                                                <a href="{{ route('fees.items.edit', $item) }}" class="btn btn-sm btn-info">Edit</a>
                                                <form action="{{ route('fees.items.toggle', $item) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    <button class="btn btn-sm {{ $item->is_visible ? 'btn-secondary' : 'btn-primary' }}">{{ $item->is_visible ? 'Hide' : 'Show' }}</button>
                                                </form>
                                                <form action="{{ route('fees.items.destroy', $item) }}" method="POST" class="d-inline"
                                                    onsubmit="return confirm(@js('Delete ' . $item->program . ' from ' . $section->title . '?'))">
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
            @endforeach

        </div>
    </main>
@endsection
