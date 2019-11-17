<section class="home-bottom">
	<!-- Sponsors -->
		


	<div class="jobs">
		<header class="section-title ">
			<h2 class="dark-gray">Jobs</h2>
		</header>

		

		<?php
		/*
			Jobs.
		*/
			$wp_query = new WP_Query();
			$wp_query->query(array(
				'post_type'=>'job',
				'posts_per_page' => 2,
				'paged' => $paged,
			));
			if ($wp_query->have_posts()) : ?>
			<div class="biz-job-wrap">
			    <?php while ($wp_query->have_posts()) : $wp_query->the_post(); 
			    $img = get_field('image');
			    $jobTitle = get_field("job_title");
				$companyName = get_field("company_name");
			    ?>
			    	<div class="job">
			    		<div class="img">
			    			<img src="<?php echo $img['url']; ?>"  alt="<?php echo $img['alt']; ?>">
			    		</div>
			    		<div class="info">
			    			<h3><?php the_title(); ?></h3>
			    			<h4><?php echo $companyName; ?></h4>
			    			<div class="date"><?php echo get_the_date(); ?></div>
			    		</div>
			    		<div class="view">
			    			<div class="viewlink">
			    				<a href="<?php the_permalink(); ?>">View Post</a>
			    			</div>
			    		</div>
			    	</div>
			    <?php endwhile; ?>	
			    </div>
			    <div class="more">
			    	<a class="red" href="<?php bloginfo('url'); ?>/job-board">See More</a>
			    </div>
			<?php endif; wp_reset_postdata(); ?>

	</div>
	<?php get_template_part('template-parts/business-directory'); ?>
	
	<!--- Advertisements -->
	<div class="ad">
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
	</div>

</section>