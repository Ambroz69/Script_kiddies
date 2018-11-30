@extends('admin.layouts.app')
@section('title', 'Property details')

@section('content')

    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12 py-5">
                <div class="col-md-12 px-0 pb-5">
                    <div class=" col-md-10 float-left">
                        <h3 style="font-family: 'Open Sans', sans-serif; letter-spacing: 2px;"><strong>DETAILY NEHNUTEĽNOSTÍ</strong></h3>
                    </div>
                    <div class="col-md-2 float-right pr-0">
                        <a role="button" class="btn btn-secondary btn-block" href="{{ route('admin.propertydetails.create') }}">
                            Pridať
                        </a>
                    </div>
                </div>
                <table id="table" class="mt-3 table" style="width: 100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Veľkosť</th>
                        <th>Typ</th>
                        <th>Druh okien</th>
                        <th>Orientácia</th>
                        <th>Balkón</th>
                        <th>Pivnica</th>
                        <th>Garáž</th>
                        <th>Zateplený</th>
                        <th>Kúrenie</th>
                        <th>Internet</th>
                        <th></th>
                        <th style="width: 12%"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($propertydetails as $propertydetail)
                        <tr>
                            <td>{{$propertydetail->id}}</td>
                            <td>{{$propertydetail->area_square_meters}}</td>
                            <td>{{$propertydetail->type}}</td>
                            <td>{{$propertydetail->window_type}}</td>
                            <td>{{$propertydetail->direction}}</td>
                            <td>
                                @php
                                    if ($propertydetail->balcony == 0) {
                                        echo ' <span data-feather="x"></span>';
                                    } else {
                                        echo '<span data-feather="check"></span>';
                                    }
                                @endphp
                            </td>
                            <td>
                                @php
                                    if ($propertydetail->cellar == 0) {
                                        echo ' <span data-feather="x"></span>';
                                    } else {
                                        echo '<span data-feather="check"></span>';
                                    }
                                @endphp
                            </td>
                            <td>
                                @php
                                    if ($propertydetail->garage == 0) {
                                        echo ' <span data-feather="x"></span>';
                                    } else {
                                        echo '<span data-feather="check"></span>';
                                    }
                                @endphp
                            </td>
                            <td>
                                @php
                                    if ($propertydetail->insulated == 0) {
                                        echo ' <span data-feather="x"></span>';
                                    } else {
                                        echo '<span data-feather="check"></span>';
                                    }
                                @endphp
                            </td>
                            <td>{{$propertydetail->heating}}</td>
                            <td>{{$propertydetail->internet}}</td>
                            <td></td>
                            <td style="padding-right: 0;">
                                <div id="container">
                                    <div style="float: right; margin-left: 10px;">
                                        <form action="{{ route('admin.propertydetails.destroy', $propertydetail->id) }}" method="post" class="float-right">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger" type="submit"><span data-feather="trash-2"></span></button>
                                        </form>
                                    </div>
                                    <div style="float: right; margin-right: 0;">
                                        <a  href="{{ route('admin.propertydetails.edit', $propertydetail->id) }}" class="btn btn-info text-white float-left">
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