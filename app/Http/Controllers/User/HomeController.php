<?php
/**
 * Created by PhpStorm.
 * User: Dominik
 * Date: 03.12.2018
 * Time: 21:05
 */

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\RealEstateOffice;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //return dd($admins);
        return view('user.home');
    }

    public function showOffice()
    {
        $user_logged_in = Auth::user();
        $user = User::all()->load('realEstateOffice')->where('id', $user_logged_in->id)->first();
        $office_id = null;
        if ($user->real_estate_office_id != null) {
            $office_id = $user->real_estate_office_id;
            $user = $user->load('realEstateOffice.address');
        }
        //return dd($user, isset($office_id));
        return view('user.office.index', compact('user','office_id'));
    }

    public function findOffice()
    {
        $user_logged_in = Auth::user();
        $user = User::all()->load('realEstateOffice')->where('id', $user_logged_in->id)->first();
        $offices = RealEstateOffice::all()->pluck('name', 'id');
        //return dd($user, $offices);
        return view('user.office.find', compact('user', 'offices'));
    }

    public function requestAdd(Request $request, User $user)
    {
        $office = RealEstateOffice::where('name','LIKE',$request->get('office'))->get();
        //return dd($request->all(), $office[0]['id'], $user);
        $user->real_estate_office_id = $office[0]['id'];
        $user->status = 'čakajúci';
        $user->save();
        return redirect(route('user.office'));
    }
 }