@extends('admin.layouts.app')
@section('title', 'Addresses')

@section('content')
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12 py-5">
                <div class="col-md-12 px-0 pb-5">
                    <div class=" col-md-10 float-left">
                        <h2>Adresy</h2>
                    </div>
                    <div class="col-md-2 float-right pr-0">
                        <a role="button" class="btn btn-secondary btn-block" href="{{ route('admin.addresses.create') }}">
                            Pridať
                        </a>
                    </div>
                </div>
                <table id="table" class="mt-3 table" style="width: 100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Ulica</th>
                        <th>Číslo</th>
                        <th>Mesto</th>
                        <th>PSČ</th>
                       <th> </th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($addresses as $address)
                        <tr>
                            <td>{{$address->id}}</td>
                            <td>{{$address->address_name}}</td>
                            <td>{{$address->address_number}}</td>
                            <td>{{$address->city}}</td>
                            <td>{{$address->zip}}</td>

                            <td class="form-inline" style="padding-right: 0; text-align: right;">
                                <a  href="{{ route('admin.addresses.edit', $address->id) }}" class="btn btn-info text-white float-left"
                                    style="margin-right: 5px;">
                                    <span data-feather="edit"></span>
                                </a>
                                <form action="{{ route('admin.addresses.destroy', $address->id) }}" method="post" class="float-right">
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