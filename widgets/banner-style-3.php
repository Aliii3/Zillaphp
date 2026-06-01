<?php

class BannerStyle3 extends WP_Widget {

  	public function __construct() {
    	$widget_options = array(
			'classname' => 'BannerStyle3',
    		'description' => 'Banner that will retrieve contact data'
    	);
    	parent::__construct(
      		'BannerStyle3',
      		'WK - Banner Style 3',
      		$widget_options
    	);

		if ( is_active_widget(false, false, $this->id_base) ){
			add_action( 'wp_head', array(&$this, 'add_styles_and_scripts') );
		}
  	}

	function add_styles_and_scripts(){
		wp_enqueue_style( 'banner_style_3', THEME_DIR_URI .'/dist/css/banner-style-3.css', array(), '1', 'all' );
	}

	public function widget($args, $instance) {

		echo '
			<section class="banner_style_3">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-12 col-lg-3">
							<h3>Email Address</h3>
							<a href="mailto:'.get_option('email').'">'.get_option('email').'</a>
						</div>
						<div class="col-12 col-lg-3">
							<h3>Landline Phone Number</h3>
							<a href="tel:'.get_option('phone_number').'">'.get_option('phone_number').'</a>
						</div>
						<div class="col-12 col-lg-2">
							<h3>Follow Us</h3>
							<ul class="social-media">';

								if(get_option('linkedin')):
									echo '
										<li>
											<a href="'.get_option('linkedin').'" title="linkedin" target="_blank" rel="noopener">
												<svg xmlns="http://www.w3.org/2000/svg" width="18.842" height="18.842" viewBox="0 0 18.842 18.842">
													<path fill="#102649" d="M17.5 2.25H1.342A1.352 1.352 0 0 0 0 3.608v16.125a1.352 1.352 0 0 0 1.342 1.358H17.5a1.355 1.355 0 0 0 1.346-1.358V3.608A1.355 1.355 0 0 0 17.5 2.25zM5.695 18.4H2.9V9.408h2.8V18.4zM4.3 8.18a1.619 1.619 0 1 1 1.617-1.619A1.62 1.62 0 0 1 4.3 8.18zM16.163 18.4H13.37v-4.374c0-1.043-.021-2.385-1.451-2.385-1.455 0-1.678 1.136-1.678 2.309v4.45H7.448V9.408h2.679v1.228h.038a2.941 2.941 0 0 1 2.645-1.451c2.826 0 3.352 1.863 3.352 4.286z" transform="translate(0 -2.25)"/>
												</svg>
											</a>
										</li>
									';
								endif;

								if(get_option('youtube')):
									echo '
										<li>
											<a href="'. get_option('youtube').'" title="youtube" target="_blank" rel="noopener">
												<svg xmlns="http://www.w3.org/2000/svg" width="23.301" height="16.314" viewBox="0 0 23.301 16.314">
													<path fill="#102649" d="M22.821-3.529a2.919 2.919 0 0 0-2.054-2.054c-1.823-.5-9.117-.5-9.117-.5s-7.293 0-9.117.48A2.978 2.978 0 0 0 .481-3.529 30.759 30.759 0 0 0 0 2.075a30.646 30.646 0 0 0 .48 5.6 2.92 2.92 0 0 0 2.054 2.058c1.842.5 9.117.5 9.117.5s7.293 0 9.117-.48A2.919 2.919 0 0 0 22.822 7.7a30.769 30.769 0 0 0 .48-5.6 29.2 29.2 0 0 0-.48-5.624zM9.329 5.568v-6.986l6.065 3.493zm0 0" transform="translate(-.001 6.082)"/>
												</svg>
											</a>
										</li>
									';
								endif;

								if(get_option('linkedin')):
									echo '
										<li>
											<a href="'. get_option('facebook').'" title="facebook" target="_blank" rel="noopener">
												<svg xmlns="http://www.w3.org/2000/svg" width="9.696" height="18.567" viewBox="0 0 9.696 18.567">
													<path fill="#102649" fill-rule="evenodd" d="M86.292 18.567v-8.458h2.888l.413-3.3h-3.3V4.745c0-.928.309-1.65 1.65-1.65H89.7V.1c-.413 0-1.444-.1-2.579-.1a3.982 3.982 0 0 0-4.229 4.332v2.476H80v3.3h2.888v8.459z" transform="translate(-80)"/>
												</svg>
											</a>
										</li>
									';
								endif; echo '
							</ul>
						</div>
					</div>
				</div>
			</section>
		';
	}

  	public function form($instance) {

	}

	public function update($new_instance, $old_instance) {

  	}
}
?>