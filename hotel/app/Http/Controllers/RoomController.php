<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function showRooms()
    {
        return view('dashboard.rooms.showrooms');
    }
}
