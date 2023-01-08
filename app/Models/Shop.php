<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Shop extends Model
{
    use HasFactory;

    protected $guarded = array('id');

    public function getArea()
    {
        return optional($this->area)->name;
    }

    public function area()
    {
        return $this->belongsTo('App\Models\Area');
    }

    public function getGenre()
    {
        return optional($this->genre)->name;
    }

    public function genre()
    {
        return $this->belongsTo('App\Models\Genre');
    }

    public function bookings()
    {
        return $this->hasMany('App\Models\Booking');
    }

    public function likes()
    {
        return $this->hasMany('App\Models\Like');
    }
    
    public function getLike()
    {
        $likes = Like::all()->where('user_id', Auth::id())->where('shop_id', $this->id);
        return $likes->isEmpty();
    }

    public function Representatives()
    {
        return $this->hasMany('App\Models\Representative');
    }
}
