<?php

namespace App\Http\Controllers;

use App\Models\Amenity;
use App\Models\Hotel;
use App\Models\ImgGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AmenityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private function getAttributes(Request $request) : array
    {
        $attributes = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'hotel_id' => '',
        ]);
        return $attributes;
    }
    private function storeImage(Request $request): string
    {
        $image = $request->file('amenity_img');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $path = $image->storeAs('images', $imageName, 'public');
        return Storage::url($path);
    }

    private function deleteImage($oldImagePath)
    {
        if ($oldImagePath) {
            $oldImagePathRelativeToDisk = Str::after($oldImagePath, '/storage');
            Storage::disk('public')->delete($oldImagePathRelativeToDisk);
        }
    }
    public function index(int $id)
    {
        $hotel = Hotel::findOrFail($id);
        $amenities = Amenity::where('hotel_id', $id)->paginate(10);
        return view('dashboard.amenity.index', compact('amenities', 'hotel'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(int $id)
    {
        $hotel = Hotel::findOrFail($id);
        return view('dashboard.amenity.create' ,compact('hotel'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $this->getAttributes($request);

        $request->validate([
            'amenity_img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $amenity = Amenity::create($attributes);

        $imageUrl = $this->storeImage($request);

        ImgGallery::create([
            'url' => $imageUrl,
            'imagable_id' => $amenity->id,
            'imagable_type' => Amenity::class
        ]);

        $hotel = Hotel::findOrFail($amenity->hotel_id);

        return redirect()->route('hotels.amenity', $hotel->id)->with('success', 'Amenity created successfully.');
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
        $amenity = Amenity::findOrFail($id);
        return view('dashboard.amenity.edit' , compact('amenity'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $amenity = Amenity::findOrFail($id);
        $attributes = $this->getAttributes($request);
        $request->validate([
            'amenity_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $amenity->update($attributes);

        $oldImagePath = $amenity->imggallery->url ?? null;


        if ($request->hasFile('amenity_img')) {
            $imageUrl = $this->storeImage($request);


            // Update the image in ImgGallery
            $amenity->imgGallery()->update(['url' => $imageUrl]);

            $this->deleteImage($oldImagePath);
        }

        $hotel = Hotel::findOrFail($amenity->hotel_id);

        return redirect()->route('hotels.amenity', $hotel->id)->with('success', 'Amenity updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $amenity = Amenity::findOrFail($id);
        $hotel = Hotel::findOrFail($amenity->hotel_id);
        $oldImagePath = $amenity->imggallery->url ?? null;

        $this->deleteImage($oldImagePath);

        ImgGallery::where('imagable_id', $amenity->id)->where('imagable_type', Amenity::class)->delete();

        $amenity->delete();

        return redirect()->route('hotels.amenity', $hotel->id)->with('success', 'Amenity deleted successfully.');
    }
}
