<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Evaluation;
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
                'shops.name as shop_name',
                'bookings.start as start',
                'bookings.number as number'
            )
            ->join('users', 'bookings.user_id', '=', 'users.id')
            ->join('shops', 'bookings.shop_id', '=', 'shops.id')
            ->where('bookings.user_id', $id)
            ->where('bookings.start', '>', date('YmdHis', strtotime('now')))
            ->orderBy('bookings.start')
            ->get();

        $histories = Booking::query()
            ->select(
                'bookings.id as id', 
                'shops.name as shop_name',
                'bookings.start as start',
                'bookings.number as number',
                'evaluations.id as eval'
            )
            ->join('users', 'bookings.user_id', '=', 'users.id')
            ->join('shops', 'bookings.shop_id', '=', 'shops.id')
            ->leftJoin('evaluations', 'bookings.id', '=', 'evaluations.booking_id')
            ->where('bookings.user_id', $id)
            ->where('bookings.start', '<', date('YmdHis', strtotime('now')))
            ->orderBy('bookings.start')
            ->get();

        $likes = Like::query()
            ->select(
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
            'histories' => $histories,
            'likes' => $likes
        ]);
    }

    public function evaluate(Request $request)
    {
        $history = Booking::query()
            ->select(
                'bookings.id as id',
                'shops.name as shop_name',
                'bookings.start as start',
                'bookings.number as number',
            )
            ->join('shops', 'bookings.shop_id', '=', 'shops.id')
            ->where('bookings.id', $request->booking_id)
            ->first();
        return view('evaluation', [
            'history' => $history,
        ]);
    }

    public function create(Request $request)
    {
        $eval = $request->all();
        Evaluation::create($eval);
        return redirect('/mypage')->with('flash_message', '評価を送信しました');
    }
}
