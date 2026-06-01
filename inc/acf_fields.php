<?php

if( function_exists('acf_add_local_field_group') ):


	/* team member custom fields
	 * position "text"
	 * linkedin url "url"
	 * Experience & qualifications "wysiwyg"
	*/
	acf_add_local_field_group(
		array (
			'key' => 'team_member_data',
			'title' => 'Team Member Data',
			'fields' => array (
				array (
					'key' => 'membertype',
					'label' => 'Type',
					'name' => 'membertype',
					'type' => 'select',
					'prefix' => '',
					'instructions' => 'Add Member Type',
					'required' => 0,
					'conditional_logic' => 0,
					'multiple' => 0,
					'ui' => 1,
					'return_format' => 'value',	
					'choices' => [
							'nxbm' => __('Non-Executive Advisory Board Member', 'txtdomain'),
							'xbm' => __('Executive Advisory Board Member', 'txtdomain'),
							'xc' => __('Executive Committee', 'txtdomain')
						],
					'default_value' => 'xc',
				),
				array (
					'key' => 'order',
					'label' => 'Order',
					'name' => 'order',
					'type' => 'text',
					'prefix' => '',
					'instructions' => 'Add Member Order',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
					'readonly' => 0,
					'disabled' => 0,
				),
				array (
					'key' => 'position',
					'label' => 'Job Title / Position',
					'name' => 'position',
					'type' => 'text',
					'prefix' => '',
					'instructions' => 'Add Member Job Title / Position',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
					'readonly' => 0,
					'disabled' => 0,
				),

				array (
					'key' => 'linkedin_url',
					'label' => 'Linkedin URL',
					'name' => 'linkedin_url',
					'type' => 'url',
					'prefix' => '',
					'instructions' => 'Add Member linkedin profile url',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
					'readonly' => 0,
					'disabled' => 0,
				),

				array (
					'key' => 'experience_qualifications',
					'label' => 'Experience & Qualifications',
					'name' => 'experience_qualifications',
					'type' => 'wysiwyg',
					'prefix' => '',
					'instructions' => 'Add Member Experience & Qualifications',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
					'readonly' => 0,
					'disabled' => 0,
					'media_upload' => 0,
				),
			),
			'location' => array (
				array (
					array (
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'team',
					),
				),
			),
			'menu_order' => 0,
			'position' => 'normal',
			'style' => 'default',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen' => '',
		)
	);

endif;

if( function_exists('acf_add_local_field_group') ):

	acf_add_local_field_group(array(
		'key' => 'group_6009b9645c617',
		'title' => 'Track Record',
		'fields' => array(
			array(
				'key' => 'field_6009b970d41f5',
				'label' => 'Service type',
				'name' => 'service_type',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
			array(
				'key' => 'field_6009b9a6d41f6',
				'label' => 'Service Title',
				'name' => 'service_title',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
			array(
				'key' => 'field_6009b9b8d41f7',
				'label' => 'Description',
				'name' => 'description',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
			array(
				'key' => 'field_6009b9d6d41f8',
				'label' => 'Return On Investment "ROI"',
				'name' => 'return_on_investment',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
			array(
				'key' => 'field_6009b9edd41f9',
				'label' => 'Date',
				'name' => 'date',
				'type' => 'date_picker',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'display_format' => 'M Y',
				'return_format' => 'M Y',
				'first_day' => 0,
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'track_record',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
	));

endif;
?>
