<?php

namespace App\Http\Controllers;

use App\Http\Requests\EvalRequest;
use App\Models\Booking;
use App\Models\Evaluation;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EvalController extends Controller
{

    public function evaluate(Request $request)
    {
        $history = Booking::query()
            ->select(
                'bookings.id as id',
                'shops.name as shop_name',
                'bookings.start as start',
                'bookings.number as number',
                'courses.name as course_name',
                'courses.price as course_price',
                'bookings.user_id as guest_id'
            )
            ->join('shops', 'bookings.shop_id', '=', 'shops.id')
            ->join('users', 'bookings.user_id', '=', 'users.id')
            ->leftjoin('courses', 'bookings.course_id', '=', 'courses.id')
            ->where('bookings.id', $request->booking_id)
            ->first();

        $id = Auth::id();
        
        if ($history->guest_id == $id) {
            return view('evaluation', [
                'history' => $history,
            ]);
        }

        abort(403);
    }

    public function create(EvalRequest $request)
    {
        $eval = $request->all();
        $booking = Booking::query()
            ->where('id', $eval['booking_id'])
            ->first();
        $user_id = Auth::id();
        if ($booking['user_id'] == $user_id) {
            Evaluation::create($eval);
            return redirect('/mypage')->with('flash_message', '評価を送信しました');
        } 

        abort(403);
    }

    public function index(Request $request)
    {
        $shop = Shop::query()
            ->select(
                'shops.id as id',
                'shops.name as name',
                'areas.name as area_name',
                'genres.name as genre_name'
            )
            ->join('areas', 'shops.area_id', '=', 'areas.id')
            ->join('genres', 'shops.genre_id', '=', 'genres.id')
            ->where('shops.id', $request->shop_id)
            ->first();

        $evals = Evaluation::query()
            ->select(
                'evaluations.star as star',
                'evaluations.comment as comment'
            )
            ->join('bookings', 'evaluations.booking_id', '=', 'bookings.id')
            ->join('shops', 'bookings.shop_id', '=', 'shops.id')
            ->where('shops.id', $request->shop_id)
            ->orderBy('evaluations.comment', 'desc')
            ->get();

        return view('eval_detail', [
            'shop' => $shop,
            'evals' => $evals
        ]);
    }
}
