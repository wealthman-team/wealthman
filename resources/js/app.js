
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./icons.font');

//window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this Advisor screener for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

//Vue.component('example-component', require('./components/ExampleComponent.vue'));

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key)))

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

/*
const app = new Vue({
    el: '#app'
});
*/

window.noUiSlider = require('nouislider');
require('slick-carousel');

$(function () {
    // Header scroll
    headerSticky($(window));
    $(window).scroll(function() {
        headerSticky($(this));
    });
    function headerSticky(el)
    {
        let sticky = $('.js-header-sticky');
        if(sticky.length) {
            if (el.scrollTop() > 100) {
                sticky.addClass('header__scrolled');
            } else {
                sticky.removeClass('header__scrolled');
            }
        }
    }

    // Header compare scroll
    headerCompareSticky($(window));
    $(window).scroll(function() {
        headerCompareSticky($(this));
    }).resize(function(){
        headerCompareSticky($(this));
    });
    function headerCompareSticky(el)
    {
        let fixed = $('.js-compare-header-fixed');
        if(fixed.length) {
            let header = $('.js-header-sticky');
            let compare_header = $('.js-compare-header');
            let container = $('.js-compare-list');

            let offset_top = compare_header.offset().top;
            let offset_left = compare_header.offset().left;
            let header_height = header.outerHeight(true);
            let container_height = container.outerHeight(false);
            let fixed_height = fixed.outerHeight(true);
            let compare_header_width = compare_header.outerWidth(true);
            let top = offset_top - header_height;
            let bottom = offset_top + container_height - fixed_height - header_height;
            let scrollTop = el.scrollTop();

            if (scrollTop >= top && scrollTop < bottom) {
                fixed.addClass('compare-list__header-scrolled');
                fixed.attr('style', 'top:' + header_height + 'px;width:' + compare_header_width + 'px;left:' + offset_left + 'px;');
            } else {
                fixed.removeClass('compare-list__header-scrolled');
                fixed.removeAttr('style');
            }
        }
    }

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

	$('.js-ra-list').each(function () {
		let raList = $(this);
		let raItems = $('.js-ra-item', raList);

		raItems.each(function () {
			let raItem = $(this);
			let raItemBody = $('.js-ra-item-body', raItem);

            raItem.on('click', function (e) {
				if (['A', 'BUTTON', 'INPUT'].filter(s => s === e.target.nodeName).length === 0){
                    raItem.toggleClass('open');
                    raItemBody.stop().slideToggle(200);
				}
            });
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

    /*************
     *  COMPARE  *
     ************/
	$('.js-add-to-compare').on('submit', function (e) {
		let form = $(this);

		if (form.hasClass('in-progress')) {
			return;
		}

		toggleCompare(form, updateCompareLink);

		e.preventDefault();
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
    $('.js-compare-list').each(function () {
        let compareList = $(this);
        let clGroups = $('.js-compare-list-group', compareList);
        let clGroupNames = $('.js-compare-list-group-name', compareList);
        let clContexts = $('.js-compare-list-context', compareList);
        let clRowNames = $('.js-compare-list-name', compareList);
        let prevArrow = $('.js-compare-list-prev', compareList);
        let nextArrow = $('.js-compare-list-next', compareList);
        let remove = $('.js-remove-from-compare', compareList);

        let step = 200;
        let currentStep = 0;
        let minItemCount = 5;

        prevArrow.on('click', function () {
            slideNext();
        });

        nextArrow.on('click', function () {
            slidePrev();
        });

        clGroups.on('click', '.js-compare-list-group-name', function (e) {
            $(e.delegateTarget).toggleClass('opened');
        });

        remove.on('click', function (e) {
            e.preventDefault();
            let el = $(this);
            let id = el.data('robo-advisor');
            let _href = el.attr("href");
            let listLength = compareList.data('clLength');
            $('.js-compare-robo-'+id, compareList).hide(300, function() {
                $(this).remove();
            });
            // update count
            let new_listLength = --listLength;
            if (new_listLength <= 0) {
                $('.js-compare-result').addClass('hidden');
                $('.js-compare-empty-result').removeClass('hidden');
            }
            compareList.data('clLength', new_listLength);
            removeFromCompare(_href, id, updateCompareLink);
        });

        function slidePrev() {
            let listLength = compareList.data('clLength');

            if (listLength < minItemCount || (listLength - (currentStep + minItemCount)) <= 0) {
                return;
            }
            currentStep = currentStep + 1;
            slide();
        }

        function slideNext() {
            let listLength = compareList.data('clLength');

            if (listLength < minItemCount || currentStep <= 0) {
                return;
            }

            currentStep = currentStep - 1;
            slide();
        }

        function slide() {
            clContexts.css('left', -currentStep * step);
            clRowNames.css('left', currentStep * step);
            clGroupNames.css('left', currentStep * step);
        }

        function removeFromCompare(url, id, cb) {
            let formData = new FormData();
            formData.append('id', id);
            formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
            $.ajax({
                url: url,
                type: 'post',
                data:  formData,
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function (response) {
                    if (response.success) {
                        cb(response.data.compareList);
                    }
                },
                error: function (r) {
                    console.log(r.responseText);
                    console.log('Error remove from compare');
                },
            });
        }
    });

	$('.js-clear-compare').on('click', function (e) {
        e.preventDefault();
        let el = $(this);
        let _href = el.attr("href");
        $('.js-compare-result').fadeOut(300, function () {
            $(this).addClass('hidden');
            $('.js-compare-empty-result').removeClass('hidden');
            updateCompareLink([]);
        });

        let formData = new FormData();
        formData.append('_token', $('meta[name="csrf-token"]').attr('content'));

        $.ajax({
            url: _href,
            type: 'post',
            data:  formData,
            dataType: 'json',
            processData: false,
            contentType: false,
            error: function (r) {
                console.log(r.responseText);
                console.log('Error remove from compare');
            },
        });
    });
    $('.js-differing-characteristics').on('click', function (e) {
        e.preventDefault();
        $(this).addClass('link_active');
        $('.js-all-characteristics').removeClass('link_active');
        $('.js-identical-compare').fadeOut(300, function () {
            $(this).addClass('hidden');
        });
    });
    $('.js-all-characteristics').on('click', function (e) {
        e.preventDefault();
        $(this).addClass('link_active');
        $('.js-differing-characteristics').removeClass('link_active');
        $('.js-identical-compare').addClass('hidden').fadeIn(300);
    });
	/* **** end compare **** */

	$('.js-simple-slider').slick({
		prevArrow: '<div class="simple-slider__nav simple-slider__nav_left"><svg class="simple-slider__arrow" xmlns="http://www.w3.org/2000/svg" width="19" height="9" viewBox="0 0 19 9"><g transform="translate(20.906 -0.825) rotate(90)"><g transform="translate(1.2 2.2)"><path d="M1.325,20.323l4,4,4-4" transform="translate(-1.2 -6.116)" fill="none" stroke="#172341" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1"/><line y1="17.5" transform="translate(4.125 0.207)" stroke-width="1" stroke="#172341" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" fill="none"/></g></g></svg></div>',
		nextArrow: '<div class="simple-slider__nav simple-slider__nav_right"><svg class="simple-slider__arrow" xmlns="http://www.w3.org/2000/svg" width="19" height="9" viewBox="0 0 19 9"><g transform="translate(20.906 -0.825) rotate(90)"><g transform="translate(1.2 2.2)"><path d="M1.325,20.323l4,4,4-4" transform="translate(-1.2 -6.116)" fill="none" stroke="#172341" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1"/><line y1="17.5" transform="translate(4.125 0.207)" stroke-width="1" stroke="#172341" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" fill="none"/></g></g></svg></div>',
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

    $("a[href^='#']").click(function(){
        let _body = $('html, body');
        let _href = $(this).attr("href");
        let id = _href.replace(/^#/, '');
        if (id) {
            _body.stop(true).animate({scrollTop: $("#"+id).offset().top + "px"}, 400);
            return false;
        }
    });
});