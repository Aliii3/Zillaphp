<?php

/**
 *
 * custom filter file for reports and insights
 */

function filter_reports() {
	$category = $_POST['category'];
	$year = $_POST['year'];
	$month = $_POST['month'];

	$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

	$reports_ajax_args = array(
		'post_type' => 'reports',
		'posts_per_page' => 6,
		'paged' => $paged,
	);

	if(!empty($category)){
		$reports_ajax_args['tax_query'] = array(
			array(
				'taxonomy' => 'reports_cat',
				'field' => 'slug',
				'terms' => $category,
			)
		);
	}

	if(isset($month) || isset($year)){
		$reports_ajax_args['date_query'] = array(
			array(
				'year' => $year,
				'monthnum' => $month,
			),
		);
	}

	$ajax_posts = new WP_Query($reports_ajax_args);

	$pagination_args = array(
		'current' => max( 1, get_query_var('paged') ),
		'total' =>  $ajax_posts->max_num_pages,
		'prev_next'       => true,
		'next_text' => '<i class="fa fa-angle-right"></i>',
		'prev_text' => '<i class="fa fa-angle-left"></i>',
		'type'      => 'array',
		'end_size'  => 1,
		'mid_size'  => 3
	);

	$pages = paginate_links( $pagination_args );

	$pagination_data = '';
	if ( is_array( $pages ) ) {
		$paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');

		$pagination_data .= '
			<ul class="pagination ajax_pagination_reports">';
				foreach ( $pages as $page ) {
					$pagination_data .= '<li class="list-item">'.$page.'</li>';
				} $pagination_data .='
			</ul>
		';
	}

	$result = '';
	if($ajax_posts->have_posts()) {
		while($ajax_posts->have_posts()) : $ajax_posts->the_post();
			$result .= '
				<article class="row report_article">
					<div class="col-md-5">
						<img src="'.get_the_post_thumbnail_url().'"  />
					</div>
					<div class="col-md-6">
						<div class="content_wrapper">
							<div class="main_data">
								<time>'. get_the_date('d M Y').'</time>
								<h3>'.get_the_title().'</h3>
							</div>
							<a class="btn btn-secondary btn-icon-arrow_right-colored" href="'.get_the_permalink() .'">
								Read More
							</a>
						</div>
					</div>

				</article>
			';
		endwhile;
	} else {
		$result .= '
			<section class="not_found">
				<p>No Result Found</p>
				<p>Try to adjust filters to find what you looking for</p>
			</section>
		';
	}

	echo(json_encode(array('data'=>$result, 'pagination'=>$pagination_data)));

	die();
}

add_action('wp_ajax_nopriv_filter_reports', 'filter_reports');
add_action('wp_ajax_filter_reports', 'filter_reports');

function filter_insights() {
	$category = $_POST['category'];
	$year = $_POST['year'];
	$month = $_POST['month'];

	$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

	$insights_ajax_args = array(
		'post_type' => 'insights',
		'posts_per_page' => 6,
		'paged' => $paged,
	);

	if(!empty($category)){
		$insights_ajax_args['tax_query'] = array(
			array(
				'taxonomy' => 'insights_cat',
				'field' => 'slug',
				'terms' => $category,
			)
		);
	}

	if(isset($month) || isset($year)){
		$insights_ajax_args['date_query'] = array(
			array(
				'year' => $year,
				'monthnum' => $month,
			),
		);
	}

	$ajax_posts = new WP_Query($insights_ajax_args);

	$pagination_args = array(
		'current' => max( 1, get_query_var('paged') ),
		'total' =>  $ajax_posts->max_num_pages,
		'prev_next'       => true,
		'next_text' => '<i class="fa fa-angle-right"></i>',
		'prev_text' => '<i class="fa fa-angle-left"></i>',
		'type'      => 'array',
		'end_size'  => 1,
		'mid_size'  => 3
	);

	$pages = paginate_links( $pagination_args );

	$pagination_data = '';
	if ( is_array( $pages ) ) {
		$paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');

		$pagination_data .= '
			<ul class="pagination ajax_pagination">';
				foreach ( $pages as $page ) {
					$pagination_data .= '<li class="list-item">'.$page.'</li>';
				} $pagination_data .='
			</ul>
		';
	}

	$result = '';
	if($ajax_posts->have_posts()) {
		while($ajax_posts->have_posts()) : $ajax_posts->the_post();
			$result .= '
				<article class="row report_article">
					<div class="col-md-5">
						<img src="'.get_the_post_thumbnail_url().'"  />
					</div>
					<div class="col-md-6">
						<div class="content_wrapper">
							<div class="main_data">
								<time>'. get_the_date('d M Y').'</time>
								<h3>'.get_the_title().'</h3>
							</div>
							<a class="btn btn-secondary btn-icon-arrow_right-colored" href="'.get_the_permalink() .'">
								Read More
							</a>
						</div>
					</div>

				</article>
			';
		endwhile;
	} else {
		$result = '
			<section class="not_found">
				<p>No Result Found</p>
				<p>Try to adjust filters to find what you looking for</p>
			</section>
		';
	}

	echo(json_encode(array('data'=>$result, 'pagination'=>$pagination_data)));

	die();
}

