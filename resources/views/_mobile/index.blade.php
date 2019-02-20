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
                    <div class="section-second__content">

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
            </div>
        </div>
    </div>
    @include('_mobile._layouts.footer')
@endsection
