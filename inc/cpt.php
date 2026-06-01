<?php

	/* partners custom post type */
	function partners_post_type() {
		$labels = array(
			'name'               => _x( 'Partners', '' ),
			'singular_name'      => _x( 'partner', '' ),
			'add_new'            => _x( 'Add New', '' ),
			'add_new_item'       => __( 'Add New' ),
			'edit_item'          => __( 'Edit Partner' ),
			'new_item'           => __( 'New Partner' ),
			'all_items'          => __( 'All Partners' ),
			'view_item'          => __( 'View Partner' ),
			'search_items'       => __( 'Search Partners' ),
			'not_found'          => __( 'No partners found' ),
			'not_found_in_trash' => __( 'No partners found in the Trash' ),
			'menu_name'          => 'Partners'
		);
		$args = array(
			'labels'        => $labels,
			'description'   => 'Holds our partners and partner specific data',
			'public'        => true,
			'supports'      => array( 'title', 'thumbnail'),
			'has_archive'   => false,
			'menu_icon'		=> 'dashicons-businessperson'
		);
		register_post_type( 'partners', $args );
	}
	add_action( 'init', 'partners_post_type' );

	function insights_post_type() {
		$labels = array(
			'name' => 'Insights',
			'all_items' => 'All Insights',
			'singular_name' => 'Insight',
			'add_new_label' => 'Add New',
			'add_new_item' => 'Add New',
			'edit_item' => 'Edit Insight',
			'new_item' => 'New Insight',
			'search_items' => 'Search in Insights',
			'not_found' => 'No Insight'
		);

		$args = array(
			'labels' => $labels,
			'public' => true,
			'publicly_queryable' => true,
			'query_var' => true,
			'rewrite' => true,
			'show_in_nav_menus' => true,
			'has_archive' => false,
			'capability_type' => 'post',
			'hierarchical' => false,
			'supports' => array('title', 'thumbnail', 'editor'),
			'exclude_from_search' => false
		);

		register_post_type( 'insights', $args );
	}

	add_action( 'init', 'insights_post_type' );

	function reports_post_type() {

		// Reports

		$labels = array(
			'name' => 'All Reports',
			'singular_name' => 'Report',
			'all_items' => 'All Reports',
			'add_new_item' => 'Add New',
			'add_new_label' => 'Add New',
			'edit_item' => 'Edit Report',
			'new_item' => 'New Report',
			'search_items' => 'Search in Reports',
			'not_found' => 'No Reports'
		);

		$args = array(
			'labels' => $labels,
			'public' => true,
			'publicly_queryable' => true,
			'query_var' => true,
			'rewrite' => true,
			'show_in_nav_menus' => true,
			'has_archive' => false,
			'capability_type' => 'post',
			'hierarchical' => false,
			'supports' => array('title', 'thumbnail', 'editor'),
			'exclude_from_search' => false
		);

		register_post_type( 'reports', $args );

	}
	add_action( 'init', 'reports_post_type' );

	function blogs_post_type() {

		// Reports

		$labels = array(
			'name' => 'All Blogs',
			'singular_name' => 'Blog',
			'all_items' => 'All Blogs',
			'add_new_item' => 'Add New',
			'add_new_label' => 'Add New',
			'edit_item' => 'Edit Blog',
			'new_item' => 'New Blog',
			'search_items' => 'Search in Blogs',
			'not_found' => 'No Blogs'
		);

		$args = array(
			'labels' => $labels,
			'public' => true,
			'publicly_queryable' => true,
			'query_var' => true,
			'rewrite' => true,
			'show_in_nav_menus' => true,
			'has_archive' => false,
			'capability_type' => 'post',
			'hierarchical' => false,
			'supports' => array('title', 'thumbnail', 'editor'),
			'exclude_from_search' => false
		);

		register_post_type( 'blogs', $args );

	}
	add_action( 'init', 'blogs_post_type' );
	
	/* Team custom post type */
	function team_post_type() {
		$labels = array(
			'name'               => 'Team',
			'singular_name'      => 'Team Member',
			'add_new'            => 'Add New Team Member',
			'add_new_item'       => 'Add New Team Member',
			'edit_item'          => 'Edit Team Member',
			'new_item'           => 'New Team Member',
			'all_items'          => 'All Team',
			'view_item'          => 'View Team Member',
			'search_items'       => 'Search Team',
			'not_found'          => 'No Team Members found',
			'not_found_in_trash' => 'No Team Members found in the Trash',
			'menu_name'          => 'Team'
		);
		$args = array(
			'labels'        => $labels,
			'description'   => 'Holds Team and Team Member specific data',
			'public'        => true,
			'supports'      => array( 'title', 'thumbnail'),
			'menu_icon'		=> 'dashicons-groups',
		);
		register_post_type( 'team', $args );
	}
	add_action( 'init', 'team_post_type' );

	/* Track Record custom post type */
	function track_record_post_type() {
		$labels = array(
			'name'               => 'Track Record',
			'singular_name'      => 'Record',
			'all_items'          => 'All Records',
			'add_new'            => 'Add New',
			'add_new_item'       => 'Add New',
			'edit_item'          => 'Edit Record',
			'new_item'           => 'New Record',
			'view_item'          => 'View Record',
			'search_items'       => 'Search Team',
			'not_found'          => 'No Records found',
			'not_found_in_trash' => 'No Records found in the Trash',
			'menu_name'          => 'Track Records',
		);
		$args = array(
			'labels'        => $labels,
			'description'   => 'Holds Track Records data',
			'public'        => true,
			'supports'      => array( 'title', 'thumbnail'),
			'menu_icon'          => 'dashicons-awards',
		);
		register_post_type( 'track_record', $args );
	}
	add_action( 'init', 'track_record_post_type' );


	/* associates post type */

	function associates_post_type(){
		$args = array(
			'public' => true,
			'label'  => 'Associates',
			'hierarchical' => true,
			'supports'  => array( 'title', 'editor', 'thumbnail', 'page-attributes' )
		);
		register_post_type( 'associate' ,$args);
	}
	add_action( 'init', 'associates_post_type' );
	
?>
