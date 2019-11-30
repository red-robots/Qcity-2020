<?php
/**
 * Template Name: Events
 *
 * 
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); 
get_template_part('template-parts/banner-events');
?>

<div class="">

	<div class="single-page-event">

		<header class="section-title ">
			<h1 class="dark-gray">More Happenings</h1>
		</header>

		<div id="primary" class="content-area-event">
			<main id="main" class="site-main" role="main">
				<div class="page-event-list">

					<div class="listing_initial">

						<div class="qcity-news-container">

							<?php
							/*
								The Rest of the Events 
							*/
								$i = 0;
								$today = date('Ymd');
								$wp_query = new WP_Query();
								$wp_query->query(array(
									'post_type'			=>'event',
									'post_status'		=>'publish',
									'posts_per_page' 	=> 18,
									'meta_query' 		=> array(
															array(
														        'key'		=> 'event_date',
														        'compare'	=> '>=',
														        'value'		=> $today,
														    ),
								    ),								   
								));
								if ($wp_query->have_posts()) : ?>
									<section class="events">
									<?php while ($wp_query->have_posts()) : $wp_query->the_post(); 
										
											include( locate_template('template-parts/sponsored-block.php') );

										endwhile; ?>
									</section>
								<?php endif; wp_reset_postdata(); ?>

						</div>

						<div class="more ">	
						 	<a class="red qcity-load-more" data-page="1" data-action="qcity_events_load_more" >		
						 		<span class="load-text">Load More</span>
								<span class="load-icon"><i class="fas fa-sync-alt spin"></i></span>
						 	</a>
						</div>

					</div>

					<div class="listing_search" style="margin-bottom: 20px">
							<div class="listing_search_result">				
							</div>				
					</div>

				</div>


			</main><!-- #main -->
		</div><!-- #primary -->

	</div>

</div>


<?php get_footer();
