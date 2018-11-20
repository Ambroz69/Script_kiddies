<?php

namespace App\Http\Controllers\Admin;

use App\Ad;
use App\Apartment;
use App\House;
use App\Address;
use App\User;
use App\Estate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = Ad::all()->load('address','user','house','apartment','estate');
        //return $ads;
        return view('admin.ads.index', compact('ads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $null_value = array (0 => null);
        $address = Address::get()->pluck('full_address', 'id');
        $user = User::get()->pluck('full_name', 'id');
        $house = $null_value + House::pluck('id','id')->toArray();
        $apartment = $null_value + Apartment::pluck('id','id')->toArray();
        $estate = $null_value + Estate::pluck('id','id')->toArray();

        $apartment[0] = null;
        $estate[0] = null;
        //return dd($house, $apartment, $estate);

        return view('admin.ads.create', compact('address','user','house','apartment','estate'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ad = new \App\Ad();
        $ad->price = $request->get('price');
        $ad->description = $request->get('description');
        $ad->notes = $request->get('notes');
        $ad->address_id = $request->get('address_id');
        $ad->user_id = $request->get('user_id');
        $ad->house_id = $request->get('house_id');
        $ad->apartment_id = $request->get('apartment_id');
        $ad->estate_id = $request->get('estate_id');
        if ($ad->house_id == 0) {$ad->house_id = null;}
        if ($ad->apartment_id == 0) {$ad->apartment_id = null;}
        if ($ad->estate_id == 0) {$ad->estate_id = null;}
        $ad->save();

        return redirect(route('admin.ads.index'))->with('success', 'Záznam bol pridaný.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Ad $ad)
    {
        $address = Address::get()->pluck('full_address', 'id');
        $selected_address_id = null;
        if ($ad->address) {
            $selected_address_id = $ad->address->id;
        }
        $user = User::get()->pluck('full_name', 'id');
        $selected_user_id = null;
        if ($ad->user) {
            $selected_user_id = $ad->user->id;
        }

        $house = House::pluck('id','id');
        $selected_house_id = null;
        if ($ad->house) {
            $selected_house_id = $ad->house->id;
        }

        $apartment = Apartment::pluck('id','id');
        $selected_apartment_id = null;
        if ($ad->apartment) {
            $selected_apartment_id = $ad->apartment->id;
        }

        $estate = Estate::pluck('id','id');
        $selected_estate_id = null;
        if ($ad->estate) {
            $selected_estate_id = $ad->estate->id;
        }
        /*return 'house: '.$house.' selected: '.$selected_house_id. "\n".
                'apartment: '.$apartment.' selected: '.$selected_apartment_id."\n".
                'estate: '.$estate.' selected: '.$selected_estate_id."\n";*/
        return view('admin.ads.edit',
            compact('ad',
                'address', 'selected_address_id',
                'user','selected_user_id',
                'house','selected_house_id',
                'apartment','selected_apartment_id',
                'estate','selected_estate_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ad $ad)
    {
        $ad->price = $request->get('price');
        $ad->description = $request->get('description');
        $ad->notes = $request->get('notes');
        $ad->address_id = $request->get('address_id');
        $ad->user_id = $request->get('user_id');
        $ad->house_id = $request->get('house_id');
        $ad->apartment_id = $request->get('apartment_id');
        $ad->estate_id = $request->get('estate_id');
        //return dd($ad);
        $ad->save();

        return redirect(route('admin.ads.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ad $ad)
    {
        try {
            $ad->delete();
        } catch (\Exception $e) {

        }
        return redirect(route('admin.ads.index'))
            ->with('success', 'Záznam bol vymazaný.');
    }
}
