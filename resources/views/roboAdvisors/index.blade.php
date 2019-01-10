@extends('layouts.app')

@section('content')
    @include('layouts/header')

    <div class="content">
        <div class="robo-advisors">
            @include('components/breadcrumbs', [
                'breadcrumbs' => [[
                    'name' => 'Home',
                    'link' => route('home'),
                ],[
                    'name' => 'Robo Advisors',
                ]]
            ])

            <div class="container">
                <h1 class="page-header">
                    Advisor screener
                </h1>
                <div class="page-sub-header">
                    Find independent information about
                    roboadvisors in the US
                </div>

                <div class="robo-advisors__container">
                    @include('components/roboAdvisorsFilters')

                    <div class="main-content">
                        <div class="robo-advisors__list js-ra-list">
                            <div class="robo-advisors__list-header">
                                <div class="robo-advisors__lh-item robo-advisors__lh-company">
                                    Company
                                    <span class="sort-icon asc"></span>
                                </div>
                                <div class="robo-advisors__lh-item robo-advisors__lh-rating">
                                    Rating
                                    <span class="sort-icon desc"></span>
                                </div>
                                <div class="robo-advisors__lh-item robo-advisors__lh-recommendation">
                                    Recommendation
                                    <span class="sort-icon"></span>
                                </div>
                                <div class="robo-advisors__lh-item robo-advisors__lh-account">
                                    Min account
                                    <span class="sort-icon"></span>
                                </div>
                                <div class="robo-advisors__lh-item robo-advisors__lh-fee">
                                    Fee
                                    <span class="sort-icon"></span>
                                </div>
                                <div class="robo-advisors__lh-item robo-advisors__lh-aum">
                                    AUM
                                    <span class="sort-icon"></span>
                                </div>
                                <div class="robo-advisors__lh-item robo-advisors__lh-details">
                                    Additional details
                                </div>
                            </div>
                            <div class="robo-advisors__list-body">
                                @foreach($roboAdvisors as $roboAdvisor)
                                    @include('components/roboAdvisorsItem', [
                                        'roboAdvisor' => $roboAdvisor,
                                        'compareList' => getCompareList('compare_list'),
                                    ])
                                @endforeach
                            </div>
                        </div>

                        <div class="links-container">
                            {{ $roboAdvisors->links('components/pagination') }}
                        </div>

                        <div class="robo-advisors__text-container">
                            <h2 class="robo-advisors__h2">
                                How to choose the right robo advisor
                            </h2>
                            <div class="robo-advisors__text-inner">
                                <div class="robo-advisors__section-title">
                                    GENERAL FILTERS
                                </div>
                                <h3 class="robo-advisors__h3">
                                    Management fee
                                </h3>
                                <p class="robo-advisors__p">
                                    Most robo advisors charge a percentage fee based on the size of the portfolio.
                                    These fees are typically much lower than the average 1% charged
                                    by traditional financial advisors.
                                </p>
                                <p class="robo-advisors__p">
                                    Other robo advisors offer human advisors alongside their online tools and automated
                                    backend and some may charge an additional fee for consulting
                                    with human financial advisors.
                                </p>
                                <p class="robo-advisors__p">
                                    It’s important to keep in mind that the upfront fees charged by robo advisors
                                    aren’t the only costs in your portfolio. There are also the fees embedded in the
                                    underlying investments - typically the management fees of mutual funds and exchange
                                    traded funds (ETFs). In most cases though, these are the same costs of low-fee
                                    funds you’d be paying if you were managing your own portfolio.
                                </p>
                                <p class="robo-advisors__p">
                                    Some robo advisors like Charles Schwab’s Intelligent Portfolios include other
                                    hidden costs like large mandatory cash allocations that pay only a small
                                    percentage of the actual revenue the robo advisor earns on those funds.
                                </p>
                                <p class="robo-advisors__p">
                                    A robo advisor that is missing features that could benefit your situation
                                    (e.g. the lack of tax-loss harvesting when you hold funds in a taxable account)
                                    can be an additional hidden cost of your robo advisor selection.
                                </p>

                                <h3 class="robo-advisors__h3">
                                    Minimum Initial Deposit
                                </h3>
                                <p class="robo-advisors__p">
                                    This is the minimum amount required by the robo advisor to open and maintain an account.
                                </p>

                                <div class="robo-advisors__text-strong">
                                    <h3 class="robo-advisors__h3">
                                        Single Stock Diversification
                                    </h3>
                                    <p class="robo-advisors__p">
                                        This feature helps employees and investors who hold a high percentage of
                                        their networth in a single stock (typically the same company that signs their
                                        checks) diversify in a tax-efficient, commission-free manner. Single stock
                                        diversification typically involves using dollar cost averaging
                                        to minimize volatility.
                                    </p>
                                </div>

                                <h3 class="robo-advisors__h3">
                                    Direct Indexing
                                </h3>
                                <p class="robo-advisors__p">
                                    As the name suggests, direct indexing allows you to directly purchase and own all
                                    of the individual securities of a major index as opposed to owning a mutual fund
                                    or ETF that tracks an index. Some research has suggested that direct indexing may
                                    be more tax-efficient than owning the equivalent index funds/ETFs by allowing
                                    investors to harvest tax losses on an index’s individual component stocks.
                                </p>
                                <p class="robo-advisors__p">
                                    Direct indexing also eliminates the management fees of index funds or ETFs,
                                    which prevents exact replication of the performance of an index investment.
                                    However, the actual calculation of fee savings must also take into
                                    consideration of the robo advisors fees.
                                </p>

                                <h3 class="robo-advisors__h3">
                                    Tax Loss Harvesting
                                </h3>
                                <p class="robo-advisors__p">
                                    The actual financial modeling and execution of tax loss harvesting can be
                                    extremely complicated, but the basic concept is simple - tax loss harvesting
                                    involves selling securities that have experienced a capital loss and replacing
                                    it with a similar one, in order to help offset taxes on capital gains and income.
                                </p>
                                <p class="robo-advisors__p">
                                    Tax loss harvesting can reduce ordinary taxable income by up to $3,000 per year,
                                    though the actual increase in investment returns will depend on the amount of tax
                                    loss harvesting opportunities available through a year, the investor’s tax bracket,
                                    and many other factors - including the effectiveness of the robo - advisor’s
                                    tax loss harvesting algorithm.
                                </p>
                                <p class="robo-advisors__p">
                                    Automated tax loss harvesting is one of the big ways that robo advisors can
                                    increase return for investors without increasing risk. However, tax loss harvesting
                                    doesn’t benefit everyone. Investors using only tax sheltered accounts won’t see
                                    a benefit from tax loss harvesting. Investors in a 0% capital gains tax rate,
                                    and even some investors in the 10-15% ordinary income tax brackets might not want
                                    to use tax loss harvesting. Investors in higher tax brackets investing in taxable
                                    accounts will see the most benefit from tax loss harvesting.
                                </p>

                                <h3 class="robo-advisors__h3">
                                    Fractional Shares
                                </h3>
                                <p class="robo-advisors__p">
                                    Trading on an exchange only involves whole shares. This can leave some cash on the
                                    sidelines and create a silent drag on returns.<br>
                                    Some robo advisors support trading in fractional shares, which lets investors buy
                                    shares down to 1/1,000,000 of a share and increases efficiency. Fractional shares
                                    allow investors to diversify every penny in their investment account, instead of
                                    holding cash simply because the remaining funds in their portfolio
                                    isn’t enough to buy a whole share.
                                </p>

                                <h3 class="robo-advisors__h3">
                                    Human Advisors
                                </h3>
                                <p class="robo-advisors__p">
                                    Not every entry in the robo advisor category is completely automated.
                                    Some are 100% automated, while others combine an online interface and
                                    backend automation with personalized advice.
                                </p>
                                <p class="robo-advisors__p">
                                    There are many ways to categorize online financial services, but to us, if an
                                    automated online advisor service provides automated rebalancing, low fees, and
                                    an online dashboard - then we’re considering it a robo advisor for the sake of
                                    this comparison of the best robo advisors, even if the service includes a
                                    layer of human advice.
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