<header id="header" class="bg-white">

	<div class="container">

		<div class="row">

			<div id="logo" class="col-xs-4 col-sm-4">

				<a class="link" href="/">
					<img src="<?php echo get_template_directory_uri(); ?>/images/mitgovlab.svg" alt="logo"/>
				</a>

			</div>

			<nav id="nav" class="col-xs-8 col-sm-8">
				<ul class="row">

                    <li class="centered col-xs-1 col-xs-offset-6 col-sm-offset-1 col-sm-1 menu-item">
                        <a class="sync m0 bold uppercase menu-trigger h4 hidden-sm hidden-md hidden-lg" href="#">Menu</a>
                    </li>

					<li class="centered hidden-xs col-xs-3 col-sm-2"><a class="sync uppercase" href="/about">About</a></li>

        			<li class="centered hidden-xs col-xs-3 col-sm-2"><a class="sync uppercase" href="/updates">Updates</a></li>

                    <li class="centered hidden-xs col-xs-3 col-sm-2"><a class="sync uppercase" href="/research">Research</a></li>

                    <li class="centered hidden-xs col-xs-3 col-sm-2"><a class="sync uppercase" href="/results">Results</a></li>

                    <li class="centered col-xs-1 col-xs-offset-2 col-sm-offset-0 col-sm-1 menu-item">
                        <a id="search-trigger-button" class="h3 search-button search-trigger pictogram dark" href="#">s</a>
                    </li>

                    <li class="centered col-xs-1 col-xs-offset-2 col-sm-offset-0 col-sm-1 menu-item hidden-xs">
                        <a id="twitter-trigger-button" href="http://twitter.com/<?php echo get_field('twitter', 'options'); ?>" class="h4 search-button pictogram dark" target="_blank" >t</a>
                    </li>
				</ul>
			</nav>

		</div>

	</div>
</header>
