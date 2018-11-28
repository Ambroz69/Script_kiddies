@extends('admin.layouts.app')
@section('title', 'Ads')

@section('content')
    <h2></h2>
    <form method="post" action="{{ route('admin.ads.update', $ad->id) }}">
        @csrf
        <input name="_method" type="hidden" value="PATCH">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="description">Názov:</label>
                <input id="description" type="text" class="form-control" name="description" value="{{$ad->description}}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="price">Cena:</label>
                <input id="price" type="text" class="form-control" name="price" value="{{$ad->price}}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="category">Admin:</label>
                <select name="category" id="category" class="form-control">
                     <option value="predaj" @php if(strcmp($ad->category,'predaj') == 0) echo 'selected';@endphp>Predaj</option>
                    <option value="prenájom" @php if(strcmp($ad->category,'prenájom') == 0) echo 'selected';@endphp>Prenájom</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="notes">Popis:</label>
                <textarea rows="5" class="form-control" name="notes" id="notes">{{$ad->notes}}</textarea>
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
            <div class="form-group col-md-4">
                {!! Form::Label('user_id', 'Autor:') !!}
                {!! Form::select('user_id', $user, $selected_user_id, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                {!! Form::Label('user_id', 'ID nehnuteľnosti:') !!}
                @isset($selected_house_id)
                    {!! Form::select('house_id', $house, $selected_house_id, ['class' => 'form-control']) !!}
                @endisset

                @isset($selected_apartment_id)
                    {!! Form::select('apartment_id', $apartment, $selected_apartment_id, ['class' => 'form-control']) !!}
                @endisset

                @isset($selected_estate_id)
                    {!! Form::select('estate_id', $estate, $selected_estate_id, ['class' => 'form-control']) !!}
                @endisset
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4" >
                <button type="submit" class="btn btn-primary text-white float-lg-right">Zmeniť</button>
                <a role="button" href="{{ route('admin.ads.index') }}" class="btn btn-secondary text-white float-lg-left">Zrušiť</a>
            </div>
        </div>
    </form>
@endsection