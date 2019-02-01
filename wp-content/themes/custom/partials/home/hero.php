<?php $image = get_field('hero_image'); ?>

<section id="home-introduction" class="bg-light block">
    <div class="block-background" style="background: url('<?php echo $image['sizes']['page_hero']; ?>'); background-size:cover; background-position:center center;"> </div>
    <div class="container half-strict block">
        <div class="row vertical-center">
            <div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 centered white"><h2 class=""><?php echo get_field('hero_text'); ?></h2></div>
        </div>
    </div>
</section>

<section id="home-tagline" class="bg-light pt2">
    <div class="container block">
        <div class="row">
            <div class="col-sm-offset-2 col-sm-8 centered">
                <h3 class="tagline mb1"><?php echo get_field('page_introduction_text'); ?></h3>
                <a class="uppercase sync" href="/about">Read more about us</a>
            </div>
        </div>
    </div>
</section>
