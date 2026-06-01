<?php

/**
 * The template for displaying job content in list view within loops.
 *
 * Override this template by copying it to yourtheme/simple_job_board/v2/content-job-listing-list-view.php
 *
 * @author      PressTigers
 * @package     Simple_Job_Board
 * @subpackage  Simple_Job_Board/Templates
 * @version     2.0.0
 * @since       2.2.0
 * @since       2.2.3   Added @hook sjb_job_listing_heading_after.
 * @since       2.3.0   Added "sjb_list_view_template" filter.
 * @since       2.4.0   Revised whole HTML template
 */
ob_start();
global $post;

/**
 * Fires before job listing on job listing page.
 *
 * @since   2.2.0
 */
do_action('sjb_job_listing_list_view_before');
?>

<!-- Start Jobs List View
================================================== -->
<div class="col-lg-10">
<div class="list-data">
	<!-- Jobs List view header -->
	<header>
		<div class="row align-items-center">
			<div class="col-lg-10">
				<span class="job_category"><?php sjb_the_job_category(); ?></span>
				<?php
					/**
					 * Template -> Job Title & Company Name:
					 *
					 * - Job Title
					 * - Company Name
					 */
					get_simple_job_board_template('listing/list-view/title.php');
					?>
					<ul>
						<?php
						/**
						 * Template -> Type:
						 *
						 * - Job Type
						 */
						get_simple_job_board_template('listing/list-view/type.php');

						/**
						 * Template -> Location:
						 *
						 * - Job Location
						 */
						get_simple_job_board_template('listing/list-view/location.php');

						/**
						 * Template -> Posted Date:
						 *
						 * - Job Posted Date
						 */
						get_simple_job_board_template('listing/list-view/posted-date.php');
						?>
					</ul>
			</div>

			<div class="col-lg-2">

				<?php
					/**
					 * Template -> Apply Now:
					 *
					 * - Apply Now button
					 */
					get_simple_job_board_template('listing/list-view/apply-now.php');
				?>
			</div>
		</div>
	</header>

	<?php
	/**
	 * Template -> Short Description:
	 *
	 * - Job Description
	 */
	get_simple_job_board_template('listing/list-view/short-description.php');
	?>
</div>
</div>
<!-- ==================================================
End Jobs List View -->

<?php
/**
 * Fires after job listing on job listing page.
 *
 * @since   2.2.0
 */
do_action('sjb_job_listing_list_view_after');

$html_list_view = ob_get_clean();

/**
 * Modify the Job Listing List View Template.
 *
 * @since   2.3.0
 *
 * @param   html    $html_list_view   Job Listing List View HTML.
 */
echo apply_filters('sjb_list_view_template', $html_list_view);
