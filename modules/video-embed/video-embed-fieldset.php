<?php if( function_exists('acf_add_local_field_group') ):


acf_add_local_field( array (
	'parent' => 'field_589c4727da2e9',
	'key' => 'video_embed_field_588e682ffb836',
	'label' => 'Video URL',
	'name' => 'video_url',
	'type' => 'text',
	'instructions' => 'Paste in the Video URL',
	'required' => 0,
	'conditional_logic' => array (
		array (
			array (
				'field' => 'field_58e19e145b3e1',
				'operator' => '==',
				'value' => 'Video Embed',
			),
		),
	),
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
));

acf_add_local_field( array (
	'parent' => 'field_589c4727da2e9',
	'key' => 'video_embed_field_589c474fda2ea',
	'label' => 'Video Ratio',
	'name' => 'video_ratio',
	'type' => 'select',
	'instructions' => 'Select a video ratio',
	'required' => 0,
	'conditional_logic' => array (
		array (
			array (
				'field' => 'field_58e19e145b3e1',
				'operator' => '==',
				'value' => 'Video Embed',
			),
		),
	),
	'wrapper' => array (
		'width' => '25',
		'class' => '',
		'id' => '',
	),
	'choices' => array (
		'16by9' => '16x9',
		'4by3' => '4x3',
	),
	'default_value' => array (
		0 => '16x9',
	),
	'allow_null' => 0,
	'multiple' => 0,
	'ui' => 0,
	'ajax' => 0,
	'return_format' => 'value',
	'placeholder' => '',
));


acf_add_local_field( array (
	'parent' => 'field_589c4727da2e9',
	'key' => 'video_embed_field_58a4f27a91ee1a',
	'label' => 'Hide Video Controls',
	'name' => 'show_video_controls',
	'type' => 'true_false',
	'instructions' => 'Hide video controls?',
	'required' => 0,
	'conditional_logic' => array (
		array (
			array (
				'field' => 'field_58e19e145b3e1',
				'operator' => '==',
				'value' => 'Video Embed',
			),
		),
	),
	'wrapper' => array (
		'width' => '25',
		'class' => '',
		'id' => '',
	),
	'message' => '',
	'default_value' => 1,
	'ui' => 1,
	'ui_on_text' => 'Yes',
	'ui_off_text' => 'No',
));

acf_add_local_field( array (
	'parent' => 'field_589c4727da2e9',
	'key' => 'video_embed_field_58a4f27a91ee1b',
	'label' => 'Hide Video Information',
	'name' => 'show_video_information',
	'type' => 'true_false',
	'instructions' => 'Hide video information?',
	'required' => 0,
	'conditional_logic' => array (
		array (
			array (
				'field' => 'field_58e19e145b3e1',
				'operator' => '==',
				'value' => 'Video Embed',
			),
		),
	),
	'wrapper' => array (
		'width' => '25',
		'class' => '',
		'id' => '',
	),
	'message' => '',
	'default_value' => 1,
	'ui' => 1,
	'ui_on_text' => 'Yes',
	'ui_off_text' => 'No',
));

acf_add_local_field( array (
	'parent' => 'field_589c4727da2e9',
	'key' => 'video_embed_field_58a4f27a91ee1c',
	'label' => 'Hide Related Videos',
	'name' => 'show_related_videos',
	'type' => 'true_false',
	'instructions' => 'Hide related videos after finished playing?',
	'required' => 0,
	'conditional_logic' => array (
		array (
			array (
				'field' => 'field_58e19e145b3e1',
				'operator' => '==',
				'value' => 'Video Embed',
			),
		),
	),
	'wrapper' => array (
		'width' => '25',
		'class' => '',
		'id' => '',
	),
	'message' => '',
	'default_value' => 1,
	'ui' => 1,
	'ui_on_text' => 'Yes',
	'ui_off_text' => 'No',
));



endif;

?>