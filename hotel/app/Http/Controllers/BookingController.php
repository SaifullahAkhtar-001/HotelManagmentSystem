<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Notifications\BookingsEndingSoon;

use App\Models\Guest;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;


class BookingController extends Controller
{
public function index()
    {
        
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
        $attributes = $request->validate([
            'room_id' => 'required',
             'user_id' => 'required',
            'guest_id' => 'required',
            'adults' => 'required',
            'children' => 'required',
            'nights' => 'required',
            'status' => 'required',
            'payment_status' => 'required',
            'payment_method' => 'required',
            'payment_payload' => 'required',
            'payment_amount' => 'required',
            'payment_currency' => 'required',
        ]);
        $dateTimeRange = $request->input('dateTimeRange');
        $dateTimeParts = explode(' - ', $dateTimeRange);

        if ($request->filled('dateTimeRange')) {
            $checkIn = Carbon::parse($dateTimeParts[0])->format('Y-m-d\TH:i');
            $checkOut = Carbon::parse($dateTimeParts[1])->format('Y-m-d\TH:i');
        }else{
            $checkIn = null;
            $checkOut = null;
        }
        $attributes['check_in'] = $checkIn;
        $attributes['check_out'] = $checkOut;
         $attributes['user_id'] = Auth::id();
        
        Booking::create($attributes);
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
    public function sendEndingBookingNotifications()
    {
        $endingBookings = Booking::where('check_out', '>', now())
            ->where('check_out', '<', now()->addHour())
            ->get();
            

        foreach ($endingBookings as $booking) {
            $booking->user->notify(new BookingsEndingSoon($booking));
        }

        
    }


}
