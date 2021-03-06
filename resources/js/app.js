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

require('./bootstrap');
require('./icons.font');
window.noUiSlider = require('nouislider');
require('slick-carousel');
import * as basicScroll from 'basicscroll'

$(function () {
    // parallax
    document.querySelectorAll('.header-scene').forEach((elem) => {
        const modifier = elem.getAttribute('data-modifier');
        const scroll_to = elem.getAttribute('data-scroll-to');

        basicScroll.create({
            elem: elem,
            from: 0,
            to: scroll_to,
            direct: true,
            props: {
                '--translateY': {
                    from: '0',
                    to: `${ 10 * modifier }px`
                }
            }
        }).start()
    });


    // auto update token
    let lifetime_csrf = $('meta[name="csrf-token"]').attr('data-lifetime');
    if (lifetime_csrf) {
        setInterval(refreshCsrf, (lifetime_csrf * 60 * 1000) - (1000*60)); //минус 1 минута
        function refreshCsrf() {
            let $meta_csrf = $('meta[name="csrf-token"]');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $meta_csrf.attr('content')
                }
            });
            $.ajax({
                url: '/refresh-csrf',
                type: 'post',
            }).then(function (result) {
                $meta_csrf.attr('content', result);
            }).fail(function(){
                console.log('Error: refresh-csrf');
            });
        }
    }

    $(document).click(function(e) {
        let $target = $(e.target);
        if (!$target.closest('.js-auth-icon-wrapper').length && $('.js-user-menu.open').length) {
            $('.js-user-menu').removeClass('open');
        }

        if (!$target.closest('.js-search-wrapp').length && $('.js-search-form.open').length) {
            $('.js-search-form').removeClass('open');
        }
    });

    $('.js-search-open').on('click', function (e) {
        e.preventDefault();
        $('.js-search-form').addClass('open');
    });

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

    /** Auth **/
    let Auth = (function () {
        function initAuthMethods() {
            let $login_form = $('form.js-auth-login:first');
            let $register_form = $('form.js-auth-register:first');
            let $tab_sign_in = $('.js-tab-sign-in');
            let $tab_sign_up = $('.js-tab-sign-up');
            let $block_sign_in = $('.js-auth-sign-in');
            let $block_sign_up = $('.js-auth-sign-up');
            let tab_sign_up_speed = 100;

            $tab_sign_in.on('click', function (e) {
                e.preventDefault();
                $tab_sign_in.addClass('active');
                $tab_sign_up.removeClass('active');

                $block_sign_up.fadeOut(tab_sign_up_speed, function () {
                    $(this).addClass('hidden');
                    $block_sign_in.fadeIn(tab_sign_up_speed, function () {
                        $(this).removeClass('hidden');
                    });
                });

            });

            $tab_sign_up.on('click', function (e) {
                e.preventDefault();
                $tab_sign_up.addClass('active');
                $tab_sign_in.removeClass('active');

                $block_sign_in.fadeOut(tab_sign_up_speed, function () {
                    $(this).addClass('hidden');
                    $block_sign_up.fadeIn(tab_sign_up_speed, function () {
                        $(this).removeClass('hidden');
                    });
                });
            });

            // Login function
            $login_form.submit(function( e ) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                let form = $(this);
                $.ajax({
                    type: form.attr('method'),
                    url: form.attr('action'),
                    data: form.serializeArray(),
                    dataType: form.data('type'),
                    beforeSend : function () {
                        //clear errors
                        $('input[name="password"]', form).removeClass('is-invalid');
                        $('input[name="email"]', form).removeClass('is-invalid');

                        $('.js-password-error', form).html('');
                        $('.js-email-error', form).html('');
                    },
                    success: function (response) {
                        if (response.success) {
                            location.reload();
                        }
                    },
                    error: function (jqXHR) {
                        let response = $.parseJSON(jqXHR.responseText);
                        $('input[name="password"]', form).val('');
                        if (response.password) {
                            $('input[name="password"]', form).addClass('is-invalid');
                            $('.js-password-error', form).html('<span>'+response.password[0]+'</span>');
                        } else {
                            $('input[name="password"]', form).addClass('is-valid');
                        }
                        if (response.email) {
                            $('input[name="email"]', form).addClass('is-invalid');
                            $('.js-email-error', form).html('<span>'+response.email[0]+'</span>');
                        } else {
                            $('input[name="email"]', form).addClass('is-valid');
                        }
                    }
                });
            });

            // Register function
            $register_form.submit(function( e ) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                let form = $(this);
                $.ajax({
                    type: form.attr('method'),
                    url: form.attr('action'),
                    data: form.serializeArray(),
                    dataType: form.data('type'),
                    beforeSend : function () {
                        //clear errors
                        $('input[name="email"]', form).removeClass('is-invalid');
                        $('input[name="password"]', form).removeClass('is-invalid');
                        $('input[name="password_confirmation"]', form).removeClass('is-invalid');

                        $('.js-email-error', form).html('');
                        $('.js-password-error', form).html('');
                        $('.js-password-confirmation-error', form).html('');

                    },
                    success: function (response) {
                        if (response.success) {
                            location.reload();
                        }
                    },
                    error: function (jqXHR) {
                        let response = $.parseJSON(jqXHR.responseText);
                        $('input[name="password_confirmation"]', form).val('');
                        if (response.password && response.password[0] === 'The password confirmation does not match.') {
                            $('input[name="password_confirmation"]', form).addClass('is-invalid');
                            $('.js-password-confirmation-error', form).html('<span>'+response.password[0]+'</span>');
                        } else {
                            $('input[name="password_confirmation"]', form).addClass('is-valid');
                        }
                        if (response.password && response.password[0] !== 'The password confirmation does not match.') {
                            $('input[name="password"]', form).addClass('is-invalid');
                            $('.js-password-error', form).html('<span>'+response.password[0]+'</span>');
                        } else {
                            $('input[name="password"]', form).addClass('is-valid');
                        }
                        if (response.email) {
                            $('input[name="email"]', form).addClass('is-invalid');
                            $('.js-email-error', form).html('<span>'+response.email[0]+'</span>');
                        } else {
                            $('input[name="email"]', form).addClass('is-valid');
                        }
                    }
                });
            });
        }

        return {
            init: function () {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: '/auth-form',
                    processData: false,
                    contentType: false,
                    success: function(result){
                        $('#modal-auth').html(result);
                        $('.js-modal-auth').removeAttr('data-href');
                        initAuthMethods();
                    },
                    error: function () {
                        // console.log(r.responseText);
                        console.log('Error init auth form');
                    },
                });
            }
        };
    })();

    Auth.init();
    /** End Auth **/

    /** Popup **/
    let Popup = (function () {
        let $modal_overlay = $('.js-modal-overlay');

        function openOverlay(){
            $modal_overlay.addClass('open');
        }

        function closeOverlay(){
            $modal_overlay.removeClass('open');
        }

        function popupOpen($btn) {
            let target_modal = $btn.data('modal');
            let _href = $btn.data('href');
            if (_href) {
                return window.location = _href;
            }
            let $modal;
            if (target_modal) {
                $modal = $('#'+target_modal+':first');
            }
            if ($modal && !$modal.hasClass('open')) {
                $modal.attr('data-bind', $btn.attr('data-bind'));
                positionPopup($modal);
                $modal.addClass('open');
                openOverlay();
            }
        }

        function popupClose() {
            let $modals = $('.js-modal');
            $modals.each(function(){
                let $modal = $(this);
                if ($modal.hasClass('open')) {
                    $modal.removeClass('open');
                    $modal.removeAttr('style');
                    $modal.removeAttr('data-bind');
                    closeOverlay();
                }
            });
        }

        function positionPopup($modal) {
            let position = {top: 0, left: 0, position: 'absolute'};
            let bind_id = $modal.attr('data-bind');
            let $btn;
            if(bind_id){
                $btn = $('.js-modal-open[data-bind="'+bind_id+'"]:first');
            }
            if ($btn && $btn.data('position') === 'btn') {
                position = getBtnPosition($modal, $btn);
            } else {
                position = getCenterPosition($modal);
            }

            $modal.attr('style', 'top:' + position.top + 'px;left:' + position.left + 'px;position:' + position.position);
        }

        function getCenterPosition($modal){
            let modal_width = $modal.outerWidth(true);
            let modal_height = $modal.outerHeight(true);
            let position_top = (window.innerHeight - modal_height) / 2;
            let position_left = (window.innerWidth - modal_width) / 2;
            position_top = position_top > 0 ? position_top : 0;
            position_left = position_left > 0 ? position_left : 0;

            return {top: position_top, left: position_left, position: 'fixed'};
        }

        function getBtnPosition($modal, $btn){
            let offset_top = 30;
            let offset_left = 20;
            let min_right = 20;

            let window_width = window.innerWidth;
            let modal_width = $modal.outerWidth(true);
            let top_position = $btn.offset().top + $btn.outerHeight(true) + offset_top;
            let btn_position = $btn.offset().left + $btn.outerWidth(true) + offset_left;

            let offset_right = 0;
            if ( (window_width - btn_position) < (offset_left + min_right)) {
                offset_right = (offset_left + min_right) - (window_width - btn_position);
                offset_right = offset_right <= min_right ? offset_right : min_right
            }
            let left_position = btn_position - modal_width - offset_right;

            return {top: top_position, left: left_position, position: 'absolute'};
        }

        return {
            init: function () {
                let $popup_open_buttons = $('.js-modal-open');

                $(window).resize(function () {
                    let $open_modals = $('.js-modal.open');
                    $open_modals.each(function(){
                        let $modal = $(this);
                        let bind_id = $modal.data('bind');
                        let $btn;
                        if(bind_id){
                            $btn = $('.js-modal-open[data-bind="'+bind_id+'"]:first');
                            positionPopup($modal, $btn);
                        }
                    });
                });

                // event open popup
                $popup_open_buttons.each(function(idx){
                    let $btn = $(this);
                    $btn.attr('data-bind', 'modal_'+idx);
                    $btn.on('click', function (e) {
                        popupOpen($btn);
                        e.preventDefault();
                    });
                });

                // events close popup
                $(document).keydown(function (e) {
                    // ESCAPE key pressed
                    if (e.keyCode === 27) {
                        popupClose();
                    }
                    e.stopPropagation();
                });
                $modal_overlay.on('click', function (e) {
                    popupClose();
                    e.preventDefault();
                });
            }
        };
    })();
    Popup.init();
    /** End Popup **/


    /** Feedback **/
    let Feedback = (function () {
        function initFeedbackMethods() {
            let $feedback_container = $('.js-feedback-container');
            let $feedback_form = $('.js-feedback-form:first');
            // Login function
            if ($feedback_form.length) {
                $feedback_form.submit(function (e) {
                    e.preventDefault();
                    if (!$feedback_form.hasClass('in-progress')) {

                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        let form = $(this);
                        $.ajax({
                            type: form.attr('method'),
                            url: form.attr('action'),
                            data: form.serializeArray(),
                            dataType: form.data('type'),
                            beforeSend: function () {
                                $feedback_form.addClass('in-progress');
                                //clear errors
                                $('input[name="email_phone"]', form).removeClass('is-invalid');
                                $('input[name="name"]', form).removeClass('is-invalid');
                                $('input[name="message"]', form).removeClass('is-invalid');

                                $('.js-email-phone-error', form).html('');
                                $('.js-name-error', form).html('');
                                $('.js-message-error', form).html('');
                            },
                            success: function (response) {
                                if (response.success) {
                                    $feedback_form.fadeOut(200, function () {
                                        $('.js-feedback-success:first', $feedback_container).fadeIn(200);
                                        $feedback_form.html('');
                                    });
                                }
                            },
                            error: function (jqXHR) {
                                let response = $.parseJSON(jqXHR.responseText);
                                if (response.email_phone) {
                                    $('input[name="email_phone"]', form).addClass('is-invalid');
                                    $('.js-email-phone-error', form).html('<span>' + response.email_phone[0] + '</span>');
                                } else {
                                    $('input[name="email_phone"]', form).addClass('is-valid');
                                }

                                if (response.name) {
                                    $('input[name="name"]', form).addClass('is-invalid');
                                    $('.js-name-error', form).html('<span>' + response.name[0] + '</span>');
                                } else {
                                    $('input[name="name"]', form).addClass('is-valid');
                                }

                                if (response.message) {
                                    $('textarea[name="message"]', form).addClass('is-invalid');
                                    $('.js-message-error', form).html('<span>' + response.message[0] + '</span>');
                                } else {
                                    $('textarea[name="message"]', form).addClass('is-valid');
                                }
                            },
                            complete: function () {
                                $feedback_form.removeClass('in-progress');
                            }
                        });
                    }
                });
            }
        }

        return {
            init: function () {
                let $feedback_container = $('.js-feedback-container');
                if ($feedback_container.length) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: 'POST',
                        url: '/feedback-form',
                        processData: false,
                        contentType: false,
                        success: function(result){
                            $feedback_container.html(result);
                            initFeedbackMethods();
                        },
                        error: function () {
                            // console.log(r.responseText);
                            console.log('Error init feedback form');
                        },
                    });
                }
            }
        };
    })();

    Feedback.init();
    /** End Feedback **/

    $('.js-user-menu-open').on('click', function () {
        $('.js-user-menu').toggleClass('open');
    });

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
        let minItemCount = 6;

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

    /* Review Form */
    (function() {
        let $review_btn_type = $('.js-review-btn-type');
        let $review_form_container = $('.js-review-form-container:first');
        let $message_container = $('.js-review-message', $review_form_container);
        let $message_wrapper = $('.js-review-form-wrapper', $review_form_container);
        let $review_form = $('form[name="review_form"]', $review_form_container);
        let $input_review_type = $('input[name="review_type"]:first', $review_form_container);
        let $textarea_comment = $('textarea[name="comment"]:first', $review_form_container);

        $review_btn_type.on('click', function (e) {
            e.preventDefault();
            $review_btn_type.removeClass('active');
            $(this).addClass('active');

            let review_type = $(this).data('reviewType');
            $review_form_container.slideDown(200, function () {
                $review_form_container.addClass('open');
                $input_review_type.val(review_type);
            });
        });

        $('.js-review-cancel').on('click', function (e) {
            e.preventDefault();
            $review_btn_type.removeClass('active');
            $review_form_container.slideUp(200, function () {
                $review_form_container.removeClass('open');
                $textarea_comment.val('');
                $input_review_type.val('');
            });
        });

        $('.js-review-send').on('click', function (e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: $review_form.attr('method'),
                url: $review_form.attr('action'),
                data: $review_form.serializeArray(),
                dataType: $review_form.data('type'),
                beforeSend : function () {
                    //clear errors
                    $textarea_comment.removeClass('is-invalid');
                    $message_container.html('');
                },
                success: function (response) {
                    if (response.success) {
                        $message_wrapper.html('');
                        $message_container.html('<span class="success">'+response.success+'</span>');
                    }
                    if (response.error) {
                        $textarea_comment.addClass('is-invalid');
                        $message_container.html('<span class="error">'+response.error+'</span>');
                    }
                },
                error: function () {
                    console.log('Error: create review');
                    $message_container.html('<span class="error">An error occurred during execution; please try again later.</span>');
                }
            });
        });
    })();
    /* End Review Form */
    /* Review Like*/
    (function () {
        const $buttons = $('.js-review-like');
        $buttons.each(function(){
            let $btn = $(this);
            $btn.on('click', function (e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'post',
                    url: $btn.attr('href'),
                    data: {like: $btn.data('like'), review: $btn.data('review')},
                    dataType: 'json',
                    success: function (response) {
                        if (response.success) {
                            $btn.parents('.js-like-container').find('.js-like-count').html(response.success.like > 0 ? response.success.like : '');
                            $btn.parents('.js-like-container').find('.js-dislike-count').html(response.success.dislike > 0 ? response.success.dislike : '');
                        }
                    },
                    error: function () {
                        console.log('Error: create like');
                    }
                });
            });
        });
    })();
    /* End Review Like*/
});