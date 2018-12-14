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
            <form method="post" action="{{ route('user.ads.import') }}"
                  enctype="multipart/form-data">
                @csrf
                <label>Pridať xml súbor</label>
                <div class="row">
                    <div class="form-group col-md-4">
                        <input type="file" name="xml_file">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <button type="submit" class="btn btn-primary text-white">IMPORT</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection