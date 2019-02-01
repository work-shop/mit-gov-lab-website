<?php $collaborators = get_field('collaborators'); ?>
<?php if ( count( $collaborators ) > 0 ) : ?>

<section id="collaborators" class="bg-light padded">
	<div class="container-fluid">
    	<div class="row">
    		<div class="col-sm-offset-2 col-sm-9">

    			<div class="row">
    				<div class="col-xs-offset-1 col-xs-10 col-lg-6 col-lg-offset-3 col-md-offset-2 col-md-8 centered">
    					<h3 class="mb2">
    						<?php echo get_field('collaborators_intro_text') ?>
    					</h3>
    				</div>
    			</div>


    			<?php foreach( $collaborators as $collaborator ): ?>

    				<div class="collaborator max-height-bounded bg-light p1 col-xs-offset-1 col-xs-4 col-sm-2 col-sm-offset-1 mb2">
    					<?php if ($l = $collaborator['collaborator_link']) : ?><a target="_blank" class="link" href="<?php echo $l; ?>"><?php endif; ?>
    					    <img class="collaborator-logo mb1" src="<?php echo $collaborator['collaborator_logo']['sizes']['md']; ?>" />
    					<?php if ( $l ) : ?></a><?php endif; ?>
    				</div>

    			<?php endforeach; ?>

    		</div>
    	</div>
	</div>
</section>

<?php endif; ?>
