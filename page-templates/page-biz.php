<?php
/**
 * Template Name: Qcity Biz
 *
 * 
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); 
get_template_part('template-parts/banner-biz');
?>
<div class="wrapper">
	<div class="content-area-title">
		<header class="section-title ">
			<h2 class="dark-gray">Find a Business by Category</h2>
		</header>
	</div>
</div>
<div class="wrapper">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="biz-cats">

			<?php
				/*$args = array(
						'post_type' 	=> 'business_listing', 
						'post_status'	=> 'publish',
						//'taxonomy' 		=> 'business_category', 
						//'term' 			=> 'php', 
						'posts_per_page' => -1
				);

				$business = new WP_Query($args);*/

				if( have_posts() ):

					while ( have_posts() ) : the_post();

						$business_category = get_business_category_items();						
						include( locate_template('template-parts/business-categories.php'));

					endwhile; // End of the loop.

				endif;
				wp_reset_postdata();
			?>

			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php get_sidebar(); ?>
</div>
<?php 
get_footer();
