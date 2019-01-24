<?php

class MIT_Update_Post extends WS_Custom_Post_Type {

    public static $slug = 'updates';

    public static $singular_name = 'Update';

    public static $plural_name = 'Updates';

    public static $post_options = array(
        'menu_icon'                 => 'dashicons-format-status',
        'hierarchical'              => false,
        'has_archive'               => true,
        'menu_position'             => 4,
        'supports'                  => array(
                                        'title',
                                        'revisions'
                                    ),
        'rewrite'                   => array(
                                        'slug' => 'updates',
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
