<?php global $post; ?>

<section id="home-content-updates" class="home-content-updates bg-white padded">
    <div class="container block">
        <div class="col-sm-offset-1 col-sm-10">
            <div class="row">

                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-lg-4 home-content-guidepost mb1">
                        <div class="">
                            <h3 class="bold mb1"><?php echo get_field('updates_intro_text'); ?></h3>
                            <a class="uppercase sync" href="/updates">Follow our updates</a>
                        </div>
                    </div>

                    <?php $updates = get_posts(array(
                        'post_type'=>'updates',
                        'posts_per_page'=>5,
                        'meta_key' => 'publication_date',
                        'orderby' => 'meta_value',
                        'order' => 'DESC'
                    )); ?>

                    <?php foreach( $updates as $post ): ?>

                        <?php setup_postdata( $post ); ?>
                        <?php get_template_part('partials/updates/card'); ?>
                        <?php wp_reset_postdata(); ?>

                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>
</section>


<section id="home-content-research" class="bg-white padded">
    <div class="container block">
        <div class="row">
            <div class="col-sm-offset-1 col-sm-10">
                <div class="row">
                    <div class="home-content-guidepost col-sm-12 col-lg-4 mb2">
                        <div class="">
                            <h3 class="bold mb1 "><?php echo get_field('research_intro_text'); ?></h3>
                            <a class="uppercase sync" href="/research">Explore our research</a>
                        </div>
                    </div>

                    <?php $research = get_posts(array('post_type'=>'research', 'posts_per_page'=>2)); ?>

                    <?php foreach ( $research as $post ): ?>

                        <?php setup_postdata( $post ); ?>
                        <?php get_template_part('partials/research/card'); ?>
                        <?php wp_reset_postdata(); ?>

                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>
</section>


<section id="home-content-results" class="bg-white padded">
    <div class="container block">
        <div class="row">
            <div class="col-sm-offset-1 col-sm-10">
                <div class="row">
                    <div class="home-content-guidepost col-sm-12 col-lg-4 mb2">
                        <div class="">
                            <h3 class="bold mb1"><?php echo get_field('results_intro_text'); ?></h3>
                            <a class="uppercase sync" href="/results">Read our Results</a>
                        </div>
                    </div>

                    <?php $results = get_posts(array('post_type'=>'results', 'posts_per_page'=>2)); ?>

                    <?php foreach ( $results as $post ): ?>

                        <?php setup_postdata( $post ); ?>
                        <?php get_template_part('partials/results/card'); ?>
                        <?php wp_reset_postdata(); ?>

                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
