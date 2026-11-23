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
    @endphp

    <main class="content">

        @include('admin.partials.alerts')

        <div class="container-fluid p-0">
            <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
                <h1 class="h3 mb-0">Database Backups</h1>
                @unless ($locked)
                    <form method="POST" action="{{ route('backups.lock') }}">
                        @csrf
                        <button class="btn btn-outline-secondary">Lock</button>
                    </form>
                @endunless
            </div>

            @if ($locked)
                <div class="card">
                    <div class="card-header"><h5 class="card-title mb-0">Confirm your password</h5></div>
                    <div class="card-body">
                        <p>Database backups hold all the website data, including user accounts. Enter your own admin
                            password. The page locks again after 15 minutes.</p>
                        <form method="POST" action="{{ route('backups.unlock') }}">
                            @csrf
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" name="password" class="form-control mb-3" style="max-width:420px"
                                autocomplete="current-password" required autofocus>
                            <button class="btn btn-primary">Open database backups</button>
                        </form>
                    </div>
                </div>
            @elseif (!$dirOk)
                <div class="card border border-warning">
                    <div class="card-body">
                        <h5 class="card-title">Backup folder not found</h5>
                        <p class="mb-0">The folder <code>{{ $path }}</code> does not exist or the website cannot read it.
                            Set the right folder in <code>DB_BACKUPS_PATH</code> in the server <code>.env</code>, then press
                            <strong>Optimize</strong> in Server Tools.</p>
                    </div>
                </div>
            @else
                @if ($publicFolder && !$webProtected)
                    <div class="card border border-danger">
                        <div class="card-body d-flex flex-wrap justify-content-between align-items-center gap-2">
                            <div>
                                <h5 class="card-title text-danger mb-1">Anyone may be able to download these files</h5>
                                <p class="mb-0">The folder is inside the public website folder and nothing blocks web access to it.
                                    Block it now. Better still, ask the host to keep backups outside <code>public_html</code>.</p>
                            </div>
                            <form method="POST" action="{{ route('backups.protect') }}">
                                @csrf
                                <button class="btn btn-danger">Block web access</button>
                            </form>
                        </div>
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Files in <code>{{ $path }}</code></h5>
                        <p class="text-muted mb-0">
                            {{ count($files) }} file(s), {{ $size($totalSize) }} in total. Newest first.
                            @if ($webProtected)
                                <span class="badge bg-success ms-1">Web access blocked</span>
                            @endif
                        </p>
                    </div>
                    <div class="card-body">
                        @if (empty($files))
                            <p class="mb-0 text-muted">The folder is empty.</p>
                        @else
                            <form id="backup-form" method="POST" action="{{ route('backups.zip') }}">
                                @csrf
                                <div class="d-flex flex-wrap gap-2 mb-3">
                                    <button type="submit" class="btn btn-primary" data-needs-selection>
                                        Download selected (<span data-count>0</span>)
                                    </button>
                                    <button type="submit" class="btn btn-danger" data-needs-selection
                                        formaction="{{ route('backups.delete') }}"
                                        onclick="return confirm('Delete the ' + document.querySelectorAll('.backup-check:checked').length + ' selected file(s)? This cannot be undone.')">
                                        Delete selected
                                    </button>
                                    <span class="flex-grow-1"></span>
                                    <button type="submit" class="btn btn-outline-primary" name="all" value="1">Download all ({{ count($files) }})</button>
                                    <button type="submit" class="btn btn-outline-danger" name="all" value="1"
                                        formaction="{{ route('backups.delete') }}"
                                        onclick="return confirm(@js('Delete ALL ' . count($files) . ' backup files? This cannot be undone.'))">
                                        Delete all
                                    </button>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-striped align-middle">
                                        <thead>
                                            <tr>
                                                <th style="width:40px">
                                                    <input type="checkbox" class="form-check-input" id="check-all" aria-label="Select all">
                                                </th>
                                                <th>File</th>
                                                <th class="text-end">Size</th>
                                                <th>Date</th>
                                                <th class="text-end">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($files as $file)
                                                <tr>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input backup-check" name="files[]"
                                                            value="{{ $file['name'] }}" aria-label="Select {{ $file['name'] }}">
                                                    </td>
                                                    <td class="text-break">{{ $file['name'] }}</td>
                                                    <td class="text-end text-nowrap">{{ $size($file['size']) }}</td>
                                                    <td class="text-nowrap">{{ date('Y-m-d H:i', $file['modified']) }}</td>
                                                    <td class="text-end text-nowrap">
                                                        <a href="{{ route('backups.download', ['file' => $file['name']]) }}" class="btn btn-sm btn-info">Download</a>
                                                        <button type="submit" class="btn btn-sm btn-danger" name="files[]" value="{{ $file['name'] }}"
                                                            formaction="{{ route('backups.delete') }}" formnovalidate
                                                            data-single
                                                            onclick="return confirm(@js('Delete ' . $file['name'] . '? This cannot be undone.'))">Delete</button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
                <p class="text-muted small">Downloads and deletes are recorded in <code>storage/logs/db-backups.log</code>.</p>
            @endif
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var form = document.getElementById('backup-form');
            if (!form) {
                return;
            }
            var all = document.getElementById('check-all');
            var boxes = Array.prototype.slice.call(form.querySelectorAll('.backup-check'));

            function update() {
                var n = boxes.filter(function (b) { return b.checked; }).length;
                form.querySelectorAll('[data-count]').forEach(function (el) { el.textContent = n; });
                form.querySelectorAll('[data-needs-selection]').forEach(function (el) { el.disabled = n === 0; });
                all.checked = n === boxes.length;
                all.indeterminate = n > 0 && n < boxes.length;
            }

            all.addEventListener('change', function () {
                boxes.forEach(function (b) { b.checked = all.checked; });
                update();
            });
            boxes.forEach(function (b) { b.addEventListener('change', update); });

            // A row's own Delete button deletes only that file, not the ticked ones.
            form.querySelectorAll('[data-single]').forEach(function (btn) {
                btn.addEventListener('click', function (event) {
                    if (event.defaultPrevented) {
                        return; // "Cancel" in the confirm box
                    }
                    boxes.forEach(function (b) { b.disabled = true; });
                    setTimeout(function () { boxes.forEach(function (b) { b.disabled = false; }); }, 1000);
                });
            });

            update();
        });
    </script>
@endsection
