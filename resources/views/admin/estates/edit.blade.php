@extends('admin.layouts.app')
@section('title', 'Estates')

@section('content')

    <form method="post" action="{{ route('admin.estates.update', $estate->id) }}">
        @csrf
        <input name="_method" type="hidden" value="PATCH">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="type">Typ:</label>
                <input id="type" type="text" class="form-control" name="type" value="{{$estate->type}}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="area_ares">Ár:</label>
                <input id="area_ares" type="text" class="form-control" name="area_ares" value="{{$estate->area_ares}}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="price_per_ares">Cena za ár:</label>
                <input id="price_per_ares" type="text" class="form-control" name="price_per_ares" value="{{$estate->price_per_ares}}">
            </div>
        </div>

        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4" >
                <button type="submit" class="btn btn-primary text-white float-lg-right">Zmeniť</button>
                <a role="button" href="{{ route('admin.estates.index') }}" class="btn btn-secondary text-white float-lg-left">Zrušiť</a>
            </div>
        </div>
    </form>
@endsection