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