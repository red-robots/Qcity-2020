<?php
/**
 * Template Name: Two Column
 */

get_header(); 

$rightCol = get_field('right_content'):

?>
<div class="wrapper">
	<div class="content-area-title">
		<header class="section-title ">
			<h1 class="dark-gray"><?php the_title(); ?></h1>
		</header>
	</div>
</div>
<div class="wrapper">
	
	<div id="primary" class="left">
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
	<div class="right">
		<div class="entry-content">
			<?php echo $rightCol; ?>
		</div>
	</div>

</div>
<?php get_footer();
