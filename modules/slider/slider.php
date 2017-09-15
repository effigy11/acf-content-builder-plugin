<?php 

/*
Advanced Custom Fields: Slider Module
Description: Display slider content
*/

// Create slider display
//$slider = get_sub_field('slider');

//if( $slider ):

$args = array(
    'post_type'=> 'slider',
    'order'    => 'ASC'
    );              

$the_query = new WP_Query( $args );
if($the_query->have_posts() ) : ?>

<!-- Slider -->
<div class="slider-container light rev_slider_wrapper">
	<div id="revolutionSlider" class="slider rev_slider" data-plugin-revolution-slider data-plugin-options='{"delay": 5000, "gridwidth": 1170, "gridheight": 400, "disableProgressBar": "on"}'>
		<ul>	
				
		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		
			<?php //setup vars
				$redirect = get_field('redirect') ? get_field('redirect') : '#';
				$sliderimages = get_field('slider_images');
				$modalTrigger = get_field('modal_target');
				$modalContent = get_field('modal_content');
				$modalTarget = $modalTrigger ? $redirect = '#'.$modalTrigger : '';
				$modalClass = $modalTrigger ? 'open-popup-link' : 'null';
			?>
			
			<!-- Slide -->
			<?php if( $sliderimages ): ?>
			<?php foreach( $sliderimages as $image ): ?>
			        
			<li data-transition="fade">
				<img src="<?php echo $image['url']; ?>"  
					alt=""
					data-bgposition="center center" 
					data-bgfit="cover" 
					data-bgrepeat="no-repeat" 
					data-kenburns="on"
					data-duration="5000"
					data-ease="Linear.easeNone"
					data-scalestart="150"
					data-scaleend="100"
					data-rotatestart="0"
					data-rotateend="0"
					data-offsetstart="0 0"
					data-offsetend="0 0"
					data-bgparallax="0"
					class="rev-slidebg">
			</li>
							
			<?php endforeach; ?>
			<?php endif; ?>
			<!-- /Slide -->
			
		<?php endwhile; ?>
	
		</ul>
	</div>
</div>
<!-- /Slider -->
	
<?php endif; 

wp_reset_query();

//endif;  // if slider ?>