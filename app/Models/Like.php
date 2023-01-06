<?php

namespace App\Models;

use App\Models\Area;
use App\Models\Genre;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $guarded = array('id');

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function shop()
    {
        return $this->belongsTo('App\Models\Shop');
    }

    public function getImage()
    {
        return optional($this->shop)->image_url;
    }

    public function getShop()
    {
        return optional($this->shop)->name;
    }

    public function getArea()
    {
        $area_id = optional($this->shop)->area_id;
        $area = Area::where('id', $area_id)->first();
        return $area->name;
    }

    public function getGenre()
    {
        $genre_id = optional($this->shop)->genre_id;
        $genre = Genre::where('id', $genre_id)->first();
        return $genre->name;
    }
}
