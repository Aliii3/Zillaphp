<?php
	get_header();
?>

<input type="checkbox" id="toggle">

<main class="reports_page">

	<div class="container">

		<?php

			$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

			$blogs_args = array(
				'post_type' => 'blogs',
				'posts_per_page' => 6,
				'paged' => $paged
			);

			$blogs = new WP_Query($blogs_args);

			/* Get Reports Category */

			$blogs_categories_args = array(
				'taxonomy' => 'insights_cat',
				'exclude' => array(1),
				'option_all' => 'All Blogs'
			);

			$blogs_categories = get_categories($blogs_categories_args);

			// render filter
			if($blogs_categories):
				echo '
				<div class="row align-items-end categories_container">
					<div class="col col-lg-8">';
				echo'
					</div>

					<!-- filter by Year -->

					<div class="col col-md-3 col-lg-2">
						<div class="input_wrapper">
							<label for="year_filter_blogs">Year</label>
							<select id="year_filter_blogs" name="archive-dropdown">
								<option value="">'.esc_attr(__('All')).'</option>
								'.wp_get_archives(array(
									'type' => 'yearly',
									'post_type'=> 'blogs',
									'echo' => false,
									'format' => 'custom',
								)).'
							</select>
						</div>
					</div>

					<!-- filter by month -->

					<div class="col col-md-3 col-lg-2">
						<div class="input_wrapper">
							<label for="month_filter">Month</label>
							<select id="month_filter_blogs" name="archive-dropdown">
								<option value="">'.esc_attr(__('All')).'</option>';
								for ($m = 1; $m <= 12; $m++) {
									print '<option value="' . $m . '">' . date( 'F', strtotime( "$m/12/10" ) ) . '</option>';
								} echo '
							</select>
						</div>
					</div>
				</div>';
			endif;

			if ($blogs->have_posts()):

				echo '<div class="reports_data">';
					while($blogs->have_posts()): $blogs->the_post();
						get_template_part('template-parts/content', 'report');
					endwhile;
					wp_reset_query();
				echo '</div>';

				$pagination_args = array(
					'current' => max( 1, get_query_var('paged') ),
					'total' =>  $blogs->max_num_pages,
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

</main>

<style>

.wrapper{
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background: #fff;
  border-radius: 5px;
  box-shadow: 0px 10px 15px rgba(0,0,0,0.1);

  z-index: 5;
  background: #fff;
  padding: 30px;
  text-align: center;
  max-width: 1200px;
  width: 100%;
  display: flex;
  align-items: center;
  flex-direction: column;
  top: 50%;
  opacity: 1;
  pointer-events: auto;
  transition: all 0.3s ease;
  position: fixed;
}
#toggle{
  display: none;
}
#toggle:checked ~ .wrapper{
  opacity: 0;
  pointer-events: none;
  top: 40%;
}
.wrapper .cancel-icon{
  position: absolute;
  right: 20px;
  top: 20px;
  color: rgb(142,197,252);
  cursor: pointer;
}
.cancel-icon:hover{
  color: rgb(224,195,252);
}

.cancel-icon:before{
  content: "X";
}

.wrapper .icon{
  height: 110px;
  width: 110px;
  background: linear-gradient(136deg, rgb(224,195,252) 0%, rgb(142,197,252) 100%);
  line-height: 110px;
  border-radius: 50%;
  color: #fff;
  font-size: 55px;
}
.wrapper .content{
  margin: 20px 0;
}
.content header{
  font-size: 30px;
  font-weight: 600;
}
.content p{
  color: #333;
  font-size: 16px;
  font-weight: 400;
  margin-left: -3px;
}
.wrapper form{
  width: 98%;
}

.wrapper {
  margin-top: 5px;
}

.wrapper form .btn{
	top: 40%;
}

.fa-remove:before,.fa-close:before,.fa-times:before{
	content:"X";
	font-size: 35px;
    font-style: normal;
}

.new_report_article img{
	height: 140px;
	width: 240px;
}

</style>

<?php
	get_footer();
?>