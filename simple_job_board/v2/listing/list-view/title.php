<?php
/**
 * The template for displaying job title in list view
 *
 * Override this template by copying it to yourtheme/simple_job_board/listing/list-view/title.php
 *
 * @author      PressTigers
 * @package     Simple_Job_Board
 * @subpackage  Simple_Job_Board/templates/listing/list-view
 * @version     1.0.0
 * @since       2.2.3
 * @since       2.3.0   Added "sjb_list_view_title_template" filter.
 */
ob_start();
?>

<h3 class="job-title">
	<a href="<?php the_permalink();?>" title="<?php sjb_the_title(); ?>">
		<?php sjb_the_title() ?>
	</a>
</h3>

<?php

$html = ob_get_clean();

/**
 * Modify the Job Listing -> Job Title Template.
 *
 * @since   2.3.0
 *
 * @param   html    $html   Job Title HTML.
 */
echo apply_filters( 'sjb_list_view_title_template', $html );
