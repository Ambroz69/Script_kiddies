@extends('user.layouts.app')
@section('title', 'My office')
@section('content')
    @php $i = 0; $remains = count($pending_users); @endphp
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 py-5">
                <div class="row px-0 pb-5 mx-0">
                    <div class="col-md-10 p-0">
                        <h3 style="font-family: 'Open Sans', sans-serif; letter-spacing: 2px;"><strong>ZOZNAM
                                ŽIADOSTÍ</strong></h3>
                    </div>
                </div>
                @if($remains == 0)
                    <label>PLACEHOLDER Žiadne nové žiadosti.</label>
                @endif
                @while($remains > 0)
                    @if(($i % 4) == 0)
                        <div class="row mx-0">
                            @endif
                            <div class="card mr-4" style="width: 21.5%;">
                                @if((strcmp(substr($pending_users[$i]['lastname'],-3),"vá") == 0)
                                ||  (strcmp(substr($pending_users[$i]['lastname'],-3),"ká") == 0))
                                    <img src="{{URL::asset('/image/dievcatko.jpg')}}"
                                         alt="dievcatko"
                                         style="width: 100%; object-fit: cover">
                                @else
                                    <img src="{{URL::asset('/image/chlapcek.jpg')}}"
                                         alt="chlapcek"
                                         style="width: 100%; object-fit: cover">
                                @endif
                                <div class="container pt-3 px-3">
                                    <h4><b>{{ $pending_users[$i]['surname'].' '.$pending_users[$i]['lastname'] }}</b>
                                    </h4>
                                    <p><strong>Kontakt:</strong> {{ $pending_users[$i]['email'] }}</p>
                                    <a class="btn btn-block btn-primary"
                                       href=" {{ route('user.office.requests.accept', $pending_users[$i]['id']) }}">Prijať</a>
                                    <a class="btn btn-block btn-secondary mb-3"
                                       href=" {{ route('user.office.requests.reject', $pending_users[$i]['id']) }}">Zamietnuť</a>
                                </div>
                            </div>
                            @if(($i % 4) == 3)
                        </div>
                    @endif
                    @php $i++; $remains--; @endphp
                @endwhile
            </div>
        </div>
    </div>
@endsection
