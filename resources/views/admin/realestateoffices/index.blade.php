@extends('admin.layouts.app')
@section('title', 'Real estate offices')

@section('content')
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12 py-5">
                <div class="col-md-12 px-0 pb-5">
                    <div class=" col-md-10 float-left">
                        <h3 style="font-family: 'Open Sans', sans-serif; letter-spacing: 2px;"><strong>REALITNÉ KANCELÁRIE</strong></h3>
                    </div>
                    <div class="col-md-2 float-right pr-0">
                        <a role="button" class="btn btn-secondary btn-block" href="{{ route('admin.realestateoffices.create') }}">
                            Pridať
                        </a>
                    </div>
                </div>
                <table id="table" class="mt-3 table" style="width: 100%">
                    <thead>
                    <tr>
                        <th class="bg-primary text-white">#</th>
                        <th>Názov</th>
                        <th>Webová stránka</th>
                        <th>Telefónne číslo</th>
                        <th>Adresa</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($realestateoffices as $realestateoffice)
                        <tr>
                            <td>{{$realestateoffice->id}}</td>
                            <td>{{$realestateoffice->name}}</td>
                            <td>{{$realestateoffice->web}}</td>
                            <td>{{$realestateoffice->phone}}</td>
                            <td>
                                @isset($realestateoffice->address)
                                    <a href="{{ route('admin.addresses.edit', $realestateoffice->address->id) }}">
                                        {{$realestateoffice->address->address_name}} {{$realestateoffice->address->address_number}}, {{$realestateoffice->address->zip}} {{$realestateoffice->address->city}}
                                    </a>
                                @endisset
                            </td>
                            <td></td>
                            <td style="padding-right: 0;">
                                <div id="container">
                                    <div style="float: right; margin-left: 10px;">
                                        <form action="{{ route('admin.realestateoffices.destroy', $realestateoffice->id) }}" method="post" class="float-right">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger" type="submit"><span data-feather="trash-2"></span></button>
                                        </form>
                                    </div>
                                    <div style="float: right; margin-right: 0px;">
                                        <a  href="{{ route('admin.realestateoffices.edit', $realestateoffice->id) }}" class="btn btn-info text-white float-left">
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