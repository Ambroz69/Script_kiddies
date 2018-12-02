<?php

namespace App\Http\Controllers\Admin;

use App\Ad;
use App\Image;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImageController extends Controller
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
        $images = Image::all()->load('ad');
        return view('admin.images.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ad = Ad::pluck('id', 'id');
        return view('admin.images.create', compact('ad'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $rules = [
//            'floor_count' => 'required|integer',
//            'garden' => 'required|string|max:255',
//
//
//        ];
//        $messages = [
//            'required' => 'Vyplňte prázdne pole ":attribute".',
//            'integer' => '":attribute" musí byť celé číslo.',
//            'string' => 'Neznáme znaky v poli ":attribute".',
//            'max' => 'Maximálny počet znakov v poli ":attribute" je :max.'
//        ];
//        $attributes = [
//            'floor_count' => 'Počet poschodí',
//            'garden' => 'Záhrada',
//
//
//        ];
//        Validator::make($request->all(), $rules, $messages, $attributes)->validate();

        $image = new Image();
        $image->name = $request->get('name');
        $image->width = $request->get('width');
        $image->height = $request->get('height');
        $image->type = $request->get('type');
        $image->image_string = $request->get('image_string');
        $image->ad_id = $request->get('ad_id');
        $image->save();

        return redirect(route('admin.images.index'))->with('success', 'Záznam bol pridaný.');
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
    public function edit(Image $image)
    {
        $ad = Ad::pluck('id','id');
        $selected_ad_id = null;

        if ($image->ad) {
            $selected_ad_id = $image->ad->id;
        }
        //return dd($ad, $selected_ad_id);
        return view('admin.images.edit', compact('image','ad','selected_ad_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
//        $rules = [
//            'floor_count' => 'required|integer',
//            'garden' => 'required|string|max:255',
//
//
//        ];
//        $messages = [
//            'required' => 'Vyplňte prázdne pole ":attribute".',
//            'integer' => '":attribute" musí byť celé číslo.',
//            'string' => 'Neznáme znaky v poli ":attribute".',
//            'max' => 'Maximálny počet znakov v poli ":attribute" je :max.'
//        ];
//        $attributes = [
//            'floor_count' => 'Počet poschodí',
//            'garden' => 'Záhrada',
//
//
//        ];
//        Validator::make($request->all(), $rules, $messages, $attributes)->validate();

        $image->name = $request->get('name');
        $image->width = $request->get('width');
        $image->height = $request->get('height');
        $image->type = $request->get('type');
        $image->image_string = $request->get('image_string');
        $image->ad_id = $request->get('ad_id');
        $image->save();

        return redirect(route('admin.images.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        try {
            $image->delete();
        } catch (\Exception $e) {

        }
        return redirect(route('admin.images.index'))
            ->with('success', 'Záznam bol vymazaný.');
    }
}
