<?php
/**
 * The Template for displaying job details
 *
 * Override this template by copying it to yourtheme/simple_job_board/single-jobpost.php
 *
 * @author      PressTigers
 * @package     Simple_Job_Board
 * @subpackage  Simple_Job_Board/Templates
 * @version     1.1.0
 * @since       2.2.0
 * @since       2.2.3   Enqueued Front Styles & Revised the HTML structure.
 * @since       2.2.4   Enqueued Front end Scripts.
 * @since       2.3.0   Added "sjb_archive_template" filter.
 */
get_header();

ob_start();
global $post;

/**
 * Enqueue Frontend Scripts.
 *
 * @since   2.2.4
 */
do_action('sjb_enqueue_scripts');


if (FALSE !== get_option('job_post_layout_settings')) {
    $jobpost_layout_option = get_option('job_post_layout_settings');
    if ('job_post_layout_version_one' === $jobpost_layout_option)
        $job_class = 'v1';

    if ('job_post_layout_version_two' === $jobpost_layout_option)
        $job_class = 'v2';
} else {
    $job_class = 'v1';
}

?>

<!-- Start Content Wrapper
================================================== -->
<main>
	<div class="container">
		<?php
			while ( have_posts() ) : the_post();
				/**
				 * Template -> Content Single Job Listing:
				 *
				 * - Company Meta
				 * - Job Description
				 * - Job Features
				 * - Job Application Form
				 */
				the_content();
			endwhile;
		?>
	</div>
</main>
<!-- ==================================================
End Content Wrapper -->

<?php

$html_single = ob_get_clean();

/**
 * Modify the Jobs Archive Page Template.
 *
 * @since   2.3.0
 *
 * @param   html    $html_archive   Jobs Archive Page HTML.
 */
echo apply_filters('sjb_single_template', $html_single);

get_footer();