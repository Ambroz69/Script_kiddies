@extends('admin.layouts.app')
@section('title', 'Admin')
@section('content')
    @php $i = 0; $remains = count($admins); @endphp
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12 py-5">
                <div class="row px-0 pb-5">
                    <div class=" col-md-10 float-left">
                        <h3 style="font-family: 'Open Sans', sans-serif; letter-spacing: 2px;"><strong>ZOZNAM
                                ADMINISTRÁTOROV</strong></h3>
                    </div>
                    <div class="col-md-2 float-right pr-0">
                        <a role="button" class="btn btn-secondary btn-block" href="{{ route('home') }}">
                            Non-admin
                        </a>
                    </div>
                </div>
                @while($remains > 0)
                    @if(($i % 4) == 0)
                        <div class="row my-5">
                            @endif
                            <div class="card mx-4" style="width: 21.5%;">
                                <a href="{{ route('admin.users.edit', $admins[$i]['id']) }}">
                                    {{--                                @php echo 'last name: '.substr($admins[$i]['lastname'],-2) @endphp--}}
                                    @if((strcmp(substr($admins[$i]['lastname'],-3),"vá") == 0) || (strcmp(substr($admins[$i]['lastname'],-3),"ká") == 0))
                                        <img src="{{URL::asset('/image/dievcatko.jpg')}}"
                                             alt="dievcatko"
                                             style="width: 100%; object-fit: cover">
                                    @else
                                        <img src="{{URL::asset('/image/chlapcek.jpg')}}"
                                             alt="chlapcek"
                                             style="width: 100%; object-fit: cover">
                                    @endif
                                </a>
                                <div class="container pt-3 px-3">
                                    <h4><b>{{ $admins[$i]['surname'].' '.$admins[$i]['lastname'] }}</b></h4>
                                    <p><strong>Kontakt:</strong> {{ $admins[$i]['email'] }}</p>
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