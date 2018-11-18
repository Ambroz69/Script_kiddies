@extends('admin.layouts.app')
@section('title', 'Users')

@section('content')
    {{--<h1 class="h2 my-3"></h1>--}}
    <!--<a class="btn btn-md btn-success my-3" href="}}{{ route('admin.users.create') }}"><span data-feather="plus-square"></span></a>-->

    {{--@component('admin.components.alert', ['type' => 'success'])--}}
    {{--pomoc--}}
    {{--@endcomponent--}}
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12 py-5">
                <div class="col-md-12 px-0 pb-5">
                    <div class=" col-md-10 float-left">
                        <h2>Používatelia</h2>
                    </div>
                    <div class="col-md-2 float-right pr-0">
                        <a role="button" class="btn btn-secondary btn-block" href="{{ route('admin.users.create') }}">
                           Pridať
                        </a>
                    </div>
                </div>
                <table id="table" class="mt-3 table" style="width: 100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Meno</th>
                        <th>Priezvisko</th>
                        <th>E-mail</th>
                        <th>Admin</th>
                        <th>ID RK</th>
                        <!--<th>Vytvorené</th>
                        <th>Upravené</th>-->
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
                            <td>
                                @php
                                    if ($user->isAdmin == 0) {
                                        echo 'nie';
                                    } else {
                                        echo 'áno';
                                    }
                                @endphp
                            </td>
                            <td>
                                @isset($user->realEstateOffice)
                                    <a href="{{ route('admin.realestateoffices.edit', $user->realEstateOffice->id) }}">{{$user->realEstateOffice->name}}</a>
                                @endisset
                            </td>
                        <!--<td>{{$user->created_at->format('Y-m-d H:m')}}</td>
                <td>{{$user->updated_at->format('Y-m-d H:m')}}</td>-->
                            <td></td>

                            <td class="form-inline" style="padding-right: 0; text-align: right;">
                                        <a  href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-info text-white float-left"
                                            style="margin-right: 5px;">
                                            <span data-feather="edit"></span>
                                        </a>
                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="post" class="float-right">
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