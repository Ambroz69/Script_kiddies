@extends('admin.layouts.app')
@section('title', 'Real estate offices')

@section('content')
    <h2></h2>
    <form method="post" action="{{ route('admin.realestateoffices.update', $realestateoffice->id) }}">
        @csrf
        <input name="_method" type="hidden" value="PATCH">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="name">Názov:</label>
                <input id="name" type="text" class="form-control" name="name" value="{{$realestateoffice->name}}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="address">Adresa:</label>
                <input id="address" type="text" class="form-control" name="address" value="{{$realestateoffice->address}}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="city">Mesto:</label>
                <input id="city" type="text" class="form-control" name="city" value="{{$realestateoffice->city}}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="zip">PSČ:</label>
                <input id="zip" type="text" class="form-control" name="zip" value="{{$realestateoffice->zip}}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="web">Webová adresa:</label>
                <input id="web" type="text" class="form-control" name="web" value="{{$realestateoffice->web}}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="phone">Telefónne číslo:</label>
                <input id="phone" type="text" class="form-control" name="phone" value="{{$realestateoffice->phone}}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4" >
                <button type="submit" class="btn btn-primary text-white float-lg-right">Zmeniť</button>
                <a role="button" href="{{ route('admin.realestateoffices.index') }}" class="btn btn-secondary text-white float-lg-left">Zrušiť</a>
            </div>
        </div>
    </form>
@endsection