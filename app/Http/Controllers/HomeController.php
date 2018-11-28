<?php

namespace App\Http\Controllers;

use App\Ad;
use Illuminate\Http\Request;
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

    public function filter(Request $request)
    {
        //DB::enableQueryLog();
        $filtered_ads = Ad::all();

        if ($request->has('description') && ($request->input('description') != null)) {
            $filtered_ads = Ad::whereRaw("description LIKE '%".$request->input('description')."%'")->get();
        }
        if ($request->has('price') && ($request->input('price') != null)) {
            $filtered_ads = Ad::whereRaw("price LIKE '%".$request->input('price')."%'")->get();
        }
        if ($request->has('notes') && ($request->input('notes') != null)) {
            $filtered_ads = Ad::whereRaw("notes LIKE '%".$request->input('notes')."%'")->get();
        }
        $ad = $filtered_ads;
        //$query = DB::getQueryLog();
        //return dd($filtered_ads);
        return view('filtered', compact('ad'));
    }
}