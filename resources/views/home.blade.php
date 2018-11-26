@extends('layouts.app')
@section('title', 'Domov')
@section('content')
    <div class="container-fluid pt-5">
        @foreach($ads as $ad)

            {{--@if(prvy inzerat)--}}
            {{--<div class="card my-3" style="width: 340px; height: 400px">--}}
            {{--<img class="card-img-top" src="{{URL::asset('/image/1.jpg')}}" alt="profile Pic" height="200" width="340" >--}}
            {{--<div class="card-body">--}}
            {{--<h5 class="card-title" style="color: #53526B;">{{ $ad->description }}</h5>--}}
            {{--<p class="card-text" style="color:#BCBCCB;">{{ $ad->notes }}</p>--}}
            {{--<a>--}}
            {{--<span data-feather="heart"></span>--}}
            {{--&nbsp {{ $ad->price }} EUR--}}
            {{--</a>--}}
            {{--<a href="{{ route('anonym.show', $ad->id) }}" class="btn btn-secondary float-lg-right" style="text-align: center; width: 80px; height: 34px">VIAC</a>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--@endif--}}
            <div class="card my-3" style="width: 340px; height: 400px">
                <img class="card-img-top" src="{{URL::asset('/image/1.jpg')}}" alt="profile Pic" height="200"
                     width="340">
                <div class="card-body">
                    <h5 class="card-title" style="color: #53526B;">{{ $ad->description }}</h5>
                    <p class="card-text" style="color:#BCBCCB;">{{ $ad->notes }}</p>
                    <div class="row">
                        <a>
                            <span data-feather="heart"></span>
                            &nbsp {{ $ad->price }} EUR
                        </a>
                        <a href="#" class="btn btn-secondary float-lg-right"
                           style="text-align: center; width: 80px; height: 34px">VIAC</a>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
@endsection