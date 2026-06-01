<?php

class SectionIntroV1 extends WP_Widget {

  	public function __construct() {
    	$widget_options = array(
			'classname' => 'SectionIntroV1',
    		'description' => 'Section intro version 1 contains 3 editors for title, subtitle and content'
    	);
    	parent::__construct(
      		'SectionIntroV1',
      		'WK - Section Intro V1',
      		$widget_options
    	);

		if ( is_active_widget(false, false, $this->id_base) ){
			add_action( 'wp_head', array(&$this, 'add_styles_and_scripts') );
		}
  	}

	function add_styles_and_scripts(){
		wp_enqueue_style( 'section_intro_v1', THEME_DIR_URI .'/dist/css/section_intro_v1.css', array(), '1', 'all' );
	}

	public function widget($args, $instance) {
		wp_enqueue_style( 'section_intro_v1', THEME_DIR_URI .'/dist/css/section_intro_v1.css', array(), '1', 'all' );

		$spacing_controller =  $instance['section_title'] && $instance['section_subtitle'] && ! $instance['section_content'] ? "no_section_content" : '';

		echo '
			<section class="section_intro_v1 '.$spacing_controller.'">
				<div class="container">';
					if($instance['section_title']):
						echo '<h3 class="section_title">'.$instance['section_title'].'</h3>';
					endif;

					if($instance['section_subtitle']):
						echo '<h3 class="section_subtitle">'.$instance['section_subtitle'].'</h3>';
					endif;

					if($instance['section_content']):
						echo '<div class="section_content">'.$instance['section_content'].'</div>';
					endif; echo '
				</div>
			</section>
		';
	}

  	public function form($instance) {
		?>

		<div class="customEditorParent">
			<label for="<?php echo $this->get_field_id('section_title'); ?>">Section Title</label>
			<textarea class="customEditor w-100" id="<?php echo $this->get_field_id('section_title'); ?>" name="<?php echo $this->get_field_name('section_title'); ?>"><?php echo $instance['section_title']; ?></textarea>
		</div>

		<div class="customEditorParent">
			<label for="<?php echo $this->get_field_id('section_subtitle'); ?>">Section Subtitle</label>
			<textarea class="customEditor w-100" id="<?php echo $this->get_field_id('section_subtitle'); ?>" name="<?php echo $this->get_field_name('section_subtitle'); ?>"><?php echo $instance['section_subtitle']; ?></textarea>
		</div>

		<div class="customEditorParent">
			<label for="<?php echo $this->get_field_id('section_content'); ?>">Section content</label>
			<textarea class="customEditor w-100" id="<?php echo $this->get_field_id('section_content'); ?>" name="<?php echo $this->get_field_name('section_content'); ?>"><?php echo $instance['section_content']; ?></textarea>
		</div> <?php
	}

	public function update($new_instance, $old_instance) {
		$instance = $old_instance;

		$instance['section_title'] = $new_instance['section_title'];
		$instance['section_subtitle'] = $new_instance['section_subtitle'];
		$instance['section_content'] = $new_instance['section_content'];

		return $instance;
  	}
}
?>