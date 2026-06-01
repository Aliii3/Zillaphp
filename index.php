<?php
get_header();
?>

<h1 style="position:absolute;left:-9999px;">
Zilla Capital | Private Equity & Investment Banking
</h1>

<?php
while ( have_posts() ) :
	the_post();
	the_title();
	the_content();
	the_post_thumbnail( 'full' );
endwhile;

get_footer();
?>
