@extends('admin.layouts.app')
@section('title', 'Property details')

@section('content')
    <br>
    <form method="post" action="{{ route('admin.propertydetails.store') }}">
        @csrf
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="area_square_meters">Veľkosť (m^2):</label>
                <input id="area_square_meters" type="text" class="form-control" name="area_square_meters">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="type">Typ:</label>
                <input id="type" type="text" class="form-control" name="type">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="window_type">Druh okien:</label>
                <input id="window_type" type="text" class="form-control" name="window_type">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="direction">Orientácia:</label>
                <input id="direction" type="text" class="form-control" name="direction">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="balcony">Balkón:</label>
                <select name="balcony" id="balcony" class="form-control">
                    <option value="1">Áno</option>
                    <option value="0">Nie</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="cellar">Pivnica:</label>
                <select name="cellar" id="cellar" class="form-control">
                    <option value="1">Áno</option>
                    <option value="0">Nie</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="garage">Garáž:</label>
                <select name="garage" id="garage" class="form-control">
                    <option value="1">Áno</option>
                    <option value="0">Nie</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="insulated">Zateplený:</label>
                <select name="insulated" id="insulated" class="form-control">
                    <option value="1">Áno</option>
                    <option value="0">Nie</option>
                </select>
            </div>
        </div>
       <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="heating">Kúrenie:</label>
                <input id="heating" type="text" class="form-control" name="heating">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="internet">Internet:</label>
                <input id="internet" type="text" class="form-control" name="internet">
            </div>
        </div>

        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <button type="submit" class="btn btn-primary text-white float-right">Pridať</button>
                <a role="button" href="{{ route('admin.propertydetails.index') }}" class="btn btn-secondary text-white float-lg-left">Zrušiť</a>
            </div>
        </div>
    </form>
@endsection