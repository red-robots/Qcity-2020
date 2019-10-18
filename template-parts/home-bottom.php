<section class="home-bottom">
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
			    	<a class="red" href="<?php bloginfo('url'); ?>/">See More</a>
			    </div>
			<?php endif; ?>
	</div>
	<?php get_template_part('template-parts/business-directory'); ?>
	<div class="ad">
		ad goes here.
	</div>
</section>