<div class="header">
    <div class="container">
        <div class="header__content">
            <div class="header__logo-container">
                <a href="{{ route('home') }}">
                    <span class="icon icon-logo"></span>
                </a>
            </div>
            <div class="header__compare-link">
                <a class="header__compare-list-link js-compare-list {{ getCompareListLength('compare_list') > 0 ? '' : ' hide'}}"
                   href="{{ route('roboAdvisorsCompare') }}"
                >
                    Compare
                    <span class="header__compare-link-value js-compare-list-value">
                        {{ getCompareListLength('compare_list') }}
                    </span>
                </a>
            </div>
        </div>
    </div>
</div>