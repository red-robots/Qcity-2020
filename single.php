<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ACStarter
 */

get_header(); 

if( has_post_thumbnail() ){
?>
	<div class="story-image">
		<?php the_post_thumbnail(); ?>
	</div>
<?php } ?>
<div class="wrapper">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="wrapper">
				<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', get_post_format() );

				endwhile; // End of the loop.

				?>
			</div>

		<?php get_template_part('template-parts/next-story');

		// If comments are open or we have at least one comment, load up the comment template.
		// if ( comments_open() || get_comments_number() ) :
		// 	comments_template();
		// endif;

		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();?>
</div>
<?php 
get_footer();
