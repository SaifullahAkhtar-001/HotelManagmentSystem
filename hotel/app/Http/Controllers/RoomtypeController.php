<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\ImgGallery;
use App\Models\Room;
use App\Models\Roomtype;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class RoomtypeController extends Controller
{

    private function storeHotelImage(Request $request, Roomtype $roomtype)
    {
        $images = [];
        if ($request->hasFile('roomtype_images')) {
            foreach ($request->file('roomtype_images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $path = $image->storeAs('images', $imageName, 'public');
                $images[] = Storage::url($path);
            }
        }

        // Attach images to ImgGallery
        $roomtype->imggallery()->createMany(array_map(function ($url) {
            return ['url' => $url];
        }, $images));
    }

    private function deleteHotelImages($imageUrls)
    {
        foreach ($imageUrls as $imageUrl) {
                $imagePathRelativeToDisk = Str::after($imageUrl, '/storage');
                Storage::disk('public')->delete($imagePathRelativeToDisk);
        }
    }

    private function attributes(Request $request): array
    {
        $attributes = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:555',
            'cancellation_policy' => 'required|string|max:555',
            'price' => 'required|numeric',
            'capacity' => 'required|numeric',
            'size' => 'required|numeric',
        ]);
        return $attributes;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roomtypes = Roomtype::all();
        return view('dashboard.room-type.index', compact('roomtypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.room-type.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $this->attributes($request);
        $request->validate([
            'roomtype_images.*' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
            'roomtype_images' => 'required_without_all:other_field1,other_field2,...',
        ]);
        $roomtype = Roomtype::create($attributes);
        $this->storeHotelImage($request, $roomtype);

        return redirect()->route('roomtype.index')->with('success', 'Room type created successfully.');
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
        $roomtype = Roomtype::findOrFail($id);
        return view('dashboard.room-type.edit', compact('roomtype'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $roomtype = Roomtype::findOrFail($id);
        $attributes = $this->attributes($request);

        $request->validate([
            'roomtype_images.*' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $roomtype->update($attributes);

        $this->storeHotelImage($request, $roomtype);

        return redirect()->route('roomtype.index')->with('success', 'Room type updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $roomtype = Roomtype::findOrFail($id);

        $this->deleteHotelImages($roomtype->imggallery->pluck('url')->toArray());
        ImgGallery::where('imagable_id', $roomtype->id)->where('imagable_type', Roomtype::class)->delete();
        $roomtype->delete();

        return redirect()->route('roomtype.index')->with('success', 'Room type deleted successfully.');
    }
}
