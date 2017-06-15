<?php 

/*
Plugin Name: Advanced Custom Fields: Content Builder
GitHub Plugin URI: https://github.com/effigy11/acf-content-builder-plugin
Description: Create and manage custom content - Requires Advanced Custom Fields Plugin and Bootstrap
Version:     0.0.4
Author:      EffigyLabs
Author URI:  http://effigy.com.au
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: effigylabs
*/


/*
|--------------------------------------------------------------------------
| CONSTANTS
|--------------------------------------------------------------------------
*/
 
if ( ! defined( 'EFFLAB_CB_BASE_FILE' ) )
    define( 'EFFLAB_CB_BASE_FILE', __FILE__ );
if ( ! defined( 'EFFLAB_CB_BASE_DIR' ) )
    define( 'EFFLAB_CB_BASE_DIR', dirname( EFFLAB_CB_BASE_FILE ) );
if ( ! defined( 'EFFLAB_CB_PLUGIN_URL' ) )
    define( 'EFFLAB_CB_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

/*
|--------------------------------------------------------------------------
| INCLUDE CONTENT BUILDER FIELDSET
|--------------------------------------------------------------------------
*/

include_once( EFFLAB_CB_PLUGIN_URL . 'acf-content-builder-fieldset.php' );
 

/*
|--------------------------------------------------------------------------
| INCLUDE CONTENT BACKEND DISPLAY
|--------------------------------------------------------------------------
*/

add_action('after_setup_theme', 'add_content_builder');
function add_content_builder() {

    if( have_rows('content_block') ): ?>
    	<?php while( have_rows('content_block') ): the_row(); 
    		// vars
    		$contentBlockTitle = get_sub_field('content_block_title');
    		$showContentBlockTitle = get_sub_field('show_content_title');
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
    			
    			<?php if($showContentBlockTitle){ ?>
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
    			    
    			    	<?php
    			    
    			    	/*
    			    	|--------------------------------------------------------------------------
    			    	| CHECK FOR TEMPLATE OVERRIDE
    			    	|--------------------------------------------------------------------------
    			    	*/
    			    	 
    			    	function efflab_cb_get_module_hierarchy( $contentType ) {
    			    	 
    			    	    // Check if a custom template exists in the theme folder, if not, load the plugin template file
    			    	    if ( $module = locate_template( array( 'effigylabs/acf-content-builder/modules/'.$contentTypeSlug.'/'.$contentTypeSlug.'.php' ) ) ) {
    			    	        $file = $module;
    			    	    }
    			    	    else {
    			    	        $file = EFFLAB_CB_BASE_DIR . '/modules/'.$contentTypeSlug.'/'.$contentTypeSlug.'.php';
    			    	    }
    			    	    return $file ;
    			    	}
    			    	
    			    	/*
    			    	|--------------------------------------------------------------------------
    			    	| OUTPUT CONTENT
    			    	|--------------------------------------------------------------------------
    			    	*/
    			    	 
    			    	$content = efflab_cb_get_module_hierarchy( $contentType );
    			    		
    			    	?>
    			        
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