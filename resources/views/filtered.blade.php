@extends('layouts.app')
@section('title', 'Vyhladavanie inzeratov')
@section('content')
    @php $i = 0; $remains = count($ad); @endphp
    <div class="container-fluid pt-5">
        <div class="row">
            <div class="col-md-9"> <!-- zobrazenie inzeratov -->
                @while($remains > 0)
                    <div class="row my-3">
                        <div class="card mt-3 float-left">
                            <div class="row p-0">
                                <div class="col-md-6">
                                    <img class="card-img-top" src="{{URL::asset('/image/1.jpg')}}"
                                         alt="fotka nehnutelnosti"
                                         style="background-size: cover; max-height: 300px">
                                </div>
                                <div class="col-md-6 my-3">
                                    <div style="height: 80%">
                                        <div class="card-body">
                                            <h5 class="card-title"
                                                style="color: #53526B;">{{ $ad[$i]['description'] }}</h5>
                                            <p class="card-text" style="color:#BCBCCB;">{{ $ad[$i]['notes'] }}</p>
                                        </div>
                                    </div>
                                    <div style="height: 20%;">
                                        <div class="card-body">
                                            <div id="container" class="col-md-12 p-0">
                                                <div style="float: left;">
                                                    <a>
                                                        <span data-feather="heart"></span>
                                                        &nbsp {{ $ad[$i]['price'] }} EUR
                                                    </a>
                                                </div>
                                                <div style="float: right;">
                                                    <a href="{{ route('show', $ad[$i]['id']) }}"
                                                       class="btn btn-secondary float-right"
                                                       style="text-align: center; width: 80px; height: 30px">Viac</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @php $i++; $remains--; @endphp
                @endwhile
            </div>
            <div class="col-md-3"> <!-- filter -->
                <form method="post" action="{{ route('filter') }}">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="description">Názov:</label>
                            <input id="description" type="text" class="form-control" name="description">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="price">Cena:</label>
                            <input id="price" type="text" class="form-control" name="price">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="notes">Popis:</label>
                            <textarea rows="5" class="form-control" name="notes" id="notes"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-primary text-white float-right">Filtrovať</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection