<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use App\Models\Hotel;
use App\Models\ImgGallery;
use App\Models\WebsiteSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class HotelController extends Controller
{
    private function getAttributes(): array
    {
        $attributes = request()->validate([
            'hotel_name' => 'required|min:3',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'zip_code' => 'required',
            'city' => 'required',
            'active' => ''
        ]);

        $attributes['active'] = request()->has('active');
        $attributes['user_id'] = auth()->id();

        return $attributes;
    }

    private function storeHotelImage(Request $request, Hotel $hotel)
    {
        $images = [];
        if ($request->hasFile('hotel_images')) {
            foreach ($request->file('hotel_images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $path = $image->storeAs('images', $imageName, 'public');
                $images[] = Storage::url($path);
            }
        }

        // Attach images to ImgGallery
        $hotel->imggallery()->createMany(array_map(function ($url) {
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

    public function index()
    {
        $hotels = Hotel::where('user_id', auth()->id())->with('facilities', 'imggallery')->get();
        return view('dashboard.hotel.index', compact('hotels'));
    }

    public function create()
    {
        $facilities = Facility::all();
        return view('dashboard.hotel.create', compact('facilities'));
    }

    public function store(Request $request)
    {
        $attributes = $this->getAttributes();
        $request->validate([
            'hotel_images.*' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
            'hotel_images' => 'required_without_all:other_field1,other_field2,...',
        ]);
        $hotel = Hotel::create($attributes);
        $this->storeHotelImage($request, $hotel);
        $hotel->facilities()->attach($request->facilities);
        WebsiteSettings::create([
            'hotel_id' => $hotel->id,
        ]);

        // Store hotel images

        return redirect()->route('hotels.index')->with('success', 'Hotel Created');
    }

    public function edit(string $id)
    {
        $hotel = Hotel::findOrFail($id);

        $hotel_images = $hotel->imggallery;

        $facilities = Facility::all();

        return view('dashboard.hotel.edit', compact('hotel', 'facilities', 'hotel_images'));
    }

    public function update(Request $request, $id)
    {
        $hotel = Hotel::find($id);
        $attributes = $this->getAttributes();

        $request->validate([
            'hotel_images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $hotel->update($attributes);
        $hotel->facilities()->sync($request->facilities);

        // Store hotel images
        $this->storeHotelImage($request, $hotel);

        // Delete old hotel images
        $this->deleteHotelImages($hotel->imggallery);


        return redirect()->route('hotels.index')->with('success', 'Hotel updated successfully.');
    }

    public function destroy(string $id)
    {
        $hotel = Hotel::findOrFail($id);
        // Delete all hotel images
        $this->deleteHotelImages($hotel->imggallery->pluck('url')->toArray());

        ImgGallery::where('imagable_id', $hotel->id)->where('imagable_type', Hotel::class)->delete();


        // Delete the hotel
        $hotel->delete();

        return redirect()->back()->with('success', 'Deleted Successfully');
    }

    public function settings($id)
    {
        $hotels = Hotel::with('facilities')->find($id);
        return view('dashboard.hotel.settings', compact('hotels'));
    }

    public function save_settings(Request $request)
    {
        $hotels = Hotel::where('user_id', auth()->id())->with('facilities')->get();
        $hotel = $hotels->first();
        $request->validate([
            'hotel_name' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'about' => 'required',
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
            'about' => $request->about,
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

        return redirect()->route('hotels.settings', ['id' => $hotel->id])->with('success', 'Hotel Settings is successfully Updated 🚀 ');
    }
}
