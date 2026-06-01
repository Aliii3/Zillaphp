<?php

define("THEME_DIR", get_template_directory());

define("THEME_DIR_URI", get_template_directory_uri());

require THEME_DIR . '/inc/theme_support.php' ;

require THEME_DIR . '/inc/cpt.php' ;
require THEME_DIR . '/inc/cpt_tax.php' ;
require THEME_DIR . '/inc/cpt_meta_boxes.php' ;

require THEME_DIR . '/widgets/widgets.php' ;
require THEME_DIR . '/inc/admin_functionalty.php' ;
require THEME_DIR . '/inc/wysiwyg-config.php' ;
require THEME_DIR . '/inc/cf7_repeatable_fields.php' ;
require THEME_DIR . '/inc/acf_fields.php' ;
require THEME_DIR . '/inc/ajax_filter.php' ;

		/* New Updates For Parsing Starts Here */
		
add_action('wp_ajax_parse_newsletter', 'parse_newsletter_callback');
function parse_newsletter_callback() {
    if (!isset($_POST['newsletter'])) {
        wp_send_json_error(['message' => 'No newsletter text provided']);
    }

    $newsletterText = sanitize_textarea_field($_POST['newsletter']);
    $parsedData = parse_newsletter_text($newsletterText);

    wp_send_json_success($parsedData);
}
	/* New Updates For Parsing Ends Here */
	
// ENQUEUE STYLES
function enqueue_styles() {

	/** ENQUEUE main theme styles **/
	wp_enqueue_style( 'main_theme_styles', THEME_DIR_URI .'/dist/css/main.css', array(), '1', 'all' );


	/**
	 * Page-specific Enqueue Styles
	 */
	if(is_singular('team')){
		wp_enqueue_style( 'single_team_style', THEME_DIR_URI .'/dist/css/single-team.css', array(), '1', 'all' );
	}

	if(is_404()){
		wp_enqueue_style( '404_style', THEME_DIR_URI .'/dist/css/not_found_page.css', array(), '1', 'all' );
	}

	if(!is_front_page()){
		wp_enqueue_style( 'internal_page_header', THEME_DIR_URI .'/dist/css/internal-page-header.css', array(), '1', 'all' );
	}

	if(is_singular('post') || is_singular('insights') || is_singular('blogs') || is_singular('reports') || is_archive()){
		wp_enqueue_style( 'single_page', THEME_DIR_URI .'/dist/css/single_post.css', array(), '1', 'all' );
	}

	if(is_singular('insights')){
		wp_enqueue_style( 'single_insight', THEME_DIR_URI .'/dist/css/single_insight.css', array(), '1', 'all' );
		wp_enqueue_style( 'single_insight', THEME_DIR_URI .'/dist/css/share.css', array(), '1', 'all' );
		wp_enqueue_style( 'single_insight', THEME_DIR_URI .'/dist/css/fonts.css', array(), '1', 'all' );
	}


	/**
	 * Specific Styles For those page IDs
	 * 5818 -> Archive Viewpoint
	 * 6087, 6094 -> Archive Insights (Reports & Publications)
	 */
	if(is_page(5818) || is_archive()){
		wp_enqueue_style( 'viewpoint_style', THEME_DIR_URI .'/dist/css/viewpoint.css', array(), '1', 'all' );
	}

	if(is_page(array(6087,6094,13002 )) || is_archive()){
		wp_enqueue_style( 'reports_insight_style', THEME_DIR_URI .'/dist/css/reports_insights_page.css', array(), '1', 'all' );
	}
}
add_action( 'wp_enqueue_scripts', 'enqueue_styles' );

