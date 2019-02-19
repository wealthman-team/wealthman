@extends('_mobile.layouts.app')

@section('content')
    @include('_mobile.layouts.header')

    <div class="content content__pd-bot">
        <section class="firstSection">
            <div class="container">
                <div class="firstSection__container" >
                    <h1 class="page-header">Select the best suited robo-advisor mobile</h1>
                    <h2 class="page-sub-header">Use our sophisticated Advisor screener to select robo-advisor independently or consult our free competent support.</h2>
                    <a class="button button_blue" href="{{route('roboAdvisors')}}">Start Search</a>
                </div>
            </div>
        </section>
        <div class="container">
            <section class="secondSection">
                <div class="robo-advisors__container">
                    <div class="tableContainerRow">
                        <div class="leftSide">
                            <h2 class="block-header">TOP 5 <br>Robo-advisors</h2>
                            <div class="block-sub-header">Use predefined advisor screeners.</div>
                            <a class="button button_blue" href="{{route('roboAdvisors')}}">More Robo-Advisors</a>
                        </div>
                        <div class="rightSide">
                            <div class="robo-advisors__list js-ra-list">
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
                                <div class="robo-advisors__list-body">
                                    @foreach($roboAdvisors as $roboAdvisor)
                                        @include('components/roboAdvisorsItem', [
                                            'roboAdvisor' => $roboAdvisor,
                                            'compareList' => getCompareList('compare_list'),
                                        ])
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="thirdSection">
                <div class="container">
                    <div class="statistic">
                        <div class="statistic__left-side">
                            <div class="statistic__block">
                                <div class="statistic__item">
                                    <div class="statistic__money">$ 1452 Bln</div>
                                    <div class="statistic__year">2022</div>
                                    <div class="statistic__image"><img src="{{ asset('images/statista.png') }}" alt="statistic" /></div>
                                    <div class="statistic__note">*Forecast</div>
                                </div>
                                <div class="statistic__item">
                                    <div class="statistic__money">$ 604 Bln</div>
                                    <div class="statistic__year">2019</div>
                                    <div class="statistic__image"><img src="{{ asset('images/statista.png') }}" alt="statistic" /></div>
                                    <div class="statistic__note">*Forecast</div>
                                </div>
                                <div class="statistic__item">
                                    <div class="statistic__money">$ 397 Bln</div>
                                    <div class="statistic__year">2018</div>
                                </div>
                                <div class="statistic__item">
                                    <div class="statistic__money">$ 244 Bln</div>
                                    <div class="statistic__year">2017</div>
                                </div>
                            </div>
                        </div>
                        <div class="statistic__right-side">
                            <h2 class="block-header">Assets Managed by&nbsp;Robo-Advisors</h2>
                            <div class="block-sub-header font-size24">Beginning of <br>robo-advising tsunami</div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="fourthSection">
                <div class="container">
                    <h2 class="block-header text-center">What is a Robo-Advisor?</h2>
                    <div class="robo-informer">
                        <div class="robo-informer__container">
                            <div class="robo-informer__row">
                                Robo-advisor is an online wealth management service that automatically optimizes investment portfolio and taxes.
                            </div>
                            <div class="robo-informer__row">
                                These online services make it easier to get started toward your financial goals by providing investment help at low cost and with low or no account minimums.
                            </div>
                            <div class="robo-informer__row">
                                Robo-advisors ask the customer a few questions based on what risks they are willing to take and then distribute the money appropriately based on algorithms.
                            </div>
                            <div class="robo-informer__block robo-informer__block-first">
                                Passive investing<br> on autopilot
                            </div>
                            <div class="robo-informer__block robo-informer__block-second">
                                Simple honest<br> pricing
                            </div>
                            <div class="robo-informer__block robo-informer__block-third">
                                Nobel Prize-Winning<br> Algorithms
                            </div>
                            <div class="robo-informer__block robo-informer__block-fourth">
                                Personalized<br> portfolio
                            </div>
                            <div class="robo-informer__block robo-informer__block-fifth">
                                Safe for your<br> money
                            </div>
                            <div class="robo-informer__block robo-informer__block-sixth">
                                Your eggs in lots of<br> different baskets
                            </div>
                            {{--<div class="robo-informer__references">--}}
                                {{--<a href="#">References</a>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <section class="fifthSection">
            <div class="container">
                <div class="why-use">
                    <div class="why-use__block">
                        <div class="why-use__item">
                            <h2 class="block-header">Why use us</h2>
                        </div>
                    </div>
                    <div class="why-use__block">
                        <div class="why-use__item">
                            <img class="why-use__icon" src="{{ asset('images/icon1.png') }}" alt="" />
                            <div class="why-use__text">Best robo-advisors on one site</div>
                        </div>
                    </div>
                    <div class="why-use__block">
                        <div class="why-use__item">
                            <img class="why-use__icon" src="{{ asset('images/icon2.png') }}" alt="" />
                            <div class="why-use__text">Instant and free online support</div>
                        </div>
                    </div>
                    <div class="why-use__block">
                        <div class="why-use__item">
                            <img class="why-use__icon" src="{{ asset('images/icon3.png') }}" alt="" />
                            <div class="why-use__text">Favorable conditions for cooperation with robo-advisors and wealth managers</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @include('_mobile.layouts.footer')
@endsection
