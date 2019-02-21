@extends('layouts/app')

@section('content')
    @include('layouts/header')

    <div class="content robo-advisors">

        @include('components/parallax', ['bg' => '/images/header-bg.jpg'])

        <div class="container">
            <div class="topic">
                @include('components/breadcrumbs', [
                    'theme' => 'dark-theme',
                    'breadcrumbs' => [[
                        'name' => 'Home',
                        'link' => route('home'),
                    ],[
                        'name' => 'Robo Advisors',
                    ]]
                ])
                @include('components/page-header', [
                    'header' => 'Advisor screener',
                    'sub_header' => 'Find independent information about roboadvisors in the US'
                ])
            </div>

            <div class="main">

                <div class="sidebar sidebar__left">
                    @include ('roboAdvisors/_sidebar-index')
                </div>

                <div class="main-content">
                    <div class="panel-with-padding js-ra-list">
                        <div class="robo-advisors__list-header">
                            <a href="{{sort_url('company')}}" class="robo-advisors__lh-item robo-advisors__lh-company">
                                Company
                                <span class="sort-icon {{sort_type('company')}}"></span>
                            </a>
                            <a href="{{sort_url('rating')}}" class="robo-advisors__lh-item robo-advisors__lh-rating">
                                Rating
                                <span class="sort-icon {{sort_type('rating')}}"></span>
                            </a>
                            <div class="robo-advisors__lh-item robo-advisors__lh-recommendation">
                                Recommendation
                            </div>
                            <a href="{{sort_url('account')}}" class="robo-advisors__lh-item robo-advisors__lh-account">
                                Min account
                                <span class="sort-icon {{sort_type('account')}}"></span>
                            </a>
                            <a href="{{sort_url('fee')}}" class="robo-advisors__lh-item robo-advisors__lh-fee">
                                Fee
                                <span class="sort-icon {{sort_type('fee')}}"></span>
                            </a>
                            <a href="{{sort_url('aum')}}" class="robo-advisors__lh-item robo-advisors__lh-aum">
                                AUM
                                <span class="sort-icon {{sort_type('aum')}}"></span>
                            </a>
                            <div class="robo-advisors__lh-item robo-advisors__lh-details">
                                Additional details
                            </div>
                        </div>
                        @if(count($roboAdvisors) > 0)
                            <div class="robo-advisors__list-body">
                                @foreach($roboAdvisors as $roboAdvisor)
                                    @include('components/roboAdvisorsItem', [
                                        'roboAdvisor' => $roboAdvisor,
                                        'compareList' => getCompareList('compare_list'),
                                    ])
                                @endforeach
                            </div>
                        @else
                            <div class="robo-advisors__list-body robo-advisors__list-empty">
                                <div class="robo-advisors__list-empty-message">
                                Oops, nothing found matching your criteria.<br> Remove some features and try again.
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="links-container">
                        {{ $roboAdvisors->links('components/pagination') }}
                    </div>

                    <div class="robo-advisors__text-container">
                        <h2 class="robo-advisors__h2">
                            How to choose the right robo advisor
                        </h2>
                        <div class="robo-advisors__text-inner">
                            <div class="robo-advisors__hint-title">
                                GENERAL FILTERS
                            </div>

                            <div class="robo-advisors__text-hint">
                                <h3 class="robo-advisors__h3">
                                    Basic Management fee for users
                                </h3>
                                <p class="robo-advisors__p">
                                    The vast majority of robo advisors include fees for their services. The final size may depend on the amount managed. In general, the amount does not exceed 1% of the fee to a real consultant. That is why robo consultants are becoming so popular.
                                    Some advisers have a real staff of consultants and provide an expanded range of services. This list includes various economic instruments, financial professionals and a number of specialized options.
                                </p>
                                <p class="robo-advisors__p">
                                    Advance payments are not the only expenses. The management of funds and ETFs also requires a commission. Such a format is still acceptable, since it is approximately equal to the sum of costs for self-monitoring of its portfolio.
                                </p>
                                <p class="robo-advisors__p">
                                    Some advisors have additional payments. The system uses cash allocations and pays a minimum percentage for the provision of cash.
                                </p>
                                <p class="robo-advisors__p">
                                    Some advisers do not include hidden costs from the use of taxable accounts. Such moments should be considered before the final selection of the robot advisor. Some offers may have limited functionality.
                                </p>
                            </div>

                            <div class="robo-advisors__text-hint">
                                <h3 class="robo-advisors__h3">
                                    Minimum initial deposit
                                </h3>
                                <p class="robo-advisors__p">
                                    This is a basic investment. By depositing the required amount to the account, you can count on maintaining accounts.
                                </p>
                            </div>

                            <div class="robo-advisors__text-hint">
                                <h3 class="robo-advisors__h3">
                                    Single stock diversification
                                </h3>
                                <p class="robo-advisors__p">
                                    This is one of the important functions for those who use single stock. The service helps to level the effects of volatility and includes averaging of the final cost. Thanks to this format, investors can secure their portfolio and resolve all technical issues. A detailed analysis of all proposals is critical to the final selection. All options have their pros and cons. That is why a thorough analysis of all criteria forms the final vision of the finished product.
                                </p>
                            </div>

                            <div class="robo-advisors__text-hint">
                                <h3 class="robo-advisors__h3">
                                    Direct indexing for everyone
                                </h3>
                                <p class="robo-advisors__p">
                                    This option fully corresponds to its name. This is a direct purchase of assets and securities. This is a more effective option for cooperation. Unlike ETFs, each user can reduce tax expenses. Clients also have no need to pay for managing index funds. But do not forget about the commission robo advisers.
                                </p>
                            </div>

                            <div class="robo-advisors__text-hint">
                                <h3 class="robo-advisors__h3">
                                    Tax loss harvesting option
                                </h3>
                                <p class="robo-advisors__p">
                                    Tax loss harvesting is a very useful option. Thanks to this moment, you can automatically replace unprofitable positions in order to increase profitability and diversify risks. In general, a robo advisor with such functions can save up to three thousand US dollars per year. The final efficiency depends on how advanced Tax Loss algorithm is used by the advisor.
                                </p>
                                <p class="robo-advisors__p">
                                    Automated tax loss harvesting allows you to consolidate the maximum profit and reduce operational costs for most users. Users with 0% capital gains may not appreciate this option. Taxable accounts users can count on the greatest benefit from this option.
                                </p>
                            </div>

                            <div class="robo-advisors__text-hint">
                                <h3 class="robo-advisors__h3">
                                    Fractional Shares function
                                </h3>
                                <p class="robo-advisors__p">
                                    This option helps to buy parts of stocks, in the case when finances are not enough to buy one share. This is the best option for investors who seek to use all the savings and get the maximum profit on the residual account. Choose only those options that are extremely important in each case. The pursuit of low commissions is not always relevant. The same rule applies in the opposite direction. There is no need to complicate the process of selecting the most affordable option. The best functionality and extended warranties should be the main argument in the selection.
                                </p>
                            </div>

                            <div class="robo-advisors__text-hint">
                                <h3 class="robo-advisors__h3">
                                    Human advisors opportunities
                                </h3>
                                <p class="robo-advisors__p">
                                    Most advisers on the market use a 100% machine algorithm. However, there are also combined solutions. This is the format when part of the councils is formed by real advisors. The main criterion for consideration is the availability of automatic rebalancing and an online menu for monitoring status. Even the availability of services from real advisors allows you to consider such a proposal in the context of robo services.
                                </p>
                                <p class="robo-advisors__p">
                                    The choice of the final option depends on the required goals and the management of each client. It is worth noting that the size of the investment also affects the choice. It is necessary to study in detail all possible details and choose the most appropriate option. There are no truly universal solutions quite a bit. The most common is the choice of averages for further use.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts/footer')
@endsection