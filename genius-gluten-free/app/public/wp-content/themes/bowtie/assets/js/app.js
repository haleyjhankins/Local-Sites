
smoothScroll.init({
  offset: 100
});

var h = document.querySelector('header.main');
//var readout = document.getElementById("readout");
var stuck = false;
var stickPoint = getDistance();

function getDistance() {
  var topDist = h.offsetTop + 100;
  return topDist;
}

window.onscroll = function(e) {
  var distance = getDistance() - window.pageYOffset;
  var offset = window.pageYOffset;
  if ( (distance <= 0) && !stuck) {
    h.classList.remove('unstuck');
    h.classList.add('sticky');
    stuck = true;
  } else if (stuck && (offset <= stickPoint)){
    h.classList.remove('sticky');
    h.classList.add('unsticky');
    setTimeout(function() {
      h.classList.remove('unsticky');
      h.classList.add('unstuck');
    }, 0)
    stuck = false;
  }
}

// Open and Close Menu
let menu = document.querySelector('[data-menu]');
if(menu) {
  menu.addEventListener('click',(e) => {
    e.preventDefault();
    document.body.classList.toggle('menu-open');
  })
}

let responsiveNav = document.querySelectorAll('nav.responsive .menu-item a');
for(let i=0;i<responsiveNav.length;i++) {
  responsiveNav[i].addEventListener('click', (e) => {
    e.preventDefault()
    let id = responsiveNav[i].href.substr(responsiveNav[i].href.indexOf('#')+1)
    id = '#' + id;
    console.log(id)
    let target = document.querySelector(id);
    console.log(target)
    if(target) {
      document.body.classList.remove('menu-open')

      setTimeout(() => {
        smoothScroll.animateScroll(target, null, {
          offset: 100
        })
      }, 500)
    }
  })
}

class Modal {
  constructor(toggle) {
    this.active = false;
    this._toggle = toggle;
    this.targetId = toggle.getAttribute('data-target');
    this._target = document.querySelector(this.targetId);
    this.overlay = null;

    this._generateOverlay();

    if(this._target) {
      let closeButton = this._target.querySelector('[data-close]');
      if(closeButton) closeButton.addEventListener('click', (e) => { e.preventDefault(); this.close(); });
    }
  }

  open() {
    this.openOverlay();
    if(this._target) {
      this.active = true;
      document.body.classList.add('modal-open');
      this._target.classList.add('entering');
      setTimeout(() => {
        this._target.classList.add('active');
        this._target.classList.remove('entering');
      }, 250);
    } else {
      console.error('Target not set on toggle', this._toggle);
    }
  }

  close() {
    this.closeOverlay();
    this.active = false;
    document.body.classList.remove('modal-open');
    this._target.classList.add('leaving');
    setTimeout(() => {
      this._target.classList.remove('active');
      this._target.classList.remove('leaving');
    }, 500);
  }

  toggle() {
    if(this.target.classList.has('active')) {
      this.close();
    } else {
      this.open();
    }
  }

  _generateOverlay() {
    if(!this._overlay) {
      let overlay = document.querySelector('.modal--overlay');
      if(overlay) {
        this._overlay = overlay;
      } else {
        overlay = document.createElement('div');
        overlay.classList.add('modal--overlay');
        document.body.appendChild(overlay);
        this._overlay = overlay;
      }

      return overlay;
    }
  }

  openOverlay() {
    if(this._overlay) {
      this.overlayActive = true;
      document.body.classList.add('overlay-open');
      this._overlay.classList.add('entering');
      setTimeout(() => {
        this._overlay.classList.add('active');
        this._overlay.classList.remove('entering');
      }, 250);
    }
  }

  closeOverlay() {
    if(this._overlay) {
      this.overlayActive = false;
      document.body.classList.remove('overlay-open');
      this._overlay.classList.add('leaving');
      setTimeout(() => {
        this._overlay.classList.remove('active', 'leaving');
      }, 250);
    }
  }

  isOpen() {
    return this.active;
  }
}

let modalLinks = document.querySelectorAll('.open-modal');
for(let i=0;i<modalLinks.length;i++) {
  let modal = new Modal(modalLinks[i])
  modalLinks[i].addEventListener('click', (e) => {
    e.preventDefault();
    modal.open();
  })
}



