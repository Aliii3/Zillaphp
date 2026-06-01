<?php

class GridStyle3 extends WP_Widget {

  	public function __construct() {
    	$widget_options = array(
			'classname' => 'GridStyle3',
    		'description' => 'Grid adds to 2 sections'
    	);
    	parent::__construct(
      		'GridStyle3',
      		'WK - Grid Style 3',
      		$widget_options
    	);

		if ( is_active_widget(false, false, $this->id_base) ){
			add_action( 'wp_head', array(&$this, 'add_styles_and_scripts') );
		}
  	}

	function add_styles_and_scripts(){
		wp_enqueue_style( 'grid_style_3', THEME_DIR_URI .'/dist/css/grid-style-3.css', array(), '1', 'all' );
	}
	public function widget($args, $instance) {
		wp_enqueue_style( 'grid_style_3', THEME_DIR_URI .'/dist/css/grid-style-3.css', array(), '1', 'all' );

		if($instance['card_title_1'] || $instance['card_title_2']):
			echo '
				<section class="grid_style_3">
					<div class="container">
						<div class="section_intro">';
							echo $instance['section_title']? '<h3 class="section_title">'.$instance['section_title'].'</h3>' : '';
							echo $instance['section_subtitle']? '<p class="section_subtitle">'.$instance['section_subtitle'].'</p>' : ''; echo '
						</div>';

						if ($instance['card_title_1'] || $instance['card_title_2']):echo '
							<div class="row">
								<div class="card_item col-lg-6">';
									if($instance['card_img_1']):
										echo '<img src="'.$instance['card_img_1'].'" alt="'.image_alt_by_url($instance['card_img_1']).'">';
									endif;
									echo $instance['card_title_1']? '<h4>'.$instance['card_title_1'].'</h4>':'';
									echo $instance['card_text_1']? '<p>'.$instance['card_text_1'].'</p>':'';
									echo $instance['btn_text_1']? '<a class="btn btn-secondary btn-icon-arrow_right-colored" href="'.$instance['btn_url_1'].'" title="'.$instance['btn_text_1'].'">'.$instance['btn_text_1'].'</a>':'';
									echo '
								</div>

								<div class="card_item col-lg-6">';
									if($instance['card_img_2']):
										echo '<img src="'.$instance['card_img_2'].'" alt="'.image_alt_by_url($instance['card_img_2']).'">';
									endif;
									echo $instance['card_title_2']? '<h4>'.$instance['card_title_2'].'</h4>':'';
									echo $instance['card_text_2']? '<p>'.$instance['card_text_2'].'</p>':'';
									echo $instance['btn_text_2']? '<a class="btn btn-secondary btn-icon-arrow_right-colored" href="'.$instance['btn_url_2'].'" title="'.$instance['btn_text_2'].'">'.$instance['btn_text_2'].'</a>':'';
									echo '
								</div>
							</div>';
						endif; echo'
					</div>
				</section>
			';
		endif;
	}

