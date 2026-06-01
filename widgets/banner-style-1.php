<?php

class BannerStyle1 extends WP_Widget {

  	public function __construct() {
    	$widget_options = array(
			'classname' => 'BannerStyle1',
    		'description' => 'Full width banner style 1'
    	);
    	parent::__construct(
      		'BannerStyle1',
      		'WK - Banner style 1',
      		$widget_options
    	);

		if ( is_active_widget(false, false, $this->id_base) ){
			add_action( 'wp_head', array(&$this, 'add_styles_and_scripts') );
		}
  	}

	function add_styles_and_scripts(){
		wp_enqueue_style( 'banner_style_1', THEME_DIR_URI .'/dist/css/banner-style-1.css', array(), '1', 'all' );
	}

	public function widget($args, $instance) {
		wp_enqueue_style( 'banner_style_1', THEME_DIR_URI .'/dist/css/banner-style-1.css', array(), '1', 'all' );

		echo '
			<section class="banner-style-1">
				<div class="custom-container-fluid">
					<div class="content-wrapper">
						<h2 class="section_title">'.$instance['section_subtitle'].'</h2>
						<p class="section_subtitle">'.$instance['section_title_Bold'] .'<span>'.$instance['section_title_regular'].'</span></p>
						<a href="'.$instance['section_button_url'].'" class="btn btn-primary btn-icon-arrow_right">'.$instance['section_button_text'].'</a>
					</div>

					<div class="image-wrapper">
						<img src="'.$instance['section_image'].'" alt="img" class="banner-style-1-svg">
						<svg class="svg">
							<clipPath id="banner-style-1-svg" clipPathUnits="objectBoundingBox"><path d="M1,0 V0.999 s-0.291,0.009,-0.438,-0.042 C0.286,0.861,0,0.5,0,0"></path></clipPath>
						</svg>
					</div>
				</div>
			</section>
		';
	}

  	public function form($instance) {
		$section_subtitle = !empty($instance['section_subtitle']) ? $instance['section_subtitle'] : '';
		$section_title_Bold = !empty($instance['section_title_Bold']) ? $instance['section_title_Bold'] : '';
		$section_title_regular = !empty($instance['section_title_regular']) ? $instance['section_title_regular'] : '';
		$section_button_text = !empty($instance['section_button_text']) ? $instance['section_button_text'] : '';
		$section_button_url = !empty($instance['section_button_url']) ? $instance['section_button_url'] : '';
		?>

		<p>
			<label for="<?php echo $this->get_field_id('section_subtitle'); ?>">Section Subtitle:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('section_subtitle'); ?>" name="<?php echo $this->get_field_name('section_subtitle'); ?>" value="<?php echo esc_attr($section_subtitle); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('section_title_Bold'); ?>">Section Title Bold:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('section_title_Bold'); ?>" name="<?php echo $this->get_field_name('section_title_Bold'); ?>" value="<?php echo esc_attr($section_title_Bold); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('section_title_regular'); ?>">Section Title Regular:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('section_title_regular'); ?>" name="<?php echo $this->get_field_name('section_title_regular'); ?>" value="<?php echo esc_attr($section_title_regular); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('section_button_text'); ?>">Section Button Text:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('section_button_text'); ?>" name="<?php echo $this->get_field_name('section_button_text'); ?>" value="<?php echo esc_attr($section_button_text); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('section_button_url'); ?>">Button URL:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('section_button_url'); ?>" name="<?php echo $this->get_field_name('section_button_url'); ?>" value="<?php echo $section_button_url; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('section_image'); ?>">Section right image:</label><br />
			<?php
				if ($instance['section_image'] != '') :
					echo '<img class="custom_media_image" src="' . $instance['section_image'] . '" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" /><br />';
				endif;
			?>
			<input type="text" class="widefat custom_media_url" name="<?php echo $this->get_field_name('section_image'); ?>" id="<?php echo $this->get_field_id('section_image'); ?>" value="<?php echo $instance['section_image']; ?>">
			<input type="button" class="button button-primary custom_media_button" id="custom_media_button" name="<?php echo 'button' + $this->get_field_name('section_image'); ?>" value="Upload Image" style="margin-top:5px;" />
		</p> <?php
	}

	public function update($new_instance, $old_instance) {
		$instance = $old_instance;

		$instance['section_subtitle'] = strip_tags($new_instance['section_subtitle']);
		$instance['section_title_Bold'] = strip_tags($new_instance['section_title_Bold']);

		$instance['section_title_regular'] = strip_tags($new_instance['section_title_regular']);
		$instance['section_button_text'] = strip_tags($new_instance['section_button_text']);
		$instance['section_button_url'] = strip_tags($new_instance['section_button_url']);

		$instance['section_image'] = strip_tags($new_instance['section_image']);

		return $instance;
  	}
}
?>