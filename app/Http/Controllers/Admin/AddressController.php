<?php

namespace App\Http\Controllers\Admin;

use App\Address;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AddressController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        //
        $addresses = Address::all();
        return view('admin.addresses.index', compact('addresses'));
    }

    public function create()
    {
        //
        return view('admin.addresses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Address $address)
    {
        //
        $address = new \App\Address();
        $address->address_name = $request->get('address_name');
        $address->address_number = $request->get('address_number');
        $address->city = $request->get('city');
        $address->zip = $request->get('zip');
        $address->save();

        return redirect(route('admin.addresses.index'))->with('success', 'Záznam bol pridaný.');
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
    public function edit(Address $address)
    {
        //
        return view('admin.addresses.edit', compact('address'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Address $address)
    {
        //
        $address->address_name = $request->get('address_name');
        $address->address_number = $request->get('address_number');
        $address->city = $request->get('city');
        $address->zip = $request->get('zip');
        $address->save();

        return redirect(route('admin.addresses.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {
        //
        try {
            $address->delete();
        } catch (\Exception $e) {

        }
        return redirect(route('admin.addresses.index'))
            ->with('success', 'Záznam bol vymazaný.');
    }

}