add_action('wp_ajax_nopriv_filter_insights', 'filter_insights');
add_action('wp_ajax_filter_insights', 'filter_insights');

function filter_blogs() {
	$category = $_POST['category'];
	$year = $_POST['year'];
	$month = $_POST['month'];

	$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

	$blogs_ajax_args = array(
		'post_type' => 'blogs',
		'posts_per_page' => 6,
		'paged' => $paged,
	);

	if(!empty($category)){
		$blogs_ajax_args['tax_query'] = array(
			array(
				'taxonomy' => 'blogs_cat',
				'field' => 'slug',
				'terms' => $category,
			)
		);
	}

	if(isset($month) || isset($year)){
		$blogs_ajax_args['date_query'] = array(
			array(
				'year' => $year,
				'monthnum' => $month,
			),
		);
	}

	$ajax_posts = new WP_Query($blogs_ajax_args);

	$pagination_args = array(
		'current' => max( 1, get_query_var('paged') ),
		'total' =>  $ajax_posts->max_num_pages,
		'prev_next'       => true,
		'next_text' => '<i class="fa fa-angle-right"></i>',
		'prev_text' => '<i class="fa fa-angle-left"></i>',
		'type'      => 'array',
		'end_size'  => 1,
		'mid_size'  => 3
	);

	$pages = paginate_links( $pagination_args );

	$pagination_data = '';
	if ( is_array( $pages ) ) {
		$paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');

		$pagination_data .= '
			<ul class="pagination ajax_pagination">';
				foreach ( $pages as $page ) {
					$pagination_data .= '<li class="list-item">'.$page.'</li>';
				} $pagination_data .='
			</ul>
		';
	}

	$result = '';
	if($ajax_posts->have_posts()) {
		while($ajax_posts->have_posts()) : $ajax_posts->the_post();
			$result .= '
				<article class="row report_article">
					<div class="col-md-5">
						<img src="'.get_the_post_thumbnail_url().'"  />
					</div>
					<div class="col-md-6">
						<div class="content_wrapper">
							<div class="main_data">
								<time>'. get_the_date('d M Y').'</time>
								<h3>'.get_the_title().'</h3>
							</div>
							<a class="btn btn-secondary btn-icon-arrow_right-colored" href="'.get_the_permalink() .'">
								Read More
							</a>
						</div>
					</div>

				</article>
			';
		endwhile;
	} else {
		$result = '
			<section class="not_found">
				<p>No Result Found</p>
				<p>Try to adjust filters to find what you looking for</p>
			</section>
		';
	}

	echo(json_encode(array('data'=>$result, 'pagination'=>$pagination_data)));

	die();
}

add_action('wp_ajax_nopriv_filter_blogs', 'filter_blogs');
add_action('wp_ajax_filter_blogs', 'filter_blogs');

/**
 * custom ajax pagination for insights
 *
 * == IMPORTANT: need to be refactored and merged with pagination report
 */
