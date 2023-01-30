<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function index(Request $request)
    {
        $booking = Booking::query()
            ->select(
                'bookings.id as id',
                'bookings.start as start',
                'bookings.number as number',
                'users.name as guest_name',
                'shops.name as shop_name'
            )
            ->join('users', 'bookings.user_id', '=', 'users.id')
            ->join('shops', 'bookings.shop_id', '=', 'shops.id')
            ->where('bookings.id', $request->id)
            ->first();

        return view('mail', [
            'booking' => $booking,
        ]);
    }

    public function send(Request $request)
    {
        $user = Booking::query()
            ->select('users.email')
            ->join('users', 'bookings.user_id', '=', 'users.id')
            ->where('bookings.id', $request->id)
            ->first();
        $email = $user->email;
        $text = $request->text;
        $url = '/rep/qrcode?booking_id=' . $request->id;

        Mail::send('mail.booking_confirm', [
            'text' => $text,
            'url' => $url
        ], function($message) use ($email) {
            $message
                ->to($email)
                ->subject('【RESE】ご予約確定');
        });
        
        return redirect ('/rep')->with('flash_message', 'メールを送信しました');
    }

    public function qrcode(Request $request)
    {
        $booking = Booking::query()
            ->select(
                'bookings.id as id',
                'users.name as user_name',
                'shops.name as shop_name',
                'bookings.number as number',
                'bookings.start as start',
            )
            ->join('users', 'bookings.user_id', '=', 'users.id')
            ->join('shops', 'bookings.shop_id', '=', 'shops.id')
            ->where('bookings.id', $request->booking_id)
            ->first();

        return view('check_qrcode', [
            'booking' => $booking
        ]);
    }
}
