
<article class="news bg-light">

    <section id="news-story bg-light">
        <div class="container-fluid">
            <div class="row">

                <div class="col-sm-12 bg-white individual-initial-column">

                    <?php get_template_part('partials/updates/hero' ); ?>

                    <div class="row pb4">
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

    <?php get_template_part('partials/related_work'); ?>
