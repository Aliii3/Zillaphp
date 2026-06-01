<?php

class CustomSectionV1 extends WP_Widget {

  	public function __construct() {
    	$widget_options = array(
			'classname' => 'CustomSectionV1',
    		'description' => 'Custom section contains 2 cards'
    	);
    	parent::__construct(
      		'CustomSectionV1',
      		'WK - Custom Section V1',
      		$widget_options
    	);

		if ( is_active_widget(false, false, $this->id_base) ){
			add_action( 'wp_head', array(&$this, 'add_styles_and_scripts') );
		}
  	}

	function add_styles_and_scripts(){
		wp_enqueue_style( 'custom_section_v1', THEME_DIR_URI .'/dist/css/custom-section-v1.css', array(), '1', 'all' );
	}

	public function widget($args, $instance) {
		wp_enqueue_style( 'custom_section_v1', THEME_DIR_URI .'/dist/css/custom-section-v1.css', array(), '1', 'all' );

		if($instance){
			echo '
				<section class="custom_section_v1">
					<div class="container">
						<div class="row">
							<div class="col-lg-5">
								<div class="card">
									<div class="image_wrapper">
										<img src="'.$instance['left_card_image'].'" alt="'.image_alt_by_url($instance['left_card_image']).'" class="clip-shield-svg">
										<svg class="svg">
											<clipPath id="shield-clip-path" clipPathUnits="objectBoundingBox">
												<path d="M0.999,0.001,1,0 H0 L0.001,0.001 V0.536 s-0.037,0.342,0.499,0.464 l0,0,0,0,0,0,0,0 c0.536,-0.121,0.499,-0.464,0.499,-0.464"></path>
											</clipPath>
										</svg>
									</div>
									<h3 class="section_subtitle">'.$instance['left_card_title'].'</h3>
									<div class="card_content" style="padding-left: 100px;">'.$instance['left_card_content'].'</div>
								</div>
							</div>

							<div class="col-lg-5 custom-offset">
								<div class="card">
									<div class="image_wrapper">
										<img src="'.$instance['right_card_image'].'" alt="'.image_alt_by_url($instance['right_card_image']).'" class="clip-shield-svg">
										<svg class="svg">
											<clipPath id="shield-clip-path" clipPathUnits="objectBoundingBox">
												<path d="M0.999,0.001,1,0 H0 L0.001,0.001 V0.536 s-0.037,0.342,0.499,0.464 l0,0,0,0,0,0,0,0 c0.536,-0.121,0.499,-0.464,0.499,-0.464"></path>
											</clipPath>
										</svg>
									</div>
									<h3 class="section_subtitle">'.$instance['right_card_title'].'</h3>
									<div class="card_content">'.$instance['right_card_content'].'</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			';
		}

	}

  	public function form($instance) {

		?>

		<h2>Left Card</h2>

		<div class="customEditorParent">
			<label for="<?php echo $this->get_field_id('left_card_title'); ?>">Left CardTitle:</label>
			<textarea class="customEditor w-100" id="<?php echo $this->get_field_id('left_card_title'); ?>" name="<?php echo $this->get_field_name('left_card_title'); ?>"><?php echo $instance['left_card_title']; ?></textarea>
		</div>

		<div class="customEditorParent">
			<label for="<?php echo $this->get_field_id('left_card_content'); ?>">Left Card Content:</label>
			<textarea class="customEditor w-100" id="<?php echo $this->get_field_id('left_card_content'); ?>" name="<?php echo $this->get_field_name('left_card_content'); ?>"><?php echo $instance['left_card_content']; ?></textarea>
		</div>

		<p>
			<label for="<?php echo $this->get_field_id('left_card_image'); ?>">Left Card Image:</label><br />
			<?php
				if ($instance['left_card_image'] != '') :
					echo '<img class="custom_media_image" src="' . $instance['left_card_image'] . '" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" /><br />';
				endif;
			?>
			<input type="text" class="widefat custom_media_url" name="<?php echo $this->get_field_name('left_card_image'); ?>" id="<?php echo $this->get_field_id('left_card_image'); ?>" value="<?php echo $instance['left_card_image']; ?>">
			<input type="button" class="button button-primary custom_media_button" id="custom_media_button" name="<?php echo 'button' + $this->get_field_name('left_card_image'); ?>" value="Upload Image" style="margin-top:5px;" />
		</p>

		<h2>Right Card</h2>

		<div class="customEditorParent">
			<label for="<?php echo $this->get_field_id('right_card_title'); ?>">right CardTitle:</label>
			<textarea class="customEditor w-100" id="<?php echo $this->get_field_id('right_card_title'); ?>" name="<?php echo $this->get_field_name('right_card_title'); ?>"><?php echo $instance['right_card_title']; ?></textarea>
		</div>

		<div class="customEditorParent">
			<label for="<?php echo $this->get_field_id('right_card_content'); ?>">right Card Content:</label>
			<textarea class="customEditor w-100" id="<?php echo $this->get_field_id('right_card_content'); ?>" name="<?php echo $this->get_field_name('right_card_content'); ?>"><?php echo $instance['right_card_content']; ?></textarea>
		</div>

		<p>
			<label for="<?php echo $this->get_field_id('right_card_image'); ?>">right Card Image:</label><br />
			<?php
				if ($instance['right_card_image'] != '') :
					echo '<img class="custom_media_image" src="' . $instance['right_card_image'] . '" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" /><br />';
				endif;
			?>
			<input type="text" class="widefat custom_media_url" name="<?php echo $this->get_field_name('right_card_image'); ?>" id="<?php echo $this->get_field_id('right_card_image'); ?>" value="<?php echo $instance['right_card_image']; ?>">
			<input type="button" class="button button-primary custom_media_button" id="custom_media_button" name="<?php echo 'button' + $this->get_field_name('right_card_image'); ?>" value="Upload Image" style="margin-top:5px;" />
		</p>

		<?php
	}

	public function update($new_instance, $old_instance) {
		$instance = $old_instance;

		$instance['left_card_title'] = $new_instance['left_card_title'];
		$instance['left_card_content'] = $new_instance['left_card_content'];
		$instance['left_card_image'] = strip_tags($new_instance['left_card_image']);

		$instance['right_card_title'] = $new_instance['right_card_title'];
		$instance['right_card_content'] = $new_instance['right_card_content'];
		$instance['right_card_image'] = strip_tags($new_instance['right_card_image']);

		return $instance;
  	}
}
?>