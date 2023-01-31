<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookChangeRequest;
use App\Http\Requests\BookCreateRequest;
use App\Models\Booking;
use App\Models\Course;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;

class BookingController extends Controller
{
    public function create(BookCreateRequest $request)
    {
        if($request->course_id == 0){
            $booking = $request->all();
            $booking['user_id'] = Auth::id();
            $booking['start'] = $request->date . ' ' . $request->time;

            Booking::create($booking);

            return view('done');

        } else {
            $shop = Shop::select('id', 'name')
                ->where('id', $request->shop_id)
                ->first();
            $course = Course::all()
                ->where('id', $request->course_id)
                ->first();
            $user = Auth::user();
            $number = $request->number;
            $date = $request->date;
            $time = $request->time;
            $total = $course->price * $number;

            return view('pay', [
                'shop' => $shop,
                'user' => $user,
                'number' => $number,
                'date' => $date,
                'time' => $time,
                'course' => $course,
                'total' => $total
            ]);
        }
    }

    public function pay(Request $request)
    {
        try {
            $total = $request['total'];

            Stripe::setApiKey(env('STRIPE_SECRET'));

            $customer = Customer::create(array(
                'email' => $request->stripeEmail,
                'source' => $request->stripeToken
            ));

            $charge = Charge::create(array(
                'customer' => $customer->id,
                'amount' => $total,
                'currency' => 'jpy'
            ));

            $booking = $request->all();
            $booking['start'] = $request->date . ' ' . $request->time;

            Booking::create($booking);

            return view('done');
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }

    public function cancel(Request $request
)
    {
        Booking::find($request->id)->delete();

        return redirect('/mypage')->with('flash_message', '予約をキャンセルしました');
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
