<?php if( function_exists('acf_add_local_field_group') ):

acf_add_local_field( array (
	'parent' => 'field_589c4727da2e9',
	'key' => 'field_589c47bbda2eb',
	'label' => 'Column Body',
	'name' => 'column_body',
	'type' => 'wysiwyg',
	'instructions' => '',
	'required' => 0,
	'conditional_logic' => array (
		array (
			array (
				'field' => 'field_58e19e145b3e1',
				'operator' => '==',
				'value' => 'Content',
			),
		),
	),
	'wrapper' => array (
		'width' => '',
		'class' => '',
		'id' => '',
	),
	'default_value' => '',
	'tabs' => 'all',
	'toolbar' => 'full',
	'media_upload' => 1,
	'delay' => 0,
));

endif;

?>