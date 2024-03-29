'use strict';

global.$ = require('jquery');
global.jQuery = global.$;
window.$ = global.$;

//must use
import { config } from './config.js';
import { loading } from './loading.js';
import { viewportLabel } from './viewport-label.js';
import { linksNewtab } from './links-newtab.js';
import { jqueryAccordian } from './jquery-accordian.js';
import { accordian } from './accordian.js';
import { jumpLinks } from './jump-links.js';
import { modals } from './modals.js';
import { slickSlideshows } from './slick-slideshows.js';
import { sitewideAlert } from './sitewide-alert.js';
import { livereload } from './livereload-client.js';

//optional
import { stickyNav } from './sticky-nav.js';
import { dropdowns } from './dropdowns.js';
import { menuToggle } from './menu-toggle.js';
import { sizing } from './sizing.js';
import { makeMap } from './map.js';

// isNaN polyfill for IE11

if ( typeof Object.isNaN === 'undefined' ) {
    Object.isNaN = function( value ) {
        var n = Number( value );
        return n !== n;
    };
}


//must use
livereload();
loading(config.loading);
sizing();
makeMap();

// linksNewtab(config.linksNewtab);
// viewportLabel(config.viewportLabel);
// jqueryAccordian();
// accordian();
// jumpLinks(config.jumpLinks);
// modals(config.modals);
// slickSlideshows(config.slickSlideshows);
// sitewideAlert();

//optional
// stickyNav(config.stickyNav);
// dropdowns(config.dropdowns);
// menuToggle(config.menuToggle);

// NOTE: use old-style require for
// files imported from legacy govlab site.
require('./legacy/functions.js');
require('./legacy/iframeResizer.min.js')();
$( document ).ready(function() {
    $('#evidence-gap-map-frame').iFrameResize({log:false});
});
