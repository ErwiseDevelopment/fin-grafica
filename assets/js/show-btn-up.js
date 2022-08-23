(function ($) {
    $(window).scroll(function () {
        if ($(this).scrollTop()) {
            $( '.js-btn-up' ).fadeIn();
        } else {
            $( '.js-btn-up' ).fadeOut();
        }
    });

    $( '.js-btn-up' ).click(function () {
        $( 'html, body' ).animate({
            scrollTop: 0
        }, 1000);
    });
})(jQuery);
  