<?php
	get_header();
	while ( have_posts() ):
		the_post();
		the_content(); ?>

		<main>
			<div class="container">
				<?php
					echo do_shortcode('[jobpost posts="8"]');
				?>
			</div>

			<section class="more_jobs">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-6">
							<p>Can’t find what you’re looking for? We’re always on the lookout for new talent, so feel free to get in touch with our recruitment team at</p>
							<a href="mailto: hr@zillacapital.com">Hr@zillacapital.com</a>
						</div>
					</div>
				</div>
			</section>
		</main>

		<?php
	endwhile;
	get_footer();
?>