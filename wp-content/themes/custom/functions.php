<?php

define( '__ROOT__', dirname( __FILE__ ) );

require_once( __ROOT__ . '/functions/library/class-ws-cdn-url.php');

require_once( __ROOT__ . '/functions/class-ws-site-admin.php' );
require_once( __ROOT__ . '/functions/class-ws-site-init.php' );

require_once( __ROOT__ . '/functions/class-ws-abstract-custom-post-type.php' );
require_once( __ROOT__ . '/functions/class-ws-abstract-taxonomy.php' );

require_once( __ROOT__ . '/functions/library/class-ws-flexible-content.php' );
require_once( __ROOT__ . '/functions/library/class-helpers.php' );

require_once( __ROOT__ . '/functions/post-types/people/class-mit-person-post.php' );
require_once( __ROOT__ . '/functions/post-types/research/class-mit-research-post.php' );
require_once( __ROOT__ . '/functions/post-types/results/class-mit-result-post.php' );
require_once( __ROOT__ . '/functions/post-types/updates/class-mit-update-post.php' );

require_once( __ROOT__ . '/functions/taxonomies/research-statuses/class-mit-research-statuses.php' );
require_once( __ROOT__ . '/functions/taxonomies/research-topics/class-mit-research-topics.php' );
require_once( __ROOT__ . '/functions/taxonomies/result-types/class-mit-result-types.php' );


new WS_Site();
new WS_Site_Admin();

?>
