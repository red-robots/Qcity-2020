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

	$sponsors 	= get_field('sponsors');	
	$photos 	= get_field('photos');
	//var_dump($photos);
?>

<div class="wrapper" style="background-color: white">
	
	<div id="primary" class="content-area" style="<?php echo ($sponsors) ? '': ' margin: 0 auto; float:none; '; ?>">
		
		<div class="single-page">
			
			<div  style="margin-bottom: 20px;">
				<div class="category "><?php get_template_part('template-parts/primary-category'); ?></div>
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				<?php //the_excerpt(); ?>
			</div>
			

			<?php /*if( $img ) { ?>
				<div class="story-image">
					<img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
				</div>
			<?php } elseif( has_post_thumbnail() ){ ?>
				<div class="story-image">
					<?php the_post_thumbnail(); ?>
				</div>
			<?php } */ ?>

			<div class="slider">
				<!-- Slideshow container -->
				<div class="slideshow-container">

				  <!-- Full-width images with number and caption text -->
				  <?php if( $photos ): $i = 0; ?>
				  	<?php foreach( $photos as $photo):  ?>
						  <div class="mySlides fade">
						    <div class="numbertext"><?php echo $i+1;  ?> / <?php echo count($photos);  ?></div>
						    <img src="<?php echo $photo['photo']['url']; ?>" style="width:100%">
						    
						  </div>
					<?php $i++; endforeach; ?>	  
				<?php endif; ?>

				  <!-- Next and previous buttons -->
				  <a class="prev prev-btn" data-prev="-1">&#10094;</a>
				  <a class="next next-btn" data-next="1">&#10095;</a>
				</div>
				<br>

				<!-- The dots/circles -->
				<div style="text-align:center">
					<?php if( $photos ):  ?>
						<?php for($j = 0; $j < count($photos); $j++): ?>
				  		<span class="dot dot-btn" data-dot="<?php echo $j+1; ?>"></span>
				  		<?php endfor; ?>
					<?php endif; ?>				  
				</div>
			</div><!-- slider  -->

		</div>


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

		<?php //get_template_part('template-parts/next-story'); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php ($sponsors) ? get_sidebar() : ''; ?>
</div>
<?php 
get_footer();
