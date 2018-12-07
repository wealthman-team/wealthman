<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">ОСНОВНЫЕ РАЗДЕЛЫ</li>

            <li class="{{ setCatActive('admin') }}">
                <a href="{{ route('admin.index') }}">
                    <i class="fa fa-home"></i>
                    <span>Главная</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out"></i>
                    <span>Выйти</span>
                </a>

                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </section>
</aside>