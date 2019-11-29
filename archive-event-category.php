<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); 
get_template_part('template-parts/banner-category');
?>
<div class="wrapper">
	<div class="listing-header">
		<div class="content-area-title">
			<header class="section-title ">
				<h1 class="dark-gray"><?php the_archive_title(); ?></h1>
			</header>
		</div>
	</div>
</div>
<div class="wrapper">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<div class="events_page">
					
				<?php if ( have_posts() ) : ?>
					
					<section class="events">
					<?php
					
					while ( have_posts() ) : the_post(); 
						
						include( locate_template('template-parts/sponsored-block.php') );

					endwhile;

					echo '</section>';

					pagi_posts_nav();

				endif; ?>

			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
</div>
<?php get_footer();
