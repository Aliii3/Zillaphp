<?php
	get_header();
?>

<main class="reports_page">

	<div class="container">

		<?php

			$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

			$insights_args = array(
				'post_type' => 'insights',
				'posts_per_page' => 6,
				'paged' => $paged
			);

			$insights = new WP_Query($insights_args);

			/* Get Reports Category */

			$insights_categories_args = array(
				'taxonomy' => 'insights_cat',
				'exclude' => array(1),
				'option_all' => 'All Insights'
			);

			$insights_categories = get_categories($insights_categories_args);

			// render filter
			if($insights_categories):
				echo '
				<div class="row align-items-end categories_container">
					<div class="col col-lg-8">
						<ul class="categories_tabs_filter">';
							echo '<li class="cat-list_item_insight active" data-slug=""><a href="javascript:void(0)">All Insights</a></li>';
							foreach($insights_categories as $insight_category):
								echo '
									<li class="cat-list_item_insight" data-slug="'.$insight_category->slug.'">
										<a href="javascript:void(0)">
											'.$insight_category->name.'
										</a>
									</li>
								';
							endforeach; echo'
						</ul>
					</div>

					<!-- filter by Year -->

					<div class="col col-md-3 col-lg-2">
						<div class="input_wrapper">
							<label for="year_filter_insights">Year</label>
							<select id="year_filter_insights" name="archive-dropdown">
								<option value="">'.esc_attr(__('All')).'</option>
								'.wp_get_archives(array(
									'type' => 'yearly',
									// 'format' => 'html',
									'post_type'=> 'insights',
									'echo' => false,
									'format' => 'custom',
									// 'value' => $text
								)).'
							</select>
						</div>
					</div>

					<!-- filter by month -->

					<div class="col col-md-3 col-lg-2">
						<div class="input_wrapper">
							<label for="month_filter">Month</label>
							<select id="month_filter_insights" name="archive-dropdown">
								<option value="">'.esc_attr(__('All')).'</option>';
								for ($m = 1; $m <= 12; $m++) {
									print '<option value="' . $m . '">' . date( 'F', strtotime( "$m/12/10" ) ) . '</option>';
								} echo '
							</select>
						</div>
					</div>
				</div>';
			endif;

			if ($insights->have_posts()):

				echo '<div class="reports_data">';
					while($insights->have_posts()): $insights->the_post();
						get_template_part('template-parts/content', 'report');
					endwhile;
					wp_reset_query();
				echo '</div>';

				$pagination_args = array(
					'current' => max( 1, get_query_var('paged') ),
					'total' =>  $insights->max_num_pages,
					'prev_next'       => true,
					'next_text' => '<i class="fa fa-angle-right"></i>',
					'prev_text' => '<i class="fa fa-angle-left"></i>',
					'type'      => 'array',
					'end_size'  => 1,
					'mid_size'  => 3
				);

				$pages = paginate_links( $pagination_args );

				if ( is_array( $pages ) ) {
					$paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
					?>
					<nav aria-label="Page navigation" class="custom_pagination">
						<div class="container">
							<ul class="pagination">
								<?php
									foreach ( $pages as $page ) {
										echo "<li class='list-item'>$page</li>";
									}
								?>
							</ul>
						</div>
					</nav>
					<?php
				}
			endif;
		?>

	</div>

	<section class="subscription_form">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8">
					<h3 class="section_subtitle">Subscribe to Reports</h3>
					<p class="section_content">Subscribe to Download our daily roundup of economics and business </p>
				</div>
			</div>
			<?php echo do_shortcode('[mc4wp_form id="6273"]') ?>
		</div>
	</section>

</main>

<?php
	get_footer();
?>