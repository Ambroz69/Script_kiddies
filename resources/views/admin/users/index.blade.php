@extends('admin.layouts.app')
@section('title', 'Users')

@section('content')
    {{--<h1 class="h2 my-3"></h1>--}}
    <!--<a class="btn btn-md btn-success my-3" href="}}{{ route('admin.users.create') }}"><span data-feather="plus-square"></span></a>-->

    {{--@component('admin.components.alert', ['type' => 'success'])--}}
        {{--pomoc--}}
    {{--@endcomponent--}}
    <br>
    <table id="table" class="mt-3 table table-striped">
        <thead>
        <tr>
            <th class="bg-primary text-white">ID</th>
            <th>Meno</th>
            <th>Priezvisko</th>
            <th>E-mail</th>
            <th>Admin</th>
            <th>ID RK</th>
            <th>Vytvorené</th>
            <th>Upravené</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->surname}}</td>
                <td>{{$user->lastname}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->isAdmin}}</td>
                <td>{{$user->real_estate_office_id}}</td>
                <td>{{$user->created_at->format('Y-m-d H:m')}}</td>
                <td>{{$user->updated_at->format('Y-m-d H:m')}}</td>

                <td><a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-info text-white"><span data-feather="edit"></span></a></td>
                <td>
                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="post">
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