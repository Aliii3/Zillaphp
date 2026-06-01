<?php

class BannerStyle2 extends WP_Widget {

  	public function __construct() {
    	$widget_options = array(
			'classname' => 'BannerStyle2',
    		'description' => 'Banner with heading, small text and call to action'
    	);
    	parent::__construct(
      		'BannerStyle2',
      		'WK - Banner Style 2',
      		$widget_options
    	);

		if ( is_active_widget(false, false, $this->id_base) ){
			add_action( 'wp_head', array(&$this, 'add_styles_and_scripts') );
		}
  	}

	function add_styles_and_scripts(){
		wp_enqueue_style( 'banner_style_2', THEME_DIR_URI .'/dist/css/banner-style-2.css', array(), '1', 'all' );
	}

	public function widget($args, $instance) {
		wp_enqueue_style( 'banner_style_2', THEME_DIR_URI .'/dist/css/banner-style-2.css', array(), '1', 'all' );
		echo '
			<section class="banner_style_2">
				<div class="container">
					<p class="section_subtitle">'.$instance['section_title'].'</p>
					<p class="section_content">'.$instance['content'].'</p>
					<a href="'.$instance['btn_url'].'" class="btn btn-primary btn-icon-arrow_right">'.$instance['btn_text'].'</a>
				</div>
			</section>
		';
	}

  	public function form($instance) {
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
		<?php
	}

	public function update($new_instance, $old_instance) {
		$instance = $old_instance;

		$instance['section_title'] = $new_instance['section_title'];

		$instance['btn_text'] = strip_tags($new_instance['btn_text']);
		$instance['btn_url'] = strip_tags($new_instance['btn_url']);

		$instance['content'] = $new_instance['content'];

		return $instance;
  	}
}
?>