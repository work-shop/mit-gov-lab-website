<?php // var_dump($post); ?>
<?php $term = get_the_terms( $post->ID, 'result-type')[0]; ?>
<?php $hero = get_field('hero_image'); ?>
<?php $authors = get_field('govlab_authors'); ?>
<?php $external_authors = get_field('external_authors'); ?>


<div id="result-<?php echo $post->post_name; ?>"
    class=" grid-tile col-xs-12 col-sm-6 col-lg-4 mb2"
    data-publish-date="<?php echo get_field('publication_date'); ?>"
    data-sort-value="<?php echo $term->slug; ?>">

    <a href="<?php echo get_the_permalink(); ?>">
        <div class="project-tile-wrapper card-wrapper results-wrapper" <?php if ($hero): ?>style="background: url(<?php echo $hero['sizes']['sm_square']; ?>); background-size:cover; background-position:center center;"<?php endif; ?> >

        <div class="project-tile-overlay card-tile-overlay result-tile-overlay <?php if (!$hero): ?>no-image<?php endif; ?> p2">
                <div class="">
                    <h6 class="card-content-type"><span class="results-label uppercase white bold"><?php echo $term->name; ?></span></h6>
                </div>
                <div class="project-tile-title">
                    <h3 class="project-tile-title-large"><?php echo $post->post_title; ?></h3>
                </div>
                <h5 class="project-tile-topics white bold">
                    <span class=""><?php echo get_field('publication_date'); ?></span><?php if (($total_authors = count($authors)) > 0): ?> /
                        <?php foreach ($authors as $i => $author): ?>
                            <span class=""><?php echo $author->post_title; ?></span><?php if ($i < $total_authors - 1): ?>, <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </h5>
            </div>
        </div>
    </a>

</div>
