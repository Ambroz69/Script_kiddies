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
                <label for="region">Kraj:</label>
                <select name="region" id="region" class="form-control">
                    <option value="Bratislavský" @php if($address->region == 'Bratislavský') echo 'selected';@endphp>Bratislavský</option>
                    <option value="Trnavský" @php if($address->region == 'Trnavský') echo 'selected';@endphp>Trnavský</option>
                    <option value="Trenčiansky" @php if($address->region == 'Trenčiansky') echo 'selected';@endphp>Trenčiansky</option>
                    <option value="Nitriansky" @php if($address->region == 'Nitriansky') echo 'selected';@endphp>Nitriansky</option>
                    <option value="Žilinský" @php if($address->region == 'Žilinský') echo 'selected';@endphp>Žilinský</option>
                    <option value="Banskobystrický" @php if($address->region == 'Banskobystrický') echo 'selected';@endphp>Banskobystrický</option>
                    <option value="Prešovský" @php if($address->region == 'Prešovský') echo 'selected';@endphp>Prešovský</option>
                    <option value="Košický" @php if($address->region == 'Košický') echo 'selected';@endphp>Košický</option>
                </select>
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