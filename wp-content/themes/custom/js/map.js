'use strict';

var mapModule = require( '@work-shop/map-module' );
var tileStyle = require( './tile-style.json' );

function makeMap () {
  console.log('map.js loaded');
  
  var brandColor = '#cc3333';
  var latLng = { lat: 30, lng: 0 };

  $( document ).ready( function() {

    return mapModule( {
      selector: '.ws-map',
      mapTypeControl: false,
      streetViewControl: false,
      fullscreenControl: false,
      styles: tileStyle,
      center: latLng,
      //zoom: 14,
      marker: {
        icon: {
          fillColor: brandColor,
        },
        popup: {
          pointer: '8px',
        }
      },
    } );

  } );


}

export { makeMap };
