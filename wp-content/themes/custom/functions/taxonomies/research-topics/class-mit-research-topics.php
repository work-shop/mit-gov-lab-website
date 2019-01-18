<?php

class MIT_Research_Topic extends WS_Taxonomy {

    public static $slug = 'research-topics';

    public static $singular_name = 'Research Topic';

    public static $plural_name = 'Research Topics';

    public static $registered_post_types = array( 'research' );

    public static function register() { parent::register( MIT_Research_Topic::$slug, MIT_Research_Topic::$singular_name, MIT_Research_Topic::$plural_name, MIT_Research_Topic::$registered_post_types ); }

}

?>
