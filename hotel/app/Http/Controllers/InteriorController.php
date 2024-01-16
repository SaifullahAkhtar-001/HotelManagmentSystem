<?php

namespace App\Http\Controllers;

use App\Models\ImgGallery;
use App\Models\Interior;
use App\Models\Roomtype;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\In;

class InteriorController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    private function storeHotelImage(Request $request, Interior $interior)
    {
        $images = [];
        if ($request->hasFile('interior_images')) {
            foreach ($request->file('interior_images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $path = $image->storeAs('images', $imageName, 'public');
                $images[] = Storage::url($path);
            }
        }

        // Attach images to ImgGallery
        $interior->imggallery()->createMany(array_map(function ($url) {
            return ['url' => $url];
        }, $images));
    }
    public function index()
    {
        $interiors = Interior::all();
        return view('dashboard.interior.index', compact('interiors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $hotels = auth()->user()->hotels;
        return view('dashboard.interior.create', compact('hotels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $interior = Interior::where('hotel_id', $request->hotel_id)->first();
        $request->validate([
            'interior_images.*' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
            'interior_images' => 'required_without_all:other_field1,other_field2,...',
        ]);

        $this->storeHotelImage($request, $interior);

        return redirect()->route('interior.index')->with('success', 'Interior created successfully');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
      //
    }
}
