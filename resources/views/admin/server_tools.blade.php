@extends('components.admin-layout')
@section('main-admin-content')

<style>
    .tool-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(270px, 1fr)); gap: 16px; }
    .tool { display: flex; flex-direction: column; border: 1px solid #dee2e6; border-radius: 6px; padding: 16px; background: #fff; }
    .tool h2 { font-size: 16px; margin: 0 0 6px; }
    .tool p { flex: 1; margin: 0 0 12px; color: #495057; }
    .tool-danger { border-color: #d9534f; }
    .tool-output { background: #1e1e1e; color: #e6e6e6; padding: 12px; border-radius: 6px; max-height: 420px; overflow: auto; font-size: 13px; white-space: pre-wrap; margin: 0; }
    .info-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 10px 24px; margin: 0; }
    .info-grid dt { font-weight: 400; color: #6c757d; }
    .info-grid dd { margin: 0; font-weight: 600; }
    .info-grid .is-bad { color: #b02a37; }
    .info-grid .is-good { color: #146c43; }
</style>

<main class="content">
    <center>
        @if (session()->has('success'))
            <div class="alert success text-center"><p class="inner">{{ session('success') }}</p></div>
        @endif
        @if (session()->has('failure'))
            <div class="alert error text-center"><p class="inner">{{ session('failure') }}</p></div>
        @endif
        @if ($errors->any())
            <div class="alert error text-center"><p class="inner">{{ $errors->first() }}</p></div>
        @endif
    </center>

    <div class="container-fluid p-0">
        <h1 class="h3 mb-3">Server Tools</h1>

        @if ($locked)
            <div class="card">
                <div class="card-header"><h5 class="card-title mb-0">Confirm your password</h5></div>
                <div class="card-body">
                    <p>These tools change the live website. Enter your own admin password. The page locks again after 15 minutes.</p>
                    <form method="POST" action="{{ route('tools.unlock') }}">
                        @csrf
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password" class="form-control mb-3" style="max-width:420px"
                            autocomplete="current-password" required autofocus>
                        <button class="btn btn-primary">Open server tools</button>
                    </form>
                </div>
            </div>
        @else
            @if ($result)
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">{{ $result['title'] }}: {{ $result['ok'] ? 'finished' : 'failed' }} in {{ $result['seconds'] }} s</h5>
                    </div>
                    <div class="card-body"><pre class="tool-output">{{ $result['output'] }}</pre></div>
                </div>
            @endif

            <div class="card">
                <div class="card-header"><h5 class="card-title mb-0">Status</h5></div>
                <div class="card-body">
                    <dl class="info-grid">
                        @foreach ($info as $label => [$value, $good])
                            <div>
                                <dt>{{ $label }}</dt>
                                <dd class="{{ $good === null ? '' : ($good ? 'is-good' : 'is-bad') }}">{{ $value }}</dd>
                            </div>
                        @endforeach
                    </dl>
                </div>
            </div>

            <div class="tool-grid mb-4">
                @foreach ($tools as $key => [$title, $text, $style])
                    <form method="POST" action="{{ route('tools.run') }}" class="tool {{ $style === 'danger' ? 'tool-danger' : '' }}"
                        onsubmit="var b=this.querySelector('.run');b.disabled=true;b.textContent='Running…';">
                        @csrf
                        <input type="hidden" name="tool" value="{{ $key }}">
                        <h2>{{ $title }}</h2>
                        <p>{{ $text }}</p>
                        @if ($key === 'migrate')
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="backup_done" name="backup_done" value="1" required>
                                <label class="form-check-label" for="backup_done">I have a database backup</label>
                            </div>
                        @endif
                        <button class="btn btn-{{ $style }} run">{{ $title }}</button>
                    </form>
                @endforeach
            </div>

            <form method="POST" action="{{ route('tools.lock') }}">
                @csrf
                <button class="btn btn-outline-secondary">Lock server tools</button>
            </form>
        @endif
    </div>
</main>
@endsection
