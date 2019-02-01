<section id="introduction" class="bg-light block">
    <div class="container block">

        <?php $hero = get_field('hero_image'); ?>

        <div id="header-image" class="header-box row">
        <div class="block-background header-height" style="background: url(<?php echo $hero['sizes']['page_hero']; ?>); background-size:cover; background-position:center center;"> </div>

        <div class="relative header-height">

            <div class="header-overlay-dark"></div>

            <div class="col-xs-12 vertical-center centered">
                <h1 class="mt0 white"><?php echo get_field('hero_text'); ?></h1>
            </div>

            <?php if ( !empty( $hero['caption'] ) ): ?>
                <div class="relative-bottom">
                    <p class="mt0 white caption"><span><?php echo $hero['caption']; ?></span></p>
                </div>
            <?php endif; ?>

        </div>

        </div>

        <div class="row"><div class="projects-rule"></div></div>

        <?php if (get_field('show_page_introduction_section')): ?>

            <div class="row bg-white pt2">

                <div class="col-xs-offset-1 col-xs-10 centered">
                    <h4 class="mt2">
                        <?php echo get_field('page_introduction_text'); ?>
                    </h4>
                </div>

            </div>
            <div class="row bg-white">

                <div class="col-xs-offset-1 col-xs-10 col-md-6 col-md-offset-3 centered">
                <a class="sync link" href="#project-list"><p class="h1 mt0"><span class="bold brand pictogram">ﬁ</span></p></a>
                </div>

            </div>

        <?php endif; ?>
    </div>
</section>
