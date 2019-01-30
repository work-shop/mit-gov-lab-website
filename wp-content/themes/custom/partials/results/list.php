<section id="output" class="bg-white pb6" aside-enter>
    <div class="container-fluid">

        <div class="row mb2">
            <div class="col-sm-offset-1 col-sm-10">

                <?php get_template_part('partials/results/filters'); ?>

            </div>
        </div>

        <div class="row">

            <div class="col-sm-offset-1 col-sm-10">
                <div id="output-list" class="row">

                    <?php global $post; ?>
                    <?php $results = get_posts(array('post_type'=>'results', 'posts_per_page'=>-1)); ?>
                    <?php foreach ($results as $post): ?>

                        <?php setup_postdata( $post );  ?>
                        <?php get_template_part('partials/results/card'); ?>

                    <?php endforeach; ?>

                </div>
            </div>

        </div>

    </div>
</section>
