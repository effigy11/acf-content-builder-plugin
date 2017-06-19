<?php 

/*
Plugin Name: Advanced Custom Fields: Content Builder
GitHub Plugin URI: https://github.com/effigy11/acf-content-builder-plugin
Description: Create and manage custom content - Requires Advanced Custom Fields Plugin and Bootstrap
Version:     0.0.5
Author:      EffigyLabs
Author URI:  http://effigy.com.au
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: effigylabs
*/


//  DECLARE CONSTANTS
if ( ! defined( 'EFFLAB_CB_BASE_FILE' ) )
    define( 'EFFLAB_CB_BASE_FILE', __FILE__ );
if ( ! defined( 'EFFLAB_CB_BASE_DIR' ) )
    define( 'EFFLAB_CB_BASE_DIR', dirname( EFFLAB_CB_BASE_FILE ) );
if ( ! defined( 'EFFLAB_CB_PLUGIN_URL' ) )
    define( 'EFFLAB_CB_PLUGIN_URL', plugin_dir_url( __FILE__ ) );


// INCLUDE DEFAULT CONTENT BUILDER FIELDSET
include_once( EFFLAB_CB_BASE_DIR . '/acf-content-builder-fieldset.php' );


// GET CUSTOM CONTENT BUILDER FIELDSETS
echo efflab_cb_get_module_fieldset();


function efflab_cb_get_plugin_module_slugs() {

	// Get default modules from plugin
	$pluginModules = glob( EFFLAB_CB_BASE_DIR .'/modules/*' , GLOB_ONLYDIR );
	
	// Build array of slugs
	if($pluginModules){
	    $pluginModuleArray = [];
	    foreach ($pluginModules as $pluginModule ) {
	    	$urlParts = explode("/", $pluginModule);
	    	$pluginMod = $urlParts[7];
	    	$pluginModuleArray[] = $pluginMod;
	    }// end foreach
	    //print_r($pluginModuleArrary);
	} // endif
	
	return $pluginModuleArray;
}

function efflab_cb_get_theme_module_slugs() {

	// Check if a custom template exists in the theme folder
	$themeModules = glob( get_stylesheet_directory().'/effigylabs/acf-content-builder/modules/*' , GLOB_ONLYDIR );
	
	// Build array of slugs
	if($themeModules){
	$themeModuleArray = [];
		foreach ($themeModules as $themeModule ) {
			$urlParts = explode("/", $themeModule);
			$contentTypeSlug = $urlParts[9];
			$themeModuleArray[] = $contentTypeSlug;
		}// end foreach
		//print_r($themeModuleArrary);
	} // endif
	
	return $themeModuleArray;
}


// CHECK FOR FIELDSETS IN TEMPLATE OVERRIDE
function efflab_cb_get_module_fieldset() {

    $pluginModuleArray = efflab_cb_get_plugin_module_slugs();
    $themeModuleArray = efflab_cb_get_theme_module_slugs();
    
    // See if there is a matching module in theme
    $matchedModules = array_intersect( $themeModuleArray, $pluginModuleArray ); 
    $themeOnlyModules = array_diff( $themeModuleArray, $matchedModules );
    $pluginOnlyModules = array_diff( $pluginModuleArray, $matchedModules );
    
    //print_r( $matchedModules );
    //print_r( $themeOnlyModules );
    //print_r( $pluginOnlyModules );
    
	if( $matchedModules ){
	
		foreach ( $matchedModules as $matchedModule ) {
			// A match was found check if a custom fieldset exists in theme direcory
			if( file_exists( get_stylesheet_directory().'/effigylabs/acf-content-builder/modules/'.$matchedModule.'/'.$matchedModule.'-fieldset.php' ) ) {
				include get_stylesheet_directory().'/effigylabs/acf-content-builder/modules/'.$matchedModule.'/'.$matchedModule.'-fieldset.php';
			} 
			// Else check if a fieldset exists in module directory
			elseif( file_exists( EFFLAB_CB_BASE_DIR .'/modules/'.$matchedModule.'/'.$matchedModule.'-fieldset.php' ) ) {
				include EFFLAB_CB_BASE_DIR .'/modules/'.$matchedModule.'/'.$matchedModule.'-fieldset.php';
			} //endif
		}// end foreach

	}  // endif
	
	if ( $themeOnlyModules ) {
	
		foreach ( $themeOnlyModules as $themeOnlyModule ) {
			// A match was found check if a custom fieldset exists in theme direcory
			if( file_exists( get_stylesheet_directory().'/effigylabs/acf-content-builder/modules/'.$themeOnlyModule.'/'.$themeOnlyModule.'-fieldset.php' ) ) {
				include get_stylesheet_directory().'/effigylabs/acf-content-builder/modules/'.$themeOnlyModule.'/'.$themeOnlyModule.'-fieldset.php';
			}//endif
		}// end foreach
		
	}  // endif
	
	if ( $pluginOnlyModules ) {
	
		foreach ( $pluginOnlyModules as $pluginOnlyModule ) {
			// A match was found check if a custom fieldset exists in theme direcory
			if( file_exists( EFFLAB_CB_BASE_DIR .'/modules/'.$pluginOnlyModule.'/'.$pluginOnlyModule.'-fieldset.php' ) ) {
				include EFFLAB_CB_BASE_DIR .'/modules/'.$pluginOnlyModule.'/'.$pluginOnlyModule.'-fieldset.php';
			} //endif
		}// end foreach
		
	} // endif
}

