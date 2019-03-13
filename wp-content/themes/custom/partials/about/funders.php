<?php $funders = get_field('funders'); ?>
<?php if ( count( $funders ) > 0 ) : ?>

    <section id="funders" class="padded">
    	<div class="container-fluid">
    	<div class="row">
    		<div class="col-sm-offset-2 col-sm-9">

    			<div class="row">
    				<div class="col-xs-offset-1 col-xs-10 col-lg-6 col-lg-offset-3 col-md-offset-2 col-md-8 centered">
    					<h3 class="mb2">
    					    <?php echo get_field('funders_intro_text'); ?>
    					</h3>
    				</div>
    			</div>


    			<?php foreach( $funders as $funder ): ?>

    				<div class="funder max-height-bounded col-xs-offset-1 col-xs-4 col-sm-2 col-sm-offset-1 mb1">
    					<img class="collaborator-logo mb1" src="<?php echo $funder['funder_logo']['sizes']['md']; ?>" />
    				</div>

    			<?php endforeach; ?>

    		</div>
    	</div>
	</div>
</section>

<?php endif; ?>
