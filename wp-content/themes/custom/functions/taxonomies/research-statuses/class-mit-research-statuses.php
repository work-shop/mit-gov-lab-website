<?php

class MIT_Research_Status extends WS_Taxonomy {

    public static $slug = 'research-status';

    public static $singular_name = 'Research Status';

    public static $plural_name = 'Research Statuses';

    public static $registered_post_types = array( 'research' );

    public static function register() { parent::register( MIT_Research_Status::$slug, MIT_Research_Status::$singular_name, MIT_Research_Status::$plural_name, MIT_Research_Status::$registered_post_types ); }

}

?>
