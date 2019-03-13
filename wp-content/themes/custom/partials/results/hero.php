<?php $term = get_the_terms( $post->ID, 'result-type')[0]; ?>
<?php $hero = get_field('hero_image'); ?>
<?php $authors = get_field('govlab_authors'); ?>
<?php $external_authors = get_field('external_authors'); ?>
<?php $document = get_field('document'); ?>
<?php $date = ($pub_date = get_field('publication_date')) ? $pub_date: $post->post_date; ?>

<div class="half individual-hero-image row <?php if( !$hero ): ?>hidden-xs<?php endif; ?>" style="background-image:url('<?php echo $hero['sizes']['page_hero']; ?>');"></div>
<?php if ( $hero['caption'] ) : ?>
    <div class="row mb2 hidden">
        <div class="col-sm-offset-6 col-sm-5">
            <p class="caption gray righted p-min"><?php echo $hero['caption']; ?></p>
        </div>
    </div>
<?php endif; ?>
<div class="row individual-metadata-container <?php if( !$hero ): ?>truncated<?php endif; ?>">
    <div class="col-xs-10 col-xs-offset-1 result-metadata-box individual-metadata-box <?php if( !$hero ): ?>truncated<?php endif; ?>">
        <div class="row">
            <div class="col-xs-offset-1 col-sm-offset-0 col-xs-10 col-sm-12 mb1">
                <span class="results-individual-label uppercase white bold"><?php echo $term->name; ?></span>
            </div>
        </div>
        <div class="row">
            <h2 class="col-xs-offset-1 col-sm-offset-0 col-xs-10 col-sm-12 result-title individual-title"><?php echo $post->post_title; ?></h2>
        </div>
        <div class="row">
            <div class="col-xs-offset-1 col-sm-offset-0 col-xs-8 col-sm-10">
                <span class="individual-title-divider">&nbsp;</span>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-offset-1 col-sm-offset-0 col-xs-8 col-sm-12">
                <p class="result-summary individual-summary"><?php echo get_field('summary'); ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-offset-1 col-sm-offset-0 col-xs-8 col-sm-10 result-metadata individual-metadata">
                <span class="white bold"><?php echo date('F Y', strtotime($date)); ?></span>
                /
                <?php foreach ( $authors as $i => $author ): ?>
                    <span class="bold"><?php echo $author->post_title; ?></span><?php if ( $i < count( $authors ) - 1 ): ?>, <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
        <?php if ( $document ) : ?>
            <div class="row mt2">
                <div class="col-xs-offset-1 col-sm-offset-0 col-xs-8 col-sm-10">
                    <span class="download-button-container">
                        <a href="<?php echo $document['url']; ?>" class="white download-button mb1" target="_blank">Download</a>
                    </span>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
