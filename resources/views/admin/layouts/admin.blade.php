<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="description" content="{{ $pageDescription }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $pageTitle }}</title>

    <!-- Fonts -->

    <!-- Styles -->
    <link href="{{ mix('/css/admin/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ mix('/css/admin/admin.css') }}" rel="stylesheet">
</head>
<body class="@guest login-page @else skin-red @endguest">
    @guest
        @yield('content')
    @else
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
    @endguest

    <script src="https://cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>
    <script src="{{ mix('/js/admin.js') }}"></script>
</body>
</html>
