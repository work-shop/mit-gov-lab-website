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
		$id = 'marker-' . get_the_ID();

        if ( $location ) {

            $researchObject = array(
                'marker' => array(
                    'title' => $title,
                    'position' => $location,
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
            research.marker.position.lat = parseInt(research.marker.position.lat)
            research.marker.position.lng = parseInt(research.marker.position.lng);
            research.marker.popup.content = '<div class="marker-card"><p class="marker-card-summary">' + research.marker.popup.summary + '</p></div>';
        });

        // Log it out for verification.
        console.log( mapOptions );

  </script>
  <div class="ws-map" data-options="mapOptions"></div>
</section>
