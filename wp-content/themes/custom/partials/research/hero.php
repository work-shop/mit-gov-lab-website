<?php $hero = get_field('hero_image'); ?>
<?php $authors = get_field('govlab_authors'); ?>
<?php $terms = get_the_terms( $post->ID, 'research-topics'); ?>

<div class="half individual-hero-image row" style="background-image:url('<?php echo $hero['sizes']['page_hero']; ?>');"></div>

<div class="row individual-metadata-container">
    <div class="col-xs-10 col-xs-offset-1 research-metadata-box individual-metadata-box">
        <div class="row">
            <div class="col-xs-offset-1 col-sm-offset-0 col-xs-10 col-sm-12">
                <span class="research-individual-label uppercase white bold">Research</span>
            </div>
        </div>
        <div class="row">
            <h2 class="col-xs-offset-1 col-sm-offset-0 col-xs-10 col-sm-12 research-title individual-title"><?php echo $post->post_title; ?></h2>
        </div>
        <div class="row">
            <div class="col-xs-offset-1 col-sm-offset-0 col-xs-8 col-sm-10">
                <span class="individual-title-divider">&nbsp;</span>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-offset-1 col-sm-offset-0 col-xs-8 col-sm-10">
                <p class="research-summary individual-summary"><?php echo get_field('summary'); ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-offset-1 col-sm-offset-0 col-xs-8 col-sm-10 research-metadata individual-metadata">
                <?php foreach( $terms as $i => $term ): ?>
                    <span class="bold"><?php echo $term->name; ?></span><?php if ( $i < count( $terms ) - 1 ): ?>, <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<?php if ( !empty( $hero['caption'] ) ): ?>
    <div class="row mb2">
        <div class="col-sm-offset-1 col-sm-10">
            <p class="caption medium centered italic p-min"><?php echo $hero['caption']; ?></p>
        </div>
    </div>
<?php endif; ?>
