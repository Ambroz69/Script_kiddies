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
                            @for($j = 0; $j < 1; $j++)
                                @include('partials.home_ad_card')
                            @endfor
                            <div class="card float-right mt-3" style="width: 65%; max-width: 652px; height: 400px;
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
                                        @include('partials.home_ad_card')
                                    @endfor
                                    @php $i = $i + 3; $remains = $remains - 3; @endphp
                                </div>
                            @break

                            @case(2)    <!--pri dvoch inzeratoch-->
                                <div class="row ml-0 mb-3">
                                    @for($j = 0; $j < 2; $j++)
                                        @include('partials.home_ad_card')
                                    @endfor
                                    @php $i = $i + 2; $remains = $remains - 2; @endphp
                                </div>
                            @break

                            @case(1)    <!--ostava posledny-->
                                <div class="row ml-0 mb-3">
                                    @for($j = 0; $j < 1; $j++)
                                        @include('partials.home_ad_card')
                                    @endfor
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