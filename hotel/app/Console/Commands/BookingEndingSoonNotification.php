<?php

namespace App\Console\Commands;

use App\Models\Booking;
use App\Notifications\BookingsEndingSoon;
use Illuminate\Console\Command;

class BookingEndingSoonNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'booking-ending-soon-notification';

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
        $endingBookings = Booking::where('check_out', '>', now())
            ->where('check_out', '<', now()->addHour())
            ->get();


        foreach ($endingBookings as $booking) {
            $booking->guest->notify(new BookingsEndingSoon($booking));
        }
    }
}
