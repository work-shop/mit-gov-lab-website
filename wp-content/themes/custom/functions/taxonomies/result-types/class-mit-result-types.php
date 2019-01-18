<?php

class MIT_Result_Type extends WS_Taxonomy {

    public static $slug = 'result-type';

    public static $singular_name = 'Result Type';

    public static $plural_name = 'Result Types';

    public static $registered_post_types = array( 'results' );

    public static function register() { parent::register( MIT_Result_Type::$slug, MIT_Result_Type::$singular_name, MIT_Result_Type::$plural_name, MIT_Result_Type::$registered_post_types ); }

}

?>
