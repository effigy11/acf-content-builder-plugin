<?php 

/*
Advanced Custom Fields: Publication Module
Description: Display publication content
*/

// Create publication display based on relationship
$publication = get_sub_field('publication');

if( $publication ):

$posts = $publication;

if( $posts ): ?>


	<?php if($showContentBlockTitle && $moveContentBlockTitle ){ ?>
		<header>
		    <h2 class="mb-sm"><?php echo $contentBlockTitle; ?></h2>
		</header>
		
		<?php $topborder = 'top-border'; ?>
	<?php } ?>

    <?php foreach( $posts as $p): // variable must be called $post (IMPORTANT) ?>
    
       
        <!-- Section: Publications -->
        
            <?php 
        	    // GET FIRST ISSUE
        	    $rows = get_field('publications', $p->ID); // get all the rows
    			$first_row = $rows[0]; // get the first row
    			$first_row_image = $first_row['cover_graphic' ]; // get the sub field value 
    			$first_row_url = $first_row['issuu_url' ]; // get the sub field value 
    			$first_row_download = $first_row['download_url' ]; // get the sub field value 
    			$first_row_number = $first_row['issue_number' ]; // get the sub field value 
    			$first_row_desc = $first_row['issue_description' ]; // get the sub field value
        	?>
        	
        	<div class="<?php echo $topborder; ?> pt-lg">
        	
            <div class="col-xs-5 col-sm-6 col-md-4 mb-lg">
            	<a href="<?php echo $first_row_url; ?>" target="_blank">
            		<div class="publication-image">
            			<img class="img-responsive" src="<?php echo $first_row_image; ?>" alt="Fresh Source - <?php echo $first_row_number; ?>">
            		</div>
            	</a>
            </div>
            
            <div class="col-xs-7 col-sm-6 col-md-8">
            	<h3 class="mb-md"><?php echo get_the_title($p->ID);?> - <?php echo $first_row_number; ?></h3>
            	<p class="hidden-xs mb-lg"><?php echo $first_row_desc; ?></p>
            	<a class="btn btn-md btn-primary mb-md" href="<?php echo $first_row_url; ?>" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i> READ ONLINE</a>
            	<a class="btn btn-md btn-secondary mb-md" href="<?php echo $first_row_download; ?>"><i class="fa fa-cloud-download" aria-hidden="true"></i> DOWNLOAD</a>
            	<div class="clearfix"></div>
            	<a href="#previous-issues" class="btn-link btn-sm mt-md text-uppercase">View previous issues</a>
            </div>
            
            </div>
       
       <!-- /Section: Publications -->
        
        
    <?php endforeach;

endif; // if posts

endif;  // if publication ?>