<section class="pb10">
	<div class="tabs-content">
		<div class="content active" id="panel2-1">
			<iframe width='100%' height='400px' frameBorder='0' src='https://a.tiles.mapbox.com/v4/theinfiniteagency.mc0m85db/attribution,zoompan,geocoder.html?access_token=pk.eyJ1IjoidGhlaW5maW5pdGVhZ2VuY3kiLCJhIjoiNTJiNWFSMCJ9.rpJ3Ds1mUZHQV2hKPE51Aw'></iframe>
		</div>
		<div class="content" id="panel2-2">
        <div id="mapwrap-granbury"></div>
			<!-- <iframe width='100%' height='400px' frameBorder='0' src='https://a.tiles.mapbox.com/v4/theinfiniteagency.mc138167/attribution,zoompan,geocoder.html?access_token=pk.eyJ1IjoidGhlaW5maW5pdGVhZ2VuY3kiLCJhIjoiNTJiNWFSMCJ9.rpJ3Ds1mUZHQV2hKPE51Aw'></iframe> -->
		</div>
		<div class="content" id="panel2-3">
			<!-- <iframe width='100%' height='400px' frameBorder='0' src='https://a.tiles.mapbox.com/v4/theinfiniteagency.mc13ghak/attribution,zoompan,geocoder.html?access_token=pk.eyJ1IjoidGhlaW5maW5pdGVhZ2VuY3kiLCJhIjoiNTJiNWFSMCJ9.rpJ3Ds1mUZHQV2hKPE51Aw'></iframe> -->
                        <div id="mapwrap"></div>
		</div>
	</div>
	<div id="mobile-click" class="row">
		<div class="medium-12">
			<dl class="tabs tabs-3 tac" data-tab>
				<dd class="active"><a href="#panel2-1" class="one">Andrews</a>
                    <div>
                        <ul class="tab-direction">
                            <li>432.218.4195</li>
                            <li>211 West Broadway</li>
                            <li>Andrews, Texas 79714</li>
                        </ul>
                    </div>
                </dd>
                <iframe class="hide-all one" width='100%' height='400px' frameBorder='0' src='https://a.tiles.mapbox.com/v4/theinfiniteagency.mc0m85db/attribution,zoompan,geocoder.html?access_token=pk.eyJ1IjoidGhlaW5maW5pdGVhZ2VuY3kiLCJhIjoiNTJiNWFSMCJ9.rpJ3Ds1mUZHQV2hKPE51Aw'></iframe>
                <dd><a href="#panel2-2" class="two">Granbury</a>
                    <div>
                        <ul class="tab-direction">
                            <li>817.578.8884 </li>
                            <li>1315 Waters Edge Dr, Ste 112 </li>
                            <li>Granbury, Texas 76048</li>
                        </ul>
                    </div>
                </dd>
                <iframe class="hide-all two" width='100%' height='400px' frameBorder='0' src='https://a.tiles.mapbox.com/v4/theinfiniteagency.mc138167/attribution,zoompan,geocoder.html?access_token=pk.eyJ1IjoidGhlaW5maW5pdGVhZ2VuY3kiLCJhIjoiNTJiNWFSMCJ9.rpJ3Ds1mUZHQV2hKPE51Aw'></iframe>
                <dd><a href="#panel2-3" class="three">Southlake</a>
                    <div>
                        <ul class="tab-direction">
                            <li>817.578.8884 </li>
                            <li>558 Silicon Dr, Suite 100</li>
                            <li>Southlake, Texas 76092</li>
                        </ul>
                    </div>
                </dd>
                <iframe class="hide-all three" width='100%' height='400px' frameBorder='0' src='https://a.tiles.mapbox.com/v4/theinfiniteagency.mc13ghak/attribution,zoompan,geocoder.html?access_token=pk.eyJ1IjoidGhlaW5maW5pdGVhZ2VuY3kiLCJhIjoiNTJiNWFSMCJ9.rpJ3Ds1mUZHQV2hKPE51Aw'></iframe>
            </dl>
		</div>
	</div>
	<div class="row pt1">
		<div class="small-4 columns">
			<span class="tac ft2 primary-font db tcg80 lh1-5">
				432.218.4195<br>
				211 West Broadway<br>
				Andrews, Texas 79714
			</span>
		</div>
		<div class="small-4 columns">
			<span class="tac ft2 primary-font db tcg80 lh1-5">
				817.578.8884 <br>
				1315 Waters Edge Dr, Ste 112 <br>
				Granbury, Texas 76048
			</span>
		</div>
		<div class="small-4 columns">
			<span class="tac ft2 primary-font db tcg80 lh1-5">
				817.578.8884 <br>
				558 Silicon Dr, Suite 100 <br>
				Southlake, Texas 76092
			</span>
		</div>
	</div>
