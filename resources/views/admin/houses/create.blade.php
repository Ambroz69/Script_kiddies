@extends('admin.layouts.app')
@section('title', 'Houses')

@section('content')
    <br>
    <form method="post" action="{{ route('admin.houses.store') }}">
        @csrf
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="floor_count">Počet poschodí:</label>
                <input id="floor_count" type="text" class="form-control" name="floor_count">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="terrace">Terasa:</label>
                <select name="terrace" id="terrace" class="form-control">
                    <option value="1">Áno</option>
                    <option value="0">Nie</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="garden">Záhrada:</label>
                <input id="garden" type="text" class="form-control" name="garden">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                {!! Form::Label('property_details_id', 'Detaily ID:') !!}
                {!! Form::select('property_details_id', $property_detail, null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <button type="submit" class="btn btn-primary text-white float-right">Pridať</button>
                <a role="button" href="{{ route('admin.houses.index') }}" class="btn btn-secondary text-white float-lg-left">Zrušiť</a>
            </div>
        </div>
    </form>
@endsection