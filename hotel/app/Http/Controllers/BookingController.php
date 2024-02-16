<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Guest;
use App\Models\Room;
use Illuminate\Http\Request;

class BookingController extends Controller
{
public function index()
    {
        $bookingsToUpdate = Booking::where('check_in', '<=', now())->where('check_out', '>=', now())->get();
        dd($bookingsToUpdate);
        $bookings = Booking::all();
        return view('dashboard.booking.index', compact('bookings'));
    }
    public function create($id)
    {
        $room = Room::findOrFail($id);
        $guests = Guest::all();

        return view('dashboard.booking.create', compact('room', 'guests'));
    }

    public function store(Request $request)
    {
        Booking::create($request->validate([
            'room_id' => 'required',
            'guest_id' => 'required',
            'check_in' => 'required',
            'check_out' => 'required',
            'adults' => 'required',
            'children' => 'required',
            'nights' => 'required',
            'status' => 'required',
            'payment_status' => 'required',
            'payment_method' => 'required',
            'payment_payload' => 'required',
            'payment_amount' => 'required',
            'payment_currency' => 'required',
        ]));
        return redirect()->route('admin.booking.index')->with('success', 'Booking created successfully');
    }

    public function show($id)
    {
        $booking = Booking::findOrFail($id);
        return view('dashboard.booking.show', compact('booking'));
    }

    public function edit($id)
    {
        $booking = Booking::findOrFail($id);
        $guests = Guest::all();
        $rooms = Room::all();
        return view('dashboard.booking.edit', compact('booking', 'guests', 'rooms'));
    }

    public function update(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->update($request->validate([
            'room_id' => 'required',
            'guest_id' => 'required',
            'check_in' => 'required',
            'check_out' => 'required',
            'adults' => 'required',
            'children' => 'required',
            'nights' => 'required',
            'status' => 'required',
            'payment_status' => 'required',
            'payment_method' => 'required',
            'payment_payload' => 'required',
            'payment_amount' => 'required',
            'payment_currency' => 'required',
        ]));
        return redirect()->route('admin.booking.index')->with('success', 'Booking updated successfully');
    }

    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();
        return redirect()->route('admin.booking.index')->with('success', 'Booking deleted successfully');
    }


}
