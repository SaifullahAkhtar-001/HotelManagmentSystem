<?php

namespace App\Http\Controllers;
use App\Models\Hotel;
use Illuminate\Http\Request;

use App\Models\Settings;




class HotelSettingsController extends Controller
{
    public function general()
   
   
    {
        $hotel = Hotel::with('settings')->where('user_id', auth()->id())->firstOrFail();

        return view('dashboard.hotel-settings.general', compact('hotel'));
    }

    public function updateGeneral(Request $request)
    {
        $request->validate([
            'hotel_name' => 'required|string',
            'hotel_address' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            // Add more validation rules as needed
        ]);

        $hotel = Hotel::where('user_id', auth()->id())->firstOrFail();

        // Update or create settings
        $hotel->settings()->updateOrCreate(
            [],
            $request->only(['hotel_name', 'hotel_address', 'phone', 'email'])
        );

        return redirect()->route('hotel.settings.general')->with('success', 'General settings updated successfully.');
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
