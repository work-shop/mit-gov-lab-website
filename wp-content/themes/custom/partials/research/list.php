<section id="projects" class="bg-white pb2" aside-enter>
    <div class="container-fluid">

        <div class="row mb2">
            <div class="col-sm-offset-1 col-sm-10">
                <?php get_template_part('partials/research/filters' ); ?>
            </div>
        </div>

        <div class="row mb4">

            <div class="col-sm-offset-1 col-sm-10">
                <div id="ongoing-projects-list" class="row">
                    <?php $taxonomy_query = array(
                        'post_type' => 'research',
                        'posts_per_page' => -1,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'research-status',
                                'terms' => 'ongoing',
                                'field' => 'slug',
                                'include_childern' => false,
                                'operator' => 'IN'
                            )
                        )
                    ); ?>
                    <?php global $post; ?>
                    <?php $ongoing_research = get_posts( $taxonomy_query ); ?>
                    <?php foreach ( $ongoing_research as $post ): ?>

                        <?php setup_postdata( $post ); ?>
                        <?php get_template_part( 'partials/research/card' ); ?>

                    <?php endforeach; ?>
                </div>
            </div>

        </div>

        <div class="row">

            <div class="mb2 col-sm-10 col-sm-offset-1" >
                <div class="projects-rule"></div>
                <h4 class="">Past Research</h4>
            </div>

            <div class="col-sm-offset-1 col-sm-10">
                <ul id="completed-projects-list" class="row">
                    <?php $taxonomy_query = array(
                        'post_type' => 'research',
                        'posts_per_page' => -1,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'research-status',
                                'terms' => 'past',
                                'field' => 'slug',
                                'include_children' => false,
                                'operator' => 'IN'
                            )
                        )
                    ); ?>
                    <?php global $post; ?>
                    <?php $past_research = get_posts( $taxonomy_query ); ?>
                    <?php foreach ( $past_research as $post ): ?>

                        <?php setup_postdata( $post ); ?>
                        <?php get_template_part( 'partials/research/card' ); ?>

                    <?php endforeach; ?>
                </ul>
            </div>

        </div>
    </div>
</section>
