<?php
class Locations extends WP_Widget {

  	public function __construct() {
    	$widget_options = array(
			'classname' => 'Locations',
    		'description' => 'Widget that display locations based on user input'
    	);
    	parent::__construct(
      		'Locations',
      		'WK - Locations',
      		$widget_options
    	);

		if ( is_active_widget(false, false, $this->id_base) ){
			add_action( 'wp_head', array(&$this, 'add_styles_and_scripts') );
		}
  	}

	function add_styles_and_scripts(){
		wp_enqueue_style( 'locations_style', THEME_DIR_URI .'/dist/css/locations.css', array(), '1', 'all' );
	}

	public function widget($args, $instance) {

		$headquarter_title = $instance['headquarter_title']? $instance['headquarter_title']: '';
		$headquarter_location_title = $instance['headquarter_location_title']? $instance['headquarter_location_title']: '';
		$headquarter_location = $instance['headquarter_location']? $instance['headquarter_location']: '';
		$map = $instance['map']? $instance['map']: '';
		$another_location_title = $instance['another_location_title']? $instance['another_location_title']: '';


		echo '
			<section class="locations">
				<div class="container">
					<div class="headquarter">
						<p>'.$headquarter_title.'</p>
						<h3>'.$headquarter_location_title.'</h3>
						<p>'.$headquarter_location.'</p>
					</div>

					'.$map.'


					<div class="another_locations">
						<p>'.$another_location_title.'</p>

						<ul class="another_locations_list">';
							$count = 0;
							foreach ($instance as $key => $value) {
								if (substr($key, 0, 23) == 'location_city_repetable' ) {
									echo '
										<li class="location_item">';
											if($instance['location_city_repetable' . explode('_repetable', $key)[1]]):
												echo '
													<h3>' . $instance['location_city_repetable' . explode('_repetable', $key)[1]] . '</h3>
												';
											endif;
											if($instance['location_country_repetable' . explode('_repetable', $key)[1]]):
												echo '
													<h4>' . $instance['location_country_repetable' . explode('_repetable', $key)[1]] . '</h4>
												';
											endif;
											echo'
										</li>
									';
									$count++;
								}
							};
							echo '
						</ul>
					</div>
				</div>
			</section>
		';
	}

	public function form($instance) {
		$headquarter_title = !empty($instance['headquarter_title']) ? $instance['headquarter_title'] : '';
		$headquarter_location_title = !empty($instance['headquarter_location_title']) ? $instance['headquarter_location_title'] : '';
		$headquarter_location = !empty($instance['headquarter_location']) ? $instance['headquarter_location'] : '';

		$map = !empty($instance['map']) ? $instance['map'] : '';

		$another_location_title = !empty($instance['another_location_title']) ? $instance['another_location_title'] : '';

		$item = !empty($instance) ? $instance : array(
            'location_city_repetable' => '',
            'location_country_repetable' => '',
        );

		?>

		<h2>Headquarter</h2>
		<p>
			<label for="<?php echo $this->get_field_id('headquarter_title'); ?>">Headquarter Title:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('headquarter_title'); ?>" name="<?php echo $this->get_field_name('headquarter_title'); ?>" value="<?php echo esc_attr($headquarter_title); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('headquarter_location_title'); ?>">Headquarter Location title:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('headquarter_location_title'); ?>" name="<?php echo $this->get_field_name('headquarter_location_title'); ?>" value="<?php echo esc_attr($headquarter_location_title); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('headquarter_location'); ?>">Headquarter Location:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('headquarter_location'); ?>" name="<?php echo $this->get_field_name('headquarter_location'); ?>" value="<?php echo esc_attr($headquarter_location); ?>" />
		</p>

		<h2>Google Map</h2>

		<p>
			<label for="<?php echo $this->get_field_id('map'); ?>">Map IFrame:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('map'); ?>" name="<?php echo $this->get_field_name('map'); ?>" value="<?php echo esc_attr($map); ?>" />
		</p>

		<h2>Other Locations</h2>

		<p>
			<label for="<?php echo $this->get_field_id('another_location_title'); ?>">Another Locations Title:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('another_location_title'); ?>" name="<?php echo $this->get_field_name('another_location_title'); ?>" value="<?php echo esc_attr($another_location_title); ?>" />
		</p>

		<div id="accordion" role="tablist">
            <?php
				$count = 0;

				foreach ($item as $key => $value) {
					if (substr($key, 0, 23) == 'location_city_repetable') {
						echo '<div class="card" id="card-item-' . $count . '">
							<div class="card-header" role="tab" id="headingOne">
								<h5 class="mb-0">
									<a data-toggle="collapse" href="#collapseOne' . $count . '" role="button" aria-expanded="false" aria-controls="collapseOne' . $count . '" style="float:left">
										Location
									</a>
									<div class="field-options">
										<a class="duplicate" href="#">Duplicate</a>
										<a class="remove" data-index=' . $count . ' href="#">Remove</a>
									</div>
								</h5>
							</div>

							<div id="collapseOne' . $count . '" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
								<div class="card-body">';}

									if (substr($key, 0, 23) == 'location_city_repetable') {
										echo '<p>
											<label>City:</label>
											<input class="widefat" type="text" id="' . $this->get_field_id($key) . '" name="' . $this->get_field_name($key) . '" value="' . $instance[$key] . '" />
										</p>';
									}
									if (substr($key, 0, 26) == 'location_country_repetable') {
										echo '<p>
											<label>Country:</label>
											<input class="widefat" type="text" id="' . $this->get_field_id($key) . '" name="' . $this->get_field_name($key) . '" value="' . $instance[$key] . '" />
										</p>
										</div>
									</div>
								</div>';
								}

							$count++;
						}
        			?>
				</div>

			<?php
	}

	public function update($new_instance, $old_instance) {
		return $new_instance;
	}
}
?>