<?php
// require the widgets
require get_template_directory() . '/widgets/hero-with-text-left-image-right.php';
require get_template_directory() . '/widgets/banner-style-1.php';
require get_template_directory() . '/widgets/banner-style-2.php';
require get_template_directory() . '/widgets/banner-style-3.php';
require get_template_directory() . '/widgets/partners.php';
require get_template_directory() . '/widgets/text-with-image-left.php';
require get_template_directory() . '/widgets/grid-style-1.php';
require get_template_directory() . '/widgets/grid-style-2.php';
require get_template_directory() . '/widgets/grid-style-3.php';

require get_template_directory() . '/widgets/grid-text-with-icon.php';
require get_template_directory() . '/widgets/form-with-sidenavigation.php';
require get_template_directory() . '/widgets/team-loop.php';
require get_template_directory() . '/widgets/section-intro-v1.php';

require get_template_directory() . '/widgets/careers-jobs-list.php';
require get_template_directory() . '/widgets/section-with-repeated-icons.php';
require get_template_directory() . '/widgets/content-with-image.php';

require get_template_directory() . '/widgets/locations.php';
require get_template_directory() . '/widgets/track-record.php';
require get_template_directory() . '/widgets/custom-video.php';
require get_template_directory() . '/widgets/custom-section-v1.php';
require get_template_directory() . '/widgets/custom-section-v2.php';
require get_template_directory() . '/widgets/associates.php';

function zc_register_widgets()
{
  	// register the widgets
	register_widget('HeroWithTextLeftImageRight');
	register_widget('BannerStyle1');
	register_widget('BannerStyle2');
	register_widget('BannerStyle3');
	register_widget('Partners');
	register_widget('TextWithImageLeft');
	register_widget('GridStyle1');
	register_widget('GridStyle2');
	register_widget('GridStyle3');
	register_widget('GridTextWithIcon');
	register_widget('FormWithSideNavigation');
	register_widget('Team');
	register_widget('SectionIntroV1');

	register_widget('CareersJobsList');
	register_widget('SectionWithRepeatedIcons');
	register_widget('ContentWithImage');

	register_widget('Locations');
	register_widget('TrackRecord');
	register_widget('CustomVideo');
	register_widget('CustomSectionV1');
	register_widget('CustomSectionV2');
	register_widget('associates');
}
add_action('widgets_init', 'zc_register_widgets');

// add admin scripts
add_action('admin_enqueue_scripts', 'ctup_wdscript');
add_action('siteorigin_panel_enqueue_admin_scripts', 'ctup_wdscript');

function ctup_wdscript() {
	wp_enqueue_media();
	// wp_enqueue_style('bootstrap', get_template_directory_uri() . '/dist/css/vendor/bootstrap.min.css');
	wp_enqueue_script('bootstrap_scripts', get_template_directory_uri() . '/dist/js/bootstrap.bundle.min.js', '', '', '1', true);
	wp_enqueue_script('widgets_script', get_template_directory_uri() . '/widgets/assets/widgets.js', false, '1.0', true);
	wp_enqueue_style( 'widget_style',get_template_directory_uri().'/widgets/assets/style-options.css' );
}

?>