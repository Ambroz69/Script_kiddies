<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PropertyDetail;

class PropertyDetailController extends Controller
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
        //
        $propertydetails = PropertyDetail::all();
        return view('admin.propertydetails.index', compact('propertydetails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.propertydetails.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, PropertyDetail $propertydetail)
    {
        //
        $propertydetail = new \App\PropertyDetail();
        $propertydetail->area_square_meters = $request->get('area_square_meters');
        $propertydetail->type = $request->get('type');
        $propertydetail->window_type = $request->get('window_type');
        $propertydetail->direction = $request->get('direction');
        $propertydetail->balcony = $request->get('balcony');
        $propertydetail->cellar = $request->get('cellar');
        $propertydetail->garage = $request->get('garage');
        $propertydetail->insulated = $request->get('insulated');
        $propertydetail->heating = $request->get('heating');
        $propertydetail->internet = $request->get('internet');
        $propertydetail->save();

        return redirect(route('admin.propertydetails.index'))->with('success', 'Záznam bol pridaný.');
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
    public function edit(PropertyDetail $propertydetail)
    {
        return view('admin.propertydetails.edit', compact('propertydetail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PropertyDetail $propertydetail)
    {
        //
        $propertydetail->area_square_meters = $request->get('area_square_meters');
        $propertydetail->type = $request->get('type');
        $propertydetail->window_type = $request->get('window_type');
        $propertydetail->direction = $request->get('direction');
        $propertydetail->balcony = $request->get('balcony');
        $propertydetail->cellar = $request->get('cellar');
        $propertydetail->garage = $request->get('garage');
        $propertydetail->insulated = $request->get('insulated');
        $propertydetail->heating = $request->get('heating');
        $propertydetail->internet = $request->get('internet');
        $propertydetail->save();

        return redirect(route('admin.propertydetails.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PropertyDetail $propertydetail)
    {
        try {
            $propertydetail->delete();
        } catch (\Exception $e) {

        }
        return redirect(route('admin.propertydetails.index'))
            ->with('success', 'Záznam bol vymazaný.');
    }
}
