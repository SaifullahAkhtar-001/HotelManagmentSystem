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
        return view('dashboard.facility.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required'
        ]);

        Facility::create($attributes);

        return redirect()->route('facility.index')->with('success', 'Facility Created');
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
        $attributes = $request->validate([
            'name' => 'required'
        ]);
        $facility->update($attributes);

        return redirect()->route('facility.index')->with('success','Facility Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $facility = Facility::findOrFail($id);
        $facility->delete();
        return redirect()->back()->with('success', 'Deleted Successfully');
    }
    public function showfacility(){
        return view('dashboard.hotel.createfacility');
    }
    public function facilityCreate(request $request){
        $facility=new facility;
        $facility->name=$request->name;
        $facility->save();
        return redirect()->route('hotels.create')->with ('success','Created Successfully');
    }
}
