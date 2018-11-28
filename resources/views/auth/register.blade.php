@extends('auth.layouts.app')
@section('content')
    <div class="" style="padding-top: 25%">
        <div class="mb-3">
            <h1 style="font-family: 'Open Sans', sans-serif; font-size: 35px; color: #43425D; letter-spacing: 5px;">
                <strong>{{ __('DO-BY-PO') }}</strong></h1>
            <h2 style="font-family: 'Open Sans', sans-serif; font-size: 18px; color: #B3B4B9;">
                Prosím pokračujte pre vytvorenie účtu.</h2>
        </div>

        <div class="">
            <div class="card-body" style="padding-bottom:0 !important;">
                <form method="POST" action="{{ route('register') }}">
                    <div class="row mx-0">
                        <div class="col-md-6 float-left" style=" padding-left: 0; padding-right: 15px; ">
                            @csrf
                            <div class="form-group">
                                <input id="surname" type="text"
                                       class="form-control{{ $errors->has('surname') ? ' is-invalid' : '' }}"
                                       name="surname"
                                       placeholder="Meno"
                                       value="{{ old('surname') }}" required autofocus
                                       style="border: 0; outline: 0; background: transparent; border-bottom: 1.5px solid #E9E9F0;">

                                @if ($errors->has('surname'))
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('surname') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6 float-right"
                             style=" padding-left: 15px; padding-right: 0; ">
                            <div class="form-group">
                                <input id="lastname" type="text"
                                       class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}"
                                       name="lastname"
                                       placeholder="Priezvisko"
                                       value="{{ old('lastname') }}" required autofocus
                                       style="border: 0; outline: 0; background: transparent; border-bottom: 1.5px solid #E9E9F0;">

                                @if ($errors->has('lastname'))
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('lastname') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>
                    </div>
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
                    <div class="form-group">
                        <input id="password-confirm" type="password"
                               class="form-control{{ $errors->has('password-confirm') ? ' is-invalid' : '' }}"
                               name="password_confirmation"
                               placeholder="Zopakujte heslo"
                               style="border: 0; outline: 0; background: transparent; border-bottom: 1.5px solid #E9E9F0;"
                               required>

                    </div>
                    <div class="row mt-4 mx-0">
                        <div class="form-check" style="margin-left:20px; padding-left: 0;">
                            <input class="form-check-input" type="checkbox" name="checkbox"
                                   id="option" {{ old('option') ? 'checked' : '' }}>

                            <label class="form-check-label" for="option">
                                {{ __('Súhlasím so zmluvnými podmienkami') }}
                            </label>
                        </div>
                    </div>
                    <div class="form-group row mt-4 mb-1">
                        <div class="col-md-3"></div>
                        <div class="col-md-6" align="center">
                            <button type="submit" class="btn btn-block btn-secondary">
                                {{ __('Registrovať') }}
                            </button>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                    <div class="form-group row mr-1">
                        <div class="col-md-3"></div>
                        <div class="col-md-6" align="center">
                            <a class="btn btn-link" style=" padding: 0;"
                               href="{{ route('login') }}">
                                {{ __('Už máte účet? Prihláste sa!') }}
                            </a>
                        </div>
                        <div class="col-md-3"></div>
                    </div>


                </form>
            </div>
        </div>
    </div>
@endsection