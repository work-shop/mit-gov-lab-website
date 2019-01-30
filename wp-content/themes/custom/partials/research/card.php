<?php $terms = get_the_terms( $post->ID, 'research-topics'); ?>
<?php $term_strings = implode( ' ', array_map( function( $term ) { return $term->slug; }, $terms) ); ?>
<?php $hero = get_field('hero_image'); ?>

<div id="project-<?php echo $post->post_name; ?>"
    class=" grid-tile col-xs-12 col-sm-6 col-lg-4 mb2"
    data-sort-value="<?php echo $term_strings; ?>">

    <a href="<?php echo get_the_permalink(); ?>">
        <div class="project-tile-wrapper card-wrapper research-wrapper" style="background: url(<?php echo $hero['sizes']['sm_square']; ?>); background-size:cover; background-position:center center;">

            <div class="project-tile-overlay card-tile-overlay research-tile-overlay p2">
                <div class="">
                    <h6 class="card-content-type"><span class="research-label uppercase white bold">Research</span></h6>
                </div>
                <div class="project-tile-title">
                    <h3 class="project-tile-title-large"><?php echo $post->post_title; ?></h3>
                </div>
                <h5 class="project-tile-topics white bold">
                    <?php foreach ( $terms as $i => $topic ): ?>
                        <span class="white"><?php echo $topic->name; ?></span><?php if ( $i < count( $terms ) - 1 ) : ?>, <?php endif; ?>
                    <?php endforeach; ?>
                </h5>
            </div>
        </div>
    </a>
</div>
