<?php

class TextWithImageLeft extends WP_Widget {

  	public function __construct() {
    	$widget_options = array(
			'classname' => 'TextWithImageLeft',
    		'description' => 'Text with Image Left'
    	);
    	parent::__construct(
      		'TextWithImageLeft',
      		'WK - Text with Image Left',
      		$widget_options
    	);

		if ( is_active_widget(false, false, $this->id_base) ){
			add_action( 'wp_head', array(&$this, 'add_styles_and_scripts') );
		}
  	}

	function add_styles_and_scripts(){
		wp_enqueue_style( 'text_with_image_left', THEME_DIR_URI .'/dist/css/text-with-image-left.css', array(), '1', 'all' );
	}

	public function widget($args, $instance) {
		wp_enqueue_style( 'text_with_image_left', THEME_DIR_URI .'/dist/css/text-with-image-left.css', array(), '1', 'all' );
		echo '
			<section class="text-with-image-left">
				<div class="container">
					<div class="row">
						<div class="col-md-6 d-none d-md-block">
							<div class="image-wrapper">
								<img src="'.$instance['left_image'].'" alt="Section Image" class="clip-shield-svg" >

								<svg class="svg">
									<clipPath id="shield-clip-path" clipPathUnits="objectBoundingBox"><path d="M0.999,0.001,1,0 H0 L0.001,0.001 V0.536 s-0.037,0.342,0.499,0.464 l0,0,0,0,0,0,0,0 c0.536,-0.121,0.499,-0.464,0.499,-0.464"></path></clipPath>
								</svg>
							</div>
						</div>

						<div class="col-md-6">
							<div class="content-wrapper">
								<p class="section_subtitle">
									'.$instance['section_title'].'
								</p>
								<p class="section-content">
									'.$instance['content'].'
								</p>

								<div class="image-wrapper d-md-none">
									<img src="'.$instance['left_image'].'" alt="Section Image" class="clip-shield-svg" >

									<svg class="svg">
										<clipPath id="shield-clip-path" clipPathUnits="objectBoundingBox"><path d="M0.999,0.001,1,0 H0 L0.001,0.001 V0.536 s-0.037,0.342,0.499,0.464 l0,0,0,0,0,0,0,0 c0.536,-0.121,0.499,-0.464,0.499,-0.464"></path></clipPath>
									</svg>
								</div>
								<a href="'.$instance['btn_url'].'" class="btn btn-primary btn-icon-arrow_right">'.$instance['btn_text'].'</a>
							</div>
						</div>
					</div>
				</div>
			</section>
		';
	}

  	public function form($instance) {

		$section_title = !empty($instance['section_title']) ? $instance['section_title'] : '';
		$content = !empty($instance['content']) ? $instance['content'] : '';
		$btn_text = !empty($instance['btn_text']) ? $instance['btn_text'] : '';
		$btn_url = !empty($instance['btn_url']) ? $instance['btn_url'] : '';
		?>

		<div class="customEditorParent">
			<label for="<?php echo $this->get_field_id('section_title'); ?>">Section Title:</label>
			<textarea class="customEditor w-100" id="<?php echo $this->get_field_id('section_title'); ?>" name="<?php echo $this->get_field_name('section_title'); ?>"><?php echo $instance['section_title']; ?></textarea>
		</div>

		<div class="customEditorParent">
			<label for="<?php echo $this->get_field_id('content'); ?>">Section content:</label>
			<textarea class="customEditor w-100" id="<?php echo $this->get_field_id('content'); ?>" name="<?php echo $this->get_field_name('content'); ?>"><?php echo $instance['content']; ?></textarea>
		</div>

		<p>
			<label for="<?php echo $this->get_field_id('btn_text'); ?>">Button Text:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('btn_text'); ?>" name="<?php echo $this->get_field_name('btn_text'); ?>" value="<?php echo esc_attr($btn_text); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('btn_url'); ?>">Button URL:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('btn_url'); ?>" name="<?php echo $this->get_field_name('btn_url'); ?>" value="<?php echo esc_attr($btn_url); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('left_image'); ?>">Left Image:</label><br />
			<?php
				if ($instance['left_image'] != '') :
					echo '<img class="custom_media_image" src="' . $instance['left_image'] . '" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" /><br />';
				endif;
			?>
			<input type="text" class="widefat custom_media_url" name="<?php echo $this->get_field_name('left_image'); ?>" id="<?php echo $this->get_field_id('left_image'); ?>" value="<?php echo $instance['left_image']; ?>">
			<input type="button" class="button button-primary custom_media_button" id="custom_media_button" name="<?php echo 'button' + $this->get_field_name('left_image'); ?>" value="Upload Image" style="margin-top:5px;" />
		</p>
		<?php
	}

	public function update($new_instance, $old_instance) {
		$instance = $old_instance;

		$instance['section_title'] = $new_instance['section_title'];

		$instance['btn_text'] = strip_tags($new_instance['btn_text']);
		$instance['btn_url'] = strip_tags($new_instance['btn_url']);

		$instance['left_image'] = strip_tags($new_instance['left_image']);

		$instance['content'] = $new_instance['content'];

		return $instance;
  	}
}
?>