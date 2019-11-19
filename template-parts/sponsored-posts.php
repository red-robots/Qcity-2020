<?php
/*
	Sponsored Row


*/
	$i = 0;
	$today = date('Ymd');
	//echo $today;
	// $args = array (
	//     'post_type' => 'event',
	// 	'meta_query' => array(
	// 		array(
	// 	        'key'		=> 'event_date',
	// 	        'compare'	=> '>=',
	// 	        'value'		=> $today,
	// 	    ),
	// 	    //  array(
	// 	    //     'key'		=> 'end_date',
	// 	    //     'compare'	=> '>=',
	// 	    //     'value'		=> $today,
	// 	    // )
	//     ),
	// );

// get posts
// $posts = get_posts($args);
// if( $posts ) {
	
// 	foreach( $posts as $post ) {
		
// 		setup_postdata( $post );
// 		//the_title();
// 		the_field('event_date');
// 		echo $post->title;
// 		// do something
// 		echo '<pre>';
// 		print_r($post);
// 		echo '</pre>';

// 	}

// 	wp_reset_postdata();
	
// }

	$wp_query = new WP_Query();
	$wp_query->query(array(
	'post_type'=>'event',
	'posts_per_page' => 5,
	'meta_query' => array(
		array(
	        'key'		=> 'event_date',
	        'compare'	=> '<=',
	        'value'		=> $today,
	    ),
	    //  array(
	    //     'key'		=> 'end_date',
	    //     'compare'	=> '>=',
	    //     'value'		=> $today,
	    // )
    ),
));
	if ($wp_query->have_posts()) : ?>
	<section class="home-sponsored">
		<header class="section-title ">
			<h2 class="dark-gray">Sponsor Events</h2>
		</header>
		<div class="flexwrap">
			<?php while ($wp_query->have_posts()) : $wp_query->the_post(); 
				$img 		= get_field('event_image');
				$date 		= get_field("event_date", false, false);
				$date 		= new DateTime($date);
				$enddate 	= get_field("end_date", false, false);
				$enddate 	= new DateTime($enddate);
				
			?>
				<div class="block">
					<a href="<?php the_permalink(); ?>">
						
						<?php if( $img ) { ?>
							<img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
						<?php } elseif( has_post_thumbnail() ) {
							the_post_thumbnail('thumbnail');
						} else { ?>
							<img src="<?php bloginfo('stylesheet_directory'); ?>/images/default.png">
						<?php } ?>
						<div class="info js-blocks">
							<div class="date">
								<?php echo $date->format('D | M j, Y'); ?>	
							</div>
							<h3><?php the_title(); ?></h3>
						</div>
					</a>
				</div>
			<?php endwhile; ?>
			<div class="block last-block" style="background-image: url('<?php bloginfo('stylesheet_directory'); ?>/images/city.jpg');">
				<div class="more">
					More Events
				</div>
				<div class="overlayz">
					<a href="<?php bloginfo('url'); ?>/events"></a>
				</div>
				<!-- <img src=""> -->
			</div>
		</div>
	</section>
<?php 
endif;
wp_reset_postdata();
 ?>