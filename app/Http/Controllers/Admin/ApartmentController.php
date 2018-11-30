<?php

namespace App\Http\Controllers\Admin;

use App\Apartment;
use App\PropertyDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Rules\OnlyOneId;

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
        $apartments = Apartment::all()->load('propertyDetails');
        return view('admin.apartments.index', compact('apartments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $property_detail = PropertyDetail::pluck('id', 'id');
        return view('admin.apartments.create', compact('property_detail'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Apartment $apartment)
    {
        $rules = [
            'room_count' => 'required|integer',
            'floor' => 'required|integer',

        ];
        $messages = [
            'required' => 'Vyplňte prázdne pole ":attribute".',
            'integer' => '":attribute" musí byť celé číslo.',
            'string' => 'Neznáme znaky v poli ":attribute".',
            'max' => 'Maximálny počet znakov v poli ":attribute" je :max.'
        ];
        $attributes = [
            'room_count' => 'Počet izieb',
            'floor' => 'Poschodie',


        ];
        Validator::make($request->all(), $rules, $messages, $attributes)->validate();
        //
        $apartment = new \App\Apartment();
        $apartment->room_count = $request->get('room_count');
        $apartment->floor = $request->get('floor');
        $apartment->property_details_id = $request->get('property_details_id');
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
        $property_detail = PropertyDetail::pluck('id','id');
        $selected_property_detail_id = null;

        if ($apartment->propertyDetails) {
            $selected_property_detail_id = $apartment->propertyDetails->id;
        }
        return view('admin.apartments.edit', compact('apartment','property_detail','selected_property_detail_id'));
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
    $rules = [
        'room_count' => 'required|integer',
        'floor' => 'required|integer',

    ];
        $messages = [
            'required' => 'Vyplňte prázdne pole ":attribute".',
            'integer' => '":attribute" musí byť celé číslo.',
            'string' => 'Neznáme znaky v poli ":attribute".',
            'max' => 'Maximálny počet znakov v poli ":attribute" je :max.'
        ];
        $attributes = [
            'room_count' => 'Počet izieb',
            'floor' => 'Poschodie',


        ];
        Validator::make($request->all(), $rules, $messages, $attributes)->validate();
        //
        $apartment->room_count = $request->get('room_count');
        $apartment->floor = $request->get('floor');
        $apartment->property_details_id = $request->get('property_details_id');
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
