<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ACStarter
 */

	get_header(); 
	get_template_part('template-parts/banner-biz');

	$photo 			= get_field('business_photo');
	$description 	= get_field('description');
	$email 			= get_field('email');
	$phone 			= get_field('phone');
	$website 		= get_field('website');
	$address  		= get_field('address');
	
	//print_r($address);
?>

<div class="wrapper" style="background-color: white">
	
	<div id="primary" class="content-area" style="margin: 0 auto; float:none;">

		<main id="main" class="site-main" role="main">
			<div class="wrapper" >

				<div class="listing_initial">

					<div class="single-page">
			
						<div  style="margin-bottom: 20px;">				
							<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>				
						</div>
					</div>

					<div class="single-page">
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<div class="featured_image" >	
								<img src="<?php echo $photo['sizes']['photo']; ?>" alt="">						
							</div>

							<div class="business-content">	
								<?php if($address): ?>
						            <div><span >Address:</span> <a href="https://www.google.com.ph/maps/place/<?php echo urlencode($address['address']); ?>"></a><?php echo $address['address']; ?></div>
						        <?php endif; ?>		
						        <?php if($phone): ?>				
									<div><span>Phone:</span> <?php echo esc_html($phone); ?></div>
								<?php endif; ?>
								<?php if($email): ?>
									<div><span>Email: </span> <a href="mailto:<?php echo antispambot(strtolower($email), 1); ?>"><?php echo strtolower($email); ?></a></div>
								<?php endif; ?>
								<?php if($website): ?>
									<div><a href="<?php echo $website; ?>" target="_blank"><span>View Website</span> </a></div>
								<?php endif; ?>
							</div>

							<div class="entry-content">
								<?php
									the_content( sprintf(
										/* translators: %s: Name of current post. */
										wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'acstarter' ), array( 'span' => array( 'class' => array() ) ) ),
										the_title( '<span class="screen-reader-text">"', '"</span>', false )
									) );
								?>
							</div><!-- .entry-content -->

							<div class="share">
								<?php echo do_shortcode('[social_warfare]'); ?>
							</div>
							
						</article><!-- #post-## -->

					</div>

				</div>

				<div class="listing_search">
					<div class="listing_search_result">				
					</div>				
				</div>

			</div>

		<?php //get_template_part('template-parts/next-story'); ?>

		</main><!-- #main -->
	</div><!-- #primary -->


</div>
<?php 
get_footer();
