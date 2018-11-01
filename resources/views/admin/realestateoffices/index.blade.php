@extends('admin.layouts.app')
@section('title', 'Real estate offices')

@section('content')
    <br>
    <table id="table" class="mt-3 table table-striped">
        <thead>
        <tr>
            <th class="bg-primary text-white">ID</th>
            <th>Názov</th>
            <th>Adresa</th>
            <th>Mesto</th>
            <th>PSČ</th>
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
                <td>{{$realestateoffice->address}}</td>
                <td>{{$realestateoffice->city}}</td>
                <td>{{$realestateoffice->zip}}</td>
                <td>{{$realestateoffice->web}}</td>
                <td>{{$realestateoffice->phone}}</td>


                <td><a href="{{ route('admin.realestateoffices.edit', $realestateoffice->id) }}" class="btn btn-info text-white"><span data-feather="edit"></span></a></td>
                <td>
                    <form action="{{ route('admin.realestateoffices.destroy', $realestateoffice->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger" type="submit"><span data-feather="trash-2"></span></button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection