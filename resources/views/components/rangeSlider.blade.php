<div class="range-slider js-range-slider"
     data-current-min="{{ $current_min }}"
     data-current-max="{{ $current_max }}"
     data-min="{{ $min }}"
     data-max="{{ $max }}"
     data-step="{{ $step }}"
     data-pre-prefix="{{ $pre_prefix }}"
     data-post-prefix="{{ $post_prefix }}"
     data-reduce="{{ $reduce }}"
     data-is-range="{{ $isRange }}"
     data-float="{{ isSet($float) ? $float : '' }}"
     data-range-factor="{{ $range_factor }}"
>
    <div class="range-slider__header user-select">
        <div class="range-slider__checkbox">
            <div class="checkbox checkbox_inline">
                <input class="js-range-slider-handle" id="{{ $id }}_checkbox" name="{{ $name }}_checkbox" type="checkbox" {{ $isActive ? 'checked="checked"' : ''}}>
                <div class="checkbox__icon-container">
                    @svg('check', 'checkbox__icon')
                </div>
            </div>
            <label class="label label_inline" for="{{ $id }}_checkbox">{{ $label }}</label>
        </div>
        <div class="range-slider__values">
            <span class="js-range-slider-min">{{ $current_min && $current_min !== '' ? $current_min : $min }}</span>
            @if ($isRange)
                -
                <span class="js-range-slider-max">{{ $current_max && $current_max !== '' ? $current_max : $max }}</span>
            @endif
        </div>
    </div>

    <div class="range-slider__body">
        <div class="range-slider__slider js-range-slider-item"></div>
        <input class="js-range-slider-from" type="hidden" name="{{ $name }}_from" value="">

        @if ($isRange)
            <input class="js-range-slider-to" type="hidden" name="{{ $name }}_to" value="">
        @endif
    </div>
</div>