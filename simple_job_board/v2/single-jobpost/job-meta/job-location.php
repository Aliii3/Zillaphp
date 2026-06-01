<?php
/**
 * The template for displaying job location
 *
 * Override this template by copying it to yourtheme/simple_job_board/v2/single-jobpost/job-meta/job-location.php
 *
 * @author      PressTigers
 * @package     Simple_Job_Board
 * @subpackage  Simple_Job_Board/templates/single-jobpost/job-meta
 * @version     2.0.0
 * @since       2.2.3
 * @since       2.3.0   Added "sjb_job_meta_job_location_template" filter.
 * @since       2.4.0   Revised whole HTML structure
 */
ob_start();
?>

<!-- Start Job Location <i class="fa fa-map-marker"></i>
================================================== -->
<?php if ($job_location = sjb_get_the_job_location()) {
	?>
	<li><img src="<?php echo THEME_DIR_URI . '/dist/images/outlined-pin.svg' ?>" alt="location pin"><?php sjb_the_job_location(); ?></li>
<?php } ?>
<!-- ==================================================
End Job Location -->

<?php
$html_job_location = ob_get_clean();

/**
 * Modify the Job Meta - Job Location Template.
 *
 * @since   2.3.0
 *
 * @param   html    $html_job_location   Job Location HTML.
 */
echo apply_filters( 'sjb_job_meta_job_location_template', $html_job_location );
