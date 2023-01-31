<?php

namespace App\Console\Commands;

use App\Models\Booking;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class BookingDate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:bookingdate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send email to the guest at the booking date';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $tomorrow = date('Y-m-d H:i:s', strtotime('+1 day'));
        $today = date('Y-m-d H:i:s', strtotime('now'));
        $bookings = Booking::query()
            ->select(
                'bookings.id as id',
                'bookings.start as start',
                'bookings.number as number',
                'users.name as guest_name',
                'users.email as email',
                'shops.name as shop_name',
                'courses.name as course_name'
            )
            ->join('users', 'bookings.user_id', '=', 'users.id')
            ->join('shops', 'bookings.shop_id', '=', 'shops.id')
            ->leftjoin('courses', 'bookings.course_id', '=', 'courses.id')
            ->whereBetween('bookings.start', [$today, $tomorrow])
            ->get();

            foreach ($bookings as $booking) {
                if ($booking->course_name == null) {
                    $booking['course_name'] = '席のみ';
                };
                
                Mail::send(['text' => 'mail.booking_date'], [
                    'booking' => $booking,
                ], function ($message) use($booking) {
                    $message
                        ->to($booking['email'])
                        ->subject('【RESE】本日はレストランの予約日です');
                });
            }
    }
}
