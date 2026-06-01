<?php

/*

@package Zilla Capital theme

    ==================
        Admin Page
    ==================

*/
function zc_admin_page()
{
    // add zc page in admin side bar menu
    add_menu_page(
		'Theme Options',
		'Zilla Capital',
		'manage_options',
		'theme_options',
		'zc_theme_create_page',
		'',
		110
	);

    // activate custom settings
    add_action( 'admin_init', 'zc_custom_settings' );
}

function zc_theme_create_page()
{
    require_once( get_template_directory() . '/inc/templates/zc-admin.php');
}

function zc_custom_settings()
{
    /*
        ===========================
            add section to page
        ===========================
    */
    add_settings_section(
		'zc-contact-info-group', // section name
		'Contact Information', // displayed name
		'zc_contact_info_message', // cb to print description on section
		'theme_options' // page name where section is displayed
	);

    /*
        ========================
            Register options
        ========================
    */

    /* register social Media fields */
    register_setting(
		'zc-contact-info-group', // section name
		'facebook', // form elemnt name
		'zc_sanitize_handler' // cb sanitization
	);
    register_setting(
		'zc-contact-info-group', // section name
		'linkedin', // form elemnt name
		'zc_sanitize_handler' // cb sanitization
	);
    register_setting(
		'zc-contact-info-group', // section name
		'youtube', // form elemnt name
		'zc_sanitize_handler' // cb sanitization
	);

    /* register contact information fields */

    /* email */
    register_setting(
		'zc-contact-info-group',
		'email',
		'zc_sanitize_handler'
	);

    /* phone number */
    register_setting(
		'zc-contact-info-group',
		'phone_number',
		'zc_sanitize_handler'
	);

    /* location */
    register_setting(
		'zc-contact-info-group',
		'location_text',
		'zc_sanitize_handler'
	);
    register_setting(
		'zc-contact-info-group',
		'location_link',
		'zc_sanitize_handler'
	);

    /*
        ==============================
            add Fields to the page
		==============================
		// field name
		// displayed name
		// cb to print section description
		// page where field is deisplayed
    */

    /* facebook */
    add_settings_field(
        'facebook-link',
        'Facebook',
        'zc_input_field',
        'theme_options',
        'zc-contact-info-group',
        array(
            'handler'=>'facebook',
            'input_type'=>'url',
            'place_holder' => 'https://www.facebook.com/'
        )
    );

    /* linkedin */
    add_settings_field(
        'linkedin-link',
        'Linkedin',
        'zc_input_field',
        'theme_options',
        'zc-contact-info-group',
        array(
            'handler'=>'linkedin',
            'input_type'=>'url',
            'place_holder' => 'https://www.linkedin.com/'
        )
    );

    /* insatgram */
    add_settings_field(
        'youtube-link',
        'Youtube',
        'zc_input_field',
        'theme_options',
        'zc-contact-info-group',
        array(
            'handler'=>'youtube',
            'input_type'=>'url',
            'place_holder' => 'https://www.youtube.com/'
        )
    );

    /* email */
    add_settings_field(
        'contact-email',
        'Email:',
        'zc_input_field',
        'theme_options',
        'zc-contact-info-group',
        array(
            'handler'=>'email',
            'input_type'=>'email',
            'place_holder' => 'prefix@domain.ext'
        )
    );

    /* phone number */
    add_settings_field(
        'phone-number',
        'Phone Number',
        'zc_input_field',
        'theme_options',
        'zc-contact-info-group',
        array(
            'handler'=>'phone_number',
            'input_type'=>'tel',
            'place_holder' => '+20-1000000000'
        )
    );

    /* location text */
    add_settings_field(
        'contact-location-text',
        'Location Text',
        'zc_input_field',
        'theme_options',
        'zc-contact-info-group',
        array(
            'handler'=>'location_text',
            'input_type'=>'text',
            'place_holder' => 'Put your address here'
        )
    );

    /* location link */
    add_settings_field(
        'contact-location-link',
        'Location Link',
        'zc_input_field',
        'theme_options',
        'zc-contact-info-group',
        array(
            'handler'=>'location_link',
            'input_type'=>'url',
            'place_holder' => 'put your directions link here'
        )
    );
}

/*
    =========================
        Social Media settings
    =========================
*/
function zc_contact_info_message()
{
    echo 'Customize Contact Information';
}

function zc_input_field (array $arr)
{
    $handler_value = esc_attr(get_option( $arr["handler"] ));

    echo '<input type="'.$arr["input_type"].'" class="admin_input" name="'.$arr["handler"].'" value="'.$handler_value.'" placeholder="'.$arr["place_holder"].'">';
}

function zc_sanitize_handler($input)
{
    $output = sanitize_text_field( $input );
    return $output;
}

add_action( 'admin_menu', 'zc_admin_page' );
