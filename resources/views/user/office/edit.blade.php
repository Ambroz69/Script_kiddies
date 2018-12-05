@extends('user.layouts.app')
@section('title', 'Vytvorit RK')
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
    <form method="post" action="{{ route('user.office.update', $user->id) }}">
        @csrf
        <input name="_method" type="hidden" value="PATCH">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="name">Názov:</label>
                <input id="name" type="text" class="form-control" name="name"
                       value="{{ $user->realEstateOffice->name }}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="web">Webová stránka:</label>
                <input id="web" type="text" class="form-control" name="web"
                       value="{{ $user->realEstateOffice->web }}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="phone">Telefónne číslo:</label>
                <input id="phone" type="text" class="form-control" name="phone"
                       value="{{ $user->realEstateOffice->phone }}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="address_name">Ulica:</label>
                <input id="address_name" type="text" class="form-control" name="address_name"
                       value="{{ $user->realEstateOffice->address->address_name }}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="address_number">Číslo:</label>
                <input id="address_number" type="text" class="form-control" name="address_number"
                       value="{{ $user->realEstateOffice->address->address_number }}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="city">Mesto:</label>
                <input id="city" type="text" class="form-control" name="city"
                       value="{{ $user->realEstateOffice->address->city }}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="region">Kraj:</label>
                <select name="region" id="region" class="form-control">
                    <option value="Bratislavský" @php if(strcmp($user->realEstateOffice->address->region,'Bratislavský') == 0) echo 'selected'; @endphp>Bratislavský</option>
                    <option value="Trnavský" @php if(strcmp($user->realEstateOffice->address->region,'Trnavský') == 0) echo 'selected'; @endphp>Trnavský</option>
                    <option value="Trenčiansky" @php if(strcmp($user->realEstateOffice->address->region,'Trenčiansky') == 0) echo 'selected'; @endphp>Trenčiansky</option>
                    <option value="Nitriansky" @php if(strcmp($user->realEstateOffice->address->region,'Nitriansky') == 0) echo 'selected'; @endphp>Nitriansky</option>
                    <option value="Žilinský" @php if(strcmp($user->realEstateOffice->address->region,'Žilinský') == 0) echo 'selected'; @endphp>Žilinský</option>
                    <option value="Banskobystrický" @php if(strcmp($user->realEstateOffice->address->region,'Banskobystrický') == 0) echo 'selected'; @endphp>Banskobystrický</option>
                    <option value="Prešovský" @php if(strcmp($user->realEstateOffice->address->region,'Prešovský') == 0) echo 'selected'; @endphp>Prešovský</option>
                    <option value="Košický" @php if(strcmp($user->realEstateOffice->address->region,'Košický') == 0) echo 'selected'; @endphp>Košický</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="zip">PSČ:</label>
                <input id="zip" type="text" class="form-control" name="zip"
                       value="{{ $user->realEstateOffice->address->zip }}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <button type="submit" class="btn btn-primary text-white float-right">Pridať</button>
                <a role="button" href="{{ route('user.office') }}" class="btn btn-secondary text-white float-lg-left">Zrušiť</a>
            </div>
        </div>
    </form>
@endsection