<div class="sidebar">
    <form class="js-handle-filter-submit" action="{{ qs_url(route('roboAdvisors'), $filtersOption['filter_queries']) }}" method="get" role="form" autocomplete="off">
        <div class="sidebar__inner">
            <div class="robo-advisors-filters">
                <div class="slide-box js-slide-box {{$filtersOption['general_is_active'] ? 'active' :''}}">
                    <div class="slide-box__header js-slide-box-header">
                        <div class="slide-box__title">
                            General
                        </div>
                        <div class="slide-box__arrow">
                            @svg('arrow-up', 'slide-box__arrow-up')
                        </div>
                    </div>
                    <div class="slide-box__body js-slide-box-body"
                         @if($filtersOption['general_is_active'])
                         style="display: block;"
                         @endif
                    >
                        @foreach($filtersOption['general'] as $filterOption)
                            @if($filterOption['type'] === 'range')
                                <div class="form-group">
                                    @include('components/rangeSlider', [
                                        'current_min' => $filterOption['current_min'],
                                        'current_max' => $filterOption['current_max'],
                                        'min' => $filterOption['min'],
                                        'max' => $filterOption['max'],
                                        'step' => $filterOption['step'],
                                        'unit' => $filterOption['unit'],
                                        'reduce' => $filterOption['reduce'],
                                        'label' => $filterOption['label'],
                                        'name' => $filterOption['name'],
                                        'id' => $filterOption['id'],
                                        'isRange' => $filterOption['isRange'],
                                        'isActive' => $filterOption['isActive'],
                                        'float' => $filterOption['float'],
                                    ])
                                </div>
                            @endif
                            @if($filterOption['type'] === 'checkbox')
                                <div class="form-group">
                                    <div class="form-group">
                                        @include('components/checkbox', [
                                            'id' => $filterOption['id'],
                                            'name' => $filterOption['name'],
                                            'isActive' => $filterOption['isActive'],
                                            'inline' => true,
                                        ])
                                        <label
                                                class="label label_inline"
                                                for="{{ $filterOption['name'] }}"
                                        >
                                            {{ $filterOption['label'] }}
                                        </label>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        {{--<div class="form-group">--}}
                            {{--@include('components/rangeSlider', [--}}
                                {{--'min' => 0,--}}
                                {{--'max' => 10,--}}
                                {{--'step' => 0.5,--}}
                                {{--'unit' => '',--}}
                                {{--'label' => 'Rating',--}}
                                {{--'name' => 'rating',--}}
                                {{--'id' => 'rating',--}}
                                {{--'isRange' => true,--}}
                            {{--])--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--@include('components/rangeSlider', [--}}
                                {{--'min' => 0,--}}
                                {{--'max' => 1,--}}
                                {{--'step' => 0.01,--}}
                                {{--'unit' => '',--}}
                                {{--'label' => 'Minimum account',--}}
                                {{--'name' => 'minimum_account',--}}
                                {{--'id' => 'minimum_account',--}}
                                {{--'isRange' => true,--}}
                            {{--])--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--@include('components/rangeSlider', [--}}
                                {{--'min' => 0,--}}
                                {{--'max' => 100,--}}
                                {{--'step' => 0.25,--}}
                                {{--'unit' => '%',--}}
                                {{--'label' => 'Fees',--}}
                                {{--'name' => 'fees',--}}
                                {{--'id' => 'fees',--}}
                                {{--'isRange' => true,--}}
                            {{--])--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--@include('components/rangeSlider', [--}}
                                {{--'current_min' => 0,--}}
                                {{--'current_max' => 2,--}}
                                {{--'min' => 0,--}}
                                {{--'max' => 2,--}}
                                {{--'step' => 0.001,--}}
                                {{--'unit' => 'm',--}}
                                {{--'label' => 'AUM',--}}
                                {{--'name' => 'aum',--}}
                                {{--'id' => 'aum',--}}
                                {{--'isRange' => false,--}}
                                {{--'isActive' => false,--}}
                            {{--])--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--@include('components/rangeSlider', [--}}
                                {{--'min' => 0,--}}
                                {{--'max' => 2000,--}}
                                {{--'step' => 1,--}}
                                {{--'unit' => '',--}}
                                {{--'label' => 'Number of Users',--}}
                                {{--'name' => 'number_users',--}}
                                {{--'id' => 'number_users',--}}
                                {{--'isRange' => true,--}}
                                {{--'round' => true,--}}
                            {{--])--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--@include('components/rangeSlider', [--}}
                                {{--'min' => 10,--}}
                                {{--'max' => 1000,--}}
                                {{--'step' => 10,--}}
                                {{--'unit' => 'k',--}}
                                {{--'label' => 'Average Account Size',--}}
                                {{--'name' => 'account_size',--}}
                                {{--'id' => 'account_size',--}}
                                {{--'isRange' => true,--}}
                                {{--'round' => true,--}}
                            {{--])--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--@include('components/rangeSlider', [--}}
                                {{--'min' => 2008,--}}
                                {{--'max' => 2018,--}}
                                {{--'step' => 1,--}}
                                {{--'unit' => '',--}}
                                {{--'label' => 'Year Founded',--}}
                                {{--'name' => 'year_founded',--}}
                                {{--'id' => 'year_founded',--}}
                                {{--'isRange' => true,--}}
                                {{--'round' => true,--}}
                            {{--])--}}
                        {{--</div>--}}
                    </div>
                </div>

                <div class="slide-box js-slide-box {{$filtersOption['services_is_active'] ? 'active' :''}}">
                    <div class="slide-box__header js-slide-box-header">
                        <div class="slide-box__title">
                            Services
                        </div>
                        <div class="slide-box__arrow">
                            @svg('arrow-up', 'slide-box__arrow-up')
                        </div>
                    </div>
                    <div class="slide-box__body js-slide-box-body"
                     @if($filtersOption['services_is_active'])
                        style="display: block;"
                     @endif
                    >
                        @foreach($filtersOption['services'] as $filterOption)
                            @if($filterOption['type'] === 'checkbox')
                                <div class="form-group">
                                    <div class="form-group">
                                        @include('components/checkbox', [
                                            'id' => $filterOption['id'],
                                            'name' => $filterOption['name'],
                                            'isActive' => $filterOption['isActive'],
                                            'inline' => true,
                                        ])
                                        <label
                                            class="label label_inline"
                                            for="{{ $filterOption['name'] }}"
                                        >
                                            {{ $filterOption['label'] }}
                                        </label>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                <div class="slide-box js-slide-box {{$filtersOption['features_is_active'] ? 'active' :''}}">
                    <div class="slide-box__header js-slide-box-header">
                        <div class="slide-box__title">
                            Features
                        </div>
                        <div class="slide-box__arrow">
                            @svg('arrow-up', 'slide-box__arrow-up')
                        </div>
                    </div>
                    <div class="slide-box__body js-slide-box-body"
                     @if($filtersOption['features_is_active'])
                        style="display: block;"
                     @endif
                    >
                        @foreach($filtersOption['features'] as $filterOption)
                            @if($filterOption['type'] === 'checkbox')
                                <div class="form-group">
                                    <div class="form-group">
                                        @include('components/checkbox', [
                                            'id' => $filterOption['id'],
                                            'name' => $filterOption['name'],
                                            'isActive' => $filterOption['isActive'],
                                            'inline' => true,
                                        ])
                                        <label
                                            class="label label_inline"
                                            for="{{ $filterOption['name'] }}"
                                        >
                                            {{ $filterOption['label'] }}
                                        </label>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="sidebar__footer">
            <button class="button button_success" type="submit">Apply</button>
            <button class="button" type="reset">Clear</button>
        </div>
    </form>
</div>