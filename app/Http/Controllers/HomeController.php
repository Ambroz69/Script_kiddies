<?php

namespace App\Http\Controllers;

use App\Ad;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $ad =  Ad::all()->toArray();
        //return dd($ad, count($ad));
        return view('home', compact('ad'));
    }

    public function showAd ($id) {
        $ad =  Ad::all()->load('address','userInfo','houseInfo','apartmentInfo','estate')->where('id', $id)->first();
        //return dd($ad);
        return view('details', compact('ad'));
    }
}