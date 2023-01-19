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
        $bookings = Booking::all()->where('user_id', $id);
        $likes = Like::all()->where('user_id', $id);
        return view('mypage', ['user' => $user, 'bookings' => $bookings, 'likes' => $likes]);
    }
}
