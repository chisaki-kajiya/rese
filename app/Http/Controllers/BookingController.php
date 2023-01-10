<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookChangeRequest;
use App\Http\Requests\BookCreateRequest;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function create(BookCreateRequest $request)
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

    public function change(BookChangeRequest $request)
    {
        $booking = $request->all();
        $booking['user_id'] = Auth::id();
        $booking['start'] = $request->date . ' ' . $request->time;
        unset($booking['_token']);
        unset($booking['date']);
        unset($booking['time']);
        Booking::where('id', $request->id)->update($booking);
        return redirect('/mypage')->with('flash_message', '予約を変更しました');
    }
}
