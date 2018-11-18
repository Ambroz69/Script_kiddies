@extends('admin.layouts.app')
@section('title', 'Addresses')

@section('content')

    <form method="post" action="{{ route('admin.addresses.update', $address->id) }}">
        @csrf
        <input name="_method" type="hidden" value="PATCH">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="address_name">Ulica:</label>
                <input id="address_name" type="text" class="form-control" name="address_name" value="{{$address->address_name}}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="address_number">Číslo:</label>
                <input id="address_number" type="text" class="form-control" name="address_number" value="{{$address->address_number}}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="city">Mesto:</label>
                <input id="city" type="text" class="form-control" name="city" value="{{$address->city}}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="zip">PSČ:</label>
                <input id="zip" type="text" class="form-control" name="zip" value="{{$address->zip}}">
            </div>
        </div>

        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4" >
                <button type="submit" class="btn btn-primary text-white float-lg-right">Zmeniť</button>
                <a role="button" href="{{ route('admin.addresses.index') }}" class="btn btn-secondary text-white float-lg-left">Zrušiť</a>
            </div>
        </div>
    </form>
@endsection