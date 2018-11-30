@extends('admin.layouts.app')
@section('title', 'Apartments')

@section('content')
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12 py-5">
                <div class="col-md-12 px-0 pb-5">
                    <div class=" col-md-10 float-left">
                        <h3 style="font-family: 'Open Sans', sans-serif; letter-spacing: 2px;"><strong>BYTY</strong></h3>
                    </div>
                    <div class="col-md-2 float-right pr-0">
                        <a role="button" class="btn btn-secondary btn-block" href="{{ route('admin.apartments.create') }}">
                            Pridať
                        </a>
                    </div>
                </div>
                <table id="table" class="mt-3 table" style="width: 100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Počet izieb</th>
                        <th>Poschodie</th>
                        <th>Detaily</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($apartments as $apartment)
                        <tr>
                            <td>{{$apartment->id}}</td>
                            <td>{{$apartment->room_count}}</td>
                            <td>{{$apartment->floor}}</td>
                            <td>
                                @isset($apartment->propertyDetails)
                                    <a href="{{ route('admin.propertydetails.edit', $apartment->propertyDetails->id) }}">
                                        {{$apartment->propertyDetails->id}}
                                    </a>
                                @endisset
                            </td>

                            <td style="padding-right: 0;">
                                <div id="container">
                                    <div style="float: right; margin-left: 10px;">
                                        <form action="{{ route('admin.apartments.destroy', $apartment->id) }}" method="post" class="float-right">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger" type="submit"><span data-feather="trash-2"></span></button>
                                        </form>
                                    </div>
                                    <div style="float: right; margin-right: 0;">
                                        <a  href="{{ route('admin.apartments.edit', $apartment->id) }}" class="btn btn-info text-white float-left">
                                            <span data-feather="edit"></span>
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection