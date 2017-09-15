<?php 

/*
Advanced Custom Fields: Publication Module
Description: Display publication content
*/

// Create publication display based on relationship
$publication = get_sub_field('publication');

if( $publication ):

$posts = $publication;
$pubCount = get_sub_field('publication_count');
$pubHide = get_sub_field('publication_hide');


if( $posts ): ?>

	<?php if( $pubCount == 1 ){ ?>
	
		<?php foreach( $posts as $p ): // variable must be called $post (IMPORTANT) ?>
		
		    <!-- Section: Publications -->
		        <?php 
		    	    // GET FIRST ISSUE
		    	    $rows = get_field('publications', $p->ID); // get all the rows
		    	    $rowCount = count($rows);
					$first_row = $rows[0]; // get the first row
					$first_row_image = $first_row['cover_graphic' ]; // get the sub field value 
					$first_row_url = $first_row['issuu_url' ]; // get the sub field value 
					$first_row_download = $first_row['download_url' ]; // get the sub field value 
					$first_row_number = $first_row['issue_number' ]; // get the sub field value 
					$first_row_desc = $first_row['issue_description' ]; // get the sub field value
		    	?>
		    	
		    	<div class="row pt-lg">
		    	
		        <div class="col-xs-12 col-sm-6 col-md-4 mb-lg">
		        	<a href="<?php echo $first_row_url; ?>" target="_blank">
		        		<div class="publication-image">
		        			<img class="img-responsive" src="<?php echo $first_row_image; ?>" alt="Fresh Source - <?php echo $first_row_number; ?>">
		        		</div>
		        	</a>
		        </div>
		        
		        <div class="col-xs-12 col-sm-6 col-md-8 ">
		        	<h3 class="mb-md"><?php echo get_the_title($p->ID);?> - <?php echo $first_row_number; ?></h3>
		        	<div class="hidden-xs mb-lg"><?php echo $first_row_desc; ?></div>
		        	<a class="btn btn-md btn-primary mb-md" href="<?php echo $first_row_url; ?>" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i> READ ONLINE</a>
		        	<?php if($first_row_download):?>
		        		<a class="btn btn-md btn-secondary mb-md" href="<?php echo $first_row_download; ?>"><i class="fa fa-cloud-download" aria-hidden="true"></i> DOWNLOAD</a>
		        	<?php endif;?>
		        	<div class="clearfix"></div>
		        	<?php if($rowCount > 1):?>
		        		<a href="#previous-issues" class="btn-link btn-sm mt-md text-uppercase">View previous issues</a>
		        	<?php endif;?>
		        <div class="visible-xs mb-lg"></div>
		        </div>
		        
		        </div>
		   
		   <!-- /Section: Publications -->
		    
		<?php endforeach; ?>
			
	<?php } else { ?>
	
		<!-- Section: Previous Publications -->
				<div id="previous-issues" class="owl-carousel owl-theme show-nav-title <?php echo $topborderPub; ?>" data-plugin-options='{"responsive": {"0": {"items": 2}, "479": {"items": 3}, "768": {"items": 4}, "979": {"items": 4}, "1199": {"items": <?php echo $pubCount; ?>}}, "items": <?php echo $pubCount; ?>, "margin": 30, "loop": false, "nav": true, "dots": false}'>
				<?php foreach( $posts as $p ): ?>
				
					<?php if(get_field('publications', $p->ID)): $i = 0; while(has_sub_field('publications', $p->ID)): $i++; if ($i != $pubHide ): if ($i <= $pubCount ):
					    // GET OTHER ISSUES
						$coverGraphic = get_sub_field('cover_graphic'); // get the sub field value 
						$issuuUrl = get_sub_field('issuu_url'); // get the sub field value 
						$issueDownload = get_sub_field('download_url'); // get the sub field value 
						$issueNumber = get_sub_field('issue_number'); // get the sub field value 
						$issueDesc = get_sub_field('issue_description'); // get the sub field value 
					?>
					
				    <div>
				    	<div>
				        	<a href="<?php echo $issuuUrl; ?>" target="blank">
				            	<img alt="<?php echo $issueNumber; ?>" class="img-responsive img-rounded" src="<?php echo $coverGraphic; ?>">
				            </a>
				        </div>
				        <div class="info">
				            <div class="h6 title pb-xs mb-xs text-center mt-sm"><?php echo $issueNumber;?></div>
				            <div class="btn-group btn-group-justified hidden-xs" role="group">
				                <a href="<?php echo $issuuUrl; ?>" type="button" class="btn btn-primary mb-sm"><i class="fa fa-fw fa-eye"></i></a>
				                <?php if($issueDownload):?>
				                	<a href="<?php echo $issueDownload; ?>" type="button" class="btn btn-secondary mb-sm"><i class="fa fa-fw fa-cloud-download"></i></a>
				                <?php endif;?>
				            </div>
				        </div>
				        
				        
				    </div>
				
					<?php endif; endif; endwhile; endif; ?>
				
				<?php endforeach; ?>
				</div>
		 <!-- /Section: Previous Publications -->		
	
	<?php }

    
endif; // if posts

endif;  // if publication ?>