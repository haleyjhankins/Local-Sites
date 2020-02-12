import { Foundation } from 'foundation-sites/js/foundation.core';
import { Reveal } from 'foundation-sites/js/foundation.reveal';
import { Equalizer } from 'foundation-sites/js/foundation.equalizer';
import { mediaQuery } from 'foundation-sites/js/foundation.util.mediaQuery';
import { imageLoader } from 'foundation-sites/js/foundation.util.imageLoader';

Foundation.plugin(Reveal, 'Reveal');
Foundation.plugin(Equalizer, 'Equalizer');
Foundation.plugin(mediaQuery, 'mediaQuery');
Foundation.plugin(imageLoader, 'imageLoader');

Foundation.addToJquery(jQuery);