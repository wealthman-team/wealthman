require('./bootstrap');
window.noUiSlider = require('nouislider');

$(function () {
    $(document).click(function(e) {
        let $target = $(e.target);
        if (!$target.closest('.js-search-wrapp').length && $('.js-search-form.open').length) {
            $('.js-search-form').removeClass('open');
        }
    });

    $('.js-search-open').on('click', function (e) {
        e.preventDefault();
        $('.js-search-form').addClass('open');
    });
    $('.js-search-close').on('click', function (e) {
        e.preventDefault();
        $('.js-search-form').removeClass('open');
    });

    /** Robo Advisor **/
    $('.js-slide-box').each(function () {
        let slideBox = $(this);
        let slideBoxHeader = $('.js-slide-box-header', slideBox);
        let slideBoxBody = $('.js-slide-box-body', slideBox);

        if (slideBox.hasClass('active')) {
            slideBoxBody.show();
        }

        slideBoxHeader.on('click', function () {
            slideBox.toggleClass('active');
            slideBoxBody.stop().slideToggle(200);
        });
    });

    $('.js-range-slider').each(function () {
        let self = $(this);
        let sliderItem = $('.js-range-slider-item', self).get(0);
        let sliderHandle = $('.js-range-slider-handle', self).get(0);
        let minValue = $('.js-range-slider-min', self);
        let maxValue = $('.js-range-slider-max', self);
        let minInputValue = $('.js-range-slider-from', self);
        let maxInputValue = $('.js-range-slider-to', self);
        let min = self.data('min');
        let max = self.data('max');
        let current_max = self.data('current-max');
        let current_min = self.data('current-min');
        let step = self.data('step');
        let pre_prefix = self.data('pre-prefix');
        let post_prefix = self.data('post-prefix');
        let reduce = self.data('reduce');
        let isRange = self.data('isRange');
        let float = self.data('float');
        let range_factor = self.data('range-factor');

        if (!float) {
            current_max = current_max === '' || isNaN(parseInt(current_max)) ? max : parseInt(current_max);
            current_min = current_min === '' || isNaN(parseInt(current_min)) ? min : parseInt(current_min);
        }else{
            current_max = current_max === '' || isNaN(parseFloat(current_max)) ? max : parseFloat(current_max);
            current_min = current_min === '' || isNaN(parseFloat(current_min)) ? min : parseFloat(current_min);
        }

        if (isRange) {
            noUiSlider.create(sliderItem, {
                start: [
                    current_min !== '' ? current_min : min,
                    current_max !== '' ? current_max : max
                ],
                // step: step,
                connect: true,
                range: {
                    min: min,
                    '50%': ((max - min)/100*range_factor) + min,
                    max: max
                }
            });
        } else {
            noUiSlider.create(sliderItem, {
                start: current_max !== '' ? current_max : max,
                step: step,
                connect: [true, false],
                range: {
                    min: min,
                    max: max
                }
            });
        }

        sliderItem.noUiSlider.on('update', function (values) {
            minValue.html(pre_prefix + reduceNum(getValue(values[0])) + post_prefix);
            minInputValue.val(getValue(values[0]));
            if (isRange) {
                maxValue.html(pre_prefix + reduceNum(getValue(values[1])) + post_prefix);
                maxInputValue.val(getValue(values[1]));
            }
        });

        sliderItem.noUiSlider.on('change', function() {
            sliderHandle.checked = 'checked';
        });

        function getValue (value) {
            if (!float || value === '0.00') {
                value = Math.round(value);
            }

            return value;
        }

        function reduceNum(value)
        {
            let result;
            if (isNaN(value) || !reduce) {
                return value;
            }
            if (value >= 1000000000) {
                result = Math.floor(value/1000000000) + ' Bln';
            } else if (value >= 1000000) {
                result = Math.floor(value/1000000) + ' Mln';
            } else if (value >= 1000) {
                result = Math.floor(value/1000) + ' K';
            } else {
                result = value;
            }

            return result;
        }
    });

    $('.js-handle-filter-reset').on('click', function (e) {
        e.preventDefault();
        let form = $(this).parents('.js-handle-filter-submit');
        $('.js-range-slider', form).each(function () {
            let self = $(this);
            let minInputValue = $('.js-range-slider-from', self).get(0);
            let maxInputValue = $('.js-range-slider-to', self).get(0);
            let rangeCheckbox = $('.js-range-slider-handle', self).get(0);
            if(minInputValue) {
                minInputValue.disabled = 'disabled';
            }
            if(maxInputValue) {
                maxInputValue.disabled = 'disabled';
            }
            rangeCheckbox.disabled = 'disable';
        });
        $('.js-checkbox-input', form).each(function () {
            let checkbox = $(this).get(0);
            checkbox.disabled = 'disable';
        });

        let q = form.serialize().replace(/&?[\w\-\d_]+=&|&?[\w\-\d_]+=$/gi,"");
        let uri = form.get(0).getAttribute('action');
        let separator = uri.indexOf('?') !== -1 ? "&" : "?";
        window.location.href = uri + (q.length > 0 ? separator+q : "");
    });

    $(".js-handle-filter-submit").submit(function(e){
        e.preventDefault();
        let form = $(this);
        $('.js-range-slider', form).each(function () {
            let self = $(this);
            let minInputValue = $('.js-range-slider-from', self).get(0);
            let maxInputValue = $('.js-range-slider-to', self).get(0);
            let rangeCheckbox = $('.js-range-slider-handle', self).get(0);
            if(minInputValue && !rangeCheckbox.checked) {
                minInputValue.disabled = 'disabled';
            }
            if(maxInputValue && !rangeCheckbox.checked) {
                maxInputValue.disabled = 'disabled';
            }
            rangeCheckbox.disabled = 'disable';
        });
        let q = form.serialize().replace(/&?[\w\-\d_]+=&|&?[\w\-\d_]+=$/gi,"");
        let uri = this.getAttribute('action');
        let separator = uri.indexOf('?') !== -1 ? "&" : "?";
        window.location.href = uri + (q.length > 0 ? separator+q : "");
    });
    /** End Robo Advisor **/
});