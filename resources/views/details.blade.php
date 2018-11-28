@extends('layouts.app')
@section('title', 'Konkretny inzerat')
@section('content')
    <div class="container-fluid pt-5">
        <div class="row">
            <div class="col-md-7">
                <div class="row my-3">
                    <table class="table table-striped" style="width:90%; align-items: center;">
                        <tr>
                            <th>Názov</th>
                            <td>{{ $ad->description }}</td>
                        </tr>
                        <tr>
                            <th>Cena</th>
                            <td>{{ $ad->price  }}</td>
                        </tr>
                        <tr>
                            <th>Ulica</th>
                            <td>{{ $ad->address->address_name.' '.$ad->address->address_number }}</td>
                        </tr>
                        <tr>
                            <th>Obec</th>
                            <td>{{ $ad->address->zip.' '.$ad->address->city}}</td>
                        </tr>
                        @isset($ad->house)
                            <tr>
                                <th>Počet poschodí</th>
                                <td>{{ $ad->house->floor_count }}</td>
                            </tr>
                            <tr>
                                <th>Rozloha</th>
                                <td>{{ $ad->houseInfo->propertyDetails->area_square_meters }}</td>
                            </tr>
                            <tr>
                                <th>Typ</th>
                                <td>{{ $ad->houseInfo->propertyDetails->type }}</td>
                            </tr>
                            <tr>
                                <th>Okná</th>
                                <td>{{ $ad->houseInfo->propertyDetails->window_type }}</td>
                            </tr>
                            <tr>
                                <th>Orientácia</th>
                                <td>{{ $ad->houseInfo->propertyDetails->direction }}</td>
                            </tr>
                            <tr>
                                <th>Záhrada</th>
                                <td>{{ $ad->house->garden  }}</td>
                            </tr>
                            <tr>
                                <th>Terasa</th>
                                <td>{{ $ad->house->terrace  }}</td>
                            </tr>
                            <tr>
                                <th>Balkón</th>
                                <td>{{ $ad->houseInfo->propertyDetails->balcony }}</td>
                            </tr>
                            <tr>
                                <th>Pivnica</th>
                                <td>{{ $ad->houseInfo->propertyDetails->cellar }}</td>
                            </tr>
                            <tr>
                                <th>Garáž</th>
                                <td>{{ $ad->houseInfo->propertyDetails->garage }}</td>
                            </tr>
                            <tr>
                                <th>Zateplený objekt</th>
                                <td>{{ $ad->houseInfo->propertyDetails->insulated }}</td>
                            </tr>
                            <tr>
                                <th>Vykurovanie</th>
                                <td>{{ $ad->houseInfo->propertyDetails->heating }}</td>
                            </tr>
                            <tr>
                                <th>Internet</th>
                                <td>{{ $ad->houseInfo->propertyDetails->internet }}</td>
                            </tr>
                        @endisset

                        @isset($ad->apartment)
                            <tr>
                                <th>Počet izieb</th>
                                <td>{{ $ad->apartment->room_count }}</td>
                            </tr>
                            <tr>
                                <th>Poschodie</th>
                                <td>{{ $ad->apartment->floor }}</td>
                            </tr>
                            <tr>
                                <th>Rozloha</th>
                                <td>{{ $ad->apartmentInfo->propertyDetails->area_square_meters }}</td>
                            </tr>
                            <tr>
                                <th>Typ</th>
                                <td>{{ $ad->apartmentInfo->propertyDetails->type }}</td>
                            </tr>
                            <tr>
                                <th>Okná</th>
                                <td>{{ $ad->apartmentInfo->propertyDetails->window_type }}</td>
                            </tr>
                            <tr>
                                <th>Orientácia</th>
                                <td>{{ $ad->apartmentInfo->propertyDetails->direction }}</td>
                            </tr>
                            <tr>
                                <th>Balkón</th>
                                <td>{{ $ad->apartmentInfo->propertyDetails->balcony }}</td>
                            </tr>
                            <tr>
                                <th>Pivnica</th>
                                <td>{{ $ad->apartmentInfo->propertyDetails->cellar }}</td>
                            </tr>
                            <tr>
                                <th>Garáž</th>
                                <td>{{ $ad->apartmentInfo->propertyDetails->garage }}</td>
                            </tr>
                            <tr>
                                <th>Zateplený objekt</th>
                                <td>{{ $ad->apartmentInfo->propertyDetails->insulated }}</td>
                            </tr>
                            <tr>
                                <th>Vykurovanie</th>
                                <td>{{ $ad->apartmentInfo->propertyDetails->heating }}</td>
                            </tr>
                            <tr>
                                <th>Internet</th>
                                <td>{{ $ad->apartmentInfo->propertyDetails->internet }}</td>
                            </tr>
                        @endisset

                        @isset($ad->estate)
                            <tr>
                                <th>Typ pozemku</th>
                                <td>{{ $ad->estate->type }}</td>
                            </tr>
                            <tr>
                                <th>Rozloha (ár)</th>
                                <td>{{ $ad->estate->area_ares }}</td>
                            </tr>
                            <tr>
                                <th>Cena (€/ár)</th>
                                <td>{{ $ad->estate->price_per_ares }}</td>
                            </tr>
                        @endisset
                    </table>
                </div>
                <div class="row my-3">
                    <table class="table table-striped" style="width:90%; align-items: center;">
                        <tr>
                            <th>Autor</th>
                            <td>{{ $ad->userInfo->surname.' '.$ad->userInfo->lastname }}</td>
                        </tr>
                        <tr>
                            <th>Realitná kancelária</th>
                            <td>{{ $ad->userInfo->realEstateOffice->name }}</td>
                        </tr>
                        <tr>
                            <th>Telefónne číslo</th>
                            <td>{{ $ad->userInfo->realEstateOffice->phone }}</td>
                        </tr>
                        <tr>
                            <th>Webová stránka</th>
                            <td>{{ $ad->userInfo->realEstateOffice->web }}</td>
                        </tr>
                    </table>
                </div>
                <div class="row my-3">
                    <label class="table"><strong>Popis nehnuteľnosti:</strong> <br></label><br>
                    <textarea id="notes" readonly rows="10" cols="100"
                              style="max-width: 100%">{{ $ad->notes }}</textarea>
                </div>
            </div>
            <div class="col-md-5 border-dark border">
                galeria obrazkov
            </div>
        </div>
    </div>
@endsection
