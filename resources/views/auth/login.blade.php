@extends('auth.layouts.app')
@section('content')
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Open+Sans');
    </style>
    <div class="container-fluid" style="height: 100%; padding: 0; overflow-x:hidden; overflow-y:hidden;">
        <div class="row justify-content-center" style="height: 100%;">
            <div class="col-md-6 text-center"
                 style="background:url({{ URL::to('/') }}/image/logo.jpg);
                         background-size: cover;
                         background-position: center;
                         height: 100%; ">
                <a href="{{ route('home')}}" style="display: inline-block; width: 100%; height: 100%;"> </a>
            </div>
            <div class="col-md-6 text-center">
                <div class="row  justify-content-center">
                    <div class="col-md-2"></div>
                    <div class="col-md-8" >
                        <div class="" style="padding-top: 35%">
                        <div class="mb-3">
                            <h1 style="font-family: 'Open Sans', sans-serif; font-size: 35px; color: #43425D; letter-spacing: 5px;"><strong>{{ __('DO-BY-PO') }}</strong></h1>
                            <h2 style="font-family: 'Open Sans', sans-serif; font-size: 18px; color: #B3B4B9;">Vitajte späť! Prosím prihláste sa do svojho účtu.</h2>
                        </div>
                        <div class="">
                            <div class="card-body" style="padding-bottom:0 !important;">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input id="email" type="email"
                                               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                               name="email"
                                               placeholder="E-mail"
                                               value="{{ old('email') }}" required autofocus
                                               style="border: 0; outline: 0; background: transparent; border-bottom: 1.5px solid #E9E9F0;">

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <input id="password" type="password"
                                               class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                               name="password"
                                               placeholder="Heslo"
                                               style="border: 0; outline: 0; background: transparent; border-bottom: 1.5px solid #E9E9F0;"
                                               required>

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    <div class="row mt-4 mx-0">
                                        <div class="col-md-8 float-left" style="padding-left: 0;">
                                            <div class="form-check" style="padding-left: 0;">
                                                <input class="form-check-input" type="checkbox" name="remember"
                                                       id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                <label class="form-check-label" for="remember">
                                                    {{ __('Zapamätať prihlásenie (?)  ') }}
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 float-right" style="padding: 0;">
                                            <a class="btn btn-link" style=" padding: 0;" href="{{ route('password.request') }}">
                                                {{ __('Zabudli ste heslo?') }}
                                            </a>
                                        </div>
                                    </div>

                                    <div class="row mt-5 mx-0">
                                        <div class="col-md-6 float-left" style=" padding-left: 0; padding-right: 15px; ">
                                            <button type="submit" class="btn btn-secondary btn-block" style="background-color: #43425D; height: 40px">
                                                {{ __('Prihlásiť sa') }}
                                            </button>
                                        </div>
                                        <div class="col-md-6 float-right" style=" padding-left: 15px; padding-right: 0; ">
                                            <a role="button" class="btn btn-white border-dark btn-block" style=" height: 40px">Registrácia</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
        </div>
    </div>
@endsection



