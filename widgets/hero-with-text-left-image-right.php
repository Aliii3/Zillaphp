<?php

class HeroWithTextLeftImageRight extends WP_Widget {

  	public function __construct() {
    	$widget_options = array(
			'classname' => 'HeroWithTextLeftImageRight',
    		'description' => 'Header with Text in left and image with right'
    	);
    	parent::__construct(
      		'HeroWithTextLeftImageRight',
      		'WK - Hero With Text Left Image Right',
      		$widget_options
    	);

		if ( is_active_widget(false, false, $this->id_base) ){
			add_action( 'wp_head', array(&$this, 'add_styles_and_scripts') );
		}
  	}

	function add_styles_and_scripts(){
		wp_enqueue_style( 'hero_with_text_left_style', THEME_DIR_URI .'/dist/css/hero-with-text-left-image-right.css', array(), '1', 'all' );
	}

	public function widget($args, $instance) {
		wp_enqueue_style( 'hero_with_text_left_style', THEME_DIR_URI .'/dist/css/hero-with-text-left-image-right.css', array(), '1', 'all' );
		$cuted_string = wp_trim_words($instance['section_content'], 30);

		echo '
			<header class="hero-with-text-left-image-right">
				<div class="container">
					<p class="title">'.$instance['section_title'].'</p>
					<div class="col-lg-5 col-xl-6 section_content">
						<p>'. $cuted_string .'</p>
					</div>
				</div>
				<div class="container">
					<div class="image-wrapper">
						<img src="'.$instance['section_right_img'].'" alt="Section Image" class="clip-shield-svg" >

						<svg class="svg">
							<clipPath id="shield-clip-path" clipPathUnits="objectBoundingBox"><path d="M0.999,0.001,1,0 H0 L0.001,0.001 V0.536 s-0.037,0.342,0.499,0.464 l0,0,0,0,0,0,0,0 c0.536,-0.121,0.499,-0.464,0.499,-0.464"></path></clipPath>
						</svg>
					</div>
				</div>
			</header>
		';
	}

  	public function form($instance) {
		$section_title = !empty($instance['section_title']) ? $instance['section_title'] : '';
		$section_content = !empty($instance['section_content']) ? $instance['section_content'] : '';?>

		<div class="customEditorParent">
			<label for="<?php echo $this->get_field_id('section_title'); ?>">Section Title</label>
			<textarea class="customEditor w-100" id="<?php echo $this->get_field_id('section_title'); ?>" name="<?php echo $this->get_field_name('section_title'); ?>"><?php echo $instance['section_title']; ?></textarea>
    	</div>



		<div class="customEditorParent">
			<label for="<?php echo $this->get_field_id('section_content'); ?>">Section content</label>
			<textarea class="customEditor w-100" id="<?php echo $this->get_field_id('section_content'); ?>" name="<?php echo $this->get_field_name('section_content'); ?>"><?php echo $instance['section_content']; ?></textarea>
		</div>

		<p>
			<label for="<?php echo $this->get_field_id('section_right_img'); ?>">Section right image</label><br />
			<?php
				if ($instance['section_right_img'] != '') :
					echo '<img class="custom_media_image" src="' . $instance['section_right_img'] . '" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" /><br />';
				endif;
			?>
			<input type="text" class="widefat custom_media_url" name="<?php echo $this->get_field_name('section_right_img'); ?>" id="<?php echo $this->get_field_id('section_right_img'); ?>" value="<?php echo $instance['section_right_img']; ?>">
			<input type="button" class="button button-primary custom_media_button" id="custom_media_button" name="<?php echo 'button' + $this->get_field_name('section_right_img'); ?>" value="Upload Image" style="margin-top:5px;" />
		</p>
		<?php
	}

	public function update($new_instance, $old_instance) {
		$instance = $old_instance;

		$instance['section_title'] = $new_instance['section_title'];

		$instance['section_content'] = $new_instance['section_content'];

		$instance['section_right_img'] = strip_tags($new_instance['section_right_img']);


		return $instance;
  	}
}
?>