class LocationFinder {
  constructor(wrapper, options) {
    if(!wrapper) return console.error('Wrapper element for locationFinder is required')
    this.wrapperElement = wrapper;
    this.mapElement = wrapper.querySelector('.locationFinder--map');
    this.listElement = wrapper.querySelector('.locationFinder--locations-list');
    this.loaderElement = wrapper.querySelector('.locationFinder--loader');
    this.errorElement = wrapper.querySelector('.locationFinder--locations-error');
    this.retryElement = wrapper.querySelector('[data-retry]');

    if(!this.mapElement) return console.error('Map element for locationFinder could not be found')

    // Cache the Location Template
    let template = wrapper.querySelector('[data-template]')
    this.template = template.cloneNode(true);
    template.remove();

    // Apply user options
    this.options = {
      radius: 50,
      zoom: 12,
      scrollWheel: false,
      streetViewControl: false,
      mapTypeControl: false,
      center: { lat: 0, lng: 0 },
      pinPath: '/assets/images/',
      pinSize: [20, 32],
      errors: {
        geolocationDisabled: 'Could not get your current location. Please enter your address, city, or zip.',
        geolocationUnsupported: 'Could not get your current location. Please enter your address, city, or zip.'
      }
    }

    Object.assign(this.options, options);

    this.position = {};
    this.locations = [];
    this.closestLocations = [];
    this.markers = [];
    this.loading = true;
  }

  init() {
    // Init Map Element
    this.isLoading(true);
    google.load("maps", "3",{ other_params:"libraries=geometry&key=AIzaSyBQAE-6I6Hcv6JsyjVHu6lcI7yK47-FyOw" });
    google.setOnLoadCallback(() => {
      this.map = new google.maps.Map(this.mapElement, {
        center: this.options.center,
        scrollwheel: this.options.scrollWheel,
        streetViewControl: this.options.streetViewControl,
        mapTypeControl: this.options.mapTypeControl,
        zoom: this.options.zoom,
      });

      // Get All Locations
      this.getLocations().done((locations) => {
        this.locations = locations;
        console.log('all locations',locations)
        // Find User's Position and Reset Map
        this.getUserLocation((err, position) => {
          if(err) {
            this.isLoading(false);
            this.setError(err)
            return false;
          }
          this.setPosition(position);
          this.getClosest(position, (err, locations) => {
            if(!err) this.closestLocations = locations;
            this.addLocations(locations);
            this.isLoading(false);
          })
        })
      }).fail((err) => {
        console.log(err);
        this.isLoading(false);
      })
    })

    // Add Event Listener for Search Field
    let searchField = this.wrapperElement.querySelector('.locationFinder--zip');
    searchField.addEventListener('keypress', (e) => {
      this.searchOnEnter(e)
    });

    let quickSearchField = document.querySelector('.quick-search--field');
    quickSearchField.addEventListener('keypress', (e) => {
      this.quickSearchOnEnter(e)
    })

    let quickSearchTrigger = document.querySelector('.quick-search--submit')
    quickSearchTrigger.addEventListener('click', (e) => {
      e.preventDefault()
      this.quickSearch()
    })

    this.retryElement.addEventListener('click', (e) => {
      e.preventDefault()
      this.showEmpty(false)
      searchField.value = ''
      searchField.focus()
    })

    // Add Event Listener for Radius Drop Down
    let radiusLabel = this.wrapperElement.querySelector('.locationFinder--radius-label')
    let radiusLabelText = radiusLabel.querySelector('span')
    let radiusMenu = this.wrapperElement.querySelector('.locationFinder--radius-menu')
    radiusLabel.addEventListener('click', (e) => {
      e.preventDefault();
      radiusMenu.classList.toggle('active')
    })

    let radiusLinks = radiusMenu.querySelectorAll('.locationFinder--radius-item_link')
    for(let r=0;r<radiusLinks.length;r++) {
      radiusLinks[r].addEventListener('click', (e) => {
        e.preventDefault();
        radiusMenu.classList.remove('active')
        let newRadius = radiusLinks[r].getAttribute('data-radius');
        this.setRadius(newRadius)
        radiusLabelText.innerText = `${newRadius}mi`;

        this.clearLocations();
        this.clearMarkers();
        this.getClosest(this.position, (err, locations) => {
          if(!err) this.closestLocations = locations;
          this.addLocations(locations);
        })

      })
    }
  }

  quickSearch() {
    let quick = document.querySelector('.quick-search--field')
    this.search(quick.value)
    let searchField = this.wrapperElement.querySelector('.locationFinder--zip')
    searchField.value = quick.value
    
    smoothScroll.animateScroll(document.querySelector('#store-locator'), null, {
      offset: 100
    })
  }

  search(search) {
    if(search.length == 0) return false;
    this.setError(false);
    this.isLoading(true);
    this.clearPosition();
    this.clearLocations();
    this.clearMarkers();

    LocationFinder.codeAddress(search, (err, position) => {
      if(err) return console.log(err);
      this.setPosition(position);

      this.getClosest(position, (err, locations) => {
        if(err) return done(err);
        if(locations.length > 0) {
          this.closestLocations = locations;
          this.addLocations(locations);
          this.showEmpty(false);
        } else {
          this.showEmpty(true);
        }

        this.isLoading(false);
      })
    })
  }

  searchOnEnter(e) {
    var eve = e || window.event;
    var keycode = eve.keyCode || eve.which || eve.charCode;

    if (keycode == 13) {
      eve.cancelBubble = true;
      eve.returnValue = false;

      if (eve.stopPropagation) {
        eve.stopPropagation();
        eve.preventDefault();
      }


      this.search(e.target.value);

      e.target.blur()

      return false;
    }
  }

  quickSearchOnEnter(e) {
    var eve = e || window.event;
    var keycode = eve.keyCode || eve.which || eve.charCode;

    if (keycode == 13) {
      eve.cancelBubble = true;
      eve.returnValue = false;

      if (eve.stopPropagation) {
        eve.stopPropagation();
        eve.preventDefault();
      }


      this.quickSearch(e.target.value);

      e.target.blur()

      return false;
    }
  }

  getClosest(position, done) {
    if(!position) return false;
    let closeBy = [];
    for(let i=0;i<this.locations.length;i++) {
      if(this.locations[i].acf.latitude && this.locations[i].acf.latitude) {
        let distance = LocationFinder.computeDistance(position, this.locations[i].acf);
        if(distance < this.options.radius) {
          closeBy.push({ location: this.locations[i], distance: distance });
        }
      }
    }

    // Sort by Distance
    closeBy.sort(function(a, b) {
      return parseFloat(a.distance) - parseFloat(b.distance);
    })

    return done(null, closeBy);
  }

  getLocations() {
    return jQuery.get('/wp-json/wp/v2/location?per_page=100');
  }

  addLocation(location) {
    let element = this.template.cloneNode(true);

    element.setAttribute('data-label', location.label)
    let label = element.querySelector('[data-field="label"]')
    if(label) label.innerText = location.label;

    let title = element.querySelector('[data-field="title"]')
    if(title) title.innerText = location.location.title.rendered;

    let distance = element.querySelector('[data-field="distance"]')
    if(distance) distance.innerText = location.distance.toFixed(1) + ' miles';

    let address = element.querySelector('[data-field="address"]');
    if(address) address.innerText = location.location.acf.address;

    let phone_number = element.querySelector('[data-field="phone_number"]');
    if(phone_number) phone_number.innerText = location.location.acf.phone_number;

    let call_button = element.querySelector('[data-href="phone_number"]');
    if(call_button) call_button.href = 'tel:'+location.location.acf.phone_number

    let hours = element.querySelector('[data-field="hours"]')
    if(hours && location.location.acf.hours.length > 0) {
      let weekdays = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday']
      let today = weekdays[new Date().getDay()]

      let todaysHours = LocationFinder.getOne(today, location.location.acf.hours, 'day')
      if(!todaysHours) todaysHours = LocationFinder.getOne('Everyday', location.location.acf.hours, 'day')
      if(todaysHours) {
        hours.innerText = `Open until: ${todaysHours.closed}`
      } else {
        hours.innerHTML = '&nbsp;'
      }
    }

    return this.listElement.appendChild(element)
  }

  addLocations(locations) {
    let labels = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z']
    for(let l=0;l<locations.length;l++) {
      locations[l].label = labels[l].toLowerCase();
      let marker = this.addMarker({ lat: Number(locations[l].location.acf.latitude), lng: Number(locations[l].location.acf.longitude) }, `${this.options.pinPath}pin-${locations[l].label}.png`)
      marker.addListener('click', () => {
        let activeLocation = this.listElement.querySelector('.highlighted')
        if(activeLocation) activeLocation.classList.remove('highlighted')
        let selectedLocation = this.listElement.querySelector(`[data-label="${locations[l].label}"]`)
        selectedLocation.classList.add('highlighted')
        console.log(selectedLocation.offsetTop - this.listElement.offsetTop, this.listElement.scrollTop)
        this.listElement.scrollTop = selectedLocation.offsetTop - this.listElement.offsetTop
        this.map.setCenter({ lat: Number(locations[l].location.acf.latitude), lng: Number(locations[l].location.acf.longitude) })
      })
      let location = this.addLocation(locations[l]);
      location.addEventListener('click', () => {
        this.map.setCenter({ lat: Number(locations[l].location.acf.latitude), lng: Number(locations[l].location.acf.longitude) })
        let activeLocation = this.listElement.querySelector('.highlighted')
        if(activeLocation) activeLocation.classList.remove('highlighted')
        location.classList.add('highlighted')
      })
    }
  }

  clearLocations() {
    this.listElement.innerHTML = '';
  }

