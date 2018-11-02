@extends('admin.layouts.app')
@section('title', 'Users')

@section('content')
    <h2></h2>
    <form method="post" action="{{ route('admin.users.update', $user->id) }}">
        @csrf
        <input name="_method" type="hidden" value="PATCH">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="surname">Meno:</label>
                <input id="surname" type="text" class="form-control" name="surname" value="{{$user->surname}}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="lastname">Priezvisko:</label>
                <input id="lastname" type="text" class="form-control" name="lastname" value="{{$user->lastname}}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="email">Email:</label>
                <input id="email" type="text" class="form-control" name="email" value="{{$user->email}}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="admin">Admin:</label>
                <select name="admin" id="admin" class="form-control">
                    <option value="1">Áno</option>
                    <option value="0">Nie</option>
                </select>

            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                {!! Form::Label('real_estate_office_id', 'RK:') !!}
                {!! Form::select('real_estate_office_id', $real_estate_office, $selected_real_estate_office_id, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <button type="submit" class="btn btn-primary text-white float-lg-right">Zmeniť</button>
                <a role="button" href="{{ route('admin.users.index') }}" class="btn btn-secondary text-white float-lg-left">Zrušiť</a>
            </div>
        </div>
    </form>
    <div  class="form-group col-md-4 container-fluid">

    </div>

@endsection