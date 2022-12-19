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
}
