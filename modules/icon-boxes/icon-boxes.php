<?php 

/*
Advanced Custom Fields: Icon Boxes Module
Description: Display icon boxes content
*/

// Get Icon Boxes Style;
$iconBoxStyle = get_sub_field('icon_box_style');
$iconHoverEffect = get_sub_field('icon_hover_effect');


if( have_rows('icon_boxes') ):
// Get count of Icon Boxes;
	
	//var_dump($iconBoxStyle);
	
	if($showContentBlockTitle && $moveContentBlockTitle ){ ?>
		<header>
		    <h2 class="mb-sm"><?php echo $contentBlockTitle; ?></h2>
		</header>
	<?php $topborder = 'top-border'; ?>
		
	<?php } ?>
	
	<div class="<?php echo $topborder; ?> pt-lg">

	<?php 
	echo '<div class="featured-boxes featured-boxes-style-'.$iconBoxStyle.'">';
	echo '<div class="row">';

	$counter = 0;
	while( have_rows( 'icon_boxes' ) ): the_row(); 
		$counter++; // add one per row ?	
	endwhile; 
	
	while( have_rows( 'icon_boxes' ) ): the_row(); 
		$icon  = get_sub_field('icon');
		$title = get_sub_field('title');
		$text  = get_sub_field('text');
		$links  = get_sub_field('link');
		
		if( $links ): 
		    foreach( $links as $post): // variable must be called $post (IMPORTANT)
		        setup_postdata($post);
		        $link = get_permalink();
		    endforeach;
		    wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly
		endif; 
		
		if( $counter == '3' || $counter == '6' ) {
			$columnClass = 'col-md-4 col-sm-6';
		} elseif( $counter == '5' ) {
			$columnClass = 'col-md-3 col-sm-6';
		} else { // $counter = 4
			$columnClass = 'col-md-3 col-sm-6';
		}
	?>
	
	<div class="<?php echo $columnClass;?>">
	
		<div class="featured-box featured-box-primary featured-box-effect-<?php echo $iconHoverEffect ;?>">
			<div class="box-content">
				<a href="<?php echo $link;?>">
					<i class="icon-featured fa <?php echo $icon; ?>" aria-hidden="true"></i>
					<span class="icon_link_alt icon"></span>
				</a>
				<a href="<?php echo $link;?>"><h4><?php echo $title;?></h4></a>
				<?php if($iconBoxStyle = 4){
					echo '<div class="divider divider-small divider-small-center">';
					echo '<hr>';
					echo '</div>';
				}?>
				<p><?php echo $text;?></p>
			</div>
		</div>
		
	</div>

	<?php endwhile; 
	
	echo '</div>'; // /.row
	echo '</div>'; // /.featured-boxes
	echo '</div>'; // /.topborder
	
endif; 
?>


