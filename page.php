<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); ?>
<div class="wrapper">
	<div class="content-area-title">
	<header class="entry-header toppage">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header>
		<!-- <header class="section-title ">
			<h1 class="dark-gray"><?php the_title(); ?></h1>
		</header> -->
	</div>
</div>
<div class="wrapper">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post(); ?>
				<div class="entry-content">
					<?php the_content(); ?>
				</div>
			<?php endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
</div>
<?php get_footer();
