@extends('admin.layouts.app')
@section('title', 'Real estate offices')

@section('content')
    <br>
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
            <div class="form-group col-md-4">
                {!! Form::Label('address_id', 'Adresa:') !!}
                {!! Form::select('address_id', $address, $selected_address_id, ['class' => 'form-control']) !!}
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