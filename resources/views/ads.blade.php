@extends('layouts.app')
@section('title', 'Domov')
@section('content')
    <div class="container-fluid pt-5">
        <div class="row">
            {{--@foreach($ads as $ad)--}}

            {{--@endforeach--}}
            <div class="card" style="width: 340px; height: 400px">
                <img class="card-img-top" src="{{URL::asset('/image/1.jpg')}}" alt="profile Pic" height="200" width="340" >
                <div class="card-body">
                    <h5 class="card-title" style="color: #53526B;">Na predaj 3 izb. byt v Nitre </h5>
                    <p class="card-text" style="color:#BCBCCB;"> Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim.</p>
                    <a>
                        <span data-feather="heart"></span>
                        &nbsp 89 900 EUR
                    </a>
                    <a href="#" class="btn btn-secondary float-lg-right" style="text-align: center; width: 80px; height: 34px">VIAC</a>
                </div>
            </div>
        </div>
    </div>
@endsection