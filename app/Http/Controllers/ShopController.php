<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Genre;
use App\Models\Like;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function index()
    {
        $areas = Area::all()->pluck('name', 'id');
        $genres = Genre::all()->pluck('name', 'id');
        $shops = Shop::all();

        return view('shop_all', [
            'areas' => $areas,
            'genres' => $genres,
            'shops' => $shops
        ]);
    }

    public function search(Request $request)
    {
        $area = $request->area_id;
        $genre = $request->genre_id;
        $areas = Area::all()->pluck('name', 'id');
        $genres = Genre::all()->pluck('name', 'id');

        $shop = Shop::query();
        if (isset($request->area_id)) {
            $shop->where('area_id', "{$request->area_id}");
        }
        if (isset($request->genre_id)) {
            $shop->where('genre_id', "{$request->genre_id}");
        }
        if (isset($request->name) && $request->name != "Search ...") {
            $shop->where('name', 'LIKE', "%{$request->name}%");
        }
        $shops = $shop->get();

        return view('shop_all', [
            'area' => $area,
            'areas' => $areas,
            'genre' => $genre,
            'genres' => $genres,
            'shops' => $shops
        ]);
    }

    public function detail(Request $request)
    {
        $shop = Shop::find($request->id);
        $user['email_verified_at'] = '';
        if (Auth::check()) {
            $user = Auth::user();
        }
        return view('shop_detail', [
            'shop' => $shop,
            'user' => $user
        ]);
    }
}
