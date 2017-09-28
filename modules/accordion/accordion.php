<?php 

/*
Advanced Custom Fields: Accordian Module
Description: Display Accordian content
*/

if( have_rows('accordion') ): ?>

	<?php // Start count of accordion items;
	$counter = 0;
	$randomGroupID = uniqid();
	?>
	
    <!-- Panels -->
	<div class="panel-group" id="accordion-<?php echo $randomGroupID ;?>">

	<?php
		while( have_rows( 'accordion' ) ): the_row(); 
		$icon  = get_sub_field('icon');
		$title = get_sub_field('title');
		$text  = get_sub_field('text');
		$randomID = uniqid();
	?>
	
	<div class="panel panel-default">
	
		    <div class="panel-heading">
		        <h4 class="panel-title">
		        	 <?php if ($counter < 1 ) { 
		        	 	$ariaExpanded = 'false'; // true
		        	 	$collapseIn = ''; // in
		        	 	$collapsed = 'collapsed'; // ''
		        	 } else { 
		        	 	$ariaExpanded = 'false'; 
		        	 	$collapseIn = '';
		        	 	$collapsed = 'collapsed';
		        	 } ?>
		        
		            <a class="accordion-toggle collapse-header collapse <?php echo $collapsed;?>" data-toggle="collapse" data-parent="#accordion-<?php echo $randomGroupID ;?>" data-target="#efflab-<?php echo $randomID ;?>-0<?php print( $counter + 1 ); ?>" aria-expanded="<?php echo $ariaExpanded;?>">
		                <i class="fa fa-fw <?php echo $icon; ?>" aria-hidden="true"></i> <?php echo $title ;?>
		                <i class="fa fa-fw fa-angle-down collapse-icon"></i>
		            </a>
		        </h4>
		    </div>
		    
		   <div id="efflab-<?php echo $randomID ;?>-0<?php print( $counter + 1 ); ?>" class="accordion-body collapse <?php echo $collapseIn;?>">
		        <div class="panel-body">
		            
            		<?php if($text){ echo '<p>'.$text.'</p>';} ?>
		          
		        </div>
		    </div>
		    
		</div>
	<?php $counter++; ?>
	<?php endwhile; ?>
	
	<!-- /Panels -->
	</div>

<?php endif; 
?>