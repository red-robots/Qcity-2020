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

<div class="wrapper smaller-screen" style="position: relative;">
	<header class="section-title ">
		<h1 class="dark-gray">Events</h1>
	</header>
	<div class="event-butts">
		<?php get_template_part('template-parts/event-btn'); ?>
	</div>
	
	<div id="primary" class="content-area event-content-area">
		<main id="main" class="site-main" role="main">
			<div class="wrapper">

				<div class="single-page">
					<?php if( has_post_thumbnail() ){ ?>
						<div class="story-image">
							<div class="event-image">
								<?php the_post_thumbnail(); ?>
							</div>			
						</div>
					<?php } ?>

				<?php
				while ( have_posts() ) : the_post(); 
					$startDate = DateTime::createFromFormat('Ymd', get_field('event_date'));
					$endDate = DateTime::createFromFormat('Ymd', get_field('end_date'));
					$start = get_field('event_start_time');
					$end = get_field('event_end_time');
					$contact = get_field('event_contact');
					$email = get_field('event_email');
					$phone = get_field('phone');
					$cost = get_field('cost_of_event');
					$venueName = get_field('name_of_venue');
					$location = get_field('venue_address');
					$tickets = get_field('link_for_tickets_registration');
					$weblink = get_field('website_link');
					$details = get_field('details');
					$postId = get_the_ID();
					$eventCat = get_the_terms( $postId, 'event_cat' );
					$eventCategory = $eventCat[0]->name;
					$image = get_field('event_image'); 
					$size = 'large';
					$thumb = $image['sizes'][ $size ];
					$eventType = get_field('event_type');
				?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header event">
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
						<div class="date">
							<?php 
							// Date
							if ( $endDate != '' ) { 
								echo $startDate->format('l, F j, Y') . ' - ' . $endDate->format('m/d/Y');
							} elseif( $startDate != '' ) { 
								echo ' ' . $startDate->format('l, F j, Y');
							} elseif( $endDateSubmitted != '' ) {
								echo $startDateSubmitted;
							} else {
								echo $startDateSubmitted . ' - ' . $endDateSubmitted;
							}
							?>
						</div>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<?php echo $details; ?>
						<?php the_content(); ?>
						<?php if(strcmp(get_field("culture_block"),"yes")===0):?>
							<div class="culture-text">This is a Culture Blocks event, sponsored by <a href="https://www.artsandscience.org/" target="_blank">Arts &amp; Science Council</a>. Culture for All!</div><!--.culture-text-->
							<a href="https://www.artsandscience.org/programs/for-community/culture-blocks/asc-culture-blocks-upcoming-events/" target="_blank">
								<img src="<?php echo get_template_directory_uri()."/images/culture-blocks.jpg";?>" alt="Culture Blocks">
	 						</a>
						<?php elseif(strcmp(get_field("charlotte_works_block"),"yes")===0):?>
							<div class="culture-text">This is a Charlotte Works event. Careers4All!</div><!--.culture-text-->
							<a href="https://www.artsandscience.org/programs/for-community/culture-blocks/asc-culture-blocks-upcoming-events/" target="_blank">
								<img src="<?php echo get_template_directory_uri()."/images/charlotte-works-logo.jpg";?>" alt="Charlotte Works">
	 						</a>
	 					<?php endif;?>
					</div><!-- .entry-content -->


					<div class="share">
						<?php echo do_shortcode('[social_warfare]'); ?>
					</div>

					
					<footer class="entry-footer">
						<?php 
						$text = 'Have you signed up to receive our daily news and events listings?'; 
						?>
						<div class="side-offer">
						<p><?php echo $text; ?></p>
						<div class="btn">
							<a class="white" href="<?php bloginfo('url'); ?>/email-signup">Subscribe</a>
						</div>
					</div>
					</footer><!-- .entry-footer -->
				</article><!-- #post-## -->

				<?php endwhile; // End of the loop. ?>
			</div>

			</div>


		</main><!-- #main -->
	</div><!-- #primary -->
	<div class="widget-area event-details" id="sidebar-event">
		<div >
			<?php if( $venueName != '' ) { ?>
	        	<div class="detail-title">Venue</div>
	        	<div class="detail-info"><?php echo $venueName; ?></div>
	        <?php } ?>

	    	<?php if( $location != '' ) { ?>
		    	<div class="detail-title">Address</div>
		        <div class="detail-info"><?php echo $location; ?></div>
	        <?php } ?>
	        
	        <?php if( $start != '' ) { ?>
		        <div class="detail-title">Start Time</div>
		        <div class="detail-info">
		        <?php echo $start; ?></div>
	        <?php } ?>
	        
	        <?php if( $end != '' ) { ?>
		        <div class="detail-title">End Time</div>
		        <div class="detail-info"><?php echo $end; ?></div>
	        <?php } ?>
	        
	        <?php if( $cost != '' ) { ?>
		        <div class="detail-title">Cost</div>
		        <div class="detail-info"><?php echo $cost; ?></div>
	        <?php } ?>
	        <?php if( $eventCat != '' ) { ?>
		        <div class="detail-title">Event Category</div>
		        <div class="detail-info">
	        	<!-- uses yoast primary category -->
	        	<?php get_template_part('inc/primary-category-event'); ?>
	        </div>
	        <?php } ?>
	        <?php if( $tickets != '' ) { ?>
	        	<div class="fe-website btn event_website">
	        		<a class="red" target="_blank" href="<?php echo $tickets; ?>">Tickets/Registration</a>
	        	</div>
	        <?php } ?>
	        
	        <?php if( $weblink != '' ) { ?>
	        	<div class="fe-website btn event_website">
	        		<a class="red" target="_blank" href="<?php echo $weblink; ?>">Visit Website</a>
	        	</div>
	        <?php }   ?>
		</div>
    	
	</div>

</div>
<?php 
get_footer();
