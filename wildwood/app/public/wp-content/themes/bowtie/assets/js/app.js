import './foundation.js'
import './vendors/sniff.min.js'
import '@/assets/sass/app.scss'

google.load('maps', 3, { other_params: 'libraries=geometry&key=AIzaSyBLu54bfu3EHzWymw4XKBy4tQacVPXlx_s' })

let SmoothScroll = require('smooth-scroll')

jQuery(document).foundation();
jQuery(document).ready(function($) {

    let options = {
        center: { lat: 32.7767, lng: -96.7970 },
        zoom: 9,
        scrollWheel: false,
        fullscreenControl: false,
        mapTypeControl: false,
        gestureHandling: 'none',
        disableDefaultUI: true
    }
    

    let scroll = new SmoothScroll('a[href*="#"]')

    $(document).on('click', '#navigation a', function(e) {
        $('#wrapper, .hamburger').removeClass('menu-open')
    })

    $(document).on('click', '.hamburger', function() {
        $(this).toggleClass('menu-open')
        $('#wrapper').toggleClass('menu-open')
    })

    if( $('body').hasClass('home') ) {
        // let map = new google.maps.Map(document.getElementById('googleMap'), options);

        $(document).on('click', '.marker', function(e) {
            switch( $(this).attr('id') ) {
                case 'abbcb' : 
                    break;
                case 'arnold-creek' :

                    break;
                case 'burleson-wetlands' :

                    break;
                case 'hart-creek' :

                    break;
                case 'flat-creek' :

                    break;
                case 'piney-woods' :

                    break;
                case 'basford-bayou' :

                    break;
                case 'sea-breeze' :

                    break;
            }
        })

        $(document).on('click', '.direction .left', function(e) {
            e.preventDefault()
            $('.slide-wrapper .slide.active').removeClass('active').prevOrLast('.slide').addClass('active')
        })
    
        $(document).on('click', '.direction .right', function(e) {
            e.preventDefault()
            $('.slide-wrapper .slide.active').removeClass('active').nextOrFirst('.slide').addClass('active')
        })
    
        $(document).on('click', '.team-member', function() {
            let $title = $(this).attr('data-title')
            let $position = $(this).attr('data-position') 
            let $bio = $(this).attr('data-bio') 
            let $modal = $('.reveal')
    
            $modal.find('img').attr('src', $(this).attr('data-thumbnail'))
    
            $modal.find('h4').text($title)
            $modal.find('.title').text($position)
            $modal.find('.bio').html($.parseJSON($bio))
    
        })
    
        $(document).on('click', '.reveal-overlay', function() {
    
        })
    }

    $.fn.nextOrFirst = function(selector){
        var next = this.next(selector);
        return (next.length) ? next : this.prevAll(selector).last();
    };
    
    $.fn.prevOrLast = function(selector){
        var prev = this.prev(selector);
        return (prev.length) ? prev : this.nextAll(selector).last();
    };

})