<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function showDashboard()
    {
        return view('dashboard.pages.dashboard');
    }
    public function showHotelSettings()
    {
        return view('dashboard.pages.hotelSettings');
    }



}
