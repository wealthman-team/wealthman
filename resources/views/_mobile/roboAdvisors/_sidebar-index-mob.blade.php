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
                                    'pre_prefix' => $filterOption['pre_prefix'],
                                    'post_prefix' => $filterOption['post_prefix'],
                                    'reduce' => $filterOption['reduce'],
                                    'label' => $filterOption['label'],
                                    'name' => $filterOption['name'],
                                    'id' => $filterOption['id'],
                                    'isRange' => $filterOption['isRange'],
                                    'isActive' => $filterOption['isActive'],
                                    'float' => $filterOption['float'],
                                    'range_factor' => $filterOption['range_factor'],
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
        <div class="sidebar__footer-row">
            <div class="sidebar__footer-col">
                <button class="button-full-width button_success" type="submit">Apply</button>
            </div>
            <div class="sidebar__footer-col">
                <button class="button-full-width js-handle-filter-reset" type="reset">Clear</button>
            </div>
        </div>
    </div>
</form>