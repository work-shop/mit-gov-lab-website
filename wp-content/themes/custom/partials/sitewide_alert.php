<?php if ( get_field('show_sitewide_alert', 'option') ): ?>
    <section id="alert-banner" class="">
        <div class="container-fluid alert-wrapper">
            <div class="row">
                <div class="col-xs-12 centered">
                    <?php if ( $link = get_field('sitewide_alert_link', 'option') ): ?>
                        <a href="<?php echo $link['url']; ?>" class="alert-text"><?php echo get_field('sitewide_alert_message', 'option'); ?></a>
                    <?php else: ?>
                        <p class="alert-text"><?php echo get_field('sitewide_alert_message', 'option'); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
