<?php $image = get_field('bio_image'); ?>
<div class="teammember max-height-bounded mb3 col-xs-6 col-sm-3 col-sm-offset-1">
    <a href="<?php echo get_the_permalink(); ?>">
        <?php if ( $image ):  ?><img class="teammember-image mb1" src="<?php echo $image['sizes']['md_square']; ?>" /><?php endif; ?>
        <h4 class="teammember-name bold"><?php echo $post->post_title; ?></h4>
        <p class="teammember-description mb0"><?php echo get_field('title') ?></p>
        <a href="mailto:<?php echo get_field('email'); ?>"><?php echo get_field('email') ?></a>
    </a>
</div>
