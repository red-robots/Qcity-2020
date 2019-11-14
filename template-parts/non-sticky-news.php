<?php
/*
	Non Sticky News.


*/
	$i = 0;
	$wp_query = new WP_Query();
	$wp_query->query(array(
		'post_type'		=>'post',
		'post_status' 	=> 'publish',
		'paged'         => 1,
		'post__not_in' 	=> $postIDs
	));
	if ( $wp_query->have_posts() ) : ?>
	<section class="news-home">
		<header class="section-title ">
			<h2 class="dark-gray">News</h2>
		</header>
		<section class="twocol qcity-news-container">			
				<?php while ( $wp_query->have_posts() ) :  $wp_query->the_post();

		    		//include( locate_template('template-parts/story-block.php', false, false) );
		    		get_template_part( 'template-parts/story-block');
		    	
			 	endwhile; ?>
		 </section>
		 <section class="ads-home">
		 	Ad goes here.
		 </section>

	 </section>
<?php 
endif;
wp_reset_postdata();
?>

<div class="more">	
 	<a class="red qcity-load-more" data-page="1">		
 		<span class="load-text">Load More</span>
		<span class="load-icon"><i class="fas fa-sync-alt spin"></i></span>
 	</a>
</div>