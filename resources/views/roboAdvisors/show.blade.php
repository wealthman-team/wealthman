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
                                            <span class="robo-advisor__verify">
                                                @svg('verify')
                                            </span>
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
                                            <span class="robo-advisor__verify">
                                                @svg('verify')
                                            </span>
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
                                            <span class="robo-advisor__verify">
                                                @svg('verify')
                                            </span>
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

                        <div class="sidebar__footer sidebar__footer_center">
                            <a class="button button_success" href="{{ $roboAdvisor->referral_link }}">Sign Up</a>
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

                                        <span class="robo-advisor__verify robo-advisor__verify_margin">
                                            @svg('verify')
                                        </span>
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
                                        {{--<a class="button" href="#">Compare</a>--}}
                                        <form class="robo-advisors-item__compare-form js-add-to-compare {{ in_array($roboAdvisor->id, getCompareList('compare_list')) ? ' active' : '' }}" action="{{ route('toggleCompare') }}" method="post">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="id" value="{{ $roboAdvisor->id }}">
                                            <button class="button" type="submit">Compared</button>
                                        </form>
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

                        <div class="robo-advisor__section">
                            @include('components/compareBanner')
                        </div>

                        <div class="robo-advisor__section">
                            <h2 class="h2">
                                All сharacteristics
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
                                                                @if ($roboAdvisor->minimum_account)
                                                                    ${{ $roboAdvisor->minimum_account }}
                                                                @else
                                                                    &mdash;
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>FEES</th>
                                                            <td>
                                                                @if ($roboAdvisor->management_fee)
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
                                                                    ${{ getAUMNum($roboAdvisor->aum) }}
                                                                @else
                                                                    &mdash;
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>NUMBER OF USERS</th>
                                                            <td>
                                                                @if ($roboAdvisor->number_accounts)
                                                                    {{ $roboAdvisor->number_accounts }}
                                                                @else
                                                                    &mdash;
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>AVERAGE ACCOUNT SIZE</th>
                                                            <td>
                                                                @if ($roboAdvisor->average_account_size)
                                                                    {{ $roboAdvisor->average_account_size }}
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
                                                                {{ $roboAdvisor->human_advisors }}
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
                                                                {{ $roboAdvisor->portfolio_rebalancing }}
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
                                                        <th>ACCES</th>
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
                                                    <tr>
                                                        <th>NO INFORMATION</th>
                                                        <td>&mdash;</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

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
                                                    <tr>
                                                        <th>SUMMARY</th>
                                                        <td>
                                                            Betterment is equally a good starting point for beginning
                                                            investors and a useful platform for more experienced
                                                            investors. The robo advisor has no minimum deposit and
                                                            costs 0.25% annually. If you need the assistance, it
                                                            recently added human advisors who can assist with your
                                                            retirement account. Unfortunately, Betterment's asset
                                                            allocation excludes REITs or commodities.
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="robo-advisor__section">
                            <h2 class="h2">
                                About company
                            </h2>
                            <div class="panel">
                                <div class="robo-advisor__section-text">
                                    <div class="reach-text">
                                        <p>
                                            Wealthfront is one of many robo advisors on the market.
                                            <a href="#">These automated investing platforms</a>
                                            have democratized investing by providing services that you once needed an
                                            expensive personal advisor to receive. And it’s proved enormously popular.
                                            Since its launch in December 2011, Wealthfront has built up its assets under
                                            management (AUM) to $10.5 billion.
                                        </p>
                                        <p>
                                            How it works is simple: You invest your money into a Wealthfront account
                                            (there’s a required minimum of $500). You can choose to use a tax-deferred
                                            individual retirement account (IRA) if you wish. Funds aren’t held by
                                            Wealthfront, but by the Royal Bank of Canada (RBC).
                                        </p>
                                        <p>
                                            Wealthfront then allocates your investment into an assortment of
                                            <a href="#">exchange-traded funds (ETFs).</a>
                                        </p>
                                        <p>
                                            Like many robo-investing services, Wealthfront uses
                                            <a href="#">Modern Portfolio Theory (MPT)</a>
                                            to create an automated asset allocation, taking into account your risk
                                            tolerance and financial needs. The platform continually makes sure that the
                                            allocation is correct with <a href="#">automatic rebalancing.</a>
                                        </p>
                                        <br>
                                        <h3>
                                            Free Financial Planning With Path
                                        </h3>
                                        <p>
                                            But let’s back up a step — Wealthfront uses a savings model called Path that
                                            was developed by a team of Ph.D.s to help you reach your goals.
                                            Using Path, you can set savings goals for the big stuff: retirement,
                                            college and/or a home purchase. This service takes all of your
                                            accounts — including external savings, banking and even mortgage accounts — and
                                            creates personal financial advice. Path generates scenarios to help you
                                            determine if you’re on the right… well… path to meet your savings goals.
                                            And if not, it will suggest the best ways to go about doing so. Path is not a
                                            separate app; it’s built into everything Wealthfront does.
                                        </p>
                                        <p>
                                            It’s like having a personal financial advisor that’s software based.
                                        </p>
                                        <p>
                                            Not only that, but you can use Path for free with no investment required.
                                            In fact, Wealthfront is now the only robo advisor to offer free financial
                                            planning. All you have to do is download the Wealthfront app and Path will
                                            get to work for you, with the ability to answer more than 10,000 questions
                                            tailored to your personal financial situation.
                                        </p>
                                        <p>
                                            With Path, Wealthfront can help you answer these questions:
                                        </p>
                                        <ul>
                                            <li>How much should you save today?</li>
                                            <li>How much will you be worth then?</li>
                                            <li>Could you live your current lifestyle at retirement?</li>
                                            <li>Are you on track for your child’s college education?</li>
                                            <li>Are you saving enough to purchase a home?</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="robo-advisor__section-footer">
                                <a class="button button_success" href="{{ $roboAdvisor->referral_link }}">Sign Up</a>
                            </div>
                        </div>

                        <div class="robo-advisor__section">
                            <h2 class="h2">
                                PROS AND CONS
                            </h2>
                            <div class="panel panel_padding">
                                <div class="panel panel_grad-green panel_margin">
                                    <div class="robo-advisor__section-text">
                                        <div class="reach-text">
                                            <h3>
                                                Pros
                                                <span class="robo-advisor__section-icon">
                                                    @svg('plus')
                                                </span>
                                            </h3>
                                            <p>
                                                <strong>Free for Accounts Under $5,000</strong>
                                                — With our special promotion link. Even more is possible
                                                with the refer-a-friend offer.
                                            </p>
                                            <p>
                                                <strong>Tax-Loss Harvesting for All Accounts</strong>
                                                — This is Wealthfront's specialty. It helps with taxable accounts
                                                and according to Wealthfront helps increase returns.
                                            </p>
                                            <p>
                                                <strong>Stock Level Tax-Loss Harvesting</strong>
                                                — When investing over $100,000, it's a further way to decrease taxes
                                                and fund expenses by avoiding ETF fees.
                                            </p>
                                            <p>
                                                <strong>Risk Parity</strong>
                                                — The recently added risk parity option may smooth out returns
                                                compared to the traditional 60% stock/40% bond portfolio.
                                                However, we question at what cost, and Wealthfront's
                                                performance remains untested.
                                            </p>
                                            <p>
                                                <strong>529 Plan Option</strong>
                                                — This option makes Wealthfront somewhat unique in that most
                                                robo advisors focus only on retirement planning.
                                            </p>
                                            <p>
                                                <strong>Two-Factor Authentication</strong>
                                                — Either via a SMS text message or an app installed on your phone,
                                                you can be assured that your account is protected
                                                from hackers gaining entry.
                                            </p>
                                            <p>
                                                <strong>Free Financial Planning</strong>
                                                — You can use Wealthfront's financial planning service,
                                                Path, with no obligation or required investment.
                                            </p>
                                            <p>
                                                <strong>Path Considers External Accounts</strong>
                                                — The Path planning tools consider all of your accounts,
                                                even those held outside Wealthfront, to give you a complete
                                                picture of your goals.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel_grad-red">
                                    <div class="robo-advisor__section-text">
                                        <div class="reach-text">
                                            <h3>
                                                Cons
                                                <span class="robo-advisor__section-icon">
                                                    @svg('minus')
                                                </span>
                                            </h3>
                                            <p>
                                                <strong>No Fractional Shares</strong>
                                                — It's possible to have cash sitting in your account, not invested.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="robo-advisor__section">
                            <h2 class="h2">
                                How it works?
                            </h2>
                            <div class="panel">
                                <div class="robo-advisor__section-text">
                                    <div class="reach-text">
                                        <p>
                                            Wealthfront uses a team of “world-class financial experts” led by
                                            legendary economist Burton Malkiel. He’s the author of the investment
                                            classic <a href="#">A Random Walk Down Wall Street</a>, which I recommend reading.
                                            Malkiel is Wealthfront’s Chief Investment Officer.
                                        </p>
                                        <p>
                                            Wealthfront has some similarities to <a href="#">Betterment</a> and other robo advisors,
                                            in that you start by completing a questionnaire. Wealthfront’s questionnaire
                                            has four objective questions and six subjective ones. The purpose of the
                                            survey is to determine your risk tolerance and to set asset allocations.
                                        </p>
                                        <p>
                                            Once established, the allocations will remain constant regardless of the
                                            amount of money you have invested. After specific thresholds are crossed
                                            within your account, the portfolio will automatically be adjusted to ensure
                                            it stays in line with the proposed asset mix.
                                        </p>
                                        <p>
                                            <strong>Account Minimums.</strong>
                                            The minimum account size is $500, and there is also
                                            a minimum withdrawal amount, which is $250. You cannot draw your
                                            account below the $500 minimum.
                                        </p>
                                        <p>
                                            <strong>Fees.</strong>
                                            There’s a lot of good news here. From <a href="#">our research</a>, for accounts
                                            under $10,000, Wealthfront is one of the cheapest robo advisors,
                                            including ETF fees. Annually, expect to shell out 0.25%.
                                            However, with our promo link, the first $5,000 in your account is
                                            managed free, and amounts above $5,000 have an annual 0.25% fee.
                                        </p>
                                        <p>
                                            Let’s break it down. On a $100,000 account the fee would be $237.50 for a
                                            full year — and with our exclusive promotional link, the first $5,000
                                            would be excluded from annual fees. The amount of the annual fee will
                                            be prorated and withdrawn on a monthly basis. Wealthfront is cheap when
                                            compared to the thousands of dollars in fees typically charged by
                                            financial advisors.
                                        </p>
                                        <p>
                                            As mentioned above, there’s another way to have more than $5,000 managed
                                            free under Wealthfront. After becoming a Wealthfront customer,
                                            refer friends to the service. Each new signup grants you an
                                            additional $5,000 of free management.
                                        </p>
                                        <p>
                                            The only other fee you incur is the very low fee embedded in the cost
                                            of the ETFs. From our 60% stocks, 40% bonds portfolio test, we found the
                                            ETF fees averaged 0.18%. That gives Wealthfront an advantage over even
                                            the deepest discount brokers.
                                        </p>
                                        <br>
                                        <h3>Screenshots</h3>
                                        <div class="panel panel_white panel_negative-margin">
                                            @include('components/simpleSlider', [
                                                'images' => [[
                                                    'src' => asset('images/blog_easierwaytoplan.png'),
                                                    'alt' => 'Slide 1',
                                                ],[
                                                    'src' => asset('images/blog_easierwaytoplan.png'),
                                                    'alt' => 'Slide 2',
                                                ],[
                                                    'src' => asset('images/blog_easierwaytoplan.png'),
                                                    'alt' => 'Slide 3',
                                                ],]
                                            ])
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="robo-advisor__section-footer">
                                <a class="button button_success" href="{{ $roboAdvisor->referral_link }}">Sign Up</a>
                            </div>
                        </div>

                        <div class="robo-advisor__section">
                            <h2 class="h2">
                                Portfolio
                            </h2>
                            <div class="panel">
                                <div class="robo-advisor__section-text">
                                    <div class="reach-text">
                                        <p>
                                            Depending on whether your account is taxable or tax-deferred (e.g., an IRA),
                                            the asset allocation and fund selection may be slightly different.
                                        </p>
                                        <p>
                                            The portfolio Wealthfront creates for you will be based on the ETFs listed below.
                                        </p>
                                        <br>
                                        <h3>Stocks</h3>
                                        <div class="panel panel_white panel_negative-margin">
                                            <table class="robo-advisor__simple-table
                                             robo-advisor__simple-table_with-padding
                                             robo-advisor__simple-table_three"
                                            >
                                                <tbody>
                                                <tr>
                                                    <th>SECTOR</th>
                                                    <th>ETF</th>
                                                    <th>TICKER</th>
                                                </tr>
                                                <tr>
                                                    <td>US</td>
                                                    <td>Vanguard US Total Stock Market</td>
                                                    <td>VTI</td>
                                                </tr>
                                                <tr>
                                                    <td>Foreign</td>
                                                    <td>Vanguard FTSE Developed Markets</td>
                                                    <td>VEA</td>
                                                </tr>
                                                <tr>
                                                    <td>Emerging Market</td>
                                                    <td>Vanguard FTSE Emerging Markets</td>
                                                    <td>VWO</td>
                                                </tr>
                                                <tr>
                                                    <td>Dividend</td>
                                                    <td>Vanguard Dividend Appreciation</td>
                                                    <td>VIG</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <br>
                                        <br>
                                        <h3>Stocks</h3>
                                        <div class="panel panel_white panel_negative-margin">
                                            <table class="robo-advisor__simple-table
                                                 robo-advisor__simple-table_with-padding
                                                 robo-advisor__simple-table_three"
                                            >
                                                <tbody>
                                                <tr>
                                                    <th>SECTOR</th>
                                                    <th>ETF</th>
                                                    <th>TICKER</th>
                                                </tr>
                                                <tr>
                                                    <td>US TIPS</td>
                                                    <td>Schwab US TIPS</td>
                                                    <td>SCHP</td>
                                                </tr>
                                                <tr>
                                                    <td>US Government</td>
                                                    <td>Vanguard Total Bond Market</td>
                                                    <td>BND</td>
                                                </tr>
                                                <tr>
                                                    <td>Muni</td>
                                                    <td>iShares National AMT-Free Muni Bond</td>
                                                    <td>MUB</td>
                                                </tr>
                                                <tr>
                                                    <td>Corporate</td>
                                                    <td>iShares Corporate Bond</td>
                                                    <td>LQD</td>
                                                </tr>
                                                <tr>
                                                    <td>Emerging Market</td>
                                                    <td>iShares JPMorgan Emerging Markets Bond</td>
                                                    <td>EMB</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <br>
                                        <br>
                                        <h3>Stocks</h3>
                                        <div class="panel panel_white panel_negative-margin">
                                            <table class="robo-advisor__simple-table
                                                 robo-advisor__simple-table_with-padding
                                                 robo-advisor__simple-table_three"
                                            >
                                                <tbody>
                                                <tr>
                                                    <th>SECTOR</th>
                                                    <th>ETF</th>
                                                    <th>TICKER</th>
                                                </tr>
                                                <tr>
                                                    <td>Real Estate</td>
                                                    <td>Vanguard REIT</td>
                                                    <td>VNQ</td>
                                                </tr>
                                                <tr>
                                                    <td>Natural Resources</td>
                                                    <td>Energy Select Sector SPDR</td>
                                                    <td>XLE</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <br>
                                        <h3>Risk Parity Fund</h3>
                                        <p>
                                            The newest investment product offered by Wealthfront — and the company’s
                                            first mutual fund — <a href="#">the PassivePlus Risk Parity fund</a>
                                            aims to deliver higher
                                            risk-adjusted returns in different market conditions. It does this by giving
                                            your portfolio more exposure to asset classes with higher risk-adjusted returns.
                                        </p>
                                        <p>
                                            The fund is based in part on a similar offering from Ray Dalio’s hedge fund,
                                            Bridgewater, which requires a $100 million account minimum. It will take up
                                            20% of your portfolio or less, depending you your personal settings.
                                            Wealthfront aims to democratize this strategy with a
                                            requirement of only $100,000.
                                        </p>
                                        <p>
                                            To participate in this fund, you must have a minimum of $100,000 deposited.
                                            The fund has an annual fee of 0.25%, which will translate
                                            to only a 0.05% hike to your regular fee.
                                        </p>
                                        <p>
                                            The Risk Parity fund is available only for
                                            taxable accounts (no IRAs) at the moment.
                                        </p>
                                        <div class="panel panel_white panel_negative-margin">
                                            <table class="robo-advisor__simple-table
                                                 robo-advisor__simple-table_with-padding
                                                 robo-advisor__simple-table_three"
                                            >
                                                <tbody>
                                                <tr>
                                                    <th>STRUCTURE</th>
                                                    <th>INVESTMENT MINIMUM</th>
                                                    <th>EXPENSE RATIO</th>
                                                </tr>
                                                <tr>
                                                    <td>Mutual Fund</td>
                                                    <td>$100K</td>
                                                    <td>0.50%</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="robo-advisor__section-footer">
                                <a class="button button_success" href="{{ $roboAdvisor->referral_link }}">Sign Up</a>
                            </div>
                        </div>

                        <div class="robo-advisor__section">
                            <h2 class="h2">
                                Conclusion
                            </h2>
                            <div class="panel">
                                <div class="robo-advisor__section-text">
                                    <div class="reach-text">
                                        <p>
                                            Overall, Wealthfront appears to be an excellent investment service.
                                            It shines with taxable accounts. Now that Wealthfront offers tax-loss
                                            harvesting for all accounts, its service can minimize your
                                            annual tax expenses.
                                        </p>
                                        <p>
                                            If you’re a beginning investor who’s leery of jumping into individual
                                            security selection and management, Wealthfront would be an excellent
                                            choice. And it’s a superior vehicle for any passive investor, since
                                            the selection and maintenance of individual securities is completely
                                            unnecessary. Such an investor should supplement their Wealthfront
                                            position with substantial cash-type holdings outside.
                                        </p>
                                        <p>
                                            But more active investors can find use here
                                            if they supplement with a self-directed account.
                                        </p>
                                        <p>
                                            But it’s the everyday savers whom Wealthfront is particularly looking
                                            to reach. With its Path planning model, you can “set it an forget it”
                                            and let Wealthfront do all of the heavy lifting.
                                        </p>
                                        <p>
                                            For individuals who are looking for a more comprehensive online financial
                                            planning app with optional financial advisor advice,
                                            <a href="#">Personal Capital</a> is a good option as well.
                                        </p>
                                        <br>
                                        <h3>
                                            Free Financial Planning With Path
                                        </h3>
                                        <p>
                                            You are being referred to Wealthfront Advisers LLC (“Wealthfront Advisers”)
                                            by Investor Junkie. Wealthfront Advisers has engaged Investor Junkie to act
                                            as a solicitor and refer potential clients to Wealthfront Advisers via
                                            advertisements placed on Investor Junkie’s website. Investor Junkie and
                                            Wealthfront Advisers are not affiliated with one another and have no formal
                                            relationship outside this arrangement. Wealthfront Advisers has agreed to
                                            compensate Investor Junkie for its referral services, and under this
                                            agreement will pay Investor Junkie a cash fee when you open an account
                                            with Wealthfront Advisers after clicking through this page. You will not
                                            be charged anything in connection with this referral, and this arrangement
                                            will not affect the advisory fees you will pay to Wealthfront Advisers
                                            compared to other advisory clients of Wealthfront Advisers. Additional
                                            information about Wealthfront Advisers may be found in its firm brochure
                                            located here. By clicking on the button on this page, you acknowledge
                                            receipt of the foregoing disclosure and the firm brochure accessible via
                                            the link in the preceding sentence.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="robo-advisor__section-footer">
                                <a class="button button_success" href="{{ $roboAdvisor->referral_link }}">Sign Up</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts/footer')
@endsection