/* ajax pagination */
function ajax_pagination() {

	$category = $_POST['category'];
	$year = $_POST['year'];
	$month = $_POST['month'];
	$posts_per_page = intval($_POST['posts_per_page']);

	$requested_page = intval($_POST['page']);

	$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

	if ( get_query_var( 'paged' ) ) {
		$paged = get_query_var( 'paged' );
	} elseif ( get_query_var( 'page' ) ) {
		$paged = get_query_var( 'page' );
	} elseif($requested_page) {
		$paged = $requested_page;
	} else {
		$paged = 1;
	}

	$insights_ajax_args = array(
		'post_type' => 'insights',
		'paged' => $paged,
	);

	if($posts_per_page){
		$insights_ajax_args['posts_per_page'] = $posts_per_page;
	}

	if(!empty($category)){
		$insights_ajax_args['tax_query'] = array(
			array(
				'taxonomy' => 'insights_cat',
				'field' => 'slug',
				'terms' => $category,
			)
		);
	}

	if(isset($month) || isset($year)){
		$insights_ajax_args['date_query'] = array(
			array(
				'year' => $year,
				'monthnum' => $month,
			),
		);
	}

	$ajax_posts = new WP_Query($insights_ajax_args);

	$pagination_args = array(
		'current' => max( 1, $paged ),
		'total' =>  $ajax_posts->max_num_pages,
		'prev_next' => true,
		'next_text' => '<i class="fa fa-angle-right"></i>',
		'prev_text' => '<i class="fa fa-angle-left"></i>',
		'type'      => 'array',
		'end_size'  => 1,
		'mid_size'  => 3
	);

	$pages = paginate_links( $pagination_args );

	$pagination_data = '';
	if ( is_array( $pages ) ) {
		$paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');

		$pagination_data .= '
			<ul class="pagination ajax_pagination">';
				foreach ( $pages as $page ) {
					$pagination_data .= '<li class="list-item">'.$page.'</li>';
				} $pagination_data .='
			</ul>
		';
	}

	$result = '';

	while($ajax_posts->have_posts()) : $ajax_posts->the_post();
		$result .= '
			<article class="row report_article">
				<div class="col-md-5">
					<img src="'.get_the_post_thumbnail_url().'"  />
				</div>
				<div class="col-md-6">
					<div class="content_wrapper">
						<div class="main_data">
							<time>'. get_the_date('d M Y').'</time>
							<h3>'.get_the_title().'</h3>
						</div>
						<a class="btn btn-secondary btn-icon-arrow_right-colored" href="'.get_the_permalink() .'">
							Read More
						</a>
					</div>
				</div>

			</article>
		';
	endwhile;

	echo(json_encode(array('data'=>$result, 'pagination'=>$pagination_data)));

	exit;
}
add_action( 'wp_ajax_ajax_pagination', 'ajax_pagination' );
add_action( 'wp_ajax_nopriv_ajax_pagination', 'ajax_pagination' );

/**
 * custom ajax pagination for insights
 *
 * == IMPORTANT: need to be refactored and merged with pagination report
 */
/* ajax pagination */
function ajax_pagination_blogs() {

	$category = $_POST['category'];
	$year = $_POST['year'];
	$month = $_POST['month'];
	$posts_per_page = intval($_POST['posts_per_page']);

	$requested_page = intval($_POST['page']);

	$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

	if ( get_query_var( 'paged' ) ) {
		$paged = get_query_var( 'paged' );
	} elseif ( get_query_var( 'page' ) ) {
		$paged = get_query_var( 'page' );
	} elseif($requested_page) {
		$paged = $requested_page;
	} else {
		$paged = 1;
	}

	$blogs_ajax_args = array(
		'post_type' => 'blogs',
		'paged' => $paged,
	);

	if($posts_per_page){
		$blogs_ajax_args['posts_per_page'] = $posts_per_page;
	}

	if(!empty($category)){
		$blogs_ajax_args['tax_query'] = array(
			array(
				'taxonomy' => 'blogs_cat',
				'field' => 'slug',
				'terms' => $category,
			)
		);
	}

	if(isset($month) || isset($year)){
		$blogs_ajax_args['date_query'] = array(
			array(
				'year' => $year,
				'monthnum' => $month,
			),
		);
	}

	$ajax_posts = new WP_Query($blogs_ajax_args);

	$pagination_args = array(
		'current' => max( 1, $paged ),
		'total' =>  $ajax_posts->max_num_pages,
		'prev_next' => true,
		'next_text' => '<i class="fa fa-angle-right"></i>',
		'prev_text' => '<i class="fa fa-angle-left"></i>',
		'type'      => 'array',
		'end_size'  => 1,
		'mid_size'  => 3
	);

	$pages = paginate_links( $pagination_args );

	$pagination_data = '';
	if ( is_array( $pages ) ) {
		$paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');

		$pagination_data .= '
			<ul class="pagination ajax_pagination">';
				foreach ( $pages as $page ) {
					$pagination_data .= '<li class="list-item">'.$page.'</li>';
				} $pagination_data .='
			</ul>
		';
	}

	$result = '';

	while($ajax_posts->have_posts()) : $ajax_posts->the_post();
		$result .= '
			<article class="row report_article">
				<div class="col-md-5">
					<img src="'.get_the_post_thumbnail_url().'"  />
				</div>
				<div class="col-md-6">
					<div class="content_wrapper">
						<div class="main_data">
							<time>'. get_the_date('d M Y').'</time>
							<h3>'.get_the_title().'</h3>
						</div>
						<a class="btn btn-secondary btn-icon-arrow_right-colored" href="'.get_the_permalink() .'">
							Read More
						</a>
					</div>
				</div>

			</article>
		';
	endwhile;

	echo(json_encode(array('data'=>$result, 'pagination'=>$pagination_data)));

	exit;
}
add_action( 'wp_ajax_ajax_pagination_blogs', 'ajax_pagination_blogs' );
add_action( 'wp_ajax_nopriv_ajax_pagination_blogs', 'ajax_pagination_blogs' );

