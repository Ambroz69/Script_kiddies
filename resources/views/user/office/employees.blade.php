@extends('user.layouts.app')
@section('title', 'My office')
@section('content')
    @php $i = 0; $remains = count($employees); @endphp
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 py-5">
                    @if((strcmp($user_status,'správca') == 0) || (strcmp($user_status,'prijatý') == 0))
                        <div class="row my-3">
                            <div class=" col-md-10 float-left">
                                <h3 style="font-family: 'Open Sans', sans-serif; letter-spacing: 2px;"><strong>ZOZNAM ZAMESTNANCOV</strong></h3>
                            </div>
                        </div>
                        <div class="row my-3">
                            <label>SPRÁVCA</label>
                            <div class="row my-3">
                                <div class="card mx-4" style="width: 21.5%;">
                                    @if((strcmp(substr($office_admin['lastname'],-3),"vá") == 0)
                                    ||  (strcmp(substr($office_admin['lastname'],-3),"ká") == 0))
                                        <img src="{{URL::asset('/image/dievcatko.jpg')}}"
                                             alt="dievcatko"
                                             style="width: 100%; object-fit: cover">
                                    @else
                                        <img src="{{URL::asset('/image/chlapcek.jpg')}}"
                                             alt="chlapcek"
                                             style="width: 100%; object-fit: cover">
                                    @endif
                                    <div class="container pt-3 px-3">
                                        <h4><b>{{ $office_admin['surname'].' '.$office_admin['lastname'] }}</b></h4>
                                        <p><strong>Kontakt:</strong> {{ $office_admin['email'] }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row my-3">
                            <label>ZAMESTNANCI</label>
                            @while($remains > 0)
                                @if(($i % 4) == 0)
                                    <div class="row my-3">
                                        @endif
                                        <div class="card mx-4" style="width: 21.5%;">
                                            @if((strcmp(substr($employees[$i]['lastname'],-3),"vá") == 0)
                                            ||  (strcmp(substr($employees[$i]['lastname'],-3),"ká") == 0))
                                                <img src="{{URL::asset('/image/dievcatko.jpg')}}"
                                                     alt="dievcatko"
                                                     style="width: 100%; object-fit: cover">
                                            @else
                                                <img src="{{URL::asset('/image/chlapcek.jpg')}}"
                                                     alt="chlapcek"
                                                     style="width: 100%; object-fit: cover">
                                            @endif
                                            <div class="container pt-3 px-3">
                                                <h4><b>{{ $employees[$i]['surname'].' '.$employees[$i]['lastname'] }}</b></h4>
                                                <p><strong>Kontakt:</strong> {{ $employees[$i]['email'] }}</p>
                                                @if(strcmp($user_status,'správca') == 0)
                                                    <a class="btn btn-block btn-danger"
                                                       href=" {{ route('user.office.employees.remove', $employees[$i]['id']) }}">Vymazať zamestnanca</a>
                                                @endif
                                            </div>
                                        </div>
                                        @if(($i % 4) == 3)
                                    </div>
                                @endif
                                @php $i++; $remains--; @endphp
                            @endwhile
                        </div>
                    @else
                        <div>
                            <label>Nieste členom RK. Pre vytvorenie RK alebo prehľadávanie existujúcich RK kliknite
                                <a href="{{ route('user.office') }}"><strong>TU</strong></a></label>
                        </div>
                    @endif
            </div>
        </div>
    </div>
@endsection