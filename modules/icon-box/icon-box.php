<?php 

/*
Advanced Custom Fields: Icon Boxes Module
Description: Display icon boxes content
*/

if( have_rows('icon_boxes') ):
// Get count of Icon Boxes;

	$counter = 0;
	while( have_rows( 'icon_boxes' ) ): the_row(); 
		$counter++; // add one per row ?	
	endwhile; 
	
	while( have_rows( 'icon_boxes' ) ): the_row(); 
		$icon  = get_sub_field('icon');
		$title = get_sub_field('title');
		$text  = get_sub_field('text');
		$link  = get_sub_field('link');
		
		if( $counter == '3' || $counter == '6' ) {
			$columnClass = 'col-md-4 col-sm-6';
		} elseif( $counter == '5' ) {
			$columnClass = 'col-md-3 col-sm-6';
		} else { // $counter = 4
			$columnClass = 'col-md-6 col-sm-6';
		}
	?>
	
	<div class="<?php echo $columnClass;?> more-feature">
		<div class="media">
		    <div class="media-left">
		    	<i class="fa fa-2x <?php echo $icon; ?>" aria-hidden="true"></i>
		        <span class="icon_link_alt icon"></span>
		    </div>
		    <div class="media-body">
		        <h3 class="title mt-none"><?php echo $title;?></h3>
		        <p class="description"><?php echo $text;?></p>
		    </div>
		</div>
	</div>

	<?php endwhile; 
	
endif; 
?>