{{--
    Shared layout for every error page (404, 403, 500, ...) and the maintenance page.
    Each page sets: title, code, message, and optionally description, arabic, actions.
    Kept self-contained (inline styles, no database needed) so it still works when
    the rest of the site is broken.
--}}
@php
    $contact = rescue(fn () => \App\Models\Setting::allValues(), config('site.defaults', []), false);
    $logo = rescue(fn () => \App\Support\Media::url('client/img/fu_logo.png'), asset('public/client/img/fu_logo.png'), false);
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">
    <meta name="theme-color" content="#1d5191">
    <title>@yield('title') | The Future University</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="48x48">
    <style>
        @font-face {
            font-family: Ubuntu;
            font-weight: 400;
            font-display: swap;
            src: url("{{ asset('public/client/fonts/ubuntu-400-latin.woff2') }}") format("woff2");
        }

        @font-face {
            font-family: Ubuntu;
            font-weight: 700;
            font-display: swap;
            src: url("{{ asset('public/client/fonts/ubuntu-700-latin.woff2') }}") format("woff2");
        }

        * { box-sizing: border-box; }
        html, body { min-height: 100%; margin: 0; }
        body {
            display: flex; flex-direction: column; min-height: 100vh;
            background: #f5f7fb; color: #281e32;
            font-family: Ubuntu, "Segoe UI", Roboto, Arial, sans-serif;
        }
        .topbar { height: 6px; background: #1d5191; }
        .wrap {
            flex: 1; display: flex; align-items: center; justify-content: center;
            padding: 32px 16px;
        }
        .card {
            width: 100%; max-width: 600px; background: #fff; text-align: center;
            border-top: 6px solid #fb8b24; border-radius: 6px;
            padding: 40px 28px 32px; box-shadow: 0 6px 24px rgba(29, 81, 145, .12);
        }
        .logo { width: 96px; height: 96px; }
        .code { margin: 14px 0 0; font-size: 72px; line-height: 1; font-weight: 700; color: #fb8b24; }
        h1 { margin: 14px 0 6px; font-size: 26px; color: #1d5191; }
        .arabic-title { margin: 0 0 18px; font-size: 22px; font-weight: 400; color: #1d5191; }
        .message { margin: 0 0 8px; font-size: 17px; line-height: 1.6; white-space: pre-line; }
        .message-ar { margin: 0 0 24px; font-size: 17px; line-height: 1.7; color: #555; }
        .actions { display: flex; flex-wrap: wrap; gap: 10px; justify-content: center; margin: 8px 0 26px; }
        .btn {
            display: inline-block; padding: 10px 22px; border-radius: 4px; font: inherit; font-size: 15px;
            text-decoration: none; cursor: pointer; border: 2px solid #1d5191;
        }
        .btn-primary { background: #fb8b24; border-color: #fb8b24; color: #fff; }
        .btn-primary:hover { background: #ef7e22; border-color: #ef7e22; }
        .btn-outline { background: #fff; color: #1d5191; }
        .btn-outline:hover { background: #1d5191; color: #fff; }
        .contact { margin: 0; padding-top: 18px; border-top: 1px solid #eee; font-size: 15px; color: #555; }
        .contact a { color: #ef7e22; text-decoration: none; }
        .contact a, .contact span { white-space: nowrap; }
        footer {
            background: #1d5191; color: #fff; text-align: center; font-size: 12px; padding: 14px 16px;
        }
        footer strong { color: #fec169; }
    </style>
</head>

<body>
    <div class="topbar"></div>

    <div class="wrap">
        <main class="card">
            <a href="{{ url('/') }}"><img class="logo" src="{{ $logo }}" width="96" height="96" alt="The Future University, home"></a>

            @hasSection('code')
                <p class="code">@yield('code')</p>
            @endif

            <h1>@yield('message')</h1>
            @hasSection('arabic_title')
                <h2 class="arabic-title" lang="ar" dir="rtl">@yield('arabic_title')</h2>
            @endif

            @hasSection('description')
                <p class="message">@yield('description')</p>
            @endif
            @hasSection('arabic')
                <p class="message-ar" lang="ar" dir="rtl">@yield('arabic')</p>
            @endif

            @unless (View::hasSection('hide_actions'))
                <div class="actions">
                    @hasSection('actions')
                        @yield('actions')
                    @else
                        <a class="btn btn-primary" href="{{ url('/') }}">Home page</a>
                        <a class="btn btn-outline" href="{{ url('/') }}" onclick="if (history.length > 1) { history.back(); return false; }">Go back</a>
                    @endif
                </div>
            @endunless

            @if (!empty($contact['contact_email']) || !empty($contact['contact_phone']))
                <p class="contact">
                    Need help?
                    @if (!empty($contact['contact_email']))
                        <a href="mailto:{{ $contact['contact_email'] }}">{{ $contact['contact_email'] }}</a>
                    @endif
                    @if (!empty($contact['contact_email']) && !empty($contact['contact_phone']))
                        &nbsp;|&nbsp;
                    @endif
                    @if (!empty($contact['contact_phone']))
                        <span dir="ltr">{{ $contact['contact_phone'] }}</span>
                    @endif
                </p>
            @endif
        </main>
    </div>

    <footer>
        Copyright &copy; {{ date('Y') }} All rights reserved for <strong>The Future University.</strong>
    </footer>
</body>

</html>
