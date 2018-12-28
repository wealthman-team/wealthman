@extends('layouts.app')

@section('content')
    @include('layouts/header')

    <div class="content">
        <div class="compare">
            @include('components/breadcrumbs', [
                'breadcrumbs' => [[
                    'name' => 'Home',
                    'link' => route('home'),
                ],[
                    'name' => 'Compare',
                ]]
            ])

            <div class="container">
                <h1 class="page-header">
                    Comparison of robo advisors
                </h1>
                <div class="page-sub-header">
                    &nbsp;
                    @if (count($roboAdvisors) === 0)
                        Oh, there is nothing here
                    @endif
                </div>

                <div class="compare__container">
                    @if (count($roboAdvisors) === 0)
                        <div class="compare__empty">
                            You can add an robo advisors from the
                            <a class="link link_active" href="#">directory</a>
                        </div>
                    @else
                        <div class="compare__actions-list">
                            <span>Show:</span>
                            <a class="link compare__action-item">Differing сharacteristics</a>
                            <a class="link link_active compare__action-item">All сharacteristics</a>
                            <a class="link link_red compare__action-item">Delete list</a>
                        </div>
                    @endif

                    @if (count($roboAdvisors) > 0)
                        <div class="compare-list js-compare-list" data-cl-length="{{ count($roboAdvisors) }}">
                            <div class="compare-list__nav">
                                <div class="compare-list__nav-left js-compare-list-prev">@svg('arrow-long-left', 'compare-list__arrow')</div>
                                <div class="compare-list__nav-right js-compare-list-next">@svg('arrow-long-left', 'compare-list__arrow')</div>
                            </div>
                            <div class="compare-list__inner">

                                <div class="compare-list__group js-compare-list-group">
                                    <div class="compare-list__row">
                                        <div class="compare-list__context js-compare-list-context">
                                            @foreach ($roboAdvisors as $roboAdvisor)
                                                <div class="compare-list__col compare-list__col_header">
                                                    <div class="compare-list__logo">
                                                        @if ($roboAdvisor->logo)
                                                            <img src="{{ asset('storage/' . $roboAdvisor->logo) }}" />
                                                        @endif
                                                    </div>
                                                    <div class="compare-list__actions">
                                                        <a class="link link_active" href="{{ $roboAdvisor->referral_link }}">Sign up</a>
                                                        <a class="link" href="{{ route('roboAdvisorsShow', $roboAdvisor) }}">Review</a>
                                                        <a class="link" href="#">
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

                                <div class="compare-list__group compare-list__group_with-header js-compare-list-group">
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
                                                <div class="compare-list__col">
                                                    @include('components/recommendation', [
                                                        'text' => 'Strongly recommended',
                                                        'yes' => 10,
                                                        'maybe' => 2,
                                                        'no' => 5,
                                                        'total' => 17,
                                                    ])
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="compare-list__row compare-list__row_with-hover">
                                        <div class="compare-list__context js-compare-list-context">
                                            <div class="compare-list__row-name js-compare-list-name">
                                                Rating
                                            </div>
                                            @foreach ($roboAdvisors as $roboAdvisor)
                                                <div class="compare-list__col">
                                                    {{ $roboAdvisor->rating->total }}
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="compare-list__row compare-list__row_with-hover">
                                        <div class="compare-list__context js-compare-list-context">
                                            <div class="compare-list__row-name js-compare-list-name">
                                                Commission & Fees
                                            </div>
                                            @foreach ($roboAdvisors as $roboAdvisor)
                                                <div class="compare-list__col">
                                                    {{ $roboAdvisor->rating->commissions }}
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="compare-list__row compare-list__row_with-hover">
                                        <div class="compare-list__context js-compare-list-context">
                                            <div class="compare-list__row-name js-compare-list-name">
                                                Customer Service
                                            </div>
                                            @foreach ($roboAdvisors as $roboAdvisor)
                                                <div class="compare-list__col">
                                                    {{ $roboAdvisor->rating->service }}
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="compare-list__row compare-list__row_with-hover">
                                        <div class="compare-list__context js-compare-list-context">
                                            <div class="compare-list__row-name js-compare-list-name">
                                                Ease of Use
                                            </div>
                                            @foreach ($roboAdvisors as $roboAdvisor)
                                                <div class="compare-list__col">
                                                    {{ $roboAdvisor->rating->comfortable }}
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="compare-list__row compare-list__row_with-hover">
                                        <div class="compare-list__context js-compare-list-context">
                                            <div class="compare-list__row-name js-compare-list-name">
                                                Tools & Resources
                                            </div>
                                            @foreach ($roboAdvisors as $roboAdvisor)
                                                <div class="compare-list__col">
                                                    {{ $roboAdvisor->rating->tools }}
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="compare-list__row compare-list__row_with-hover">
                                        <div class="compare-list__context js-compare-list-context">
                                            <div class="compare-list__row-name js-compare-list-name">
                                                Investment Options
                                            </div>
                                            @foreach ($roboAdvisors as $roboAdvisor)
                                                <div class="compare-list__col">
                                                    {{ $roboAdvisor->rating->investment_options }}
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="compare-list__row compare-list__row_with-hover">
                                        <div class="compare-list__context js-compare-list-context">
                                            <div class="compare-list__row-name js-compare-list-name">
                                                Asset Allocation
                                            </div>
                                            @foreach ($roboAdvisors as $roboAdvisor)
                                                <div class="compare-list__col">
                                                    {{ $roboAdvisor->rating->asset_allocation }}
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="compare-list__row compare-list__row_with-hover">
                                        <div class="compare-list__context js-compare-list-context">
                                            <div class="compare-list__row-name js-compare-list-name">
                                                MINIMUM ACCOUNT
                                            </div>
                                            @foreach ($roboAdvisors as $roboAdvisor)
                                                <div class="compare-list__col">
                                                    @if ($roboAdvisor->minimum_account)
                                                        ${{ $roboAdvisor->minimum_account }}
                                                    @else
                                                        &mdash;
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="compare-list__row compare-list__row_with-hover">
                                        <div class="compare-list__context js-compare-list-context">
                                            <div class="compare-list__row-name js-compare-list-name">
                                                FEES
                                            </div>
                                            @foreach ($roboAdvisors as $roboAdvisor)
                                                <div class="compare-list__col">
                                                    @if ($roboAdvisor->management_fee)
                                                        {{ $roboAdvisor->management_fee }}%/year
                                                    @else
                                                        &mdash;
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="compare-list__row compare-list__row_with-hover">
                                        <div class="compare-list__context js-compare-list-context">
                                            <div class="compare-list__row-name js-compare-list-name">
                                                ADDITIONAL INFORMATION
                                                ABOUT MANAGEMENT FEE
                                            </div>
                                            @foreach ($roboAdvisors as $roboAdvisor)
                                                <div class="compare-list__col">
                                                    @if ($roboAdvisor->fee_details)
                                                        {{ $roboAdvisor->fee_details }}
                                                    @else
                                                        &mdash;
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="compare-list__row compare-list__row_with-hover">
                                        <div class="compare-list__context js-compare-list-context">
                                            <div class="compare-list__row-name js-compare-list-name">
                                                ASSETS UNDER MANAGEMENT
                                            </div>
                                            @foreach ($roboAdvisors as $roboAdvisor)
                                                <div class="compare-list__col">
                                                    @if ($roboAdvisor->aum)
                                                        ${{ getAUMNum($roboAdvisor->aum) }}
                                                    @else
                                                        &mdash;
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="compare-list__row compare-list__row_with-hover">
                                        <div class="compare-list__context js-compare-list-context">
                                            <div class="compare-list__row-name js-compare-list-name">
                                                NUMBER OF USERS
                                            </div>
                                            @foreach ($roboAdvisors as $roboAdvisor)
                                                <div class="compare-list__col">
                                                    @if ($roboAdvisor->number_accounts)
                                                        {{ $roboAdvisor->number_accounts }}
                                                    @else
                                                        &mdash;
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="compare-list__row compare-list__row_with-hover">
                                        <div class="compare-list__context js-compare-list-context">
                                            <div class="compare-list__row-name js-compare-list-name">
                                                AVERAGE ACCOUNT SIZE
                                            </div>
                                            @foreach ($roboAdvisors as $roboAdvisor)
                                                <div class="compare-list__col">
                                                    @if ($roboAdvisor->average_account_size)
                                                        {{ $roboAdvisor->average_account_size }}
                                                    @else
                                                        &mdash;
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="compare-list__row compare-list__row_with-hover">
                                        <div class="compare-list__context js-compare-list-context">
                                            <div class="compare-list__row-name js-compare-list-name">
                                                YEAR FOUNDED
                                            </div>
                                            @foreach ($roboAdvisors as $roboAdvisor)
                                                <div class="compare-list__col">
                                                    @if ($roboAdvisor->founded)
                                                        {{ $roboAdvisor->founded }}
                                                    @else
                                                        &mdash;
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="compare-list__row compare-list__row_with-hover">
                                        <div class="compare-list__context js-compare-list-context">
                                            <div class="compare-list__row-name js-compare-list-name">
                                                PROMOTIONS
                                            </div>
                                            @foreach ($roboAdvisors as $roboAdvisor)
                                                <div class="compare-list__col">
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

                                <div class="compare-list__group compare-list__group_with-header js-compare-list-group">
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

                                    <div class="compare-list__row compare-list__row_with-hover">
                                        <div class="compare-list__context js-compare-list-context">
                                            <div class="compare-list__row-name js-compare-list-name">
                                                HUMAN ADVISORS
                                            </div>
                                            @foreach ($roboAdvisors as $roboAdvisor)
                                                <div class="compare-list__col">
                                                    @if ($roboAdvisor->human_advisors)
                                                        {{ $roboAdvisor->human_advisors }}
                                                    @else
                                                        &mdash;
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="compare-list__row compare-list__row_with-hover">
                                        <div class="compare-list__context js-compare-list-context">
                                            <div class="compare-list__row-name js-compare-list-name">
                                                ADDITIONAL INFORMATION
                                                ABOUT HUMAN ADVISORS
                                            </div>
                                            @foreach ($roboAdvisors as $roboAdvisor)
                                                <div class="compare-list__col">
                                                    @if ($roboAdvisor->human_advisors_details)
                                                        {{ $roboAdvisor->human_advisors_details }}
                                                    @else
                                                        &mdash;
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="compare-list__row compare-list__row_with-hover">
                                        <div class="compare-list__context js-compare-list-context">
                                            <div class="compare-list__row-name js-compare-list-name">
                                                PORTFOLIO REBALANCING
                                            </div>
                                            @foreach ($roboAdvisors as $roboAdvisor)
                                                <div class="compare-list__col">
                                                    @if ($roboAdvisor->portfolio_rebalancing)
                                                        {{ $roboAdvisor->portfolio_rebalancing }}
                                                    @else
                                                        &mdash;
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="compare-list__row compare-list__row_with-hover">
                                        <div class="compare-list__context js-compare-list-context">
                                            <div class="compare-list__row-name js-compare-list-name">
                                                AUTOMATIC DEPOSITS
                                            </div>
                                            @foreach ($roboAdvisors as $roboAdvisor)
                                                <div class="compare-list__col">
                                                    @if ($roboAdvisor->automatic_deposits)
                                                        @svg('check', 'robo-advisor__check')
                                                    @else
                                                        &mdash;
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="compare-list__row compare-list__row_with-hover">
                                        <div class="compare-list__context js-compare-list-context">
                                            <div class="compare-list__row-name js-compare-list-name">
                                                ACCES
                                            </div>
                                            @foreach ($roboAdvisors as $roboAdvisor)
                                                <div class="compare-list__col">
                                                    @if ($roboAdvisor->access_platforms)
                                                        {{ $roboAdvisor->access_platforms }}
                                                    @else
                                                        &mdash;
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="compare-list__row compare-list__row_with-hover">
                                        <div class="compare-list__context js-compare-list-context">
                                            <div class="compare-list__row-name js-compare-list-name">
                                                TWO-FACTOR
                                                AUTHENTICATION
                                            </div>
                                            @foreach ($roboAdvisors as $roboAdvisor)
                                                <div class="compare-list__col">
                                                    @if ($roboAdvisor->two_factor_auth)
                                                        @svg('check', 'robo-advisor__check')
                                                    @else
                                                        &mdash;
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="compare-list__row compare-list__row_with-hover">
                                        <div class="compare-list__context js-compare-list-context">
                                            <div class="compare-list__row-name js-compare-list-name">
                                                CUSTOMER SERVICE
                                            </div>
                                            @foreach ($roboAdvisors as $roboAdvisor)
                                                <div class="compare-list__col">
                                                    @if ($roboAdvisor->customer_service)
                                                        {{ $roboAdvisor->customer_service }}
                                                    @else
                                                        &mdash;
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="compare-list__row compare-list__row_with-hover">
                                        <div class="compare-list__context js-compare-list-context">
                                            <div class="compare-list__row-name js-compare-list-name">
                                                CLEARING AGENCY
                                            </div>
                                            @foreach ($roboAdvisors as $roboAdvisor)
                                                <div class="compare-list__col">
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

                                <div class="compare-list__group compare-list__group_with-header js-compare-list-group">
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
                                                <div class="compare-list__col compare-list__col_header">
                                                    <table class="robo-advisor__simple-table">
                                                        <tbody>
                                                        @foreach($accountTypes as $accountType)
                                                            <tr>
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

                                <div class="compare-list__group compare-list__group_with-header js-compare-list-group">
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

                                    <div class="compare-list__row compare-list__row_with-hover">
                                        <div class="compare-list__context js-compare-list-context">
                                            <div class="compare-list__row-name js-compare-list-name">
                                                FRACTIONAL SHARES
                                            </div>
                                            @foreach ($roboAdvisors as $roboAdvisor)
                                                <div class="compare-list__col">
                                                    @if ($roboAdvisor->fractional_shares)
                                                        @svg('check', 'robo-advisor__check')
                                                    @else
                                                        &mdash;
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="compare-list__row compare-list__row_with-hover">
                                        <div class="compare-list__context js-compare-list-context">
                                            <div class="compare-list__row-name js-compare-list-name">
                                                401(K) GUIDANCE
                                            </div>
                                            @foreach ($roboAdvisors as $roboAdvisor)
                                                <div class="compare-list__col">
                                                    @if ($roboAdvisor->assistance_401k)
                                                        @svg('check', 'robo-advisor__check')
                                                    @else
                                                        &mdash;
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="compare-list__row compare-list__row_with-hover">
                                        <div class="compare-list__context js-compare-list-context">
                                            <div class="compare-list__row-name js-compare-list-name">
                                                TAX LOSS HARVESTING
                                            </div>
                                            @foreach ($roboAdvisors as $roboAdvisor)
                                                <div class="compare-list__col">
                                                    @if ($roboAdvisor->tax_loss)
                                                        @svg('check', 'robo-advisor__check')
                                                    @else
                                                        &mdash;
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="compare-list__row compare-list__row_with-hover">
                                        <div class="compare-list__context js-compare-list-context">
                                            <div class="compare-list__row-name js-compare-list-name">
                                                ADDITIONAL INFORMATION
                                                ABOUT TAX LOSS
                                                HARVESTING
                                            </div>
                                            @foreach ($roboAdvisors as $roboAdvisor)
                                                <div class="compare-list__col">
                                                    @if ($roboAdvisor->tax_loss_details)
                                                        {{ $roboAdvisor->tax_loss_details }}
                                                    @else
                                                        &mdash;
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="compare-list__row compare-list__row_with-hover">
                                        <div class="compare-list__context js-compare-list-context">
                                            <div class="compare-list__row-name js-compare-list-name">
                                                RETIREMENT PLANNING TOOLS
                                            </div>
                                            @foreach ($roboAdvisors as $roboAdvisor)
                                                <div class="compare-list__col">
                                                    @if ($roboAdvisor->retirement_planning)
                                                        @svg('check', 'robo-advisor__check')
                                                    @else
                                                        &mdash;
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="compare-list__row compare-list__row_with-hover">
                                        <div class="compare-list__context js-compare-list-context">
                                            <div class="compare-list__row-name js-compare-list-name">
                                                SELF CLEARING
                                            </div>
                                            @foreach ($roboAdvisors as $roboAdvisor)
                                                <div class="compare-list__col">
                                                    @if ($roboAdvisor->self_clearing)
                                                        @svg('check', 'robo-advisor__check')
                                                    @else
                                                        &mdash;
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="compare-list__row compare-list__row_with-hover">
                                        <div class="compare-list__context js-compare-list-context">
                                            <div class="compare-list__row-name js-compare-list-name">
                                                SMART BETA
                                            </div>
                                            @foreach ($roboAdvisors as $roboAdvisor)
                                                <div class="compare-list__col">
                                                    @if ($roboAdvisor->smart_beta)
                                                        @svg('check', 'robo-advisor__check')
                                                    @else
                                                        &mdash;
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="compare-list__row compare-list__row_with-hover">
                                        <div class="compare-list__context js-compare-list-context">
                                            <div class="compare-list__row-name js-compare-list-name">
                                                SOCIALLY RESPONSIBLE INVESTING
                                            </div>
                                            @foreach ($roboAdvisors as $roboAdvisor)
                                                <div class="compare-list__col">
                                                    @if ($roboAdvisor->responsible_investing)
                                                        @svg('check', 'robo-advisor__check')
                                                    @else
                                                        &mdash;
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="compare-list__row compare-list__row_with-hover">
                                        <div class="compare-list__context js-compare-list-context">
                                            <div class="compare-list__row-name js-compare-list-name">
                                                INVESTS IN COMMODITIES
                                            </div>
                                            @foreach ($roboAdvisors as $roboAdvisor)
                                                <div class="compare-list__col">
                                                    @if ($roboAdvisor->invests_commodities)
                                                        @svg('check', 'robo-advisor__check')
                                                    @else
                                                        &mdash;
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="compare-list__row compare-list__row_with-hover">
                                        <div class="compare-list__context js-compare-list-context">
                                            <div class="compare-list__row-name js-compare-list-name">
                                                INVESTS IN REAL ESTATE
                                            </div>
                                            @foreach ($roboAdvisors as $roboAdvisor)
                                                <div class="compare-list__col">
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

                                <div class="compare-list__group compare-list__group_with-header js-compare-list-group">
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

                                    <div class="compare-list__row compare-list__row_with-hover">
                                        <div class="compare-list__context js-compare-list-context">
                                            <div class="compare-list__row-name js-compare-list-name">
                                                NO INFORMATION
                                            </div>
                                            @foreach ($roboAdvisors as $roboAdvisor)
                                                <div class="compare-list__col">
                                                    &mdash;
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <div class="compare-list__group compare-list__group_with-header js-compare-list-group">
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

                                    <div class="compare-list__row compare-list__row_with-hover">
                                        <div class="compare-list__context js-compare-list-context">
                                            <div class="compare-list__row-name js-compare-list-name">
                                                SUMMARY
                                            </div>
                                            @foreach ($roboAdvisors as $roboAdvisor)
                                                <div class="compare-list__col">
                                                    Betterment is equally a good starting point for beginning
                                                    investors and a useful platform for more experienced
                                                    investors. The robo advisor has no minimum deposit and
                                                    costs 0.25% annually. If you need the assistance, it
                                                    recently added human advisors who can assist with your
                                                    retirement account. Unfortunately, Betterment's asset
                                                    allocation excludes REITs or commodities.
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