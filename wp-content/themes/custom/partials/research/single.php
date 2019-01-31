<article id="project-<?php echo $post->post_name; ?>" class="bg-white">

    <section id="project-body" class="bg-light bg-white-xs">
        <div class="container-fluid">

            <div class="row">

                <div class="col-sm-12 bg-white individual-initial-column">

                    <?php get_template_part('partials/research/hero'); ?>

                    <div class="row  pb4">
                        <div class="col-xs-offset-1 col-xs-10">
                            <div class="wysiwyg">
                                <?php echo get_field('content'); ?>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <?php get_template_part('partials/research/authors'); ?>

    <?php get_template_part('partials/related_work'); ?>

    <?php get_template_part('partials/research/partners'); ?>

</article>
