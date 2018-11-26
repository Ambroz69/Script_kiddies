@extends('auth.layouts.app')
@section('content')

    <div class="" style="padding-top: 35%">
        <div class="mb-3">
            <h1 style="font-family: 'Open Sans', sans-serif; font-size: 35px; color: #43425D; letter-spacing: 5px;">
                <strong>{{ __('DO-BY-PO') }}</strong></h1>
            <h2 style="font-family: 'Open Sans', sans-serif; font-size: 18px; color: #B3B4B9;">
                Zadajte svoju e-mailovú adresu a spustite tak proces obnovy hesla.</h2>
        </div>

        <div class="">
            <div class="card-body" style="padding-bottom:0 !important;">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>

                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    <div class="row mx-0">
                        <div class="col-md-12">
                            @csrf
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
                        </div>
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


@endsection
