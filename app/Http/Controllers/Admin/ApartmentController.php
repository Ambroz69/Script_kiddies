<?php

namespace App\Http\Controllers\Admin;

use App\Apartment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApartmentController extends Controller
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
        $apartments = Apartment::all();
        return view('admin.apartments.index', compact('apartments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.apartments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Apartment $apartment)
    {
        //
        $apartment = new \App\Apartment();
        $apartment->room_count = $request->get('room_count');
        $apartment->floor = $request->get('floor');
        $apartment->save();

        return redirect(route('admin.apartments.index'))->with('success', 'Záznam bol pridaný.');
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
    public function edit(Apartment $apartment)
    {
        //
        return view('admin.apartments.edit', compact('apartment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Apartment $apartment)
    {
        //
        $apartment->room_count = $request->get('room_count');
        $apartment->floor = $request->get('floor');
        $apartment->save();

        return redirect(route('admin.apartments.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apartment $apartment)
    {
        //
        try {
            $apartment->delete();
        } catch (\Exception $e) {

        }
        return redirect(route('admin.apartments.index'))
            ->with('success', 'Záznam bol vymazaný.');
    }
}
