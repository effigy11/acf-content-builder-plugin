<?php 

/*
Plugin Name: Advanced Custom Fields: Custom Post Types
Description: Create and manage custom post types - Requires Advanced Custom Fields Plugin
Version:     1.1.2
Author:      EffigyLabs
Author URI:  http://effigy.com.au
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: effigylabs
*/

add_action('plugins_loaded', 'init_acf_options');

function init_acf_options() {

    if (function_exists('acf_add_options_page')) {
        acf_add_options_page(array(
        	'page_title' 	=> 'Advanced Custom Fields: Custom Content',
        	'menu_title'	=> 'Custom Content',
        	'menu_slug'  	=> 'acf-custom-post-types',
        	'capability'	=> 'edit_posts',
        	'redirect'		=> false
        ));
    }
    
    
    if( function_exists('acf_add_local_field_group') ):
    
    acf_add_local_field_group(array (
    	'key' => 'group_568f034fc9c37',
    	'title' => 'Add Custom Post Types',
    	'location' => array (
    		array (
    			array (
    				'param' => 'options_page',
    				'operator' => '==',
    				'value' => 'acf-custom-post-types',
    			),
    		),
    	),
    	'fields' => array (
    		array (
    			'key' => 'field_568f13eaa24da',
    			'label' => 'Custom Post Types',
    			'name' => 'custom_post_types',
    			'type' => 'repeater',
    			'instructions' => 'Create and manage custom post types with the ACF plugin.',
    			'required' => 0,
    			'conditional_logic' => 0,
    			'wrapper' => array (
    				'width' => '',
    				'class' => '',
    				'id' => '',
    			),
    			'collapsed' => 'field_568f1428a24dc',
    			'min' => '',
    			'max' => '',
    			'layout' => 'block',
    			'button_label' => 'Add New CPT',
    			'sub_fields' => array (
    				array (
    					'key' => 'field_568f1428a24dc',
    					'label' => 'Plural Label',
    					'name' => 'plural_label',
    					'type' => 'text',
    					'instructions' => 'General name for the post type, usually plural (e.g. Portfolio).',
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
    					'key' => 'field_568f140fa24db',
    					'label' => 'Singular Label',
    					'name' => 'singular_label',
    					'type' => 'text',
    					'instructions' => 'Name for one object of this post type (e.g. Portfolio post).',
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
    					'key' => 'field_568f2fd8f2478',
    					'label' => 'Slug',
    					'name' => 'slug',
    					'type' => 'text',
    					'instructions' => 'URL friendly version of the custom post type (e.g. portfolio). Important: Only lowercase letters, numbers, hyphens and underscores. Max. 20 characters.',
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
    					'key' => 'field_568f2f7af2476',
    					'label' => 'Has Archive?',
    					'name' => 'archive',
    					'type' => 'true_false',
    					'instructions' => 'Enables post type archives. Will use the post type as archive-slug.php by default.',
    					'required' => 0,
    					'conditional_logic' => 0,
    					'wrapper' => array (
    						'width' => 50,
    						'class' => '',
    						'id' => '',
    					),
    					'message' => '',
    					'default_value' => 0,
    				),
    				array (
    					'key' => 'field_568f2facf2477',
    					'label' => 'Exclude from search?',
    					'name' => 'exclude_from_search',
    					'type' => 'true_false',
    					'instructions' => 'Whether to exclude posts with this post type from front end search results.',
    					'required' => 0,
    					'conditional_logic' => 0,
    					'wrapper' => array (
    						'width' => 50,
    						'class' => '',
    						'id' => '',
    					),
    					'message' => '',
    					'default_value' => 0,
    				),
    				array (
    					'key' => 'field_568f14a5a24de',
    					'label' => 'Supports',
    					'name' => 'supports',
    					'type' => 'checkbox',
    					'instructions' => 'Select which WP features this CPT will support',
    					'required' => 0,
    					'conditional_logic' => 0,
    					'wrapper' => array (
    						'width' => '',
    						'class' => '',
    						'id' => '',
    					),
    					'choices' => array (
    						'title' => 'title',
    						'editor' => 'editor',
    						'author' => 'author',
    						'thumbnail' => 'thumbnail',
    						'excerpt' => 'excerpt',
    						'trackbacks' => 'trackbacks',
    						'custom-fields' => 'custom-fields',
    						'comments' => 'comments',
    						'revisions' => 'revisions',
    						'page-attributes' => 'page-attributes',
    						'post-formats' => 'post-formats',
    					),
    					'default_value' => array (
    						0 => 'title',
    						1 => 'editor',
    						2 => 'revisions',
    					),
    					'layout' => 'horizontal',
    					'toggle' => 0,
    					'return_format' => 'value',
    				),
    				array (
    					'key' => 'field_568f1562a24df',
    					'label' => 'Menu Position',
    					'name' => 'menu_position',
    					'type' => 'number',
    					'instructions' => '<strong>Determine where this CPT will display in the admin menu</strong><br>
    5 - below Posts, 10 - below Media, 15 - below Links, 20 - below Pages, 25 - below comments, 60 - below first separator, 65 - below Plugins, 70 - below Users, 75 - below Tools, 80 - below Settings, 100 - below second separator',
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
    					'min' => '',
    					'max' => '',
    					'step' => '',
    					'readonly' => 0,
    					'disabled' => 0,
    				),
    				array (
    					'key' => 'field_568f164da24e0',
    					'label' => 'Public',
    					'name' => 'public',
    					'type' => 'select',
    					'instructions' => '',
    					'required' => 0,
    					'conditional_logic' => 0,
    					'wrapper' => array (
    						'width' => 25,
    						'class' => '',
    						'id' => '',
    					),
    					'choices' => array (
    						'true' => 'True',
    						'false' => 'False',
    					),
    					'default_value' => array (
    						0 => 'true',
    					),
    					'allow_null' => 0,
    					'multiple' => 0,
    					'ui' => 0,
    					'ajax' => 0,
    					'placeholder' => '',
    					'disabled' => 0,
    					'readonly' => 0,
    					'return_format' => 'value',
    				),
    				array (
    					'key' => 'field_568f16f8a24e1',
    					'label' => 'Hierarchical',
    					'name' => 'hierarchical',
    					'type' => 'select',
    					'instructions' => 'Choose true to create child pages.',
    					'required' => 0,
    					'conditional_logic' => 0,
    					'wrapper' => array (
    						'width' => 25,
    						'class' => '',
    						'id' => '',
    					),
    					'choices' => array (
    						'true' => 'True',
    						'false' => 'False',
    					),
    					'default_value' => array (
    						0 => 'true',
    					),
    					'allow_null' => 0,
    					'multiple' => 0,
    					'ui' => 0,
    					'ajax' => 0,
    					'placeholder' => '',
    					'disabled' => 0,
    					'readonly' => 0,
    					'return_format' => 'value',
    				),
    				array (
    					'key' => 'field_568f2ecef2474',
    					'label' => 'Custom Taxonomies',
    					'name' => 'custom_taxonomies',
    					'type' => 'checkbox',
    					'instructions' => '(Optional) Whether to register custom category taxonomy or tags for this CPT.',
    					'required' => 0,
    					'conditional_logic' => 0,
    					'wrapper' => array (
    						'width' => 25,
    						'class' => '',
    						'id' => '',
    					),
    					'choices' => array (
    						'category' => 'Categories',
    						'post_tag' => 'Tags',
    					),
    					'default_value' => array (
    					),
    					'layout' => 'horizontal',
    					'toggle' => 0,
    					'return_format' => 'value',
    				),
    				array (
    					'key' => 'field_568f2ecef2474b',
    					'label' => 'Standard Taxonomies',
    					'name' => 'standard_taxonomies',
    					'type' => 'checkbox',
    					'instructions' => '(Optional) Whether to use the standard category taxonomy or tags for this CPT.',
    					'required' => 0,
    					'conditional_logic' => 0,
    					'wrapper' => array (
    						'width' => 25,
    						'class' => '',
    						'id' => '',
    					),
    					'choices' => array (
    						'category' => 'Categories',
    						'post_tag' => 'Tags',
    					),
    					'default_value' => array (
    					),
    					'layout' => 'horizontal',
    					'toggle' => 0,
    					'return_format' => 'value',
    				),
    			),
    		),
    	),
    	'menu_order' => 0,
    	'position' => 'normal',
    	'style' => 'default',
    	'label_placement' => 'top',
    	'instruction_placement' => 'label',
    	'hide_on_screen' => '',
    	'active' => 1,
    	'description' => 'Create and manage custom post types with the ACF plugin.',
    	'local' => 'php'
    ));
    
    endif;
    
    include_once( plugin_dir_path( __FILE__ ) . 'acf-register-cpts.php' ); 
	   
}
	


?>