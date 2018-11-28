@extends('layouts.app')
@section('title', 'Domov')
@section('content')
    @php $i = 0; $remains = count($ad); @endphp
    <div class="container-fluid pt-5">
        <div class="row">
            <div class="col-md-9 container-fluid"> <!-- zobrazenie inzeratov -->
                @while($remains > 0)
                    @if($i == 0)    <!--prvy inzerat sa vykresli s fancy logom-->
                    <div class="row ml-0 mb-3">
                        <div class="card mt-3 float-left" style="width: 30%; max-width: 340px; height: 400px">
                            <div class="col-md-12 p-0" style="display: flex; flex-direction: column;">
                                <div style="max-height: 55%">
                                    <img class="card-img-top" src="{{URL::asset('/image/1.jpg')}}"
                                         alt="fotka nehnutelnosti"
                                         style="background-size: cover">
                                </div>
                                <div style="max-height: 30%">
                                    <div class="card-body py-3">
                                        <h5 class="card-title" style="color: #53526B;">{{ $ad[$i]['description'] }}</h5>
                                        <p class="card-text" style="color:#BCBCCB; line-height: 1.2em; max-height: 3.6em; overflow:hidden; text-overflow:ellipsis;">{{ $ad[$i]['notes'] }}</p>
                                    </div>
                                </div>
                                <div style="max-height: 15%; margin-top: auto; margin-bottom: 1rem">
                                    <div class="card-body">
                                        <div id="container" class=" card-body col-md-12 p-0">
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
                                    <div class="col-md-12 p-0" style="display: flex; flex-direction: column;">
                                        <div style="max-height: 55%">
                                            <img class="card-img-top" src="{{URL::asset('/image/1.jpg')}}"
                                                 alt="fotka nehnutelnosti"
                                                 style="background-size: cover">
                                        </div>
                                        <div style="max-height: 30%">
                                            <div class="card-body">
                                                <h5 class="card-title"
                                                    style="color: #53526B;">{{ $ad[$i+$j]['description'] }}</h5>
                                                <p class="card-text" style="color:#BCBCCB; line-height: 1.2em; max-height: 3.6em; overflow:hidden; text-overflow:ellipsis;">
                                                    {{ $ad[$i+$j]['notes'] }}
                                                </p>
                                            </div>
                                        </div>
                                        <div style="max-height: 15%; margin-top: auto; margin-bottom: 1rem">
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
                                    <div class="col-md-12 p-0" style="display: flex; flex-direction: column;">
                                        <div style="max-height: 55%">
                                            <img class="card-img-top" src="{{URL::asset('/image/1.jpg')}}"
                                                 alt="fotka nehnutelnosti"
                                                 style="background-size: cover">
                                        </div>
                                        <div style="max-height: 30%">
                                            <div class="card-body">
                                                <h5 class="card-title"
                                                    style="color: #53526B;">{{ $ad[$i+$j]['description'] }}</h5>
                                                <p class="card-text" style="color:#BCBCCB; line-height: 1.2em; max-height: 3.6em; overflow:hidden; text-overflow:ellipsis;">
                                                    {{ $ad[$i+$j]['notes'] }}
                                                </p>
                                            </div>
                                        </div>
                                        <div style="max-height: 15%; margin-top: auto; margin-bottom: 1rem">
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
                                <div class="col-md-12 p-0" style="display: flex; flex-direction: column;">
                                    <div style="max-height: 55%">
                                        <img class="card-img-top" src="{{URL::asset('/image/1.jpg')}}"
                                             alt="fotka nehnutelnosti"
                                             style="background-size: cover">
                                    </div>
                                    <div style="max-height: 30%">
                                        <div class="card-body">
                                            <h5 class="card-title"
                                                style="color: #53526B;">{{ $ad[$i+$j]['description'] }}</h5>
                                            <p class="card-text" style="color:#BCBCCB; line-height: 1.2em; max-height: 3.6em; overflow:hidden; text-overflow:ellipsis;">
                                                {{ $ad[$i+$j]['notes'] }}
                                            </p>
                                        </div>
                                    </div>
                                    <div style="max-height: 15%; margin-top: auto; margin-bottom: 1rem">
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
            <div class="col-md-3 container-fluid"> <!-- filter -->
                @include('partials.filter')
            </div>
        </div>
    </div>
@endsection