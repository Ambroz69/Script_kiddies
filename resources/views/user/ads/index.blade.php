@extends('user.layouts.app')
@section('title', 'Moje inzeraty')
@section('content')
    @php $i = 0; $remains = count($ads); @endphp
    <div class="container-fluid pt-5">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('user.ads.create') }}" class="btn btn-primary float-right">+ Pridať inzerát +</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12"> <!-- zobrazenie inzeratov -->
                @if ($remains == 0)
                    <div class="row my-3">
                        <label>Nemáte žiadne inzeráty.</label>
                    </div>
                @endif
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
                                    <div style="height: 15%">
                                        <div class="col-md-12">
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
                                        </div>
                                    </div>
                                    <div style="height: 65%">
                                        <div class="card-body">
                                            <h5 class="card-title"
                                                style="color: #53526B;">{{ $ads[$i]['description'] }}</h5>
                                            <p class="card-text" style="color:#BCBCCB;">{{ $ads[$i]['notes'] }}</p>
                                        </div>
                                    </div>
                                    <div style="height: 20%;">
                                        <div class="card-body">
                                            <div id="container" class="col-md-12 p-0">
                                                <div style="float: left;">
                                                    @if( strcmp($ads[$i]['category'],'prenájom') == 0)
                                                        <a>
                                                            <span data-feather="heart"></span>
                                                            &nbsp {{ $ads[$i]['price'] }} €/mesiac
                                                        </a>
                                                    @else
                                                        <a>
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