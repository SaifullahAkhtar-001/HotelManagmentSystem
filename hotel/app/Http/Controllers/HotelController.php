<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function showForm()
    {
        return view('dashboard.hotel.createhotel');
    }
}
