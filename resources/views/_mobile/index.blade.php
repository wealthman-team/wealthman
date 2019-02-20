@extends('_mobile._layouts.app')

@section('content')
    @include('_mobile._layouts.header')

    <div class="content">
        <div class="container">
            <div class="main">
                <section class="first-section">
                    <div class="first-section__container" >
                        <h1 class="page-header">Select the&nbsp;best&nbsp;suited robo-advisor</h1>
                        <h2 class="page-sub-header">Use our sophisticated Advisor screener to select robo-advisor independently or consult our free competent support.</h2>
                        <a class="button button_blue" href="{{route('roboAdvisors')}}">Start Search</a>
                    </div>
                    <div class="first-section__bg">&nbsp;</div>
                </section>

                <section class="second-section">
                    <div class="b-padd">
                        <h2 class="block-header">TOP 5 <br>Robo-advisors</h2>
                        <div class="block-sub-header">Use predefined advisor screeners.</div>
                        <a class="second-section__button" href="{{route('roboAdvisors')}}">More Robo-Advisors</a>
                    </div>
                    <div class="section-section__content">

                    </div>
                </section>
                <section class="third-section">
                    <div class="b-padd">
                        <h2 class="block-header">Assets Managed by&nbsp;Robo-Advisors</h2>
                        <div class="block-sub-header-big">Beginning of robo-advising tsunami</div>
                    </div>
                    <div class="third-section__content">
                        <div class="statistic">
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
                </section>

                <section class="fourth-section">
                    <div class="b-padd">
                        <h2 class="block-header text-center">What is<br> a Robo-Advisor?</h2>
                    </div>
                    <div class="section-section__content">
                        <div class="robo-informer">
                            <div class="robo-informer__block-container">
                                <div class="robo-informer__block-row">
                                    <div class="robo-informer__block robo-informer__block-first">
                                        Passive investing<br> on autopilot
                                    </div>
                                </div>
                                <div class="robo-informer__block-row">
                                    <div class="robo-informer__block robo-informer__block-second">
                                        Simple honest<br> pricing
                                    </div>
                                </div>
                                <div class="robo-informer__block-row">
                                    <div class="robo-informer__block robo-informer__block-third">
                                        Nobel Prize-Winning<br> Algorithms
                                    </div>
                                </div>
                                <div class="robo-informer__block-row">
                                    <div class="robo-informer__block robo-informer__block-fourth">
                                        Personalized<br> portfolio
                                    </div>
                                </div>
                                <div class="robo-informer__block-row">
                                    <div class="robo-informer__block robo-informer__block-fifth">
                                        Safe for your<br> money
                                    </div>
                                </div>
                                <div class="robo-informer__block-row">
                                    <div class="robo-informer__block robo-informer__block-sixth">
                                        Your eggs in lots of<br> different baskets
                                    </div>
                                </div>
                            </div>
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
                            </div>
                        </div>
                    </div>
                </section>
                <section class="fifth-section">
                    <div class="fifth-section__content">
                        <div class="why-use">
                            <div class="why-use__block">
                                <div class="why-use__item">
                                    <div class="b-padd">
                                        <h2 class="block-header text-center">Why use us</h2>
                                    </div>
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
        </div>
    </div>
    @include('_mobile._layouts.footer')
@endsection
