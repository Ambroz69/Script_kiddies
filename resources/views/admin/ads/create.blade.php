@extends('admin.layouts.app')
@section('title', 'Real estate offices')

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

    <form method="post" action="{{ route('admin.ads.store') }}">
        @csrf
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="description">Názov:</label>
                <input id="description"type="text" class="form-control" name="description">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="price">Cena:</label>
                <input id="price" type="text" class="form-control" name="price">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="category">Kategória:</label>
                <select name="category" id="category" class="form-control">
                    <option value="predaj">Predaj</option>
                    <option value="prenájom">Prenájom</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="notes">Popis:</label>
                <textarea rows="5" class="form-control" name="notes" id="notes"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                {!! Form::Label('address_id', 'Adresa:') !!}
                {!! Form::select('address_id', $address, null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                {!! Form::Label('user_id', 'Autor:') !!}
                {!! Form::select('user_id', $user, null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                {!! Form::Label('house_id', 'Dom ID:') !!}
                {!! Form::select('house_id', $house, null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                {!! Form::Label('apartment_id', 'Byt ID:') !!}
                {!! Form::select('apartment_id', $apartment, null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                {!! Form::Label('estate_id', 'Pozemok ID:') !!}
                {!! Form::select('estate_id', $estate, null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <button type="submit" class="btn btn-primary text-white float-right">Pridať</button>
                <a role="button" href="{{ route('admin.ads.index') }}"
                   class="btn btn-secondary text-white float-lg-left">Zrušiť</a>
            </div>
        </div>
    </form>
@endsection