<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Like;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $id = Auth::id();
        $booking = Booking::query();
        $bookings = $booking->where('user_id', $id)->get();

        $like = Like::query();
        $likes = $like->where('user_id', $id)->get();

        return view('mypage', ['user' => $user, 'bookings' => $bookings, 'likes' => $likes]);
    }
}
