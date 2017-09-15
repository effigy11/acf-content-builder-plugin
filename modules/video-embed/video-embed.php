<?php 

/*
Advanced Custom Fields: Video Embed Module
Description: Display embedded video content
*/

if ($contentType == 'Video Embed'): 

	$videoEmbedUrl = get_sub_field('video_url');
	
	if($videoEmbedUrl):
		$videoEmbedRatio = get_sub_field('video_ratio') == '16by9' ? '16by9' : '4by3';
		$videoEmbedControls = get_sub_field('show_video_controls') ? 'controls=0&amp;' : '';
		$videoEmbedInfo = get_sub_field('show_video_information') ? 'showinfo=0' : '';
		$videoEmbedrelated = get_sub_field('show_related_videos') ? 'rel=0&amp;' : '';
	?>
	
	<!-- Section: Video Embed Content -->
	
        <div class="embed-responsive embed-responsive-<?php echo $videoEmbedRatio;?>">
        	<iframe class="" src="<?php echo $videoEmbedUrl;?>?<?php echo $videoEmbedrelated;?><?php echo $videoEmbedControls;?><?php echo $videoEmbedInfo;?>" width="300" height="150"></iframe>
        </div>
        
	<!-- /Section: Video Embed Content -->

<?php endif; endif; ?>