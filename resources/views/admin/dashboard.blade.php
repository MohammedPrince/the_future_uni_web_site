@extends('components.admin-layout')
@section('main-admin-content')
    <main class="content">

        @include('admin.partials.alerts')

        <div class="container-fluid p-0">
            <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
                <h1 class="h3 mb-0">Dashboard</h1>
                <a href="{{ url('/') }}" target="_blank" rel="noopener" class="btn btn-outline-primary">Open the website</a>
            </div>

            {{-- Website status --}}
            <div class="card {{ $maintenance ? 'border border-danger' : '' }}">
                <div class="card-body d-flex flex-wrap justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title mb-1">Website status</h5>
                        @if ($maintenance)
                            <span class="badge bg-danger">Maintenance mode is ON: visitors see the "back soon" page</span>
                        @else
                            <span class="badge bg-success">Open to visitors</span>
                        @endif
                        @if ($announcement)
                            <p class="mb-0 mt-2 text-muted">Announcement shown: "{{ \Illuminate\Support\Str::limit($announcement, 90) }}"</p>
                        @endif
                    </div>
                    <a href="{{ route('site_settings') }}#maintenance" class="btn {{ $maintenance ? 'btn-success' : 'btn-outline-secondary' }} mt-2 mt-md-0">
                        {{ $maintenance ? 'Open the website' : 'Maintenance and settings' }}
                    </a>
                </div>
            </div>

            {{-- Counts --}}
            <div class="row">
                @foreach ([
                    ['News published', $stats['news'], $stats['news_hidden'] ? $stats['news_hidden'] . ' hidden' : null, route('add_news')],
                    ['Events published', $stats['events'], $stats['events_hidden'] ? $stats['events_hidden'] . ' hidden' : null, route('add_event')],
                    ['Programs with fees', $stats['fees'], null, route('fee_structure')],
                    ['Admin users', $stats['users'], null, url('add_user')],
                    ['Visitors', number_format($stats['visitors']), null, null],
                ] as [$label, $number, $extra, $link])
                    <div class="col-6 col-md-4 col-xl">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-muted mb-2">{{ $label }}</h5>
                                <h2 class="mb-1">{{ $number }}</h2>
                                @if ($extra)
                                    <span class="text-muted small">{{ $extra }}</span>
                                @endif
                                @if ($link)
                                    <a href="{{ $link }}" class="stretched-link" aria-label="Manage {{ strtolower($label) }}"></a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Quick actions --}}
            <div class="card">
                <div class="card-body d-flex flex-wrap gap-2">
                    <a href="{{ route('add_news') }}" class="btn btn-primary">Add news</a>
                    <a href="{{ route('add_event') }}" class="btn btn-primary">Add event</a>
                    <a href="{{ route('fee_structure') }}" class="btn btn-primary">Edit fees</a>
                    <a href="{{ route('site_settings') }}#announcement" class="btn btn-outline-primary">Announcement bar</a>
                    <a href="{{ route('site_settings') }}#contact" class="btn btn-outline-primary">Contact details</a>
                    <a href="{{ route('tools.index') }}" class="btn btn-outline-secondary">Server tools</a>
                </div>
            </div>

            {{-- Latest items --}}
            <div class="row">
                @foreach ([
                    ['Latest news', $latestNews, 'news', route('add_news')],
                    ['Latest events', $latestEvents, 'event', route('add_event')],
                ] as [$title, $items, $prefix, $manage])
                    <div class="col-12 col-xl-6">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h5 class="card-title mb-0">{{ $title }}</h5>
                                <a href="{{ $manage }}">Manage</a>
                            </div>
                            <div class="card-body">
                                @if ($items->isEmpty())
                                    <p class="text-muted mb-0">Nothing yet.</p>
                                @else
                                    <table class="table table-sm mb-0">
                                        @foreach ($items as $row)
                                            <tr>
                                                <td>{{ \Illuminate\Support\Str::limit($row->{$prefix . '_title'}, 60) }}</td>
                                                <td class="text-nowrap">{{ $row->{$prefix . '_date'} }}</td>
                                                <td>
                                                    @if ((int) $row->{$prefix . '_status'} === 1)
                                                        <span class="badge bg-success">Published</span>
                                                    @else
                                                        <span class="badge bg-secondary">Hidden</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
@endsection
