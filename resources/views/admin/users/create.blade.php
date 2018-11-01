@extends('admin.layouts.app')
@yield('title', 'Users')

@section('content')
    <h2>jasdnaskd</h2><br/>
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
                <select name="admin" id="admin">
                    <option value="1">Ano</option>
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
            <div class="form-group col-md-4" style="margin-top:60px">
                <button type="submit" class="btn btn-success">Pridať</button>
            </div>
        </div>
    </form>
@endsection