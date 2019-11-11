<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ACStarter
 */

get_header(); 

?>

<div class="wrapper">
	
	<div id="primary" class="content-area">
		<?php if( has_post_thumbnail() ){ ?>
			<div class="story-image">
				<?php the_post_thumbnail('full'); ?>
			</div>
		<?php } ?>
		<main id="main" class="site-main" role="main">
			<div class="wrapper">
				<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', get_post_format() );

				endwhile; // End of the loop.

				?>
			</div>

		<?php get_template_part('template-parts/next-story'); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar();?>
</div>
<?php 
get_footer();
