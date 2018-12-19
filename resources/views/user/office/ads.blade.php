@extends('user.layouts.app')
@section('title', 'Inzeraty RK')
@section('content')
    @php $i = 0; $remains = count($ads); @endphp
    <div class="container-fluid pt-5">
        <div class="row">
            <div class="col-md-12"> <!-- zobrazenie inzeratov -->
                @if ($remains == 0)
                    <div class="row my-3">
                        <label>RK nemá žiadne inzeráty.</label>
                    </div>
                @endif
                @while($remains > 0)
                    <div class="row my-3">
                        <label for="ad"> Autor: <strong>@php echo $ads[$i]['user']['surname'].' '.$ads[$i]['user']['lastname']; @endphp</strong></label>
                        <div class="card float-left mb-3">
                            <div class="row p-0">
                                <div class="col-md-6 pr-0">
                                    @if(strcmp($ads[$i]['image_name'],"default") == 0)
                                        <img src="{{ URL::asset('/image/logo.jpg') }}"
                                             alt=""
                                             style="width:100%; height: 100%; object-fit: cover">
                                    @else
                                        <img src="{{ URL::asset($path.$ads[$i]['image_name']) }}"
                                             alt=""
                                             style="width:100%; height: 100%; object-fit: cover">
                                    @endif
                                </div>
                                <div class="col-md-6 my-3 pl-0">
                                    <div style="height: 15%">
                                        <div class="col-md-12">
                                            @if(($user->id == $ads[$i]['user_id']) || (strcmp($user->status,'správca') == 0))
                                                <div style="float: right">
                                                    <form action="{{ route('user.ads.delete', $ads[$i]['id']) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger" type="submit"><span data-feather="trash-2"></span>
                                                        </button>
                                                    </form>
                                                </div>
                                                <div style="float: right; margin-right: 0.5em">
                                                    <a href=" {{ route('user.ads.edit', $ads[$i]['id']) }}" class="btn btn-info float-right">
                                                        <span data-feather="edit"></span>
                                                    </a>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div style="height: 65%">
                                        <div class="card-body">
                                            <h5 class="card-title" style="color: #53526B; font-size: 1.5em;
                                            line-height: 1.2em; max-height: 2.4em; overflow:hidden; text-overflow:ellipsis;">{{ $ads[$i]['description'] }}</h5>
                                            <p class="card-text" style="color:#BCBCCB; font-size: 1.1em;
                                            line-height: 1.5em; max-height: 12em; overflow:hidden; text-overflow:ellipsis;">{{ $ads[$i]['notes'] }}</p>
                                        </div>
                                    </div>
                                    <div style="height: 20%;">
                                        <div class="card-body">
                                            <div id="container" class="col-md-12 p-0">
                                                <div style="float: left;">
                                                    @if( strcmp($ads[$i]['category'],'prenájom') == 0)
                                                        <a  style="font-size: 1.3em">
                                                            <span data-feather="heart"></span>
                                                            &nbsp {{ $ads[$i]['price'] }} €/mesiac
                                                        </a>
                                                    @else
                                                        <a style="font-size: 1.3em">
                                                            <span data-feather="heart"></span>
                                                            &nbsp {{ $ads[$i]['price'] }} €
                                                        </a>
                                                    @endif
                                                </div>
                                                <div style="float: right;">
                                                    <a href="{{ route('user.ads.show', $ads[$i]['id']) }}"
                                                       class="btn btn-secondary float-right"
                                                       style="text-align: center; width: 80px; height: 30px">Náhľad</a>
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
        </div>
    </div>
@endsection