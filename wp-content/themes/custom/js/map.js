'use strict';

var mapModule = require( '@work-shop/map-module' );
var tileStyle = require( './tile-style.json' );

function makeMap () {
  console.log('map.js loaded');

  $( document ).ready( function() {

      var brandColor = '#cc3333';
      var latLng = { lat: 41.824, lng: -71.4128 };

      var map = mapModule( {
        selector: '.ws-map',
        mapTypeControl: false,
        streetViewControl: false,
        fullscreenControl: false,
        styles: tileStyle,
        center: latLng,
        zoom: 14,
        marker: {
          icon: {
            fillColor: brandColor,
          },
          popup: {
            pointer: '8px',
          }
        },
    } );

    return map;

  });


}

export { makeMap };
