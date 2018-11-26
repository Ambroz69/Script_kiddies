<?php

namespace App\Http\Controllers;

use App\Ad;

class HomeController extends Controller
{
    public function index()
    {
        $ads = Ad::all()->load('address','user','house','apartment','estate');

        return view('home', compact('ads'));
    }

    public function showAd ($id) {
        $ad = Ad::where('id','==',$id)->first();
        return view('anonym.details', compact($ad));
    }
}