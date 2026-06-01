<?php

class Associates extends WP_Widget {

  	public function __construct() {
    	$widget_options = array(
			'classname' => 'Associates',
    		'description' => 'Associates Data including category filter'
    	);
    	parent::__construct(
      		'Associates',
      		'WK - Associates',
      		$widget_options
    	);
  	}

	public function widget($args, $instance) {

		$associates_args = array(
			'post_type' => 'associates',
			'post_status' => 'publish',
			'posts_per_page' => -1,
		);

		$associates_loop = new WP_Query( $associates_args );

		$associates_categories_args = array(
			'taxonomy' => 'associates_cat'
		);

		$associates_categories = get_categories($associates_categories_args);

		echo '
			<main class="track_record">
				<div class="container">

					<ul class="categories_tabs">
						<!-- <li class="filter_item" data-filter="*" >
							All
						</li> -->';
						// foreach($associates_categories as $associates_ategory):
							echo '
								<li class="filter_item" data-filter="firm" >
									Firm
								</li>
								<li class="filter_item" data-filter="individual" >
									individuals
								</li>
							';
						// endforeach;
						echo'
					</ul>

					<h3 class="active_category_heading"></h3>

					<div class="track_record_tab_content row">';
					while ( $associates_loop->have_posts() ) : $associates_loop->the_post();

						$categories = get_the_terms( get_the_ID(), 'associates_cat' );

						$categories_list_slugs = array();

						echo get_field('type');

						// Hande if there's no selected category
						if($categories){
							foreach($categories as $category){
								array_push($categories_list_slugs, $category->slug);
							}
								echo '
									<div class="track_record_wrapper '.get_field('type').' col-12 col-md-6 col-lg-4" >
										<div class="track_record_item">
											<div class="main_data">';
												if( has_post_thumbnail() ) {
													the_post_thumbnail('thumbnail', array());
												}echo '
												<span class="service_type_heading">'.get_field('service_type').'</span>
												<span class="service_type_title">'.get_the_title().'</span>
												<p class="service_description">'.get_field('description').'</p>
											</div>

											<div class="additional_data">
												<p>'.get_field('return_on_investment').'</p>
												<time>'.get_field('date').'</time>
											</div>
										</div>
									</div>
								';
						}
						endwhile;
						wp_reset_postdata();echo'
					</div>
				</div>
			</main>
		';
	}

  	public function form($instance) {

	}

	public function update($new_instance, $old_instance) {

	}
}
?>