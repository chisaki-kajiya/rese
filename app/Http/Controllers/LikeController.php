<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function create(Request $request)
    {
        $like = $request->all();
        $like['user_id'] = Auth::id();
        Like::create($like);
        return redirect('/');
    }

    public function delete(Request $request)
    {
        Like::where('shop_id', $request->shop_id)->first()->delete();
        return redirect('/');
    }
}
