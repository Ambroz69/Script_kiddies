@extends('layouts.app')
@section('title', 'Vyhladavanie inzeratov')
@section('content')
    @php $i = 0; $remains = count($ads_filtered); @endphp
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container-fluid pt-5">
        <div class="row">
            <div class="col-md-9" style="padding-right: 7.2rem"> <!-- zobrazenie inzeratov -->
                @if ($remains == 0)
                    <div class="row my-3">
                        <label>Kritériám nevyhovujú žiadne inzeráty.</label>
                    </div>
                @endif
                @while($remains > 0)
                    <div class="row my-3">
                        <div class="card mt-3 float-left">
                            <div class="row p-0">
                                <div class="col-md-6 pr-0">
                                    @if(strcmp($ads_filtered[$i]['image_name'],"default") == 0)
                                        <img src="{{ URL::asset('/image/logo.jpg') }}"
                                             alt=""
                                             style="width:100%; height: 100%; object-fit: cover">
                                    @else
                                        <img src="{{ URL::asset($path.$ads_filtered[$i]['image_name']) }}"
                                             alt=""
                                             style="width:100%; height: 100%; object-fit: cover">
                                    @endif
                                </div>
                                <div class="col-md-6 my-3 pl-0">
                                    <div style="height: 80%">
                                        <div class="card-body">
                                            <h5 class="card-title"
                                                style="color: #53526B; line-height: 1.2em; max-height: 2.4em; overflow:hidden; text-overflow:ellipsis;">{{ $ads_filtered[$i]['description'] }}</h5>
                                            <p class="card-text" style="color:#BCBCCB; line-height: 1.5em; max-height: 12em; overflow:hidden; text-overflow:ellipsis;">{{ $ads_filtered[$i]['notes'] }}</p>
                                        </div>
                                    </div>
                                    <div style="height: 20%;">
                                        <div class="card-body">
                                            <div id="container" class="col-md-12 p-0">
                                                <div style="float: left;">
                                                    @if( strcmp($ads_filtered[$i]['category'],'prenájom') == 0)
                                                        <a><strong>
                                                            <span data-feather="heart"></span>
                                                            &nbsp {{ $ads_filtered[$i]['price'] }} €/mesiac
                                                            </strong>
                                                        </a>
                                                    @else
                                                        <a><strong>
                                                            <span data-feather="heart"></span>
                                                            &nbsp {{ $ads_filtered[$i]['price'] }} €
                                                            </strong>
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