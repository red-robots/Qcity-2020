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
				
				<?php get_template_part('template-parts/biz-icons'); ?>
			</section>

			<?php
			while ( have_posts() ) : the_post();

				

				

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php get_sidebar(); ?>
</div>
<?php 
get_footer();
