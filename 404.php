<?php

get_header();
?>
<main class="not_found_page">
	<div class="container">
		<div class="not_found">
			<p>The Page You Are Looking for might have been moved</p>
			<p class="section_content my-3">We Apologize for any inconvenience. Please Double-check the URL or try the following</p>
			<p class="section_content my-3">Visit our <a href="<?php echo site_url(); ?>" class="btn btn-secondary">Home Page</a> or use the navigation menu to find what you need</p>
			<p><a href="<?php echo site_url('/contact-us'); ?>" class="btn btn-secondary">Contact Us</a> if you're still having a problem</p>
		</div>
	</div>
</main>

<?php
get_footer();
?>