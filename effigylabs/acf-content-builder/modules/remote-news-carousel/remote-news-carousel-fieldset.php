<?php if( function_exists('acf_add_local_field_group') ):


acf_add_local_field(
array (
	'parent' => 'field_589c4727da2e9',
	'key' => 'field_5946e9918fa3e',
	'label' => 'Remote News Carousel Source',
	'name' => 'remote_news_carousel_source',
	'type' => 'url',
	'instructions' => 'URL to source posts from. Default => https://css-tricks.com',
	'required' => 0,
	'conditional_logic' => array (
		array (
			array (
				'field' => 'field_58e19e145b3e1',
				'operator' => '==',
				'value' => 'Remote News Carousel',
			),
		),
	),
	'wrapper' => array (
		'width' => '40',
		'class' => '',
		'id' => '',
	),
	'default_value' => 'https://css-tricks.com',
	'placeholder' => '',
));

acf_add_local_field(
array (
	'parent' => 'field_589c4727da2e9',
	'key' => 'field_5946e93f8fa3dd',
	'label' => 'Remote News Carousel Category ID',
	'name' => 'remote_news_carousel_cat_id',
	'type' => 'number',
	'instructions' => 'Enter the Remote News Category ID. Default => Leave Empty',
	'required' => 0,
	'conditional_logic' => array (
		array (
			array (
				'field' => 'field_58e19e145b3e1',
				'operator' => '==',
				'value' => 'Remote News Carousel',
			),
		),
	),
	'wrapper' => array (
		'width' => '30',
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


acf_add_local_field(
array (
	'parent' => 'field_589c4727da2e9',
	'key' => 'field_5946e9d58fa3f',
	'label' => 'Remote News Carousel Category',
	'name' => 'remote_news_carousel_category',
	'type' => 'text',
	'instructions' => '**Optional** Default => Leave Empty',
	'required' => 0,
	'conditional_logic' => array (
		array (
			array (
				'field' => 'field_58e19e145b3e1',
				'operator' => '==',
				'value' => 'Remote News Carousel',
			),
		),
	),
	'wrapper' => array (
		'width' => '30',
		'class' => '',
		'id' => '',
	),
	'default_value' => '',
	'placeholder' => '',
	'prepend' => '',
	'append' => '',
	'maxlength' => '',
));

acf_add_local_field(
array (
	'parent' => 'field_589c4727da2e9',
	'key' => 'field_5946e93f8fa3d',
	'label' => 'Remote News Carousel Count',
	'name' => 'remote_news_carousel_count',
	'type' => 'number',
	'instructions' => 'Articles to retrieve. Default => 6',
	'required' => 0,
	'conditional_logic' => array (
		array (
			array (
				'field' => 'field_58e19e145b3e1',
				'operator' => '==',
				'value' => 'Remote News Carousel',
			),
		),
	),
	'wrapper' => array (
		'width' => '25',
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
	'key' => 'field_5946eae18fa41',
	'label' => 'Remote News Carousel Meta',
	'name' => 'remote_news_carousel_meta',
	'type' => 'true_false',
	'instructions' => 'Show publish date of article. Default => No',
	'required' => 0,
	'conditional_logic' => array (
		array (
			array (
				'field' => 'field_58e19e145b3e1',
				'operator' => '==',
				'value' => 'Remote News Carousel',
			),
		),
	),
	'wrapper' => array (
		'width' => '25',
		'class' => '',
		'id' => '',
	),
	'message' => '',
	'default_value' => 0,
	'ui' => 1,
	'ui_on_text' => '',
	'ui_off_text' => '',
));

acf_add_local_field(
array (
	'parent' => 'field_589c4727da2e9',
	'key' => 'field_5946eb408fa42',
	'label' => 'Remote News Carousel Image',
	'name' => 'remote_news_carousel_image',
	'type' => 'true_false',
	'instructions' => 'Show image with article. Default => No',
	'required' => 0,
	'conditional_logic' => array (
		array (
			array (
				'field' => 'field_58e19e145b3e1',
				'operator' => '==',
				'value' => 'Remote News Carousel',
			),
		),
	),
	'wrapper' => array (
		'width' => '25',
		'class' => '',
		'id' => '',
	),
	'message' => '',
	'default_value' => 0,
	'ui' => 1,
	'ui_on_text' => '',
	'ui_off_text' => '',
));

acf_add_local_field(
array (
	'parent' => 'field_589c4727da2e9',
	'key' => 'field_5946ea888fa40',
	'label' => 'Remote News Carousel Default Image',
	'name' => 'remote_news_carousel_default_image',
	'type' => 'image',
	'instructions' => '**Optional** Set a default image. Default => empty',
	'required' => 0,
	'conditional_logic' => array (
		array (
			array (
				'field' => 'field_58e19e145b3e1',
				'operator' => '==',
				'value' => 'Remote News Carousel',
			),
			array (
				'field' => 'field_5946eb408fa42',
				'operator' => '==',
				'value' => '1',
			),
		),
	),
	'wrapper' => array (
		'width' => '25',
		'class' => '',
		'id' => '',
	),
	'return_format' => 'url',
	'preview_size' => 'medium',
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