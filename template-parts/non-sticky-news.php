<?php
/*
	Non Sticky News.


*/
	$i = 0;
	$wp_query = new WP_Query();
	$wp_query->query(array(
		'post_type'=>'post',
		'posts_per_page' => 9,
		'post__not_in' => $postIDs
	));
	if ($wp_query->have_posts()) : ?>
	<section class="news-home">
		<header class="section-title ">
			<h2 class="dark-gray">News</h2>
		</header>
		<section class="twocol qcity-news-container">
		    <?php while ($wp_query->have_posts()) :  $wp_query->the_post();

		    	include( locate_template('template-parts/story-block.php', false, false) );
		    	
			 endwhile; ?>
		 </section>
		 <section class="ads-home">
		 	Ad goes here.
		 </section>

		 <div class="more">
		 	<a class="red qcity-load-more" data-page="1" data-url="<?php echo admin_url('admin-ajax.php') ?>" >		<span class="load-text">Load More</span>
				 <span class="load-icon"><i class="fa fa-reload"></i></span>
		 	</a>
		 </div>

	 </section>
<?php 
endif;
wp_reset_postdata();
?>