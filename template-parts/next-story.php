<?php
	$post_id = get_the_ID();
	$sponsors = get_field('sponsors');	
	if($sponsors):
		$sponsor = get_post($sponsors[0]->ID);
		$sponsor_id = $sponsor->ID;		
	endif;	

	$next = posts_have_sponsors($post_id, $sponsor_id);

	$tags = get_the_tags();	
	$tag = ($tags) ? $tags[0]->term_id : null;	

	//echo "Tag ID: " . $tag . " | Post ID: {$post_id}";

	
?>

<section class="next-story">
	<header class="section-title ">
		<h2 class="dark-gray">Next Story</h2>
	</header>
	<div class="wrapper">
		<?php 
			
			if( is_object($next)) {
				$args = array(
				  'p'         => $next->ID, 
				  'post_type' => 'post'
				);
			} elseif($sponsors) {
				$args = array(
				  	'category_name'    	=> 'Offers & Invites',        
        			'post_type'        	=> 'post',        
        			'post_status'      	=> 'publish',
        			'posts_per_page' 	=> 1,
					'orderby'          	=> 'rand',
				);
			} elseif($tag) {
				$args = array(				  	       
        			'post_type'        	=> 'post',        
        			'post_status'      	=> 'publish',
        			'post__not_in'      => array( $post_id ),
        			'posts_per_page' 	=> 1,
					'orderby'          	=> 'rand',
					'tag_id' 			=> $tag, 
					
				);
			} else {
				$args = array(				  	       
        			'post_type'        	=> 'post',        
        			'post_status'      	=> 'publish',
        			'post__not_in'      => array( $post_id ),
        			'posts_per_page' 	=> 1,
					'orderby'          	=> 'rand',
					//'tag_id' 			=> $tag, 
					
				);
			}

		

		$wp_query = new WP_Query($args);

		//var_dump($wp_query);
		
		if ($wp_query->have_posts()) : 
			while ($wp_query->have_posts()) : $wp_query->the_post(); 
				include( locate_template('template-parts/story-block.php', false, false) );
			endwhile;
		endif;
		wp_reset_postdata();
		?>
		
		<!--
		<div class="more">
			<a href="#">Load More</a>
		</div>
		-->
	</div>	
</section>