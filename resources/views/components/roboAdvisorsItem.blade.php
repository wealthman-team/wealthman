<div class="robo-advisors-item js-ra-item">
    <div class="robo-advisors-item__header">
        <div class="robo-advisors-item__section robo-advisors-item__company">
            @if ($roboAdvisor->logo)
                <img src="{{ asset('storage/' . $roboAdvisor->logo) }}" />
            @endif
        </div>
        <div class="robo-advisors-item__section robo-advisors-item__rating">
            {{ $roboAdvisor->ratings->total }}
        </div>
        <div class="robo-advisors-item__section robo-advisors-item__recommendation">

            @if(count($roboAdvisor->reviews) > 0)
                @include('components/recommendation', [
                    'reviews' => $roboAdvisor->reviews
                ])
            @else
                <span style="color: #abb0ba">Be first</span>
            @endif

        </div>
        <div class="robo-advisors-item__section robo-advisors-item__account">
            @if ($roboAdvisor->minimum_account || $roboAdvisor->minimum_account === 0)
                ${{ $roboAdvisor->minimum_account }}
            @else
                N/A
            @endif
        </div>
        <div class="robo-advisors-item__section robo-advisors-item__fee">
            @if ($roboAdvisor->management_fee || $roboAdvisor->management_fee === 0.00)
                {{ $roboAdvisor->management_fee }}%
            @else
                N/A
            @endif
        </div>
        <div class="robo-advisors-item__section robo-advisors-item__aum">
            @if ($roboAdvisor->aum || $roboAdvisor->aum === 0)
                @if ($roboAdvisor->aum > 0)
                >
                @endif
                ${{ getAUMNum($roboAdvisor->aum) }}
            @else
                N/A
            @endif
        </div>
        <div class="robo-advisors-item__section robo-advisors-item__details">
            <div class="robo-advisors-item__promotions">
                @if ($roboAdvisor->promotions)
                    {{ $roboAdvisor->promotions }}
                @else
                    Promotions: None
                @endif
            </div>
            @if ($roboAdvisor->fee_details)
                <div class="robo-advisors-item__info">
                    {{ $roboAdvisor->fee_details }}
                </div>
            @endif
        </div>
        <div class="robo-advisors-item__section robo-advisors-item__actions">
            <ul>
                <li>
                    <a class="robo-advisors-item__sign-up" href="{{ redirectLink($roboAdvisor->referral_link) }}" target="_blank">Sign up</a>
                </li>
                <li>
                    <form class="robo-advisors-item__compare-form js-add-to-compare {{ in_array($roboAdvisor->id, $compareList) ? ' active' : '' }}" action="{{ route('toggleCompare') }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $roboAdvisor->id }}">
                        <button class="robo-advisors-item__compare-button" type="submit">Compare</button>
                    </form>
                </li>
                <li>
                    <a class="robo-advisors-item__review" href="{{ route('roboAdvisorsShow', $roboAdvisor->slug) }}">Review</a>
                </li>
            </ul>
        </div>
        <div class="robo-advisors-item__opener">
            @svg('arrow-long-down', 'robo-advisors-item__arrow-long-down')
        </div>
    </div>
    <div class="robo-advisors-item__body js-ra-item-body">
        <div class="robo-advisors-item__body-contant">
            <div class="robo-advisors-item__ratings">
                <div class="robo-advisors-item__rating-item">
                    <div class="robo-advisors-item__rating-name">
                        Commission & Fees
                    </div>
                    <div class="robo-advisors-item__rating-value">
                        {{ $roboAdvisor->ratings->commissions }}
                    </div>
                </div>
                <div class="robo-advisors-item__rating-item">
                    <div class="robo-advisors-item__rating-name">
                        Customer Service
                    </div>
                    <div class="robo-advisors-item__rating-value">
                        {{ $roboAdvisor->ratings->service }}
                    </div>
                </div>
                <div class="robo-advisors-item__rating-item">
                    <div class="robo-advisors-item__rating-name">
                        Ease of Use
                    </div>
                    <div class="robo-advisors-item__rating-value">
                        {{ $roboAdvisor->ratings->comfortable }}
                    </div>
                </div>
                <div class="robo-advisors-item__rating-item">
                    <div class="robo-advisors-item__rating-name">
                        Tools & Resources
                    </div>
                    <div class="robo-advisors-item__rating-value">
                        {{ $roboAdvisor->ratings->tools }}
                    </div>
                </div>
                <div class="robo-advisors-item__rating-item">
                    <div class="robo-advisors-item__rating-name">
                        Investment Options
                    </div>
                    <div class="robo-advisors-item__rating-value">
                        {{ $roboAdvisor->ratings->investment_options }}
                    </div>
                </div>
                <div class="robo-advisors-item__rating-item">
                    <div class="robo-advisors-item__rating-name">
                        Asset Allocation
                    </div>
                    <div class="robo-advisors-item__rating-value">
                        {{ $roboAdvisor->ratings->asset_allocation }}
                    </div>
                </div>
            </div>

            <div class="robo-advisors-item__description">
                <div class="robo-advisors-item__name">{{ $roboAdvisor->name }}</div>
                {!! $roboAdvisor->short_description !!}
            </div>

            <div class="robo-advisors-item__properties">
                <ul class="robo-advisors-item__properties-list">
                    <li class="robo-advisors-item__properties-item">
                        Accounts Available:
                        <strong>
                            {{ implode(', ', $roboAdvisor->account_types->pluck('name')->toArray()) }}
                        </strong>
                    </li>
                    <li class="robo-advisors-item__properties-item">
                        401(k) Assistance:
                        <strong>{{ $roboAdvisor->assistance_401k ? 'Yes' : 'No' }}</strong>
                    </li>
                    <li class="robo-advisors-item__properties-item">
                        Human Advice:
                        <strong>{{ $roboAdvisor->human_advisors ? 'Yes' : 'No' }}</strong>
                    </li>
                    <li class="robo-advisors-item__properties-item">
                        Tax Loss Harvesting:
                        @if ($roboAdvisor->tax_loss)
                            <strong>Yes {{ $roboAdvisor->tax_loss_details ? '— '.$roboAdvisor->tax_loss_details :''}}</strong>
                        @else
                            <strong>No</strong>
                        @endif
                    </li>
                    <li class="robo-advisors-item__properties-item">
                        Fractional Shares:
                        <strong>{{ $roboAdvisor->fractional_shares ? 'Yes' : 'No' }}</strong>
                    </li>
                    <li class="robo-advisors-item__properties-item">
                        Automatic Deposits:
                        <strong>{{ $roboAdvisor->automatic_deposits ? 'Yes' : 'No' }}</strong>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>