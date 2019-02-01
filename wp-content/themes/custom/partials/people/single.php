<?php $image = get_field('bio_image'); ?>
<article id="person-<?php echo $post->post_name; ?>" class="bg-white">
    <section id="person-body" class="bg-light bg-white-xs">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 bg-white">
                    <div class="row pb1 pt1">
                        <div class="col-sm-offset-1 col-sm-11">
                            <h2><?php echo $post->post_title; ?></h2>
                            <h4 class="italic"><?php echo get_field('title'); ?></h4>
                        </div>
                    </div>

                <div class="row pt2 pb4">
                    <div class="projects-rule"></div>
                </div>

                <div class="row bg-white">
                    <div class="col-sm-offset-1 col-sm-4 pb2 person-image">
                        <div class="row pb2">
                            <div class="col-xs-12">
                                <img class="bio-image" src="<?php echo $image['sizes']['large']; ?>">
                            </div>
                        </div>
                        <?php if ( ($email = get_field('email') )): ?>
                            <div class="row">
                                <div class="col-xs-11">
                                    <p class="h6">email <span class="lowercase bold ml2"><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></span></p>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if ( ($website = get_field('website') )): ?>
                            <div class="row">
                                <div class="col-xs-11">
                                    <p class="h6">website <span class="lowercase bold ml2"><a href="<?php echo $website; ?>"><?php echo $website; ?></a></span></p>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if ( $twitter = get_field('twitter') ): ?>
                            <div class="row">
                                <div class="col-xs-11">
                                    <p class="h6">twitter <span class="lowercase bold ml2"><a href="http://twitter.com/<?php echo $twitter; ?>">@<?php echo $twitter; ?></a></span></p>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="col-sm-offset-1 col-sm-5 pb2 person-metadata">
                        <div class="row">
                            <div class="col-xs-12">
                                <p class="text">
                                    <?php echo get_field('biography'); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php get_template_part('partials/related_work'); ?>



</article>
