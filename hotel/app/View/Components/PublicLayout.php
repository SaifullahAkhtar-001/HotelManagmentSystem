<?php

namespace App\View\Components;

use App\Models\Hotel;
use Illuminate\View\Component;
use Illuminate\View\View;

class PublicLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {

        $hotel = Hotel::first();
        return view('layouts.public', compact('hotel'));
    }
}
