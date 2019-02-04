<?php global $post; ?>

<?php $people = get_posts(array(
    'post_type' => 'people',
    'posts_per_page' => -1
));
?>

<?php $team = array_filter($people, function( $person ) { $rel = get_field('relationship_to_govlab', $person->ID); return $rel == 'team-member' ||$rel == 'Team Member'; }); ?>
<?php $affiliates = array_filter($people, function( $person ) { $rel = get_field('relationship_to_govlab', $person->ID); return $rel == 'affiliate' ||$rel == 'Affiliate'; }) ?>

<?php if ( count( $team ) > 0 ) : ?>
    <section id="people" class="bg-white padded" >
    	<div class="container-fluid">
    	    <div class="row">

        		<div class="col-sm-offset-2 col-sm-9">
        			<div class="row">
        				<div class="col-xs-offset-1 col-xs-10 col-lg-6 col-lg-offset-3 col-md-offset-2 col-md-8 centered">
        					<h3 class="mb2">
        						<?php echo get_field('team_members_intro_text'); ?>
        					</h3>
        				</div>
        			</div>

                    <div class="row">
                        <?php foreach ( $team as $i => $post ): ?>
                            <?php setup_postdata( $post ); ?>
                            <?php get_template_part('partials/people/card'); ?>
                            <?php wp_reset_postdata(); ?>
                        <?php endforeach; ?>
                    </div>

                    <?php // NOTE: Prevent rendering of affiliates for now.
                          // We may revisit this in the future.
                    ?>
                    <?php if ( false && count($affiliates) > 0 ): ?>
                        <div class="row mb4">
                            <div class="col-sm-offset-1 col-xs-11 mb2" >
                                <div class="projects-rule"></div>
                                <h4 class="">GOV/LAB Affiliates</h4>
                            </div>

                            <?php foreach ( $affiliates as $person ): ?>
                                <div class="col-xs-6 col-sm-3 col-sm-offset-1">
                                    <?php if( $site = get_field('website', $person->ID)) : ?><a href="<?php echo $website; ?>"><?php endif; ?>
                                        <h5 class="bold"><?php echo $person->post_title; ?></h5>
                                    <?php if( $role = get_field('title', $person->ID)) : ?><h6 class="teammember-description mb0"><?php echo $role; ?></h6><?php endif; ?>
                                    <?php if ( $site ) : ?></a><?php endif; ?>
                                </div>
                            <?php endforeach; ?>

                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
</section>
<?php endif; ?>
