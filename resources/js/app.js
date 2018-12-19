
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

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
	$('.js-ra-filter').each(function () {
		let filter = $(this);
		let filterHeader = $('.js-ra-filter-header', filter);
		let filterBody = $('.js-ra-filter-body', filter);

		filterHeader.on('click', function () {
			filter.toggleClass('active');
			filterBody.stop().slideToggle(200);
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
});