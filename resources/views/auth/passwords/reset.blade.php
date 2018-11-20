@extends('auth.layouts.app')
@section('content')

    <div class="" style="padding-top: 25%">
        <div class="mb-3">
            <h1 style="font-family: 'Open Sans', sans-serif; font-size: 35px; color: #43425D; letter-spacing: 5px;">
                <strong>{{ __('DO-BY-PO') }}</strong></h1>
            <h2 style="font-family: 'Open Sans', sans-serif; font-size: 18px; color: #B3B4B9;">
                Prosím pokračujte pre obnovenie hesla.</h2>
        </div>

        <div class="">
            <div class="card-body" style="padding-bottom:0 !important;">
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="form-group">
                        <input id="email" type="email"
                               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                               name="email"
                               placeholder="E-mail"
                               value="{{ old('email') }}" required autofocus
                               style="border: 0; outline: 0; background: transparent; border-bottom: 1.5px solid #E9E9F0;">
                    </div>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                    @endif
                    <div class="form-group">
                        <input id="password" type="password"
                               class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                               name="password"
                               placeholder="Heslo"
                               value="{{ old('password') }}" required autofocus
                               style="border: 0; outline: 0; background: transparent; border-bottom: 1.5px solid #E9E9F0;">
                    </div>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                    @endif
                    <div class="form-group">
                        <input id="password-confirm" type="password"
                               class="form-control{{ $errors->has('password-confirm') ? ' is-invalid' : '' }}"
                               name="password_confirmation"
                               placeholder="Zopakujte heslo"
                               style="border: 0; outline: 0; background: transparent; border-bottom: 1.5px solid #E9E9F0;"
                               required>

                    </div>
                    <div class="form-group row mt-4 mb-1">
                        <div class="col-md-3"></div>
                        <div class="col-md-6" align="center">
                            <button type="submit" class="btn btn-block btn-secondary">
                                {{ __('Obnoviť heslo') }}
                            </button>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                </form>
            </div>
        </div>

    </div>
    {{--<div class="container">--}}
    {{--<div class="row justify-content-center">--}}
    {{--<div class="col-md-8">--}}
    {{--<div class="card">--}}
    {{--<div class="card-header">{{ __('Reset Password') }}</div>--}}

    {{--<div class="card-body">--}}
    {{--<form method="POST" action="{{ route('password.update') }}">--}}
    {{--@csrf--}}

    {{--<input type="hidden" name="token" value="{{ $token }}">--}}

    {{--<div class="form-group row">--}}
    {{--<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

    {{--<div class="col-md-6">--}}
    {{--<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>--}}

    {{--@if ($errors->has('email'))--}}
    {{--<span class="invalid-feedback" role="alert">--}}
    {{--<strong>{{ $errors->first('email') }}</strong>--}}
    {{--</span>--}}
    {{--@endif--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--<div class="form-group row">--}}
    {{--<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

    {{--<div class="col-md-6">--}}
    {{--<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>--}}

    {{--@if ($errors->has('password'))--}}
    {{--<span class="invalid-feedback" role="alert">--}}
    {{--<strong>{{ $errors->first('password') }}</strong>--}}
    {{--</span>--}}
    {{--@endif--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--<div class="form-group row">--}}
    {{--<label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>--}}

    {{--<div class="col-md-6">--}}
    {{--<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--<div class="form-group row mb-0">--}}
    {{--<div class="col-md-6 offset-md-4">--}}
    {{--<button type="submit" class="btn btn-primary">--}}
    {{--{{ __('Reset Password') }}--}}
    {{--</button>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</form>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
@endsection
