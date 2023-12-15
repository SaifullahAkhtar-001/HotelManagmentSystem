<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Hotel;

class RoomController extends Controller
{
    public function index()
    {
        // Get all hotels related to the authenticated user
        $hotels = auth()->user()->hotels;
        // Get all rooms related to the hotels
        $rooms = Room::whereIn('hotel_id', $hotels->pluck('id'))->get();


        return view('dashboard/rooms/index', compact('rooms'));
    }

    public function create()
    {
        // Get all hotels related to the authenticated user
        $hotels = auth()->user()->hotels;

        dd($hotels);

        return view('dashboard/rooms/create', compact('hotels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'hotel_id' => 'required|exists:hotels,id,user_id,' . auth()->id(),
            'room_number' => 'required|string',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            // Add more validation rules as needed
        ]);

        $room = new Room($request->all());
        $room->save();

        return redirect()->route('rooms.index')->with('success', 'Room created successfully.');
    }

    public function edit(Room $room)
    {
        // Check if the room is related to the authenticated user's hotels
        if (!$this->isUserRoom($room)) {
            return redirect()->route('rooms.index')->with('error', 'Unauthorized.');
        }

        return view('rooms.edit', compact('room'));
    }

    public function update(Request $request, Room $room)
    {
        // Check if the room is related to the authenticated user's hotels
        if (!$this->isUserRoom($room)) {
            return redirect()->route('rooms.index')->with('error', 'Unauthorized.');
        }

        $request->validate([
            'room_number' => 'required|string',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            // Add more validation rules as needed
        ]);

        $room->update($request->all());

        return redirect()->route('rooms.index')->with('success', 'Room updated successfully.');
    }

    public function destroy(Room $room)
    {
        // Check if the room is related to the authenticated user's hotels
        if (!$this->isUserRoom($room)) {
            return redirect()->route('rooms.index')->with('error', 'Unauthorized.');
        }

        $room->delete();

        return redirect()->route('rooms.index')->with('success', 'Room deleted successfully.');
    }

    private function isUserRoom(Room $room)
    {
        // Check if the room's hotel is related to the authenticated user
        return auth()->user()->hotels->contains($room->hotel);
    }
}
