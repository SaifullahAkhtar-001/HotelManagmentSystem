<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\WebsiteSettings;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        $showBookingFilter = WebsiteSettings::first()->showBookingFilter;

        $hotel = Hotel::first();
        $website_settings = WebsiteSettings::first();
        return view('public.welcome',compact('hotel', 'website_settings'));
    }
}
