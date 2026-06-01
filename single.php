<?php
	get_header();

	while ( have_posts() ):
		the_post();
		the_title();
		the_content();
		the_post_thumbnail( 'full' );
	endwhile;

	get_footer();
?>