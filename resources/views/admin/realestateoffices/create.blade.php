@extends('admin.layouts.app')
@section('title', 'Real estate offices')

@section('content')

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