<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function create(Request $request)
    {
        $booking = $request->all();
        $booking['user_id'] = Auth::id();
        $booking['start'] = $request->date.' '.$request->time;
        Booking::create($booking);
        return view('done');
    }

    public function cancel(Request $request
)
    {
        Booking::find($request->id)->delete();
        return redirect('/mypage');
    }
}
