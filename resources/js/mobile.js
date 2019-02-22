require('./bootstrap');
window.noUiSlider = require('nouislider');
require('malihu-custom-scrollbar-plugin');

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

    /** Robo Advisor Filters **/
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
    /** End Robo Advisor Filters**/
    /** Robo Advisor list**/
    $('.js-robo-opener').on('click', function (e) {
        let opener_id = $(this).attr('data-id-robo-opener');
        let $robo_openers = $('.js-robo-opener[data-id-robo-opener="'+opener_id+'"]');

        if ($robo_openers.parents('.js-robo-row:first').hasClass('open')) {
            $robo_openers.parents('.js-robo-row')
                .next('.js-robo-row-content')
                .find('.js-robo-action-overlay').fadeOut(100, function () {
                    $robo_openers.removeClass('open');
                    $robo_openers.parents('.js-robo-row')
                        .removeClass('open')
                        .next('.js-robo-row-content')
                        .find('.js-robo-wr')
                        .stop().slideUp(300);
                });

        } else {
            $robo_openers.addClass('open');
            $robo_openers.parents('.js-robo-row')
                .addClass('open')
                .next('.js-robo-row-content')
                .find('.js-robo-wr')
                .stop().slideDown(300, function () {
                    $(this).find('.js-robo-action-overlay').fadeIn(150);
                });
        }
    });
    $('.js-robo-table-wrapper').outerWidth(true);

    let $scrollable_y = $('.js-scrollableX');
    $scrollable_y.each(function () {
        $(this).mCustomScrollbar({
            axis:"x",
            theme:"inset-dark",
            scrollbarPosition:"outside",
            contentTouchScroll: 1,
            documentTouchScroll: true
        });
    });
    $scrollable_y.removeClass("mCustomScrollbar");
    // Header compare scroll
    RoboActionLeftPosition();
    $(window).resize(function(){
        RoboActionLeftPosition();
    });
    function RoboActionLeftPosition()
    {
        let $fixed_robo_action = $('.js-robo-action');
        $fixed_robo_action.each(function () {
            let $fixed = $(this);

            let $wrapper = $fixed.parents('.js-robo-table-wrapper:first');
            let fixed_width = $fixed.outerWidth(true);
            let wrapper_width = $wrapper.outerWidth(true);
            let position_left = (wrapper_width - fixed_width) / 2;
            $fixed.attr('style', 'left:' + (position_left) + 'px;');
        });
    }
    /** End Robo Advisor list**/
    /*************
     *  COMPARE  *
     ************/
    $('.js-add-to-compare').on('submit', function (e) {
        e.preventDefault();
        let form = $(this);
        if (form.hasClass('in-progress')) {
            return false;
        }
        toggleCompare(form, updateCompareLink);

        return false;
    });

    function toggleCompare(form, cb) {
        $.ajax({
            url: form.attr('action'),
            type: 'post',
            data:  new FormData(form.get(0)),
            dataType: 'json',
            processData: false,
            contentType: false,
            beforeSend: function () {
                form.addClass('in-progress');
            },
            success: function (response) {
                if (response.success) {
                    form.toggleClass('active');
                    cb(response.data.compareList);
                }
            },
            error: function () {
                console.log('Error add to compare');
            },
            complete: function () {
                form.removeClass('in-progress');
            }
        });
    }

    function updateCompareLink(compareList) {
        let list = $('.js-compare-counter');

        if (compareList.length > 0) {
            list.find('.js-compare-counter-value').html(compareList.length);
            list.show();
        } else {
            list.find('.js-compare-counter-value').html(0);
            list.hide();
        }
    }
});