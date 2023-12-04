<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function showDashboard()
    {
        return view('dashboard.pages.dashboard');
    }
    public function showHotelGeneralSettings()
    {
        return view('dashboard.pages.hotelgeneralsettings');
    }
    public function showHotelInteriorSettings()
    {
        return view('dashboard.pages.hotelinteriorsettings');
    }
    public function showHotelAmenitiesSettings()
    {
        return view('dashboard.pages.hotelamenitiessettings');
    }



}
