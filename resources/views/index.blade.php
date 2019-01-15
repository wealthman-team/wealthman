@extends('layouts.app')

@section('content')
    @include('layouts/header')

    <div class="content content__pd-bot">
        <section class="firstSection">
            <div class="container">
                <div class="firstSection__container" >
                    <h1 class="page-header">Select the best suited robo-advisor</h1>
                    <h2 class="page-sub-header">Wealthman screener’ll find your best robo-advisor independently and individually for you.</h2>
                    <a class="button button_blue" href="{{route('roboAdvisors')}}">Start Search</a>
                </div>
            </div>
        </section>
        <div class="container">
            <div class="secondSection">
                <div class="robo-advisors__container">
                    <div class="tableContainerRow">
                        <div class="leftSide">
                            <h2 class="section-header">TOP 5 <br>Robo-advisors</h2>
                            <div class="section-sub-header">Wealthfront uses a team of “world-class financial experts” led by legendary economist Burton Malkiel.</div>
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
            </div>
        </div>
    </div>

    @include('layouts/footer')
@endsection