// ENQUEUE SCRIPTS
function enqueue_scripts() {

	wp_enqueue_script('bootstrap_scripts', THEME_DIR_URI . '/dist/js/bootstrap.bundle.min.js', '', '', '1', true);

	/** ENQUEUE main theme styles **/
	wp_enqueue_script( 'main_theme_script', THEME_DIR_URI .'/dist/js/main.bundle.js', array('jquery', ), NULL, true );

	wp_deregister_script('simple-job-board-front-end');
	wp_dequeue_script( 'simple-job-board-front-end' );
	wp_dequeue_script( 'jquery-ui-datepicker' );

	wp_localize_script(
		'main_theme_script',
		'data',
		array(
			'theme_url' => THEME_DIR_URI,
			'ajax_url' => admin_url('admin-ajax.php'),
			'zc_nonce' => wp_create_nonce('zc_nonce')
		)
	);

	if(is_singular('jobpost')){

		wp_enqueue_script('jquery-ui-datepicker');
		wp_register_script( 'simple-job-board-override',  THEME_DIR_URI .'/dist/js/sjb_override.bundle.js', array('jquery', 'jquery-ui-datepicker'), true, true );
		wp_enqueue_script( 'simple-job-board-override');
		wp_localize_script(
			'simple-job-board-override',
			'application_form',
			array(
				'ajaxurl' => esc_js(
					admin_url('admin-ajax.php')
				),
				'setting_extensions' => is_array(
					get_option('job_board_upload_file_ext')) ? array_map('esc_js', get_option('job_board_upload_file_ext')) : esc_js(get_option('job_board_upload_file_ext')
				),
				'all_extensions_check' => esc_js(
					get_option('job_board_all_extensions_check')
				),
				'allowed_extensions' => is_array(
					get_option('job_board_allowed_extensions')) ? array_map('esc_js', get_option('job_board_allowed_extensions')) : esc_js(get_option('job_board_allowed_extensions')
				),
				'job_listing_content' => esc_js(
					get_option('job_board_listing')
				),
				'jobpost_content' => esc_js(
					get_option('job_board_jobpost_content')
				),
				'jquery_alerts' => array(
					'invalid_extension' => apply_filters(
						'sjb_invalid_file_ext_alert',
						esc_html__(
							'This is not an allowed file extension.',
							'simple-job-board'
						)
					),
					'application_not_submitted' => apply_filters(
						'sjb_job_not_submitted_alert',
						esc_html__(
							'Your application could not be processed.',
							'simple-job-board'
						)
					),
				),
				'file' => array(
					// 'browse' => esc_html__('', 'simple-job-board'),
					// 'no_file_chosen' => esc_html__('No file chosen', 'simple-job-board'),
				),
			)
		);
	}

	if(is_page(array(6087,6094,13002 ))){
		wp_enqueue_script( 'ajax_filter', THEME_DIR_URI .'/dist/js/ajax_filter.bundle.js', array('jquery' ), NULL, true );
	}
}

add_action( 'wp_enqueue_scripts', 'enqueue_scripts' );

if ( ! function_exists( 'zc_register_nav_menu' ) ) {

    function zc_register_nav_menu(){
        register_nav_menus( array(
            'primary_menu' => __( 'Primary Menu', 'zilla-capital' ),
			'footer_menu_1'  => __( 'Footer Menu 1', 'zilla-capital' ),
			'footer_menu_2'  => __( 'Footer Menu 2', 'zilla-capital' ),
			'footer_menu_3'  => __( 'Footer Menu 3', 'zilla-capital' ),
			'footer_menu_bottom_area'  => __( 'Footer Bottom Area Menu', 'zilla-capital' ),
        ) );
    }
    add_action( 'after_setup_theme', 'zc_register_nav_menu', 0 );
}

function exclude_sub_category( $query ) {

	$query->set( 'cat', '-17' );
	return $query;
	
}
add_filter( 'pre_get_posts', 'exclude_sub_category' );

/**
 * Exclude a post type from XML sitemaps.
 *
 * @param boolean $excluded  Whether the post type is excluded by default.
 * @param string  $post_type The post type to exclude.
 *
 * @return bool Whether or not a given post type should be excluded.
 */
function sitemap_exclude_post_type( $excluded, $post_type ) {
    return $post_type === 'partners' || $post_type === 'podcast' || $post_type === 'category';
}

add_filter( 'wpseo_sitemap_exclude_post_type', 'sitemap_exclude_post_type', 10, 2 );

/**
 * Alters the URL structure for an example custom post type.
 *
 * @param string  $url  The URL to modify.
 * @param WP_Post $post The post object.
 *
 * @return string The modified URL.
 */
 
function sitemap_post_url( $url, $post ) {
   /* if ( $post->post_type === 'insights' ) {
       return \str_replace( 'insights', 'newsletter', $url );
    }*/

    return $url;
}


