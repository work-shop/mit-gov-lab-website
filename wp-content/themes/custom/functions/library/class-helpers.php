<?php

class Helpers{

	public static function is_tree($pid) {
		global $post;
		if( ( $post->post_parent == $pid || is_page($pid) || get_the_ID() === $pid ) ) {
			// we're at the page or at a sub page
			return true;
		}  else{
			return false;
		}
	}

	public static function filter_categories(){
		$terms = get_the_terms( $post, 'category' );
		if( $terms ):
			foreach ($terms as $term) :
				echo 'filter-';
				echo $term->slug;
				echo ' ';
			endforeach;
		endif;
	}


    public static function get_related_work( $id, $author_query=false ) {
        if ( $author_query ) { return static::get_related_work_for_author( $id ); }

        $direct_related_work = get_field( 'related_work', $id );

        $inverse_related_work = get_posts(array(
            'post_type' => array( 'updates', 'research', 'results' ),
            'meta_query' => array(
                array(
                    'key' => 'related_work',
                    'value' => '"' . $id . '"',
                    'compare' => 'LIKE'
                )
            )
        ));

        if ( $direct_related_work ) {

            return static::combine_arrays( $direct_related_work, $inverse_related_work );

        } else {

            return $inverse_related_work;

        }

    }

    public static function get_related_work_for_author( $id ) {
        $direct_related_work = get_field( 'related_work', $id );

        $inverse_related_work = get_posts(array(
            'post_type' => array( 'updates', 'research', 'results' ),
            'meta_query' => array(
                array(
                    'key' => 'govlab_authors',
                    'value' => '"' . $id . '"',
                    'compare' => 'LIKE'
                )
            )
        ));

        if ( $direct_related_work ) {

            return static::combine_arrays( $direct_related_work, $inverse_related_work );

        } else {

            return $inverse_related_work;

        }

    }


    private static function combine_arrays( $arr_1, $arr_2 ) {

        return array_map( 'unserialize', array_unique( array_map( 'serialize', array_merge( $arr_1, $arr_2 ))));

    }

} ?>
