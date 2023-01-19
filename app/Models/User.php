<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function bookings()
    {
        return $this->hasMany('App\Models\Booking');
    }

    public function likes()
    {
        return $this->hasMany('App\Models\Like');
    }

    public function Representatives()
    {
        return $this->hasOne('App\Models\Representative');
    }

    public function getShopArea()
    {
        $shop_id = optional($this->representatives)->shop_id;
        $shop = Shop::all()->where('id', $shop_id)->first();
        $area = Area::all()->where('id', $shop->area_id)->first();
        return $area->name;
    }

    public function getShopGenre()
    {
        $shop_id = optional($this->representatives)->shop_id;
        $shop = Shop::all()->where('id', $shop_id)->first();
        $genre = Genre::all()->where('id', $shop->genre_id)->first();
        return $genre->name;
    }

    public function getShopImage()
    {
        $shop_id = optional($this->representatives)->shop_id;
        $shop = Shop::all()->where('id', $shop_id)->first();
        return $shop->image_url;
    }

    public function getShopName()
    {
        $shop_id = optional($this->representatives)->shop_id;
        $shop = Shop::all()->where('id', $shop_id)->first();
        return $shop->name;
    }

    public function getShopOutline()
    {
        $shop_id = optional($this->representatives)->shop_id;
        $shop = Shop::all()->where('id', $shop_id)->first();
        return $shop->outline;
    }
}
