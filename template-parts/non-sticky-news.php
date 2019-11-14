<?php
/*
	Non Sticky News.


*/
	
	$wp_query = new WP_Query( array(
		'post_type'		=>'post',
		'post_status' 	=> 'publish',
		//'paged'         => 1,
		//'post__not_in' 	=> $postIDs
	));
	//$wp_query->query(); ?>
	
	<section class="news-home">
		<header class="section-title ">
			<h2 class="dark-gray">News</h2>
		</header>
		<section class="twocol qcity-news-container">	
		<?php if ( $wp_query->have_posts() ) : ?>		
				<?php while ( $wp_query->have_posts() ) :  $wp_query->the_post();

		    		//include( locate_template('template-parts/story-block.php', false, false) );
		    		get_template_part( 'template-parts/story-block');
		    	
			 	endwhile;  ?>
		<?php 
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
                endif;
                wp_reset_postdata();
		 	?>
		 </section>

	 </section>


<div class="more">	
 	<a class="red qcity-load-more" data-page="1">		
 		<span class="load-text">Load More</span>
		<span class="load-icon"><i class="fas fa-sync-alt spin"></i></span>
 	</a>
</div>