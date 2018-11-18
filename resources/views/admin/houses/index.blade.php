@extends('admin.layouts.app')
@section('title', 'Houses')

@section('content')
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12 py-5">
                <div class="col-md-12 px-0 pb-5">
                    <div class=" col-md-10 float-left">
                        <h2>Domy</h2>
                    </div>
                    <div class="col-md-2 float-right pr-0">
                        <a role="button" class="btn btn-secondary btn-block" href="{{ route('admin.houses.create') }}">
                            Pridať
                        </a>
                    </div>
                </div>
                <table id="table" class="mt-3 table" style="width: 100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Počet poschodí</th>
                        <th>Terasa</th>
                        <th>Záhrada</th>
                        <th> </th>
                        <th> </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($houses as $house)
                        <tr>
                            <td>{{$house->id}}</td>
                            <td>{{$house->floor_count}}</td>
                            <td>{{$house->terrace}}</td>
                            <td>{{$house->garden}}</td>
                            <td></td>
                            <td style="padding-right: 0;">
                                <div id="container">
                                    <div style="float: right; margin-left: 10px;">
                                        <form action="{{ route('admin.houses.destroy', $house->id) }}" method="post" class="float-right">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger" type="submit"><span data-feather="trash-2"></span></button>
                                        </form>
                                    </div>
                                    <div style="float: right; margin-right: 0px;">
                                        <a  href="{{ route('admin.houses.edit', $house->id) }}" class="btn btn-info text-white float-left">
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