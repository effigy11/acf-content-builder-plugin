<?php 

/*
Advanced Custom Fields: Gallery Content Module
Description: Display gallery content
*/

if ($contentType == 'Gallery'){

	$gallery = get_sub_field('column_gallery');

	if($gallery){
		$images = $gallery;
		if($galleryType == 'Carousel' ){ 
			$galleryClass = 'projects-carousel'; // Carousel
		} else { 
			$galleryClass = 'project-carousel';  // Slider
		}
		if( $images ): ?>
		
			<?php if($showContentBlockTitle && $moveContentBlockTitle ){ ?>
				<header>
				    <h2 class="mb-sm"><?php echo $contentBlockTitle; ?></h2>
				</header>
			<?php } ?>
			
		    <div class="owl-carousel owl-theme show-nav-title top-border" data-plugin-options='{"items": 5, "margin": 30, "loop": false, "nav": true, "dots": false}'>
		        <?php foreach( $images as $image ): ?>
		            <div>
			            <img alt="" class="img-responsive img-rounded" src="<?php echo $image['url']; ?>">
		            </div>
		        <?php endforeach; ?>
		    	</div>
		    </div>
		    
		<?php endif; 
	}
	
}

?>