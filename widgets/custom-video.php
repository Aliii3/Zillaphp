<?php

class CustomVideo extends WP_Widget {

  	public function __construct() {
    	$widget_options = array(
			'classname' => 'CustomVideo',
    		'description' => 'Widget display custom video from url'
    	);
    	parent::__construct(
      		'CustomVideo',
      		'WK - Custom Video',
      		$widget_options
    	);

		if ( is_active_widget(false, false, $this->id_base) ){
			add_action( 'wp_head', array(&$this, 'add_styles_and_scripts') );
		}
  	}

	function add_styles_and_scripts(){
		wp_enqueue_style( 'custom_video_style', THEME_DIR_URI .'/dist/css/custom_video.css', array(), '1' );
		wp_enqueue_script( 'custom_video_script', THEME_DIR_URI .'/dist/js/custom_video.bundle.js', array ( ) ,  '1', true);
	}

	public function widget($args, $instance) {
		wp_enqueue_style( 'custom_video_style', THEME_DIR_URI .'/dist/css/custom_video.css', array(), '1' );
		wp_enqueue_script( 'custom_video_script', THEME_DIR_URI .'/dist/js/custom_video.bundle.js', array ( ) ,  '1', true);

		echo'
			<section class="custom_video">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-12 col-lg-10">';

							if($instance['section_title'] || $instance['section_subtitle']){
								echo '
									<div class="section_intro">';
										echo $instance['section_title'] ? '<p class="section_title">'.$instance['section_title'].'</p>' : null;
										echo $instance['section_subtitle'] ? '<p class="section_subtitle">'.$instance['section_subtitle'].'</p>' : null; echo
									'</div>
								';
							}

							if($instance['video_url']){

								echo '
									<div class="video_player player">
										<div class="player_container">
											<div class="overlay" id="player_overlay">
												<button class="player_buttons" title="Toggle Play" id="player_buttons">
													<img class="play-icon" src="'.THEME_DIR_URI ."/dist/images/play_btn.svg".'" />
													<img class="pause-icon" src="'.THEME_DIR_URI ."/dist/images/pause-icon.svg".'" />
												</button>
											</div>
											<video
												class="player_video viewer"
												id="video"
												src="'.$instance['video_url'].'"';
												echo $instance['video_poster'] ? 'poster="'.$instance['video_poster'].'"' : ''; echo '
											>
											</video>

										</div>
									</div>
								';
							}
							echo $instance['section_content'] ? '<p class="section_content">'.$instance['section_content'].'</p>' : null; echo '
						</div>
					</div>
				</div>
			</section>
		';

	}

  	public function form($instance) {

		$section_title = !empty($instance['section_title']) ? $instance['section_title'] : '';

		$section_subtitle = !empty($instance['section_subtitle']) ? $instance['section_subtitle'] : '';

		$video_url = !empty($instance['video_url']) ? $instance['video_url'] : ''; ?>

		<h2>Section Intro</h2>

		<div class="customEditorParent">
			<label for="<?php echo $this->get_field_id('section_title'); ?>">Section Title:</label>
			<textarea class="customEditor w-100" id="<?php echo $this->get_field_id('section_title'); ?>" name="<?php echo $this->get_field_name('section_title'); ?>"><?php echo $instance['section_title']; ?></textarea>
		</div>

		<div class="customEditorParent">
			<label for="<?php echo $this->get_field_id('section_subtitle'); ?>">Section Sub Title:</label>
			<textarea class="customEditor w-100" id="<?php echo $this->get_field_id('section_subtitle'); ?>" name="<?php echo $this->get_field_name('section_subtitle'); ?>"><?php echo $instance['section_subtitle']; ?></textarea>
		</div>

		<h2>Video URL</h2>
		<p>Prefere to host video on another server or use Viemo</p>

		<p>
			<label for="<?php echo $this->get_field_id('video_url'); ?>">Video URl:</label>
			<input class="widefat" type="url" id="<?php echo $this->get_field_id('video_url'); ?>" name="<?php echo $this->get_field_name('video_url'); ?>" value="<?php echo esc_attr($video_url); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('video_poster'); ?>">Video Poster:</label><br />
			<?php
				if ($instance['video_poster'] != '') :
					echo '<img class="custom_media_image" src="' . $instance['video_poster'] . '" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" /><br />';
				endif;
			?>
			<input type="text" class="widefat custom_media_url" name="<?php echo $this->get_field_name('video_poster'); ?>" id="<?php echo $this->get_field_id('video_poster'); ?>" value="<?php echo $instance['video_poster']; ?>">
			<input type="button" class="button button-primary custom_media_button" id="custom_media_button" name="<?php echo 'button' + $this->get_field_name('video_poster'); ?>" value="Upload Image" style="margin-top:5px;" />
		</p>

		<h2>Section Content</h2>

		<div class="customEditorParent">
			<label for="<?php echo $this->get_field_id('section_content'); ?>">Section content:</label>
			<textarea class="customEditor w-100" id="<?php echo $this->get_field_id('section_content'); ?>" name="<?php echo $this->get_field_name('section_content'); ?>"><?php echo $instance['section_content']; ?></textarea>
		</div> <?php

	}

	public function update($new_instance, $old_instance) {
		$instance = $old_instance;

		$instance['section_title'] = $new_instance['section_title'];
		$instance['section_subtitle'] = $new_instance['section_subtitle'];
		$instance['video_url'] = $new_instance['video_url'];
		$instance['video_poster'] = $new_instance['video_poster'];
		$instance['section_content'] = $new_instance['section_content'];

		return $instance;
  	}
}
?>