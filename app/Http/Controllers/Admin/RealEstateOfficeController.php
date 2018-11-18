<?php

namespace App\Http\Controllers\Admin;

use App\RealEstateOffice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        $realestateoffices = RealEstateOffice::all();
        return view('admin.realestateoffices.index', compact('realestateoffices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.realestateoffices.create');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(RealEstateOffice $realestateoffice)
    {
        //
        return view('admin.realestateoffices.edit', compact('realestateoffice'));
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
