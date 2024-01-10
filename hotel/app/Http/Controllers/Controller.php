<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Room;
use App\Models\Roomtype;
use App\Models\WebsiteSettings;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        $hotel = Hotel::first();
        $website_settings = WebsiteSettings::first();
        $room_types = Roomtype::all();
        return view('public.welcome',compact('hotel', 'website_settings', 'room_types'));
    }
    public function room($id)
    {
        $room = Roomtype::findOrFail($id);
        $website_settings = WebsiteSettings::first();
        return view('public/pages/room', compact('room', 'website_settings'));

    }
}
