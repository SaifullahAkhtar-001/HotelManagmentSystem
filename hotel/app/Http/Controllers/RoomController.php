<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Hotel;
use App\Models\Roomtype;

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
            'status' => 'required|string'
        ]);

        Room::create($attributes);


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
        $request->validate([
            'room_number' => 'required|string',
            'description' => 'required|string',
            'status' => 'required'

        ]);

        $room->update($request->all());

        return redirect()->route('rooms.index')->with('success', 'Room updated successfully.');
    }

    public function destroy(string $id)
    {
        $room = Room::findOrFail($id);

        $room->delete();

        return redirect()->route('rooms.index')->with('success', 'Room deleted successfully.');
    }
}
