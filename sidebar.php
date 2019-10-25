<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ACStarter
 */
wp_reset_postdata();
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
	$title = 'This is a page and needs to change the query';
	$qp = 'business_listing';
}

if( is_page('events') ) {
	$text = 'Get our newsletter to keep up with events and ticket giveaways.';
} else {
	$text = 'Have you signed up to receive our daily news and events listings?';
}
?>

<aside id="secondary" class="widget-area" role="complementary">
	<div class="side-offer">
		<p><?php echo $text; ?></p>
		<div class="btn">
			<a class="white" href="<?php bloginfo('url'); ?>/email-signup">Subscribe</a>
		</div>
	</div>
	
		<?php
		$wp_query = new WP_Query();
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
</aside><!-- #secondary -->
