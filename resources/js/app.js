
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./icons.font');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

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

$(function () {
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
			let opener = $('.js-ra-item-opener', raItem);
			let raItemBody = $('.js-ra-item-body', raItem);

			opener.on('click', function () {
				raItem.toggleClass('open');
				raItemBody.stop().slideToggle(200);
			});
		});
	});

	$('.js-range-slider').each(function () {
		let self = $(this);
		let sliderItem = $('.js-range-slider-item', self).get(0);
		let minValue = $('.js-range-slider-min', self);
		let maxValue = $('.js-range-slider-max', self);
		let min = self.data('min');
		let max = self.data('max');
		let step = self.data('step');
		let unit = self.data('unit');
		let isRange = self.data('isRange');
		let round = self.data('round');

		if (isRange) {
			noUiSlider.create(sliderItem, {
				start: [min, max],
				step: step,
				connect: true,
				range: {
					min: min,
					max: max
				}
			});
		} else {
			noUiSlider.create(sliderItem, {
				start: max,
				step: step,
				connect: [true, false],
				range: {
					min: min,
					max: max
				}
			});
		}

		sliderItem.noUiSlider.on('update', function (values) {
			minValue.html(getValue(values[0]) + unit);

			if (isRange) {
				maxValue.html(getValue(values[1]) + unit);
			}

			/*minInputValue.val(values[0]);
			maxInputValue.val(values[1]);*/
		});

		function getValue (value) {
			//let valueMin = (Math.round(values[0]) == values[0]) ? Math.round(values[0]) : values[0];

			if (round) {
				value = Math.round(value);
			}

			return value;
		}
	});

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
		let list = $('.js-compare-list');

		if (compareList.length > 0) {
			list.find('.js-compare-list-value').html(compareList.length);
			list.show();
		} else {
			list.find('.js-compare-list-value').html(0);
			list.hide();
		}
	}
});