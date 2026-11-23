@extends('components.admin-layout')
@section('main-admin-content')
    <main class="content">

        @include('admin.partials.alerts')

        <div class="container-fluid p-0">
            <h1 class="h3 mb-3"><a href="{{ route('fee_structure') }}">Fee Structure</a> / Edit program fee</h1>

            <div class="row">
                <div class="col-12 col-xl-8">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">{{ $item->program }}</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('fees.items.update', $item) }}" method="POST">
                                @csrf
                                @method('PUT')
                                @include('admin.partials.fee_item_fields')
                                <div class="text-center">
                                    <a href="{{ route('fee_structure') }}" class="btn btn-light">Cancel</a>
                                    <button class="btn btn-success">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
