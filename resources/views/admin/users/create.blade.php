@extends('admin.layouts.app')
@section('title', 'Users')

@section('content')
    <!--<h2></h2><br/>-->
    <br>
    <form method="post" action="{{ route('admin.users.store') }}">
        @csrf
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="surname">Meno:</label>
                <input id="surname" type="text" class="form-control" name="surname">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="lastname">Priezvisko:</label>
                <input id="lastname" type="text" class="form-control" name="lastname">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="Email">Email:</label>
                <input id="Email" type="email" class="form-control" name="email">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="password">Heslo:</label>
                <input id="password" type="password" class="form-control" name="password">
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
        <!--<div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="Number">Phone Number:</label>
                <input type="text" class="form-control" name="number">
            </div>
        </div>-->

        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <button type="submit" class="btn btn-primary text-white float-right">Pridať</button>
                <a role="button" href="{{ route('admin.users.index') }}" class="btn btn-secondary text-white float-lg-left">Zrušiť</a>
            </div>
        </div>
    </form>
@endsection