<?php

namespace App\Http\Controllers;

use App\Ad;
use App\Address;
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

    protected $request;
    public function filter(Request $request)
    {
        //DB::enableQueryLog();
        $this->request = $request;
        $price_min = (int) $request->input('price_min');
        $price_max = (int) $request->input('price_max');

        $ads = Ad::with('address','userInfo','houseInfo','apartmentInfo','estate');

        if ($request->input('description') != null) {
            $ads = $ads->where('description','LIKE',"%".$request->input('description')."%");
        }
        if (($request->input('price_min') != null) && ($request->input('price_max') == null)) {
            $ads = $ads->where('price','>=',$price_min);
        } else if (($request->input('price_min') == null) && ($request->input('price_max') != null)) {
            $ads = $ads->where('price','<=',$price_max);
        } else if (($request->input('price_min') != null) && ($request->input('price_max') != null)) {
            $ads = $ads->where('price','>=',$price_min)->where('price','<=',$price_max);
        }
        if ($request->input('type') != null) {
            if (strcmp($request->input('type'),'byt') == 0)
                $ads = $ads->where('apartment_ID','NOT LIKE',null);
            if (strcmp($request->input('type'),'dom') == 0)
                $ads = $ads->where('house_ID','NOT LIKE',null);
            if (strcmp($request->input('type'),'pozemok') == 0)
                $ads = $ads->where('estate_ID','NOT LIKE',null);
        }
        if ($request->input('category') != null) {
            $ads = $ads->where('category','LIKE',"%".$request->input('category')."%");
        }
        if ($request->input('city') != null) {
            $ads = $ads->whereHas('address',function ($q) {
                $q->where('city','LIKE',"%".$this->request->input('city')."%");
            });
        }

        $ads_filtered = $ads->get()->toArray();
        //$query = DB::getQueryLog();
        //return dd($query,$request,$price_min, $ads_filtered);
        return view('filtered', compact('ads_filtered'));

    }
}