@extends('auth.layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-4 text-center">
                <div class="card-title mb-3 border-bottom p-2"> {{ __('PRIHLÁSENIE') }} </div>
                <div class="card" style="border-radius:40px;
                        background:url({{ URL::to('/') }}/image/login.png);
                        background-size: 100% 100%;
                        background-repeat: no-repeat;">
                    <div class="card-body" style="padding-bottom:0 !important;">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email" class="mt-3">{{ __('E-MAIL:') }}</label>
                                <input id="email" type="email"
                                       class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                       value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>


                            <div class="form-group">
                                <label for="password" class="mt-3">{{ __('HESLO:') }}</label>
                                <input id="password" type="password"
                                       class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                       name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <div class="form-check mb-5 pb-3">
                                    <input class="form-check-input" type="checkbox" name="remember"
                                           id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Zapamätaj si ma') }}
                                    </label>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="mt-5 pt-3" style="vertical-align: bottom; ">
                                    <button type="submit" class="btn btn-secondary btn-block" style="color: #212529 !important;">
                                        {{ __('PRIHLÁSIŤ SA') }}
                                    </button>

                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Zabudli ste heslo?') }}
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



