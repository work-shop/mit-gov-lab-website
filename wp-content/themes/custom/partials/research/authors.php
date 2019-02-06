<?php $authors = get_field('govlab_authors'); ?>
<?php if ( $authors ): ?>
    <section id="project-teammembers" class="bg-white mb2">
        <div class="container-fluid">

            <div class="row">
                <div class="col-xs-offset-1 col-xs-10 mb2">
                    <div class="projects-rule"></div>
                    <h4>Team</h4>
                </div>
            </div>

            <?php foreach ($authors as $i => $author): ?>

                <?php if ( $i % 5  == 0 ) : ?>
                    <div class="row">
                <?php endif; ?>

                <div class="teammember <?php if ( $i % 5  == 0 ) : ?>col-xs-offset-1<?php endif; ?> col-xs-6 col-sm-2 mb1">
                    <a href="<?php echo get_permalink( $author->ID ); ?>">
                        <?php $hero = get_field('bio_image', $author); ?>
                        <?php if ( $hero ): ?><img class="teammember-image mb1" src="<?php echo $hero['sizes']['sm_square']; ?>"/><?php endif; ?>
                        <h5 class="teammember-name bold"><?php echo $author->post_title; ?></h5>
                        <p class="teammember-description"><?php echo get_field('title', $author->ID ); ?></p>
                    </a>
                </div>

                <?php  if ($i % 5 == 4 || $i + 1 == count( $authors )): ?>
                    </div>
                <?php endif; ?>

            <?php endforeach; ?>

        </div>
    </section>
<?php endif; ?>
