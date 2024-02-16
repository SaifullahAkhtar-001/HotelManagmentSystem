<?php

namespace App\Console\Commands;

use App\Models\Booking;
use App\Models\Room;
use Illuminate\Console\Command;

class UpdateRoomStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update-room-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Update room statuses for bookings to update
        $bookingsToUpdate = Booking::where('check_in', '<=', now())->where('check_out', '>=', now())->get();
        foreach ($bookingsToUpdate as $booking) {
            Room::where('id', $booking->room_id)->update(['status' => 'reserved']);
        }

        // Update room statuses for bookings to release
        $bookingsToRelease = Booking::where('check_out', '<', now())->get();
        foreach ($bookingsToRelease as $booking) {
            Room::where('id', $booking->room_id)->update(['status' => 'available']);
            $booking->delete();
        }
    }
}
