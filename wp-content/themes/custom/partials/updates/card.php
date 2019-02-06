<?php $image = get_field('hero_image'); ?>
<?php $authors = get_field('govlab_authors'); ?>

<div id="update-<?php echo $post->post_name; ?>"
    class=" grid-tile col-xs-12 col-sm-6 col-lg-4 mb2"
    data-publish-date="<?php echo get_field('publication_date'); ?>">

    <a href="<?php get_the_permalink() ?>">
        <div class="project-tile-wrapper card-wrapper updates-wrapper" style="background: url('<?php echo $image['sizes']['medium']; ?>'); background-size:cover; background-position:center center;">

            <div class="project-tile-overlay card-tile-overlay updates-tile-overlay p2">
                <div class="">
                    <h6 class="card-content-type"><span class="updates-label uppercase white bold">Update</span></h6>
                </div>
                <div class="project-tile-title">
                    <h3 class="project-tile-title-large"><?php echo $post->post_title; ?></h3>
                </div>
                <h5 class="project-tile-topics white bold">
                    <span class="white"><?php echo date('F Y', strtotime(get_field('publication_date'))); ?></span> /
                    <?php foreach( $authors as $i => $author ):  ?>
                        <span class="white"><?php echo $author->post_title; ?></span><?php if ( $i < count( $authors ) - 1 ): ?>, <?php endif; ?>
                    <?php endforeach; ?>
                </h5>
            </div>
        </div>
    </a>
</div>
