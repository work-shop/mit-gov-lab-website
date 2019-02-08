<?php $image = get_field('bio_image'); ?>
<article id="person-<?php echo $post->post_name; ?>" class="bg-white">
    <section id="person-body" class="bg-white pt4 pb4">
        <div class="container-fluid">
            <div class="row bg-white">
                <div class="col-sm-offset-1 col-sm-4 person-image mb2">
                    <img class="bio-image" src="<?php echo $image['sizes']['md_square']; ?>">
                </div>
                <div class="col-sm-offset-1 col-sm-5 person-metadata">
                 <h2><?php echo $post->post_title; ?></h2>
                 <h4 class="italic"><?php echo get_field('title'); ?></h4>
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
                <p class="text">
                    <?php echo get_field('biography'); ?>
                </p>
            </div>
        </div>
    </div>
</section>

<?php get_template_part('partials/related_work'); ?>

</article>
