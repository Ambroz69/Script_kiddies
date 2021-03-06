@extends('admin.layouts.app')
@section('title', 'Addresses')

@section('content')

    <br>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post" action="{{ route('admin.addresses.store') }}">
        @csrf
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="address_name">Ulica:</label>
                <input id="address_name" type="text" class="form-control" name="address_name">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="address_number">Číslo:</label>
                <input id="address_number" type="text" class="form-control" name="address_number">
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
                <label for="region">Kraj:</label>
                <select name="region" id="region" class="form-control">
                    <option value="Bratislavský">Bratislavský</option>
                    <option value="Trnavský">Trnavský</option>
                    <option value="Trenčiansky">Trenčiansky</option>
                    <option value="Nitriansky">Nitriansky</option>
                    <option value="Žilinský">Žilinský</option>
                    <option value="Banskobystrický">Banskobystrický</option>
                    <option value="Prešovský">Prešovský</option>
                    <option value="Košický">Košický</option>
                </select>
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
                <button type="submit" class="btn btn-primary text-white float-right">Pridať</button>
                <a role="button" href="{{ route('admin.addresses.index') }}" class="btn btn-secondary text-white float-lg-left">Zrušiť</a>
            </div>
        </div>
    </form>
@endsection