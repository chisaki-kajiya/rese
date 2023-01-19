<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Shop extends Model
{
    use HasFactory;

    protected $guarded = array('id');

    public function area()
    {
        return $this->belongsTo('App\Models\Area');
    }

    public function bookings()
    {
        return $this->hasMany('App\Models\Booking');
    }

    public function genre()
    {
        return $this->belongsTo('App\Models\Genre');
    }

    public function likes()
    {
        return $this->hasMany('App\Models\Like');
    }

    public function representatives()
    {
        return $this->hasMany('App\Models\Representative');
    }

    public function getLike()
    {
        $likes = Like::all()->where('user_id', Auth::id())->where('shop_id', $this->id);
        return $likes->isEmpty();
    }
}
