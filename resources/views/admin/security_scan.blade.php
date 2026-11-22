@extends('components.admin-layout')
@section('main-admin-content')

<style>
    .sec-badge { display:inline-block; padding:2px 8px; border-radius:10px; font-size:12px; font-weight:600; color:#fff; }
    .sec-high { background:#d9534f; } .sec-medium { background:#f0ad4e; } .sec-info { background:#5bc0de; }
    .sec-ok { background:#28a745; } .sec-bad { background:#d9534f; }
    .sec-path { font-family:monospace; font-size:12px; word-break:break-all; }
    .sec-pre { background:#1e1e1e; color:#ddd; padding:10px; border-radius:6px; max-height:320px; overflow:auto; font-size:12px; white-space:pre-wrap; }
    .sec-table td, .sec-table th { vertical-align:top; font-size:13px; }
</style>

<main class="content">
    <center>
        @if (session()->has('success'))
            <div class="alert success text-center"><p class="inner">{{ session('success') }}</p></div>
        @endif
        @if (session()->has('failure'))
            <div class="alert error text-center"><p class="inner">{{ session('failure') }}</p></div>
        @endif
    </center>

    <div class="container-fluid p-0">
        <h1 class="h3 mb-3">Security Scan &amp; Cleanup</h1>

        @if ($locked)
            <div class="card">
                <div class="card-header"><h5 class="card-title mb-0">Unlock scanner</h5></div>
                <div class="card-body">
                    <p>Enter the <code>SECURITY_SCANNER_KEY</code> value from the server's <code>.env</code>. The page re-locks after 30 minutes.</p>
                    <form method="POST" action="{{ route('security.unlock') }}" autocomplete="off">
                        @csrf
                        <input type="password" name="scanner_key" class="form-control mb-2" style="max-width:420px" required>
                        <button class="btn btn-primary">Unlock</button>
                    </form>
                </div>
            </div>
        @else

        @if (session()->has('new_passwords') && count(session('new_passwords')))
            <div class="card border-danger">
                <div class="card-header bg-danger text-white"><h5 class="card-title mb-0 text-white">New passwords — copy them now, they are shown only once</h5></div>
                <div class="card-body">
                    <table class="table table-sm">
                        <tr><th>Username</th><th>New password</th></tr>
                        @foreach (session('new_passwords') as $u => $p)
                            <tr><td>{{ $u }}</td><td><code>{{ $p }}</code></td></tr>
                        @endforeach
                    </table>
                </div>
            </div>
        @endif

        {{-- 1. Front controller integrity --}}
        <div class="card">
            <div class="card-header"><h5 class="card-title mb-0">1. index.php integrity</h5></div>
            <div class="card-body">
                <table class="table table-sm sec-table">
                    <tr><th>File</th><th>Status</th><th>Last modified</th><th>Writable by PHP</th></tr>
                    @foreach ($indexes as $i)
                        <tr>
                            <td class="sec-path">{{ $i['path'] }}</td>
                            <td>
                                @if ($i['clean']) <span class="sec-badge sec-ok">clean</span>
                                @elseif (!$i['exists']) <span class="sec-badge sec-bad">missing</span>
                                @else <span class="sec-badge sec-bad">MODIFIED</span> @endif
                            </td>
                            <td>{{ $i['mtime'] ? date('Y-m-d H:i', $i['mtime']) : '-' }}</td>
                            <td>{{ $i['writable'] ? 'yes' : 'no (read-only)' }}</td>
                        </tr>
                    @endforeach
                </table>
                <form method="POST" action="{{ route('security.restore') }}" onsubmit="return confirm('Restore clean index.php files? Current copies are saved to quarantine.')">
                    @csrf
                    <button class="btn btn-warning">Restore clean index.php &amp; make read-only</button>
                </form>
            </div>
        </div>

        {{-- 2. Scan --}}
        <div class="card">
            <div class="card-header"><h5 class="card-title mb-0">2. Scan for injected files</h5></div>
            <div class="card-body">
                <form method="POST" action="{{ route('security.scan') }}" class="row g-2 align-items-end">
                    @csrf
                    <div class="col-auto">
                        <label class="form-label">Scope</label>
                        <select name="scope" class="form-select">
                            <option value="account">Whole cPanel account (all subdomains) — slower</option>
                            <option value="site">This website only</option>
                        </select>
                    </div>
                    <div class="col-auto">
                        <label class="form-label">"Recently modified" = last N days</label>
                        <input type="number" name="days" value="30" min="1" max="365" class="form-control">
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-primary" onclick="this.innerText='Scanning… (can take a few minutes)'">Run scan</button>
                    </div>
                </form>

                @if ($scan)
                    <hr>
                    <p>
                        <b>Last scan:</b> {{ $scan['at'] }} — root <code>{{ $scan['root'] }}</code>,
                        {{ number_format($scan['stats']['files']) }} files in {{ $scan['seconds'] }}s,
                        {{ count($scan['findings']) }} finding(s).
                        @if ($scan['stats']['unreadable']) {{ $scan['stats']['unreadable'] }} folder(s) unreadable by PHP. @endif
                        @if ($scan['stats']['truncated']) <b class="text-danger">Results truncated — clean these, then scan again.</b> @endif
                    </p>
                    <p class="text-muted small">Skipped: <code>vendor</code>, <code>node_modules</code>, <code>.git</code>, mail/logs folders. Reinstall vendor with <code>composer install</code> after cleanup.
                        Read each file before quarantining; "info" items are usually your own changes.</p>

                    @if (count($scan['findings']))
                    <form method="POST" action="{{ route('security.quarantine') }}" onsubmit="return confirm('Move the selected files to quarantine?')">
                        @csrf
                        <div class="mb-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary" onclick="document.querySelectorAll('.q-high').forEach(c=>c.checked=true)">Select all HIGH</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary" onclick="document.querySelectorAll('.q-box').forEach(c=>c.checked=false)">Clear</button>
                            <button class="btn btn-sm btn-danger">Quarantine selected</button>
                        </div>
                        <div style="max-height:600px; overflow:auto">
                        <table class="table table-sm table-hover sec-table">
                            <tr><th></th><th>Severity</th><th>Type</th><th>File</th><th>Detail</th><th>Modified</th></tr>
                            @foreach ($scan['findings'] as $f)
                                <tr>
                                    <td>
                                        @if (!$f['protected'])
                                            <input type="checkbox" name="ids[]" value="{{ $f['id'] }}" class="q-box {{ $f['severity'] === 'high' ? 'q-high' : '' }}">
                                        @else
                                            <span title="Use 'Restore clean index.php' instead">🔒</span>
                                        @endif
                                    </td>
                                    <td><span class="sec-badge sec-{{ $f['severity'] }}">{{ $f['severity'] }}</span></td>
                                    <td>{{ $f['type'] }}</td>
                                    <td class="sec-path">{{ $f['path'] }}<br><small class="text-muted">{{ number_format($f['size']) }} bytes</small></td>
                                    <td>{{ $f['detail'] }}</td>
                                    <td>{{ $f['mtime'] ? date('Y-m-d H:i', $f['mtime']) : '-' }}</td>
                                </tr>
                            @endforeach
                        </table>
                        </div>
                    </form>
                    @endif
                @endif
            </div>
        </div>

        {{-- 2b. Quarantine batches / undo --}}
        @if (count($batches))
        <div class="card">
            <div class="card-header"><h5 class="card-title mb-0">Quarantine (undo a mistake)</h5></div>
            <div class="card-body">
                <p>If a site broke after quarantining (e.g. Moodle/elearning), restore the batch, then purge that site's cache.</p>
                @foreach ($batches as $b)
                    <details class="mb-2">
                        <summary><b>{{ $b['batch'] }}</b> — {{ $b['count'] }} file(s)</summary>
                        <div class="sec-pre">@foreach ($b['files'] as $file){{ $file }}
@endforeach</div>
                        @if ($b['count'])
                        <form method="POST" action="{{ route('security.undo') }}" class="mt-1" onsubmit="return confirm('Move all {{ $b['count'] }} file(s) of this batch back to their original place?')">
                            @csrf
                            <input type="hidden" name="batch" value="{{ $b['batch'] }}">
                            <button class="btn btn-sm btn-outline-danger">Undo this batch</button>
                        </form>
                        @endif
                    </details>
                @endforeach
            </div>
        </div>
        @endif

        {{-- 3. Kick out --}}
        <div class="card">
            <div class="card-header"><h5 class="card-title mb-0">3. Kick the attacker out</h5></div>
            <div class="card-body">
                <p>Tick any account you did not create. This ends <b>every other login session</b>, disables the ticked accounts, and can reset all passwords.</p>
                <form method="POST" action="{{ route('security.kick') }}" onsubmit="return confirm('End all other sessions and apply these changes?')">
                    @csrf
                    <table class="table table-sm sec-table">
                        <tr><th>Disable</th><th>ID</th><th>Username</th><th>Name</th><th>Email</th><th>Admin</th><th>Status</th><th>Created</th><th>Updated</th></tr>
                        @foreach ($users as $u)
                            <tr @if ($u->isAdmin == 1 && $u->del == 0) style="background:#fff8e1" @endif>
                                <td>@if ($u->id != $meId && $u->del == 0)<input type="checkbox" name="disable_users[]" value="{{ $u->id }}">@elseif ($u->id == $meId) (you) @endif</td>
                                <td>{{ $u->id }}</td>
                                <td>{{ $u->username }}</td>
                                <td>{{ $u->user_fullname }}</td>
                                <td>{{ $u->user_email }}</td>
                                <td>{{ $u->isAdmin == 1 ? 'yes' : 'no' }}</td>
                                <td>{{ $u->del == 0 ? 'active' : 'disabled' }}</td>
                                <td>{{ $u->created_at }}</td>
                                <td>{{ $u->updated_at }}</td>
                            </tr>
                        @endforeach
                    </table>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" name="reset_passwords" value="1" id="rp" checked>
                        <label class="form-check-label" for="rp">Reset the password of every active account (including yours) — new ones shown once</label>
                    </div>
                    <button class="btn btn-danger">Kick out now</button>
                </form>
            </div>
        </div>

        {{-- 4. Server view --}}
        <div class="card">
            <div class="card-header"><h5 class="card-title mb-0">4. Account cron jobs &amp; running processes (read-only)</h5></div>
            <div class="card-body">
                <p>Anything here you don't recognise (wget/curl to strange URLs, <code>perl</code>, <code>/tmp/…</code>, base64) is the attacker.
                   Remove cron lines in <b>cPanel → Cron Jobs</b>; kill processes in WHM Terminal with <code>kill -9 PID</code>.</p>
                <h6>crontab</h6>
                <div class="sec-pre">{{ $crontab ?? 'Not available (shell_exec disabled). Check cPanel → Cron Jobs.' }}</div>
                <h6 class="mt-3">processes</h6>
                <div class="sec-pre">{{ $procs ?? 'Not available (shell_exec disabled). Check WHM → Process Manager.' }}</div>
            </div>
        </div>

        {{-- 5. Environment --}}
        <div class="card">
            <div class="card-header"><h5 class="card-title mb-0">5. Environment</h5></div>
            <div class="card-body">
                <table class="table table-sm sec-table">
                    @foreach ($env as $k => $v)
                        <tr><th style="width:220px">{{ $k }}</th><td class="sec-path">{{ $v }}</td></tr>
                    @endforeach
                </table>
                <p class="small text-muted">Every action is logged to <code>storage/logs/security-scan.log</code>.
                   When cleanup is finished, delete <code>SECURITY_SCANNER_KEY</code> from <code>.env</code> and run <code>php artisan config:cache</code> — the page then returns 404.</p>
                <form method="POST" action="{{ route('security.lock') }}">@csrf <button class="btn btn-sm btn-secondary">Lock scanner</button></form>
            </div>
        </div>
        @endif
    </div>
</main>
@endsection
