<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Course;
use App\Models\Evaluation;
use App\Models\Genre;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function index()
    {
        $areas = Area::all()->pluck('name', 'id');
        $genres = Genre::all()->pluck('name', 'id');
        $shops = Shop::query()
            ->select(
                'shops.id as id',
                'shops.name as name',
                'shops.image_path as image_path',
                'areas.name as area_name',
                'genres.name as genre_name',
            )
            ->join('areas', 'shops.area_id', '=', 'areas.id')
            ->join('genres', 'shops.genre_id', '=', 'genres.id')
            ->get();

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
        $search =$request->name;

        $areas = Area::all()->pluck('name', 'id');
        $genres = Genre::all()->pluck('name', 'id');
        $shop = Shop::query()
            ->select(
                'shops.id as id',
                'shops.name as name',
                'shops.image_path as image_path',
                'areas.name as area_name',
                'genres.name as genre_name',
            )
            ->join('areas', 'shops.area_id', '=', 'areas.id')
            ->join('genres', 'shops.genre_id', '=', 'genres.id');

        if (isset($request->area_id)) {
            $shop->where('area_id', $request->area_id);
        }
        if (isset($request->genre_id)) {
            $shop->where('genre_id', $request->genre_id);
        }
        if (isset($request->name) && $request->name != "Search ...") {
            $shop->where('shops.name', 'LIKE', "%{$request->name}%");
        }
        $shops = $shop->get();

        return view('shop_all', [
            'area' => $area,
            'areas' => $areas,
            'genre' => $genre,
            'genres' => $genres,
            'search' => $search,
            'shops' => $shops
        ]);
    }

    public function detail(Request $request)
    {
        $shop = Shop::query()
            ->select(
                'shops.id as id',
                'shops.name as name',
                'shops.image_path as image_path',
                'shops.outline',
                'areas.name as area_name',
                'genres.name as genre_name',
            )
            ->join('areas', 'shops.area_id', '=', 'areas.id')
            ->join('genres', 'shops.genre_id', '=', 'genres.id')
            ->where('shops.id', $request->id)
            ->first();

        $star = Evaluation::query()
            ->join('bookings', 'evaluations.booking_id', '=', 'bookings.id')
            ->where('bookings.shop_id', $request->id)
            ->avg('evaluations.star');
        if ($star == null) {
            $star = 3;
        };

        $evals = Evaluation::query()
            ->join('bookings', 'evaluations.booking_id', '=', 'bookings.id')
            ->where('bookings.shop_id', $request->id)
            ->count();

        $courses = Course::where('shop_id', $request->id)->get();

        $user['email_verified_at'] = '';
        if (Auth::check()) {
            $user = Auth::user();
        }
        
        return view('shop_detail', [
            'shop' => $shop,
            'star' => $star,
            'user' => $user,
            'evals' => $evals,
            'courses' => $courses,
        ]);
    }
}
