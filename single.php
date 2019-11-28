<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ACStarter
 */

	get_header(); 
	$img 	= get_field('story_image');
	$video 	= get_field('video_single_post');

	$sponsors = get_field('sponsors');	
	//var_dump($sponsors);
?>

<div class="wrapper">
	
	<div id="primary" class="content-area" style="<?php echo ($sponsors) ? '': ' margin: 0 auto; float:none; width: 80%; '; ?>">
		<?php if( $img ) { ?>
			<div class="story-image">
				<img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
			</div>
		<?php } elseif( has_post_thumbnail() ){ ?>
			<div class="story-image">
				<?php the_post_thumbnail(); ?>
			</div>
		<?php } ?>
		<main id="main" class="site-main" role="main">
			<div class="wrapper" >

				<div class="single-page">
					
					<?php
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content', get_post_format() );

					endwhile; // End of the loop.

					?>

				</div>
			</div>

		<?php get_template_part('template-parts/next-story'); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php ($sponsors) ? get_sidebar() : ''; ?>
</div>
<?php 
get_footer();
