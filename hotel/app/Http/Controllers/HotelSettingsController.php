<?php

namespace App\Http\Controllers;
use App\Models\Hotel;

use Illuminate\Http\Request;

class HotelSettingsController extends Controller
{
    public function general()
    {
        $hotel = Hotel::where('user_id', auth()->id())->get();
        $hotel = $hotel->first();
    
        $generalSettings = [
            'hotelName' => $hotel->name,
            'hotelAddress' => $hotel->address,
            'contactInformation' => [
                'phone' => $hotel->phone ,
                'email' => $hotel->email ,
            ],
            // Add more settings as needed
        ];

        return view('dashboard.hotel-settings.general', compact('generalSettings','$hotel'));
    
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
