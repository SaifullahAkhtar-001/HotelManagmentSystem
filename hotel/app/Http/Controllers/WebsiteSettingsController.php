<?php

namespace App\Http\Controllers;

use App\Models\WebsiteSettings;
use Illuminate\Http\Request;

class WebsiteSettingsController extends Controller
{
    public function index()
    {
        $settings = WebsiteSettings::first();
        return view('dashboard.website-settings.index', compact('settings'));
    }
    public function update(Request $request)
    {
        $settings = WebsiteSettings::first();
        $attributes = $request->validate([
            'button_color' => '',
            'nav_layout' => '',
            'booking_filter_layout' => '',
        ]);
        $attributes['show_booking_filter'] = $request->has('show_booking_filter');
        $attributes['show_interior'] = $request->has('show_interior');
        $attributes['show_amenities'] = $request->has('show_amenities');
        $attributes['show_room'] = $request->has('show_room');
        $settings->update($attributes);

        return redirect()->route('website-settings.index')->with('success', 'Saved');
    }
}
