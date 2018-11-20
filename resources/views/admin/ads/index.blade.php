@extends('admin.layouts.app')
@section('title', 'Ads')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 py-5">
                <div class="col-md-12 px-0 pb-5">
                    <div class=" col-md-10 float-left">
                        <h2>Adresy</h2>
                    </div>
                    <div class="col-md-2 float-right pr-0">
                        <a role="button" class="btn btn-secondary btn-block" href="{{ route('admin.ads.create') }}">
                            Pridať
                        </a>
                    </div>
                </div>
                <table id="table" class="mt-3 table" style="width: 100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th style="width: 18%">Názov</th>
                        <th>Cena</th>
                        <th style="width: 18%">Popis</th>
                        <th style="width: 18%">Adresa</th>
                        <th>Autor</th>
                        <th>Typ</th>
                        <th>ID nehnuteľnosti</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($ads as $ad)
                        <tr>
                            <td>{{$ad->id}}</td>
                            <td>{{$ad->description}}</td>
                            <td>{{$ad->price}}</td>
                            <td>{{$ad->notes}}</td>
                            <td>
                                @isset($ad->address)
                                    <a href="{{ route('admin.addresses.edit', $ad->address->id) }}">
                                        {{$ad->address->address_name}} {{$ad->address->address_number}}
                                        , {{$ad->address->zip}} {{$ad->address->city}}
                                    </a>
                                @endisset
                            </td>
                            <td>
                                @isset($ad->user)
                                    <a href="{{ route('admin.users.edit', $ad->user->id) }}">
                                        {{$ad->user->surname}} {{$ad->user->lastname}}
                                    </a>
                                @endisset
                            </td>
                            <td>
                                @isset($ad->house)
                                        dom
                                @endisset
                                @isset($ad->apartment)
                                        byt
                                @endisset
                                @isset($ad->estate)
                                        pozemok
                                @endisset
                            </td>
                            <td>
                                @isset($ad->house)
                                    <a href="{{ route('admin.houses.edit', $ad->house->id) }}">
                                        {{$ad->house->id}}
                                    </a>
                                @endisset
                                @isset($ad->apartment)
                                    <a href="{{ route('admin.apartments.edit', $ad->apartment->id) }}">
                                        {{$ad->apartment->id}}
                                    </a>
                                @endisset
                                @isset($ad->estate)
                                    <a href="{{ route('admin.estates.edit', $ad->estate->id) }}">
                                        {{$ad->estate->id}}
                                    </a>
                                @endisset
                            </td>
                            <td></td>
                            <td style="padding-right: 0;">
                                <div id="container">
                                    <div style="float: right; margin-left: 10px;">
                                        <form action="{{ route('admin.ads.destroy', $ad->id) }}" method="post"
                                              class="float-right">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger" type="submit"><span
                                                        data-feather="trash-2"></span></button>
                                        </form>
                                    </div>
                                    <div style="float: right; margin-right: 0px;">
                                        <a href="{{ route('admin.ads.edit', $ad->id) }}"
                                           class="btn btn-info text-white float-left">
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