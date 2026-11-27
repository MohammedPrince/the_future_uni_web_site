@extends('components.admin-layout')
@section('main-admin-content')
    <main class="content">
        @include('admin.partials.alerts')

        <div class="container-fluid p-0">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
                <h1 class="h3 mb-0">News &amp; Events</h1>
                <div class="text-muted">
                    {{ $counts['news'] }} news &middot; {{ $counts['events'] }} events
                    @if ($counts['hidden'])
                        &middot; <span class="text-secondary">{{ $counts['hidden'] }} hidden</span>
                    @endif
                </div>
            </div>

            {{-- Add: one form at a time --}}
            <div class="card">
                <div class="card-header pb-0">
                    <ul class="nav nav-tabs card-header-tabs" role="tablist">
                        <li class="nav-item">
                            <button type="button" class="nav-link {{ $tab === 'news' ? 'active' : '' }}" data-ne-tab="news"
                                aria-selected="{{ $tab === 'news' ? 'true' : 'false' }}">+ Add News</button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="nav-link {{ $tab === 'event' ? 'active' : '' }}" data-ne-tab="event"
                                aria-selected="{{ $tab === 'event' ? 'true' : 'false' }}">+ Add Event</button>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div data-ne-panel="news" @if ($tab !== 'news') hidden @endif>
                        @include('admin.partials.news_form')
                    </div>
                    <div data-ne-panel="event" @if ($tab !== 'event') hidden @endif>
                        @include('admin.partials.event_form')
                    </div>
                </div>
            </div>

            {{-- Everything in one list --}}
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">All News &amp; Events</h5>
                    <p class="text-muted mb-0">Newest first. Hidden items stay here but are not shown on the website. Press Publish to show them.</p>
                </div>
                <div class="card-body">
                    @if ($items->isEmpty())
                        <p class="text-muted mb-0">Nothing added yet.</p>
                    @else
                        <table id="datatables-buttons" class="table table-striped align-middle" style="width:100%" data-order="[]">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Type</th>
                                    <th>Title</th>
                                    <th>Date</th>
                                    <th>Faculty</th>
                                    <th>Home Order</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                    <tr>
                                        <td>
                                            @if ($item['images'])
                                                <img src="{{ \App\Support\Media::url('storage/' . $item['folder'] . '/' . $item['images'][0]) }}" alt=""
                                                    loading="lazy" style="width:64px;height:48px;object-fit:cover;border-radius:4px">
                                                @if (count($item['images']) > 1)
                                                    <small class="d-block text-muted">{{ count($item['images']) }} images</small>
                                                @endif
                                            @endif
                                        </td>
                                        <td><span class="badge {{ $item['type'] === 'News' ? 'bg-primary' : 'bg-warning text-dark' }}">{{ $item['type'] }}</span></td>
                                        <td>
                                            {{ $item['title'] }}
                                            @if ($item['by'])
                                                <small class="d-block text-muted">by {{ $item['by'] }}</small>
                                            @endif
                                        </td>
                                        <td data-order="{{ $item['sort'] }}">
                                            {{ $item['date'] }}
                                            @if ($item['time'])
                                                <small class="d-block text-muted">{{ \Illuminate\Support\Str::limit($item['time'], 5, '') }}</small>
                                            @endif
                                        </td>
                                        <td>{{ $item['faculty'] }}</td>
                                        <td>{{ $item['order'] ?: '-' }}</td>
                                        <td>
                                            @if ($item['published'])
                                                <span class="badge bg-success">Published</span>
                                            @else
                                                <span class="badge bg-secondary">Hidden</span>
                                            @endif
                                        </td>
                                        <td class="text-nowrap">
                                            @if ($item['published'])
                                                <a href="{{ $item['view'] }}" target="_blank" rel="noopener" class="btn btn-sm btn-outline-secondary">View</a>
                                                <a href="{{ url($item['base'] . '/status/0') }}" class="btn btn-sm btn-outline-danger">Hide</a>
                                            @else
                                                <a href="{{ url($item['base'] . '/status/1') }}" class="btn btn-sm btn-primary">Publish</a>
                                            @endif
                                            <a href="{{ $item['edit'] }}" class="btn btn-sm btn-info">Edit</a>
                                            <a href="{{ url($item['base'] . '/delete') }}" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Delete this {{ strtolower($item['type']) }}? This cannot be undone.')">Delete</a>
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

    <script>
        document.querySelectorAll('[data-ne-tab]').forEach(function (button) {
            button.addEventListener('click', function () {
                var tab = button.getAttribute('data-ne-tab');
                document.querySelectorAll('[data-ne-tab]').forEach(function (b) {
                    var on = b === button;
                    b.classList.toggle('active', on);
                    b.setAttribute('aria-selected', on ? 'true' : 'false');
                });
                document.querySelectorAll('[data-ne-panel]').forEach(function (panel) {
                    panel.hidden = panel.getAttribute('data-ne-panel') !== tab;
                });
                history.replaceState(null, '', '?tab=' + tab);
            });
        });
    </script>
@endsection