  addMarker(location = {}, pinURL) {
    let icon = null;
    if(pinURL) {
      icon = {
        url: pinURL,
        scaledSize: new google.maps.Size(this.options.pinSize[0],this.options.pinSize[1])
      }
    }

    let marker = new google.maps.Marker({
      position: location,
      icon,
    });

    this.markers.push(marker);
    marker.setMap(this.map);

    return marker;
  }

  removeMarker(n) {
    this.markers[n].setMap(null);
    this.markers.splice(n, 1);
  }

  clearMarkers() {
    for(let i=0;i<this.markers.length;i++) {
      this.markers[i].setMap(null);
    }

    this.markers = [];
  }

  clearPosition() {
    if(this.position) this.position = null;
    if(this.positionMarker) {
      this.positionMarker.setMap(null);
      this.positionMarker = null;
    }

  }

  setPosition(position) {
    // Cache their position
    this.position = position;
    // Add current position to map
    let marker = new google.maps.Marker({
      position
    });

    this.positionMarker = marker;
    marker.setMap(this.map);
    this.map.setCenter(position);
  }

  setRadius(miles) {
    if(!miles) miles = 50;
    return this.options.radius = miles;
  }

  setError(state) {
    if(state == true || typeof state == 'string') {
      this.wrapperElement.classList.add('locationFinder--error');
      if(typeof state == 'string') {
        this.errorElement.innerHTML = state;
      }
    } else if(state == false) {
      this.wrapperElement.classList.remove('locationFinder--error');
      this.errorElement.innerHTML = '';
    }
  }

  showEmpty(state) {
    if(state === true) {
      this.wrapperElement.classList.add('locationFinder--empty');
    } else if(state === false) {
      this.wrapperElement.classList.remove('locationFinder--empty');
    }
  }

  isLoading(state) {
    //console.log('loading: '+state);
    if(state === true) {
      this.loading = state;
      this.loaderElement.classList.add('active');
    } else if(state === false) {
      this.loading = state;
      this.loaderElement.classList.remove('active');
    }

    return this.loading;
  }

  getUserLocation(done) {
    if(navigator.geolocation) {
      let closeBy = [];
      navigator.geolocation.getCurrentPosition((position) => {
        let pos = {lat: position.coords.latitude, lng: position.coords.longitude};
        //var pos = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);
        return done(null, pos);
      }, () => {
        // Could not get current position
        console.log('Could not get current position');
        return done(this.options.errors.geolocationDisabled);
      });
    } else {
      // Browser doesn't support Geolocation
      console.log('Browser does not support geolocation');
      return done(this.options.errors.geolocationUnsupported);
    }
  }

  static getOne(id, arr, key = 'id') {
    let one = LocationFinder.findOne(arr, { [key]: id });
    if(one.length > 0) return one[0];
    return false;
  }

  static findOne(set, properties, key) {
    return set.filter((entry) => {
        return Object.keys(properties).every((key) => {
            return entry[key] == properties[key];
        });
    });
  }

  static codeAddress(address, done) {
    const geocoder = new google.maps.Geocoder();
    geocoder.geocode( { 'address': address }, (results, status) => {
      if(status == 'OK') {
        let location = results[0].geometry.location;
        return done(null, location);
      } else {
        return done('Geocode failed: '+status);
      }
    });
  }

  static kmToMiles(km) {
    return km * 0.621371;
  }

  static roundNumber(number) {
    return Math.ceil(number / 100) * 100
  }

  static computeDistance(position, location) {
    let posLatitude = (typeof position.lat == 'function') ? position.lat() : position.lat;
    let posLongitude = (typeof position.lng == 'function') ? position.lng() : position.lng;

    let radlat1 = Math.PI * posLatitude/180
    let radlat2 = Math.PI * Number(location.latitude)/180
    let theta = posLongitude-Number(location.longitude)
    let radtheta = Math.PI * theta/180
    let dist = Math.sin(radlat1) * Math.sin(radlat2) + Math.cos(radlat1) * Math.cos(radlat2) * Math.cos(radtheta);
    dist = Math.acos(dist)
    dist = dist * 180/Math.PI
    dist = dist * 60 * 1.1515
    return dist
  }
}

let finder = new LocationFinder(document.querySelector('#locationFinder'), {
  center: {
    lat: 30.266653,
    lng: -97.743306
  },
  pinPath: '/wp-content/themes/bowtie/assets/img/',
  pinSize: [43, 58],
  errors: {
    geolocationDisabled: 'Could not get your current location. Please enter your address, city, or zip to find Genius bread near you.',
    geolocationUnsupported: 'Could not get your current location. Please enter your address, city, or zip to find Genius bread near you.'
  }
}).init();
