<?php

namespace App\Http\Controllers;

use App\Models\WebsiteSettings;
use Illuminate\Http\Request;

class WebsiteSettingsController extends Controller
{
    public function index()
    {
        return view('dashboard.website-settings.index');
    }
    public function update(Request $request)
    {
        $attributes = $request->validate([
            'showBookingFilter' => ''
        ]);
        WebsiteSettings::create($attributes);
    }
}
