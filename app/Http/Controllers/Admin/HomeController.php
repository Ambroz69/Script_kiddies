<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $admins = User::whereRaw('isAdmin LIKE 1')->get();
        //return dd($admins);
        return view('admin.home', compact('admins'));
    }
}
