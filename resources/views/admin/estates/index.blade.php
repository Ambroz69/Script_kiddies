@extends('admin.layouts.app')
@section('title', 'Estates')

@section('content')
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12 py-5">
                <div class="col-md-12 px-0 pb-5">
                    <div class=" col-md-10 float-left">
                        <h2>Pozemky</h2>
                    </div>
                    <div class="col-md-2 float-right pr-0">
                        <a role="button" class="btn btn-secondary btn-block" href="{{ route('admin.estates.create') }}">
                            Pridať
                        </a>
                    </div>
                </div>
                <table id="table" class="mt-3 table" style="width: 100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Typ</th>
                        <th>Ár</th>
                        <th>Cena za ár</th>
                        <th> </th>
                        <th> </th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($estates as $estate)
                        <tr>
                            <td>{{$estate->id}}</td>
                            <td>{{$estate->type}}</td>
                            <td>{{$estate->area_ares}}</td>
                            <td>{{$estate->price_per_ares}}</td>
                            <td></td>
                            <td style="padding-right: 0;">
                                <div id="container">
                                    <div style="float: right; margin-left: 10px;">
                                        <form action="{{ route('admin.estates.destroy', $estate->id) }}" method="post" class="float-right">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger" type="submit"><span data-feather="trash-2"></span></button>
                                        </form>
                                    </div>
                                    <div style="float: right; margin-right: 0px;">
                                        <a  href="{{ route('admin.estates.edit', $estate->id) }}" class="btn btn-info text-white float-left">
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