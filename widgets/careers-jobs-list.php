<?php

class CareersJobsList extends WP_Widget {

  	public function __construct() {
    	$widget_options = array(
			'classname' => 'CareersJobsList',
    		'description' => 'Displaying last 3 jobs and button'
    	);
    	parent::__construct(
      		'CareersJobsList',
      		'WK - Careers Jobs List',
      		$widget_options
    	);
  	}

	public function widget($args, $instance) {

		$jobs = array(
			'post_type'  => 'jobpost',
			'posts_per_page' => 3,
		);

		$jobs_query = new WP_Query( $jobs );

		if($jobs_query->have_posts()){
			echo '
				<section class="careers_jobs_list">
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-lg-10">';

								while ( $jobs_query->have_posts() ) : $jobs_query->the_post();

									echo '
										<div class="list-data">
											<header>
												<div class="row align-items-center justify-content-between">
													<div class="col-lg-10">
														<span class="job_category">'; sjb_the_job_category(); echo '</span>';
														get_simple_job_board_template('listing/list-view/title.php');
														echo '<ul>';
															get_simple_job_board_template('listing/list-view/type.php');
															get_simple_job_board_template('listing/list-view/location.php');
															get_simple_job_board_template('listing/list-view/posted-date.php');
														echo '</ul>
													</div>

													<div class="col-lg-2">';
														get_simple_job_board_template('listing/list-view/apply-now.php');
													echo '
													</div>
												</div>
											</header>
										</div>
									';

								endwhile;
								wp_reset_query();
							echo '</div>
						</div>';


						if($jobs_query->found_posts > 3):
							echo '
								<div class="row justify-content-center">
									<a href="'.$instance['btn_url'].'" class="btn btn-primary btn-icon-arrow_right">'.$instance['btn_text'].'</a>
								</div>
							';
						endif;
						echo'
					</div>
				</section>
			';
		} else{
			if($instance['more_jobs_text'] || $instance['hr_email']){
				echo '
					<section class="more_jobs">
						<div class="container">
							<div class="row justify-content-center">
								<div class="col-lg-6">';
									if($instance['more_jobs_text']){
										echo '<p>'.$instance['more_jobs_text'].'</p>';
									}
									if($instance['hr_email']){
										echo '<a href="mailto:'.$instance['hr_email'].'">'.$instance['hr_email'].'</a>';
									} echo '
								</div>
							</div>
						</div>
					</section>
				';
			}
		}
	}

  	public function form($instance) {

		$btn_text = !empty($instance['btn_text']) ? $instance['btn_text'] : '';
		$btn_url = !empty($instance['btn_url']) ? $instance['btn_url'] : '';

		$more_jobs_text = !empty($instance['more_jobs_text']) ? $instance['more_jobs_text'] : '';
		$hr_email = !empty($instance['hr_email']) ? $instance['hr_email'] : '';

		?>

		<p>
			<label for="<?php echo $this->get_field_id('btn_text'); ?>">Button Text:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('btn_text'); ?>" name="<?php echo $this->get_field_name('btn_text'); ?>" value="<?php echo esc_attr($btn_text); ?>" />
		</p>


		<p>
			<label for="<?php echo $this->get_field_id('btn_url'); ?>">Button URL:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('btn_url'); ?>" name="<?php echo $this->get_field_name('btn_url'); ?>" value="<?php echo esc_attr($btn_url); ?>" />
		</p>

		<!-- more job details -->
		<p>
			<label for="<?php echo $this->get_field_id('more_jobs_text'); ?>">More Jobs Text:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('more_jobs_text'); ?>" name="<?php echo $this->get_field_name('more_jobs_text'); ?>" value="<?php echo esc_attr($more_jobs_text); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('hr_email'); ?>">HR Email:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('hr_email'); ?>" name="<?php echo $this->get_field_name('hr_email'); ?>" value="<?php echo esc_attr($hr_email); ?>" />
		</p>
		<?php
	}

	public function update($new_instance, $old_instance) {
		$instance = $old_instance;

		$instance['btn_text'] = strip_tags($new_instance['btn_text']);
		$instance['btn_url'] = strip_tags($new_instance['btn_url']);

		$instance['more_jobs_text'] = strip_tags($new_instance['more_jobs_text']);
		$instance['hr_email'] = strip_tags($new_instance['hr_email']);

		return $instance;
  	}
}
?>