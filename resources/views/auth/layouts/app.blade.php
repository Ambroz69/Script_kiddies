<!doctype html>
<html lang="{{ app()->getLocale() }}" style="height: 100%;">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link href="{{ asset('css/auth/app.css') }}" rel="stylesheet">
    <style>
    </style>
</head>
<body style="height: 100%;">
@yield('content')

<script src="{{ asset('js/app.js') }}"></script>
<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
<script>
    feather.replace()
</script>
</body>
</html>
