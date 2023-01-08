<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RepController extends Controller
{
    public function index()
    {
        return view('rep');
    }
}
