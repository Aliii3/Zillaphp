<?php
	get_header();
?>

<main class="reports_page">

	<div class="container">

		<?php

			$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

			$reports_args = array(
				'post_type' => 'reports',
				'posts_per_page' => 6,
				'paged' => $paged,
			);

			$reports = new WP_Query($reports_args);

			/* Get Reports Category */

			$reports_categories_args = array(
				'taxonomy' => 'reports_cat',
				'exclude' => array(1),
				'option_all' => 'All Reports'
			);

			$reports_categories = get_categories($reports_categories_args);

			// render filter
			if($reports_categories):
				echo '
				<div class="row align-items-end categories_container">
					<div class="col col-lg-8">
						<ul class="categories_tabs_filter">';
							echo '<li class="cat-list_item active" data-slug=""><a href="javascript:void(0)">All Reports</a></li>';
							foreach($reports_categories as $report_category):
								echo '
									<li class="cat-list_item" data-slug="'.$report_category->slug.'">
										<a href="javascript:void(0)">
											'.$report_category->name.'
										</a>
									</li>
								';
							endforeach; echo'
						</ul>
					</div>

					<!-- filter by Year -->

					<div class="col col-md-3 col-lg-2">
						<div class="input_wrapper">
							<label for=""month_filter>Year</label>
							<select id="year_filter" name="archive-dropdown">
								<option value="">'.esc_attr(__('All')).'</option>
								'.wp_get_archives(array(
									'type' => 'yearly',
									// 'format' => 'html',
									'post_type'=> 'reports',
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
							<select id="month_filter" name="archive-dropdown">
								<option value="">'.esc_attr(__('All')).'</option>';
								for ($m = 1; $m <= 12; $m++) {
									print '<option value="' . $m . '">' . date( 'F', strtotime( "$m/12/10" ) ) . '</option>';
								} echo '
							</select>
						</div>
					</div>
				</div>';
			endif;


			if ($reports->have_posts()):
				echo '<div class="reports_data">';
				while($reports->have_posts()): $reports->the_post();
					get_template_part('template-parts/content', 'report');
				endwhile;
				wp_reset_query();
				echo '</div>';


				$pagination_args = array(
					'current' => max( 1, get_query_var('paged') ),
					'total' =>  $reports->max_num_pages,
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
				<div class="col-lg-6">
					<h3 class="section_subtitle">Subscribe to Reports</h3>
					<p class="section_content">Subscribe to Download our daily roundup of economics and business </p>
				</div>
			</div>
			<?php echo do_shortcode('[mc4wp_form id="6274"]') ?>
		</div>
	</section>

</main>

<?php
	get_footer();
?>