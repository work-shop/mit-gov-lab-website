<?php $hero = get_field('hero_image'); ?>
<?php $term = get_the_terms( $post->ID, 'result-type')[0]; ?>
<li class="p0 col-xs-offset-1 col-xs-10 project-result search-result mb1">
    <a href="<?php echo get_the_permalink(); ?>" class="">
        <?php if ( $hero ): ?>
            <div class="col-sm-2 hidden-xs related-image-block-container">
                <div class="related-image-block" style="background-image:url('<?php echo $hero['sizes']['sm_square']; ?>'); background-position:center 0%;"></div>
            </div>
        <?php endif; ?>
    <div class="<?php if (!$hero): ?>col-sm-offset-2 <?php endif; ?>col-sm-10 col-xs-12">
            <span class="h6 output-type uppercase bold mt0"><?php echo $term->name; ?></span>
            <span class="h6 uppercase gray bold mt0"><?php echo date('F Y', strtotime(get_field('publication_date'))); ?></span>
            <h4 class="bold mt0"><?php echo $post->post_title; ?></h4>
            <p class="project-description small hidden-xs"><?php echo get_field('summary'); ?></p>
        </div>
    </a>
</li>
