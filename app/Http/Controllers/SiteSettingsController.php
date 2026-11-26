<?php

namespace App\Http\Controllers;

use App\Http\Middleware\SiteMaintenance;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

/** Admin > Site Settings: contact details, links, announcement bar and maintenance mode. */
class SiteSettingsController extends Controller
{
    /** Field => validation rules. Every field here is saved by update(). */
    private const FIELDS = [
        'contact_email' => ['nullable', 'email', 'max:150'],
        'contact_phone' => ['nullable', 'string', 'max:50'],
        'address' => ['nullable', 'string', 'max:200'],
        'map_url' => ['nullable', 'url', 'starts_with:https://,http://', 'max:500'],
        'facebook_url' => ['nullable', 'url', 'starts_with:https://,http://', 'max:500'],
        'linkedin_url' => ['nullable', 'url', 'starts_with:https://,http://', 'max:500'],
        'instagram_url' => ['nullable', 'url', 'starts_with:https://,http://', 'max:500'],
        'tiktok_url' => ['nullable', 'url', 'starts_with:https://,http://', 'max:500'],
        'admission_url' => ['nullable', 'url', 'starts_with:https://,http://', 'max:500'],
        'elearning_url' => ['nullable', 'url', 'starts_with:https://,http://', 'max:500'],
        'helpdesk_url' => ['nullable', 'url', 'starts_with:https://,http://', 'max:500'],
        'students_portal_url' => ['nullable', 'url', 'starts_with:https://,http://', 'max:500'],
        'support_url' => ['nullable', 'url', 'starts_with:https://,http://', 'max:500'],
        'footer_about' => ['nullable', 'string', 'max:600'],
        'announcement_text' => ['nullable', 'string', 'max:300'],
        'announcement_url' => ['nullable', 'url', 'starts_with:https://,http://', 'max:500'],
        'fees_note' => ['nullable', 'string', 'max:500'],
    ];

    public function index()
    {
        return view('admin.site_settings', ['s' => Setting::allValues()]);
    }

    public function update(Request $request)
    {
        $data = $request->validate(self::FIELDS + ['announcement_enabled' => ['nullable', 'in:1']]);

        $values = [];
        foreach (array_keys(self::FIELDS) as $key) {
            $values[$key] = trim((string) ($data[$key] ?? ''));
        }
        $values['announcement_enabled'] = $request->boolean('announcement_enabled') ? '1' : '0';

        if ($values['announcement_enabled'] === '1' && $values['announcement_text'] === '') {
            return back()->withInput()->withErrors(['announcement_text' => 'Write the announcement text, or switch the announcement off.']);
        }

        Setting::putMany($values);
        $this->log($request, 'settings saved');

        return redirect()->route('site_settings')->with('success', 'Site settings saved. The public pages show the change now.');
    }

    public function maintenance(Request $request)
    {
        $data = $request->validate([
            'maintenance_enabled' => ['required', 'in:0,1'],
            'maintenance_message' => ['nullable', 'string', 'max:500'],
        ]);

        $on = $data['maintenance_enabled'] === '1';
        $values = ['maintenance_enabled' => $on ? '1' : '0'];
        if (trim((string) ($data['maintenance_message'] ?? '')) !== '') {
            $values['maintenance_message'] = trim($data['maintenance_message']);
        }
        if ($on) {
            // New token each time: old preview cookies stop working.
            $values['maintenance_token'] = Str::random(40);
        }

        Setting::putMany($values);
        $this->log($request, $on ? 'maintenance ON' : 'maintenance OFF');

        $response = redirect()->route('site_settings')->with('success', $on
            ? 'Maintenance mode is ON. Visitors see the "back soon" page. You can still preview the site from this browser.'
            : 'Maintenance mode is OFF. The website is open to everyone again.');

        return $on ? $response->withCookie(SiteMaintenance::previewCookie()) : $response;
    }

    /** Lets this admin's browser see the public site while maintenance mode is on. */
    public function preview()
    {
        if (!Setting::enabled('maintenance_enabled')) {
            return redirect('/');
        }

        return redirect('/')->withCookie(SiteMaintenance::previewCookie());
    }

    private function log(Request $request, string $what): void
    {
        rescue(fn () => Log::info('[site-settings] ' . $what, [
            'user' => optional($request->user())->username,
            'ip' => $request->ip(),
        ]), null, false);
    }
}
