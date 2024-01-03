<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\WebsiteSettings;
use Illuminate\Http\Request;

class WebsiteSettingsController extends Controller
{
    public function index()
    {
        $hotel = auth()->user()->hotels->first();
        $settings = WebsiteSettings::where('hotel_id', $hotel->id)->first();
        return view('dashboard.website-settings.index', compact('settings', 'hotel'));
    }
    public function update(Request $request)
    {
        $hotel = auth()->user()->hotels->first();
        $settings = WebsiteSettings::where('hotel_id', $hotel->id)->first();
        $attributes = $request->validate([
            'button_color' => '',
            'hr_color' => '',
            'nav_layout' => '',
            'booking_filter_layout' => '',
            'hero_section_image_url' => '',
        ]);
        $attributes['show_booking_filter'] = $request->has('show_booking_filter');
        $attributes['show_interior'] = $request->has('show_interior');
        $attributes['show_amenities'] = $request->has('show_amenities');
        $attributes['show_room'] = $request->has('show_room');
        $settings->update($attributes);

        return redirect()->route('website-settings.index')->with('success', 'Saved');
    }
}
