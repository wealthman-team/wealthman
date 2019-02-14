@extends('layouts.app')

@section('content')
    @include('layouts/header')

    <div class="content compare">

        @include('components/parallax', ['bg' => '/images/header-bg2.jpg', 'hidden_stock' => true])

        <div class="container">
            <div class="topic">
                @include('components/breadcrumbs', [
                    'theme' => 'dark-theme',
                    'breadcrumbs' => [[
                        'name' => 'Home',
                        'link' => route('home'),
                    ],[
                        'name' => 'Compare',
                    ]]
                ])
                @include('components/page-header', [
                    'header' => 'Comparison of robo-advisors',
                    'sub_header' => 'Oh, there is nothing here',
                    'sub_header_class' => count($roboAdvisors) > 0 ? 'js-compare-empty-result hidden' : 'js-compare-empty-result'
                ])
            </div>

            <div class="main">
                <div class="main-content">
                    <div class="empty-message color-gray js-compare-empty-result {{count($roboAdvisors) > 0 ? 'hidden': ''}}">
                        You can add an robo-advisors from the
                        <a class="link link_active" href="{{route('roboAdvisors')}}">Advisor screener</a>
                    </div>
                    @if (count($roboAdvisors) > 0)
                        <div class="compare__actions-list js-compare-result">
                            <span>Show:</span>
                            <a class="link compare__action-item js-differing-characteristics">Differing characteristics</a>
                            <a class="link link_active compare__action-item js-all-characteristics">All characteristics</a>
                            <a class="link link_red compare__action-item js-clear-compare" href="{{ route('clearCompare') }}">Delete list</a>
                        </div>
                    @endif

                    @if (count($roboAdvisors) > 0)
                        <div class="compare-list js-compare-list js-compare-result" data-cl-length="{{ count($roboAdvisors) }}">
                            <div class="compare-list__header-wrapper">
                                <div class="compare-list__header js-compare-header">
                                    <div class="compare-list__header-container js-compare-header-fixed">
                                        <div class="compare-list__header-bg">
                                            <div class="compare-list__inner compare-list__inner-header">
                                                @if (count($roboAdvisors) > 6)
                                                <div class="compare-list__nav">
                                                    <div class="compare-list__nav-left js-compare-list-prev">@svg('arrow-long-left', 'compare-list__arrow')</div>
                                                    <div class="compare-list__nav-right js-compare-list-next">@svg('arrow-long-left', 'compare-list__arrow')</div>
                                                </div>
                                                @endif
                                                <div class="compare-list__group js-compare-list-group">
                                                    <div class="compare-list__row">
                                                        <div class="compare-list__context js-compare-list-context">
                                                            @foreach ($roboAdvisors as $roboAdvisor)
                                                                <div class="compare-list__col compare-list__col_header js-compare-robo-{{$roboAdvisor->id}}">
                                                                    <div class="compare-list__logo">
                                                                        @if ($roboAdvisor->logo)
                                                                            <img src="{{ asset('storage/' . $roboAdvisor->logo) }}" />
                                                                        @endif
                                                                    </div>
                                                                    <div class="compare-list__actions">
                                                                        <a class="link link_active" href="{{ redirectLink($roboAdvisor->referral_link) }}" target="_blank">Sign up</a>
                                                                        <a class="link" href="{{ route('roboAdvisorsShow', $roboAdvisor->slug) }}">Review</a>
                                                                        <a class="link js-remove-from-compare" href="{{ route('toggleCompare') }}" data-robo-advisor="{{ $roboAdvisor->id }}">
                                                                            <span class="compare-list__icon-remove">
                                                                                @svg('basket')
                                                                            </span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="compare-list__inner">
                                <div class="compare-list__group compare-list__group_with-header js-compare-list-group {{$diffRoboAdvisors['general']['group_identical'] ? 'js-identical-compare' : ''}}">
                                    <div class="compare-list__context js-compare-list-context">
                                        <div class="compare-list__group-header">
                                            <div class="compare-list__group-name js-compare-list-group-name">
                                                GENERAL CHARACTERISTICS
                                                <div class="compare-list__group-arrow">
                                                    @svg('arrow-up', 'compare-list__arrow-up')
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="compare-list__row compare-list__row_with-hover">
                                        <div class="compare-list__context js-compare-list-context">
                                            <div class="compare-list__row-name js-compare-list-name">
                                                RECOMENDATION
                                            </div>
                                            @foreach ($roboAdvisors as $roboAdvisor)
                                                @if(count($roboAdvisor->reviews) > 0)
                                                    <div class="compare-list__col">
                                                        @include('components/recommendation', [
                                                            'reviews' => $roboAdvisor->reviews
                                                        ])
                                                    </div>
                                                @else
                                                    <div class="compare-list__col">
                                                        &mdash;
                                                    </div>
                                                @endif

                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="compare-list__row compare-list__row_with-hover {{$diffRoboAdvisors['general']['ratings']['total'] ? 'js-identical-compare' : ''}}">
                                        <div class="compare-list__context js-compare-list-context">
                                            <div class="compare-list__row-name js-compare-list-name">
                                                Rating
                                            </div>
                                            @foreach ($roboAdvisors as $roboAdvisor)
                                                <div class="compare-list__col js-compare-robo-{{$roboAdvisor->id}}">
                                                    {{ $roboAdvisor->ratings->total }}
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="compare-list__row compare-list__row_with-hover {{$diffRoboAdvisors['general']['ratings']['commissions'] ? 'js-identical-compare' : ''}}">
                                        <div class="compare-list__context js-compare-list-context">
                                            <div class="compare-list__row-name js-compare-list-name">
                                                Commission & Fees
                                            </div>
                                            @foreach ($roboAdvisors as $roboAdvisor)
                                                <div class="compare-list__col js-compare-robo-{{$roboAdvisor->id}}">
                                                    {{ $roboAdvisor->ratings->commissions }}
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="compare-list__row compare-list__row_with-hover {{$diffRoboAdvisors['general']['ratings']['service'] ? 'js-identical-compare' : ''}}">
                                        <div class="compare-list__context js-compare-list-context">
                                            <div class="compare-list__row-name js-compare-list-name">
                                                Customer Service
                                            </div>
                                            @foreach ($roboAdvisors as $roboAdvisor)
                                                <div class="compare-list__col js-compare-robo-{{$roboAdvisor->id}}">
                                                    {{ $roboAdvisor->ratings->service }}
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="compare-list__row compare-list__row_with-hover {{$diffRoboAdvisors['general']['ratings']['comfortable'] ? 'js-identical-compare' : ''}}">
                                        <div class="compare-list__context js-compare-list-context">
                                            <div class="compare-list__row-name js-compare-list-name">
                                                Ease of Use
                                            </div>
                                            @foreach ($roboAdvisors as $roboAdvisor)
                                                <div class="compare-list__col js-compare-robo-{{$roboAdvisor->id}}">
                                                    {{ $roboAdvisor->ratings->comfortable }}
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="compare-list__row compare-list__row_with-hover {{$diffRoboAdvisors['general']['ratings']['tools'] ? 'js-identical-compare' : ''}}">
                                        <div class="compare-list__context js-compare-list-context">
                                            <div class="compare-list__row-name js-compare-list-name">
                                                Tools & Resources
                                            </div>
                                            @foreach ($roboAdvisors as $roboAdvisor)
                                                <div class="compare-list__col js-compare-robo-{{$roboAdvisor->id}}">
                                                    {{ $roboAdvisor->ratings->tools }}
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="compare-list__row compare-list__row_with-hover {{$diffRoboAdvisors['general']['ratings']['investment_options'] ? 'js-identical-compare' : ''}}">
                                        <div class="compare-list__context js-compare-list-context">
                                            <div class="compare-list__row-name js-compare-list-name">
                                                Investment Options
                                            </div>
                                            @foreach ($roboAdvisors as $roboAdvisor)
                                                <div class="compare-list__col js-compare-robo-{{$roboAdvisor->id}}">
                                                    {{ $roboAdvisor->ratings->investment_options }}
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="compare-list__row compare-list__row_with-hover {{$diffRoboAdvisors['general']['ratings']['asset_allocation'] ? 'js-identical-compare' : ''}}">
                                        <div class="compare-list__context js-compare-list-context">
                                            <div class="compare-list__row-name js-compare-list-name">
                                                Asset Allocation
                                            </div>
                                            @foreach ($roboAdvisors as $roboAdvisor)
                                                <div class="compare-list__col js-compare-robo-{{$roboAdvisor->id}}">
                                                    {{ $roboAdvisor->ratings->asset_allocation }}
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="compare-list__row compare-list__row_with-hover {{$diffRoboAdvisors['general']['minimum_account'] ? 'js-identical-compare' : ''}}">
                                        <div class="compare-list__context js-compare-list-context">
                                            <div class="compare-list__row-name js-compare-list-name">
                                                MINIMUM ACCOUNT
                                            </div>
                                            @foreach ($roboAdvisors as $roboAdvisor)
                                                <div class="compare-list__col js-compare-robo-{{$roboAdvisor->id}}">
                                                    @if ($roboAdvisor->minimum_account || $roboAdvisor->minimum_account === 0)
                                                        ${{ $roboAdvisor->minimum_account }}
                                                    @else
                                                        &mdash;
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="compare-list__row compare-list__row_with-hover {{$diffRoboAdvisors['general']['management_fee'] ? 'js-identical-compare' : ''}}">
                                        <div class="compare-list__context js-compare-list-context">
                                            <div class="compare-list__row-name js-compare-list-name">
                                                Management fee
                                            </div>
                                            @foreach ($roboAdvisors as $roboAdvisor)
                                                <div class="compare-list__col js-compare-robo-{{$roboAdvisor->id}}">
                                                    @if ($roboAdvisor->management_fee || $roboAdvisor->management_fee === 0.00)
                                                        {{ $roboAdvisor->management_fee }}%/year
                                                    @else
                                                        &mdash;
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="compare-list__row compare-list__row_with-hover {{$diffRoboAdvisors['general']['fee_details'] ? 'js-identical-compare' : ''}}">
                                        <div class="compare-list__context js-compare-list-context">
                                            <div class="compare-list__row-name js-compare-list-name">
                                                ADDITIONAL INFORMATION
                                                ABOUT MANAGEMENT FEE
                                            </div>
                                            @foreach ($roboAdvisors as $roboAdvisor)
                                                <div class="compare-list__col js-compare-robo-{{$roboAdvisor->id}}">
                                                    @if ($roboAdvisor->fee_details)
                                                        {{ $roboAdvisor->fee_details }}
                                                    @else
                                                        &mdash;
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="compare-list__row compare-list__row_with-hover {{$diffRoboAdvisors['general']['aum'] ? 'js-identical-compare' : ''}}">
                                        <div class="compare-list__context js-compare-list-context">
                                            <div class="compare-list__row-name js-compare-list-name">
                                                ASSETS UNDER MANAGEMENT
                                            </div>
                                            @foreach ($roboAdvisors as $roboAdvisor)
                                                <div class="compare-list__col js-compare-robo-{{$roboAdvisor->id}}">
                                                    @if ($roboAdvisor->aum)
                                                        ${{ getAUMNum($roboAdvisor->aum) }}
                                                    @else
                                                        &mdash;
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="compare-list__row compare-list__row_with-hover {{$diffRoboAdvisors['general']['number_accounts'] ? 'js-identical-compare' : ''}}">
                                        <div class="compare-list__context js-compare-list-context">
                                            <div class="compare-list__row-name js-compare-list-name">
                                                NUMBER OF USERS
                                            </div>
                                            @foreach ($roboAdvisors as $roboAdvisor)
                                                <div class="compare-list__col js-compare-robo-{{$roboAdvisor->id}}">
                                                    @if ($roboAdvisor->number_accounts)
                                                        {{ $roboAdvisor->number_accounts }}
                                                    @else
                                                        &mdash;
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="compare-list__row compare-list__row_with-hover {{$diffRoboAdvisors['general']['average_account_size'] ? 'js-identical-compare' : ''}}">
                                        <div class="compare-list__context js-compare-list-context">
                                            <div class="compare-list__row-name js-compare-list-name">
                                                AVERAGE ACCOUNT SIZE
                                            </div>
                                            @foreach ($roboAdvisors as $roboAdvisor)
                                                <div class="compare-list__col js-compare-robo-{{$roboAdvisor->id}}">
                                                    @if ($roboAdvisor->average_account_size)
                                                        {{ $roboAdvisor->average_account_size }}
                                                    @else
                                                        &mdash;
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="compare-list__row compare-list__row_with-hover {{$diffRoboAdvisors['general']['founded'] ? 'js-identical-compare' : ''}}">
                                        <div class="compare-list__context js-compare-list-context">
                                            <div class="compare-list__row-name js-compare-list-name">
                                                YEAR FOUNDED
                                            </div>
                                            @foreach ($roboAdvisors as $roboAdvisor)
                                                <div class="compare-list__col js-compare-robo-{{$roboAdvisor->id}}">
                                                    @if ($roboAdvisor->founded)
                                                        {{ $roboAdvisor->founded }}
                                                    @else
                                                        &mdash;
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="compare-list__row compare-list__row_with-hover {{$diffRoboAdvisors['general']['promotions'] ? 'js-identical-compare' : ''}}">
                                        <div class="compare-list__context js-compare-list-context">
                                            <div class="compare-list__row-name js-compare-list-name">
                                                PROMOTIONS
                                            </div>
                                            @foreach ($roboAdvisors as $roboAdvisor)
                                                <div class="compare-list__col js-compare-robo-{{$roboAdvisor->id}}">
                                                    @if ($roboAdvisor->promotions)
                                                        {{ $roboAdvisor->promotions }}
                                                    @else
                                                        &mdash;
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <div class="compare-list__group compare-list__group_with-header js-compare-list-group {{$diffRoboAdvisors['services']['group_identical'] ? 'js-identical-compare' : ''}}">
                                    <div class="compare-list__context js-compare-list-context">
                                        <div class="compare-list__group-header">
                                            <div class="compare-list__group-name js-compare-list-group-name">
                                                SERVICES
                                                <div class="compare-list__group-arrow">
                                                    @svg('arrow-up', 'compare-list__arrow-up')
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="compare-list__row compare-list__row_with-hover {{$diffRoboAdvisors['services']['human_advisors'] ? 'js-identical-compare' : ''}}">
                                        <div class="compare-list__context js-compare-list-context">
                                            <div class="compare-list__row-name js-compare-list-name">
                                                HUMAN ADVISORS
                                            </div>
                                            @foreach ($roboAdvisors as $roboAdvisor)
                                                <div class="compare-list__col js-compare-robo-{{$roboAdvisor->id}}">
                                                    @if ($roboAdvisor->human_advisors)
                                                        @svg('check', 'robo-advisor__check')
                                                    @else
                                                        &mdash;
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="compare-list__row compare-list__row_with-hover {{$diffRoboAdvisors['services']['human_advisors_details'] ? 'js-identical-compare' : ''}}">
                                        <div class="compare-list__context js-compare-list-context">
                                            <div class="compare-list__row-name js-compare-list-name">
                                                ADDITIONAL INFORMATION
                                                ABOUT HUMAN ADVISORS
                                            </div>
                                            @foreach ($roboAdvisors as $roboAdvisor)
                                                <div class="compare-list__col js-compare-robo-{{$roboAdvisor->id}}">
                                                    @if ($roboAdvisor->human_advisors_details)
                                                        {{ $roboAdvisor->human_advisors_details }}
                                                    @else
                                                        &mdash;
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="compare-list__row compare-list__row_with-hover {{$diffRoboAdvisors['services']['portfolio_rebalancing'] ? 'js-identical-compare' : ''}}">
                                        <div class="compare-list__context js-compare-list-context">
                                            <div class="compare-list__row-name js-compare-list-name">
                                                PORTFOLIO REBALANCING
                                            </div>
                                            @foreach ($roboAdvisors as $roboAdvisor)
                                                <div class="compare-list__col js-compare-robo-{{$roboAdvisor->id}}">
                                                    @if ($roboAdvisor->portfolio_rebalancing)
                                                        @svg('check', 'robo-advisor__check')
                                                    @else
                                                        &mdash;
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="compare-list__row compare-list__row_with-hover {{$diffRoboAdvisors['services']['automatic_deposits'] ? 'js-identical-compare' : ''}}">
                                        <div class="compare-list__context js-compare-list-context">
                                            <div class="compare-list__row-name js-compare-list-name">
                                                AUTOMATIC DEPOSITS
                                            </div>
                                            @foreach ($roboAdvisors as $roboAdvisor)
                                                <div class="compare-list__col js-compare-robo-{{$roboAdvisor->id}}">
                                                    @if ($roboAdvisor->automatic_deposits)
                                                        @svg('check', 'robo-advisor__check')
                                                    @else
                                                        &mdash;
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="compare-list__row compare-list__row_with-hover {{$diffRoboAdvisors['services']['access_platforms'] ? 'js-identical-compare' : ''}}">
                                        <div class="compare-list__context js-compare-list-context">
                                            <div class="compare-list__row-name js-compare-list-name">
                                                Access platforms
                                            </div>
                                            @foreach ($roboAdvisors as $roboAdvisor)
                                                <div class="compare-list__col js-compare-robo-{{$roboAdvisor->id}}">
                                                    @if ($roboAdvisor->access_platforms)
                                                        {{ $roboAdvisor->access_platforms }}
                                                    @else
                                                        &mdash;
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="compare-list__row compare-list__row_with-hover {{$diffRoboAdvisors['services']['two_factor_auth'] ? 'js-identical-compare' : ''}}">
                                        <div class="compare-list__context js-compare-list-context">
                                            <div class="compare-list__row-name js-compare-list-name">
                                                TWO-FACTOR
                                                AUTHENTICATION
                                            </div>
                                            @foreach ($roboAdvisors as $roboAdvisor)
                                                <div class="compare-list__col js-compare-robo-{{$roboAdvisor->id}}">
                                                    @if ($roboAdvisor->two_factor_auth)
                                                        @svg('check', 'robo-advisor__check')
                                                    @else
                                                        &mdash;
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="compare-list__row compare-list__row_with-hover {{$diffRoboAdvisors['services']['customer_service'] ? 'js-identical-compare' : ''}}">
                                        <div class="compare-list__context js-compare-list-context">
                                            <div class="compare-list__row-name js-compare-list-name">
                                                CUSTOMER SERVICE
                                            </div>
                                            @foreach ($roboAdvisors as $roboAdvisor)
                                                <div class="compare-list__col js-compare-robo-{{$roboAdvisor->id}}">
                                                    @if ($roboAdvisor->customer_service)
                                                        {{ $roboAdvisor->customer_service }}
                                                    @else
                                                        &mdash;
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="compare-list__row compare-list__row_with-hover {{$diffRoboAdvisors['services']['clearing_agency'] ? 'js-identical-compare' : ''}}">
                                        <div class="compare-list__context js-compare-list-context">
                                            <div class="compare-list__row-name js-compare-list-name">
                                                CLEARING AGENCY
                                            </div>
                                            @foreach ($roboAdvisors as $roboAdvisor)
                                                <div class="compare-list__col js-compare-robo-{{$roboAdvisor->id}}">
                                                    @if ($roboAdvisor->clearing_agency)
                                                        {{ $roboAdvisor->clearing_agency }}
                                                    @else
                                                        &mdash;
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <div class="compare-list__group compare-list__group_with-header js-compare-list-group {{$diffRoboAdvisors['account_available']['group_identical'] ? 'js-identical-compare' : ''}}">
                                    <div class="compare-list__context js-compare-list-context">
                                        <div class="compare-list__group-header">
                                            <div class="compare-list__group-name js-compare-list-group-name">
                                                ACCOUNT AVAILABLE
                                                <div class="compare-list__group-arrow">
                                                    @svg('arrow-up', 'compare-list__arrow-up')
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="compare-list__row">
                                        <div class="compare-list__context js-compare-list-context">
                                            @foreach ($roboAdvisors as $roboAdvisor)
                                                <div class="compare-list__col compare-list__col_header js-compare-robo-{{$roboAdvisor->id}}">
                                                    <table class="robo-advisor__simple-table">
                                                        <tbody>
                                                        @foreach($accountTypes as $accountType)
                                                            <tr class="{{ $diffRoboAdvisors['account_available']['account_types'][$accountType->id] ? 'js-identical-compare' : '' }}">
                                                                <td class="{{ in_array($accountType->id, $roboAdvisor->account_types_ids) ? '' : 'inactive' }}">
                                                                    {{ $accountType->name }}
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <div class="compare-list__group compare-list__group_with-header js-compare-list-group {{$diffRoboAdvisors['features']['group_identical'] ? 'js-identical-compare' : ''}}">
                                    <div class="compare-list__context js-compare-list-context">
                                        <div class="compare-list__group-header">
                                            <div class="compare-list__group-name js-compare-list-group-name">
                                                FEATURES
                                                <div class="compare-list__group-arrow">
                                                    @svg('arrow-up', 'compare-list__arrow-up')
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="compare-list__row compare-list__row_with-hover {{$diffRoboAdvisors['features']['fractional_shares'] ? 'js-identical-compare' : ''}}">
                                        <div class="compare-list__context js-compare-list-context">
                                            <div class="compare-list__row-name js-compare-list-name">
                                                FRACTIONAL SHARES
                                            </div>
                                            @foreach ($roboAdvisors as $roboAdvisor)
                                                <div class="compare-list__col js-compare-robo-{{$roboAdvisor->id}}">
                                                    @if ($roboAdvisor->fractional_shares)
                                                        @svg('check', 'robo-advisor__check')
                                                    @else
                                                        &mdash;
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="compare-list__row compare-list__row_with-hover {{$diffRoboAdvisors['features']['assistance_401k'] ? 'js-identical-compare' : ''}}">
                                        <div class="compare-list__context js-compare-list-context">
                                            <div class="compare-list__row-name js-compare-list-name">
                                                401(K) GUIDANCE
                                            </div>
                                            @foreach ($roboAdvisors as $roboAdvisor)
                                                <div class="compare-list__col js-compare-robo-{{$roboAdvisor->id}}">
                                                    @if ($roboAdvisor->assistance_401k)
                                                        @svg('check', 'robo-advisor__check')
                                                    @else
                                                        &mdash;
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="compare-list__row compare-list__row_with-hover {{$diffRoboAdvisors['features']['tax_loss'] ? 'js-identical-compare' : ''}}">
                                        <div class="compare-list__context js-compare-list-context">
                                            <div class="compare-list__row-name js-compare-list-name">
                                                TAX LOSS HARVESTING
                                            </div>
                                            @foreach ($roboAdvisors as $roboAdvisor)
                                                <div class="compare-list__col js-compare-robo-{{$roboAdvisor->id}}">
                                                    @if ($roboAdvisor->tax_loss)
                                                        @svg('check', 'robo-advisor__check')
                                                    @else
                                                        &mdash;
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="compare-list__row compare-list__row_with-hover {{$diffRoboAdvisors['features']['tax_loss_details'] ? 'js-identical-compare' : ''}}">
                                        <div class="compare-list__context js-compare-list-context">
                                            <div class="compare-list__row-name js-compare-list-name">
                                                ADDITIONAL INFORMATION
                                                ABOUT TAX LOSS
                                                HARVESTING
                                            </div>
                                            @foreach ($roboAdvisors as $roboAdvisor)
                                                <div class="compare-list__col js-compare-robo-{{$roboAdvisor->id}}">
                                                    @if ($roboAdvisor->tax_loss_details)
                                                        {{ $roboAdvisor->tax_loss_details }}
                                                    @else
                                                        &mdash;
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="compare-list__row compare-list__row_with-hover {{$diffRoboAdvisors['features']['retirement_planning'] ? 'js-identical-compare' : ''}}">
                                        <div class="compare-list__context js-compare-list-context">
                                            <div class="compare-list__row-name js-compare-list-name">
                                                RETIREMENT PLANNING TOOLS
                                            </div>
                                            @foreach ($roboAdvisors as $roboAdvisor)
                                                <div class="compare-list__col js-compare-robo-{{$roboAdvisor->id}}">
                                                    @if ($roboAdvisor->retirement_planning)
                                                        @svg('check', 'robo-advisor__check')
                                                    @else
                                                        &mdash;
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="compare-list__row compare-list__row_with-hover {{$diffRoboAdvisors['features']['self_clearing'] ? 'js-identical-compare' : ''}}">
                                        <div class="compare-list__context js-compare-list-context">
                                            <div class="compare-list__row-name js-compare-list-name">
                                                SELF CLEARING
                                            </div>
                                            @foreach ($roboAdvisors as $roboAdvisor)
                                                <div class="compare-list__col js-compare-robo-{{$roboAdvisor->id}}">
                                                    @if ($roboAdvisor->self_clearing)
                                                        @svg('check', 'robo-advisor__check')
                                                    @else
                                                        &mdash;
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="compare-list__row compare-list__row_with-hover {{$diffRoboAdvisors['features']['smart_beta'] ? 'js-identical-compare' : ''}}">
                                        <div class="compare-list__context js-compare-list-context">
                                            <div class="compare-list__row-name js-compare-list-name">
                                                SMART BETA
                                            </div>
                                            @foreach ($roboAdvisors as $roboAdvisor)
                                                <div class="compare-list__col js-compare-robo-{{$roboAdvisor->id}}">
                                                    @if ($roboAdvisor->smart_beta)
                                                        @svg('check', 'robo-advisor__check')
                                                    @else
                                                        &mdash;
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="compare-list__row compare-list__row_with-hover {{$diffRoboAdvisors['features']['responsible_investing'] ? 'js-identical-compare' : ''}}">
                                        <div class="compare-list__context js-compare-list-context">
                                            <div class="compare-list__row-name js-compare-list-name">
                                                SOCIALLY RESPONSIBLE INVESTING
                                            </div>
                                            @foreach ($roboAdvisors as $roboAdvisor)
                                                <div class="compare-list__col js-compare-robo-{{$roboAdvisor->id}}">
                                                    @if ($roboAdvisor->responsible_investing)
                                                        @svg('check', 'robo-advisor__check')
                                                    @else
                                                        &mdash;
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="compare-list__row compare-list__row_with-hover {{$diffRoboAdvisors['features']['invests_commodities'] ? 'js-identical-compare' : ''}}">
                                        <div class="compare-list__context js-compare-list-context">
                                            <div class="compare-list__row-name js-compare-list-name">
                                                INVESTS IN COMMODITIES
                                            </div>
                                            @foreach ($roboAdvisors as $roboAdvisor)
                                                <div class="compare-list__col js-compare-robo-{{$roboAdvisor->id}}">
                                                    @if ($roboAdvisor->invests_commodities)
                                                        @svg('check', 'robo-advisor__check')
                                                    @else
                                                        &mdash;
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="compare-list__row compare-list__row_with-hover {{$diffRoboAdvisors['features']['real_estate'] ? 'js-identical-compare' : ''}}">
                                        <div class="compare-list__context js-compare-list-context">
                                            <div class="compare-list__row-name js-compare-list-name">
                                                INVESTS IN REAL ESTATE
                                            </div>
                                            @foreach ($roboAdvisors as $roboAdvisor)
                                                <div class="compare-list__col js-compare-robo-{{$roboAdvisor->id}}">
                                                    @if ($roboAdvisor->real_estate)
                                                        @svg('check', 'robo-advisor__check')
                                                    @else
                                                        &mdash;
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <div class="compare-list__group compare-list__group_with-header js-compare-list-group {{$diffRoboAdvisors['additional_information']['group_identical'] ? 'js-identical-compare' : ''}}">
                                    <div class="compare-list__context js-compare-list-context">
                                        <div class="compare-list__group-header">
                                            <div class="compare-list__group-name js-compare-list-group-name">
                                                ADDITIONAL INFORMATION
                                                <div class="compare-list__group-arrow">
                                                    @svg('arrow-up', 'compare-list__arrow-up')
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="compare-list__row compare-list__row_with-hover {{$diffRoboAdvisors['additional_information']['additional_information'] ? 'js-identical-compare' : ''}}">
                                        <div class="compare-list__context js-compare-list-context">
                                            <div class="compare-list__row-name js-compare-list-name">
                                                INFORMATION
                                            </div>
                                            @foreach ($roboAdvisors as $roboAdvisor)
                                                <div class="compare-list__col js-compare-robo-{{$roboAdvisor->id}}">
                                                @if ($roboAdvisor->additional_information)
                                                    {!! $roboAdvisor->additional_information !!}
                                                @else
                                                    &mdash;
                                                @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <div class="compare-list__group compare-list__group_with-header js-compare-list-group {{$diffRoboAdvisors['summary']['group_identical'] ? 'js-identical-compare' : ''}}">
                                    <div class="compare-list__context js-compare-list-context">
                                        <div class="compare-list__group-header">
                                            <div class="compare-list__group-name js-compare-list-group-name">
                                                SUMMARY
                                                <div class="compare-list__group-arrow">
                                                    @svg('arrow-up', 'compare-list__arrow-up')
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="compare-list__row compare-list__row_with-hover {{$diffRoboAdvisors['summary']['summary'] ? 'js-identical-compare' : ''}}">
                                        <div class="compare-list__context js-compare-list-context">
                                            <div class="compare-list__row-name js-compare-list-name">
                                                SUMMARY
                                            </div>
                                            @foreach ($roboAdvisors as $roboAdvisor)
                                                <div class="compare-list__col js-compare-robo-{{$roboAdvisor->id}}">
                                                    @if ($roboAdvisor->summary)
                                                        {!! $roboAdvisor->summary !!}
                                                    @else
                                                        &mdash;
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @include('layouts/footer')
@endsection