<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Booking;
use App\Models\Genre;
use App\Models\Shop;
use App\Http\Requests\ShopCreateRequest;
use App\Http\Requests\ShopChangeRequest;
use App\Models\Representative;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RepController extends Controller
{
    public function index()
    {
        $areas = Area::all()->pluck('name', 'id');
        $genres = Genre::all()->pluck('name', 'id');
        $user = Auth::user();

        $shop = Shop::query()
            ->select(
                'shops.id as id',
                'shops.name as name',
                'shops.image_path as image_path',
                'shops.outline as outline',
                'areas.name as area_name',
                'genres.name as genre_name',
            )
            ->join('areas', 'shops.area_id', '=', 'areas.id')
            ->join('genres', 'shops.genre_id', '=', 'genres.id')
            ->join('representatives', 'shops.id', '=', 'representatives.shop_id')
            ->where('representatives.user_id', Auth::id())
            ->first();

        $bookings = "";
        if($shop){
            $today = date('Ymd', strtotime('now'));
            $bookings = Booking::orderBy('start', 'asc')
                ->select(
                    'bookings.id as id',
                    'bookings.start as start',
                    'bookings.number as number',
                    'users.name as name'
                )
                ->join('users', 'bookings.user_id', '=', 'users.id')
                ->where('bookings.shop_id', $shop->id)
                ->where('bookings.start', '>', $today)
                ->get();
        }

        return view('rep', [
            'user' => $user,
            'shop' => $shop,
            'bookings' => $bookings,
            'areas' => $areas,
            'genres' => $genres
        ]);
    }

    public function create(ShopCreateRequest $request)
    {
        $shop = Shop::create($request->all());
        $representative['user_id'] = Auth::id();
        $representative['shop_id'] = $shop->id;
        Representative::create($representative);
        return redirect('/rep');
    }

    public function change()
    {
        $areas = Area::all()->pluck('name', 'id');
        $genres = Genre::all()->pluck('name', 'id');

        $shop = Shop::query()
            ->select(
                'shops.id as id',
                'shops.name as name',
                'shops.image_path as image_path',
                'shops.outline as outline',
                'shops.area_id as area_id',
                'shops.genre_id as genre_id',
            )
            ->join('representatives', 'shops.id', '=', 'representatives.shop_id')
            ->where('representatives.user_id', Auth::id())
            ->first();

        return view('rep_change', [
            'shop' => $shop,
            'areas' => $areas,
            'genres' => $genres
        ]);
    }

    public function update(ShopChangeRequest $request)
    {
        $shop = $request->all();
        $image = $request->file('image');
        if(isset($image)) {
            $image_name = $image->getClientOriginalName();
            $image->storeAs('public/shop', $image_name);
            $shop['image_path'] = 'storage/shop/' . $image_name;
        }
        unset($shop['_token'], $shop['image']);
        Shop::where('id', $request->id)->update($shop);
        
        return redirect('/rep/update')->with('flash_message', '店舗情報を変更しました');
    }
}
