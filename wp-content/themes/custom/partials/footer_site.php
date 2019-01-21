<footer class="bg-dark pt2 pb2">
	<div class="container">
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1">
                <div class="row">
                    <div class="col-xs-5 col-sm-2 pb1">
                        <span id="footer-logo">
                            <a href="/"><img src="<?php echo get_template_directory_uri(); ?>/images/mitgovlab-white.png" alt="logo" /></a>
                        </span>
                    </div>
                </div>
                <div class="row pb2 pt0">
                    <div class="col-sm-12 footer-logo-row">
                    </div>
                </div>
                <div class="row">

                    <div class="col-xs-6 col-sm-3 primary-sections">
                        <ul>
                            <li class="footer-item"><a class="h4 white footer-link bold" href="/about">About</a></li>
                            <li class="footer-item"><a class="h4 white footer-link bold" href="/updates">Updates</a></li>
                            <li class="footer-item"><a class="h4 white footer-link bold" href="/research">Research</a></li>
                            <li class="footer-item"><a class="h4 white footer-link bold" href="/results">Results</a></li>
                        </ul>
                    </div>

                    <div class="col-xs-6 col-sm-3 secondary-sections">
                        <ul>
                            <li class="footer-item"><a class="h5 white footer-link" href="/diversity-and-inclusion">Diversity & Inclusion</a></li>
                            <li class="footer-item"><a class="h5 white footer-link" href="/opportunities">Opportunities</a></li>
                            <li class="footer-item"><a class="h5 white footer-link" href="/newsletter">Newsletter</a></li>
                        </ul>
                    </div>

                    <div class="col-xs-12 col-sm-offset-2 col-sm-4 address-sections pb2">
                        <ul class="address">
                            <li class="footer-item h6 white footer-link bold"><?php echo get_field('institution_name', 'options'); ?></li>
                            <li class="footer-item h6 white footer-link"><?php echo get_field('street_address', 'options'); ?></li>
                            <li class="footer-item h6 white footer-link"><?php echo get_field('building_address', 'options'); ?></li>
                            <li class="footer-item h6 white footer-link"><?php echo get_field('city', 'options'); ?>, <?php echo get_field('state', 'options'); ?> <?php echo get_field('zip', 'options'); ?></li>
                            <li class="footer-item h6 white footer-link"><?php echo get_field('country', 'options'); ?></li>
                        </ul>
                        <div class="social-items">
                            <a target="_blank" class="white h2 pictogram" href="http://twitter.com/<?php echo get_field('twitter', 'option'); ?>">t</a>
                            <a target="_blank" class="white h2 pictogram" href="mailto:<?php echo get_field('email', 'option'); ?>">m</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
	</div>
</footer>
