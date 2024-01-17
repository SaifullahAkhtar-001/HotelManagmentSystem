<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Interior;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InteriorController extends Controller
{
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


    /**
     * Show the form for creating a new resource.
     */
    public function index($id)
    {
        $interiors = Interior::where('hotel_id', $id)->get();
        $hotel = Hotel::findOrFail($id);
        return view('dashboard.interior.index', compact('hotel','interiors'));
    }

    public function create($id)
    {
        $hotels = Hotel::findOrFail($id);
        return view('dashboard.interior.create', compact('hotels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $hotel = Hotel::findOrFail($request->hotel_id);
        $interior = Interior::where('hotel_id', $request->hotel_id)->first();
        $request->validate([
            'interior_images.*' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
            'interior_images' => 'required_without_all:other_field1,other_field2,...',
        ]);

        $this->storeHotelImage($request, $interior);

        return redirect()->route('hotels.interior', $hotel->id)->with('success', 'Interior created successfully');
    }
}
