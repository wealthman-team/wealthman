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
                    <div class="auth-icon-wrapper">
                        <span class="auth-icon js-auth-open">@svg('sign_in', 'auth-icon__sign-in')</span>
                    </div>
                    {{--<span class="search-icon">--}}
                        {{--@svg('search')--}}
                    {{--</span>--}}
                </div>
            </div>
        </div>
    </div>
</div>