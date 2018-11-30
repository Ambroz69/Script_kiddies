@extends('admin.layouts.app')
@section('title', 'Apartments')

@section('content')
    <br>
    <form method="post" action="{{ route('admin.apartments.update', $apartment->id) }}">
        @csrf
        <input name="_method" type="hidden" value="PATCH">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="room_count">Počet izieb:</label>
                <input id="room_count" type="text" class="form-control" name="room_count" value="{{$apartment->room_count}}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="floor">Poschodie:</label>
                <input id="floor" type="text" class="form-control" name="floor" value="{{$apartment->floor}}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                {!! Form::Label('property_details_id', 'Detaily ID:') !!}
                {!! Form::select('property_details_id', $property_detail, $selected_property_detail_id, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4" >
                <button type="submit" class="btn btn-primary text-white float-lg-right">Zmeniť</button>
                <a role="button" href="{{ route('admin.apartments.index') }}" class="btn btn-secondary text-white float-lg-left">Zrušiť</a>
            </div>
        </div>
    </form>
@endsection