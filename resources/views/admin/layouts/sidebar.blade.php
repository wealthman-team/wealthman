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

            <li class="{{ setCatActive('admin/users') }}">
                <a href="{{ route('admin.users.index') }}">
                    <i class="fa fa-user"></i>
                    <span>Users</span>
                </a>
            </li>

            <li class="treeview {{ checkCatActive([
                                    'admin/robo-advisors',
                                    'admin/robo-advisors/*',
                                    'admin/account-types',
                                    'admin/account-types/*',
                                    'admin/usage-types',
                                    'admin/usage-types/*',
                                    'admin/reviews',
                                    'admin/reviews/*',
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
                    <li class="{{ setCatActive('admin/reviews') }} {{ setCatActive('admin/reviews/*') }}">
                        <a href="{{ route('admin.reviews.index') }}">
                            <i class="fa fa-star-half-o"></i>
                            <span>Reviews</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview {{ checkCatActive([
                                    'admin/posts',
                                    'admin/posts/*',
                                    'admin/categories',
                                    'admin/categories/*',
                                    'admin/tags',
                                    'admin/tags/*',
                                    ]) ? 'active' : '' }}">
                <a href="#">
                    <i class="fa fa-file-text-o"></i> <span>Posts</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ setCatActive('admin/posts') }} {{ setCatActive('admin/posts/*') }}">
                        <a href="{{ route('admin.posts.index') }}">
                            <i class="fa fa-file-text-o"></i>
                            <span>All Posts</span>
                        </a>
                    </li>
                    <li class="{{ setCatActive('admin/categories') }} {{ setCatActive('admin/categories/*') }}">
                        <a href="{{ route('admin.categories.index') }}">
                            <i class="fa fa-tasks"></i>
                            <span>Categories</span>
                        </a>
                    </li>
                    <li class="{{ setCatActive('admin/tags') }} {{ setCatActive('admin/tags/*') }}">
                        <a href="{{ route('admin.tags.index') }}">
                            <i class="fa fa-tags"></i>
                            <span>Tags</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ route('admin.logout') }}">
                    <i class="fa fa-sign-out"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </section>
</aside>