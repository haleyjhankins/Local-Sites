/////////////*Start Ready functions*/////////////

jQuery( document ).ready(function($) {

/////////////*read more*/////////////

$(".read-more-wrapper").on("click", ".read-more", function (event) {
  event.preventDefault();
  $(this).parents(".read-more-wrapper").siblings(".read-more-section").slideToggle("800");
  $(this).addClass("read-less");
  $(this).text("close");
  $(this).parents(".read-more-wrapper").css("padding", "0");
});

$(".read-more-wrapper").on("click", ".read-less", function (event) {
  $(this).removeClass("read-less");
  $(this).text("read more");
});

/////////////*Accordion Transition*/////////////
$(".accordion .active").removeClass('active');

$(".accordion").on("click", "dd", function (event) {
  $('.accordion .active').removeClass('active');
  $(this).addClass('active');
  $(this).toggleClass('icon-minus');
  $(".accordion div.active").slideToggle("800");
  $(this).find(".content").slideToggle("800");
});

/////////////* Takes width of div and set height to equal it*/////////////
$('.squared').each(function() {
  $(this).height($(this).width());
});

/////////////*Make an entire div clickable*/////////////
$(".hover-click").click(function(){
  window.location=$(this).find("a").attr("href");
  return false;
});

/////////////*Slick Carousel*/////////////

jQuery('.single-item').slick({
  dots: true,
  autoplay: true,
  autoplaySpeed: 5000
});

$('.show-3-items').slick({
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

$('.show-4-items').slick({
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

/////////////*Smooth Scroll*/////////////
$(function() {
  $('.mobile-menu a[href*=#]:not([href=#])').click(function() {
  $('.off-canvas-wrap').removeClass('move-left');
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});

$(function() {
  $('.site-header a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});

/////////////*Sub Navigation Visibility*/////////////

jQuery(document).ready(function($) {
  $('.menu-item-has-children>a').click(function(event) {
   event.preventDefault();
   $('.menu-item-has-children>a').not(this).siblings('.sub-menu').removeClass('open-sub-menu');

   $(this).siblings('.sub-menu').toggleClass('open-sub-menu');
 });
});

  $('.to-top').click(function(){
      $('html, body').animate({scrollTop : 0},800);
      return false;
    });

});  /////////////*End Ready functions*/////////////


/////////////*Start Resize functions*/////////////

jQuery( window ).resize(function($) {

/////////////* Takes width of div and set height to equal it*/////////////
jQuery('.squared').each(function($) {
  $(this).height($(this).width());
});

}); /////////////*End Resize functions*/////////////



