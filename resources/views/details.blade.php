@extends('layouts.app_filter')
@section('title', 'Konkretny inzerat')
@section('content')
    <div class="container-fluid pt-5">
        <div class="row">
            <div class="col-md-7">
                <div class="row m-0">
                    <table class="table table-striped" style="width:90%; align-items: center;">
                        <tr>
                            <th style="background-color: #3B3B53 !important; height: 3rem;"></th>
                            <td style="background-color: #3B3B53 !important"></td>
                        </tr>
                        <tr>
                            <th>Názov</th>
                            <td>{{ $ad->description }}</td>
                        </tr>
                        <tr>
                            <th>Cena</th>
                            @if( strcmp($ad->category,'prenájom') == 0)
                                <td>{{ $ad->price  }} € mesačne</td>
                            @else
                                <td>{{ $ad->price  }} €</td>
                            @endif
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
                                <td>{{ $ad->house->propertyDetails->area_square_meters }} m<sup>2</sup></td>
                            </tr>
                            <tr>
                                <th>Typ</th>
                                <td>{{ $ad->house->propertyDetails->type }}</td>
                            </tr>
                            <tr>
                                <th>Okná</th>
                                <td>{{ $ad->house->propertyDetails->window_type }}</td>
                            </tr>
                            <tr>
                                <th>Orientácia</th>
                                <td>{{ $ad->house->propertyDetails->direction }}</td>
                            </tr>
                            <tr>
                                <th>Záhrada</th>
                                <td>
                                    @if(strcmp($ad->house->garden,'0') == 0)
                                        <span data-feather="x"></span>
                                    @else
                                        {{ $ad->house->garden  }} m<sup>2</sup>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Terasa</th>
                                <td>
                                    @if($ad->house->terrace == 1)
                                        <span data-feather="check"></span>
                                    @else
                                        <span data-feather="x"></span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Balkón</th>
                                <td>
                                    @if($ad->house->propertyDetails->balcony == 1)
                                        <span data-feather="check"></span>
                                    @else
                                        <span data-feather="x"></span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Pivnica</th>
                                <td>
                                    @if($ad->house->propertyDetails->cellar == 1)
                                        <span data-feather="check"></span>
                                    @else
                                        <span data-feather="x"></span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Garáž</th>
                                <td>
                                    @if($ad->house->propertyDetails->garage == 1)
                                        <span data-feather="check"></span>
                                    @else
                                        <span data-feather="x"></span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Zateplený objekt</th>
                                <td>
                                    @if($ad->house->propertyDetails->insulated == 1)
                                        <span data-feather="check"></span>
                                    @else
                                        <span data-feather="x"></span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Vykurovanie</th>
                                <td>{{ $ad->house->propertyDetails->heating }}</td>
                            </tr>
                            <tr>
                                <th>Internet</th>
                                <td>{{ $ad->house->propertyDetails->internet }}</td>
                            </tr>
                        @endisset

                        @isset($ad->apartment)
                            <tr>
                                <th>Počet izieb</th>
                                <td>{{ $ad->apartment->room_count }}</td>
                            </tr>
                            <tr>
                                <th>Poschodie</th>
                                @if ($ad->apartment->floor == 0)
                                    <td> prízemie</td>
                                @else
                                    <td>{{ $ad->apartment->floor }}</td>
                                @endif
                            </tr>
                            <tr>
                                <th>Rozloha</th>
                                <td>{{ $ad->apartment->propertyDetails->area_square_meters }} m<sup>2</sup></td>
                            </tr>
                            <tr>
                                <th>Typ</th>
                                <td>{{ $ad->apartment->propertyDetails->type }}</td>
                            </tr>
                            <tr>
                                <th>Okná</th>
                                <td>{{ $ad->apartment->propertyDetails->window_type }}</td>
                            </tr>
                            <tr>
                                <th>Orientácia</th>
                                <td>{{ $ad->apartment->propertyDetails->direction }}</td>
                            </tr>
                            <tr>
                                <th>Balkón</th>
                                <td>
                                    @if($ad->apartment->propertyDetails->balcony == 1)
                                        <span data-feather="check"></span>
                                    @else
                                        <span data-feather="x"></span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Pivnica</th>
                                <td>@if($ad->apartment->propertyDetails->cellar == 1)
                                        <span data-feather="check"></span>
                                    @else
                                        <span data-feather="x"></span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Garáž</th>
                                <td>@if($ad->apartment->propertyDetails->garage == 1)
                                        <span data-feather="check"></span>
                                    @else
                                        <span data-feather="x"></span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Zateplený objekt</th>
                                <td>@if($ad->apartment->propertyDetails->insulated == 1)
                                        <span data-feather="check"></span>
                                    @else
                                        <span data-feather="x"></span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Vykurovanie</th>
                                <td>{{ $ad->apartment->propertyDetails->heating }}</td>
                            </tr>
                            <tr>
                                <th>Internet</th>
                                <td>{{ $ad->apartment->propertyDetails->internet }}</td>
                            </tr>
                        @endisset

                        @isset($ad->estate)
                            <tr>
                                <th>Typ pozemku</th>
                                <td>{{ $ad->estate->type }}</td>
                            </tr>
                            <tr>
                                <th>Rozloha</th>
                                <td>{{ $ad->estate->area_ares }} m<sup>2</sup></td>
                            </tr>
                            <tr>
                                <th>Cena (€/m<sup>2</sup>)</th>
                                <td>{{ $ad->estate->price_per_ares }} €/m<sup>2</sup></td>
                            </tr>
                        @endisset
                    </table>
                </div>
                <div class="row my-3 mx-0">
                    <h4 class="table"><strong>POPIS NEHNUTEĽNOSTI:</strong> <br></h4><br>
                    <textarea id="notes" readonly rows="10" cols="150"
                              style="max-width: 90%">{{ $ad->notes }}</textarea>
                </div>
                <div class="row my-3 mx-0">
                    <table class="table table-striped" style="width:90%; align-items: center;">
                        <tr>
                            <th style="width: 24.7%;">Autor</th>
                            <td>{{ $ad->user->surname.' '.$ad->user->lastname }}</td>
                        </tr>
                        <tr>
                            <th>Realitná kancelária</th>
                            <td> @isset($ad->user->realEstateOffice){{ $ad->user->realEstateOffice->name }} @endisset</td>
                        </tr>
                        <tr>
                            <th>Telefónne číslo</th>
                            <td>@isset($ad->user->realEstateOffice){{ $ad->user->realEstateOffice->phone }} @endisset</td>
                        </tr>
                        <tr>
                            <th>Webová stránka</th>
                            <td>@isset($ad->user->realEstateOffice) <a href="http://{{ $ad->user->realEstateOffice->web }}">
                                    {{ $ad->user->realEstateOffice->web }}
                                </a> @endisset
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-md-5">
                <div class="row">
                    @foreach ($images as $image)
                        <div class="col-md-12 px-0 pb-3">
                            <img src="{{ URL::asset($path.$image->name) }}" alt="{{ URL::asset($path.$image->name) }}"
                                    @php $image->image_string @endphp style="width: 100%; max-height: 600px">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
