<?php

/**
 * Single view Job Fetures
 *
 * Override this template by copying it to yourtheme/simple_job_board/v2/single-jobpost/job-features.php
 *
 * @author 	PressTigers
 * @package     Simple_Job_Board
 * @subpackage  Simple_Job_Board/Templates
 * @version     2.0.0
 * @since       2.1.0
 * @since       2.2.2   Added "sjb_job_features" filter.
 * @since       2.2.3   Modified the @hooks placement.
 * @since       2.3.0   Added "sjb_job_features_template" filter.
 * @since       2.4.0   Revised whole HTML template
 */
ob_start();
global $post;

/**
 * Fires before displaying job features on job detail page .
 *
 * @since 2.1.0
 */
do_action("sjb_job_features_before");
?>


<?php
/**
 * Fires after displaying job features on job detail page.
 *
 * @since   2.1.0
 */
do_action("sjb_job_features_after");

$html_job_features = ob_get_clean();

/**
 * Modify the Job Feature Template.
 *
 * @since   2.3.0
 *
 * @param  html $html_job_features Job Features HTML.
 */
echo apply_filters('sjb_job_features_template', $html_job_features);
