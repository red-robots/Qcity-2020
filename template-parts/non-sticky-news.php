<?php
/*
	Non Sticky News.


*/  
    $cat_id = get_category_by_slug( 'sponsored-post' );    
	
	$wp_query = new WP_Query( array(
		'post_type'		     =>'post',
		'post_status' 	       => 'publish',		
		'post__not_in' 	      => $postIDs,
        'category__not_in'    => array( $cat_id->term_id ),
	));
	?>
	
	<section class="news-home">
        <!--
		<header class="section-title ">
			<h2 class="dark-gray">News</h2>
		</header>
        -->

		<section class="twocol qcity-news-container">	

    		<?php 
            $i = 0;
                if ( $wp_query->have_posts() ) : 		
    				 while ( $wp_query->have_posts() ) :  $wp_query->the_post();

                        if($i == 2){
                            get_template_part( 'template-parts/sponsored-paid');
                        }

    		    		//include( locate_template('template-parts/story-block.php', false, false) );
    		    		get_template_part( 'template-parts/story-block');
                        $i++;
    		    	
    			 	endwhile; 
    			endif;
    			wp_reset_postdata();
    		?>	 	
		 </section>
		 <section class="ads-home">
            
		 	<?php  
		 		$post_type = 'ad';
                $args = array(
                    'posts_per_page'   => 1,
                    'orderby'          => 'rand',
                    //'order'            => 'DESC',
                    'post_type'        => $post_type,
                    'post_status'      => 'publish',
                    //'paged'            => $paged
                );
                $ad_posts = new WP_Query($args);

                if ( $ad_posts->have_posts() ):
                    echo '<div class="ads-portion">';
                	while ( $ad_posts->have_posts() ) : $ad_posts->the_post();

                		$header_script = get_field('header_script');
                		if( $header_script ){
                			echo $header_script;
                		}

                		$ad_script = get_field('ad_script');
                		if($ad_script){
                			echo $ad_script;
                		}

                	endwhile;
                    echo '</div>';
                endif;
                wp_reset_postdata();
		 	?>
            
            <!--
            <script async src="https://modules.wearehearken.com/wndr/embed/868.js"></script>
            -->
            <div class="desktop-version">
                <script async src="https://modules.wearehearken.com/qcitymetro/embed/4551.js"></script>
            </div>
            
		 </section>


         <div class="more"> 
            <a class="red qcity-load-more" data-page="2" data-action="qcity_load_more" >        
                <span class="load-text">Load More</span>
                <span class="load-icon"><i class="fas fa-sync-alt spin"></i></span>
            </a>
        </div>

	 </section>


