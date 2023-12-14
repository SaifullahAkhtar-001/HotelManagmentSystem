<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hotels = Hotel::where('user_id', auth()->id())->with('facilities')->get();
        return view('dashboard.hotel.index', compact('hotels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $facilities = Facility::all();
        return view('dashboard.hotel.create', compact('facilities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $this->getAttributes();

        $hotel = Hotel::create($attributes);

        $hotel->facilities()->attach($request->facilities);

        return redirect()->route('hotels.index')->with('success', 'Hotel Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
//        $hotel = Hotel::findOrFail($id);
//
//        return view('dashboard.hotel.index',[
//            'hotels' => $hotel->toArray(),
//        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $hotel = Hotel::findOrFail($id);
        $facilities = Facility::all();
        return view('dashboard.hotel.edit',compact('hotel','facilities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $hotel = Hotel::find($id);
        $attributes = $this->getAttributes();
        $hotel->update($attributes);
        $hotel->facilities()->sync($request->facilities);
        return redirect()->route('hotels.index')->with('success', 'Post is successfully Updated 🚀 ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $hotel = Hotel::findOrFail($id);
        $hotel->delete();
        return redirect()->back()->with('success', 'Deleted Successfully');
    }

    public function getAttributes(): array
    {
        $attributes = request()->validate([
            'hotel_name' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'active' => ''
        ]);
        $attributes['active'] ??= 0;
        $attributes['user_id'] = auth()->id();

        return $attributes;

    }
    public function general(){
        return view('dashboard.hotel-settings.general');
    }
    public function amenities(){
        return view('dashboard.hotel-settings.amenities');
    }
    public function interior(){
        return view('dashboard.hotel-settings.interior');
    }

}
