<?php
/**
 * Content Report – Newsletter Item
 */

$image_id  = get_post_thumbnail_id();
$image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);

// Category slug
$cat_slug = '';
$cats = get_the_terms(get_the_ID(), 'insights_cat');
if ($cats && !is_wp_error($cats)) {
	$cat_slug = $cats[0]->slug;
}
?>

<article
	class="row report_article"
	data-year="<?php echo get_the_date('Y'); ?>"
	data-month="<?php echo get_the_date('n'); ?>"
	data-cat="<?php echo esc_attr($cat_slug); ?>"
>

	<div class="col-md-5">
		<?php if (has_post_thumbnail()) : ?>
			<img 
				src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>"
				alt="<?php echo esc_attr($image_alt); ?>"
			/>
		<?php endif; ?>
	</div>

	<div class="col-md-6">
		<div class="content_wrapper">
			<div class="main_data">
				<time><?php echo get_the_date('d M Y'); ?></time>
				<h3><?php the_title(); ?></h3>
			</div>

			<a
				class="btn btn-secondary btn-icon-arrow_right-colored"
				href="<?php the_permalink(); ?>"
			>
				Read More
			</a>
		</div>
	</div>

</article>
