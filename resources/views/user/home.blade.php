@extends('user.layouts.app')
@section('title', 'Admin')
@section('content')

    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12 py-5">
                <div class="row px-0 pb-5">
                    <div class=" col-md-10 float-left">
                        <h3 style="font-family: 'Open Sans', sans-serif; letter-spacing: 2px;"><strong>Milujem Bimbulku <3</strong></h3>
                    </div>
                    <div class="col-md-2 float-right pr-0">
                        <a role="button" class="btn btn-secondary btn-block" href="{{ route('home') }}">
                            Non-user
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection