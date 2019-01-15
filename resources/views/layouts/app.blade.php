<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="description" content="{{ $pageDescription }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $pageTitle }}</title>

    <link rel="shortcut icon" href="/favicon.ico"/>

    <!-- Styles -->
    <link href="{{ mix('/css/icons.css') }}" rel="stylesheet">
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
</head>
<body class="{{ checkCatActive('/') ? 'bg-white' : '' }}">
    <div id="app">
        @yield('content')
    </div>

    <script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>
