<?php

class ContentWithImage extends WP_Widget {

  	public function __construct() {
    	$widget_options = array(
			'classname' => 'ContentWithImage',
    		'description' => 'content with image Could be customized based on user select'
    	);
    	parent::__construct(
      		'ContentWithImage',
      		'WK - Customizable Content With Image',
      		$widget_options
    	);

		if ( is_active_widget(false, false, $this->id_base) ){
			add_action( 'wp_head', array(&$this, 'add_styles_and_scripts') );
		}
  	}

	function add_styles_and_scripts(){
		wp_enqueue_style( 'content_with_image', THEME_DIR_URI .'/dist/css/content_with_image.css', array(), '1', 'all' );
		wp_enqueue_script( 'content_with_image_script', THEME_DIR_URI .'/dist/js/content_with_image.bundle.js', array ( ) ,  '1', true);
	}

	public function widget($args, $instance) {
		wp_enqueue_style( 'content_with_image', THEME_DIR_URI .'/dist/css/content_with_image.css', array(), '1', 'all' );
		wp_enqueue_script( 'content_with_image_script', THEME_DIR_URI .'/dist/js/content_with_image.bundle.js', array ( ) ,  '1', true);

		$image_position = $instance['image_position'];
		$position_class = $image_position == 'left' ? '' : 'flex-row-reverse';

		$image_style = $instance['image_style'];
		$image_style_class = $image_style == 'with_icon' ? 'with_icon' : '';

		$content_style = $instance['content_style'];

		$section_bg_colored = !empty($instance['section_bg_colored']) ? $instance['section_bg_colored'] : '';

		$section_bg_colored_class = $section_bg_colored ? 'section_has_bg_color' : '';

		$section_bg_status = $section_bg_colored == "section_bg_colored"? 'style="background-color: #f6f9fb;"': '';

		$view_more_bg_color = $section_bg_colored == "section_bg_colored"? 'style="background-image: linear-gradient(to bottom, rgba(246, 249, 251, 0), #f6f9fb);"': '';

		$list_icon_style = !empty($instance['list_icon_style']) ? $instance['list_icon_style'] : '';

		$list_columns_number = !empty($instance['list_columns_number']) ? $instance['list_columns_number'] : '';

		// if has call 2 action exist
		$btn_text = !empty($instance['btn_text']) ? $instance['btn_text'] : '';
		$btn_url = !empty($instance['btn_url']) ? $instance['btn_url'] : '';

		if($instance){
			echo '
				<section class="content_with_image image_'.$image_position.' '.$section_bg_colored_class.'" '.$section_bg_status.'>
					<div class="container">
						<div class="row '.$position_class.' justify-content-between">';

							if($instance['image']):
								echo '
									<div class="col-md-6">
										<div class="image_wrapper '.$image_style_class.'">
											<img src="'.$instance['image'].'" alt="Section Image" class="clip-shield-svg" >

											<svg class="svg">
												<clipPath id="shield-clip-path" clipPathUnits="objectBoundingBox"><path d="M0.999,0.001,1,0 H0 L0.001,0.001 V0.536 s-0.037,0.342,0.499,0.464 l0,0,0,0,0,0,0,0 c0.536,-0.121,0.499,-0.464,0.499,-0.464"></path></clipPath>
											</svg>
										</div>
									</div>
								';
							endif;

							echo '
								<div class="col-md-6">
									<div class="section_content_wrapper">';
										// render section title
										if($instance['section_title']):
											echo '
												<div class="section_title">'
													.$instance['section_title'];
													if ($instance['abbreviation'] != ''){
														echo '<span class="abbreviation"> '.$instance['abbreviation'].'</span>';
													} echo '
												</div>
											';
										endif;

										// render section content if content is normal
										if($instance['section_content'] && ($content_style == 'normal' || $content_style == 'call_to_action') ): echo '
											<div class="content-wrapper">';
												echo $instance['section_content'];
												if($content_style == 'call_to_action'){
													echo '<a href="'.$instance['btn_url'].'" class="btn btn-primary btn-icon-arrow_right">'.$instance['btn_text'].'</a>';
												} echo'
											</div>';

										elseif($instance['section_content'] && $content_style == 'view_more'): echo'
											<div class="content-wrapper content-hidden" id="widget_'.$instance['panels_info']['widget_id'].'"><p>'.$instance['section_content'].'</p>
												<div class="view-more" '.$view_more_bg_color.'>
													<span class="view-more-btn" id="widget_'.$instance['panels_info']['widget_id'].'"></span>
												</div>
											</div>';
										endif; echo '
									</div>
								</div>
							'; echo '
						</div>';

						if($list_icon_style){
							echo '
								<div class="row section_list list_icon_'.$list_icon_style.' '.$list_columns_number.'">
									<div class="col-lg-12">
										<h4>'.$instance['section_list_title'].'</h4>
										'.$instance['section_list_content'].'
									</div>
								</div>
							';
						}; echo '
					</div>
				</section>
			';
		}

	}

