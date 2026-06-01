<?php

/*
	register insights categories
*/
function insights_categories() {
	$labels = array(
        'name' => 'Insights Categories',
        'singular_name' => 'Category',
        'add_new_label' => 'Add Category',
        'all_items' => 'All Categories',
        'add_new_item' => 'Add New Category',
        'view_item' => 'View Category',
        'Update_item' => 'Update Category',
        'edit_item' => 'Edit Category',
        'new_item' => 'New Category',
        'search_items' => 'Search in Categories',
        'not_found' => 'No Categories Found'
    );

    $args = array(
        'query_var' => true,
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_in_nav_menus' => true,
        'show_admin_column' => true,
        'has_archive' => true,
        'publicly_queryable' => true
    );

    register_taxonomy( 'insights_cat', 'insights', $args );
}

add_action( 'init', 'insights_categories' );
/*
	register Reports categories
*/
function reports_categories() {

    // Library Categories

    $labels = array(
        'name' => 'Reports Categories',
        'singular_name' => 'Category',
        'add_new_label' => 'Add Category',
        'all_items' => 'All Categories',
        'add_new_item' => 'Add New Category',
        'view_item' => 'View Category',
        'Update_item' => 'Update Category',
        'edit_item' => 'Edit Category',
        'new_item' => 'New Category',
        'search_items' => 'Search in Categories',
        'not_found' => 'No Categories Found'
    );

    $args = array(
        'query_var' => true,
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_in_nav_menus' => true,
        'show_admin_column' => true,
        'has_archive' => true,
        'publicly_queryable' => true
    );

    register_taxonomy( 'reports_cat', 'reports', $args );

}
add_action( 'init', 'reports_categories' );


/**
 * Track Record Categories
 *
 */

function track_record_categories() {

    // Library Categories

    $labels = array(
        'name' => 'All Categories',
        'singular_name' => 'Category',
        'add_new_label' => 'Add Category',
        'all_items' => 'All Categories',
        'add_new_item' => 'Add New Category',
        'view_item' => 'View Category',
        'Update_item' => 'Update Category',
        'edit_item' => 'Edit Category',
        'new_item' => 'New Category',
        'search_items' => 'Search in Categories',
        'not_found' => 'No Categories Found'
    );

    $args = array(
        'query_var' => true,
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_in_nav_menus' => true,
        'show_admin_column' => true,
        'publicly_queryable' => true
    );

    register_taxonomy( 'track_record_cat', 'track_record', $args );
}
add_action( 'init', 'track_record_categories' );

/**
 * Associates Categories
 *
 */

function associates_categories() {

    // Library Categories

    $labels = array(
        'name' => 'All Categories',
        'singular_name' => 'Category',
        'add_new_label' => 'Add Category',
        'all_items' => 'All Categories',
        'add_new_item' => 'Add New Category',
        'view_item' => 'View Category',
        'Update_item' => 'Update Category',
        'edit_item' => 'Edit Category',
        'new_item' => 'New Category',
        'search_items' => 'Search in Categories',
        'not_found' => 'No Categories Found'
    );

    $args = array(
        'query_var' => true,
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_in_nav_menus' => true,
        'show_admin_column' => true,
        'publicly_queryable' => true
    );

    register_taxonomy( 'associates_cat', 'associates', $args );
}
add_action( 'init', 'associates_categories' );

?>
