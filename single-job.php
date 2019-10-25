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

<div class="wrapper">
	<div class="content-area">
		<header class="section-title ">
			<h1 class="dark-gray">
				<?php $job_title = get_field("job_title");
					if($job_title):
						echo $job_title;
					endif; ?>
			</h1>
		</header>
	</div>
</div>
<div class="wrapper">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			
				<?php
				while ( have_posts() ) : the_post(); 
					
				?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header event">
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
						<div class="company-logo">
							<?php $image = get_field('image');
							$company_name = get_field("company_name");?>
						</div>
					</header><!-- .entry-header -->

					<?php if (function_exists('wpp_get_views')):?>
						<div class="data"> 
							<header>
								<h2>
									<?php echo $company_name;?>
								</h2>
							</header>
							<div class="date"><?php echo get_the_date(); ?></div><!--.date-->
							<div class="views">
								Views:&nbsp;<?php echo wpp_get_views( get_the_ID() );?>
							</div><!--.views-->
						</div><!--.data-->
					<?php endif;?>

					<?php 
					$job_description = get_field("job_description");
					if($job_description):?>
						<div class="copy">
							<?php echo $job_description; ?>
						</div><!--.copy-->
					<?php endif;?>	


					<?php 
					$how_to_apply = get_field("how_to_apply");
					$application_direct = get_field("application_direct");
					$application_email = get_field("application_email");?>
					<?php if(strcmp($how_to_apply,"direct")==0&&$application_direct):?>
						<div class="application button">
							<a class="button" href="<?php echo $application_direct;?>" target="_blank">
								Apply
							</a>
						</div><!--.application-->
					<?php elseif($application_email):?>
						<div class="application button">
							<a class="button" href="mailto:<?php echo $application_email;?>">
								Email Resume
							</a>
						</div><!--.application-->
					<?php endif;
					$mailto_subject = get_field("mailto_subject",48778);
					$mailto_body = get_field("mailto_body",48778);
					$mailto_button_text = get_field("mailto_button_text",48778);
					if($mailto_body&&$mailto_button_text&&$mailto_subject):?>
						<div class="mail button">
							<a class="button" href="mailto:?subject=<?php echo str_replace(" ","%20",$mailto_subject);?>&amp;body=<?php echo str_replace(" ","%20",$mailto_body);?>%20<?php echo get_permalink();?>"><?php echo $mailto_button_text;?></a>
						</div>
					<?php endif;?>

					<?php $args = array(
						'post_type'=>'job',
						'posts_per_page' => -1,
						'orderby'=>'name',
						'order'=>'DESC'
					);
					$posts = get_posts($args);
					$index = array_search($post,$posts);
					if($index !== false && count($posts)>1):?>
						<div class="clear"></div>
						<nav class="nav-single">
							<h3 class="assistive-text"><?php _e( 'Post navigation', 'twentytwelve' ); ?></h3>
							<h3 class="show">View Next Job</h3>
							<?php if(count($posts) >2):?>
								<?php $previous_index = $index > 0 ? $index -1 : count($posts) -1;?>
								<span class="nav-previous">
									<a href="<?php echo get_the_permalink($posts[$previous_index]);?>">
									<span class="meta-nav">&larr;</span>
									<?php echo $posts[$previous_index]->post_title;?>
									</a>
								</span>
							<?php endif;?>
							<?php $next_index = $index < (count($posts) -1) ? $index +1 : 0; ?>
							<span class="nav-next">
								<a href="<?php echo get_the_permalink($posts[$next_index]);?>"><?php echo $posts[$next_index]->post_title;?><span class="meta-nav">&rarr;</span></a>
							</span>
						</nav><!-- .nav-single -->
					<?php endif;?>
			<?php endwhile; // end of the loop.?>


					<div class="share">
						<?php echo do_shortcode('[social_warfare]'); ?>
					</div>

					
					
				</article><!-- #post-## -->

				
			


		</main><!-- #main -->
	</div><!-- #primary -->
	

	<div class="widget-area event-details">
    	<?php //get_template_part('ads/right-small'); 
		$popular_posts_title = get_field("popular_posts_title", 48778);
		if($popular_posts_title):?>
			<div class="border-title">
				<h2><?php echo $popular_posts_title;?></h2>
			</div><!-- border title -->
		<?php endif;
		$popular_posts = get_field("popular_posts", 48778);
		$args = array(
			'post__in'=>$popular_posts
		);
		$query = new WP_Query($args);
		if($query->have_posts()):?>
			<?php get_template_part('template-parts/story-block'); ?>
			<?php wp_reset_postdata();
		endif;?>
		<div class="brew-sidebar">
			<div class="border-title">
				<h2>Morning Brew</h2>
			</div><!-- border title -->
			<div class="brew-wrapper">
				<?php $copy = get_field("morning_brew_copy",48778);
				if($copy):?>
					<div class="copy">
						<?php echo $copy;?>
					</div><!--.copy-->
				<?php endif;?>
				<a class="button" href="<?php echo get_permalink(21613);?>">Signup</a>
			</div><!--.wrapper-->
		</div><!--.brew-sidebar-->
	</div>

</div>
<?php 
get_footer();
