<?php

	function customize_add_button() {
		return '<button class="btn btn-wpcf7-field wpcf7-field-group-add"><img src="'.THEME_DIR_URI.'/dist/images/plus-icon.svg" alt="Add icon"> <span>Add More</span></button>';
	}

	add_filter( 'wpcf7_field_group_add_button', 'customize_add_button' );

	function customize_remove_button() {
		return '<button class="btn btn-wpcf7-field wpcf7-field-group-remove"><img src="'.THEME_DIR_URI.'/dist/images/trash-icon.svg" alt="trash icon"> <span>Remove</span></button>';
	}
	add_filter( 'wpcf7_field_group_remove_button', 'customize_remove_button' );

?>
