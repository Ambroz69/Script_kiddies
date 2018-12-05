<?php
/**
 * Created by PhpStorm.
 * User: Dominik
 * Date: 03.12.2018
 * Time: 21:05
 */

namespace App\Http\Controllers\User;

use App\Address;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\RealEstateOffice;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('user.home');
    }

    public function showOffice()        //zobrazi RK pouzivatela, ak nejaku ma, inak mu ponukne moznost vytvorit novu/pridat sa k existujucej
    {
        $user_logged_in = Auth::user();
        $user = User::all()->load('realEstateOffice')->where('id', $user_logged_in->id)->first();
        $office_id = null;
        if ($user->real_estate_office_id != null) {
            $office_id = $user->real_estate_office_id;
            $user = $user->load('realEstateOffice.address');
        }
        return view('user.office.index', compact('user','office_id'));
    }

    public function findOffice()        //najde existujuce RK
    {
        $user_logged_in = Auth::user();
        $user = User::all()->load('realEstateOffice')->where('id', $user_logged_in->id)->first();
        $offices = RealEstateOffice::all()->pluck('name', 'id');
        return view('user.office.find', compact('user', 'offices'));
    }

    public function addRequest(Request $request, User $user)        //pouzivatel odosle ziadost o prijatie do RK
    {
        $office = RealEstateOffice::where('name','LIKE',$request->get('office'))->get();
        $user->real_estate_office_id = $office[0]['id'];
        $user->status = 'čakajúci';
        $user->save();
        return redirect(route('user.office'));
    }

    public function cancelRequest()     //pouzivatel zrusi ziaddost o prijatie do RK
    {
        $user = Auth::user();
        $user->real_estate_office_id = null;
        $user->status = null;
        $user->save();
        return redirect(route('user.office'));
    }

    public function requests()      //zoznam ziadosti pre spravcu RK
    {
        $user_office = Auth::user()->real_estate_office_id;
        $pending_users = array_values(User::all()->where('real_estate_office_id','LIKE',$user_office)
            ->where('status','LIKE','čakajúci')->toArray());
        return view('user.office.requests', compact('pending_users'));
    }

    public function acceptRequest(User $user)       //prijatie ziadosti = novy zamestnanec
    {
        $user->status = 'prijatý';
        $user->save();
        return redirect(route('user.office.requests'));
    }

    public function rejectRequest(User $user)       //odmietnutie ziadosti = nechceme ho
    {
        $user->real_estate_office_id = null;
        $user->status = null;
        $user->save();
        return redirect(route('user.office.requests'));
    }

    public function employees()     //zobrazi zoznam vsetkych prijatych zamestnancov RK
    {
        $user_office = Auth::user()->real_estate_office_id;
        $user_status = Auth::user()->status;
        $office_admin = User::all()->where('real_estate_office_id','LIKE',$user_office)
            ->where('status','LIKE','správca')->first();
        $employees = User::all()->where('real_estate_office_id','LIKE',$user_office)
            ->where('status','LIKE','prijatý');

        if (isset($office_admin)) $office_admin = $office_admin->toArray();
        if (isset($employees)) $employees = array_values($employees->toArray());
        //return dd($user_office, $employees, $office_admin, $user_status);
        return view('user.office.employees', compact('employees','office_admin','user_office','user_status'));
    }

    public function removeEmployee(User $user)      //vymazanie zamestnanca (iba pre spravcu RK)
    {
        $user->real_estate_office_id = null;
        $user->status = null;
        $user->save();
        return redirect(route('user.office.employees'));
    }

    public function createOffice()      //vytvorenie novej RK part1
    {
        return view('user.office.create');
    }

    public function storeOffice(Request $request)       //vytvorenie novej RK part2
    {
        $statement = DB::select("show table status like 'addresses'");
        $address_id = $statement[0]->Auto_increment;
        $statement2 = DB::select("show table status like 'real_estate_offices'");
        $office_id = $statement2[0]->Auto_increment;
        $user = Auth::user();
        //return dd($request->all(), $address_id, $office_id);
        $address = new Address();
        $office = new RealEstateOffice();

        $address->address_name = $request->get('address_name');
        $address->address_number = $request->get('address_number');
        $address->city = $request->get('city');
        $address->zip = $request->get('zip');
        $address->region = $request->get('region');
        $address->save();

        $office->name = $request->get('name');
        $office->web = $request->get('web');
        $office->phone = $request->get('phone');
        $office->address_id = $address_id;
        $office->save();

        $user->real_estate_office_id = $office_id;
        $user->status = 'správca';
        $user->save();

        return redirect(route('user.office'));
    }

    public function editOffice($id)        //upravenie RK part1 (iba pre spravcu RK)
    {
        $user = User::where('id','LIKE',$id)->get()->first()->load('realEstateOffice.address');
        //return dd($user);
        return view('user.office.edit', compact('user'));
    }

    public function updateOffice(Request $request, User $user)      //upravenie RK part2 (iba pre spravcu RK))
    {

        $office = $user->realEstateOffice;
        $address = $user->realEstateOffice->address;

        $address->address_name = $request->get('address_name');
        $address->address_number = $request->get('address_number');
        $address->city = $request->get('city');
        $address->zip = $request->get('zip');
        $address->region = $request->get('region');
        $address->save();

        $office->name = $request->get('name');
        $office->web = $request->get('web');
        $office->phone = $request->get('phone');
        $office->save();

        return redirect(route('user.office'));
    }
}