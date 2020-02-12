/*
               _ _       _                           _   _
  _____      _(_) |_ ___| |__     ___ _ __ ___  __ _| |_(_)_   _____
 / __\ \ /\ / / | __/ __| '_ \   / __| '__/ _ \/ _` | __| \ \ / / _ \
 \__ \\ V  V /| | || (__| | | | | (__| | |  __/ (_| | |_| |\ V /  __/
 |___/ \_/\_/ |_|\__\___|_| |_|  \___|_|  \___|\__,_|\__|_| \_/ \___|


 UNLEAVENED - 2015
 ....................................................................
 www.unleavened.com
 designed by Switch Creative
 http://www.switch.is

*/

// @codekit-prepend "../../bower_components/jquery/dist/jquery.min.js", "../../bower_components/jquery.easie.js/js/jquery.easie.js", "../../bower_components/slick.js/slick/slick.js", "richmarker.js";

// Protect global namespace
(function($) {

    var current_bp,
        t;


    /*
    *--------------------------------------------------------
    * ON WINDOW LOAD
    *--------------------------------------------------------
    */
    $(window).load(function() {




        /*
        *--------------------------------------------------------
        * INIT GOOGLE MAP
        *--------------------------------------------------------
        */
        var map;
        var mapElement;
        var bounds
        var locationCount;
        var infoWindow = null;
        var fancy_marker;

        // The array of locations to mark on the map.
        // Add as many locations as necessary.
        var locations = [
            ['Unleavened Fresh Kitchen', window.map_address, window.map_city, window.map_state, window.map_zip, 'http://phpstack-3008-10894-46083.cloudwaysapps.com/assets/img/marker.png']
        ];

        // Init the map
        function initMap() {

            // Customize look of the map.
            // https://www.mapbuildr.com/
            var mapOptions = {
                zoom: 16,
                zoomControlOptions: {
                    style: google.maps.ZoomControlStyle.SMALL,
                },
                disableDoubleClickZoom: true,
                mapTypeControl: false,
                panControl: false,
                scaleControl: false,
                scrollwheel: false,
                streetViewControl: false,
                overviewMapControl: false,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                styles: [
                    {
                        "featureType": "all",
                        "stylers": [
                            { "saturation": -100 },
                            { "gamma": 0.50 }
                        ]
                    },
                    {
                        "featureType": "poi",
                        "stylers": [
                            { "visibility": "off" }
                        ]
                    },
                    {
                        "featureType": "transit",
                        "stylers": [
                            { "visibility": "off" }
                        ]
                    }
                ]
            }

            mapElement = document.getElementById('map');
            map = new google.maps.Map(mapElement, mapOptions);
            setDragZoom();

            // OPTIONAL: Set listener to tell when map is idle
            // Can be useful during dev
            google.maps.event.addListener(map, "idle", function(){
                // console.log("map is idle");
            });

            var geocoder = new google.maps.Geocoder();
            bounds = new google.maps.LatLngBounds();
            locationCount = 0;

            // Init InfoWindow and leave it
            // for use when user clicks marker
            google.maps.InfoWindow.prototype.opened = false;
            infoWindow = new google.maps.InfoWindow({
                content: "Loading content...",
                pixelOffset: new google.maps.Size(0, -50)
            });

            // Loop through locations and set markers
            for (i = 0; i < locations.length; i++) {

                var address = locations[i][1] + '+' + locations[i][2] + ',' + locations[i][3] + '+' + locations[i][4];

                //Get latitude and longitude from address
                geocoder.geocode( {'address': address}, onGeocodeComplete(i));
            }

            // Re-center map on window resize
            google.maps.event.addDomListener(window, 'resize', function() {
                var center = map.getCenter();
                google.maps.event.trigger(map, "resize");
                map.setCenter(center);
                setDragZoom();
            });

            // This is needed to set the zoom after fitbounds,
            google.maps.event.addListener(map, 'zoom_changed', function() {
                zoomChangeBoundsListener =
                    google.maps.event.addListener(map, 'bounds_changed', function(event) {
                        if (this.getZoom() > mapOptions.zoom && this.initialZoom == true) {
                            // Change max/min zoom here
                            this.setZoom(mapOptions.zoom);
                            this.initialZoom = false;
                        }
                    google.maps.event.removeListener(zoomChangeBoundsListener);
                });
            });
            map.initialZoom = true;

            /*
             * The google.maps.event.addListener() event waits for
             * the creation of the infowindow HTML structure 'domready'
             * and before the opening of the infowindow defined styles
             * are applied.
             */
            google.maps.event.addListener(infoWindow, 'domready', function() {

                // Reference to the DIV which receives the contents of the infowindow using jQuery
                var iwElement = $('.gm-style-iw');

                // Find elements we need to style
                var iwWrapper = iwElement.parent();
                var iwCloseBtn = iwElement.next();
                var iwBackground = iwElement.prev();

                // Remove what we don't want (white background, drop shadows, etc)
                iwBackground.css({'display' : 'none'});

                // Add hooks so we can style
                iwCloseBtn.addClass('gm-btn-close');
                iwWrapper.addClass('gm-iw-wrapper');

            });
            google.maps.event.addListener(infoWindow,'closeclick',function(){
                $('div', mapElement).removeClass('open');
            });

        } // END init()


        // Triggered as the geocode callback
        function onGeocodeComplete(i) {

            // Callback function for geocode on response from Google.
            // We wrap it in 'onGeocodeComplete' so we can send the
            // location index through to the marker to establish
            // content.
            var geocodeCallBack = function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {

                    // The HTML content for the InfoWindow.
                    // Includes a form to allow the user to
                    // get directions.
                    var windowContent = '<form id="form-directions" action="http://maps.google.com/maps" method="get" target="_blank">' +
                        '<input type="hidden" name="daddr" value="' + locations[i][1] + ', ' + locations[i][2] + ', ' + locations[i][3] + ' ' + locations[i][4] + '" />' +
                        '<label for="saddr">Need directions to our place?</label>' +
                        '<div class="input-group">' +
                        '<input name="saddr" type="text" class="form-control input-sm" placeholder="Your Address...">' +
                        '<span class="input-group-btn">' +
                        '<button class="btn btn-default input-sm" type="submit">Go!</button>' +
                        '</span>' +
                        '</div><!-- /input-group -->' +
                        '</form>';

                    var directionsURL = 'https://www.google.com/maps/dir//' + locations[i][1] + ',' + locations[i][2] + ',+' + locations[i][3] + '+' + locations[i][4] + '/';

                    // Create the marker for the location
                    // We use 'html' key to attach the
                    // InfoWindow content to the marker.
                    // var marker = new google.maps.Marker({
                    //     icon: locations[i][5],
                    //     position: results[0].geometry.location,
                    //     map: map,
                    //     html: windowContent
                    // });

                    // Set event to display the InfoWindow anchored
                    // to the marker when the marker is clicked.
                    // google.maps.event.addListener( marker, 'click', function() {

                    //     // Updates the InfoWindow content with
                    //     // the HTML held in the marker ('this').
                    //     infoWindow.setContent(this.html);
                    //     infoWindow.open(map, this);
                    // });

                    // CONTENT FOR FANCY MARKER
                    var markerContent = '<div class="marker-content">' +
                        '<p><strong>' + locations[i][0] + '</strong><br>' +
                        locations[i][1] + '<br>' +
                        locations[i][2] + ', ' + locations[i][3] + ' ' + locations[i][4] + '</p>' +
                        '</div><div class="pointer"></div>';

                    // ADD FANCY MARKER
                    fancy_marker = new RichMarker({
                        position: results[0].geometry.location,
                        map: map,
                        draggable: false,
                        flat: true,
                        anchor: RichMarkerPosition.BOTTOM,
                        content: markerContent,
                        iwContent: windowContent,
                        dirURL: directionsURL
                    });

                    // ADD FANCY MARKER CLICK LISTENER
                    // NOTE: Had to use a jQuery listener because the RichMarker listener
                    // would always double the click event.  This is kind of an ugly hack.
                    // I may revisit this.
                    $('body').on('click', '.rich-marker', function(event) {
                        var my_marker = fancy_marker;
                        if (!$(this).hasClass('open')) {
                            $(this).addClass('open');
                            infoWindow.setContent(my_marker.iwContent);
                            infoWindow.open(map, my_marker);
                        } else {
                            $(this).removeClass('open');
                            infoWindow.close();
                        }
                    });

                    // Add this marker to the map bounds
                    extendBounds(results[0].geometry.location);

                } else {
                    window.log('Location geocoding has failed: ' + google.maps.GeocoderStatus);
                }
            } // END geocodeCallBack()

            return geocodeCallBack;

        } // END onGeocodeComplete()


        // Establishes the bounds for all the markers
        // then centers and zooms the map to show all.
        function extendBounds(latlng) {
            ++locationCount;

            bounds.extend(latlng);

            if (locationCount == locations.length) {
                map.fitBounds(bounds);
            }
        } // END extendBounds()

        function setDragZoom() {
            if ($(window).width() < 768) {
                map.setOptions({'zoomControl': false, 'draggable': false});
            } else {
                map.setOptions({'zoomControl': true, 'draggable': true});
            }
        }

        initMap();

        onWindowResize();



        $(window).trigger('scroll');




    }); // END ON WINDOW LOAD






    /*
    *--------------------------------------------------------
    * ON DOCUMENT READY
    *--------------------------------------------------------
    */
    $(document).ready(function() {
        WebFontConfig = {
            google: { families: [ 'Lora:400,700,400italic,700italic:latin', 'Oswald:300,400,700:latin' ] },
            timeout: 3000,
            loading: function() {},
            active: function() { $('.loader-overlay').fadeOut(); },
            inactive: function() { $('.loader-overlay').fadeOut(); }
        };

        (function(d) {
            var wf = d.createElement('script'), s = d.scripts[0];
            wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1.5.18/webfont.js';
            s.parentNode.insertBefore(wf, s);
        })(document);
        initPage();

    }); // END ON DOCUMENT READY





    /*
    *--------------------------------------------------------
    * INIT PAGE FUNCTION
    * Triggered when the document is ready (default), or
    * another custom-defined instance
    * (ie TypeKit "active" state).
    *--------------------------------------------------------
    */
    function initPage() {

        var isWebkit = 'WebkitAppearance' in document.documentElement.style;
        if (isWebkit) {
            $('body').addClass('webkit');
        }

        /*
        *--------------------------------------------------------
        * INIT ANIMATED ANCHOR SCROLLING
        * Page will scroll to anchor
        *--------------------------------------------------------
        */
        if ( $(".scroll").length ) {

            $('.scroll').click(function() {
                var target_id = $(this).attr('href');
                var pad = 0;

                scrollToAnchor(target_id, pad);

                return false;
            });
        }




        /*
        *--------------------------------------------------------
        * CHECK FOR PLACEHOLDER SUPPORT
        *--------------------------------------------------------
        */
        var placeholderSupported = ( 'placeholder' in document.createElement('input') );
        if (!placeholderSupported) {
            $('html').addClass('no-input-placeholder');
        }




        /*
        *--------------------------------------------------------
        * BLOCK 'COMING SOON' BUTTONS
        *--------------------------------------------------------
        */
        $('.coming-soon').click(function(e) {
            e.preventDefault();
        });




        /*
        *--------------------------------------------------------
        * ADD IE10 CLASS TO PAGE IF IE10
        *--------------------------------------------------------
        */
        if (/*@cc_on!@*/false && document.documentMode === 10) {
            $('body').addClass('ie10');
        }




        /*
        *--------------------------------------------------------
        * INIT WINDOW RESIZE EVENTS
        *--------------------------------------------------------
        */
        $( window ).resize(function() {
            //onWindowResize();
            clearTimeout(t);
            t = setTimeout(onWindowResize, 250);
        });

        onWindowResize();



    } // END initPage()




    function onWindowResize() {
        var sidebar_h = $('.home-sidebar').height();
        var sidebar_t = parseInt($('.home-sidebar').css('top'), 10);
        var total_h;

        /*
        *--------------------------------------------------------
        * GET BREAKPOINTS FROM CSS FOR SCRIPTING
        *--------------------------------------------------------
        */
        // Get the content of the body's ':after' pseudo-element
        // This value changes in the CSS depending on the media query
        var new_bp = window.getComputedStyle(document.body, ':after').getPropertyValue('content');

        // Tidy up after inconsistent browsers (some include quotation marks, they shouldn't)
        new_bp = new_bp.replace(/"/g, "");
        new_bp = new_bp.replace(/'/g, "");

        // If the new breakpoint is different from the old one, do some stuff
        if (current_bp != new_bp) {

            switch (new_bp) {

                case "phone":
                case "phone-p":
                case "tablet":
                case "tablet-p":
                    if ($('.home-slider').hasClass('slick-initialized')){
                        $('.home-slider').slick('unslick');
                    }
                    total_h = sidebar_h + sidebar_t + 50;
                    $('.home-slider, .slide').css({'height': total_h + 'px'});
                    break;

                case "laptop":
                case "desktop":
                    $('.home-slider, .slide').css({'height': sidebar_h + 'px'});
                    initSlider();
                    break;

                default:
                    // Not a breakpoint, so do nothing.

            } // end switch

            // Update 'current_bp' var
            current_bp = new_bp;

        } else {

            switch (current_bp) {

                case "phone":
                case "phone-p":
                case "tablet":
                case "tablet-p":
                    total_h = sidebar_h + sidebar_t + 50;
                    $('.home-slider, .slide').css({'height': total_h + 'px'});
                    break;

                case "laptop":
                case "desktop":
                    $('.home-slider, .slide').css({'height': sidebar_h + 'px'});
                    break;

                default:
                    // Not a breakpoint, so do nothing.

            } // end switch

            try {
                $('.home-slider').slick('setPosition');
                $('.home-slider').slick('slickGoTo',0,false);
            } catch(e) {
                // handle errors
            }

        } // end if




        /*
        *--------------------------------------------------------
        * TRIGGER FIT TO WINDOW
        *--------------------------------------------------------
        */
        if ($('.fit-to-window').length) {
            fitToWindow();
        }





    } // END onWindowResize()




    /*
    *--------------------------------------------------------
    * 'FIT TO WINDOW' (onResize)
    * Sizes element height to the window on resize
    *--------------------------------------------------------
    */
    function fitToWindow() {
        var win_w = $(window).width();
        var win_h = $(window).height();

        var win_wem = win_w / 16;
        var win_hem = win_h / 16;
        var header_h = $('#main-nav-wrapper').height();
        var header_hem = header_h / 16;
        var footer_h = $('#main-footer').height();
        var footer_hem = footer_h / 16;
        var ratio;
        var prop_h;
        var h;

        $('.fit-to-window').each(function(i, elem) {
            var elem_id = $(this).attr('id');

            switch (elem_id) {

                case "main-header":
                    if ($('body').hasClass('home')) {
                        h = win_h;
                        $(this).css({'height': h + 'px'});
                    }
                    break;

                default:
                    h = win_h;
                    $(this).css({'height': h + 'px'});
            }

        });

    } // END fitToWindow()




    /*
    *--------------------------------------------------------
    * SCROLL TO ANCHOR
    *--------------------------------------------------------
    */
    function scrollToAnchor(trgt, offset) {
        if (typeof offset === 'undefined') {
            offset = 0;
        }
        //console.log('offset: ' + offset);
        var target_offset,
            target_array;
        target_array = trgt.split('#');
        target_offset = $('#' + target_array[1]).offset();
        var target_top = target_offset.top;
        var pad = offset;

        $('html, body').stop().animate({scrollTop:target_top - pad}, 750, 'easieEaseInOutCubic');
    }




    /*
    *--------------------------------------------------------
    * INIT SLIDER
    *--------------------------------------------------------
    */
    function initSlider() {
        if (!$('.home-slider').hasClass('slick-initialized')) {
            // console.log('init');
            $('.home-slider').slick({
                slidesToShow: 1,
                arrows: false,
                speed: 500,
                vertical: true,
                verticalSwiping: true,
                cssEase: 'ease',
                dots: true,
                easing: 'easeInOutCirc',
                autoplay: true,
                autoplaySpeed: 8000
            });
            $('.home-slider').slick('slickGoTo',0,false);
        } else {
            // console.log('update');
            $('.home-slider').slick('setPosition');
            $('.home-slider').slick('slickGoTo',0,false);
        }
    }






/* UTILITIES */
/* ======================================================= */

    /*
    *--------------------------------------------------------
    * DEBOUNCING
    * Returns a function, that, as long as it continues to be invoked, will not
    * be triggered. The function will be called after it stops being called for
    * N milliseconds. If `immediate` is passed, trigger the function on the
    * leading edge, instead of the trailing.
    *
    * // Usage
    * var myEfficientFn = debounce(function() {
    *     // All the taxing stuff you do
    * }, 250);
    * window.addEventListener('resize', myEfficientFn);
    *--------------------------------------------------------
    */
    var debounce = function(func, wait) {
        // we need to save these in the closure
        var timeout, args, context, timestamp;

        return function() {

            // save details of latest call
            context = this;
            args = [].slice.call(arguments, 0);
            timestamp = new Date();

            // this is where the magic happens
            var later = function() {

                // how long ago was the last call
                var last = (new Date()) - timestamp;

                // if the latest call was less that the wait period ago
                // then we reset the timeout to wait for the difference
                if (last < wait) {
                    timeout = setTimeout(later, wait - last);

                // or if not we can null out the timer and run the latest
                } else {
                    timeout = null;
                    func.apply(context, args);
                }
            };

            // we only need to set the timer now if one isn't already running
            if (!timeout) {
                timeout = setTimeout(later, wait);
            }
        }
    };




    /*
    *--------------------------------------------------------
    * POLLING
    * If the event doesn't exist, you need to check for your
    * desired state at intervals:
    *
    * // Usage:  ensure element is visible
    * poll(
    *     function() {
    *         return document.getElementById('lightbox').offsetWidth > 0;
    *     },
    *     function() {
    *         // Done, success callback
    *     },
    *     function() {
    *         // Error, failure callback
    *     }
    * );
    *--------------------------------------------------------
    */
    function poll(fn, callback, errback, timeout, interval) {
        var endTime = Number(new Date()) + (timeout || 2000);
        interval = interval || 100;

        (function p() {
                // If the condition is met, we're done!
                if(fn()) {
                    callback();
                }
                // If the condition isn't met but the timeout hasn't elapsed, go again
                else if (Number(new Date()) < endTime) {
                    setTimeout(p, interval);
                }
                // Didn't match and too much time, reject!
                else {
                    errback(new Error('timed out for ' + fn + ': ' + arguments));
                }
        })();
    }



    /*
    *--------------------------------------------------------
    * ONCE
    * Ensures an event only happens once:
    *
    * // Usage
    * var canOnlyFireOnce = once(function() {
    *     console.log('Fired!');
    * });
    *
    * canOnlyFireOnce(); // "Fired!"
    * canOnlyFireOnce(); // nada
    *--------------------------------------------------------
    */
    function once(fn, context) {
        var result;

        return function() {
            if(fn) {
                result = fn.apply(context || this, arguments);
                fn = null;
            }

            return result;
        };
    }



    /*
    *--------------------------------------------------------
    * GET ABSOLUTE URL
    * Get an absolute URL from a string input:
    *
    * // Usage
    * getAbsoluteUrl('/something'); // http://domain.com/something
    *--------------------------------------------------------
    */
    var getAbsoluteUrl = (function() {
        var a;

        return function(url) {
            if(!a) a = document.createElement('a');
            a.href = url;

            return a.href;
        };
    })();



    /*
    *--------------------------------------------------------
    * INSERT RULE
    * Insert CSS rules into a dynamically added stylesheet:
    *
    * // Usage ('1' is the index for the position to be inserted)
    * sheet.insertRule("header { float: left; opacity: 0.8; }", 1);
    *--------------------------------------------------------
    */
    var sheet = (function() {
        // Create the <style> tag
        var style = document.createElement('style');

        // Add a media (and/or media query) here if you'd like!
        // style.setAttribute('media', 'screen')
        // style.setAttribute('media', 'only screen and (max-width : 1024px)')

        // WebKit hack :(
        style.appendChild(document.createTextNode(''));

        // Add the <style> element to the page
        document.head.appendChild(style);

        return style.sheet;
    })();




    /*
    *--------------------------------------------------------
    * COOKIE FUNCTIONS
    *
    * // Usage
    * getAbsoluteUrl('/something'); // http://domain.com/something
    *--------------------------------------------------------
    */
    function createCookie(name,value,days) {
        if (days) {
            var date = new Date();
            date.setTime(date.getTime()+(days*24*60*60*1000));
            var expires = "; expires="+date.toGMTString();
        }
        else var expires = "";
        document.cookie = name+"="+value+expires+"; path=/";
    }

    function readCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for(var i=0;i < ca.length;i++) {
            var c = ca[i];
            while (c.charAt(0)==' ') c = c.substring(1,c.length);
            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
        }
        return null;
    }

    function eraseCookie(name) {
        createCookie(name,"",-1);
    }

    /*
     * Cross-browser safe console logging
     * ex. window.log('logged stuff goes here!');
     */
    window.log = function() {
        log.history = log.history || [];
        log.history.push(arguments);
        if (this.console) {
            arguments.callee = arguments.callee.caller;
            var a = [].slice.call(arguments);
            (typeof console.log === "object" ? log.apply.call(console.log, console, a) : console.log.apply(console, a))
        }
    };
    (function(b) {
        function c() {}
        for (var d = "assert,count,debug,dir,dirxml,error,exception,group,groupCollapsed,groupEnd,info,log,timeStamp,profile,profileEnd,time,timeEnd,trace,warn".split(","), a; a = d.pop();) {
            b[a] = b[a] || c
        }
    })((function() {
        try {
            console.log();
            return window.console;
        } catch (err) {
            return window.console = {};
        }
    })());

})(jQuery);