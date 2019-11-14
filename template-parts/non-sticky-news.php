<?php
/*
	Non Sticky News.


*/
	$i = 0;
	$wp_query = new WP_Query();
	$wp_query->query(array(
		'post_type'		=>'post',
		'post_status' 	=> 'publish',
		//'post__not_in' 	=> $postIDs
	));
	if ( have_posts() ) : ?>
	<section class="news-home">
		<header class="section-title ">
			<h2 class="dark-gray">News</h2>
		</header>
		<section class="twocol qcity-news-container">			
				<?php while ( have_posts() ) :  the_post();

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
 	<a class="red qcity-load-more" data-page="1" data-url="<?php echo admin_url('admin-ajax.php'); ?>" >		<span class="load-text">Load More</span>
		 <span class="load-icon spin"><i class="fas fa-sync-alt"></i></span>
 	</a>
</div>