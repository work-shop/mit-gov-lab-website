<section id="news" class="bg-white pb2" aside-enter>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-offset-1 col-xs-10 bg-white">
                <div id="news-list" class="row">

                    <?php $updates = get_posts(array(
                        'post_type' => 'updates',
                        'posts_per_page' => -1,
                        'meta_key' => 'publication_date',
                        'orderby' => 'meta_value',
                        'order' => 'DESC'
                    )); ?>


                    <?php global $post; ?>
                    <?php foreach ($updates as $post): ?>

                        <?php setup_postdata( $post ); ?>
                        <?php get_template_part('partials/updates/row'); ?>

                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>
</section>
