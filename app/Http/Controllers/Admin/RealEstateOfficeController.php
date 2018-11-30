<?php

namespace App\Http\Controllers\Admin;

use App\RealEstateOffice;
use Validator;
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
        $rules = [
            'name' => 'required|string|max:255',
            'web' => 'required|string|max:255',
            'phone' => 'required|string|max:255',


        ];
        $messages = [
            'required' => 'Vyplňte prázdne pole ":attribute".',
            'integer' => '":attribute" musí byť celé číslo.',
            'string' => 'Neznáme znaky v poli ":attribute".',
            'max' => 'Maximálny počet znakov v poli ":attribute" je :max.'
        ];
        $attributes = [
            'name' => 'Názov',
            'web' => 'Webová stránka',
            'phone' => 'Telefónne číslo',


        ];
        Validator::make($request->all(), $rules, $messages, $attributes)->validate();

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
        $rules = [
            'name' => 'required|string|max:255',
            'web' => 'required|string|max:255',
            'phone' => 'required|string|max:255',


        ];
        $messages = [
            'required' => 'Vyplňte prázdne pole ":attribute".',
            'integer' => '":attribute" musí byť celé číslo.',
            'string' => 'Neznáme znaky v poli ":attribute".',
            'max' => 'Maximálny počet znakov v poli ":attribute" je :max.'
        ];
        $attributes = [
            'name' => 'Názov',
            'web' => 'Webová stránka',
            'phone' => 'Telefónne číslo',


        ];
        Validator::make($request->all(), $rules, $messages, $attributes)->validate();

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
