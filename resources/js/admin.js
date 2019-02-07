window._ = require('lodash');
window.Popper = require('popper.js').default;

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo'

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     encrypted: true
// });

require('admin-lte');
require('icheck');
require('select2');
require('clipboard');
import Clipboard from 'clipboard';

window.Noty = require('noty');
window.noUiSlider = require('nouislider');

$(function () {
    new Clipboard('[data-clipboard-target]');

    $('.js-model-delete-modal').on('show.bs.modal', function (e) {
        let modal = $(this);
        let form = $('.js-model-delete-form', modal);
        let deleteButton = $(e.relatedTarget);
        let action = deleteButton.data('action');

        form.attr('action', action);
    });

    $('.js-icheck').iCheck({
        checkboxClass: 'icheckbox_square-blue',
    });

    $('.js-select2').select2();

    $('.js-noty').each(function () {
        let noty = $(this);

        new Noty({
            type: noty.data('type') || 'info',
            text: noty.data('text'),
            layout: 'topRight',
            timeout: 5000,
            progressBar: true,
            theme: 'metroui',
        }).show();
    });

    $('.js-editor').each(function () {
        CKEDITOR.replace($(this).attr('id'),{
            contentsCss: [
                '/css/app.css',
                '/css/icon.css',
            ],
            filebrowserBrowseUrl : '/elfinder/ckeditor',
            toolbarGroups: [
                { name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
                { name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
                { name: 'links' },
                { name: 'insert' },
                { name: 'forms' },
                { name: 'tools' },
                { name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
                { name: 'others' },
                '/',
                { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                { name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
                { name: 'styles' },
                { name: 'colors' },
                { name: 'about' }
            ],
            // Remove some buttons provided by the standard plugins, which are
            // not needed in the Standard(s) toolbar.
            removeButtons : 'Underline,Subscript,Superscript',

            // Set the most common block elements.
            format_tags : 'p;h1;h2;h3;pre',

            // Simplify the dialog windows.
            removeDialogTabs : 'image:advanced;link:advanced',
            extraAllowedContent : 'div(*);table(*)',
            fillEmptyBlocks : false,
            tabSpaces : 0,
            stylesSet: [
                /*-------custom styles-------*/
                {
                    name: 'Simple Table',
                    element: 'table',
                    attributes: {
                        'class': 'robo-advisor__simple-table robo-advisor__simple-table_with-padding robo-advisor__simple-table_three'
                    }
                },
                /*----------------------*/
                { name: 'Italic Title',		element: 'h2', styles: { 'font-style': 'italic' } },
                { name: 'Subtitle',			element: 'h3', styles: { 'color': '#aaa', 'font-style': 'italic' } },
                {
                    name: 'Special Container',
                    element: 'div',
                    styles: {
                        padding: '5px 10px',
                        background: '#eee',
                        border: '1px solid #ccc'
                    }
                },

                { name: 'Marker',			element: 'span', attributes: { 'class': 'marker' } },
                { name: 'Big',				element: 'big' },
                { name: 'Small',			element: 'small' },
                { name: 'Typewriter',		element: 'tt' },

                { name: 'Computer Code',	element: 'code' },
                { name: 'Keyboard Phrase',	element: 'kbd' },
                { name: 'Sample Text',		element: 'samp' },
                { name: 'Variable',			element: 'var' },

                { name: 'Deleted Text',		element: 'del' },
                { name: 'Inserted Text',	element: 'ins' },

                { name: 'Cited Work',		element: 'cite' },
                { name: 'Inline Quotation',	element: 'q' },

                { name: 'Language: RTL',	element: 'span', attributes: { 'dir': 'rtl' } },
                { name: 'Language: LTR',	element: 'span', attributes: { 'dir': 'ltr' } },

                /* Object styles */

                {
                    name: 'Styled Image (left)',
                    element: 'img',
                    attributes: { 'class': 'left' }
                },

                {
                    name: 'Styled Image (right)',
                    element: 'img',
                    attributes: { 'class': 'right' }
                },

                {
                    name: 'Compact Table',
                    element: 'table',
                    attributes: {
                        cellpadding: '5',
                        cellspacing: '0',
                        border: '1',
                        bordercolor: '#ccc'
                    },
                    styles: {
                        'border-collapse': 'collapse'
                    }
                },

                { name: 'Borderless Table',		element: 'table',	styles: { 'border-style': 'hidden', 'background-color': '#E6E6FA' } },
                { name: 'Square Bulleted List',	element: 'ul',		styles: { 'list-style-type': 'square' } },

                /* Widget styles */

                { name: 'Clean Image', type: 'widget', widget: 'image', attributes: { 'class': 'image-clean' } },
                { name: 'Grayscale Image', type: 'widget', widget: 'image', attributes: { 'class': 'image-grayscale' } },

                { name: 'Featured Snippet', type: 'widget', widget: 'codeSnippet', attributes: { 'class': 'code-featured' } },

                { name: 'Featured Formula', type: 'widget', widget: 'mathjax', attributes: { 'class': 'math-featured' } },

                { name: '240p', type: 'widget', widget: 'embedSemantic', attributes: { 'class': 'embed-240p' }, group: 'size' },
                { name: '360p', type: 'widget', widget: 'embedSemantic', attributes: { 'class': 'embed-360p' }, group: 'size' },
                { name: '480p', type: 'widget', widget: 'embedSemantic', attributes: { 'class': 'embed-480p' }, group: 'size' },
                { name: '720p', type: 'widget', widget: 'embedSemantic', attributes: { 'class': 'embed-720p' }, group: 'size' },
                { name: '1080p', type: 'widget', widget: 'embedSemantic', attributes: { 'class': 'embed-1080p' }, group: 'size' },

                // Adding space after the style name is an intended workaround. For now, there
                // is no option to create two styles with the same name for different widget types. See https://dev.ckeditor.com/ticket/16664.
                { name: '240p ', type: 'widget', widget: 'embed', attributes: { 'class': 'embed-240p' }, group: 'size' },
                { name: '360p ', type: 'widget', widget: 'embed', attributes: { 'class': 'embed-360p' }, group: 'size' },
                { name: '480p ', type: 'widget', widget: 'embed', attributes: { 'class': 'embed-480p' }, group: 'size' },
                { name: '720p ', type: 'widget', widget: 'embed', attributes: { 'class': 'embed-720p' }, group: 'size' },
                { name: '1080p ', type: 'widget', widget: 'embed', attributes: { 'class': 'embed-1080p' }, group: 'size' }
            ],
        });
    });

	$('.js-no-ui-slider').each(function () {
		let self = $(this);
		let inputId = self.data('inputId');
		let valueId = self.data('valueId');
		let min = self.data('min');
		let max = self.data('max');
		let input = $(`#${inputId}`);
		let valueContainer = $(`#${valueId}`);

		noUiSlider.create(this, {
			start: input.val(),
			step: 0.5,
			range: {
				min: min,
				max: max
			}
		});

		this.noUiSlider.on('update', function (values, handle) {
			input.val(values[handle]);
			valueContainer.html('Value: ' + values[handle]);
		});
	});
});