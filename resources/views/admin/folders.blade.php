@extends('components.admin-layout')
@section('main-admin-content')
    @php
        $size = function ($bytes) {
            $units = ['B', 'KB', 'MB', 'GB', 'TB'];
            $i = 0;
            while ($bytes >= 1024 && $i < count($units) - 1) {
                $bytes /= 1024;
                $i++;
            }
            return number_format($bytes, $i === 0 ? 0 : 1) . ' ' . $units[$i];
        };
        $open = fn ($p) => route('folders.index', ['path' => $p]);
    @endphp

    <main class="content">

        @include('admin.partials.alerts')

        <div class="container-fluid p-0">
            <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
                <h1 class="h3 mb-0">Server Folders</h1>
                @unless ($locked)
                    <form method="POST" action="{{ route('folders.lock') }}">
                        @csrf
                        <button class="btn btn-outline-secondary">Lock</button>
                    </form>
                @endunless
            </div>

            @if ($locked)
                <div class="card">
                    <div class="card-header"><h5 class="card-title mb-0">Confirm your password</h5></div>
                    <div class="card-body">
                        <p>This page can delete folders on the server for good. Enter your own admin password.
                            The page locks again after 15 minutes.</p>
                        <form method="POST" action="{{ route('folders.unlock') }}">
                            @csrf
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" name="password" class="form-control mb-3" style="max-width:420px"
                                autocomplete="current-password" required autofocus>
                            <button class="btn btn-primary">Open server folders</button>
                        </form>
                    </div>
                </div>
            @else
                {{-- Starting folders --}}
                <div class="card">
                    <div class="card-body d-flex flex-wrap gap-2 align-items-center">
                        <strong class="me-2">Start in:</strong>
                        @forelse ($roots as $root)
                            <a href="{{ $open($root) }}" class="btn btn-sm {{ isset($path) && $path === $root ? 'btn-primary' : 'btn-outline-primary' }}">{{ $root }}</a>
                        @empty
                            <span class="text-muted">None of the folders in <code>FOLDER_MANAGER_ROOTS</code> exist on this server.</span>
                        @endforelse
                    </div>
                </div>

                @if (!empty($path))
                    {{-- Where am I --}}
                    <nav aria-label="Folder path" class="mb-3 bg-white p-2 rounded text-break">
                        @foreach ($breadcrumbs as $crumb)
                            @if ($loop->last)
                                <strong aria-current="page">{{ $crumb['name'] }}</strong>
                            @else
                                <a href="{{ $open($crumb['path']) }}">{{ $crumb['name'] }}</a>
                                <span class="text-muted mx-1">/</span>
                            @endif
                        @endforeach
                    </nav>

                    <div class="row">
                        {{-- Content --}}
                        <div class="col-12 col-xl-8">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0 text-break"><code>{{ $path }}</code></h5>
                                    <p class="text-muted mb-0">
                                        {{ count($entries['dirs']) }} folder(s), {{ count($entries['files']) }} file(s) directly inside.
                                        @if ($entries['total'] > count($entries['dirs']) + count($entries['files']))
                                            Showing the first {{ count($entries['dirs']) + count($entries['files']) }} of {{ $entries['total'] }}.
                                        @endif
                                    </p>
                                </div>
                                <div class="card-body table-responsive">
                                    @if ($entries['error'])
                                        <p class="text-danger mb-0">{{ $entries['error'] }}</p>
                                    @elseif (empty($entries['dirs']) && empty($entries['files']))
                                        <p class="text-muted mb-0">This folder is empty.</p>
                                    @else
                                        <table class="table table-sm table-hover align-middle mb-0">
                                            <thead>
                                                <tr><th>Name</th><th class="text-end">Size</th><th>Modified</th><th></th></tr>
                                            </thead>
                                            <tbody>
                                                @if ($parent)
                                                    <tr>
                                                        <td colspan="4"><a href="{{ $open($parent) }}"><i class="align-middle" data-feather="corner-left-up"></i> Up one level</a></td>
                                                    </tr>
                                                @endif
                                                @foreach ($entries['dirs'] as $dir)
                                                    <tr>
                                                        <td class="text-break">
                                                            <i class="align-middle text-warning" data-feather="folder"></i>
                                                            @if ($dir['link'])
                                                                {{ $dir['name'] }} <span class="badge bg-secondary">link</span>
                                                            @else
                                                                <a href="{{ $open($dir['path']) }}">{{ $dir['name'] }}</a>
                                                            @endif
                                                        </td>
                                                        <td></td>
                                                        <td class="text-nowrap">{{ $dir['modified'] ? date('Y-m-d H:i', $dir['modified']) : '' }}</td>
                                                        <td class="text-end">
                                                            @unless ($dir['link'])
                                                                <a href="{{ $open($dir['path']) }}" class="btn btn-sm btn-outline-secondary">Open</a>
                                                            @endunless
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                @foreach ($entries['files'] as $file)
                                                    <tr>
                                                        <td class="text-break">
                                                            <i class="align-middle text-muted" data-feather="file"></i> {{ $file['name'] }}
                                                            @if ($file['link'])
                                                                <span class="badge bg-secondary">link</span>
                                                            @endif
                                                        </td>
                                                        <td class="text-end text-nowrap">{{ $size($file['size']) }}</td>
                                                        <td class="text-nowrap">{{ $file['modified'] ? date('Y-m-d H:i', $file['modified']) : '' }}</td>
                                                        <td></td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @endif
                                </div>
                            </div>
                        </div>

                        {{-- Delete --}}
                        <div class="col-12 col-xl-4">
                            <div class="card {{ $protectedReason ? '' : 'border border-danger' }}">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Delete this folder</h5>
                                </div>
                                <div class="card-body">
                                    <p class="mb-2">
                                        Everything inside:
                                        <strong>{{ number_format($summary['dirs']) }}</strong> folder(s),
                                        <strong>{{ number_format($summary['files']) }}</strong> file(s),
                                        <strong>{{ $size($summary['bytes']) }}</strong>
                                        @unless ($summary['complete'])
                                            <span class="text-muted">or more (too big to count fully)</span>
                                        @endunless
                                    </p>

                                    @if ($protectedReason)
                                        <div class="alert alert-secondary mb-0 p-2">This folder cannot be deleted: {{ $protectedReason }}</div>
                                    @else
                                        @unless ($writable)
                                            <p class="text-warning small">The website may not have permission to delete it.</p>
                                        @endunless
                                        <p class="small text-muted">Deleting cannot be undone. Make sure you have a copy of anything you still need.</p>
                                        <form method="POST" action="{{ route('folders.delete') }}"
                                            onsubmit="return confirm(@js('Delete ' . $path . ' and everything in it? This cannot be undone.'))">
                                            @csrf
                                            <input type="hidden" name="path" value="{{ $path }}">
                                            <label class="form-label" for="confirm_name">Type <strong>{{ basename($path) }}</strong> to confirm</label>
                                            <input type="text" id="confirm_name" name="confirm_name" class="form-control mb-2" autocomplete="off" required>
                                            @error('confirm_name')
                                                <div class="text-danger small mb-2">{{ $message }}</div>
                                            @enderror
                                            <button class="btn btn-danger w-100">Delete folder</button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <p class="text-muted small">Deletes are recorded in <code>storage/logs/folder-manager.log</code>.</p>
            @endif
        </div>
    </main>
@endsection
