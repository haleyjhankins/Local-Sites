/////////////* Start Ready functions */////////////

jQuery( document ).ready(function() {


/////////////* Accordion Transition */////////////
jQuery(".accordion .active").removeClass('active');

jQuery(".accordion").on("click", "dd", function (event) {
  jQuery('.accordion .active').removeClass('active');
  jQuery(this).addClass('active');
  jQuery(this).toggleClass('icon-minus');
  jQuery(".accordion div.active").slideToggle("800");
  jQuery(this).find(".content").slideToggle("800");
});


jQuery('#mobile-click dd a').on('click', function() {
    var cl = jQuery(this).attr('class');
    alert(cl)
    jQuery('.hide-all.' + cl).show();
});

/////////////*  Takes width of div and set height to equal it */////////////
jQuery('.squared').each(function() {
  jQuery(this).height(jQuery(this).width());
});

/////////////* Make an entire div clickable */////////////
jQuery(".hover-click").click(function(){
  window.location=jQuery(this).find("a").attr("href");
  return false;
});

/////////////* Slick Carousel */////////////

jQuery('.core-values').slick({
  dots: true,
  arrows: true,
  autoplay: true,
  autoplaySpeed: 10000,
  customPaging: function(slick,index) {
    var slideTitle = slick.$slides.eq(index).find('.slide-title').attr('data-title');
    return '<div class="custom-pager">' + slideTitle + '</div>';
  }

});

jQuery('.single-item').slick({
  arrows: true,
  dots: false,
  autoplay: true,
  autoplaySpeed: 5000
});

jQuery('.single-carousel').slick({
  dots: false,
  arrows: false,
  autoplay: true,
  autoplaySpeed: 5000
});

jQuery('.show-3-items').slick({
  dots: false,
  infinite: true,
  speed: 300,
  slidesToShow: 3,
  slidesToScroll: 3,
  responsive: [
  {
    breakpoint: 768,
    settings: {
      slidesToShow: 2,
      slidesToScroll: 2
    }
  },
  {
    breakpoint: 480,
    settings: {
      slidesToShow: 1,
      slidesToScroll: 1
    }
  }
  ]
});

jQuery('.show-4-items').slick({
  dots: false,
  infinite: true,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 4,
  responsive: [
  {
    breakpoint: 768,
    settings: {
      slidesToShow: 2,
      slidesToScroll: 2
    }
  },
  {
    breakpoint: 480,
    settings: {
      slidesToShow: 1,
      slidesToScroll: 1
    }
  }
  ]
});

/////////////* Smooth Scroll */////////////

  // $(function() {
  //     $('a[href*=#]:not([href=#])').click(function() {
  //       if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
  //         var target = $(this.hash);
  //         target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
  //         if (target.length) {
  //           $('html,body').animate({
  //             scrollTop: target.offset().top
  //           }, 1000);
  //           return false;
  //         }
  //       }
  //     });
  //   });


/////////////* Sub Navigation Visibility */////////////

jQuery(document).ready(function() {
  jQuery('.menu-item-has-children>a').click(function(event) {
    event.preventDefault();
    jQuery('.menu-item-has-children>a').not(this).siblings('.sub-menu').removeClass('open-children');

    jQuery(this).siblings('.sub-menu').toggleClass('open-children');
  });
});



jQuery('section.animate').each(function () {
  jQuery(this).children('.row').addClass('animateContent');
});


});  /////////////* End Ready functions */////////////


/////////////* Start Resize functions */////////////

jQuery( window ).resize(function() {

/////////////*  Takes width of div and set height to equal it */////////////
jQuery('.squared').each(function() {
  jQuery(this).height(jQuery(this).width());
});

}); /////////////* End Resize functions */////////////


/////////////* Start Scroll functions */////////////

