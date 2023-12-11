<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.hotel.index', [
            'hotels' => Hotel::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.hotel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $this->getAttributes();

        Hotel::create($attributes);

        return redirect()->route('hotel.index')->with('success', 'Hotel Created');
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
        return view('dashboard.hotel.edit', [
            'hotel' => $hotel,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id)
    {
        $hotel = Hotel::find($id);
        $attributes = $this->getAttributes();
        $hotel->update($attributes);
        return redirect()->route('hotel.index')->with('success', 'Post is successfully Updated 🚀 ');
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
        ]);
        $attributes['user_id'] = auth()->id();

        return $attributes;

    }
}
