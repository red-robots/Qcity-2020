<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ACStarter
 */

wp_reset_postdata();
wp_reset_query();

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
if( get_post_type() == 'post' ) {
	$title = 'Trending';
	$qp = 'post';
} elseif( is_page('qcity-biz') ) {
	$title = 'Latest Business Articles';
	$qp = 'business_listing';
} elseif( is_tax() ) {
	$title = 'Latest Business Articles';
	$qp = 'business_listing';
} elseif( get_post_type() == 'page' ) {
	$title = 'Latest Stories';
	$qp = 'business_listing';
}

if( is_page('events') ) {
	$text = 'Get our newsletter to keep up with events and ticket giveaways.';
} else {
	$text = 'Have you signed up to receive our daily news and events listings?';
}
?>

<div class="widget-area">

<?php 
	// If is Sponsored Post

	$sponsors = get_field('sponsors');
	if($sponsors):
		$post = get_post($sponsors[0]->ID);
		$logo = get_field("logo", $post);
		$description = get_field("description", $post);
		$logo_link = get_field("logo_hyperlink", $post);
		// setup_postdata( $post );
		// get_template_part('ads/sponsor-header');
		// wp_reset_postdata();
	endif;
	// echo '<pre>';
	// print_r($sponsors);
	// echo '</pre>';

	
	$link = get_field("sponsorship_policy_link",39809);
	$link_text = get_field("sponsorship_policy_text",39809);

	if( $sponsors ):
	?>
		<div class="sponsored-by">
			<div class="sponsor-sidebar-wrapper">
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
				<a href="<?php echo $link;?>" target="_blank"><?php echo $link_text;?></a>
			<?php endif;?>
			</div><!--.sponsor-sidebar-wrapper-->
		</div><!--.sponsor-sidebar-->
	<?php endif; ?>


	<?php  if( (get_post_type() != 'post') ||  is_category() ): ?>
	
	<div class="side-offer">
		<p><?php echo $text; ?></p>
		<div class="btn">
			<a class="white" href="<?php bloginfo('url'); ?>/email-signup">Subscribe</a>
		</div>
	</div>

	
	
		<?php
		$wp_query = new WP_Query();
		
		// might do an if / then for offers and invites category here..

		$wp_query->query(array(
			'post_type'=> $qp,
			'posts_per_page' => 6
		));
		if ($wp_query->have_posts()) : ?>
			<div class="next-stories">
				<h3><?php echo $title; ?></h3>
					<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
						<article class="small">
							<a href="<?php the_permalink(); ?>">
								<div class="img">
									<?php the_post_thumbnail('thumbnail'); ?>
								</div>
								<div class="xtitle">
									<?php the_title(); ?>
								</div>
							</a>
						</article>
						
					<?php endwhile; ?>
					<div class="more">
						<a class="gray" href="">Load More</a>
					</div>	
				<?php endif; ?>
			</div>
	<?php //dynamic_sidebar( 'sidebar-1' ); ?>
</div><!-- #secondary -->

<?php endif; ?>
