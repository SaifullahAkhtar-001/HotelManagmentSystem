<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class notHotelController extends Controller
{
    public function create()
    {
        return view('dashboard.hotel.create');
    }
    public function show(){
        return view('dashboard.hotel.index',[
            'hotels' => Hotel::all(),
        ]);
    }

    public function store(){

//        $userID = auth()->id();

        $attributes = request()->validate([
            'hotel_name' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
        ]);
        $attributes['user_id'] = auth()->id();

        Hotel::create($attributes);

        return redirect()->route('showhotel')->with('success','Hotel Created');
    }
    public function destroy($id){
        $hotel = Hotel::findOrFail($id);
        $hotel->delete();
        return redirect()->back()->with('success', 'Deleted Successfully');

    }
}
