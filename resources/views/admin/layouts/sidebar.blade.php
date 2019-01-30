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

            <li class="treeview {{ checkCatActive([
                                    'admin/robo-advisors',
                                    'admin/robo-advisors/*',
                                    'admin/account-types',
                                    'admin/account-types/*',
                                    'admin/usage-types',
                                    'admin/usage-types/*',
                                    ]) ? 'active' : '' }}">
                <a href="#">
                    <i class="fa fa-get-pocket"></i> <span>Advisor screener</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ setCatActive('admin/robo-advisors') }} {{ setCatActive('admin/robo-advisors/*') }}">
                        <a href="{{ route('admin.roboAdvisors.index') }}">
                            <i class="fa fa-desktop"></i>
                            <span>Robo-advisors</span>
                        </a>
                    </li>
                    <li class="{{ setCatActive('admin/account-types') }} {{ setCatActive('admin/account-types/*') }}">
                        <a href="{{ route('admin.accountTypes.index') }}">
                            <i class="fa fa-money"></i>
                            <span>Account types</span>
                        </a>
                    </li>
                    <li class="{{ setCatActive('admin/usage-types') }} {{ setCatActive('admin/usage-types/*') }}">
                        <a href="{{ route('admin.usageTypes.index') }}">
                            <i class="fa fa-bookmark-o"></i>
                            <span>Usage types</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="{{ setCatActive('users') }}">
                <a href="{{ route('admin.users.index') }}">
                    <i class="fa fa-user"></i>
                    <span>Users</span>
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