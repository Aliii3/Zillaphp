<?php


function zc_mce4_options($init) {

    $custom_colours = '
        "12264A", "Blue Zodiac",
        "4dc8ed", "Picton Blue",
		"0A5C36", "Dark Green",
    ';

    // build colour grid default+custom colors
    $init['textcolor_map'] = '['.$custom_colours.']';

    // change the number of rows in the grid if the number of colors changes
    // 8 swatches per row
    $init['textcolor_rows'] = 1;

    return $init;
}
add_filter('tiny_mce_before_init', 'zc_mce4_options');

add_filter( 'tiny_mce_plugins', 'wpse_tiny_mce_remove_custom_colors' );
function wpse_tiny_mce_remove_custom_colors( $plugins ) {

    foreach ( $plugins as $key => $plugin_name ) {
        if ( 'colorpicker' === $plugin_name ) {
            unset( $plugins[ $key ] );
            return $plugins;
        }
    }

    return $plugins;
}
?>
