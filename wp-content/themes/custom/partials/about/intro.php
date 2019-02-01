<section id="what-we-do" class="bg-light pb2" aside-enter>
	<div class="container-fluid">
    	<div class="row">
            <div id="sidebar" class="sidebar col-sm-3 hidden-xs">
                <?php get_template_part('partials/about/aside'); ?>
            </div>

    		<div class="col-sm-offset-2 col-sm-9">
    			<div class="row">
    				<div class="col-xs-offset-1 col-xs-10 centered mb2">
    					<h3 >
    						<?php echo get_field('overview'); ?>
    					</h3>
    				</div>
    			</div>

    			<div class="row mb2">
    				<div class="col-xs-offset-1 col-xs-10">
    					<?php echo get_field('about_govlab'); ?>
    				</div>
    			</div>

                <div class="row">
    				<div class="mb2 col-xs-offset-1 col-xs-10 centered">
                        <a class="uppercase sync" href="/diversity-and-inclusion">Read our statement on diversity and inclusion <span class="pictogram">→</span></a>
                    </div>
                </div>

    		</div>

    	</div>
	</div>
</section>
