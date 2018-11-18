<!doctype html>
<html lang="{{ app()->getLocale() }}" style="height: 100%;">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link href="{{ asset('css/auth/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Open+Sans');
    </style>
</head>
<body style="height: 100%;">
{{--@yield('content')--}}


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
                <div class="col-md-8">
                @yield('content')
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/app.js') }}"></script>
<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
<script>
    feather.replace()
</script>
</body>
</html>
