<?php

class Partners extends WP_Widget {

  	public function __construct() {
    	$widget_options = array(
			'classname' => 'Partners',
    		'description' => 'Full width Widget partners loop'
    	);
    	parent::__construct(
      		'Partners',
      		'WK - Partners',
      		$widget_options
    	);

		if ( is_active_widget(false, false, $this->id_base) ){
			add_action( 'wp_head', array(&$this, 'add_styles_and_scripts') );
		}
  	}

	function add_styles_and_scripts(){
		/* base slick style */
		wp_enqueue_style( 'slick-css', THEME_DIR_URI . '/src/sass/lib/slick.min.css', array(), '1.8.1');
		/* slick style override */
		wp_enqueue_style( 'partners_style', THEME_DIR_URI .'/dist/css/partners_carousel.css', array(), '1', 'all' );
		/* base slick script */
		wp_enqueue_script( 'slick-js', THEME_DIR_URI . '/src/scripts/lib/slick.min.js', array ( 'jquery' ) ,  '1.8.1', true);
		/* slick script override */
		wp_enqueue_script( 'partners_script', THEME_DIR_URI .'/dist/js/partner_widget.bundle.js', array ('slick-js', 'jquery') ,  '1', true);

	}

	public function widget($args, $instance) {

		/* base slick style */
		wp_enqueue_style( 'slick-css', THEME_DIR_URI . '/src/sass/lib/slick.min.css', array(), '1.8.1');
		/* slick style override */
		wp_enqueue_style( 'partners_style', THEME_DIR_URI .'/dist/css/partners_carousel.css', array(), '1', 'all' );
		/* base slick script */
		wp_enqueue_script( 'slick-js', THEME_DIR_URI . '/src/scripts/lib/slick.min.js', array ( 'jquery' ) ,  '1.8.1', true);
		/* slick script override */
		wp_enqueue_script( 'partners_script', THEME_DIR_URI .'/dist/js/partner_widget.bundle.js', array ('slick-js', 'jquery') ,  '1', true);


		$partners_args = array(
			'post_type'  => 'partners',
			'posts_per_page' => -1
		);

		$partners_query = new WP_Query( $partners_args );

		echo '
			<section class="partners">
				<div class="content-wrapper">
					<h2 class="section_title">'.$instance['section_title'].'</h2>
					<p class="section_subtitle">'.$instance['section_subtitle'] .'</p>
				</div> ';?> <?php

				if($partners_query) : ?>
					<div class="partners-slider"> <?php
						while ( $partners_query->have_posts() ) : $partners_query->the_post();

						echo '<div class="partner">';
							the_post_thumbnail();
						echo '</div>';

						endwhile;
						wp_reset_query()
						?>
					</div>
					<?php

						if($instance['btn_text']){
							echo '<a href="'.$instance['btn_url'].'" class="btn btn-primary btn-icon-arrow_right">'.$instance['btn_text'].'</a>';
						};
				else:
					echo 'Sorry there is no partners to show';
				endif;
				'
			</section>
		';
	}

  	public function form($instance) {
		$section_title = !empty($instance['section_title']) ? $instance['section_title'] : '';
		$section_subtitle = !empty($instance['section_subtitle']) ? $instance['section_subtitle'] : '';

		$btn_text = !empty($instance['btn_text']) ? $instance['btn_text'] : '';
		$btn_url = !empty($instance['btn_url']) ? $instance['btn_url'] : '';
		?>

		<p>
			<label for="<?php echo $this->get_field_id('section_title'); ?>">Section title:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('section_title'); ?>" name="<?php echo $this->get_field_name('section_title'); ?>" value="<?php echo esc_attr($section_title); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('section_subtitle'); ?>">Section subtitle:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('section_subtitle'); ?>" name="<?php echo $this->get_field_name('section_subtitle'); ?>" value="<?php echo esc_attr($section_subtitle); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('btn_text'); ?>">Button Text:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('btn_text'); ?>" name="<?php echo $this->get_field_name('btn_text'); ?>" value="<?php echo esc_attr($btn_text); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('btn_url'); ?>">Button URL:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('btn_url'); ?>" name="<?php echo $this->get_field_name('btn_url'); ?>" value="<?php echo esc_attr($btn_url); ?>" />
		</p> <?php
	}

	public function update($new_instance, $old_instance) {
		$instance = $old_instance;

		$instance['section_title'] = strip_tags($new_instance['section_title']);
		$instance['section_subtitle'] = strip_tags($new_instance['section_subtitle']);

		$instance['btn_text'] = strip_tags($new_instance['btn_text']);
		$instance['btn_url'] = strip_tags($new_instance['btn_url']);

		return $instance;
  	}
}
?>