jQuery(window).scroll(function () {

  /* Check the location of each desired element */
  jQuery('section.animate').each(function (i) {

    var bottom_of_object = jQuery(this).position().top + 200;
    var bottom_of_window = jQuery(window).scrollTop() + jQuery(window).height();

    /* If the object is completely visible in the window, fade it it */
    if (bottom_of_window > bottom_of_object) {

      jQuery(this).children('.animateContent').animate({
        'top' : '0',
        'opacity': '1'
      }, 500);

    }

  });

});

/*!
 * classie - class helper functions
 * from bonzo https://github.com/ded/bonzo
 *
 * classie.has( elem, 'my-class' ) -> true/false
 * classie.add( elem, 'my-new-class' )
 * classie.remove( elem, 'my-unwanted-class' )
 * classie.toggle( elem, 'my-class' )
 */

/*jshint browser: true, strict: true, undef: true */
/*global define: false */

( function( window ) {

'use strict';

// class helper functions from bonzo https://github.com/ded/bonzo

function classReg( className ) {
  return new RegExp("(^|\\s+)" + className + "(\\s+|$)");
}

// classList support for class management
// altho to be fair, the api sucks because it won't accept multiple classes at once
var hasClass, addClass, removeClass;

if ( 'classList' in document.documentElement ) {
  hasClass = function( elem, c ) {
    return elem.classList.contains( c );
  };
  addClass = function( elem, c ) {
    elem.classList.add( c );
  };
  removeClass = function( elem, c ) {
    elem.classList.remove( c );
  };
}
else {
  hasClass = function( elem, c ) {
    return classReg( c ).test( elem.className );
  };
  addClass = function( elem, c ) {
    if ( !hasClass( elem, c ) ) {
      elem.className = elem.className + ' ' + c;
    }
  };
  removeClass = function( elem, c ) {
    elem.className = elem.className.replace( classReg( c ), ' ' );
  };
}

function toggleClass( elem, c ) {
  var fn = hasClass( elem, c ) ? removeClass : addClass;
  fn( elem, c );
}

var classie = {
  // full names
  hasClass: hasClass,
  addClass: addClass,
  removeClass: removeClass,
  toggleClass: toggleClass,
  // short names
  has: hasClass,
  add: addClass,
  remove: removeClass,
  toggle: toggleClass
};

// transport
if ( typeof define === 'function' && define.amd ) {
  // AMD
  define( classie );
} else {
  // browser global
  window.classie = classie;
}

})( window );


// Full width menu

(function() {
  var triggerBttn = document.getElementById( 'trigger-overlay' ),
  triggerBttnWord = document.getElementById( 'trigger-overlay-word' ),
    overlay = document.querySelector( 'div.overlay' ),
    closeBttn = overlay.querySelector( 'button.overlay-close' );
    transEndEventNames = {
      'WebkitTransition': 'webkitTransitionEnd',
      'MozTransition': 'transitionend',
      'OTransition': 'oTransitionEnd',
      'msTransition': 'MSTransitionEnd',
      'transition': 'transitionend'
    },
    transEndEventName = transEndEventNames[ Modernizr.prefixed( 'transition' ) ],
    support = { transitions : Modernizr.csstransitions };

  function toggleOverlay() {
    if( classie.has( overlay, 'open' ) ) {
      classie.remove( overlay, 'open' );
      classie.add( overlay, 'close' );
      var onEndTransitionFn = function( ev ) {
        if( support.transitions ) {
          if( ev.propertyName !== 'visibility' ) return;
          this.removeEventListener( transEndEventName, onEndTransitionFn );
        }
        classie.remove( overlay, 'close' );
      };
      if( support.transitions ) {
        overlay.addEventListener( transEndEventName, onEndTransitionFn );
      }
      else {
        onEndTransitionFn();
      }
    }
    else if( !classie.has( overlay, 'close' ) ) {
      classie.add( overlay, 'open' );
    }
  }

  triggerBttn.addEventListener( 'click', toggleOverlay );
  triggerBttnWord.addEventListener( 'click', toggleOverlay );
  closeBttn.addEventListener( 'click', toggleOverlay );
})();
