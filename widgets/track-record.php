<?php

class TrackRecord extends WP_Widget {

  	public function __construct() {
    	$widget_options = array(
			'classname' => 'TrackRecord',
    		'description' => 'Track Record Data including category filter'
    	);
    	parent::__construct(
      		'TrackRecord',
      		'WK - Track Record',
      		$widget_options
    	);

		if ( is_active_widget(false, false, $this->id_base) ){
			add_action( 'wp_head', array(&$this, 'add_styles_and_scripts') );
		}
  	}

	function add_styles_and_scripts(){
		wp_enqueue_style( 'track_record', THEME_DIR_URI .'/dist/css/track_record.css', array(), '1', 'all' );
		wp_enqueue_script( 'custom_video_script', THEME_DIR_URI .'/dist/js/track_record.bundle.js', array ( ) ,  '1', true);
	}

	public function widget($args, $instance) {

		$track_record_args = array(
			'post_type' => 'track_record',
			'post_status' => 'publish',
			'posts_per_page' => -1,
		);

		$track_record_loop = new WP_Query( $track_record_args );

		$track_record_categories_args = array(
			'taxonomy' => 'track_record_cat'
		);

		$track_record_categories = get_categories($track_record_categories_args);

		echo '
			<main class="track_record">
				<div class="container">

					<ul class="categories_tabs">';
						foreach($track_record_categories as $track_record_category):
							echo '
								<li class="filter_item" data-filter="'.$track_record_category->slug.'" >
									'.$track_record_category->name.'
								</li>
							';
						endforeach; echo'
					</ul>

					<h3 class="active_category_heading"></h3>

					<div class="track_record_tab_content row">';
					while ( $track_record_loop->have_posts() ) : $track_record_loop->the_post();

						$categories = get_the_terms( get_the_ID(), 'track_record_cat' );

						$categories_list_slugs = array();

						// Hande if there's no selected category
						if($categories){
							foreach($categories as $category){
								array_push($categories_list_slugs, $category->slug);
							}
								echo '
									<div class="track_record_wrapper '.implode(' ', $categories_list_slugs).' col-12 col-md-6 col-lg-4" >
										<div class="track_record_item">
											<div class="main_data">';
												if( has_post_thumbnail() ) {
													the_post_thumbnail('thumbnail', array(
													));
												}echo '
												<span class="service_type_heading">'.get_field('service_type').'</span>
												<span class="service_type_title">'.get_field('service_title').'</span>
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