add_filter( 'wpseo_xml_sitemap_post_url', 'sitemap_post_url', 10, 2 );

/**
 * Remove "archive" from "Simple Job Board" plugin
 * This causes a problem with our custom "vacancies" page,
 * As it loads the archive instead of our custom page
 */
function modify_sjb_custom_post_type_args( $args, $post_type ) {
    if ( $post_type == "jobpost" ) {
        $args['rewrite'] = array(
            'has_archive' => false
        );
    }
    return $args;
}
add_filter( 'register_post_type_args', 'modify_sjb_custom_post_type_args', 20, 2 );

/**
 * Remove the default front-end style for simple job board
 * this causes a problem with styling and makes overriding is hard
 */
function dequeue_dequeue_plugin_style(){
    if (is_rtl()) {
        wp_dequeue_style('simple-job-board-frontend-rtl');
    } else {
        wp_dequeue_style('simple-job-board-frontend');
    }
}
add_action( 'wp_enqueue_scripts', 'dequeue_dequeue_plugin_style', 999 );

/**
 * edit sjb apply btn plugin
 */
function edit_sjb_btn(){
	return '<a href="' . get_the_permalink() . '" class="btn btn-secondary btn-icon-arrow_right-colored">' . esc_html__('Apply', 'simple-job-board') . '</a>';
}

add_filter('sjb_get_the_apply_now_btn', 'edit_sjb_btn', 30);

remove_filter ('the_content', 'wpautop');

// Function to change "posts" to "news" in the admin side menu
function change_post_menu_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'News';
    $submenu['edit.php'][5][0] = 'News Articles';
    $submenu['edit.php'][10][0] = 'Add News Article';
    $submenu['edit.php'][16][0] = 'Tags';
    echo '';
}
add_action( 'admin_menu', 'change_post_menu_label' );

// Function to change post object labels to "news"
function change_post_object_label() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'News Articles';
    $labels->singular_name = 'News Article';
    $labels->add_new = 'Add News Article';
    $labels->add_new_item = 'Add News Article';
    $labels->edit_item = 'Edit News Article';
    $labels->new_item = 'News Article';
    $labels->view_item = 'View News Article';
    $labels->search_items = 'Search News Articles';
    $labels->not_found = 'No News Articles found';
    $labels->not_found_in_trash = 'No News Articles found in Trash';
}
add_action( 'init', 'change_post_object_label' );

/**
 * Get image alt text by image URL
 *
 * @param String $image_url
 *
 * @return Bool | String
 */
function image_alt_by_url( $image_url ) {
    global $wpdb;

    if( empty( $image_url ) ) {
        return false;
    }

    $query_arr  = $wpdb->get_col( $wpdb->prepare( "SELECT ID FROM {$wpdb->posts} WHERE guid='%s';", strtolower( $image_url ) ) );
    $image_id   = ( ! empty( $query_arr ) ) ? $query_arr[0] : 0;

    return get_post_meta( $image_id, '_wp_attachment_image_alt', true );
}

