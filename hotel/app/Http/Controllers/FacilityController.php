<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $facilities = Facility::all();
        return view('dashboard.facility.index', compact('facilities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $isHotel = request('hotel');

        return view('dashboard.facility.create', compact('isHotel'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $this->getAttribute();

        Facility::create($attributes);

        if($request->isHotel) {
            return redirect()->route('admin.hotels.create')->with ('success','Created Successfully');
        }

        return redirect()->route('admin.facility.index')->with('success', 'Facility Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $facility = Facility::findOrFail($id);
        return view('dashboard.facility.edit',compact('facility'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $facility = Facility::findOrFail($id);
        $attributes = $this->getAttribute();
        $facility->update($attributes);

        return redirect()->route('admin.facility.index')->with('success','Facility Updated');
    }

    /**
     *
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $facility = Facility::findOrFail($id);
        $facility->delete();
        return redirect()->back()->with('success', 'Deleted Successfully');
    }

    public function getAttribute(){
        $attributes = request()->validate([
            'name' => 'required|unique:facilities'
        ]);
        return $attributes;
    }
}

