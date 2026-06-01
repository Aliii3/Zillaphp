<?php
get_header();
	while ( have_posts() ): the_post();
?>

<main class="member_page_data">
	<div class="container">
		<div class="row">
			<div class="col-lg-4">
				<div class="member_data_wrapper">
					<?php the_post_thumbnail(); ?>
					<h2><?php the_title(); ?></h2>
					<!-- team member position -->
					<?php if(get_field('position')): ?>
						<h3><?php echo get_field('position');?></h3>
					<?php endif; ?>
					<!-- team member linkedin  -->
					<?php
						if(get_field('linkedin_url')):
					?>
						<a href="<?php echo get_field('linkedin_url'); ?>" title="<?php the_title(); ?>" target="_blank">
							<img src="<?php echo THEME_DIR_URI . '/dist/images/linkedin-icon.svg'  ?>" alt="Linkedin Icon">
						</a>
					<?php endif; ?>
				</div>
			</div>

			<?php
				if(get_field('experience_qualifications')):
			?>

			<div class="col-lg-8">
				<div class="member_content">
					<!-- <p class="member_section_title">Experience & Qualifications</p> -->
					<?php echo get_field('experience_qualifications') ?>
				</div>
			</div>

			<?php
				endif;
			?>
		</div>
	</div>
</main>
<?php
	endwhile;
get_footer();
?>