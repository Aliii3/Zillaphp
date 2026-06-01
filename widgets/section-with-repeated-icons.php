<?php
/* Services Item Widget */
class SectionWithRepeatedIcons extends WP_Widget
{
    // php classnames and widget name/description added
    public function __construct()
    {
        $widget_options = array(
            'classname' => 'SectionWithRepeatedIcons',
            'description' => 'Grid Text With Icon v2',
        );
        parent::__construct(
            'SectionWithRepeatedIcons',
            'WK - Section With Repeated Icons',
            $widget_options
        );

		if ( is_active_widget(false, false, $this->id_base) ){
			add_action( 'wp_head', array(&$this, 'add_styles_and_scripts') );
		}
  	}

	function add_styles_and_scripts(){
		wp_enqueue_style( 'section_with_repeated_icons', THEME_DIR_URI .'/dist/css/text_with_icon/section-with-repeated-icons.css', array(), '1', 'all' );
	}

    // create the widget output
    public function widget($args, $instance)
    {
		wp_enqueue_style( 'section_with_repeated_icons', THEME_DIR_URI .'/dist/css/text_with_icon/section-with-repeated-icons.css', array(), '1', 'all' );
        echo '
			<section class="section_with_repeated_icons">
				<div class="container">
					<h2 class="section_subtitle">' . $instance['section_title'] . '</h2>';
					$count = 0;
					echo '<div class="row">';
					foreach ($instance as $key => $value) {
						if (substr($key, 0, 20) == 'item_title_repetable') {
							if ($instance[$key] != '') {
								echo '
									<div class="text_with_icon_item col-6 col-md-4">';
										if($instance['item_image_icon_repetable' . explode('item_title_repetable', $key)[1]]): echo '
											<div class="icon_wrapper">
												<img src="' . $instance['item_image_icon_repetable' . explode('item_title_repetable', $key)[1]] . '" alt="">
											</div>';
										endif; echo'
										<div class="text_wrapper">';
											if($instance['item_title_repetable' . explode('item_title_repetable', $key)[1]]): echo '
												<span>' . $instance['item_title_repetable' . explode('item_title_repetable', $key)[1]] . '</span>';
											endif;
											if($instance['item_subtitle_repetable' . explode('item_title_repetable', $key)[1]]): echo '
												<p>' . $instance['item_subtitle_repetable' . explode('item_title_repetable', $key)[1]] . '</p>';
											endif; echo'
										</div>
									</div>
								';
								$count++;
							}
						}
					};
				echo '</div>';
				if($instance['more_text']):
					echo '
						<div class="more_text">
							<span>'.$instance['more_text'].'</span>
						</div>
					';
				endif; echo'
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
		$more_text = !empty($instance['more_text']) ? $instance['more_text'] : '';?>

		<div class="form-group">
			<div class="customEditorParent">
				<label for="<?php echo $this->get_field_id('section_title'); ?>">Section Title:</label>
				<textarea class="customEditor w-100" id="<?php echo $this->get_field_id('section_title'); ?>" name="<?php echo $this->get_field_name('section_title'); ?>"><?php echo $instance['section_title']; ?></textarea>
			</div>

			<p>
				<label for="<?php echo $this->get_field_id('more_text'); ?>">More Text:</label>
				<input class="widefat" type="text" id="<?php echo $this->get_field_id('more_text'); ?>" name="<?php echo $this->get_field_name('more_text'); ?>" value="<?php echo esc_attr($more_text); ?>" />
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
										echo '<p>
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