/**
 * custom ajax pagination for reports
 * this function is identical to ajax pagination
 *
 * == IMPORTANT: need to be refactored and merged with pagination report
 */
/* ajax pagination */
function ajax_pagination_reports() {

	$category = $_POST['category'];
	$year = $_POST['year'];
	$month = $_POST['month'];
	$posts_per_page = intval($_POST['posts_per_page']);

	$requested_page = intval($_POST['page']);

	$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

	if ( get_query_var( 'paged' ) ) {
		$paged = get_query_var( 'paged' );
	} elseif ( get_query_var( 'page' ) ) {
		$paged = get_query_var( 'page' );
	} elseif($requested_page) {
		$paged = $requested_page;
	} else {
		$paged = 1;
	}

	$reports_ajax_args = array(
		'post_type' => 'reports',
		'paged' => $paged,
	);

	if($posts_per_page){
		$reports_ajax_args['posts_per_page'] = $posts_per_page;
	}


	if(!empty($category)){
		$reports_ajax_args['tax_query'] = array(
			array(
				'taxonomy' => 'reports_cat',
				'field' => 'slug',
				'terms' => $category,
			)
		);
	}

	if(isset($month) || isset($year)){
		$reports_ajax_args['date_query'] = array(
			array(
				'year' => $year,
				'monthnum' => $month,
			),
		);
	}

	$ajax_posts = new WP_Query($reports_ajax_args);

	$pagination_args = array(
		'current' => max( 1, $paged ),
		'total' =>  $ajax_posts->max_num_pages,
		'prev_next' => true,
		'next_text' => '<i class="fa fa-angle-right"></i>',
		'prev_text' => '<i class="fa fa-angle-left"></i>',
		'type'      => 'array',
		'end_size'  => 1,
		'mid_size'  => 3
	);

	$pages = paginate_links( $pagination_args );

	$pagination_data = '';
	if ( is_array( $pages ) ) {

		$pagination_data .= '
			<ul class="pagination ajax_pagination_reports">';
				foreach ( $pages as $page ) {
					$pagination_data .= '<li class="list-item">'.$page.'</li>';
				} $pagination_data .='
			</ul>
		';
	}

	$result = '';

	while($ajax_posts->have_posts()) : $ajax_posts->the_post();
		$result .= '
			<article class="row report_article">
				<div class="col-md-5">
					<img src="'.get_the_post_thumbnail_url().'"  />
				</div>
				<div class="col-md-6">
					<div class="content_wrapper">
						<div class="main_data">
							<time>'. get_the_date('d M Y').'</time>
							<h3>'.get_the_title().'</h3>
						</div>
						<a class="btn btn-secondary btn-icon-arrow_right-colored" href="'.get_the_permalink() .'">
							Read More
						</a>
					</div>
				</div>

			</article>
		';
	endwhile;

	echo(json_encode(array('data'=>$result, 'pagination'=>$pagination_data)));

	exit;
}
add_action( 'wp_ajax_ajax_pagination_reports', 'ajax_pagination_reports' );
add_action( 'wp_ajax_nopriv_ajax_pagination_reports', 'ajax_pagination_reports' );