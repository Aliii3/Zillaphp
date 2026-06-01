<?php
get_header();
?>

<?php
// get associate children
	$childrens = get_posts(
		array(
			'post_type'=>'associate',
			'post_parent'=>get_the_ID()
		)
	);

?>
<main class="associate_page_data">
	<div class="container">
		<div class="row">
			<div class="col-lg-4">
				<div class="associate_data_wrapper">
					<div class="associate_item_img">
						<?php the_post_thumbnail(); ?>
					</div>
					<?php if($childrens): ?>
						<span class="associate_type"><?php echo get_field('type') ?></span>
					<?php endif; ?>

					<h2><?php the_title(); ?></h2>
					<?php if(get_field('job_position')): ?>
						<span class="associate_type"><?php echo get_field('job_position') ?></span>
					<?php endif; ?>

					<?php if(get_field('countries')): ?>
					<div class="associate_countries">
						<img src="<?php echo THEME_DIR_URI . '/dist/images/filled-pin.svg' ?>" alt="Map Pin Marker">
						<p><?php echo get_field('countries')?></p>
					</div>
					<?php endif; ?>

					<?php if(get_field('linkedin') || get_field('website') ): ?>
					<div class="associate_links">
						<?php
							if(get_field('linkedin')):?>
								<a href="<?php echo get_field('linkedin'); ?>" title="<?php the_title() ?>" target="_blank" rel="noopener">
									<img src="<?php echo THEME_DIR_URI . '/dist/images/linkedin-icon.svg'  ?>" alt="Linkedin icon">
								</a> <?php
							endif;

							if(get_field('website')):?>
								<a href="<?php echo get_field('website'); ?>" title="<?php the_title() ?>" target="_blank" rel="noopener">
									<img src="<?php echo THEME_DIR_URI . '/dist/images/icon-global.svg'  ?>" alt="website icon">
								</a> <?php
							endif;
						?>
					</div>
					<?php endif; ?>
				</div>
			</div>

			<div class="col-lg-8">
				<?php
					// brief
					if(get_field('brief') || get_the_content()): ?>
						<div class="associate_content">
							<p class="section_subtitle">About</p>
							<p><?php
								if(get_field('brief')):
									echo get_field('brief');
								else:
									the_content();
								endif;?>
							</p>
						</div> <?php
					endif;

					// experience
					if(get_field('experience')): ?>
						<div class="associate_content">
							<p class="section_subtitle">Experience</p>
							<?php echo get_field('experience'); ?>
						</div><?php
					endif;

					// qualifications
					if(get_field('qualifications')): ?>
						<div class="associate_content">
							<p class="section_subtitle">Qualifications</p>
							<?php echo get_field('qualifications') ;?>
						</div><?php
					endif;

					// education
					if(get_field('education')): ?>
						<div class="associate_content">
							<p class="section_subtitle">Education</p>
							<?php echo get_field('education'); ?>
						</div> <?php
					endif;

					if($childrens): ?>
						<p class="section_subtitle mt-4">Meet <?php the_title(); ?> Associates</p> <?php

						foreach ( $childrens as $post ) :
							setup_postdata( $post ); ?>
							<div class="row child_associate">
								<div class="col-lg-3 img_wrapper">
									<img src="<?php echo get_the_post_thumbnail_url($post->ID) ?>" alt="<?php the_title() ?>"/>
								</div>

								<div class="col-lg-9">
									<!-- name -->
									<h4 class="child_title">
										<a href="<?php echo get_permalink($post->ID) ?>"><?php echo $post->post_title?></a>
									</h4> <?php
									// job title
									if(get_field('job_position',$post->ID)): ?>
										<span class="job_title"><?php echo get_field('job_position',$post->ID) ?></span> <?php
									endif; ?>

									<div class="associate_links">
										<?php
											if(get_field('linkedin',$post->ID)) : ?>
												<a href="<?php echo get_field('linkedin',$post->ID) ?>" target="_blank">
													<img src="<?php echo THEME_DIR_URI . '/dist/images/linkedin-icon.svg'  ?>" alt="linkedin icon">
												</a> <?php
											endif;
											if(get_field('website',$post->ID)) : ?>
												<a href="<?php echo get_field('website',$post->ID) ?>" target="_blank">
													<img src="<?php echo THEME_DIR_URI . '/dist/images/icon-global.svg'  ?>" alt="website icon">
												</a> <?php
											endif;
										?>
									</div>
								</div>
								<div class="col-12">
								<?php

									// display brief if exists or the content
									if(get_field('brief',$post->ID)): ?>
										<div class="brief">
											<?php echo strip_tags(substr(get_field('brief',$post->ID), 0, 200))?>
										</div> <?php
									else: ?>
										<div class="brief">
											<?php echo strip_tags(substr(get_the_content(), 0, 200))?>
										</div> <?php
									endif; ?>

									<!-- view more -->

									<a href="<?php echo get_permalink(); ?>" class="btn btn-secondary btn-icon-arrow_right-colored">View More</a>
								</div>
							</div>
							<?php
						endforeach;
					endif;
				?>
			</div>
		</div>
	</div>
</main>
<?php
get_footer();
?>