/* Template Name: Velonic - Bootstrap 4 Landing Page Tamplat
   Author: CoderThemes
   File Description: Main JS file of the template
*/


! function($) {
    "use strict";

    var Velonic = function() {};



    Velonic.prototype.initSmoothLink = function() {
        $('.navbar-nav a').on('click', function(event) {
            var $anchor = $(this);
            $('html, body').stop().animate({
                scrollTop: $($anchor.attr('href')).offset().top - 0
            }, 1500, 'easeInOutExpo');
            event.preventDefault();
        });
    },

    Velonic.prototype.init = function() {
        this.initSmoothLink();
    },
    //init
    $.Velonic = new Velonic, $.Velonic.Constructor = Velonic
}(window.jQuery),

//initializing
function($) {
    "use strict";
    $.Velonic.init();
}(window.jQuery);