<table class="robo-table">
    <tr class="robo-table__row-head">
        <th class="robo-table__col">
            <div class="robo-table__layout">&nbsp;</div>
            <div class="robo-table__name-container">
                <a href="{{sort_url('company')}}" class="robo-table__lh">
                    Company
                    <span class="sort-icon {{sort_type('company')}}"></span>
                </a>
            </div>
        </th>
        <th class="robo-table__col">
            <a href="{{sort_url('rating')}}" class="robo-table__lh">
                Rating
                <span class="sort-icon {{sort_type('rating')}}"></span>
            </a>
        </th>
        <th class="robo-table__col">
            <div class="robo-table__lh">
                Recommendation
            </div>
        </th>
        <th class="robo-table__col">
            <a href="{{sort_url('account')}}" class="robo-table__lh">
                Min account
                <span class="sort-icon {{sort_type('account')}}"></span>
            </a>
        </th>
        <th class="robo-table__col">
            <a href="{{sort_url('fee')}}" class="robo-table__lh">
                Fee
                <span class="sort-icon {{sort_type('fee')}}"></span>
            </a>
        </th>
        <th class="robo-table__col">
            <a href="{{sort_url('aum')}}" class="robo-table__lh">
                AUM
                <span class="sort-icon {{sort_type('aum')}}"></span>
            </a>
        </th>
        <th class="robo-table__col">
            <div class="robo-table__lh">
                Additional details
            </div>
        </th>
    </tr>

    @if(count($roboAdvisors) > 0)
        @foreach($roboAdvisors as $roboAdvisor)
        <tr class="robo-table__row js-robo-row">
            <td class="robo-table__col">
                <div class="robo-table__layout">&nbsp;</div>
                <div class="robo-table__overlay">&nbsp;</div>
                <div class="robo-table__name-container">
                    @if ($roboAdvisor->logo)
                        <img class="robo-table__name" src="{{ asset('storage/' . $roboAdvisor->logo) }}" alt=""/>
                    @else
                        <span class="robo-table__name">{{$roboAdvisor->name}}</span>
                    @endif

                    <div class="robo-table__opener js-robo-opener">
                        @svg('arrow-long-down', 'robo-table__arrow-long-down')
                    </div>
                </div>
            </td>
            <td class="robo-table__col">
                {{ $roboAdvisor->ratings->total }}
            </td>
            <td class="robo-table__col">
                <div class="robo-table__recommendation">
                    @if(count($roboAdvisor->reviews) > 0)
                        @include('_mobile/_components/recommendation', [
                            'reviews' => $roboAdvisor->reviews
                        ])
                    @else
                        <span class="color-gray">Be first</span>
                    @endif
                </div>
            </td>
            <td class="robo-table__col">
                @if ($roboAdvisor->minimum_account || $roboAdvisor->minimum_account === 0)
                    ${{ $roboAdvisor->minimum_account }}
                @else
                    N/A
                @endif
            </td>
            <td class="robo-table__col">
                <div class="robo-table__fee">
                    @if ($roboAdvisor->management_fee || $roboAdvisor->management_fee === 0.00)
                        {{ $roboAdvisor->management_fee }}%
                    @else
                        N/A
                    @endif
                </div>
            </td>
            <td class="robo-table__col nowrap">
                @if ($roboAdvisor->aum || $roboAdvisor->aum === 0)
                    @if ($roboAdvisor->aum > 0)
                        >
                    @endif
                    ${{ getAUMNum($roboAdvisor->aum) }}
                @else
                    N/A
                @endif
            </td>
            <td class="robo-table__col">
                <div class="robo-table__prom">
                    @if ($roboAdvisor->promotions)
                        {{ $roboAdvisor->promotions }}
                    @else
                        Promotions: None
                    @endif
                </div>
                @if ($roboAdvisor->fee_details)
                    <div class="robo-table__prom-info">
                        {{ $roboAdvisor->fee_details }}
                    </div>
                @endif
            </td>
        </tr>
        <tr class="robo-table__row-content js-robo-row-content">
            <td class="robo-table__col">
                <div class="robo-table__col-wr js-robo-wr">
                    <div class="robo-table__rating-name">
                        Commission & Fees
                    </div>
                    <div class="robo-table__rating-name">
                        Customer Service
                    </div>
                    <div class="robo-table__rating-name">
                        Ease of Use
                    </div>
                    <div class="robo-table__rating-name">
                        Tools & Resources
                    </div>
                    <div class="robo-table__rating-name">
                        Investment Options
                    </div>
                    <div class="robo-table__rating-name">
                        Asset Allocation
                    </div>
                </div>
            </td>
            <td class="robo-table__col">
                <div class="robo-table__col-wr js-robo-wr">
                    <div class="robo-table__rating">
                        {{ $roboAdvisor->ratings->commissions }}
                    </div>
                    <div class="robo-table__rating">
                        {{ $roboAdvisor->ratings->service }}
                    </div>
                    <div class="robo-table__rating">
                        {{ $roboAdvisor->ratings->comfortable }}
                    </div>
                    <div class="robo-table__rating">
                        {{ $roboAdvisor->ratings->tools }}
                    </div>
                    <div class="robo-table__rating">
                        {{ $roboAdvisor->ratings->investment_options }}
                    </div>
                    <div class="robo-table__rating">
                        {{ $roboAdvisor->ratings->asset_allocation }}
                    </div>
                </div>
            </td>
            <td class="robo-table__col" colspan="4">
                <div class="robo-table__col-wr js-robo-wr">
                    <div class="robo-table__full-name">{{ $roboAdvisor->name }}</div>
                    {!! $roboAdvisor->short_description !!}
                </div>
            </td>
            <td class="robo-table__col">
                <div class="robo-table__col-wr js-robo-wr">
                    <ul class="robo-table__accounts">
                        <li>
                            Accounts Available:
                            <strong>
                                {{ implode(', ', $roboAdvisor->account_types->pluck('name')->toArray()) }}
                            </strong>
                        </li>
                        <li>
                            401(k) Assistance:
                            <strong>{{ $roboAdvisor->assistance_401k ? 'Yes' : 'No' }}</strong>
                        </li>
                        <li>
                            Human Advice:
                            <strong>{{ $roboAdvisor->human_advisors ? 'Yes' : 'No' }}</strong>
                        </li>
                        <li>
                            Tax Loss Harvesting:
                            @if ($roboAdvisor->tax_loss)
                                <strong>Yes {{ $roboAdvisor->tax_loss_details ? '— '.$roboAdvisor->tax_loss_details :''}}</strong>
                            @else
                                <strong>No</strong>
                            @endif
                        </li>
                        <li>
                            Fractional Shares:
                            <strong>{{ $roboAdvisor->fractional_shares ? 'Yes' : 'No' }}</strong>
                        </li>
                        <li>
                            Automatic Deposits:
                            <strong>{{ $roboAdvisor->automatic_deposits ? 'Yes' : 'No' }}</strong>
                        </li>
                    </ul>
                </div>
            </td>
        </tr>
        @endforeach
    @else
        <tr class="robo-table__row-empty">
            <td class="robo-table__col-empty" colspan="7">
                Oops, nothing found matching your criteria.<br> Remove some features and try again.
            </td>
        </tr>
    @endif
</table>