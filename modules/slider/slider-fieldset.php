<?php if( function_exists('acf_add_local_field_group') ):


acf_add_local_field_group(array (
	'key' => 'group_5954289cc405d',
	'title' => 'Sliders',
	'fields' => array (
		array (
			'key' => 'field_595428a8feada',
			'label' => 'Slider Images',
			'name' => 'slider_images',
			'type' => 'gallery',
			'instructions' => 'Slider images are 1400px(w) x 720px(h). Animations are set in the \'alt\' tag for each slide image.	If left blank the fadeIn animation is used. 
Other options: pulse, slideInUp, slideInLeft, bounceIn. 
See https://daneden.github.io/animate.css/ for more animation options.',
			'required' => 0,
			'conditional_logic' => 0,
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
		),
		array (
			'key' => 'field_59716779a90d1',
			'label' => 'Modal Target',
			'name' => 'modal_target',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '#',
			'append' => '',
			'maxlength' => '',
		),
		array (
			'key' => 'field_59716ce275443',
			'label' => 'Modal Content',
			'name' => 'modal_content',
			'type' => 'textarea',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'maxlength' => '',
			'rows' => '',
			'new_lines' => 'wpautop',
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'slider',
			),
		),
	),
	'menu_order' => 1,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => array (
		0 => 'the_content',
	),
	'active' => 1,
	'description' => '',
));
endif;

?>