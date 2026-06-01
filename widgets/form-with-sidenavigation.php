<?php

class FormWithSideNavigation extends WP_Widget {

  	public function __construct() {
    	$widget_options = array(
			'classname' => 'FormWithSideNavigation',
    		'description' => 'Form with sticky side navigation'
    	);
    	parent::__construct(
      		'FormWithSideNavigation',
      		'WK - Form With Side Navigation',
      		$widget_options
    	);

		if ( is_active_widget(false, false, $this->id_base) ){
			add_action( 'wp_head', array(&$this, 'add_styles_and_scripts') );
		}
  	}

	function add_styles_and_scripts(){
		wp_enqueue_style( 'form_indicator_style', THEME_DIR_URI .'/dist/css/form/form_indicator.css', array(), '1' );
		wp_enqueue_style( 'repeatable_fields_style', THEME_DIR_URI .'/dist/css/form/repeatable_fields.css', array(), '1' );
		wp_enqueue_script( 'form_indicator_script', THEME_DIR_URI .'/dist/js/form_indicator.bundle.js', array ( ) ,  '1', true);
		wp_enqueue_script( 'repeatable_CF7_script', THEME_DIR_URI .'/dist/js/repeatable_cf7.bundle.js', array ( ) ,  '1', true);
	}

	public function widget($args, $instance) {

		echo '
			<section class="form-with-sidenavigation">
				<div class="container">
					<div class="row">
						<div class="col-lg-3">
							<aside class="form_indicator">
								<ul>
									<li data-section="card_1" class="active"><span></span><a href="#">Contact Information</a></li>
									<li data-section="card_2"><span></span><a href="#">Experience Highlights</a></li>
									<li data-section="card_3"><span></span><a href="#">Proposed Scope of Work</a></li>
									<li data-section="card_4"><span></span><a href="#">Additional Documents</a></li>
								</ul>
							</aside>
						</div>
						<div class="col-lg-9">';
							echo do_shortcode(sprintf( '%s', $instance['form_shortcode'] ));

						echo '
						</div>
					</div>
				</div>
			</section>
		';
	}

  	public function form($instance) { ?>

		<div class="customEditorParent">
			<label for="<?php echo $this->get_field_id('form_shortcode'); ?>">Form Shortcode</label>
			<textarea class="customEditor w-100" id="<?php echo $this->get_field_id('form_shortcode'); ?>" name="<?php echo $this->get_field_name('form_shortcode'); ?>"><?php echo $instance['form_shortcode']; ?></textarea>
		</div>

		<?php
	}

	public function update($new_instance, $old_instance) {
		$instance = $old_instance;

		$instance['form_shortcode'] = $new_instance['form_shortcode'];

		return $instance;
  	}
}
?>