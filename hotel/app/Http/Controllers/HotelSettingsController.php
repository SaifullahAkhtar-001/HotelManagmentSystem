<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HotelSettingsController extends Controller
{
    public function general()
    {
        return view('dashboard.hotel-settings.general');
    }
    public function interior()
    {
        return view('dashboard.hotel-settings.interior');
    }
    public function amenities()
    {
        return view('dashboard.hotel-settings.amenities');
    }
}
