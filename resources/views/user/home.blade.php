@extends('user.layouts.app')
@section('title', 'Admin')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 py-5">
                <div class="row px-0 pb-5">
                    <div class=" col-md-10 float-left">
                        <h4 style="font-family: 'Open Sans', sans-serif; letter-spacing: 1px;"><strong>Spravovanie inzerátov a realitných kancelárií</strong></h4>
                    </div>
                    <div class="col-md-2 float-right pr-0">
                        <a role="button" class="btn btn-secondary btn-block" href="{{ route('home') }}">
                            Prehľadávanie inzerátov
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3 pr-0" id="chart-div-pie" style="width: 400px; height: 400px;"></div>
                    {!! $lava->render('PieChart', 'piechart', 'chart-div-pie') !!}
                    <div class="col-md-6 mb-3 pr-0" id="chart-div-bar" style="width: 400px; height: 400px;"></div>
                    {!! $lava->render('BarChart', 'barchart', 'chart-div-bar') !!}
                </div>
            </div>
        </div>
    </div>
@endsection