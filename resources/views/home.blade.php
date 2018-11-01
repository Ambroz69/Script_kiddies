@extends('layouts.app')
@section('content')
    <div class=”container”>
        @if(\Session::has('error'))
            <div class="alert alert-danger">
                {{\Session::get('error')}}
            </div>
        @endif
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    @auth
                        @if(auth()->user()->isAdmin)
                            <div class="panel-body">
                                <a href="{{ route('admin.home') }}">Admin</a>
                            </div>
                        @else
                            <div class="panel-heading">Normal User</div>
                        @endif
                    @endauth


                </div>
            </div>
        </div>

@endsection