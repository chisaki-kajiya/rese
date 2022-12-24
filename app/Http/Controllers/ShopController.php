<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Shop;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $areas = Area::all();
        $genres = Genre::all();
        $shops = Shop::all();
        return view('shop_all', ['areas' => $areas, 'genres' => $genres, 'shops' => $shops]);
    }

    public function search(Request $request)
    {
        $areas = Area::all();
        $genres = Genre::all();
        $shop = Shop::query();
        if (isset($request->area_id)) {
            $shop->where('area_id', "{$request->area_id}");
        }
        if (isset($request->genre_id)) {
            $shop->where('genre_id', "{$request->genre_id}");
        }
        $shops = $shop->get();
        return view('shop_all', ['areas' => $areas, 'genres' => $genres, 'shops' => $shops]);
    }
}
