<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\ImgGallery;
use App\Models\Roomtype;
use App\Models\WebsiteSettings;
use Illuminate\Http\Request;

class WebsiteSettingsController extends Controller
{
    public function index()
    {
        $roomtypes = Roomtype::all();
        $hotel = auth()->user()->hotels->first();
        $settings = WebsiteSettings::where('hotel_id', $hotel->id)->first();
        return view('dashboard.website-settings.index', compact('settings', 'hotel', 'roomtypes'));
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
            'interior_display_format' => '',
        ]);
        $attributes['show_booking_filter'] = $request->has('show_booking_filter');
        $attributes['show_interior'] = $request->has('show_interior');
        $attributes['show_amenities'] = $request->has('show_amenities');
        $attributes['show_room'] = $request->has('show_room');
        $hotels = Hotel::all();
        foreach ($hotels as $hotel) {
            $hotel->imggallery()->update(['is_hero' => false]);
            $hotel->imggallery()->where('id', $request->input('hotel_'.$hotel->id))->update(['is_hero' => true]);
        }

        $types = Roomtype::all();
        foreach ($types as $type) {
            $type->imggallery()->update(['is_hero' => false]);
            $type->imggallery()->where('id', $request->input('room_type_'.$type->id))->update(['is_hero' => true]);
        }
        $settings->update($attributes);

        return redirect()->route('website-settings.index')->with('success', 'Saved');
    }
}
