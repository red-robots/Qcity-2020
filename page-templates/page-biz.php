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
			while ( have_posts() ) : the_post();

				$category_name = get_field('category_name');
				$category_icon = get_field('category_icon');
				$category_link = get_field('category_link');

				$business_category = get_field('business_category');
	
				asort($business_category);

				foreach($business_category as $category):   ?>

					<div class="cat">
						<a href="<?php echo $category['category_link']; ?>">
							<div class="icon">
								<?php echo $category['category_icon']; ?>
							</div>
							<h2><?php echo $category['category_name']; ?></h2>
						</a>
					</div>

				<?php endforeach;

			endwhile; // End of the loop.
			?>

			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php get_sidebar(); ?>
</div>
<?php 
get_footer();
