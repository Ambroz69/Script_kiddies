@extends('admin.layouts.app')
@section('title', 'Real estate offices')

@section('content')
    <!--<h2></h2><br/>-->
    <br>
    <form method="post" action="{{ route('admin.realestateoffices.store') }}">
        @csrf
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="name">Názov:</label>
                <input id="name" type="text" class="form-control" name="name">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="address">Adresa:</label>
                <input id="address" type="text" class="form-control" name="address">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="city">Mesto:</label>
                <input id="city" type="text" class="form-control" name="city">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="zip">PSČ:</label>
                <input id="zip" type="text" class="form-control" name="zip">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="web">Webová stránka:</label>
                <input id="web" type="text" class="form-control" name="web">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="phone">Telefónne číslo:</label>
                <input id="phone" type="text" class="form-control" name="phone">
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
                <a role="button" href="{{ route('admin.realestateoffices.index') }}" class="btn btn-secondary text-white float-lg-left">Zrušiť</a>
            </div>
        </div>
    </form>
@endsection