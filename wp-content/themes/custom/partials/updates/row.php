<div id="<?php echo $post->post_name; ?>"class="updates-tile col-xs-12 mb2" >

    <?php $hero = get_field('hero_image');  ?>
    <?php $authors = get_field('govlab_authors'); ?>
    <?php $external_authors = get_field('external_authors'); ?>

    <div class="row">

        <div class="col-sm-4">
            <img class="updates-tile-image" src="<?php echo $hero['sizes']['medium'] ?>" />
        </div>

        <div class="col-sm-8">
            <h6 class="updates-tile-metadata bold">
                <?php echo get_field('publication_date'); ?>

                <?php if ( ($total_authors = count( $authors )) > 0 ): ?>
                    <span class="brand-stroke">/</span>
                    <?php foreach ($authors as $i => $author): ?>
                        <?php echo $author->post_title; ?><?php if ($i < $total_authors - 1): ?>, <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </h6>

            <a href="<?php echo get_the_permalink(); ?>"><h3 class="updates-tile-title bold"><?php echo get_the_title(); ?></h3></a>

            <h5 class="updates-tile-summary"><?php echo get_field('summary'); ?></h5>

        </div>

    </div>

</div>
