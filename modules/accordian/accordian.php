<?php 

/*
Advanced Custom Fields: Accordian Module
Description: Display Accordian content
*/

if( have_rows('accordion') ): ?>

	<!-- Panels -->
	<div class="panel-group" id="accordion">

	<?php // Start count of accordion items;
	$counter = 0;
	
	while( have_rows( 'accordion' ) ): the_row(); 
		$icon  = get_sub_field('icon');
		$title = get_sub_field('title');
		$text  = get_sub_field('text');
	?>
	
	<div class="panel panel-theme">
	
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
		        
		            <a class="collapse-header collapse <?php echo $collapsed;?>" data-toggle="collapse" data-parent="#accordion" data-target="#bml-0<?php print( $counter + 1 ); ?>" aria-expanded="<?php echo $ariaExpanded;?>">
		                <i class="fa fa-fw <?php echo $icon; ?>" aria-hidden="true"></i> <?php echo $title ;?>
		                <i class="fa fa-fw fa-angle-down collapse-icon"></i>
		            </a>
		        </h4>
		    </div>
		    
		   <div id="bml-0<?php print( $counter + 1 ); ?>" class="panel-collapse collapse <?php echo $collapseIn;?>">
		        <div class="panel-body">
		            <div class="row">
		            	<div class="col-md-12">
		            		<?php if($text){ 
	        					echo '<p>'.$text.'</p>';
		            		 } ?>
		                </div>
		            </div>
		        </div>
		    </div>
		    
		</div>
	<?php $counter++; ?>
	<?php endwhile; ?>
	
	</div>
	<!-- /Panels -->

<?php endif; 
?>