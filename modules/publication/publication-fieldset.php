<?php if( function_exists('acf_add_local_field_group') ):


acf_add_local_field( array (
	'parent' => 'field_589c4727da2e9',
	'key' => 'field_5902830880cf7',
	'label' => 'Publication',
	'name' => 'publication',
	'type' => 'relationship',
	'instructions' => '',
	'required' => 0,
	'conditional_logic' => array (
		array (
			array (
				'field' => 'field_58e19e145b3e1',
				'operator' => '==',
				'value' => 'Publication',
			),
		),
	),
	'wrapper' => array (
		'width' => '60',
		'class' => '',
		'id' => '',
	),
	'post_type' => array (
		0 => 'publication',
	),
	'taxonomy' => array (
	),
	'filters' => array (
		0 => 'search',
		1 => 'post_type',
		2 => 'taxonomy',
	),
	'elements' => '',
	'min' => 1,
	'max' => 1,
	'return_format' => 'object',
));

acf_add_local_field(
array (
	'parent' => 'field_589c4727da2e9',
	'key' => 'field_5902830880cf7b',
	'label' => 'Publication Count',
	'name' => 'publication_count',
	'type' => 'number',
	'instructions' => 'Select how many publications to display. Default => 6',
	'required' => 0,
	'conditional_logic' => array (
		array (
			array (
				'field' => 'field_58e19e145b3e1',
				'operator' => '==',
				'value' => 'Publication',
			),
		),
	),
	'wrapper' => array (
		'width' => '20',
		'class' => '',
		'id' => '',
	),
	'default_value' => 6,
	'placeholder' => '',
	'prepend' => '',
	'append' => '',
	'min' => '',
	'max' => '',
	'step' => '',
));

acf_add_local_field(
array (
	'parent' => 'field_589c4727da2e9',
	'key' => 'field_5902830880cf7c',
	'label' => 'Publication Hide',
	'name' => 'publication_hide',
	'type' => 'number',
	'instructions' => 'Optionally hide a publication. Hint: To hide the first issue, enter "1"',
	'required' => 0,
	'conditional_logic' => array (
		array (
			array (
				'field' => 'field_58e19e145b3e1',
				'operator' => '==',
				'value' => 'Publication',
			),
		),
	),
	'wrapper' => array (
		'width' => '20',
		'class' => '',
		'id' => '',
	),
	'default_value' => '',
	'placeholder' => '',
	'prepend' => '',
	'append' => '',
	'min' => '',
	'max' => '',
	'step' => '',
));


acf_add_local_field_group(array (
	'key' => 'group_55309cc7b5be4',
	'title' => 'Publications',
	'fields' => array (
		array (
			'key' => 'field_53b7566c008a2',
			'label' => 'Publication',
			'name' => 'publications',
			'type' => 'repeater',
			'instructions' => 'Add the publication cover graphic and ebook link here.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => '',
			'min' => 0,
			'max' => 0,
			'layout' => 'table',
			'button_label' => 'Add Row',
			'sub_fields' => array (
				array (
					'key' => 'field_53b7569a008a3',
					'label' => 'Issue Number',
					'name' => 'issue_number',
					'type' => 'text',
					'instructions' => 'Enter the Issue number',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => 15,
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => 'Issue #',
					'append' => '',
					'formatting' => 'none',
					'maxlength' => '',
					'readonly' => 0,
					'disabled' => 0,
				),
				array (
					'key' => 'field_53b756e6008a4',
					'label' => 'Cover Graphic',
					'name' => 'cover_graphic',
					'type' => 'image',
					'instructions' => 'Upload the cover graphic. 450 x 636 pixels',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '15',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'url',
					'preview_size' => 'thumbnail',
					'library' => 'all',
					'min_width' => '',
					'min_height' => '',
					'min_size' => '',
					'max_width' => '',
					'max_height' => '',
					'max_size' => '',
					'mime_types' => '',
				),
				array (
					'key' => 'field_53b7574a008a5',
					'label' => 'Issue Description',
					'name' => 'issue_description',
					'type' => 'wysiwyg',
					'instructions' => 'Enter some detail about this issue\'s contents',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => 25,
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'toolbar' => 'basic',
					'media_upload' => 0,
					'tabs' => 'all',
					'delay' => 0,
				),
				array (
					'key' => 'field_53b7577c008a6',
					'label' => 'ISSUU URL',
					'name' => 'issuu_url',
					'type' => 'text',
					'instructions' => 'Enter the URL for the ISSUU Link',
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
					'formatting' => 'none',
					'maxlength' => '',
					'readonly' => 0,
					'disabled' => 0,
				),
				array (
					'key' => 'field_589bb5e1ff011',
					'label' => 'Download URL',
					'name' => 'download_url',
					'type' => 'url',
					'instructions' => 'Enter the URL for the download Link',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
				),
			),
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'publication',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'seamless',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => array (
		0 => 'the_content',
		1 => 'excerpt',
		2 => 'custom_fields',
		3 => 'discussion',
		4 => 'comments',
		5 => 'author',
		6 => 'tags',
		7 => 'send-trackbacks',
	),
	'active' => 1,
	'description' => '',
));

endif;

?>