<div class="biz-dir">
	<header class="section-title ">
		<h2 class="dark-gray">Business Directory</h2>
	</header>
	<?php
	/*
		Biz Directory.


	*/
	$i = 0;
	$wp_query = new WP_Query();
	$wp_query->query(array(
		'post_type'=>'business_listing',
		'posts_per_page' => 5,
		'paged' => $paged,
	));
	if ($wp_query->have_posts()) : ?>
	<div class="biz-job-wrap">
	    <?php while ($wp_query->have_posts()) : $wp_query->the_post(); $i++; 
	    	if( $i == 2 ) {
	    		$cl = 'even';
	    		$i = 0;
	    	} else {
	    		$cl = 'odd';
	    	}
	    ?>
	    <div class="listing <?php echo $cl; ?>">
	    	<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	    </div>
	    <?php endwhile; ?>	
	    </div>
	    <div class="more">
	    	<a class="red" href="<?php bloginfo('url'); ?>/qcity-biz">See More</a>
	    </div>
	<?php endif; ?>
</div>