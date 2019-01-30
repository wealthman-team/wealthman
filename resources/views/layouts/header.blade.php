<div class="header">
    <div class="header__container {{ checkCatActive('/') ? 'header__home' : 'js-header-sticky' }}">
        <div class="container">
            <div class="header__content">
                <div class="header__left-col">
                    <div class="header__logo-container">
                        <a href="{{ route('home') }}">
                            @svg('logo', 'icon-logo')
                        </a>
                    </div>
                    <div class="header__nav">
                        <a class="link header__nav-item" href="{{ route('roboAdvisors') }}">Advisor screener</a>
                        {{--<a class="link header__nav-item" href="#">About Us</a>--}}
                        {{--<a class="link header__nav-item" href="#">Team</a>--}}
                        {{--<a class="link header__nav-item" href="#">Contacts</a>--}}
                    </div>
                </div>

                <div class="header__right-col">
                    <div class="header__compare-link">
                        <a class="header__compare-list-link js-compare-counter {{ getCompareListLength('compare_list') > 0 ? '' : ' hide'}}"
                           href="{{ route('roboAdvisorsCompare') }}"
                        >
                            Compare
                            <span class="header__compare-link-value js-compare-counter-value">
                                {{ getCompareListLength('compare_list') }}
                            </span>
                        </a>
                    </div>

                    <a class="button button_blue start-search js-jivo-button" href="#">Free Support</a>
                    <div class="auth-icon-wrapper js-auth-icon-wrapper">
                        @if(!user_logged_in())
                            <span class="auth-icon js-modal-open js-modal-auth" data-modal="modal-auth" data-position="btn" data-href="{{route('login')}}">@svg('sign_in', 'auth-icon__sign-in')</span>
                        @else
                            <span class="auth-icon auth-user-icon js-user-menu-open">{{user_short_name()}}</span>
                            <div class="user-menu js-user-menu">
                                <ul class="user-menu__list">
                                    <li class="user-menu__item user-menu__title">
                                        <span class="user-menu__link">Signed in as <strong>{{user_name()}}</strong></span>
                                    </li>
                                    <li class="user-menu__item">
                                        <a class="link user-menu__link user-menu__sign-out" href="{{route('logout')}}">Sign out</a>
                                    </li>
                                </ul>
                            </div>
                        @endif
                    </div>
                    {{--<span class="search-icon">--}}
                        {{--@svg('search')--}}
                    {{--</span>--}}
                </div>
            </div>
        </div>
    </div>
</div>