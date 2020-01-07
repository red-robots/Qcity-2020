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
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<div class="archive_job_cat">
				<div class="archive_post_title">
					<div class="">
						<header class="section-title ">
							<h1 class="dark-gray"><?php the_archive_title(); ?></h1>
						</header>
					</div>
				</div>

				<div class="category-post">
				
					<?php if ( have_posts() ) : ?>
						<!-- <header class="page-header">
							<?php
								//the_archive_title( '<h1 class="page-title">', '</h1>' );
								//the_archive_description( '<div class="taxonomy-description">', '</div>' );
							?>
						</header>.page-header -->
						<section class="sponsored">
						<?php
						$i=0;
						/* Start the Loop */
						while ( have_posts() ) : the_post(); 
							echo '<div class=" ">';								
							get_template_part( 'template-parts/jobs-cat-block' );	
							get_template_part( 'template-parts/separator');
							echo '</div>';
						endwhile;
						echo '</section>';

						pagi_posts_nav();

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif; ?>

				</div>


			</div>

			

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php get_sidebar(); ?>
</div>
<?php get_footer();
