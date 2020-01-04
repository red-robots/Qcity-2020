<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); 
//get_template_part('template-parts/banner-biz');
$ob = get_queried_object();

$add_business = get_field('add_your_business');
$add_business_link = get_field('add_business_link');

//var_dump($ob);
?>

<div class="wrapper" style="background-color: white">
	<div class="business-category-header">
		<header class="page-header biz">		
			<h1><?php echo $ob->name; ?></h1>
			<?php
				//the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="taxonomy-description">', '</div>' );
			?>
		</header><!-- .page-header -->
	</div>
	<div class="featured_business">
		<header class="section-title ">
			<h2 class="dark-gray">Featured Businesses</h2>
			<div class="biz-submit">
				<a href="<?php echo bloginfo( 'url' ); ?>/business-directory/business-directory-sign-up/">Submit your business</a>
			</div>
		</header>
	</div>
	<div class="clear"></div>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<div class="business-category-page">
				<?php

					$args = array(
							'post_type' 	=> 'business_listing',
							'post_status'	=> 'publish',
							//'category_name' => $ob->slug,
							'tax_query' => array( 
											'relation' => 'AND',
											array(
										        'taxonomy' 			=> 'business_classification',
										        'field' 			=> 'slug',
										        'terms' 			=> array( 'featured' ),
										        'include_children' 	=> true,
										        'operator' 			=> 'IN'
										      ),
											array(
										        'taxonomy' 			=> $ob->taxonomy,
										        'field' 			=> 'id',
										        'terms' 			=> array( $ob->term_id ),
										        'include_children' 	=> true,
										        'operator' 			=> 'IN'
										      )
							)
					);

					$query = new WP_Query( $args );

					if ( $query->have_posts() ) : ?>
						<div class="qcity-news-container">
							<section class="sponsored">
								<?php
								/* Start the Loop */
								while ( $query->have_posts() ) : $query->the_post();

									get_template_part( 'template-parts/business-block' );

								endwhile;

								wp_reset_postdata(); ?>
							
							</section>

						</div>
						<div class="more ">	
							 	<a class="red qcity-load-more" data-page="1" data-action="qcity_business_load_more" >		
							 		<span class="load-text">Load More</span>
									<span class="load-icon"><i class="fas fa-sync-alt spin"></i></span>
							 	</a>
						</div>

					<?php else: ?>
						<div class="qcity-news-container" style="padding-bottom: 20px;">
							<section class="sponsored">
								<a href="<?php echo bloginfo( 'url' ); ?>/business-directory/business-directory-sign-up/">
									<h5 class="sponsored-empty">Be the first.</h5>
								</a>								
							</section>
						</div>
					<?php endif; ?>

					<div class="mt-5" style="margin-top: 20px;">
						<?php get_template_part('template-parts/business-directory'); ?>
					</div>		
					

				

			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
</div>
<?php get_footer();
