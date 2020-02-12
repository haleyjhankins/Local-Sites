// For the Counter in homepage 

(function($) {
    'use strict';

    $(function() {

        $(window).scroll(function() {
            var top_of_element = $(".countup").offset().top;
            var bottom_of_element = $(".countup").offset().top + $(".countup").outerHeight();
            var bottom_of_screen = $(window).scrollTop() + $(window).innerHeight();
            var top_of_screen = $(window).scrollTop();

            if ((bottom_of_screen > top_of_element) && (top_of_screen < bottom_of_element)){

                $('.countup').each(function() {
                    var $this = $(this),
                        countTo = $this.attr('data-count');
                    
                    $({ countNum: $this.text()}).animate({
                        countNum: countTo
                    },
                    {
                        duration: 2000,
                        easing:'linear',
                        step: function() {
                            $this.text(Math.floor(this.countNum));
                        },
                        complete: function() {
                            $this.text(this.countNum);
                            //alert('finished');
                        }
                    });  
                });
                
            }
        });

    });

} )( jQuery );