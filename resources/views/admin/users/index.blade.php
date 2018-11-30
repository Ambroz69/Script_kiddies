@extends('admin.layouts.app')
@section('title', 'Users')

@section('content')
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12 py-5">
                <div class="col-md-12 px-0 pb-5">
                    <div class=" col-md-10 float-left">
                        <h3 style="font-family: 'Open Sans', sans-serif; letter-spacing: 2px;"><strong>POUŽÍVATELIA</strong></h3>
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
                                        echo ' <span data-feather="x"></span>';
                                    } else {
                                        echo '<span data-feather="check"></span>';
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

                            <td style="padding-right: 0;">
                                <div id="container">
                                    <div style="float: right; margin-left: 10px;">
                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="post" class="float-right">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger" type="submit"><span data-feather="trash-2"></span></button>
                                        </form>
                                    </div>
                                    <div style="float: right; margin-right: 0;">
                                        <a  href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-info text-white float-left">
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