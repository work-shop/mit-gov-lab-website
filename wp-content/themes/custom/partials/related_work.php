<?php $related_work = Helpers::get_related_work( get_the_ID() ); ?>
<?php if ( count( $related_work ) > 0 ) : ?>
    <section id="project-related" class="bg-light">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-sm-12 bg-white pb4">
                        <div class="row">
                            <div class="col-xs-offset-1 col-xs-10 mb2">
                                <div class="projects-rule"></div>
                                <h4>Related Work</h4>
                            </div>
                        </div>

                        <div class="row">
                            <ul class="mb2">
                                <?php global $post; ?>
                                <?php foreach ($related_work as $post) : ?>


                                    <?php setup_postdata( $post ); ?>
                                    <?php get_template_part('partials/' . $post->post_type . '/related_card'); ?>
                                    <?php wp_reset_postdata(); ?>

                                <?php endforeach;  ?>

                            </ul>
                        </div>

                    </div>

                </div>
            </div>
        </section>
<?php endif; ?>
