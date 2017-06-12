<?php 

/*
Advanced Custom Fields: Icon Boxes Module
Description: Display icon boxes content
*/

$newsCategory = get_sub_field('news_carousel');?>

<!-- Section: Latest News -->
<section id="news" class="section-small">
    <div class="container">

        <!-- Section Content -->
        <div class="row">
            <div class="zoomIn wow">

                <!-- News Carousel -->
                <div id="news-carousel" class="news-carousel owl-carousel owl-theme">
                
					<!-- See child-theme/inc/bml-news-api-link -->
                    <?php echo get_news_api( 6, $newsCategory ) ;?>
                    
                </div>
                <!-- /Testimonials Carousel -->

            </div>
        </div>
        <!-- /Section Content -->

    </div>
</section>
<!-- /Section: Latest News -->
