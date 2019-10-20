<?php 
if(have_posts()): the_post();
	$sponsors = get_field('sponsors');
endif;

$display_to_public = get_field("display_to_public");
if(strcmp($display_to_public,"no")===0):
	$temp_post = get_post(39809);
	if($temp_post):
		wp_redirect( get_the_permalink( 39809) );
		exit;
	endif;
endif;
get_header(); 
//get_template_part('ads/sponsor-header');
?>

<div class="wrapper">
	<?php if( has_post_thumbnail() ){ ?>
		<div class="story-image">
			<?php the_post_thumbnail(); ?>
		</div>
	<?php } ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="wrapper">
				<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', get_post_format() );

				endwhile; // End of the loop.

				?>
			</div>

		<?php get_template_part('template-parts/next-story'); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<div class="widget-area">
<?php //get_template_part('inc/our-partners'); ?>
<?php //if($sponsors):
		// $post = get_post($sponsors[0]->ID);
		// setup_postdata( $post );
		$logo = get_field("logo");
		$description = get_field("description");
		$logo_link = get_field("logo_hyperlink");
		$link = get_field("sponsorship_policy_link",39809);
		$link_text = get_field("sponsorship_policy_text",39809);?>
			<div class="sponsor-sidebar">
				<div class="side-offer">
				<h2>Sponsored By:</h2>
				<?php if($logo):?>
					<?php if($logo_link):?>
						<a href="<?php echo $logo_link;?>">
					<?php endif;?>
						<img src="<?php echo $logo['sizes']['large'];?>" alt="<?php echo $logo['alt'];?>">
					<?php if($logo_link):?>
						</a>
					<?php endif;
				endif;
				if($description):?>
					<div class="description">
						<?php echo $description;?>
					</div><!--.description-->
				<?php endif;
				if($link && $link_text):?>
				<div class="btn">
					<a class="white" href="<?php echo $link;?>" target="_blank"><?php echo $link_text;?></a>
					</div>
				<?php endif;?>
				</div><!--.sponsor-sidebar-wrapper-->
			</div><!--.sponsor-sidebar-->
		<?php //get_template_part('ads/sponsor');
		wp_reset_postdata();
	//endif;
	//get_template_part( 'ads/sponsor' );?>
</div><!--.widget-area-->

</div>
<?php 
get_footer();