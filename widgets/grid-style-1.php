<?php

class GridStyle1 extends WP_Widget
{

    public function __construct()
    {
        $widget_options = array(
            'classname' => 'GridStyle1',
            'description' => 'Grid style 1',
        );
        parent::__construct(
            'GridStyle1',
            'WK - Grid style 1',
            $widget_options
        );

		if ( is_active_widget(false, false, $this->id_base) ){
			add_action( 'wp_head', array(&$this, 'add_styles_and_scripts') );
		}
  	}

	function add_styles_and_scripts(){
		echo "A test of loading styles";
		wp_enqueue_style( 'grid_style_1', THEME_DIR_URI .'/dist/css/grid-style-1.css', array(), '1', 'all' );
	}

    public function widget($args, $instance)
    {
		wp_enqueue_style( 'grid_style_1', THEME_DIR_URI .'/dist/css/grid-style-1.css', array(), '1', 'all' );
        echo '
			<section class="grid-style-1">
				<div class="container">
					<h2 class="section_title">' . $instance['section_title'] . '</h2>
					<p class="section_subtitle">' . $instance['section_subtitle'] . '</p>

					<div class="items row" style="//margin-left: -100px; //margin-right: -100px;">';
        $count = 0;

        foreach ($instance as $key => $value) {
            if (substr($key, 0, 20) == 'item_title_repetable') {
                if ($instance[$key] != '') {

                    echo '
									<div class="item col-md-6 col-lg-3">
										<div class="image-wrapper" style="height: 240px">
											<img src="' . $instance['item_image_repetable' . explode('item_title_repetable', $key)[1]] . '" alt="" class="clip-shield-svg" style="height: 241px;">
											<svg class="svg">
												<clipPath id="shield-clip-path" clipPathUnits="objectBoundingBox"><path d="M0.999,0.001,1,0 H0 L0.001,0.001 V0.536 s-0.037,0.342,0.499,0.464 l0,0,0,0,0,0,0,0 c0.536,-0.121,0.499,-0.464,0.499,-0.464"></path></clipPath>
											</svg>
											<div class="overlay clip-shield-svg">';

												$first_text = $instance['item_overlay_text1_repetable' . explode('item_title_repetable', $key)[1]];

												$first_text_arr = explode(' ', trim($first_text));
												$last_word_of_first = array_pop($first_text_arr);

												$second_text = $instance['item_overlay_text2_repetable' . explode('item_title_repetable', $key)[1]];
												$second_text_arr = explode(' ', trim($second_text));
												$last_word_of_second = array_pop($second_text_arr);

												$third_text = $instance['item_overlay_text3_repetable' . explode('item_title_repetable', $key)[1]];
												$third_text_arr = explode(' ', trim($third_text));
												$last_word_of_third = array_pop($third_text_arr); echo '
												<ul style="margin-top: 25px;">';
													if($first_text):
														echo'<li>' . join(' ', $first_text_arr) . ' <span>' . $last_word_of_first . '</span></li>';
													endif;
													if($second_text):
														echo '<li>' . join(' ', $second_text_arr) . ' <span>' . $last_word_of_second . '</span></li>';
													endif;
													if($third_text):
														echo'<li>' . join(' ', $third_text_arr) . ' <span>' . $last_word_of_third . '</span></li>';
													endif; echo'
												</ul>
											</div>
										</div>

										<div class="content-wrapper">';
											$title = $instance['item_title_repetable' . explode('item_title_repetable', $key)[1]];
											$title_arr = explode(' ', trim($title));
											$first_word = array_shift($title_arr);
											echo '<h3>' . $first_word . '<span>' . join(' ', $title_arr) . '</span></h3>
											<a href="' . $instance['item_btn_url_repetable' . explode('item_title_repetable', $key)[1]] . '">' . $instance['item_btn_text_repetable' . explode('item_title_repetable', $key)[1]] . '<img src="' . get_template_directory_uri() . '/dist/images/right-arrow-colored.svg' . '" alt="right-arrow" ></a>
										</div>
									</div>
									';
                    $count++;
                }
            }
        };
        echo '
					</div>
				</div>
			</section>
		';
    }

