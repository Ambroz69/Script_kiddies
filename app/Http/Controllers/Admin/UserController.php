<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\RealEstateOffice;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
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

        $users = User::all()->load('realEstateOffice');
        return view('admin.users.index', compact('users'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
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
    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

        $real_estate_office = RealEstateOffice::pluck('name','id');
        $selected_real_estate_office_id = $user->realEstateOffice->id;

        return view('admin.users.edit', compact('user','real_estate_office', 'selected_real_estate_office_id'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
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