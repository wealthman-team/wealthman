require('./bootstrap');

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
});