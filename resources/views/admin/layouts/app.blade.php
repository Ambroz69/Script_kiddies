<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <title>@yield('title')</title>
    <link href="{{ asset('css/admin/app.css') }}" rel="stylesheet">
</head>
<body>
@include('admin.partials.header')
<div class="container-fluid">
    <div class="row">
        @include('admin.partials.nav')
        <main class="col-md-9 ml-sm-auto col-lg-10 px-4 py-5">
            @yield('content')
        </main>
    </div>
</div>
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
<script>
    feather.replace()
</script>
</body>
</html>
