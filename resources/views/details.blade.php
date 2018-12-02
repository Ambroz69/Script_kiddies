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
                                <td>{{ $ad->house->propertyDetails->area_square_meters }}</td>
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
                                <td>{{ $ad->house->garden  }}</td>
                            </tr>
                            <tr>
                                <th>Terasa</th>
                                <td>{{ $ad->house->terrace  }}</td>
                            </tr>
                            <tr>
                                <th>Balkón</th>
                                <td>{{ $ad->house->propertyDetails->balcony }}</td>
                            </tr>
                            <tr>
                                <th>Pivnica</th>
                                <td>{{ $ad->house->propertyDetails->cellar }}</td>
                            </tr>
                            <tr>
                                <th>Garáž</th>
                                <td>{{ $ad->house->propertyDetails->garage }}</td>
                            </tr>
                            <tr>
                                <th>Zateplený objekt</th>
                                <td>{{ $ad->house->propertyDetails->insulated }}</td>
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
                                <td>{{ $ad->apartment->floor }}</td>
                            </tr>
                            <tr>
                                <th>Rozloha</th>
                                <td>{{ $ad->apartment->propertyDetails->area_square_meters }}</td>
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
                                <td>{{ $ad->apartment->propertyDetails->balcony }}</td>
                            </tr>
                            <tr>
                                <th>Pivnica</th>
                                <td>{{ $ad->apartment->propertyDetails->cellar }}</td>
                            </tr>
                            <tr>
                                <th>Garáž</th>
                                <td>{{ $ad->apartment->propertyDetails->garage }}</td>
                            </tr>
                            <tr>
                                <th>Zateplený objekt</th>
                                <td>{{ $ad->apartment->propertyDetails->insulated }}</td>
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
                            <td>@isset($ad->user->realEstateOffice){{ $ad->user->realEstateOffice->web }} @endisset</td>
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
                <form method="post" action="{{ route('store_image', $ad->id) }}" enctype="multipart/form-data">
                    @csrf
                    <label>Pridať obrázok</label>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <input type="file" name="imagename">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4" >
                            <button type="submit" class="btn btn-primary text-white">Pridať</button>
                        </div>
                    </div>
                </form>
                <div class="row">
                    @foreach ($images as $image)
                        <div class="col-md-12">
                            <img src="{{ URL::asset($path.$image->name) }}" alt="{{ URL::asset($path.$image->name) }}"
                                    @php $image->image_string @endphp>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
