@extends('user.layouts.app')
@section('title', 'My office')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 py-5">
                <div class="row px-0 pb-5">
                    @if (isset($office_id) && ((strcmp($user->status,'prijatý') == 0) || (strcmp($user->status,'správca') == 0)))
                        <div class="row my-3">
                            <table class="table table-striped" style="width:90%; align-items: center;">
                                <tr>
                                    <th>Realitná kancelária</th>
                                    <td>{{ $user->realEstateOffice->name }}</td>
                                </tr>
                                <tr>
                                    <th>Webová stránka</th>
                                    <td> <a href="http://{{ $user->realEstateOffice->web }}">{{ $user->realEstateOffice->web }}</a></td>
                                </tr>
                                <tr>
                                    <th>Telefónne číslo</th>
                                    <td>{{ $user->realEstateOffice->phone }}</td>
                                </tr>
                                <tr>
                                    <th>Adresa</th>
                                </tr>
                                <tr>
                                    <th style="padding-left: 3em">Ulica</th>
                                    <td>{{ $user->realEstateOffice->address->address_name.' '.$user->realEstateOffice->address->address_number }}</td>
                                </tr>
                                <tr>
                                    <th style="padding-left: 3em">Mesto</th>
                                    <td>{{ $user->realEstateOffice->address->city }}</td>
                                </tr>
                                <tr>
                                    <th style="padding-left: 3em">PSČ</th>
                                    <td>{{ $user->realEstateOffice->address->zip }}</td>
                                </tr>
                                <tr>
                                    <th style="padding-left: 3em">Kraj</th>
                                    <td>{{ $user->realEstateOffice->address->region }}</td>
                                </tr>
                            </table>
                            @if(strcmp($user->status,'správca'))
                                <div class="col-md-12 float-right pr-0">
                                    <a role="button" class="btn btn-secondary btn-block" href="#">
                                        Upraviť údaje
                                    </a>
                                </div>
                            @endif
                        </div>
                    @elseif(isset($office_id) && (strcmp($user->status,'čakajúci') == 0))
                        <label>Realitná kancelária <strong>{{ $user->realEstateOffice->name }}</strong> obdržala Vašu žiadosť,
                            počkajte prosím na schválenie.</label>
                        <a role="button" class="btn btn-secondary btn-block" href="#">
                            Zrušiť žiadosť
                        </a>
                    @else
                        <div class="col-md-3 float-right pr-0">
                            <label>Nemáte priradenú realitnú kanceláriu.</label>
                            <a role="button" class="btn btn-primary btn-block" href="#">
                                Vytvoriť realitnú kanceláriu
                            </a>
                            <a role="button" class="btn btn-secondary btn-block" href=" {{ route('user.office.find') }}">
                                Pridať sa k existujúcej RK
                            </a>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>

@endsection