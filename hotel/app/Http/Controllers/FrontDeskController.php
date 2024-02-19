<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Roomtype;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class FrontDeskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $category = $request->input('category');
        $roomType = $request->input('roomtype');
        $capacity = $request->input('capacity');
        $price = $request->input('price');
        $dateTimeRange = $request->input('dateTimeRange');
        $dateTimeParts = explode(' - ', $dateTimeRange);

        if ($request->filled('dateTimeRange')) {
            $startDateTime = Carbon::parse($dateTimeParts[0])->format('Y-m-d\TH:i');
            $endDateTime = Carbon::parse($dateTimeParts[1])->format('Y-m-d\TH:i');
        }else{
            $startDateTime = null;
            $endDateTime = null;
        }


        $roomsQuery = Room::query();

        if ($category) {
            $roomsQuery->where('category', $category);
        }

        if ($roomType) {
            $roomsQuery->where('room_type_id', $roomType);
        }

        if ($capacity) {
            $roomsQuery->where('capacity', '>=', $capacity);
        }

        if ($price) {
            $roomsQuery->where('price', '<=', $price);
        }

        $rooms = $roomsQuery->get();

        if ($startDateTime && $endDateTime) {
            $rooms = Room::whereDoesntHave('bookings', function ($query) use ($startDateTime, $endDateTime) {
                $query->where('check_in', '<', $endDateTime)
                    ->where('check_out', '>', $startDateTime);
            })->get();
        }

        $rooms = $rooms->where('status', 'available');

        $roomtypes = Roomtype::all();

        $totalRoom = Room::all();


        return view('dashboard.frontDesk.index', compact('totalRoom' ,'rooms', 'roomtypes', 'category', 'roomType', 'capacity', 'price', 'startDateTime', 'endDateTime'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
