<section class="block vh60 bg-light" id="map">
	<?php
	$args = array(
		'posts_per_page'        => -1,
		'post_type'             => 'research'
	);
	$research_query = new WP_Query( $args );
	$count = 0;
	$mapOptions = array( 'data' => array() );

	while ( $research_query->have_posts() ) : $research_query->the_post(); ?>
		<?php

        // Set up the Appropriate JSON structure for working
        // with the map. DONT add HTML Strings here - json_encode
        // does not handle html well, and will do annoying escaping
        // that we don't want. We'll generate the HTML structure we
        // want in JS on the client side.

		$location = get_field('location');
		$title = get_the_title();
		$summary = get_field('summary');
		$link = get_the_permalink();
		$id = 'marker-' . get_the_ID();

		if ( $location && ($location['lat'] && $location['lng']) ) {

			$researchObject = array(
				'marker' => array(
					'title' => $title,
					'position' => $location,
					'link' => $link,
					'popup' => array(
						'id' => $id,
						'summary' => $summary
					)
				)
			);

			$mapOptions['data'][] = $researchObject;

		}

		?>
	<?php endwhile; ?>
	<?php wp_reset_postdata(); ?>

	<script>
		var mapOptions = <?php echo json_encode( $mapOptions, JSON_UNESCAPED_SLASHES ); ?>

        // Okay, we got the data. Now we just need to build the html, and parse
        // the latitude and longitude as integers.
        mapOptions.data.forEach( function( research ) {
        	research.marker.position.lat = parseInt(research.marker.position.lat);
        	research.marker.position.lng = parseInt(research.marker.position.lng);
        	research.marker.popup.content = '<div class="marker-card"><a href="' + research.marker.link + '"><h4 class="marker-card-title">' + research.marker.title + '</h4><p class="marker-card-summary">' + research.marker.popup.summary + '</p></a></div>';
        });

        mapOptions.render = { zoom: 3 };

    </script>
    <div class="ws-map" data-options="mapOptions"></div>
    <div class="map-tagline">
		<h3 class="map-tagline-heading">
			Our work spans<br>
			the globe
		</h3>
		<h4 class="map-tagline-subheading">
			We take a special interest in citizen engagement by under resourced groups and government accountability in challenging contexts.
		</h4>
    </div>
</section>
