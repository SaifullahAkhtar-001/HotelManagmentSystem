<?php

namespace App\Http\Controllers;

use App\Models\ImgGallery;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Roomtype;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class RoomController extends Controller
{
    public function index()
    {

        $hotels = auth()->user()->hotels;

        $rooms = Room::whereIn('hotel_id', $hotels->pluck('id'))->get();


        return view('dashboard/rooms/index', compact('rooms',));
    }

    public function create()
    {

        $hotels = auth()->user()->hotels;

        $roomTypes = Roomtype::all();
        $rooms = Room::all();

        return view('dashboard/rooms/create', compact('hotels', 'roomTypes', 'rooms'));
    }

    public function store(Request $request)
    {
        $attributes =  $request->validate([
            'hotel_id' => 'required|exists:hotels,id,user_id,' . auth()->id(),
            'room_type_id' => 'required|exists:roomtypes,id',
            'room_number' => 'required',
            'description' => 'nullable|string',
            'status' => 'required|string',
        ]);

        $room = Room::create($attributes);
        $request->validate([
            'room_img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if ($request->hasFile('room_img')) {

            $image = $request->file('room_img');


            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $path = $image->storeAs('images', $imageName, 'public');

            $imageUrl = Storage::url($path);
        }
        ImgGallery::create([
            'url' => $imageUrl,
            'imagable_id' => $room->id,
            'imagable_type' => Room::class
        ]);

        return redirect()->route('rooms.index')->with('success', 'Room created successfully.');
    }

    public  function edit(Request $request, $id)
    {

        $room = Room::findOrFail($id);
        $hotels = auth()->user()->hotels;
        $roomTypes = RoomType::all();

        return view('dashboard.rooms.edit', compact('room', 'hotels', 'roomTypes'));
    }


    public function update(Request $request, $id)
    {

        $room = Room::findOrFail($id);
        $attributes = $request->validate([
            'room_number' => 'required|string',
            'description' => 'required|string',
            'status' => 'required'
        ]);

        $room->update($attributes);
        $oldImagePath = $room->imggallery->first()->url ?? null;

        $request->validate([
            'room_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('room_img')) {
            $image = $request->file('room_img');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('images', $imageName, 'public');
            $imageUrl = Storage::url($path);

            // Update the image in ImgGallery
            $room->imgGallery()->update(['url' => $imageUrl]);

            if ($oldImagePath) {
                $oldImagePathRelativeToDisk = Str::after($oldImagePath, '/storage');

                Storage::disk('public')->delete($oldImagePathRelativeToDisk);

            }
        }

        return redirect()->route('rooms.index')->with('success', 'Room updated successfully.');
    }

    public function destroy(string $id)
    {
        $room = Room::findOrFail($id);
        $oldImagePath = $room->imggallery->first()->url;
        if ($oldImagePath) {
            $oldImagePathRelativeToDisk = Str::after($oldImagePath, '/storage');

            Storage::disk('public')->delete($oldImagePathRelativeToDisk);

        }
        ImgGallery::where('imagable_id', $room->id)->where('imagable_type' , Room::class)->delete();
        $room->delete();

        return redirect()->route('rooms.index')->with('success', 'Room deleted successfully.');
    }
}