add_shortcode('associates','associates_fun');
function associates_fun($atts){
	$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
	$metaQuery=array();
	if($atts && $atts['type']){
		$metaQuery = array(
			array(
				'key'     => 'type',
				'value'   => $atts['type'],
				'compare' => 'LIKE',
			),
		);
	}
	$associate = new WP_Query(array('post_type'=>'associate','paged' => $paged,'post_parent'=>0,'meta_query' => $metaQuery));

	if ( $associate->have_posts() ) {
		$result = '
			<section class="associates">
				<div class="container">';
					// categories tabs
					if($atts && $atts['type'] == 'firm'){
						$result .= '
							<ul class="associates_categories_tabs">
								<li><a href="'.get_permalink(6110).'">All</a></li>
								<li class="active"><a href="'.get_permalink(6134).'">Firm</a></li>
								<li><a href="'.get_permalink(6133).'">Individual</a></li>
							</ul>
							<h3 class="active_category_heading">Firm</h3>
						';
					}else if($atts && $atts['type'] == 'individual'){
						$result .= '
							<ul class="associates_categories_tabs">
								<li><a href="'.get_permalink(6110).'">All</a></li>
								<li><a href="'.get_permalink(6134).'">Firm</a></li>
								<li class="active"><a href="'.get_permalink(6133).'">Individual</a></li>
							</ul>
							<h3 class="active_category_heading">Individuals</h3>
						';
					}else{
						$result .= '
							<ul class="associates_categories_tabs">
								<li class="active"><a href="'.get_permalink(6110).'">All</a></li>
								<li><a href="'.get_permalink(6134).'">Firm</a></li>
								<li><a href="'.get_permalink(6133).'">Individual</a></li>
							</ul>
							<h3 class="active_category_heading">All</h3>
						';
					}

					// items
					$result .= '<div class="row">';
						while ( $associate->have_posts() ) {$associate->the_post();
							$result .= '
								<div class="associate_wrapper col-12 col-md-6 col-lg-4">

									<div class="associate_item_img">
										<a href="'.get_permalink().'">
											<img src="'.get_the_post_thumbnail_url($associate->ID).'" alt="'.get_the_title().'"/>
										</a>
									</div>

									<div class="additional_data">';
										if(get_field('type',get_the_ID())){
											$result .= '<span class="associate_type">'.get_field('type',get_the_ID()).'</span>';
										} $result .= '
										<h4>
											<a href="'.get_permalink().'">'.get_the_title().'</a>
										</h4>';
										if(get_field('countries',get_the_ID())){
											$result .= '
												<div class="associate_countries">
													<img src="'.THEME_DIR_URI.'/dist/images/filled-pin.svg" alt="Map Pin Marker">
													<p>'.get_field('countries',get_the_ID()).'</p>
												</div>
											';
										} $result .='
									</div>
								</div>
							';
						}wp_reset_postdata(); $result .= '
					</div>
					<div class="pagination">';
						$result .= paginate_links( array(
							'total' => $associate->max_num_pages,
							'current'  => $paged,
							'mid_size' => 5,
							'prev_text' => '&lsaquo;',
							'next_text' => '&rsaquo;',
							'type'=>'list'
						) ); $result .= '
					</div>
				</div>
			</section>
		';
	}

	return $result;
}

add_filter( 'get_archives_link', function( $link_html, $url, $text, $format, $before, $after ) {

    if ( 'custom' == $format ) {
        $link_html = "\t<option value=\"". esc_attr( $text ) ."\">$before<a href='$url'>$text</a>$after</option>\n";
    }

    return $link_html;

}, 10, 6 );

//Remove Gutenberg Block Library CSS from loading on the frontend
function remove_wp_block_library_css(){
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'wc-block-style' ); // Remove WooCommerce block CSS
}
add_action( 'wp_enqueue_scripts', 'remove_wp_block_library_css', 100 );

function single_post_arabic_date($postdate_d,$postdate_d2,$postdate_m,$postdate_y) {
    $months = array("Jan" => "يناير", "Feb" => "فبراير", "Mar" => "مارس", "Apr" => "أبريل", "May" => "مايو", "Jun" => "يونيو", "Jul" => "يوليو", "Aug" => "أغسطس", "Sep" => "سبتمبر", "Oct" => "أكتوبر", "Nov" => "نوفمبر", "Dec" => "ديسمبر");
    $en_month = $postdate_m;
    foreach ($months as $en => $ar) {
        if ($en == $en_month) { $ar_month = $ar; }
    }

    $find = array ("Sat", "Sun", "Mon", "Tue", "Wed" , "Thu", "Fri");
    $replace = array ("السبت", "الأحد", "الإثنين", "الثلاثاء", "الأربعاء", "الخميس", "الجمعة");
    $ar_day_format = $postdate_d2;
    $ar_day = str_replace($find, $replace, $ar_day_format);

    header('Content-Type: text/html; charset=utf-8');
    $standard = array("0","1","2","3","4","5","6","7","8","9");
    $eastern_arabic_symbols = array("٠","١","٢","٣","٤","٥","٦","٧","٨","٩");
    $post_date = $ar_day.' '.$postdate_d.' '.$ar_month.' '.$postdate_y;
    $arabic_date = str_replace($standard , $eastern_arabic_symbols , $post_date);

    return $arabic_date;
}