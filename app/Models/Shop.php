<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $guarded = array('id');

    public function area()
    {
        return $this->belongsTo('App\Models\Area');
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
}
