<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>{{ $pageTitle }}</title>
    <meta name="description" content="{{ $pageDescription }}">
    @if(isset($pageKeywords) && !empty($pageKeywords))
        <meta name="keywords" content="{{$pageKeywords}}" />
    @endif

    <meta name="viewport" content="width=1310">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- Favicon --}}
    <link rel="apple-touch-icon" sizes="57x57" href="/images/favicons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/images/favicons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/images/favicons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/images/favicons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/images/favicons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/images/favicons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/images/favicons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/images/favicons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/images/favicons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/images/favicons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/images/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/images/favicons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/images/favicons/favicon-16x16.png">
    <link rel="manifest" href="/images/favicons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/images/favicons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!-- Fonts -->

    <!-- Styles -->
    <link href="{{ mix('/css/admin/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ mix('/css/admin/admin.css') }}" rel="stylesheet">
</head>
{{--<body class="@guest('admin') login-page @else skin-red @endguest">--}}
<body class="@auth() skin-red @else login-page @endauth">
    @auth()
        <div class="wrapper">
            @include('admin/layouts/header')
            @include('admin/layouts/sidebar')

            <div class="content-wrapper">
                @if (isset($pageBreadcrumb))
                    <section class="content-header">
                        @include('admin/components/admin/breadcrumb', [
                            'breadcrumbs' => $pageBreadcrumb
                        ])
                    </section>
                @endif

                @yield('content')
            </div>
        </div>
    @else
        @yield('content')
    @endauth

    <script src="https://cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>
    <script src="{{ mix('/js/admin.js') }}"></script>
</body>
</html>