</section>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDz9sBQCAHWNw6b-rMZXD3mAvGokEG20QU"></script>

        <script type="text/javascript">
            // When the window has finished loading create our google map below
            google.maps.event.addDomListener(window, 'load', granburyInit);


            function granburyInit() {
                // Basic options for a simple Google Map
                // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
                var centerLatLng = new google.maps.LatLng(32.4290075, -97.77486460000002);
                var mapOptions = {
                    // How zoomed in you want the map to start at (always required)
                    zoom: 15,

                    // The latitude and longitude to center the map (always required)
                //     center: new google.maps.LatLng(32.932338, -97.110724), // New York
                    center: centerLatLng,
                    // How you would like to style the map.
                    // This is where you would paste any style found on Snazzy Maps.
                    styles: [
    {
        "featureType": "all",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "saturation": "-79"
            },
            {
                "lightness": "5"
            },
            {
                "hue": "#ffd200"
            },
            {
                "gamma": "0.58"
            }
        ]
    },
    {
        "featureType": "all",
        "elementType": "labels",
        "stylers": [
            {
                "saturation": "1"
            }
        ]
    },
    {
        "featureType": "all",
        "elementType": "labels.text.stroke",
        "stylers": [
            {
                "lightness": "100"
            },
            {
                "gamma": "1.13"
            },
            {
                "saturation": "5"
            }
        ]
    },
    {
        "featureType": "administrative",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "administrative.country",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "landscape.man_made",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "landscape.natural",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "lightness": "44"
            }
        ]
    },
    {
        "featureType": "poi.attraction",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "poi.government",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "poi.medical",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "poi.park",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "lightness": "24"
            }
        ]
    },
    {
        "featureType": "poi.place_of_worship",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "poi.school",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "poi.sports_complex",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "lightness": "80"
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "lightness": "33"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "all",
        "stylers": [
            {
                "saturation": "-63"
            }
        ]
    }
]
                };

                // Get the HTML DOM element that will contain your map
                // We are using a div with id="map" seen below in the <body>
                var mapElement = document.getElementById('mapwrap-granbury');

                // Create the Google Map using our element and options defined above
                var map = new google.maps.Map(mapElement, mapOptions);

                // Let's also add a marker while we're at it
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(32.4290075, -97.77486460000002),
                    map: map,
                    title: 'Granbury'
                });

            //     google.maps.event.addListener(map,'idle',function(event) {
            //        map.setCenter(centerLatLng); //force to set original center position
            //    });

				jQuery('a.two').click(function() {
	                var centerLatLng = new google.maps.LatLng(32.4290075, -97.77486460000002);
	                google.maps.event.trigger(map, "resize");
                    map.setCenter(centerLatLng);
	            });
            }
        </script>


        <script type="text/javascript">
            // When the window has finished loading create our google map below
            google.maps.event.addDomListener(window, 'load', init);


            function init() {
                // Basic options for a simple Google Map
                // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
                var centerLatLng = new google.maps.LatLng(32.932338, -97.110724);
                var mapOptions = {
                    // How zoomed in you want the map to start at (always required)
                    zoom: 15,

                    // The latitude and longitude to center the map (always required)
                //     center: new google.maps.LatLng(32.932338, -97.110724), // New York
                    center: centerLatLng,
                    // How you would like to style the map.
                    // This is where you would paste any style found on Snazzy Maps.
                    styles: [
    {
        "featureType": "all",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "saturation": "-79"
            },
            {
                "lightness": "5"
            },
            {
                "hue": "#ffd200"
            },
            {
                "gamma": "0.58"
            }
        ]
    },
    {
        "featureType": "all",
        "elementType": "labels",
        "stylers": [
            {
                "saturation": "1"
            }
        ]
    },
    {
        "featureType": "all",
        "elementType": "labels.text.stroke",
        "stylers": [
            {
                "lightness": "100"
            },
            {
                "gamma": "1.13"
            },
            {
                "saturation": "5"
            }
        ]
    },
    {
        "featureType": "administrative",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "administrative.country",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "landscape.man_made",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "landscape.natural",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "lightness": "44"
            }
        ]
    },
    {
        "featureType": "poi.attraction",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "poi.government",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "poi.medical",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "poi.park",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "lightness": "24"
            }
        ]
    },
    {
        "featureType": "poi.place_of_worship",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "poi.school",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "poi.sports_complex",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "lightness": "80"
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "lightness": "33"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "all",
        "stylers": [
            {
                "saturation": "-63"
            }
        ]
    }
]
                };

                // Get the HTML DOM element that will contain your map
                // We are using a div with id="map" seen below in the <body>
                var mapElement = document.getElementById('mapwrap');

                // Create the Google Map using our element and options defined above
                var map = new google.maps.Map(mapElement, mapOptions);

                // Let's also add a marker while we're at it
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(32.932338, -97.110724),
                    map: map,
                    title: 'Southlake'
                });

            //     google.maps.event.addListener(map,'idle',function(event) {
            //        map.setCenter(centerLatLng); //force to set original center position
            //    });

				jQuery('a.three').click(function() {
	                var centerLatLng = new google.maps.LatLng(32.932338, -97.110724);
	                google.maps.event.trigger(map, "resize");
                    map.setCenter(centerLatLng);
	            });
            }
        </script>

        <style type="text/css">
                #panel2-2,
                #panel2-3 {
                        height: 400px;
                        width: 100%;
                }

                #mapwrap,
                #mapwrap-granbury {
                        height: 400px;
                        width: 100%;
                }
        </style>
