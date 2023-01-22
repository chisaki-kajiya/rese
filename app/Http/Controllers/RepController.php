<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Booking;
use App\Models\Genre;
use App\Models\Shop;
use App\Http\Requests\ShopRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RepController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $shop = Shop::query()
            ->select(
                'shops.id as id',
                'shops.name as name',
                'shops.image_url as image_url',
                'shops.outline as outline',
                'areas.name as area_name',
                'genres.name as genre_name',
            )
            ->join('areas', 'shops.area_id', '=', 'areas.id')
            ->join('genres', 'shops.genre_id', '=', 'genres.id')
            ->join('representatives', 'shops.id', '=', 'representatives.shop_id')
            ->where('representatives.user_id', Auth::id())
            ->first();
        $bookings = Booking::orderBy('start', 'asc')
                ->select(
                    'bookings.id as id',
                    'bookings.start as start',
                    'bookings.number as number',
                    'users.name as name'
                )
                ->join('users', 'bookings.user_id', '=', 'users.id')
                ->where('bookings.shop_id', $shop->id)
                ->get();
        return view('rep', [
            'user' => $user,
            'shop' => $shop,
            'bookings' => $bookings
        ]);
    }

    public function change()
    {
        $areas = Area::all()->pluck('name', 'id');
        $genres = Genre::all()->pluck('name', 'id');
        $shop = Shop::query()
            ->select(
                'shops.id as id',
                'shops.name as name',
                'shops.image_url as image_url',
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

    public function update(ShopRequest $request)
    {
        $shop = $request->all();
        unset($shop['_token']);
        Shop::where('id', $request->id)->update($shop);
        $areas = Area::all()->pluck('name', 'id');
        $genres = Genre::all()->pluck('name', 'id');
        $shop = Shop::query()
            ->select(
                'shops.id as id',
                'shops.name as name',
                'shops.image_url as image_url',
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
}
