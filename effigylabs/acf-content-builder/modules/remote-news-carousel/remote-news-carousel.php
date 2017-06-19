<?php 

/*
Advanced Custom Fields: Remote News Carousel Module
* Uses the Wordpress Restful API to
* retreive posts from another Wordpress website
Description: Display news carousel content
*/

require_once 'remote-news-carousel-api-link.php';

if ( $contentType == 'Remote News Carousel' ) {

	$remoteNewsSource = get_sub_field('remote_news_carousel_source');
	$remoteNewsCat = get_sub_field('remote_news_carousel_category');
	$remoteNewsCatId = get_sub_field('remote_news_carousel_cat_id');
	$remoteNewsCount = get_sub_field('remote_news_carousel_count');
	$remoteNewsMeta = get_sub_field('remote_news_carousel_meta');
	$remoteNewsImage = get_sub_field('remote_news_carousel_image');
	if($remoteNewsImage){
		$remoteNewsImageURL = get_sub_field('remote_news_carousel_default_image');
	}

	//$categoryValue = $category['value'];
	//$categoryLabel = str_replace(' ', '-', strtolower($category['label']));
	//$contentSlug = str_replace(' ', '-', strtolower($contentType));
	
	?>
	
	<!-- Section: Latest News -->
		        	
    	<?php if($showContentBlockTitle && $moveContentBlockTitle ){ ?>
    		<header>
    		    <h2 class="mb-sm"><?php echo $contentBlockTitle; ?></h2>
    		</header>
    	<?php } ?>
    	
        <div class="owl-carousel owl-theme show-nav-title top-border" data-plugin-options='{"responsive": {"0": {"items": 1}, "479": {"items": 1}, "768": {"items": 2}, "979": {"items": 3}, "1199": {"items": 4}}, "items": 4, "margin": 30, "loop": false, "nav": true, "dots": false}'>
        
				<!-- See child-theme/inc/bml-news-api-link -->
                <?php echo get_news_api( $remoteNewsSource, $remoteNewsCount, $remoteNewsCatId, $remoteNewsCat, $remoteNewsMeta, $remoteNewsImage, $remoteNewsImageURL ) ;?>

        </div>
		
	<!-- /Section: Latest News -->
	
<?php }