<?php if( function_exists('acf_add_local_field_group') ):


acf_add_local_field( array (
	'parent' => 'field_589c4727da2e9',
	'key' => 'field_58e1a9f142e72',
	'label' => 'Choose a Gallery Type',
	'name' => 'choose_a_gallery_type',
	'type' => 'select',
	'instructions' => 'Select a content type for this column',
	'required' => 1,
	'conditional_logic' => array (
		array (
			array (
				'field' => 'field_58e19e145b3e1',
				'operator' => '==',
				'value' => 'Gallery',
			),
		),
	),
	'wrapper' => array (
		'width' => '100',
		'class' => '',
		'id' => '',
	),
	'choices' => array (
		'Carousel' => 'Carousel',
		'Slider' => 'Slider',
	),
	'default_value' => array (
		0 => 'Carousel',
	),
	'allow_null' => 1,
	'multiple' => 0,
	'ui' => 0,
	'ajax' => 0,
	'return_format' => 'value',
	'placeholder' => '',
));



acf_add_local_field( array (
	'parent' => 'field_589c4727da2e9',
	'key' => 'field_58e19deb5b3e0',
	'label' => 'Column Gallery',
	'name' => 'column_gallery',
	'type' => 'gallery',
	'instructions' => '',
	'required' => 0,
	'conditional_logic' => array (
		array (
			array (
				'field' => 'field_58e19e145b3e1',
				'operator' => '==',
				'value' => 'Gallery',
			),
		),
	),
	'wrapper' => array (
		'width' => '',
		'class' => '',
		'id' => '',
	),
	'min' => '',
	'max' => '',
	'insert' => 'append',
	'library' => 'all',
	'min_width' => '',
	'min_height' => '',
	'min_size' => '',
	'max_width' => '',
	'max_height' => '',
	'max_size' => '',
	'mime_types' => '',
));

endif;

?>