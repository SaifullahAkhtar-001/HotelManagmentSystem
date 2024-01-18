<?php

namespace App\Http\Controllers;

use App\Models\Amenity;
use App\Models\Hotel;
use App\Models\Interior;
use App\Models\Roomtype;
use App\Models\WebsiteSettings;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $hotel = Hotel::first();
        $website_settings = WebsiteSettings::first();
        $room_types = Roomtype::all();
        $interior = Interior::where('hotel_id', $hotel->id)->get()->first();
        $amenities = Amenity::where('hotel_id', $hotel->id)->get();
        return view('public.welcome',compact('hotel', 'website_settings', 'room_types', 'interior', 'amenities'));
    }
    public function room($id)
    {
        $room = Roomtype::findOrFail($id);
        $website_settings = WebsiteSettings::first();
        return view('public/pages/room', compact('room', 'website_settings'));

    }

    public function terms(int $id)
    {
        $website_settings = Hotel::findOrFail($id)->website_settings;
        $terms = Hotel::findOrFail($id)->term;
        return view('public/pages/terms', compact('website_settings', 'terms'));
    }
}
