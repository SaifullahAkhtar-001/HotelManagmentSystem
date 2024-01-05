<?php

namespace App\Http\Controllers;

use App\Models\ImgGallery;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class RoomController extends Controller
{
    private function getHotels()
    {
        return auth()->user()->hotels;
    }

    private function storeRoomImage(Request $request)
    {
        $image = $request->file('room_img');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $path = $image->storeAs('images', $imageName, 'public');
        return Storage::url($path);
    }

    private function deleteRoomImage($oldImagePath)
    {
        if ($oldImagePath) {
            $oldImagePathRelativeToDisk = Str::after($oldImagePath, '/storage');
            Storage::disk('public')->delete($oldImagePathRelativeToDisk);
        }
    }

    public function index()
    {
        $hotels = $this->getHotels();
        $rooms = Room::whereIn('hotel_id', $hotels->pluck('id'))->get();
        return view('dashboard/rooms/index', compact('rooms'));
    }

    public function show($id)
    {
        $room = Room::findOrFail($id);
        return view('dashboard/rooms/show', compact('room'));
    }

    public function create()
    {
        $hotels = $this->getHotels();
        $roomTypes = Roomtype::all();
        $rooms = Room::all();
        return view('dashboard/rooms/create', compact('hotels', 'roomTypes', 'rooms'));
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'hotel_id' => 'required|exists:hotels,id,user_id,' . auth()->id(),
            'room_type_id' => 'required|exists:roomtypes,id',
            'room_number' => 'required',
            'description' => 'nullable|string',
            'status' => 'required|string',
        ]);

        $request->validate([
            'room_img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $room = Room::create($attributes);


        $imageUrl = $this->storeRoomImage($request);

        ImgGallery::create([
            'url' => $imageUrl,
            'imagable_id' => $room->id,
            'imagable_type' => Room::class
        ]);

        return redirect()->route('rooms.index')->with('success', 'Room created successfully.');
    }

    public function edit(Request $request, $id)
    {
        $room = Room::findOrFail($id);
        $hotels = $this->getHotels();
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

        $request->validate([
            'room_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $room->update($attributes);
        $oldImagePath = $room->imggallery->first()->url ?? null;


        if ($request->hasFile('room_img')) {
            $imageUrl = $this->storeRoomImage($request);

            // Update the image in ImgGallery
            $room->imgGallery()->update(['url' => $imageUrl]);

            $this->deleteRoomImage($oldImagePath);
        }

        return redirect()->route('rooms.index')->with('success', 'Room updated successfully.');
    }

    public function destroy(string $id)
    {
        $room = Room::findOrFail($id);
        $oldImagePath = $room->imggallery->first()->url ?? null;

        $this->deleteRoomImage($oldImagePath);

        ImgGallery::where('imagable_id', $room->id)->where('imagable_type', Room::class)->delete();
        $room->delete();

        return redirect()->route('rooms.index')->with('success', 'Room deleted successfully.');
    }
}
