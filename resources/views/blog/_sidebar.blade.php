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
