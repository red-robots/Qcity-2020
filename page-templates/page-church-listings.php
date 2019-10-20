<?php
/**
 * Template Name: Church Listings
 */

get_header();
get_template_part('template-parts/banner-church');
?>
<div class="wrapper">
	<div class="content-area-title">
		<header class="section-title ">
			<h2 class="dark-gray">All Churches</h2>
		</header>
	</div>
</div>
<div class="wrapper">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			/*
				Jobs 


			*/
				$i = 0;
				$today = date('Ymd');
				$wp_query = new WP_Query();
				$wp_query->query(array(
				'post_type'=>'church_listing',
				'posts_per_page' => 15,
			));
				if ($wp_query->have_posts()) : ?>
				<section class="church-list">
					<?php while ( $wp_query->have_posts() ) : ?>
						<?php $wp_query->the_post();

							include(locate_template('template-parts/church.php')) ;

						endwhile; 

						pagi_posts_nav();

						?>
					</section>
				<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->




<?php get_sidebar('church'); ?>
</div>
<?php get_footer();
