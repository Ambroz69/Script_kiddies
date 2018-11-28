@extends('layouts.app')
@section('title', 'Domov')
@section('content')
    @php $i = 0; $remains = count($ad); @endphp
    <div class="container-fluid pt-5">
        <div class="row">
            <div class="col-md-9"> <!-- zobrazenie inzeratov -->
                @while($remains > 0)
                    @if($i == 0)    <!--prvy inzerat sa vykresli s fancy logom-->
                    <div class="row ml-0 mb-3">
                        <div class="card mt-3 float-left" style="width: 30%; max-width: 340px; height: 400px">
                            <div class="col-md-12 p-0">
                                <div style="height: 55%">
                                    <img class="card-img-top" src="{{URL::asset('/image/1.jpg')}}"
                                         alt="fotka nehnutelnosti"
                                         style="background-size: cover">
                                </div>
                                <div style="height: 30%">
                                    <div class="card-body">
                                        <h5 class="card-title" style="color: #53526B;">{{ $ad[$i]['description'] }}</h5>
                                        <p class="card-text" style="color:#BCBCCB;">{{ $ad[$i]['notes'] }}</p>
                                    </div>
                                </div>
                                <div style="height: 15%">
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
                        <div class="card float-right mx-3 mt-3" style="width: 65%; max-width: 652px; height: 400px;
                                background-image: url('{{URL::asset('/image/rosa_pig.jpg')}}');
                                background-size: cover;
                                background-repeat: no-repeat;
                                background-position: 50% 50%;">
                        </div>
                    </div>
                    @php $i++; $remains--; @endphp
                    @else   <!--vsetky okrem prveho inzeratu-->
                    @switch($remains)
                        @case($remains >= 3)    <!--ak ostavaju este viac ako 2 inzeraty, vygeneruje sa cely riadok-->
                        <div class="row ml-0 mb-3">
                            @for($j = 0; $j < 3; $j++)
                                <div class="card mr-3" style="width: 30%; max-width: 340px; height: 400px">
                                    <div class="col-md-12 p-0">
                                        <div style="height: 55%">
                                            <img class="card-img-top" src="{{URL::asset('/image/1.jpg')}}"
                                                 alt="fotka nehnutelnosti"
                                                 style="background-size: cover">
                                        </div>
                                        <div style="height: 30%">
                                            <div class="card-body">
                                                <h5 class="card-title"
                                                    style="color: #53526B;">{{ $ad[$i+$j]['description'] }}</h5>
                                                <p class="card-text"
                                                   style="color:#BCBCCB;">{{ $ad[$i+$j]['notes'] }}</p>
                                            </div>
                                        </div>
                                        <div style="height: 15%">
                                            <div class="card-body">
                                                <div id="container" class="col-md-12 p-0">
                                                    <div style="float: left;">
                                                        <a>
                                                            <span data-feather="heart"></span>
                                                            &nbsp {{ $ad[$i+$j]['price'] }} EUR
                                                        </a>
                                                    </div>
                                                    <div style="float: right;">
                                                        <a href="{{ route('show', $ad[$i+$j]['id']) }}"
                                                           class="btn btn-secondary float-right"
                                                           style="text-align: center; width: 80px; height: 30px">Viac</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                            @php $i = $i + 3; $remains = $remains - 3; @endphp
                        </div>
                        @break

                        @case(2)    <!--pri dvoch inzeratoch-->
                        <div class="row ml-0 mb-3">
                            @for($j = 0; $j < 2; $j++)
                                <div class="card mr-3" style="width: 30%; max-width: 340px; height: 400px">
                                    <div class="col-md-12 p-0">
                                        <div style="height: 55%">
                                            <img class="card-img-top" src="{{URL::asset('/image/1.jpg')}}"
                                                 alt="fotka nehnutelnosti"
                                                 style="background-size: cover">
                                        </div>
                                        <div style="height: 30%">
                                            <div class="card-body">
                                                <h5 class="card-title"
                                                    style="color: #53526B;">{{ $ad[$i+$j]['description'] }}</h5>
                                                <p class="card-text"
                                                   style="color:#BCBCCB;">{{ $ad[$i+$j]['notes'] }}</p>
                                            </div>
                                        </div>
                                        <div style="height: 15%">
                                            <div class="card-body">
                                                <div id="container" class="col-md-12 p-0">
                                                    <div style="float: left;">
                                                        <a>
                                                            <span data-feather="heart"></span>
                                                            &nbsp {{ $ad[$i+$j]['price'] }} EUR
                                                        </a>
                                                    </div>
                                                    <div style="float: right;">
                                                        <a href="{{ route('show', $ad[$i+$j]['id']) }}"
                                                           class="btn btn-secondary float-right"
                                                           style="text-align: center; width: 80px; height: 30px">Viac</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                            @php $i = $i + 2; $remains = $remains - 2; @endphp
                        </div>
                        @break

                        @case(1)    <!--ostava posledny-->
                        <div class="row ml-0 mb-3">
                            <div class="card mr-3" style="width: 30%; max-width: 340px; height: 400px">
                                <div class="col-md-12 p-0">
                                    <div style="height: 55%">
                                        <img class="card-img-top" src="{{URL::asset('/image/1.jpg')}}"
                                             alt="fotka nehnutelnosti"
                                             style="background-size: cover">
                                    </div>
                                    <div style="height: 30%">
                                        <div class="card-body">
                                            <h5 class="card-title"
                                                style="color: #53526B;">{{ $ad[$i+$j]['description'] }}</h5>
                                            <p class="card-text" style="color:#BCBCCB;">{{ $ad[$i+$j]['notes'] }}</p>
                                        </div>
                                    </div>
                                    <div style="height: 15%">
                                        <div class="card-body">
                                            <div id="container" class="col-md-12 p-0">
                                                <div style="float: left;">
                                                    <a>
                                                        <span data-feather="heart"></span>
                                                        &nbsp {{ $ad[$i+$j]['price'] }} EUR
                                                    </a>
                                                </div>
                                                <div style="float: right;">
                                                    <a href="{{ route('show', $ad[$i+$j]['id']) }}"
                                                       class="btn btn-secondary float-right"
                                                       style="text-align: center; width: 80px; height: 30px">Viac</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @php $i++; $remains--; @endphp
                        </div>
                        @break

                        @default
                        @break

                    @endswitch
                    @endif
                @endwhile
            </div>
            <div class="col-md-3"> <!-- filter -->
                <form method="post" action="{{ route('filter') }}">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="description">Názov:</label>
                            <input id="description"type="text" class="form-control" name="description">
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