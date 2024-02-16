<?php

namespace App\Console;

use App\Models\Booking;
use App\Models\Room;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->call(function () {
            // Update room statuses
            $bookingsToUpdate = Booking::where('check_in', '<=', now())->where('check_out', '>=', now())->get();
            $bookingsToUpdate->each(function ($booking) {
                Room::where('id', $booking->room_id)->first()->update(['status' => 'reserved']);
            });

            $bookingsToRelease = Booking::where('check_out', '<', now())->get();
            foreach ($bookingsToRelease as $booking) {
                Room::where('id', $booking->room_id)->first()->update(['status' => 'available']);
            }
        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }

}