  	public function form($instance) {

		$abbreviation = !empty($instance['abbreviation']) ? $instance['abbreviation'] : '';

		$image_position = !empty($instance['image_position']) ? $instance['image_position'] : '';
		$image_style = !empty($instance['image_style']) ? $instance['image_style'] : '';

		$content_style = !empty($instance['content_style']) ? $instance['content_style'] : '';
		$section_bg_colored = !empty($instance['section_bg_colored']) ? $instance['section_bg_colored'] : '';
		$section_list_title = !empty($instance['section_list_title']) ? $instance['section_list_title'] : '';

		$list_icon_style = !empty($instance['list_icon_style']) ? $instance['list_icon_style'] : '';

		$list_columns_number = !empty($instance['list_columns_number']) ? $instance['list_columns_number'] : '';

		?>

		<!-- section title -->

		<div class="customEditorParent">
			<label for="<?php echo $this->get_field_id('section_title'); ?>">Section Title:</label>
			<textarea class="customEditor w-100" id="<?php echo $this->get_field_id('section_title'); ?>" name="<?php echo $this->get_field_name('section_title'); ?>"><?php echo $instance['section_title']; ?></textarea>
		</div>

		<!-- Abbreviation -->

		<p>
			<label for="<?php echo $this->get_field_id('abbreviation'); ?>">Abbreviation:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('abbreviation'); ?>" name="<?php echo $this->get_field_name('abbreviation'); ?>" value="<?php echo esc_attr($abbreviation); ?>" />
		</p>

		<!-- Section Content -->

		<div class="customEditorParent">
			<label for="<?php echo $this->get_field_id('section_content'); ?>">Section Content:</label>
			<textarea class="customEditor w-100" id="<?php echo $this->get_field_id('section_content'); ?>" name="<?php echo $this->get_field_name('section_content'); ?>"><?php echo $instance['section_content']; ?></textarea>
		</div>

		<!-- Section Image -->

		<p>
			<label for="<?php echo $this->get_field_id('image'); ?>">Image:</label><br />
			<?php
				if ($instance['image'] != '') :
					echo '<img class="custom_media_image" src="' . $instance['image'] . '" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" /><br />';
				endif;
			?>
			<input type="text" class="widefat custom_media_url" name="<?php echo $this->get_field_name('image'); ?>" id="<?php echo $this->get_field_id('image'); ?>" value="<?php echo $instance['image']; ?>">
			<input type="button" class="button button-primary custom_media_button" id="custom_media_button" name="<?php echo 'button' + $this->get_field_name('image'); ?>" value="Upload Image" style="margin-top:5px;" />
		</p>

		<!-- Section Image Position -->

		<div class="form-group">
			<label>Image Position:</label>

			<p>
				<input class="widefat" type="radio" id="<?php echo $this->get_field_id('image_position_left'); ?>" name="<?php echo $this->get_field_name('image_position'); ?>" value="left" <?php echo $image_position == "left"? checked: '' ?> />
				<label for="<?php echo $this->get_field_id('image_position_left'); ?>">Left:</label>
			</p>

			<p>
				<input class="widefat" type="radio" id="<?php echo $this->get_field_id('image_position_right'); ?>" name="<?php echo $this->get_field_name('image_position'); ?>" value="right" <?php echo $image_position == "right"? checked: '' ?> />
				<label for="<?php echo $this->get_field_id('image_position_right'); ?>">Right:</label>
			</p>
		</div>

		<!-- Section Image Style -->

		<div class="form-group">
			<label>Image Style:</label>

			<p>
				<input class="widefat" type="radio" id="<?php echo $this->get_field_id('image_style_normal'); ?>" name="<?php echo $this->get_field_name('image_style'); ?>" value="normal" <?php echo $image_style == "normal"? checked: '' ?> />
				<label for="<?php echo $this->get_field_id('image_style_normal'); ?>">Normal:</label>
			</p>

			<p>
				<input class="widefat" type="radio" id="<?php echo $this->get_field_id('image_style_with_icon'); ?>" name="<?php echo $this->get_field_name('image_style'); ?>" value="with_icon" <?php echo $image_style == "with_icon"? checked: '' ?> />
				<label for="<?php echo $this->get_field_id('image_style_with_icon'); ?>">Has Icon Before:</label>
			</p>
		</div>

		<!-- Content Actions -->

		<div class="form-group">
			<label>Content Style:</label>

			<p>
				<input class="widefat" type="radio" id="<?php echo $this->get_field_id('content_style_normal'); ?>" name="<?php echo $this->get_field_name('content_style'); ?>" value="normal" <?php echo $content_style == "normal"? checked: '' ?> />
				<label for="<?php echo $this->get_field_id('content_style_normal'); ?>">Normal:</label>
			</p>

			<p>
				<input class="widefat" type="radio" id="<?php echo $this->get_field_id('content_style_view_more'); ?>" name="<?php echo $this->get_field_name('content_style'); ?>" value="view_more" <?php echo $content_style == "view_more"? checked: '' ?> />
				<label for="<?php echo $this->get_field_id('content_style_view_more'); ?>">Has View More:</label>
			</p>

			<p>
				<input class="widefat" type="radio" id="<?php echo $this->get_field_id('content_style_call_to_action'); ?>" name="<?php echo $this->get_field_name('content_style'); ?>" value="call_to_action" <?php echo $content_style == "call_to_action"? checked: '' ?> />
				<label for="<?php echo $this->get_field_id('content_style_call_to_action'); ?>">Has Call To Action:</label>
			</p>

			<!-- btn text if call 2 action is selected -->

			<h2>Write Button text and button url if call 2 action is selected</h2>
			<p>
				<label for="<?php echo $this->get_field_id('btn_text'); ?>">Button Text:</label>
				<input class="widefat" type="text" id="<?php echo $this->get_field_id('btn_text'); ?>" name="<?php echo $this->get_field_name('btn_text'); ?>" value="<?php echo esc_attr($btn_text); ?>" />
			</p>

			<p>
				<label for="<?php echo $this->get_field_id('btn_url'); ?>">Button URL:</label>
				<input class="widefat" type="text" id="<?php echo $this->get_field_id('btn_url'); ?>" name="<?php echo $this->get_field_name('btn_url'); ?>" value="<?php echo esc_attr($btn_url); ?>" />
			</p>
		</div>

		<!-- section Background Color Boolean -->

		<div class="form-group">
			<label>Section has Background color:</label>

			<p>
				<input class="widefat" type="checkbox" id="<?php echo $this->get_field_id('section_bg_colored'); ?>" name="<?php echo $this->get_field_name('section_bg_colored'); ?>" value="section_bg_colored" <?php echo $section_bg_colored ? checked: '' ?> />
				<label for="<?php echo $this->get_field_id('section_bg_colored'); ?>">Section has Background color</label>
			</p>
		</div>


		<div class="form-group">

			<h2>List</h2>

			<p>
				<label for="<?php echo $this->get_field_id('section_list_title'); ?>">Section List Title:</label>
				<input class="widefat" type="text" id="<?php echo $this->get_field_id('section_list_title'); ?>" name="<?php echo $this->get_field_name('section_list_title'); ?>" value="<?php echo esc_attr($section_list_title); ?>" />
			</p>

			<div class="customEditorParent">
				<label for="<?php echo $this->get_field_id('section_list_content'); ?>">Section List Content:</label>
				<textarea class="customEditor w-100" id="<?php echo $this->get_field_id('section_list_content'); ?>" name="<?php echo $this->get_field_name('section_list_content'); ?>"><?php echo $instance['section_list_content']; ?></textarea>
			</div>

			<h3>List Icon:</h3>

			<p>
				<input class="widefat" type="radio" id="<?php echo $this->get_field_id('list_icon_diamond'); ?>" name="<?php echo $this->get_field_name('list_icon_style'); ?>" value="diamond" <?php echo $list_icon_style == "diamond"? checked: '' ?> />
				<label for="<?php echo $this->get_field_id('list_icon_diamond'); ?>"><img src="<?php echo THEME_DIR_URI . '/dist/images/diamond.svg' ?>" alt="diamond " class="dashboard_icon_list"/></label>
			</p>

			<p>
				<input class="widefat" type="radio" id="<?php echo $this->get_field_id('list_icon_check'); ?>" name="<?php echo $this->get_field_name('list_icon_style'); ?>" value="check" <?php echo $list_icon_style == "check"? checked: '' ?> />
				<label for="<?php echo $this->get_field_id('list_icon_check'); ?>"><img src="<?php echo THEME_DIR_URI . '/dist/images/check-circle-colored.svg' ?>" alt="check" class="dashboard_icon_list"/></label>
			</p>

			<h3>list columns number :</h3>

			<p>
				<input class="widefat" type="radio" id="<?php echo $this->get_field_id('list_columns_one_column'); ?>" name="<?php echo $this->get_field_name('list_columns_number'); ?>" value="one_column" <?php echo $list_columns_number == "one_column"? checked: '' ?> />
				<label for="<?php echo $this->get_field_id('list_columns_one_column'); ?>">1 Columns</label>
			</p>

			<p>
				<input class="widefat" type="radio" id="<?php echo $this->get_field_id('list_columns_three_column'); ?>" name="<?php echo $this->get_field_name('list_columns_number'); ?>" value="three_column" <?php echo $list_columns_number == "three_column"? checked: '' ?> />
				<label for="<?php echo $this->get_field_id('list_columns_three_column'); ?>">3 Columns</label>
			</p>

		</div>

		<?php
	}

