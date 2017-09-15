<?php 

if( have_rows('custom_post_types', 'option') ): 

add_action( 'init', 'create_acf_cpt' );
function create_acf_cpt() {

    while( have_rows('custom_post_types', 'option') ): the_row(); 
    
    	$singularUpperCase = get_sub_field('singular_label');
    	$cptSlug = get_sub_field('slug');
    	$singularLowerCase = strtolower(get_sub_field('singular_label'));
    	$pluralUpperCase = get_sub_field('plural_label');
    	$pluralLowerCase = strtolower(get_sub_field('plural_label'));
    	$dashIcon = plugin_dir_url( __FILE__ ) . 'img/effigy-dashicon.png';

        $labels = 	array(
        		    'name' => _x( $pluralUpperCase, 'post type general name'),
        		    'singular_name' => _x( $singularUpperCase , 'post type singular name'),
        		    'add_new' => _x('Add New', $singularUpperCase),
        		    'add_new_item' => __('Add new '.$singularUpperCase),
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
          
          $supports = get_sub_field('supports');
          $menu_position = get_sub_field('menu_position');
          if(get_sub_field('public') == 'true'){
	          	$public = true;
	          } else {
	          	$public = false;
	          }
          if(get_sub_field('hierarchical') == 'true'){
	          	$hierarchical = true;
	          } else {
	          	$hierarchical = false;
	          }
          if( get_sub_field('exclude_from_search') ){
	            $excludeSearch = true;
	          }else{
	            $excludeSearch = false;
	          }
          if( get_sub_field('archive') ){
	            $hasArchive = true;
	          }else{
	            $hasArchive = false;
	          }
	          
                    
          // CHECK IF This CPT has Category and/or Tags checks
          $standardTaxonomies = get_sub_field('standard_taxonomies');
          $standardCat='';
          $standardTag = '';
          if( in_array('category', (array) $standardTaxonomies ) ) {
          	$standardCat = 'category';
          }
          if( in_array('post_tag', (array) $standardTaxonomies ) ) {
          	$standardTag = 'post_tag';
          }
          
          // CHECK IF This CPT has Category and/or Tags checks
          $customTaxonomies = get_sub_field('custom_taxonomies');
          if( in_array('category', (array) $customTaxonomies ) ) {
          	create_acf_categories( $cptSlug );
          }
          if( in_array('post_tag', (array) $customTaxonomies) ) {
          	create_acf_tags( $cptSlug );
          }
          
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
          					      'menu_position' => $menu_position, // Position CPT Below Pages
          					      'taxonomies'   => array($standardCat, $standardTag )
          					    )
          );
          

     endwhile;
    }
    
// hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_acf_categories');

// create two taxonomies, genres and writers for the post type "book"
function create_acf_categories( $cptSlug ) {
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

// hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_acf_tags' );

// create two taxonomies, genres and writers for the post type "book"
function create_acf_tags( $cptSlug ) {
	// Add new taxonomy, NOT hierarchical (like tags)
	$labels = array(
		'name'                       => _x( 'Tags', 'taxonomy general name' ),
		'singular_name'              => _x( 'Tag', 'taxonomy singular name' ),
		'search_items'               => __( 'Search Tags' ),
		'popular_items'              => __( 'Popular Tags' ),
		'all_items'                  => __( 'All Tags' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Tag' ),
		'update_item'                => __( 'Update Tag' ),
		'add_new_item'               => __( 'Add New Tag' ),
		'new_item_name'              => __( 'New Tag Name' ),
		'separate_items_with_commas' => __( 'Separate tags with commas' ),
		'add_or_remove_items'        => __( 'Add or remove tags' ),
		'choose_from_most_used'      => __( 'Choose from the most used tags' ),
		'not_found'                  => __( 'No tags found.' ),
		'menu_name'                  => __( 'Tags' ),
	);

	$args = array(
		'hierarchical'          => false,
		'labels'                => $labels,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array( 'slug' => $cptSlug.'_tags' ),
		
		
	);

	register_taxonomy( $cptSlug.'_tags', $cptSlug , $args );
}
    
endif;


?>