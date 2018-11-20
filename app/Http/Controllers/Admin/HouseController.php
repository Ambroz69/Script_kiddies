<?php

namespace App\Http\Controllers\Admin;

use App\House;
use App\PropertyDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HouseController extends Controller
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
        $houses = House::all()->load('propertyDetails');
        return view('admin.houses.index', compact('houses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $property_detail = PropertyDetail::pluck('id', 'id');
        return view('admin.houses.create', compact('property_detail'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, House $house)
    {

        $house = new \App\House();
        $house->floor_count = $request->get('floor_count');
        $house->terrace = $request->get('terrace');
        $house->garden = $request->get('garden');
        $house->property_details_id = $request->get('property_details_id');

        $house->save();

        return redirect(route('admin.houses.index'))->with('success', 'Záznam bol pridaný.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(House $house)
    {
        $property_detail = PropertyDetail::pluck('id','id');
        $selected_property_detail_id = null;

        if ($house->propertyDetails) {
            $selected_property_detail_id = $house->propertyDetails->id;
        }
        //return dd($property_detail, $selected_property_detail_id);
        return view('admin.houses.edit', compact('house','property_detail','selected_property_detail_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, House $house)
    {
        $house->floor_count = $request->get('floor_count');
        $house->terrace = $request->get('terrace');
        $house->garden = $request->get('garden');
        $house->property_details_id = $request->get('property_details_id');
        $house->save();

        return redirect(route('admin.houses.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(House $house)
    {
        try {
            $house->delete();
        } catch (\Exception $e) {

        }
        return redirect(route('admin.houses.index'))
            ->with('success', 'Záznam bol vymazaný.');
    }
}
