<?php

namespace App\Http\Controllers\Admin;

use App\RealEstateOffice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Address;

class RealEstateOfficeController extends Controller
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
        $realestateoffices = RealEstateOffice::all()->load('address');
        return view('admin.realestateoffices.index', compact('realestateoffices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $address = Address::get()->pluck('full_address', 'id');
        return view('admin.realestateoffices.create', compact('address'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, RealEstateOffice $realestateoffice)
    {
        $realestateoffice = new \App\RealEstateOffice();
        $realestateoffice->name = $request->get('name');
        $realestateoffice->web = $request->get('web');
        $realestateoffice->phone = $request->get('phone');
        $realestateoffice->address_id = $request->get('address_id');
        $realestateoffice->save();

        return redirect(route('admin.realestateoffices.index'))->with('success', 'Záznam bol pridaný.');
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
     */
    public function edit(RealEstateOffice $realestateoffice)
    {
        $address = Address::get()->pluck('full_address', 'id');
        $selected_address_id = null;

        if ($realestateoffice->address) {
            $selected_address_id = $realestateoffice->address->id;
        }
        return view('admin.realestateoffices.edit', compact('realestateoffice','address','selected_address_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RealEstateOffice $realestateoffice)
    {
        //
        $realestateoffice->name = $request->get('name');
        $realestateoffice->web = $request->get('web');
        $realestateoffice->phone = $request->get('phone');
        $realestateoffice->address_id = $request->get('address_id');
        $realestateoffice->save();

        return redirect(route('admin.realestateoffices.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(RealEstateOffice $realestateoffice)
    {
        //
        try {
            $realestateoffice->delete();
        } catch (\Exception $e) {

        }
        return redirect(route('admin.realestateoffices.index'))
            ->with('success', 'Záznam bol vymazaný.');
    }
}
