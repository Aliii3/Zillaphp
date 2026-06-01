<?php
/* Services Item Widget */
class GridTextWithIcon extends WP_Widget
{
    // php classnames and widget name/description added
    public function __construct()
    {
        $widget_options = array(
            'classname' => 'GridTextWithIcon',
            'description' => 'Grid Text With Icon',
        );
        parent::__construct(
            'GridTextWithIcon',
            'WK - Grid Text With Icon',
            $widget_options
        );

		if ( is_active_widget(false, false, $this->id_base) ){
			add_action( 'wp_head', array(&$this, 'add_styles_and_scripts') );
		}
  	}

	function add_styles_and_scripts(){
		wp_enqueue_style( 'grid_text_with_icon', THEME_DIR_URI .'/dist/css/text_with_icon/icon-with-text-grid.css', array(), '1', 'all' );
	}
    // create the widget output
    public function widget($args, $instance)
    {
		wp_enqueue_style( 'grid_text_with_icon', THEME_DIR_URI .'/dist/css/text_with_icon/icon-with-text-grid.css', array(), '1', 'all' );
        echo '
			<section class="text-with-icon-grid">
				<div class="container">
					<h2 class="section_title">' . $instance['section_title'] . '</h2>
					<p class="section_subtitle">' . $instance['section_subtitle'] . '</p>';
        $count = 0;
        echo '<div class="row">';
        foreach ($instance as $key => $value) {
            if (substr($key, 0, 20) == 'item_title_repetable') {
                if ($instance[$key] != '') {

                    echo '
									<div class="text_with_icon_item col-6 col-md-4">
										<div class="icon_wrapper">
											<img src="' . $instance['item_image_icon_repetable' . explode('item_title_repetable', $key)[1]] . '" alt="' . $instance['section_title'] . '">
										</div>
										<div class="text_wrapper">
											<span>' . $instance['item_title_repetable' . explode('item_title_repetable', $key)[1]] . '</span>
											<p>' . $instance['item_subtitle_repetable' . explode('item_title_repetable', $key)[1]] . '</p>
										</div>
									</div>
									';
                    $count++;
                }
            }
        };
        echo '</div>
						</div>
					</section>';
    }

    public function form($instance)
    {
        $item = !empty($instance) ? $instance : array(
            'item_title_repetable' => '',
            'item_subtitle_repetable' => '',
            'item_image_icon_repetable' => '',
        );

        $section_title = !empty($instance['section_title']) ? $instance['section_title'] : '';

        $section_subtitle = !empty($instance['section_subtitle']) ? $instance['section_subtitle'] : '';?>


		<div class="form-group">
			<p>
				<label for="<?php echo $this->get_field_id('section_title'); ?>">Section Title:</label>
				<input class="widefat" type="text" id="<?php echo $this->get_field_id('section_title'); ?>" name="<?php echo $this->get_field_name('section_title'); ?>" value="<?php echo esc_attr($section_title); ?>" />
			</p>

			<p>
				<label for="<?php echo $this->get_field_id('section_subtitle'); ?>">Section Subtitle:</label>
				<input class="widefat" type="text" id="<?php echo $this->get_field_id('section_subtitle'); ?>" name="<?php echo $this->get_field_name('section_subtitle'); ?>" value="<?php echo esc_attr($section_subtitle); ?>" />
			</p>
		</div>

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
            if (substr($key, 0, 23) == 'item_subtitle_repetable') {
                echo '<p>
											<label>Item Subtitle:</label>
											<input class="widefat" type="text" id="' . $this->get_field_id($key) . '" name="' . $this->get_field_name($key) . '" value="' . $instance[$key] . '" />
										</p>';
            }
            if (substr($key, 0, 25) == 'item_image_icon_repetable') {
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
        </div> <?php
}
    // Update database with new info
    public function update($new_instance, $old_instance)
    {
        return $new_instance;
    }
}
?>