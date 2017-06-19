<?php 

/*
Advanced Custom Fields: Icon Boxes Module
Description: Display icon boxes content
*/

// Create publication display based on relationship
					
$publication = get_sub_field('publication');

if( $publication ):

$posts = $publication;

if( $posts ): ?>

    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
        <?php setup_postdata($post); ?>
       
        <!-- Section: Modules -->
            <?php 
        	    // GET OTHER ISSUES
        	    $rows = get_field('publications' ); // get all the rows
    			$first_row = $rows[0]; // get the first row
    			$first_row_image = $first_row['cover_graphic' ]; // get the sub field value 
    			$first_row_url = $first_row['issuu_url' ]; // get the sub field value 
    			$first_row_download = $first_row['download_url' ]; // get the sub field value 
    			$first_row_number = $first_row['issue_number' ]; // get the sub field value 
    			$first_row_desc = $first_row['issue_description' ]; // get the sub field value
        	?>
        	
            <div class="col-xs-6 col-md-12 mb-md">
            	<a href="<?php echo $first_row_url; ?>" target="_blank">
            		<div class="publication-image">
            			<img class="img-responsive" src="<?php echo $first_row_image; ?>" alt="<?php echo $first_row_number; ?>">
            		</div>
            	</a>
        		<div class="info">
        		    <div class="h6 title pb-xs mb-xs text-center mt-sm"><?php echo $first_row_number; ?></div>
        		    <ul class="social-share mb-xs hidden-xs">
    	                <li><a href="<?php echo $first_row_url; ?>"><i class="fa fa-fw fa-eye"></i></a></li>
    	                <li><a href="<?php echo $first_row_download; ?>"><i class="fa fa-fw fa-cloud-download"></i></a></li>
    	            </ul>
        		</div>
            	
            </div>
        <!-- /Section: Modules -->
        
        
    <?php endforeach; ?>

    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
    
	
<?php endif;

endif; 