// CHECK CONTENT BUILDER FOR TEMPLATE OVERRIDES OR CUSTOM MODULES
function efflab_cb_get_module_hierarchy( $contentType, $contentTypeSlug ) {
    // Check if a custom template exists in the theme folder, if not, load the plugin template file
    if ( file_exists( get_stylesheet_directory().'/effigylabs/acf-content-builder/modules/'.$contentTypeSlug.'/'.$contentTypeSlug.'.php') ) {
    	$file = get_stylesheet_directory().'/effigylabs/acf-content-builder/modules/'.$contentTypeSlug.'/'.$contentTypeSlug.'.php';
    }
    else {
        $file = EFFLAB_CB_BASE_DIR .'/modules/'.$contentTypeSlug.'/'.$contentTypeSlug.'.php';
    }
    return $file ;
}


//  CHECK FOR TEMPLATE OVERRIDE
add_action('content_builder', 'add_content_builder');

function add_content_builder() {

    if( have_rows('content_block') ): ?>
    	<?php while( have_rows('content_block') ): the_row(); 
    		// vars
    		$contentBlockTitle = get_sub_field('content_block_title');
    		$showContentBlockTitle = get_sub_field('show_content_title');
    		$moveContentBlockTitle = get_sub_field('move_content_title');
    		$contentBlockIcon = get_sub_field('content_block_icon');
    		$contentBlockAnchor = get_sub_field('content_block_anchor');
    		$contentBlockClass = get_sub_field('content_block_class');
    		$contentFullwidth = get_sub_field('fullwidth');
    		$containerWidth = $contentFullwidth ? 'container-fluid' : 'container';
    		$sectionID = get_sub_field('section_id');
    		$sectionBGcolor = get_sub_field('custom_bg_colour');
    		$sectionTextColor = get_sub_field('custom_text_colour');
    		$sectionCustomSpacing = '';
    		
    		if( have_rows( 'section_custom_spacing' ) ):
    			while( have_rows( 'section_custom_spacing' ) ) : the_row(); 
    			    $spacingType = get_sub_field('custom_spacing_type');
    			    $spacingSide = get_sub_field('custom_spacing_side');
    			    $spacingSize = get_sub_field('custom_spacing_size');
    			    if( $spacingSide == 'a' ): $spacingSide = ''; endif;
    			    $sectionCustomSpacing .= $spacingType.$spacingSide.'-'.$spacingSize.' ';
    			endwhile; 
    			// echo $sectionCustomSpacing;
    		endif;
    		?>
    	
    		<!-- Section Block -->
    		<div id="<?php echo $sectionID ;?>" class="section-small <?php echo $sectionCustomSpacing;?> <?php echo $sectionBGcolor;?> <?php echo $sectionTextColor;?> <?php echo $containerWidth;?> <?php echo $contentBlockClass;?>" >
    		
    			<?php if ($containerWidth == 'container-fluid'){ echo '<div class="container pt-xlg">'; } // Add container if fullwidth ?>
    			
    			<?php if($showContentBlockTitle && !$moveContentBlockTitle ){ ?>
    				<header>
    				    <h2 class="section-title"><?php echo $contentBlockTitle; ?></h2>
    				</header>
    			<?php } ?>
    			
    			<div class="row">
    			    <?php 
    			        $total_width = 0;
    			        if( have_rows('columns') ) : 
    			        
    			        while( have_rows('columns') ) : the_row(); 
    			            $width           = get_sub_field('column_width');
    			            $last            = get_sub_field('last_column');
    			            $contentType     = get_sub_field('choose_a_content_type');
    			            $contentTypeSlug = str_replace(' ', '-', strtolower($contentType));
    			            $colCustomClass  = get_sub_field('custom_class');
    			            $total_width += $width;
    			            
    			        if ($total_width > 12) {
    			            $total_width = $width;
    			            echo '</div>';
    			            echo '<div class="row">';
    			        } ?>
    			        
    			    <div class="col-md-<?php echo $width; ?> columns mb-lg <?php echo $colCustomClass; ?>">
    			    
    			    		<?php include efflab_cb_get_module_hierarchy( $contentType, $contentTypeSlug );?>
    			    		
    			    </div>
    			    
    			        <?php
    			        if ($last == '1') {
    			            $total_width = 0;
    			            echo '</div>';
    			            echo '<div class="row">';
    			        } 
    			       
    			       endwhile; 
    			       endif;
    			    ?>
    			</div>

    			
    			<?php if ($containerWidth == 'container-fluid'){ echo '</div>'; } // Add close container if fullwidth?>
    			
    		</div>
    		<!-- /Section Block -->
    		
    				
    	<?php endwhile; ?>
    	
    <?php endif; 
    
}

?>