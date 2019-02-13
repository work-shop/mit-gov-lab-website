<section class="block vh60 bg-light" id="map">
	<script>
      // `optionsForMapInitializer` extends options defined in the initializer.
      var mapOptions = {
      	map: {
      		streetViewControl: true,
      	},
      	data: [
      	{
      		"marker": {
      			"title": "js",
      			"position": {
      				"lat": 41.81629200385342,
      				"lng": -71.40854704864358
      			},
      			"popup": {
      				"id": "-abc",
      				"content": "<div>\n          <p>js</p>\n          <p><p>Olneyville Library is located at 1 Olneyville Square, <span class=\"locality\">Providence</span>, <span class=\"state\">RI</span> <span class=\"postal-code\">02909</span></p>\n</p>\n        </div>"
      			}
      		}
      	},
      	{
      		"marker": {
      			"title": "Knight Memorial Library, Elmwood Ave, Providence, RI, USA",
      			"position": {
      				"lat": 41.80505319999999,
      				"lng": -71.42598420000002
      			},
      			"popup": {
      				"id": "-xyz",
      				"content": "<div>\n          <p>Knight Memorial Library, Elmwood Ave, Providence, RI, USA</p>\n          <p><p>Knight Memorial Library is located at 275 Elmwood Avenue, <span class=\"locality\">Providence</span>, <span class=\"state\">RI</span> <span class=\"postal-code\">02907</span></p>\n</p>\n        </div>"
      			}
      		}
      	}
      	],
      	render: {
      		zoom: 14,
      	}
      };
  </script>
  <div class="ws-map" data-options="mapOptions"></div>
</section>