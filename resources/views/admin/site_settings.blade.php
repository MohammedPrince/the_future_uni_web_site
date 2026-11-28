@extends('components.admin-layout')
@section('main-admin-content')
    @php
        $field = fn ($key) => old($key, $s[$key] ?? '');
        $maintenanceOn = ($s['maintenance_enabled'] ?? '0') === '1';
    @endphp

    <main class="content">

        @include('admin.partials.alerts')

        <div class="container-fluid p-0">
            <h1 class="h3 mb-3">Site Settings</h1>

            {{-- Maintenance mode --}}
            <div class="card {{ $maintenanceOn ? 'border border-danger' : '' }}" id="maintenance">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        Maintenance mode:
                        @if ($maintenanceOn)
                            <span class="badge bg-danger">ON, the website is closed to visitors</span>
                        @else
                            <span class="badge bg-success">OFF, the website is open</span>
                        @endif
                    </h5>
                </div>
                <div class="card-body">
                    <p class="text-muted">
                        When it is on, visitors see a "We will be back soon" page instead of the website. The admin
                        panel keeps working, and you can still look at the website from your browser with
                        <strong>Preview the site</strong>. Google is told the break is temporary.
                    </p>

                    <form action="{{ route('site_settings.maintenance') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Message for visitors</label>
                            <textarea name="maintenance_message" rows="2" maxlength="500" class="form-control">{{ old('maintenance_message', $s['maintenance_message'] ?? '') }}</textarea>
                            @error('maintenance_message')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        @if ($maintenanceOn)
                            <input type="hidden" name="maintenance_enabled" value="0">
                            <button class="btn btn-success">Turn maintenance OFF (open the website)</button>
                            <a href="{{ route('site_settings.preview') }}" target="_blank" rel="noopener" class="btn btn-outline-primary">Preview the site</a>
                        @else
                            <input type="hidden" name="maintenance_enabled" value="1">
                            <button class="btn btn-danger"
                                onclick="return confirm('Close the website to visitors and show the maintenance page?')">Turn maintenance ON</button>
                        @endif
                    </form>
                </div>
            </div>

            <form action="{{ route('site_settings.update') }}" method="POST">
                @csrf

                {{-- Announcement --}}
                <div class="card" id="announcement">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Announcement bar</h5>
                        <p class="text-muted mb-0">A short line at the top of every public page, e.g. "Admission for 2027 is open". Leave it off when not needed.</p>
                    </div>
                    <div class="card-body">
                        <input type="hidden" name="announcement_enabled" value="">
                        <label class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" name="announcement_enabled" value="1"
                                @checked(old('announcement_enabled', $s['announcement_enabled'] ?? '0') === '1')>
                            <span class="form-check-label">Show the announcement</span>
                        </label>
                        <div class="row">
                            <div class="col-12 col-lg-7 mb-3">
                                <label class="form-label">Text</label>
                                <input type="text" name="announcement_text" value="{{ $field('announcement_text') }}" maxlength="300" class="form-control">
                                @error('announcement_text')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 col-lg-5 mb-3">
                                <label class="form-label">Link (optional)</label>
                                <input type="url" name="announcement_url" value="{{ $field('announcement_url') }}" class="form-control" placeholder="https://">
                                @error('announcement_url')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Contact --}}
                <div class="card" id="contact">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Contact details</h5>
                        <p class="text-muted mb-0">Shown in the page header and footer. Leave a field empty to hide it.</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach ([
                                'contact_email' => ['Email', 'email', 'info@fu.edu.sd'],
                                'contact_phone' => ['Phone', 'text', '(+249) 183 411 818'],
                                'address' => ['Address', 'text', 'Africa Street - Khartoum, Sudan'],
                                'map_url' => ['Map link (Google Maps)', 'url', 'https://maps.app.goo.gl/...'],
                            ] as $key => [$label, $type, $placeholder])
                                <div class="col-12 col-lg-6 mb-3">
                                    <label class="form-label">{{ $label }}</label>
                                    <input type="{{ $type }}" name="{{ $key }}" value="{{ $field($key) }}" class="form-control" placeholder="{{ $placeholder }}">
                                    @error($key)
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- Links --}}
                <div class="card" id="links">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Links</h5>
                        <p class="text-muted mb-0">Full addresses starting with https://. Leave a field empty to hide that link.</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach ([
                                'facebook_url' => 'Facebook page',
                                'linkedin_url' => 'LinkedIn page',
                                'instagram_url' => 'Instagram page',
                                'tiktok_url' => 'TikTok page',
                                'admission_url' => 'Admission portal (top bar)',
                                'elearning_url' => 'E-Learning (top bar and footer)',
                                'helpdesk_url' => 'Help Desk (top bar and footer)',
                                'students_portal_url' => 'Student Result (footer)',
                                'support_url' => 'Live technical support button (Zoom)',
                            ] as $key => $label)
                                <div class="col-12 col-lg-6 mb-3">
                                    <label class="form-label">{{ $label }}</label>
                                    <input type="url" name="{{ $key }}" value="{{ $field($key) }}" class="form-control" placeholder="https://">
                                    @error($key)
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- Texts --}}
                <div class="card" id="fees">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Texts</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Footer: about the university</label>
                            <textarea name="footer_about" rows="3" maxlength="600" class="form-control">{{ $field('footer_about') }}</textarea>
                            @error('footer_about')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Fee Structure page: text above the tables (optional)</label>
                            <input type="text" name="fees_note" value="{{ $field('fees_note') }}" maxlength="500" class="form-control"
                                placeholder="e.g. Fees for the academic year 2026/2027">
                            @error('fees_note')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="text-center mb-4">
                    <button class="btn btn-lg btn-success">Save Settings</button>
                </div>
            </form>
        </div>
    </main>
@endsection
