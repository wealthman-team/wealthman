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
                                        {{--@include('components/recommendation', [--}}
                                            {{--'text' => 'Mostly not recommended',--}}
                                            {{--'yes' => 1,--}}
                                            {{--'maybe' => 2,--}}
                                            {{--'no' => 3,--}}
                                            {{--'total' => 6,--}}
                                            {{--'isOpen' => true,--}}
                                        {{--])--}}
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
                        @if($roboAdvisor->about_company)
                            <div class="robo-advisor__section">
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
                                    <a class="button button_success" href="{{ $roboAdvisor->referral_link }}">Sign Up</a>
                                </div>
                            </div>
                        @endif

                        @if($roboAdvisor->pros || $roboAdvisor->cons)
                            <div class="robo-advisor__section">
                                <h2 class="h2">
                                    PROS AND CONS
                                </h2>
                                <div class="panel panel_padding">
                                    @if($roboAdvisor->pros)
                                        <div class="panel panel_grad-green panel_margin">
                                            <div class="robo-advisor__section-text">
                                                <div class="reach-text">
                                                    {!! $roboAdvisor->pros !!}
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if($roboAdvisor->cons)
                                        <div class="panel panel_grad-red">
                                            <div class="robo-advisor__section-text">
                                                <div class="reach-text">
                                                    {!! $roboAdvisor->cons !!}
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endif

                        @if($roboAdvisor->how_it_works)
                            <div class="robo-advisor__section">
                                <h2 class="h2">
                                    How it works?
                                </h2>
                                <div class="panel">
                                    <div class="robo-advisor__section-text">
                                        <div class="reach-text">
                                            {!! $roboAdvisor->how_it_works !!}
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
                        @endif

                        @if($roboAdvisor->portfolio)
                            <div class="robo-advisor__section">
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
                                    <a class="button button_success" href="{{ $roboAdvisor->referral_link }}">Sign Up</a>
                                </div>
                            </div>
                        @endif
                        @if($roboAdvisor->conclusion)
                            <div class="robo-advisor__section">
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
                                    <a class="button button_success" href="{{ $roboAdvisor->referral_link }}">Sign Up</a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts/footer')
@endsection