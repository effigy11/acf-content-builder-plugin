<?php 

add_action( 'init', 'create_effigylabs_sliders', 0 );

function create_effigylabs_sliders() {
    
	$singularUpperCase = 'Slider';
	$cptSlug = 'slider';
	$singularLowerCase = 'slider';
	$pluralUpperCase = 'Sliders';
	$pluralLowerCase = 'sliders';
	$dashIcon = EFFLAB_CB_PLUGIN_URL.'img/effigy-dashicon.png';

    $labels = 	array(
    		    'name' => _x( $pluralUpperCase, 'post type general name'),
    		    'singular_name' => _x( $singularUpperCase , 'post type singular name'),
    		    'add_new' => _x('Add New', $singularUpperCase),
    		    'add_new_item' => __('Add New '.$singularUpperCase),
    		    'edit_item' => __('Edit '.$singularLowerCase),
    		    'new_item' => __('New '.$singularLowerCase),
    		    'view_item' => __('View '.$singularLowerCase),
    		    'search_items' => __('Search '.$pluralLowerCase),
    		    'not_found' =>  __('No '.$pluralLowerCase.' found'),
    		    'not_found_in_trash' => __('No '.$pluralLowerCase.' found in Trash'),
    		    'parent_item_colon' => ''
    			);
      // Add supports here
      // See http://codex.wordpress.org/Function_Reference/register_post_type
      
      $supports = array('title','editor','thumbnail');
      $menu_position = 25;
      $public = true;
      $hierarchical = false;
      $excludeSearch = false;
      $hasArchive = true;
          
      register_post_type( 	$cptSlug ,
    					    array(
    					      'labels' => $labels,
    					      'public' => $public,
    					      'supports' => $supports,
    					      'hierarchical' => $hierarchical,
    					      'rewrite' => array( 'slug' => $cptSlug ),
    					      'has_archive' => $hasArchive,
    					      'exclude_from_search' => $excludeSearch,
    					      'menu_icon' => $dashIcon,
    					      'menu_position' => $menu_position // Position CPT Below Pages
    					    )
      );
      
      // CHECK IF This CPT has Category and/or Tags checks
      create_effigylabs_slider_categories( $cptSlug );
      
    }
    
    
// hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_effigylabs_slider_categories', 0 );

// create two taxonomies, genres and writers for the post type "book"
function create_effigylabs_slider_categories( $cptSlug ) {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Categories', 'taxonomy general name' ),
		'singular_name'     => _x( 'Category', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Categories' ),
		'all_items'         => __( 'All Categories' ),
		'parent_item'       => __( 'Parent Category' ),
		'parent_item_colon' => __( 'Parent Category:' ),
		'edit_item'         => __( 'Edit Category' ),
		'update_item'       => __( 'Update Category' ),
		'add_new_item'      => __( 'Add New Category' ),
		'new_item_name'     => __( 'New Category Name' ),
		'menu_name'         => __( 'Category' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => $cptSlug.'_category' ),
	);
	register_taxonomy( $cptSlug.'_category', array( $cptSlug ), $args );
}

?>