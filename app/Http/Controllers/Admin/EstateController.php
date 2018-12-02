<?php

namespace App\Http\Controllers\Admin;

use App\Estate;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EstateController extends Controller
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
        $estates = Estate::all();
        return view('admin.estates.index', compact('estates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.estates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Estate $estate)
    {
        $rules = [
            'type' => 'required|string|max:255',
            'area_ares' => 'required|string|max:255',
            'price_per_ares' => 'required|string|max:255',


        ];
        $messages = [
            'required' => 'Vyplňte prázdne pole ":attribute".',
            'integer' => '":attribute" musí byť celé číslo.',
            'string' => 'Neznáme znaky v poli ":attribute".',
            'max' => 'Maximálny počet znakov v poli ":attribute" je :max.'
        ];
        $attributes = [
            'type' => 'Typ',
            'area_ares' => 'Ár',
            'price_per_ares' => 'Cena za ár',

        ];
        Validator::make($request->all(), $rules, $messages, $attributes)->validate();

        $estate = new \App\Estate();
        $estate->type = $request->get('type');
        $estate->area_ares = $request->get('area_ares');
        $estate->price_per_ares = $request->get('price_per_ares');
        $estate->save();

        return redirect(route('admin.estates.index'))->with('success', 'Záznam bol pridaný.');
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
    public function edit(Estate $estate)
    {
        //
        return view('admin.estates.edit', compact('estate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estate $estate)
    {
        $rules = [
            'type' => 'required|string|max:255',
            'area_ares' => 'required|string|max:255',
            'price_per_ares' => 'required|string|max:255',


        ];
        $messages = [
            'required' => 'Vyplňte prázdne pole ":attribute".',
            'integer' => '":attribute" musí byť celé číslo.',
            'string' => 'Neznáme znaky v poli ":attribute".',
            'max' => 'Maximálny počet znakov v poli ":attribute" je :max.'
        ];
        $attributes = [
            'type' => 'Typ',
            'area_ares' => 'Ár',
            'price_per_ares' => 'Cena za ár',

        ];
        Validator::make($request->all(), $rules, $messages, $attributes)->validate();

        $estate->type = $request->get('type');
        $estate->area_ares = $request->get('area_ares');
        $estate->price_per_ares = $request->get('price_per_ares');
        $estate->save();

        return redirect(route('admin.estates.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estate $estate)
    {
        try {
            $estate->delete();
        } catch (\Exception $e) {

        }
        return redirect(route('admin.estates.index'))
            ->with('success', 'Záznam bol vymazaný.');
    }

}
