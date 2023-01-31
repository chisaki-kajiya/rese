<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Shop extends Model
{
    use HasFactory;

    protected $guarded = array('id');

    public function getLike()
    {
        $likes = Like::all()->where('user_id', Auth::id())->where('shop_id', $this->id);
        return $likes->isEmpty();
    }
}
