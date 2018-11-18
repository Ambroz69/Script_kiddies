@extends('admin.layouts.app')
@section('title', 'Real estate offices')

@section('content')
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12 py-5">
                <div class="col-md-12 px-0 pb-5">
                    <div class=" col-md-10 float-left">
                        <h2>Realitné kancelárie</h2>
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

                            <td class="form-inline" style="padding-right: 0; text-align: right;">
                                <a  href="{{ route('admin.realestateoffices.edit', $realestateoffice->id) }}" class="btn btn-info text-white float-left"
                                    style="margin-right: 5px;">
                                    <span data-feather="edit"></span>
                                </a>
                                <form action="{{ route('admin.realestateoffices.destroy', $realestateoffice->id) }}" method="post" class="float-right">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger" type="submit"><span data-feather="trash-2"></span></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection