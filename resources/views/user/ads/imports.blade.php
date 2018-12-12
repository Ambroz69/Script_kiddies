@extends('user.layouts.app')
@section('title', 'Importovanie inzeratov')
@section('content')
    <div class="container-fluid pt-5">
        @if (\Session::has('msg'))
            <div class="alert alert-success">
                <ul>
                    <li>{!! \Session::get('msg') !!}</li>
                </ul>
            </div>
        @endif
        <div class="row">
            <a class="btn btn-primary" href="{{ route('user.ads.import') }}">IMPORT</a>
        </div>
    </div>
@endsection