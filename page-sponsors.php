<?php
/**
 * Template Name: Sponsors Page 
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
			<?php 
			endwhile; // End of the loop.
			wp_reset_postdata();
			?>

			
			<section class="biz-cats">
				
				<?php
					$args = array(
						'post_type' 		=> 'sponsor',
						'post_status'  		=> 'publish',
						'posts_per_page'   	=> -1,
					);

					$query = new WP_Query($args);

					if( $query->have_posts() ):

						while ( $query->have_posts()) : $query->the_post();

							if( $i == 2 ) {
					    		$cl = 'even';
					    		$i = 0;
					    	} else {
					    		$cl = 'odd';
					    	}
							
							$logo 			= get_field('logo');
							$sponsor_site 	= get_field('logo_hyperlink');

							if($logo):
								$url 	= $logo['url'];
								$link 	= $logo['link'];
								$title 	= $logo['title'];
							?>
							  
							  <div class="cat">
								<a href="<?php echo ($sponsor_site) ? $sponsor_site : $link; ?>" target="_blank">
									<div class="icon">
										<img src="<?php echo $url; ?>" alt="">
									</div>
									<h2><?php echo $title;  ?></h2>
								</a>
							</div>
							    
							
						<?php 
							endif; // logo

						endwhile;

					endif;
					wp_reset_postdata();
					
				?>	
				
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
</div>
<?php get_footer();
