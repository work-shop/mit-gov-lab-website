<?php

class MIT_Research_Post extends WS_Custom_Post_Type {

    public static $slug = 'research';

    public static $singular_name = 'Research Project';

    public static $plural_name = 'Research';

    public static $post_options = array(
        'menu_icon'                 => 'dashicons-admin-site',
        'hierarchical'              => false,
        'has_archive'               => false,
        'menu_position'             => 4,
        'supports'                  => array(
                                        'title',
                                        'revisions'
                                    ),
        'rewrite'                   => array(
                                        'slug' => 'research',
                                        'with_front' => false,
                                        'feeds' => true,
                                        'pages' => true
                                    ),
        'taxonomies'                => array( '' )

    );

    public static $query_options = array(

    );


    /**
     * ==== Instance Members and Methods ====
     */

    public function __construct( $id ) {

        $this->id = $id;

    }

    public function validate() {

    }

    public function create() {

    }

}

?>
