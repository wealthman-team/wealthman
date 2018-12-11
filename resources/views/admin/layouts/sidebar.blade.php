<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">ОСНОВНЫЕ РАЗДЕЛЫ</li>

            <li class="{{ setCatActive('admin') }}">
                <a href="{{ route('admin.index') }}">
                    <i class="fa fa-home"></i>
                    <span>Home</span>
                </a>
            </li>

            <li class="{{ setCatActive('admin/robo-advisors') }} {{ setCatActive('admin/robo-advisors/*') }}">
                <a href="{{ route('admin.roboAdvisors.index') }}">
                    <i class="fa fa-desktop"></i>
                    <span>Robo advisors</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out"></i>
                    <span>Logout</span>
                </a>

                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </section>
</aside>