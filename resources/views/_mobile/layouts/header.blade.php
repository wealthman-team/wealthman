<div class="header">
    <div class="header__container {{ checkCatActive('/') ? 'header__home' : 'js-header-sticky' }}">
        <div class="container">
            <div class="header__content">
                <div class="header__item">
                    <div class="header__logo-container">
                        <a href="{{ route('home') }}">
                            @svg('logo', 'icon-logo')
                        </a>
                    </div>
                    <div class="search js-search-wrapp">
                            <span class="search-icon js-search-open">
                                @svg('search')
                            </span>
                        <div class="search__form js-search-form">
                            <div class="search__form-item">
                                <form action="{{route('blog.search')}}" method="get">
                                    <div class="search__form-group">
                                        <input type="search" class="search__form-input" name="q" placeholder="Search..." value="{{request('q')}}">
                                        <button type="submit" class="search__form-btn">@svg('search')</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="header__menu">
                    <span class="search-icon js-search-open">
                        @svg('search')
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>