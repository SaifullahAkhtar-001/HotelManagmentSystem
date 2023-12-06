<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function showDashboard()
    {
        return view('dashboard.dashboard');
    }
    public function showHotelGeneralSettings()
    {
        return view('dashboard.settings.hotelgeneralsettings');
    }
    public function showHotelInteriorSettings()
    {
        return view('dashboard.settings.hotelinteriorsettings');
    }
    public function showHotelAmenitiesSettings()
    {
        return view('dashboard.settings.hotelamenitiessettings');
    }



}
