<?php 

/*
Advanced Custom Fields: Gallery Content Module
Description: Display gallery content
*/

if ($contentType == 'Gallery'){

	$gallery = get_sub_field('column_gallery');
	
	if($gallery){
	
		$galleryType = get_sub_field('choose_a_gallery_type');
		$images = $gallery;
		
		if( $images ): ?>
		
		    <?php if( $galleryType === 'Carousel'){ ?>
		    
		    	<div class="lightbox" data-plugin-options='{"delegate": "a", "type": "image", "gallery": {"enabled": true}, "mainClass": "mfp-with-zoom", "zoom": {"enabled": true, "duration": 300}}'>
		    		<div class="owl-carousel owl-theme show-nav-title <?php echo $topborder; ?>" data-plugin-options='{"items": 5, "margin": 30, "loop": false, "nav": true, "dots": false}'>
		    	    <?php foreach( $images as $image ): ?>
		    	        <div>
	    	            	<a href="<?php echo $image['url']; ?>" class="img-thumbnail img-thumbnail-hover-icon mb-xs mr-xs">
	    		            	<img alt="" class="img-responsive img-rounded" src="<?php echo $image['url']; ?>">
	    		            </a>
		    	        </div>
		    	    <?php endforeach; ?>
		    		</div>
		    	</div>
		    
		    <?php } else { ?>
		    
		    	<div class="thumb-gallery">
			    	<div class="lightbox" data-plugin-options='{"delegate": "a", "type": "image", "gallery": {"enabled": true}, "mainClass": "mfp-with-zoom", "zoom": {"enabled": true, "duration": 300}}'>
			    	
			    		<div class="owl-carousel owl-theme manual thumb-gallery-detail show-nav-hover" id="thumbGalleryDetail">
				    	    <?php foreach( $images as $image ): ?>
				    	        			    	        
				    	        <div>
				    	        	<a href="<?php echo $image['url']; ?>" class="img-thumbnail img-thumbnail-hover-icon mb-xs mr-xs">
					    	        	<img alt="Project Image" src="<?php echo $image['url']; ?>" class="img-responsive">
				    	        	</a>
				    	        </div>
				    	        
				    	    <?php endforeach; ?>
			    		</div>
			    		
			    		
			    		<div class="owl-carousel owl-theme manual thumb-gallery-thumbs mt" id="thumbGalleryThumbs">
			    		    <?php foreach( $images as $image ): ?>
			    		        			    	        
			    		        <div>
			    		        	<span class="img-thumbnail cur-pointer">
			    		        		<img alt="Project Image" src="<?php echo $image['url']; ?>" class="img-responsive">
			    		        	</span>
			    		        </div>
			    		        
			    		    <?php endforeach; ?>
			    		</div>
			    		
			    		
			    	</div>
		    	</div>
		    
		    <?php } ?>
			
			
				
		
			
			
		<?php endif; 
	}
	
}

?>