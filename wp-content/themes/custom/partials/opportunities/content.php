<section id="opportunities" class="bg-light block">
    <section id="jobs" class="{{ classes }} padded">
        <div class="container-fluid">
            <div class="row">
                <?php $opportunities = get_field('opportunities'); ?>
                <?php $opportunities = ( $opportunities ) ? $opportunities : array(); ?>
                <?php $active = array_reduce( $opportunities, function( $a, $b ) { return $a + ($b['active_opportunity'] ? 1 : 0 ); }, 0 ); ?>

                <?php if ( $active > 0 ): ?>
                    <?php foreach ($opportunities as $opp ) : ?>
                        <div class="row mb3">

                            <div class="col-xs-offset-1 col-xs-10 col-sm-offset-3 col-sm-6 centered">
                                <h5 class="bold mb1"><?php echo $opp['opportunity_name']; ?></h5>
                                <p class="mb2"><?php echo $opp['opportunity_description']; ?></p>
                                <h5 class="small uppercase bold brand mt2"><?php echo $opp['opportunity_contact_info']; ?></h5>
                            </div>

                        </div>
                    <?php endforeach; ?>

                <?php else: ?>
                    <div class="col-xs-offset-1 col-xs-10 col-sm-offset-2 col-sm-8 pt4 pb4">
                        <div class="wysiwyg centered"><?php echo get_field('no_current_opportunities_text'); ?></div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
</section>