  	public function form($instance) {
		$section_title = !empty($instance['section_title']) ? $instance['section_title'] : '';
		$section_subtitle = !empty($instance['section_subtitle']) ? $instance['section_subtitle'] : '';

		// card 1 data
		$card_title_1 = !empty($instance['card_title_1']) ? $instance['card_title_1'] : '';
		$card_text_1 = !empty($instance['card_text_1']) ? $instance['card_text_1'] : '';
		$btn_text_1 = !empty($instance['btn_text_1']) ? $instance['btn_text_1'] : '';
		$btn_url_1 = !empty($instance['btn_url_1']) ? $instance['btn_url_1'] : '';

		// card 2 data
		$card_title_2 = !empty($instance['card_title_2']) ? $instance['card_title_2'] : '';
		$card_text_2 = !empty($instance['card_text_2']) ? $instance['card_text_2'] : '';
		$btn_text_2 = !empty($instance['btn_text_2']) ? $instance['btn_text_2'] : '';
		$btn_url_2 = !empty($instance['btn_url_2']) ? $instance['btn_url_2'] : '';
		?>

		<p>
			<label for="<?php echo $this->get_field_id('section_title'); ?>">Section title:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('section_title'); ?>" name="<?php echo $this->get_field_name('section_title'); ?>" value="<?php echo esc_attr($section_title); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('section_subtitle'); ?>">Section subtitle:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('section_subtitle'); ?>" name="<?php echo $this->get_field_name('section_subtitle'); ?>" value="<?php echo esc_attr($section_subtitle); ?>" />
		</p>

		<!-- card 1 data -->

		<h2>Card 1</h2>

		<p>
			<label for="<?php echo $this->get_field_id('card_title_1'); ?>">Card 1 title:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('card_title_1'); ?>" name="<?php echo $this->get_field_name('card_title_1'); ?>" value="<?php echo esc_attr($card_title_1); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('card_text_1'); ?>">Card 1 Text:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('card_text_1'); ?>" name="<?php echo $this->get_field_name('card_text_1'); ?>" value="<?php echo esc_attr($card_text_1); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('btn_text_1'); ?>">Card 1 Button Text:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('btn_text_1'); ?>" name="<?php echo $this->get_field_name('btn_text_1'); ?>" value="<?php echo esc_attr($btn_text_1); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('btn_url_1'); ?>">Card 1 Button URL:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('btn_url_1'); ?>" name="<?php echo $this->get_field_name('btn_url_1'); ?>" value="<?php echo esc_attr($btn_url_1); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('card_img_1'); ?>">Card Image 1:</label><br />
			<?php
				if ($instance['card_img_1'] != '') :
					echo '<img class="custom_media_image" src="' . $instance['card_img_1'] . '" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" /><br />';
				endif;
			?>
			<input type="text" class="widefat custom_media_url" name="<?php echo $this->get_field_name('card_img_1'); ?>" id="<?php echo $this->get_field_id('card_img_1'); ?>" value="<?php echo $instance['card_img_1']; ?>">
			<input type="button" class="button button-primary custom_media_button" id="custom_media_button" name="<?php echo 'button' + $this->get_field_name('card_img_1'); ?>" value="Upload Image" style="margin-top:5px;" />
		</p>

		<!-- card 2 data -->

		<h2>Card 2</h2>

		<p>
			<label for="<?php echo $this->get_field_id('card_title_2'); ?>">Card 2 title:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('card_title_2'); ?>" name="<?php echo $this->get_field_name('card_title_2'); ?>" value="<?php echo esc_attr($card_title_2); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('card_text_2'); ?>">Card 2 Text:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('card_text_2'); ?>" name="<?php echo $this->get_field_name('card_text_2'); ?>" value="<?php echo esc_attr($card_text_2); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('btn_text_2'); ?>">Card 2 Button Text:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('btn_text_2'); ?>" name="<?php echo $this->get_field_name('btn_text_2'); ?>" value="<?php echo esc_attr($btn_text_2); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('btn_url_2'); ?>">Card 2 Button URL:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('btn_url_2'); ?>" name="<?php echo $this->get_field_name('btn_url_2'); ?>" value="<?php echo esc_attr($btn_url_2); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('card_img_2'); ?>">Card Image 2:</label><br />
			<?php
				if ($instance['card_img_2'] != '') :
					echo '<img class="custom_media_image" src="' . $instance['card_img_2'] . '" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" /><br />';
				endif;
			?>
			<input type="text" class="widefat custom_media_url" name="<?php echo $this->get_field_name('card_img_2'); ?>" id="<?php echo $this->get_field_id('card_img_2'); ?>" value="<?php echo $instance['card_img_2']; ?>">
			<input type="button" class="button button-primary custom_media_button" id="custom_media_button" name="<?php echo 'button' + $this->get_field_name('card_img_2'); ?>" value="Upload Image" style="margin-top:5px;" />
		</p> <?php
	}

	public function update($new_instance, $old_instance) {
		$instance = $old_instance;

		$instance['section_title'] = strip_tags($new_instance['section_title']);
		$instance['section_subtitle'] = strip_tags($new_instance['section_subtitle']);

		// card 1 data
		$instance['card_title_1'] = strip_tags($new_instance['card_title_1']);
		$instance['card_text_1'] = strip_tags($new_instance['card_text_1']);
		$instance['btn_text_1'] = strip_tags($new_instance['btn_text_1']);
		$instance['btn_url_1'] = strip_tags($new_instance['btn_url_1']);
		$instance['card_img_1'] = strip_tags($new_instance['card_img_1']);

		// card 2 data
		$instance['card_title_2'] = strip_tags($new_instance['card_title_2']);
		$instance['card_text_2'] = strip_tags($new_instance['card_text_2']);
		$instance['btn_text_2'] = strip_tags($new_instance['btn_text_2']);
		$instance['btn_url_2'] = strip_tags($new_instance['btn_url_2']);
		$instance['card_img_2'] = strip_tags($new_instance['card_img_2']);

		return $instance;
  	}
}
?>