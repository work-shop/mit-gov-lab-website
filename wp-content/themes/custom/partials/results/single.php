<?php $file = get_field('document'); ?>

<article id="output-<?php echo $post->post_name; ?>" class="bg-white">
    <section id="project-body" class="bg-light bg-white-xs">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 bg-white pb2 individual-initial-column" style="padding-top:0px;">

                    <?php get_template_part('partials/results/hero'); ?>

                    <div class="row pb4">
                        <div class="col-xs-offset-1 col-xs-10">
                            <div class="wysiwyg">
                                <?php echo get_field('content'); ?>
                            </div>
                        </div>
                    </div>
                    <?php if ( false ) : ?>
                        <?php if ( $file ) : ?>
                            <div class="row">
                                <div class="col-xs-offset-1 col-xs-5 pb4 download-button-wrapper">
                                    <span class="download-button-container">
                                        <a href="<?php echo $file['url']; ?>" class="download-button mb1" target="_blank">Download</a>
                                    </span>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <?php get_template_part('partials/related_work'); ?>

</article>
