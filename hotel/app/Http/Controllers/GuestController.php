<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    private function getAttributes()
    {
        $attributes = request()->validate([
            'name' => 'required',
            'email' => 'required|unique:guests',
            'phone' => 'required|unique:guests',
            'address' => 'required',
        ]);

        return $attributes;
    }
    public function index()
    {
        $guests = Guest::all();
        return view('dashboard.guest.index' , compact('guests'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.guest.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $this->getAttributes();
        Guest::create($attributes);
        return redirect()->route('admin.guest.index')->with('success', 'Guest created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $guest = Guest::findOrFail($id);
        return view('dashboard.guest.show', compact('guest'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $guest = Guest::findOrFail($id);
       return view('dashboard.guest.edit', compact('guest'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Guest::findOrFail($id)->update(request()->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]));
        return redirect()->route('admin.guest.index')->with('success', 'Guest updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Guest::findOrFail($id)->delete();
        return redirect()->route('admin.guest.index')->with('success', 'Guest deleted successfully');
    }
}
