@extends('layouts.app')
@section('title', 'Vyhladavanie inzeratov')
@section('content')
    @php $i = 0; $remains = count($ads_filtered); @endphp
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
                                                style="color: #53526B;">{{ $ads_filtered[$i]['description'] }}</h5>
                                            <p class="card-text" style="color:#BCBCCB;">{{ $ads_filtered[$i]['notes'] }}</p>
                                        </div>
                                    </div>
                                    <div style="height: 20%;">
                                        <div class="card-body">
                                            <div id="container" class="col-md-12 p-0">
                                                <div style="float: left;">
                                                    @if( strcmp($ads_filtered[$i]['category'],'prenájom') == 0)
                                                        <a>
                                                            <span data-feather="heart"></span>
                                                            &nbsp {{ $ads_filtered[$i]['price'] }} €/mesiac
                                                        </a>
                                                    @else
                                                        <a>
                                                            <span data-feather="heart"></span>
                                                            &nbsp {{ $ads_filtered[$i]['price'] }} €
                                                        </a>
                                                    @endif
                                                </div>
                                                <div style="float: right;">
                                                    <a href="{{ route('show', $ads_filtered[$i]['id']) }}"
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
                @include('partials.filter_advanced')
            </div>
        </div>
    </div>
@endsection