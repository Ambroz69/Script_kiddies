<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\RealEstateOffice;
use App\User;
use Validator;
use App\Rules\OnlyOneId;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {

        $users = User::all()->load('realEstateOffice');
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request, User $user)
    {
        $rules = [
            'surname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'password' => 'required|string|max:255',

        ];
        $messages = [
            'required' => 'Vyplňte prázdne pole ":attribute".',
            'integer' => '":attribute" musí byť celé číslo.',
            'string' => 'Neznáme znaky v poli ":attribute".',
            'max' => 'Maximálny počet znakov v poli ":attribute" je :max.'
        ];
        $attributes = [
            'surname' => 'Meno',
            'lastname' => 'Priezvisko',
            'email' => 'E-mail',
            'password' => 'Heslo',
        ];
        Validator::make($request->all(), $rules, $messages, $attributes)->validate();

        $user = new \App\User;
        $user->surname = $request->get('surname');
        $user->lastname = $request->get('lastname');
        $user->email = $request->get('email');
        $user->password = $request->get('password');
        $user->password = Hash::make('password');
        $user->isAdmin = $request->get('admin');
        $user->save();
        return redirect(route('admin.users.index'))->with('success', 'Záznam bol pridaný.');
    }

    public function show($id)
    {
        //
    }

    public function edit(User $user)
    {
        $real_estate_office = RealEstateOffice::pluck('name','id');
        $selected_real_estate_office_id = null;

        if ($user->realEstateOffice) {
            $selected_real_estate_office_id = $user->realEstateOffice->id;
        }
        return view('admin.users.edit', compact('user','real_estate_office', 'selected_real_estate_office_id'));
    }

    public function update(Request $request, User $user)
    {
        $rules = [
            'surname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|max:255',

        ];
        $messages = [
            'required' => 'Vyplňte prázdne pole ":attribute".',
            'integer' => '":attribute" musí byť celé číslo.',
            'string' => 'Neznáme znaky v poli ":attribute".',
            'max' => 'Maximálny počet znakov v poli ":attribute" je :max.'
        ];
        $attributes = [
            'surname' => 'Meno',
            'lastname' => 'Priezvisko',
            'email' => 'E-mail',
        ];
        Validator::make($request->all(), $rules, $messages, $attributes)->validate();

        $user->surname = $request->get('surname');
        $user->lastname = $request->get('lastname');
        $user->email = $request->get('email');
        $user->isAdmin = $request->get('admin');
        $user->real_estate_office_id = $request->get('real_estate_office_id');
        $user->save();
        return redirect(route('admin.users.index'));
    }
    public function destroy(User $user)
    {
        try {
            $user->delete();
        } catch (\Exception $e) {
        }
        return redirect(route('admin.users.index'))
            ->with('success', 'Záznam bol vymazaný.');
    }
}