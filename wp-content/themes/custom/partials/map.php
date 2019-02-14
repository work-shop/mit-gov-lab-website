<section class="block vh60 bg-light" id="map">


	<?php 
	$args = array(
		'posts_per_page'        => -1,
		'post_type'             => 'research'
	);
	$research_query = new WP_Query( $args );
	$count = 0;
	$mapOptions = array();

	while ( $research_query->have_posts() ) : $research_query->the_post(); ?>
		<?php 
		
		$location = get_field('location');
		$title = get_title();
		$summary = get_field('summary');
		$id = 'marker-' . get_the_ID();

		$content = '<div class="marker-card">
		<p class="marker-card-summary">'
		. $summary .
		'</p>
		</div>';

		//mapOptions JSON Object goes here
		?>
	<?php endwhile; ?>
	<?php wp_reset_postdata(); ?>

	<script>
      // `mapOptions` extends options defined in the initializer.
      var mapOptions = {
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
      		zoom: 3,
      	}
      };
  </script>
  <div class="ws-map" data-options="mapOptions"></div>
</section>