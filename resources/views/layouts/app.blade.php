<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @if (env('APP_ENV') != 'development')
    <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-132876902-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-132876902-1');
        </script>
    @endif

    <meta charset="utf-8">
    <title>{{ $pageTitle }}</title>
    <meta name="description" content="{{ $pageDescription }}">

    <meta name="viewport" content="width=1310">

    <!-- CSRF Token -->
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

    <!-- Styles -->
    <link href="{{ mix('/css/icons.css') }}" rel="stylesheet">
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
</head>
<body class="{{ checkCatActive('/') ? 'bg-white' : '' }}">
    <div id="app">
        @yield('content')
    </div>

    <div class="auth-modal js-modal-auth">
        <div class="auth-modal__tabs">
            <a class="auth-modal__tabs-link active js-tab-sign-in" href="#">Sign In</a>
            <a class="auth-modal__tabs-link js-tab-sign-up" href="#">Sign Up</a>
        </div>
        <div class="auth-modal__content">
            <div class="js-auth-sign-in">
                <div class="auth-form">
                    <form>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Password">
                        </div>
                        <button type="submit" class="button button_blue">Log In</button>
                        <div class="auth-form__links">
                            <a class="auth-form__forgot-password" href="#">Forgot password</a>
                        </div>
                    </form>
                </div>
                <div class="auth-social">
                    <div class="auth-social__title">Or Log In with social</div>
                    <div class="auth-social__links">
                        <a class="auth-social__link" href="#">
                            @svg('facebook', 'auth-social__facebook')
                        </a>
                        <a class="auth-social__link" href="#">
                            @svg('linkedin', 'auth-social__linkedin')
                        </a>
                        <a class="auth-social__link" href="#">
                            @svg('googleplus', 'auth-social__googleplus')
                        </a>
                        <a class="auth-social__link" href="#">
                            @svg('twitter', 'auth-social__twitter')
                        </a>
                    </div>
                    <div class="auth-social__text">Supported browsers</div>
                </div>
            </div>
            <div class="js-auth-sign-up hidden">
                <div class="auth-form">
                    <form>
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" required placeholder="Name">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password_confirmation" required placeholder="Password confirmation">
                        </div>
                        <button type="submit" class="button button_blue">Sign up</button>
                        <div class="auth-form__links">
                            <a class="auth-form__forgot-password" href="#">Forgot password</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-overlay js-modal-overlay">&nbsp;</div>
    <script src="{{ mix('/js/app.js') }}" type="text/javascript"></script>
    <script src="/jivosite/jivosite.js" type="text/javascript"></script>

    @if (env('APP_ENV') != 'development')
        <!-- BEGIN JIVOSITE CODE {literal} -->
        <script type='text/javascript'>
            (function(){ var widget_id = 'UNYlDthGo8';var d=document;var w=window;function l(){var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true;s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();
        </script>
        <!-- {/literal} END JIVOSITE CODE -->
        <!-- Yandex.Metrika counter -->
        <script type="text/javascript" >
            (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
                m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
            (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

            ym(47689966, "init", {
                id:47689966,
                clickmap:true,
                trackLinks:true,
                accurateTrackBounce:true,
                webvisor:true,
                trackHash:true
            });
        </script>
        <noscript><div><img src="https://mc.yandex.ru/watch/47689966" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
        <!-- /Yandex.Metrika counter -->
    @endif
</body>
</html>
