@extends('layouts.app')

@section('content')
    @include('layouts/header')

    <div class="content">
        <div class="robo-advisor">
            @include('components/breadcrumbs', [
                'breadcrumbs' => [[
                    'name' => 'Home',
                    'link' => route('home'),
                ],[
                    'name' => 'Robo Advisors',
                    'link' => route('roboAdvisors'),
                ],[
                    'name' => $roboAdvisor->name,
                ]]
            ])

            <div class="container">
                <h1 class="page-header">
                    {{ $roboAdvisor->name }}
                </h1>
                <div class="page-sub-header">
                    {{ $roboAdvisor->title }}
                </div>

                <div class="robo-advisors__container">
                    <div class="sidebar">
                        <div class="slide-box active js-slide-box">
                            <div class="slide-box__header js-slide-box-header">
                                <div class="slide-box__title">
                                    Contact
                                </div>
                                <div class="slide-box__arrow">
                                    @svg('arrow-up', 'slide-box__arrow-up')
                                </div>
                            </div>
                            <div class="slide-box__body js-slide-box-body">
                                <div class="robo-advisor__contact robo-advisor__contact_margin">
                                    Service region: <strong>USA</strong>
                                </div>
                                <div class="robo-advisor__contact">
                                    Headquarters: <strong>{{ $roboAdvisor->headquarters }}</strong>
                                </div>
                                <div class="robo-advisor__contact">
                                    Year Founded: <strong>{{ $roboAdvisor->founded }}</strong>
                                </div>
                                <div class="robo-advisor__contact">
                                    Site: <strong>{{ $roboAdvisor->site_url }}</strong>
                                </div>
                                <div class="robo-advisor__contact">
                                    Phone: <strong>{{ $roboAdvisor->phone }}</strong>
                                </div>
                                <div class="robo-advisor__contact">
                                    CEO: <strong>{{ $roboAdvisor->ceo }}</strong>
                                </div>
                                <div class="robo-advisor__contact">
                                    More data: <strong>{{ $roboAdvisor->contact_details }}</strong>
                                </div>
                                <div class="robo-advisor__contact">
                                    CRD: <strong>148456 | SEC</strong>
                                </div>
                                <div class="robo-advisor__contact">
                                    ID: <strong>69766</strong>
                                </div>
                            </div>
                        </div>

                        <div class="slide-box active js-slide-box">
                            <div class="slide-box__header js-slide-box-header">
                                <div class="slide-box__title">
                                    Table of contents
                                </div>
                                <div class="slide-box__arrow">
                                    @svg('arrow-up', 'slide-box__arrow-up')
                                </div>
                            </div>
                            <div class="slide-box__body js-slide-box-body">
                                <ul class="robo-advisor__contents-list">
                                    <li>
                                        <a class="link" href="#">Pros and Cons</a>
                                    </li>
                                    <li>
                                        <a class="link" href="#">About Company</a>
                                    </li>
                                    <li>
                                        <a class="link" href="#">All Characteristics</a>
                                    </li>
                                    <li>
                                        <a class="link" href="#">How it Works?</a>
                                    </li>
                                    <li>
                                        <a class="link" href="#">Portfolio</a>
                                    </li>
                                    <li>
                                        <a class="link" href="#">Alternatives</a>
                                    </li>
                                    <li>
                                        <a class="link" href="#">Conclusion</a>
                                    </li>
                                    <li>
                                        <a class="link" href="#">
                                            Reviews <span class="counter">5</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="slide-box active js-slide-box">
                            <div class="slide-box__header js-slide-box-header">
                                <div class="slide-box__title">
                                    Robo advisor review
                                </div>
                                <div class="slide-box__arrow">
                                    @svg('arrow-up', 'slide-box__arrow-up')
                                </div>
                            </div>
                            <div class="slide-box__body js-slide-box-body">
                                <div class="robo-advisor__review">
                                    <div class="robo-advisor__review-name">
                                        Betterment
                                        @svg('check', 'robo-advisor__review-check')
                                    </div>

                                    <div class="robo-advisor__review-recommendation">
                                        @include('components/recommendation', [
                                            'text' => 'Strongly recommended',
                                            'yes' => 10,
                                            'maybe' => 2,
                                            'no' => 5,
                                            'total' => 17,
                                        ])
                                    </div>

                                    <div class="robo-advisor__review-link">
                                        <a class="link link_active" href="#">
                                            Review
                                        </a>
                                    </div>
                                </div>

                                <div class="robo-advisor__review">
                                    <div class="robo-advisor__review-name">
                                        Betterment
                                        @svg('check', 'robo-advisor__review-check')
                                    </div>

                                    <div class="robo-advisor__review-recommendation">
                                        @include('components/recommendation', [
                                            'text' => 'Strongly recommended',
                                            'yes' => 10,
                                            'maybe' => 2,
                                            'no' => 5,
                                            'total' => 17,
                                        ])
                                    </div>

                                    <div class="robo-advisor__review-link">
                                        <a class="link link_active" href="#">
                                            Review
                                        </a>
                                    </div>
                                </div>

                                <div class="robo-advisor__review">
                                    <div class="robo-advisor__review-name">
                                        Betterment
                                        @svg('check', 'robo-advisor__review-check')
                                    </div>

                                    <div class="robo-advisor__review-recommendation">
                                        @include('components/recommendation', [
                                            'text' => 'Strongly recommended',
                                            'yes' => 10,
                                            'maybe' => 2,
                                            'no' => 5,
                                            'total' => 17,
                                        ])
                                    </div>

                                    <div class="robo-advisor__review-link">
                                        <a class="link link_active" href="#">
                                            Review
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="main-content">

                        <div class="panel">
                            <div class="robo-advisor__top-info">
                                <div class="robo-advisor__row robo-advisor__row_center">
                                    <div class="robo-advisor__logo">
                                        @if ($roboAdvisor->logo)
                                            <img src="{{ asset('storage/' . $roboAdvisor->logo) }}" />
                                        @endif
                                    </div>

                                    <div class="robo-advisor__recommendation">
                                        @include('components/recommendation', [
                                            'text' => 'Mostly not recommended',
                                            'yes' => 1,
                                            'maybe' => 2,
                                            'no' => 3,
                                            'total' => 6,
                                            'isOpen' => true,
                                        ])
                                    </div>

                                    <div class="robo-advisor__top-buttons">
                                        <a class="button" href="#">Compare</a>
                                        <a class="button button_success" href="{{ $roboAdvisor->referral_link }}">Sign Up</a>
                                    </div>
                                </div>

                                <div class="robo-advisor__row">
                                    <div class="robo-advisor__ratings">
                                        <div class="robo-advisor__rating-item robo-advisor__rating-item_margin">
                                            <div class="robo-advisor__rating-name">
                                                Rating
                                            </div>
                                            <div class="robo-advisor__rating-value">
                                                {{ $roboAdvisor->rating->total }}
                                            </div>
                                        </div>
                                        <div class="robo-advisor__rating-item">
                                            <div class="robo-advisor__rating-name">
                                                Commission & Fees
                                            </div>
                                            <div class="robo-advisor__rating-value">
                                                {{ $roboAdvisor->rating->commissions }}
                                            </div>
                                        </div>
                                        <div class="robo-advisor__rating-item">
                                            <div class="robo-advisor__rating-name">
                                                Customer Service
                                            </div>
                                            <div class="robo-advisor__rating-value">
                                                {{ $roboAdvisor->rating->service }}
                                            </div>
                                        </div>
                                        <div class="robo-advisor__rating-item">
                                            <div class="robo-advisor__rating-name">
                                                Ease of Use
                                            </div>
                                            <div class="robo-advisor__rating-value">
                                                {{ $roboAdvisor->rating->comfortable }}
                                            </div>
                                        </div>
                                        <div class="robo-advisor__rating-item">
                                            <div class="robo-advisor__rating-name">
                                                Tools & Resources
                                            </div>
                                            <div class="robo-advisor__rating-value">
                                                {{ $roboAdvisor->rating->tools }}
                                            </div>
                                        </div>
                                        <div class="robo-advisor__rating-item">
                                            <div class="robo-advisor__rating-name">
                                                Investment Options
                                            </div>
                                            <div class="robo-advisor__rating-value">
                                                {{ $roboAdvisor->rating->investment_options }}
                                            </div>
                                        </div>
                                        <div class="robo-advisor__rating-item">
                                            <div class="robo-advisor__rating-name">
                                                Asset Allocation
                                            </div>
                                            <div class="robo-advisor__rating-value">
                                                {{ $roboAdvisor->rating->asset_allocation }}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="robo-advisor__best-for">
                                        <div class="robo-advisor__top-title">
                                            Best for:
                                        </div>
                                        <ul class="robo-advisor__best-for-list">
                                            <li>Beginning investors</li>
                                            <li>Intermediate investors</li>
                                            <li>Young investors</li>
                                            <li>Smartphone users</li>
                                            <li>IRA investors</li>
                                            <li>Goal-oriented investors</li>
                                        </ul>
                                    </div>

                                    <div class="robo-advisor__description">
                                        <div class="robo-advisor__top-title">
                                            Short description:
                                        </div>
                                        <div class="">
                                            {!! $roboAdvisor->short_description !!}
                                        </div>
                                    </div>
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