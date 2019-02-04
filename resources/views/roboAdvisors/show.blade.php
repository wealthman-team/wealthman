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
                        <div class="sidebar__inner">
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
                                        Service region:
                                        <strong>
                                            @if ($roboAdvisor->service_region)
                                                {{ $roboAdvisor->service_region }}
                                            @else
                                                &mdash;
                                            @endif
                                        </strong>
                                    </div>
                                    <div class="robo-advisor__contact">
                                        Headquarters:
                                        <strong>
                                            @if ($roboAdvisor->headquarters)
                                                {{ $roboAdvisor->headquarters }}
                                            @else
                                                &mdash;
                                            @endif
                                        </strong>
                                    </div>
                                    <div class="robo-advisor__contact">
                                        Year Founded:
                                        <strong>
                                            @if ($roboAdvisor->founded)
                                                {{ $roboAdvisor->founded }}
                                            @else
                                                &mdash;
                                            @endif
                                        </strong>
                                    </div>
                                    {{--<div class="robo-advisor__contact">--}}
                                        {{--Site:--}}
                                        {{--<strong>--}}
                                            {{--@if ($roboAdvisor->site_url)--}}
                                                {{--{{ $roboAdvisor->site_url }}--}}
                                            {{--@else--}}
                                                {{--&mdash;--}}
                                            {{--@endif--}}
                                        {{--</strong>--}}
                                    {{--</div>--}}
                                    <div class="robo-advisor__contact">
                                        Phone:
                                        <strong>
                                            @if ($roboAdvisor->phone)
                                                {{ $roboAdvisor->phone }}
                                            @else
                                                &mdash;
                                            @endif
                                        </strong>
                                    </div>
                                    <div class="robo-advisor__contact">
                                        CEO:
                                        <strong>
                                            @if ($roboAdvisor->ceo)
                                                {{ $roboAdvisor->ceo }}
                                            @else
                                                &mdash;
                                            @endif
                                        </strong>
                                    </div>
                                    <div class="robo-advisor__contact">
                                        More data:
                                        <strong>
                                            @if ($roboAdvisor->contact_details)
                                                {{ $roboAdvisor->contact_details }}
                                            @else
                                                &mdash;
                                            @endif
                                        </strong>
                                    </div>
                                    <div class="robo-advisor__contact">
                                        CRD:
                                        <strong>
                                            @if ($roboAdvisor->finra_crd)
                                                {{ $roboAdvisor->finra_crd }}
                                            @else
                                                &mdash;
                                            @endif
                                        </strong>
                                    </div>
                                    <div class="robo-advisor__contact">
                                        ID:
                                        <strong>
                                            @if ($roboAdvisor->sec_id)
                                                {{ $roboAdvisor->sec_id }}
                                            @else
                                                &mdash;
                                            @endif
                                        </strong>
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
                                            <a class="link" href="#all_characteristics_section">
                                                All Characteristics
                                            </a>
                                        </li>
                                        @if($roboAdvisor->about_company)
                                            <li>
                                                <a class="link" href="#about_company_section">About Company</a>
                                            </li>
                                        @endif
                                        @if($roboAdvisor->pros || $roboAdvisor->cons)
                                        <li>
                                            <a class="link" href="#pros_and_cons_section">Pros and Cons</a>
                                        </li>
                                        @endif

                                        @if($roboAdvisor->how_it_works)
                                        <li>
                                            <a class="link" href="#how_it_works_section">How it Works?</a>
                                        </li>
                                        @endif
                                        @if($roboAdvisor->portfolio)
                                        <li>
                                            <a class="link" href="#portfolio_section">Portfolio</a>
                                        </li>
                                        @endif
                                        {{--<li>--}}
                                            {{--<a class="link" href="#">Alternatives</a>--}}
                                        {{--</li>--}}
                                        @if($roboAdvisor->conclusion)
                                        <li>
                                            <a class="link" href="#conclusion_section">Conclusion</a>
                                        </li>
                                        @endif
                                        @if(count($roboAdvisor->reviews) > 0)
                                        <li>
                                            <a class="link" href="#reviews_section">
                                                Reviews <span class="counter">{{count($roboAdvisor->reviews)}}</span>
                                            </a>
                                        </li>
                                        @endif
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
                                    @foreach($popularRoboAdvisors as $popularRoboAdvisor)
                                        <div class="robo-advisor__review">
                                            <div class="robo-advisor__review-name">
                                                {{ $popularRoboAdvisor->name }}
                                                @if($popularRoboAdvisor->is_verify)
                                                    <span class="robo-advisor__verify">
                                                        @svg('verify')
                                                    </span>
                                                @endif
                                            </div>

                                            <div class="robo-advisor__review-recommendation">
                                            @include('components/recommendation', [
                                                'reviews' => $popularRoboAdvisor->reviews
                                            ])
                                            </div>

                                            <div class="robo-advisor__review-link">
                                                <a class="link link_active" href="{{ route('roboAdvisorsShow', $popularRoboAdvisor->slug) }}">
                                                    Review
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="sidebar__footer sidebar__footer_center">
                            <a class="button button_success" href="{{ redirectLink($roboAdvisor->referral_link) }}" target="_blank">Sign Up</a>
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
                                        @if($roboAdvisor->is_verify)
                                            <span class="robo-advisor__verify robo-advisor__verify_margin">
                                                @svg('verify')
                                            </span>
                                        @endif
                                    </div>

                                    <div class="robo-advisor__recommendation">
                                        @include('components/recommendation', [
                                            'reviews' => $roboAdvisor->reviews,
                                            'isOpen' => true
                                        ])
                                    </div>

                                    <div class="robo-advisor__top-buttons">
                                        {{--<a class="button" href="#">Compare</a>--}}
                                        <form class="robo-advisors-item__compare-form js-add-to-compare {{ in_array($roboAdvisor->id, getCompareList('compare_list')) ? ' active' : '' }}" action="{{ route('toggleCompare') }}" method="post">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="id" value="{{ $roboAdvisor->id }}">
                                            <button class="button" type="submit">Compare</button>
                                        </form>
                                        <a class="button button_success" href="{{ redirectLink($roboAdvisor->referral_link) }}" target="_blank">Sign Up</a>
                                    </div>
                                </div>

                                <div class="robo-advisor__row">
                                    <div class="robo-advisor__ratings">
                                        <div class="robo-advisor__rating-item robo-advisor__rating-item_margin">
                                            <div class="robo-advisor__rating-name">
                                                Rating
                                            </div>
                                            <div class="robo-advisor__rating-value">
                                                {{ $roboAdvisor->ratings->total }}
                                            </div>
                                        </div>
                                        <div class="robo-advisor__rating-item">
                                            <div class="robo-advisor__rating-name">
                                                Commission & Fees
                                            </div>
                                            <div class="robo-advisor__rating-value">
                                                {{ $roboAdvisor->ratings->commissions }}
                                            </div>
                                        </div>
                                        <div class="robo-advisor__rating-item">
                                            <div class="robo-advisor__rating-name">
                                                Customer Service
                                            </div>
                                            <div class="robo-advisor__rating-value">
                                                {{ $roboAdvisor->ratings->service }}
                                            </div>
                                        </div>
                                        <div class="robo-advisor__rating-item">
                                            <div class="robo-advisor__rating-name">
                                                Ease of Use
                                            </div>
                                            <div class="robo-advisor__rating-value">
                                                {{ $roboAdvisor->ratings->comfortable }}
                                            </div>
                                        </div>
                                        <div class="robo-advisor__rating-item">
                                            <div class="robo-advisor__rating-name">
                                                Tools & Resources
                                            </div>
                                            <div class="robo-advisor__rating-value">
                                                {{ $roboAdvisor->ratings->tools }}
                                            </div>
                                        </div>
                                        <div class="robo-advisor__rating-item">
                                            <div class="robo-advisor__rating-name">
                                                Investment Options
                                            </div>
                                            <div class="robo-advisor__rating-value">
                                                {{ $roboAdvisor->ratings->investment_options }}
                                            </div>
                                        </div>
                                        <div class="robo-advisor__rating-item">
                                            <div class="robo-advisor__rating-name">
                                                Asset Allocation
                                            </div>
                                            <div class="robo-advisor__rating-value">
                                                {{ $roboAdvisor->ratings->asset_allocation }}
                                            </div>
                                        </div>
                                    </div>
                                    @if($roboAdvisor->usage_types)
                                    <div class="robo-advisor__best-for">
                                        <div class="robo-advisor__top-title">
                                            Suitable for:
                                        </div>
                                        <ul class="robo-advisor__best-for-list">
                                            @foreach($roboAdvisor->usage_types as $usageType)
                                                <li>{{$usageType->name}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
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

                        <div class="robo-advisor__section">
                            @include('components/compareBanner')
                        </div>

                        <div id="all_characteristics_section" class="robo-advisor__section">
                            <h2 class="h2">
                                All characteristics
                            </h2>
                            <div class="panel">
                                <div class="robo-advisor__row robo-advisor__row_small-padding">
                                    <div class="robo-advisor__col">

                                        <div class="slide-box active js-slide-box">
                                            <div class="slide-box__header js-slide-box-header">
                                                <div class="slide-box__title">
                                                    GENERAL CHARACTERISTICS
                                                </div>
                                                <div class="slide-box__arrow">
                                                    @svg('arrow-up', 'slide-box__arrow-up')
                                                </div>
                                            </div>
                                            <div class="slide-box__body js-slide-box-body">
                                                <table class="robo-advisor__characteristics-table">
                                                    <tbody>
                                                        <tr>
                                                            <th>MINIMUM ACCOUNT</th>
                                                            <td>
                                                                @if ($roboAdvisor->minimum_account || $roboAdvisor->minimum_account == 0)
                                                                    ${{ $roboAdvisor->minimum_account }}
                                                                @else
                                                                    &mdash;
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Management fee</th>
                                                            <td>
                                                                @if ($roboAdvisor->management_fee || $roboAdvisor->management_fee === 0.00)
                                                                    {{ $roboAdvisor->management_fee }}%/year
                                                                @else
                                                                    &mdash;
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                ADDITIONAL INFORMATION
                                                                ABOUT MANAGEMENT FEE
                                                            </th>
                                                            <td>
                                                                @if ($roboAdvisor->fee_details)
                                                                    {{ $roboAdvisor->fee_details }}
                                                                @else
                                                                    &mdash;
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>ASSETS UNDER MANAGEMENT</th>
                                                            <td>
                                                                @if ($roboAdvisor->aum)
                                                                    > ${{ getAUMNum($roboAdvisor->aum) }}
                                                                @else
                                                                    &mdash;
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>NUMBER OF USERS</th>
                                                            <td>
                                                                @if ($roboAdvisor->number_accounts)
                                                                    > {{ $roboAdvisor->number_accounts }}
                                                                @else
                                                                    &mdash;
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>AVERAGE ACCOUNT SIZE</th>
                                                            <td>
                                                                @if ($roboAdvisor->average_account_size)
                                                                    ${{ $roboAdvisor->average_account_size }}
                                                                @else
                                                                    &mdash;
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>YEAR FOUNDED</th>
                                                            <td>
                                                                @if ($roboAdvisor->founded)
                                                                    {{ $roboAdvisor->founded }}
                                                                @else
                                                                    &mdash;
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>PROMOTIONS</th>
                                                            <td>
                                                                @if ($roboAdvisor->promotions)
                                                                    {{ $roboAdvisor->promotions }}
                                                                @else
                                                                    &mdash;
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="slide-box js-slide-box">
                                            <div class="slide-box__header js-slide-box-header">
                                                <div class="slide-box__title">
                                                    SERVICES
                                                </div>
                                                <div class="slide-box__arrow">
                                                    @svg('arrow-up', 'slide-box__arrow-up')
                                                </div>
                                            </div>
                                            <div class="slide-box__body js-slide-box-body">
                                                <table class="robo-advisor__characteristics-table">
                                                    <tbody>
                                                    <tr>
                                                        <th>HUMAN ADVISORS</th>
                                                        <td>
                                                            @if ($roboAdvisor->human_advisors)
                                                                @svg('check', 'robo-advisor__check')
                                                            @else
                                                                &mdash;
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            ADDITIONAL INFORMATION
                                                            ABOUT HUMAN ADVISORS
                                                        </th>
                                                        <td>
                                                            @if ($roboAdvisor->human_advisors_details)
                                                                {{ $roboAdvisor->human_advisors_details }}
                                                            @else
                                                                &mdash;
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>PORTFOLIO REBALANCING</th>
                                                        <td>
                                                            @if ($roboAdvisor->portfolio_rebalancing)
                                                                @svg('check', 'robo-advisor__check')
                                                            @else
                                                                &mdash;
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>AUTOMATIC DEPOSITS</th>
                                                        <td>
                                                            @if ($roboAdvisor->automatic_deposits)
                                                                @svg('check', 'robo-advisor__check')
                                                            @else
                                                                &mdash;
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Access platforms</th>
                                                        <td>
                                                            @if ($roboAdvisor->access_platforms)
                                                                {{ $roboAdvisor->access_platforms }}
                                                            @else
                                                                &mdash;
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            TWO-FACTOR
                                                            AUTHENTICATION
                                                        </th>
                                                        <td>
                                                            @if ($roboAdvisor->two_factor_auth)
                                                                @svg('check', 'robo-advisor__check')
                                                            @else
                                                                &mdash;
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>CUSTOMER SERVICE</th>
                                                        <td>
                                                            @if ($roboAdvisor->customer_service)
                                                                {{ $roboAdvisor->customer_service }}
                                                            @else
                                                                &mdash;
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>CLEARING AGENCY</th>
                                                        <td>
                                                            @if ($roboAdvisor->clearing_agency)
                                                                {{ $roboAdvisor->clearing_agency }}
                                                            @else
                                                                &mdash;
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="slide-box js-slide-box">
                                            <div class="slide-box__header js-slide-box-header">
                                                <div class="slide-box__title">
                                                    ADDITIONAL INFORMATION
                                                </div>
                                                <div class="slide-box__arrow">
                                                    @svg('arrow-up', 'slide-box__arrow-up')
                                                </div>
                                            </div>
                                            <div class="slide-box__body js-slide-box-body">
                                                <table class="robo-advisor__characteristics-table">
                                                    <tbody>
                                                    @if ($roboAdvisor->additional_information)
                                                        <tr>
                                                            <th>INFORMATION</th>
                                                            <td>{!! $roboAdvisor->additional_information !!}</td>
                                                        </tr>
                                                    @else
                                                        <tr>
                                                            <th>NO INFORMATION</th>
                                                            <td>&mdash;</td>
                                                        </tr>
                                                    @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="robo-advisor__col">

                                        <div class="slide-box active js-slide-box">
                                            <div class="slide-box__header js-slide-box-header">
                                                <div class="slide-box__title">
                                                    ACCOUNT AVAILABLE
                                                </div>
                                                <div class="slide-box__arrow">
                                                    @svg('arrow-up', 'slide-box__arrow-up')
                                                </div>
                                            </div>
                                            <div class="slide-box__body js-slide-box-body">
                                                <table class="robo-advisor__simple-table">
                                                    <tbody>
                                                    <tr>
                                                        @foreach($accountTypes as $accountType)
                                                            @if ($loop->index % 3 === 0)
                                                                </tr>
                                                                <tr>
                                                            @endif
                                                                <td class="{{ in_array($accountType->id, $roboAdvisor->account_types_ids) ? '' : 'inactive' }}">
                                                                    {{ $accountType->name }}
                                                                </td>
                                                        @endforeach
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="slide-box js-slide-box">
                                            <div class="slide-box__header js-slide-box-header">
                                                <div class="slide-box__title">
                                                    FEATURES
                                                </div>
                                                <div class="slide-box__arrow">
                                                    @svg('arrow-up', 'slide-box__arrow-up')
                                                </div>
                                            </div>
                                            <div class="slide-box__body js-slide-box-body">
                                                <table class="robo-advisor__characteristics-table">
                                                    <tbody>
                                                    <tr>
                                                        <th>FRACTIONAL SHARES</th>
                                                        <td>
                                                            @if ($roboAdvisor->fractional_shares)
                                                                @svg('check', 'robo-advisor__check')
                                                            @else
                                                                &mdash;
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>401(K) GUIDANCE</th>
                                                        <td>
                                                            @if ($roboAdvisor->assistance_401k)
                                                                @svg('check', 'robo-advisor__check')
                                                            @else
                                                                &mdash;
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>TAX LOSS HARVESTING</th>
                                                        <td>
                                                            @if ($roboAdvisor->tax_loss)
                                                                @svg('check', 'robo-advisor__check')
                                                            @else
                                                                &mdash;
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            ADDITIONAL INFORMATION
                                                            ABOUT TAX LOSS
                                                            HARVESTING
                                                        </th>
                                                        <td>
                                                            @if ($roboAdvisor->tax_loss_details)
                                                                {{ $roboAdvisor->tax_loss_details }}
                                                            @else
                                                                &mdash;
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>RETIREMENT PLANNING TOOLS</th>
                                                        <td>
                                                            @if ($roboAdvisor->retirement_planning)
                                                                @svg('check', 'robo-advisor__check')
                                                            @else
                                                                &mdash;
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>SELF CLEARING</th>
                                                        <td>
                                                            @if ($roboAdvisor->self_clearing)
                                                                @svg('check', 'robo-advisor__check')
                                                            @else
                                                                &mdash;
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>SMART BETA</th>
                                                        <td>
                                                            @if ($roboAdvisor->smart_beta)
                                                                @svg('check', 'robo-advisor__check')
                                                            @else
                                                                &mdash;
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>SOCIALLY RESPONSIBLE INVESTING</th>
                                                        <td>
                                                            @if ($roboAdvisor->responsible_investing)
                                                                @svg('check', 'robo-advisor__check')
                                                            @else
                                                                &mdash;
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>INVESTS IN COMMODITIES</th>
                                                        <td>
                                                            @if ($roboAdvisor->invests_commodities)
                                                                @svg('check', 'robo-advisor__check')
                                                            @else
                                                                &mdash;
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>INVESTS IN REAL ESTATE</th>
                                                        <td>
                                                            @if ($roboAdvisor->real_estate)
                                                                @svg('check', 'robo-advisor__check')
                                                            @else
                                                                &mdash;
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="slide-box js-slide-box">
                                            <div class="slide-box__header js-slide-box-header">
                                                <div class="slide-box__title">
                                                    SUMMARY
                                                </div>
                                                <div class="slide-box__arrow">
                                                    @svg('arrow-up', 'slide-box__arrow-up')
                                                </div>
                                            </div>
                                            <div class="slide-box__body js-slide-box-body">
                                                <table class="robo-advisor__characteristics-table">
                                                    <tbody>
                                                    @if ($roboAdvisor->summary)
                                                        <tr>
                                                            <th>SUMMARY</th>
                                                            <td>{!! $roboAdvisor->summary !!}</td>
                                                        </tr>
                                                    @else
                                                        <tr>
                                                            <th>NO SUMMARY</th>
                                                            <td>&mdash;</td>
                                                        </tr>
                                                    @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        @if($roboAdvisor->video_link)
                            <div class="robo-advisor__section">
                                <div class="panel">
                                    <div class="robo-advisor__section-video">
                                        <div class="reach-text">
                                            <div class="robo-advisor__video-wrapper">
                                                <div class="robo-advisor__information">
                                                    @if($roboAdvisor->video_information)
                                                        {!! $roboAdvisor->video_information !!}
                                                    @endif
                                                </div>
                                                <div class="robo-advisor__video">
                                                    <div class="robo-advisor__video-container">
                                                        <iframe src="{!! $roboAdvisor->video_link !!}" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if($roboAdvisor->about_company)
                            <div id="about_company_section" class="robo-advisor__section">
                                <h2 class="h2">
                                    About company
                                </h2>
                                <div class="panel">
                                    <div class="robo-advisor__section-text">
                                        <div class="reach-text">
                                            {!! $roboAdvisor->about_company !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="robo-advisor__section-footer">
                                    <a class="button button_success" href="{{ redirectLink($roboAdvisor->referral_link) }}" target="_blank">Sign Up</a>
                                </div>
                            </div>
                        @endif

                        @if($roboAdvisor->pros || $roboAdvisor->cons)
                            <div id="pros_and_cons_section" class="robo-advisor__section">
                                <h2 class="h2">
                                    PROS AND CONS
                                </h2>
                                <div class="panel panel_padding">
                                    @if($roboAdvisor->pros)
                                        <div class="panel panel_grad-green panel_margin">
                                            <div class="robo-advisor__section-text">
                                                <div class="reach-text">
                                                    <h3>
                                                        Pros
                                                        <span class="robo-advisor__section-icon"><svg class="icon" xmlns="http://www.w3.org/2000/svg" width="15.5" height="15.5" viewBox="0 0 15.5 15.5"><g transform="translate(-114.247 -3894.324)"><line x2="14" transform="translate(114.997 3902.074)" stroke-width="1.5" stroke="#30bf90" stroke-linecap="round" stroke-linejoin="round" fill="none"></line><line y2="14" transform="translate(121.997 3895.074)" stroke-width="1.5" stroke="#30bf90" stroke-linecap="round" stroke-linejoin="round" fill="none"></line></g></svg></span>
                                                    </h3>
                                                    {!! $roboAdvisor->pros !!}
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if($roboAdvisor->cons)
                                        <div class="panel panel_grad-red">
                                            <div class="robo-advisor__section-text">
                                                <div class="reach-text">
                                                    <h3>
                                                        Cons
                                                        <span class="robo-advisor__section-icon"><svg class="icon" xmlns="http://www.w3.org/2000/svg" width="16.4" height="2.4" viewBox="0 0 16.4 2.4"><line x2="14" transform="translate(1.2 1.2)" stroke-width="2.4" stroke="#ce1348" stroke-linecap="round" stroke-linejoin="round" fill="none"></line></svg></span>
                                                    </h3>
                                                    {!! $roboAdvisor->cons !!}
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endif

                        @if($roboAdvisor->how_it_works)
                            <div id="how_it_works_section" class="robo-advisor__section">
                                <h2 class="h2">
                                    How it works?
                                </h2>
                                <div class="panel">
                                    <div class="robo-advisor__section-text">
                                        <div class="reach-text">
                                            {!! $roboAdvisor->how_it_works !!}
                                            {{--<br>--}}
                                            {{--<h3>Screenshots</h3>--}}
                                            {{--<div class="panel panel_white panel_negative-margin">--}}
                                            {{--@include('components/simpleSlider', [--}}
                                            {{--'images' => [[--}}
                                            {{--'src' => asset('images/blog_easierwaytoplan.png'),--}}
                                            {{--'alt' => 'Slide 1',--}}
                                            {{--],[--}}
                                            {{--'src' => asset('images/blog_easierwaytoplan.png'),--}}
                                            {{--'alt' => 'Slide 2',--}}
                                            {{--],[--}}
                                            {{--'src' => asset('images/blog_easierwaytoplan.png'),--}}
                                            {{--'alt' => 'Slide 3',--}}
                                            {{--],]--}}
                                            {{--])--}}
                                            {{--</div>--}}
                                        </div>
                                    </div>
                                </div>
                                <div class="robo-advisor__section-footer">
                                    <a class="button button_success" href="{{ redirectLink($roboAdvisor->referral_link) }}" target="_blank">Sign Up</a>
                                </div>
                            </div>
                        @endif

                        @if($roboAdvisor->portfolio)
                            <div id="portfolio_section" class="robo-advisor__section">
                                <h2 class="h2">
                                    Portfolio
                                </h2>
                                <div class="panel">
                                    <div class="robo-advisor__section-text">
                                        <div class="reach-text">
                                            {!! $roboAdvisor->portfolio !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="robo-advisor__section-footer">
                                    <a class="button button_success" href="{{ redirectLink($roboAdvisor->referral_link) }}" target="_blank">Sign Up</a>
                                </div>
                            </div>
                        @endif
                        @if($roboAdvisor->conclusion)
                            <div id="conclusion_section" class="robo-advisor__section">
                                <h2 class="h2">
                                    Conclusion
                                </h2>
                                <div class="panel">
                                    <div class="robo-advisor__section-text">
                                        <div class="reach-text">
                                            {!! $roboAdvisor->conclusion !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="robo-advisor__section-footer">
                                    <a class="button button_success" href="{{ redirectLink($roboAdvisor->referral_link) }}" target="_blank">Sign Up</a>
                                </div>
                            </div>
                        @endif

                        <div id="reviews_section" class="robo-advisor__section">
                            <h2 class="h2">
                                REVIEWS
                            </h2>
                            <div class="panel panel_padding">
                                <div class="reach-text">
                                    <div class="panel panel_white">
                                        <div class="review-form">
                                            <h3>Would you recommend Wealthfront to your friends?</h3>
                                            <div class="review-form__action">
                                                @foreach($reviewTypes as $reviewType)
                                                    <div class="button button_{{$reviewType->code}} {{review_btn_classes($reviewType->id)}}" {{review_attr_data($reviewType->id)}}>{{$reviewType->name}}</div>
                                                @endforeach
                                            </div>
                                            <div class="review-form__item js-review-form-container {{old('review_type') ? ' open': ''}}">
                                                <div class="review-form__info">BEFORE WE PUBLISH YOUR VOTE:</div>
                                                <h4 class="review-form__title">Please explain your vote by sharing your experience.</h4>
                                                <div class="review-form__text">Writing a review increases the credibility of your vote and helps your fellow users make<br> a better-informed decision.</div>
                                                @auth
                                                    @if($is_user_create_review)
                                                        <div class="review-form__message js-review-message"><span class="success">Unfortunately, you can't have more than one review. Thank you for leaving a review.</span></div>
                                                    @else
                                                        <div class="review-form__message js-review-message"></div>
                                                        <div class="js-review-form-wrapper">
                                                            <form name="review_form" action="{{route('reviews.create')}}" method="post" type="json">
                                                                <input type="hidden" name="review_type" value="{{ old('review_type') }}">
                                                                <input type="hidden" name="robo_advisor" value="{{$roboAdvisor->id}}">
                                                                <textarea class="review-form__comment" name="comment" placeholder="Write about your experience here...">{{ old('comment') }}</textarea>
                                                                <button class="button button_blue review-form__send-button js-review-send" type="button">Post a Review</button>
                                                                <button class="button button_white review-form__cancel-button js-review-cancel" type="button">Cancel</button>
                                                            </form>
                                                        </div>
                                                    @endif
                                                @endauth
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Review list --}}
                                    @if(count($reviews) > 0)
                                        <div class="review-list review-list__pdt">
                                            @foreach($reviews as $review)
                                                @include('components/reviewItem', [
                                                    'review' => $review
                                                ])
                                            @endforeach
                                        </div>
                                        <div class="review-list-paginator">
                                            {{ $reviews->links('components/pagination') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @if (session('reviews_status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('reviews_status') }}
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts/footer')
@endsection