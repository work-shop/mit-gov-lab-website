<?php $hero = get_field('hero_image'); ?>
<?php $authors = get_field('govlab_authors'); ?>
<?php $date = ($pub_date = get_field('publication_date')) ? $pub_date: $post->post_date; ?>


<div class="half individual-hero-image row" style="background-image:url('<?php echo $hero['sizes']['page_hero']; ?>');"></div>

<div class="row individual-metadata-container">
    <div class="col-xs-10 col-xs-offset-1 update-metadata-box individual-metadata-box">
        <div class="row">
            <div class="col-xs-offset-1 col-sm-offset-0 col-xs-10 col-sm-12">
                <span class="updates-individual-label uppercase white bold">Update</span>
            </div>
        </div>
        <div class="row">
            <h2 class="col-xs-offset-1 col-sm-offset-0 col-xs-10 col-sm-12 update-title individual-title"><?php echo $post->post_title; ?></h2>
        </div>
        <div class="row">
            <div class="col-xs-offset-1 col-sm-offset-0 col-xs-8 col-sm-10">
                <span class="individual-title-divider">&nbsp;</span>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-offset-1 col-sm-offset-0 col-xs-8 col-sm-10">
                <p class="update-summary individual-summary"><?php echo get_field('summary'); ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-offset-1 col-sm-offset-0 col-xs-8 col-sm-10 update-metadata individual-metadata">
                <span class="white bold"><?php echo date('F Y', strtotime($date)); ?></span>
                /
                <?php foreach ($authors as $i => $author): ?>

                    <span class="bold"><?php echo $author->post_title ?></span><?php if ($i < count( $authors ) - 1): ?>, <?php endif; ?>

                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
