@extends('user.layouts.app')
@section('title', 'My office')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 py-5">
                <div class="row px-0 pb-5">
                    @if (isset($office_id) && ((strcmp($user->status,'prijatý') == 0) || (strcmp($user->status,'správca') == 0)))
                        <div class="col-md-4 my-3 mx-3">
                            <table class="table table-striped"
                                   style="width:100%; align-items: center; margin-bottom: 2em">
                                <tr>
                                    <th style="background-color: #3B3B53 !important; height: 2rem; color: white; width: 35%">
                                        Realitná kancelária
                                    </th>
                                    <td style="background-color: #3B3B53 !important"></td>
                                </tr>
                                <tr>
                                    <th>Názov</th>
                                    <td>{{ $user->realEstateOffice->name }}</td>
                                </tr>
                                <tr>
                                    <th>Webová stránka</th>
                                    <td>
                                        <a href="http://{{ $user->realEstateOffice->web }}">{{ $user->realEstateOffice->web }}</a>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Telefónne číslo</th>
                                    <td>{{ $user->realEstateOffice->phone }}</td>
                                </tr>
                            </table>
                            <table class="table table-striped"
                                   style="width:100%; align-items: center; margin-bottom: 2em">
                                <tr>
                                    <th style="background-color: #3B3B53 !important; height: 2rem; color: white; width: 35%">
                                        Adresa
                                    </th>
                                    <td style="background-color: #3B3B53 !important"></td>
                                </tr>
                                <tr>
                                    <th style="">Ulica</th>
                                    <td>{{ $user->realEstateOffice->address->address_name.' '.$user->realEstateOffice->address->address_number }}</td>
                                </tr>
                                <tr>
                                    <th style="">Mesto</th>
                                    <td>{{ $user->realEstateOffice->address->city }}</td>
                                </tr>
                                <tr>
                                    <th style="">PSČ</th>
                                    <td>{{ $user->realEstateOffice->address->zip }}</td>
                                </tr>
                                <tr>
                                    <th style="">Kraj</th>
                                    <td>{{ $user->realEstateOffice->address->region }}</td>
                                </tr>
                            </table>
                            @if(strcmp($user->status,'správca') == 0)
                                <div class="col-md-12 float-right px-0">
                                    <a role="button" class="btn btn-secondary btn-block"
                                       href="{{ route('user.office.edit', $user->id) }}">
                                        Upraviť údaje
                                    </a>
                                </div>
                            @endif
                        </div>
                    @elseif(isset($office_id) && (strcmp($user->status,'čakajúci') == 0))
                        <div class="col-md-12">
                            <div class="row ml-3 mt-3">
                                <label style="font-size: 1.2em">Realitná kancelária
                                    <strong>{{ $user->realEstateOffice->name }}</strong> obdržala Vašu žiadosť,
                                    počkajte prosím na schválenie.</label>
                            </div>
                            <div class="row ml-3 mt-3">
                                <div class="col-md-2 px-0">
                                    <a role="button" class="btn btn-secondary btn-block"
                                       href="{{ route('user.office.cancel_request') }}">
                                        Zrušiť žiadosť
                                    </a>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-md-3 float-right pr-0">
                            <label>Nemáte priradenú realitnú kanceláriu.</label>
                            <a role="button" class="btn btn-primary btn-block" href="{{ route('user.office.create') }}">
                                Vytvoriť realitnú kanceláriu
                            </a>
                            <a role="button" class="btn btn-secondary btn-block"
                               href=" {{ route('user.office.find') }}">
                                Pridať sa k existujúcej RK
                            </a>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection