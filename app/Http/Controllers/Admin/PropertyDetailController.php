<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Validator;
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
        $rules = [
            'area_square_meters' => 'required|integer',
            'type' => 'required|string|max:255',
            'window_type' => 'required|string|max:255',
            'direction' => 'required|string|max:255',
            'heating' => 'required|string|max:255',
            'internet' => 'required|string|max:255'

        ];
        $messages = [
            'required' => 'Vyplňte prázdne pole ":attribute".',
            'integer' => '":attribute" musí byť celé číslo.',
            'string' => 'Neznáme znaky v poli ":attribute".',
            'max' => 'Maximálny počet znakov v poli ":attribute" je :max.'
        ];
        $attributes = [
            'area_square_meters' => 'Veľkosť',
            'type' => 'Typ',
            'window_type' => 'Druh okien',
            'direction' => 'Orientácia',
            'heating' => 'Kúrenie',
            'internet' => 'Internet'

        ];
        Validator::make($request->all(), $rules, $messages, $attributes)->validate();

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
        $rules = [
            'area_square_meters' => 'required|integer',
            'type' => 'required|string|max:255',
            'window_type' => 'required|string|max:255',
            'direction' => 'required|string|max:255',
            'heating' => 'required|string|max:255',
            'internet' => 'required|string|max:255'

        ];
        $messages = [
            'required' => 'Vyplňte prázdne pole ":attribute".',
            'integer' => '":attribute" musí byť celé číslo.',
            'string' => 'Neznáme znaky v poli ":attribute".',
            'max' => 'Maximálny počet znakov v poli ":attribute" je :max.'
        ];
        $attributes = [
            'area_square_meters' => 'Veľkosť',
            'type' => 'Typ',
            'window_type' => 'Druh okien',
            'direction' => 'Orientácia',
            'heating' => 'Kúrenie',
            'internet' => 'Internet'

        ];
        Validator::make($request->all(), $rules, $messages, $attributes)->validate();

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
