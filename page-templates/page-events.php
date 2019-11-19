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
<div class="wrapper">
	<div class="content-area-title">
		<header class="section-title ">
			<h2 class="dark-gray">Sponsored</h2>
		</header>
	</div>
</div>
<div class="wrapper">
	<div id="primary" class="content-area">
		<main id="main" class="site-main " role="main">

			
				<?php
				/*
					Sponsored 
				*/
					$i = 0;
					$today = date('Ymd');
					$wp_query = new WP_Query();
					$wp_query->query(array(
						'post_type'=>'event',
						'post_status'=>'publish',
						//'posts_per_page' => 5,
						'meta_query' => array(
							array(
						        'key'		=> 'event_date',
						        'compare'	=> '<=',
						        'value'		=> $today,
						    ),
					    ),
					    'tax_query' => array(
							array(
								'taxonomy' => 'event_category', // your custom taxonomy
								'field' => 'slug',
								'terms' => array( 'premium' ) // the terms (categories) you created
							)
						)
				));
				if ($wp_query->have_posts()) : ?>
					<section class="sponsored">
					<?php while ($wp_query->have_posts()) : $wp_query->the_post(); 
						
							$img = get_field('event_image');
							$date = get_field("event_date", false, false);
							$date = new DateTime($date);
							$enddate = get_field("end_date", false, false);
							$enddate = ( !empty($enddate) ) ? new DateTime($enddate) : $date;

							$date_start 	= strtotime($date->format('Y-m-d'));
							$date_stop 		= strtotime($enddate->format('Y-m-d'));
							$now 			= strtotime(date('Y-m-d'));

							//if( ($date_start <= $now) && ($date_stop >=  $now) || ($date_start >= $now) ) {
								include( locate_template('template-parts/sponsored-block.php') );
							//} 

						endwhile; ?>
					</section>
				<?php endif; ?>
			

		

		<div class="mt-4 pt-5">

			<header class="section-title ">
				<h2 class="dark-gray">More Happenings</h2>
			</header>

			<div class="qcity-news-container">

			<?php
			/*
				The Rest of the Events 
			*/
				$i = 0;
				$today = date('Ymd');
				$wp_query = new WP_Query();
				$wp_query->query(array(
					'post_type'=>'event',
					'post_status'=>'publish',
					//'posts_per_page' => 4,
					'meta_query' => array(
						array(
					        'key'		=> 'event_date',
					        'compare'	=> '>=',
					        'value'		=> $today,
					    ),
				    ),
				    /*'tax_query' => array(
						array(
							'taxonomy' => 'event_category', // your custom taxonomy
							'field' => 'slug',
							'terms' => array( '' ) // the terms (categories) you created
						)
					)*/
			));
				if ($wp_query->have_posts()) : ?>
					<section class="sponsored">
					<?php while ($wp_query->have_posts()) : $wp_query->the_post(); 

						$img = get_field('event_image');
						$date = get_field("event_date", false, false);
						//echo $today . " | " . $date;
						

						$date = new DateTime($date);
						$enddate = get_field("end_date", false, false);
						$enddate = ( !empty($enddate) ) ? new DateTime($enddate) : $date;

						$date_start 	= strtotime($date->format('Y-m-d'));
						$date_stop 		= strtotime($enddate->format('Y-m-d'));
						$now 			= strtotime(date('Y-m-d'));

						//if( ($date_start <= $now) && ($date_stop >=  $now) ) {
							//the_title();
							//echo " |  Date: " . $date->format('D | M j, Y') . " | ";
						//}
						
							include( locate_template('template-parts/sponsored-block.php') );

						endwhile; ?>
					</section>
				<?php endif; ?>

				</div>

				<div class="more ">	
				 	<a class="red qcity-load-more" data-page="1" data-action="qcity_events_load_more">		
				 		<span class="load-text">Load More</span>
						<span class="load-icon"><i class="fas fa-sync-alt spin"></i></span>
				 	</a>
				</div>
		</div>
		
			
		</main><!-- #main -->
	</div><!-- #primary -->

	<?php get_sidebar(); ?>
</div>
<?php 
get_footer();
