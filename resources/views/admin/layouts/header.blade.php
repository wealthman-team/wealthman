<header class="main-header">
    <a href="{{ route('home') }}" class="logo">
        <span class="logo-mini">WM</span>
        <span class="logo-lg"><b>Wealthman</b></span>
    </a>

    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu hidden-xs">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="hidden-xs">
                            {{ Auth::user()->name }}
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>