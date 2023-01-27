<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $id = Auth::id();

        $bookings = Booking::query()
            ->select(
                'bookings.id as id', 
                'bookings.user_id as user_id',
                'users.name as user_name',
                'bookings.shop_id as shop_id',
                'shops.name as shop_name',
                'bookings.start as start',
                'bookings.number as number'
            )
            ->join('users', 'bookings.user_id', '=', 'users.id')
            ->join('shops', 'bookings.shop_id', '=', 'shops.id')
            ->where('bookings.user_id', $id)
            ->get();

        $likes = Like::query()
            ->select(
                'likes.user_id as user_id',
                'users.name as user_name',
                'likes.shop_id as shop_id',
                'shops.name as shop_name',
                'areas.name as area_name',
                'genres.name as genre_name',
                'shops.image_path as image_path'
            )
            ->join('users', 'likes.user_id', '=', 'users.id')
            ->join('shops', 'likes.shop_id', '=', 'shops.id')
            ->join('areas', 'shops.area_id', '=', 'areas.id')
            ->join('genres', 'shops.genre_id', '=', 'genres.id')
            ->where('likes.user_id', $id)
            ->get();

        return view('mypage', [
            'user' => $user,
            'bookings' => $bookings,
            'likes' => $likes
        ]);
    }
}
