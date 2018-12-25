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
                </div>
            </div>
        </div>
    </div>

    @include('layouts/footer')
@endsection