<?php

// app/Http/Controllers/RoomController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Hotel;

class RoomController extends Controller
{
    public function index()
    {
        $hotel = Hotel::where('user_id', auth()->id())->firstOrFail();
        $rooms = $hotel->rooms;

        return view('rooms.index', compact('rooms'));
    }

    public function create()
    {
        return view('rooms.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_number' => 'required|string',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            // Add more validation rules as needed
        ]);

        $hotel = Hotel::where('user_id', auth()->id())->firstOrFail();

        $room = new Room($request->all());
        $room->hotel()->associate($hotel);
        $room->save();

        return redirect()->route('rooms.index')->with('success', 'Room created successfully.');
    }

    public function edit(Room $room)
    {
        return view('rooms.edit', compact('room'));
    }

    public function update(Request $request, Room $room)
    {
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
        $room->delete();

        return redirect()->route('rooms.index')->with('success', 'Room deleted successfully.');
    }
}

