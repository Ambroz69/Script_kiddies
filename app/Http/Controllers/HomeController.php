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

    protected $city;
    public function filter(Request $request)
    {
        //DB::enableQueryLog();
        $description = $request->input('description');
        $price_min = (int) $request->input('price_min');
        $price_max = (int) $request->input('price_max');
        $property_type = $request->input('property_type');
        $category = $request->input('category');
        $city = $request->input('city');
        $this->city = $city;
        $filter_data = [                        //array pre zapamatanie vybranych vstupov zo zakladneho filtra
            'description' => $description,
            'price_min' => $price_min,
            'price_max' => $price_max,
            'property_type' => $property_type,
            'category' => $category,
            'city' => $city
            ];
        $select_data = array(
            'type' => [
                'novostavba',
                'prerobený',
                'čiastočne prerobený',
                'v pôvodnom stave'
            ],
            'window_type' => [
                'plastové',
                'drevené',
                'dreveno-hliníkové',
                'hliníkové',
                'oceľové',
                'bezrámové'
            ],
            'direction' => [
                'sever',
                'juh',
                'východ',
                'západ',
                'severo-východ',
                'severo-západ',
                'juho-východ',
                'juho-západ'
            ],
            'heating' => [
                'plynom',
                'drevom',
                'elektrickou energiou',
                'kotol',
                'solárne systémy',
                'tepelné čerpadlá',
                'hybridné'
            ],
            'internet' => [
                'bezdrôtové pripojenie',
                'káblové pripojenie',
                'optický kábel',
                'bez internetu'
            ]);

        $ads = Ad::with('address','userInfo','houseInfo','apartmentInfo','estate');

        if ($description != null) {
            $ads = $ads->where('description','LIKE',"%".$description."%");
        }
        if (($price_min != null) && ($price_max == null)) {
            $ads = $ads->where('price','>=',$price_min);
        } else if (($price_min == null) && ($price_max != null)) {
            $ads = $ads->where('price','<=',$price_max);
        } else if (($price_min != null) && ($price_max != null)) {
            $ads = $ads->where('price','>=',$price_min)->where('price','<=',$price_max);
        }
        if ($property_type != null) {
            if (strcmp($property_type,'byt') == 0)
                $ads = $ads->where('apartment_ID','NOT LIKE',null);
            if (strcmp($property_type,'dom') == 0)
                $ads = $ads->where('house_ID','NOT LIKE',null);
            if (strcmp($property_type,'pozemok') == 0)
                $ads = $ads->where('estate_ID','NOT LIKE',null);
        }
        if ($category != null) {
            $ads = $ads->where('category','LIKE',"%".$category."%");
        }
        if ($city != null) {
            $ads = $ads->whereHas('address',function ($q) {
                $q->where('city','LIKE',"%".$this->city."%");
            });
        }

        $ads_filtered = $ads->get()->toArray();
        //$query = DB::getQueryLog();
        //return dd($select_data, $select_data['type'][0]);
        return view('filtered', compact('ads_filtered','filter_data','select_data'));

    }
}