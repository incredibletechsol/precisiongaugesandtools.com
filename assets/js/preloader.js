(function($) {

	"use strict";

    function preloader() {
        if($('.preloader').length) {
            $('.preloader').delay(1000).fadeOut(1000, function() {

            });
        }
    }
	$(window).on('load', function() {

            preloader();
			
        });
})(window.jQuery);
