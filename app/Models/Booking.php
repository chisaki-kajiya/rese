<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $guarded = array('id');

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function getShop()
    {
        return optional($this->shop)->name;
    }

    public function shop()
    {
        return $this->belongsTo('App\Models\Shop');
    }

    public function getDate()
    {
        $date = $this->start;
        return date('Y-m-d', strtotime($date));
    }

    public function getTime()
    {
        $date = $this->start;
        return date('H:i', strtotime($date));
    }
}
