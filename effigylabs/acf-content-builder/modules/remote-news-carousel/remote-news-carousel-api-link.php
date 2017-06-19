<?php

// send request to news.brisbanemarkets to retrieve news
function get_news_api( $webURL, $postCount, $postCategory, $postLabel, $showMeta, $showImage, $showImageURL ) {

	// Setup Variables for testing
 	 //$webURL = 'https://poststatus.com';
 	 $apiBit = '/wp-json/wp/v2';
	 //$postCount = 6;
	 if(!$postCategory){ $postCategory = 1; }
	 //$postLabel = '';
	
	 // {@see https://codex.wordpress.org/HTTP_API}
	 $response = wp_remote_get( $webURL.$apiBit.'/posts/?per_page='.$postCount.'&categories='.$postCategory );
	 
	 //var_dump($response);
	 
	 if ( ! is_wp_error( $response ) ) {
	 	// The request went through successfully, check the response code against
	 	// what we're expecting
	 	if ( 200 == wp_remote_retrieve_response_code( $response ) ) {
	 	
	 		// Do something with the response
	 		// $headers = wp_remote_retrieve_headers( $response );
	 		$body = wp_remote_retrieve_body( $response );
	 		$resp = json_decode( $body, true );
	 		
	 		if( ! empty( $resp ) ) {
	 		
	 			foreach ($resp as $p ) {
 					//echo var_dump($p);
 				    $postID = $p['id'];
 				    //$postLink = $p['link'];
 				    $postLink = $p['link'];
 				    $postTitle = $p['title']['rendered'];
 				    $postExcerpt = $p['excerpt']['rendered'];
 				    $postDate = $p['date'];
 				    	$dateMonth = date('M', strtotime($postDate));
 				    	$dateNumber = date('d', strtotime($postDate));
 				    $postFeaturedImageID = $p['featured_media'];
 				    $postFeaturedImageUrl = get_news_api_image_url( $webURL, $apiBit, $postFeaturedImageID ); //get featured image from api
 				    
 				    if($showImage){
			    		if( $postFeaturedImageUrl ){
			    			$postFeaturedImageUrl = $postFeaturedImageUrl;
			    		} elseif(!$postFeaturedImageUrl && $showImageURL) {
			    			$postFeaturedImageUrl = $showImageURL ;
			    		} else {
			    		    $postFeaturedImageUrl = get_stylesheet_directory_uri().'/effigylabs/acf-content-builder/modules/remote-news-carousel/default-image.jpg';
			    		}
 				    }
	    	 		
 				    $newsItem  = '<!-- Remote News Item -->'; 
 				    $newsItem .= '<div>';
 				    $newsItem .= '<div class="recent-posts">'; 
 				    $newsItem .= '<article class="post">'; 
 				    
 				    $newsItem .= '<div class="owl-carousel owl-theme nav-inside pull-left mr-lg mb-sm" data-plugin-options=\'{"items": 1, "margin": 10, "animateOut": "fadeOut", "autoplay": true, "autoplayTimeout": 3000}\'>';
 				    
 				    if($showImage){
 				    	$newsItem .= '<div>';
 				    	$newsItem .= '<img alt="'.$postTitle.'" class="img-responsive" src="'.$postFeaturedImageUrl.'">';
 				    	$newsItem .= '</div>';
 				    }
 				    $newsItem .= '</div>';
 				    if($showMeta){
 				    
 				    	
 				    	$newsItem .= '<div class="date mt-xs mr-md"><span class="day">'.$dateNumber.'</span><span class="month">'.$dateMonth.'</span></div>';
 				    }
 				    $newsItem .= '<h4><a href="'.$postLink.'">'.$postTitle.'</a></h4>';
 				    //$newsItem .= '<p>'.$postExcerpt.' <a href="'.$postLink.'" class="read-more">read more <i class="fa fa-angle-right"></i></a></p>';
 				    
 				    $newsItem .= '</article>'; 
 				    $newsItem .= '</div>';   
 				    $newsItem .= '</div>'; 
 				    $newsItem .= '<!-- Remote News Item -->'; 
 				    
 				    echo $newsItem;
 				    
 				}
	 		}
	 		
	 	} else {
	 		// The response code was not what we were expecting, record the message
	 		$error_message = wp_remote_retrieve_response_message( $response );
	 		echo $error_message;
	 	}
	 } else {
	 	// There was an error making the request
	 	$error_message = $response->get_error_message();
	 	echo $error_message;
	 }
   
} // get_news_api


function get_news_api_image_url( $webURL, $apiBit, $imageID ) {

	 // {@see https://codex.wordpress.org/HTTP_API}
	 
	 $response = wp_remote_get( $webURL.$apiBit.'/media/'.$imageID	);
	 	 
	 if ( ! is_wp_error( $response ) ) {
	 	// The request went through successfully, check the response code against
	 	// what we're expecting
	 	if ( 200 == wp_remote_retrieve_response_code( $response ) ) {
	 		// Do something with the response
	 		// $headers = wp_remote_retrieve_headers( $response );
	 		$body = wp_remote_retrieve_body( $response );
	 		$resp = json_decode( $body, true );
	 		$imageURL = $resp['media_details']['sizes']['large-square']['source_url'];
	 		//print_r($imageURL);
	 		return $imageURL ;  

	 		
	 	} else {
	 		// The response code was not what we were expecting, record the message
	 		$error_message = wp_remote_retrieve_response_message( $response );
	 	}
	 } else {
	 	// There was an error making the request
	 	$error_message = $response->get_error_message();
	 }
	 
} // get_news_api_image_url
