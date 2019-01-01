<div class="range-slider js-range-slider"
     data-min="{{ $min }}"
     data-max="{{ $max}}"
     data-step="{{ $step }}"
     data-unit="{{ $unit }}"
     data-is-range="{{ $isRange }}"
     data-round="{{ isSet($round) ? $round : '' }}"
>
    <div class="range-slider__header user-select">
        <div class="range-slider__checkbox">
            <div class="checkbox checkbox_inline">
                <input class="js-range-slider-handle" id="{{ $id }}_checkbox" name="{{ $name }}_checkbox" type="checkbox">
                <div class="checkbox__icon-container">
                    @svg('check', 'checkbox__icon')
                </div>
            </div>
            <label class="label label_inline" for="{{ $id }}_checkbox">{{ $label }}</label>
        </div>
        <div class="range-slider__values">
            <span class="js-range-slider-min">{{ old($name . '_from') ?? $min }}</span>
            @if ($isRange)
                -
                <span class="js-range-slider-max">{{ old($name . '_to') ?? $max }}</span>
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