	public function update($new_instance, $old_instance) {
		$instance = $old_instance;

		$instance['section_title'] = $new_instance['section_title'];
		$instance['section_content'] = $new_instance['section_content'];

		$instance['abbreviation'] = isset($new_instance['image_position']) ? strip_tags($new_instance['abbreviation']) : '';

		$instance['image'] = isset($new_instance['image_position']) ? strip_tags($new_instance['image']) : '';

		$instance['image_position'] = isset($new_instance['image_position']) ? strip_tags($new_instance['image_position']) : '';
		$instance['image_style'] = isset($new_instance['image_style']) ? strip_tags($new_instance['image_style']) : '';
		$instance['content_style'] = isset($new_instance['content_style']) ? strip_tags($new_instance['content_style']) : '';

		// call 2 action data
		$instance['btn_text'] = isset($new_instance['btn_text']) ? strip_tags($new_instance['btn_text']) : '';
		$instance['btn_url'] = isset($new_instance['btn_url']) ? strip_tags($new_instance['btn_url']) : '';

		$instance['section_bg_colored'] = isset($new_instance['section_bg_colored']) ? strip_tags($new_instance['section_bg_colored']) : '';

		$instance['abbreviation'] = isset($new_instance['abbreviation']) ? strip_tags($new_instance['abbreviation']) : '';

		$instance['section_list_title'] = isset($new_instance['section_list_title']) ? strip_tags($new_instance['section_list_title']) : '';
		$instance['section_list_content'] = isset($new_instance['section_list_title']) ? $new_instance['section_list_content'] : '';

		$instance['list_icon_style'] = isset($new_instance['list_icon_style']) ? strip_tags($new_instance['list_icon_style']) : '';

		$instance['list_columns_number'] = isset($new_instance['list_columns_number']) ? strip_tags($new_instance['list_columns_number']) : '';

		return $instance;
  	}
}
?>