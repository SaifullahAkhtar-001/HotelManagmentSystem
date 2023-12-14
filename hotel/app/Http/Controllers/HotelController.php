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
        return view('dashboard.hotel.edit', compact('hotel', 'facilities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
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

    public function settings()
    {
        $hotels = Hotel::where('user_id', auth()->id())->with('facilities')->get();
        $hotels = $hotels->first();
        return view('dashboard.hotel.settings' ,compact('hotels'));
    }

    public function save_settings(Request $request){
        $hotels = Hotel::where('user_id', auth()->id())->with('facilities')->get();
        $hotel = $hotels->first();
        $request->validate([
            'hotel_name' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'interior_description' => 'required',
            'amenities_description' => 'required',
            'amenity1' => 'required',
            'amenity1_description' => 'required',
            'amenity2' => 'required',
            'amenity2_description' => 'required',
            'amenity3' => 'required',
            'amenity3_description' => 'required',
            'amenity4' => 'required',
            'amenity4_description' => 'required',
        ]);

        $hotel->update([
            'hotel_name' => $request->hotel_name,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'city' => $request->city,
            'interior' => ['description' => $request->interior_description],
            'amenities' => [
                'description' => $request->amenities_description,
                'amenity1' => $request->amenity1,
                'amenity1_description' => $request->amenity1_description,
                'amenity2' => $request->amenity2,
                'amenity2_description' => $request->amenity2_description,
                'amenity3' => $request->amenity3,
                'amenity3_description' => $request->amenity3_description,
                'amenity4' => $request->amenity4,
                'amenity4_description' => $request->amenity4_description,
            ],
        ]);
        return redirect()->route('hotels.settings')->with('success', 'Post is successfully Updated 🚀 ');



    }

}