    public function form($instance)
    {
        $section_title = !empty($instance['section_title']) ? $instance['section_title'] : '';
        $section_subtitle = !empty($instance['section_subtitle']) ? $instance['section_subtitle'] : '';

        $item = !empty($instance) ? $instance : array(
            'item_title_repetable' => '',
            'item_btn_text_repetable' => '',
            'item_btn_url_repetable' => '',
            'item_overlay_text1_repetable' => '',
            'item_overlay_text2_repetable' => '',
            'item_overlay_text3_repetable' => '',
            'item_image_repetable' => '',
        );?>

		<p>
			<label for="<?php echo $this->get_field_id('section_title'); ?>">Section Title:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('section_title'); ?>" name="<?php echo $this->get_field_name('section_title'); ?>" value="<?php echo esc_attr($section_title); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('section_subtitle'); ?>">Section subtitle:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('section_subtitle'); ?>" name="<?php echo $this->get_field_name('section_subtitle'); ?>" value="<?php echo esc_attr($section_subtitle); ?>" />
		</p>

		<div id="accordion" role="tablist">
            <?php
$count = 0;

        foreach ($item as $key => $value) {
            if (substr($key, 0, 20) == 'item_title_repetable') {
                echo '<div class="card" id="card-item-' . $count . '">
		      				<div class="card-header" role="tab" id="headingOne">
		        				<h5 class="mb-0">
		          					<a data-toggle="collapse" href="#collapseOne' . $count . '" role="button" aria-expanded="false" aria-controls="collapseOne' . $count . '" style="float:left">
		            					Item
									</a>
									<div class="field-options">
										<a class="duplicate" href="#">Duplicate</a>
										<a class="remove" data-index=' . $count . ' href="#">Remove</a>
									</div>
								</h5>
		      				</div>

		      				<div id="collapseOne' . $count . '" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
		        				<div class="card-body">';}

            if (substr($key, 0, 20) == 'item_title_repetable') {
                echo '<p>
											<label>Item Title:</label>
											<input class="widefat" type="text" id="' . $this->get_field_id($key) . '" name="' . $this->get_field_name($key) . '" value="' . $instance[$key] . '" />
										</p>';
            }
            if (substr($key, 0, 23) == 'item_btn_text_repetable') {
                echo '<p>
											<label>Item Button Text:</label>
											<input class="widefat" type="text" id="' . $this->get_field_id($key) . '" name="' . $this->get_field_name($key) . '" value="' . $instance[$key] . '" />
										</p>';
            }

            if (substr($key, 0, 22) == 'item_btn_url_repetable') {
                echo '<p>
											<label>Item Button URL :</label>
											<input class="widefat" type="url" id="' . $this->get_field_id($key) . '" name="' . $this->get_field_name($key) . '" value="' . $instance[$key] . '" />
										</p>';
            }
            if (substr($key, 0, 28) == 'item_overlay_text1_repetable') {
                echo '<p>
											<label>Item overlay text 1 :</label>
											<input class="widefat" type="text" id="' . $this->get_field_id($key) . '" name="' . $this->get_field_name($key) . '" value="' . $instance[$key] . '" />
										</p>';
            }
            if (substr($key, 0, 28) == 'item_overlay_text2_repetable') {
                echo '<p>
											<label>Item overlay text 2 :</label>
											<input class="widefat" type="text" id="' . $this->get_field_id($key) . '" name="' . $this->get_field_name($key) . '" value="' . $instance[$key] . '" />
										</p>';
            }
            if (substr($key, 0, 28) == 'item_overlay_text3_repetable') {
                echo '<p>
											<label>Item overlay text 3 :</label>
											<input class="widefat" type="text" id="' . $this->get_field_id($key) . '" name="' . $this->get_field_name($key) . '" value="' . $instance[$key] . '" />
										</p>';
            }
            if (substr($key, 0, 20) == 'item_image_repetable') {
                echo '

										<p>
										<label for="' . $this->get_field_id($key) . '">Item Image:</label><br />';

                if ($instance[$key] != ''):
                    echo '<img class="custom_media_image" src="' . $instance[$key] . '" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" /><br />';
                endif;
                echo '
											<input type="text" class="widefat custom_media_url" name="' . $this->get_field_name($key) . '" id="' . $this->get_field_id($key) . '" value="' . $instance[$key] . '">
											<input type="button" class="button button-primary custom_media_button" id="custom_media_button" name="button' . $this->get_field_name($key) . '" value="Upload Image" style="margin-top:5px;" />
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

    public function update($new_instance, $old_instance)
    {
        return $new_instance;
    }
}
?>