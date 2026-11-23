@extends('components.client-layout')
@section('main-client-content')
    <div class="site-breadcrumb">
        <div class="container">
            <a href="{{ route('Home') }}"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-right"></i>
            <span style="color: #fb8b24;">Fee Structure</span>
        </div>
    </div>

    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #DDD;
        }

        tr:hover {
            background-color: #D6EEEE;
        }
    </style>

    {{-- Tables and amounts are managed in Admin > Fee Structure. --}}
    <section class="service-section spad">
        <div class="container services">
            @if (!empty($note))
                <p class="text-center" style="margin-bottom: 30px;">{{ $note }}</p>
            @endif

            @forelse ($sections as $section)
                @if (!$loop->first)
                    <section class="service-section spad">
                        <div class="container services">
                @endif

                <div class="section-title text-center">
                    <h3>{{ $section->title }}</h3>
                    @if ($section->note)
                        <p>{{ $section->note }}</p>
                    @endif
                </div>

                <div class="table-container">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>Program</th>
                            @foreach (\App\Models\FeeItem::AMOUNTS as $label)
                                <th>{{ $label }}</th>
                            @endforeach
                        </tr>
                        @foreach ($section->items as $item)
                            <tr>
                                <td>{{ $item->program }}</td>
                                @foreach (array_keys(\App\Models\FeeItem::AMOUNTS) as $key)
                                    <td>{{ \App\Models\FeeItem::money($item->$key) }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </table>
                </div>

                @if (!$loop->first)
                        </div>
                    </section>
                @endif
            @empty
                <div class="section-title text-center">
                    <h3>Fee Structure</h3>
                    <p>The fees will be published here soon. Please contact the Admission Office for details.</p>
                </div>
            @endforelse
        </div>
    </section>
@endsection
