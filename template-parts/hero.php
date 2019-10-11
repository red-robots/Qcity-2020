<?php
/*
	Hero's - Only sticky posts here.


*/
$i = 0;
$postIDs = array();
$wp_query = new WP_Query();
$wp_query->query(array(
	'post_type'=>'post',
	'posts_per_page' => 3,
	'post__in' => get_option('sticky_posts'),
	'ignore_sticky_posts' => 1
));
if ($wp_query->have_posts()) : ?>
<section class="stickies">
	<div class="left">

	<?php while ($wp_query->have_posts()) :  $wp_query->the_post(); $i++;
	// collect id's to not repeat below
	$postIDs[] = get_the_ID();
	// echo '<pre>';
	// print_r($postIDs);
	// echo '</pre>';
	
	// First Post
	if( $i == 1 ) {
	?>
	
		<article class="big-post">
			<?php if( $img ) { ?>
				<img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
			<?php } else {
				if( has_post_thumbnail() ) {  the_post_thumbnail();  }
				} ?>
			<div class="info">
				<div class="category">
					<?php include( locate_template('template-parts/primary-category.php', false, false) ); ?>
				</div>
				<h3><?php the_title(); ?></h3>
				<div class="desc">
					<?php the_excerpt(); ?>
				</div>
				<div class="by">
					by: <?php the_author(); ?>
				</div>
			</div>
			<div class="article-link"><a href="<?php the_permalink(); ?>"></a></div>
		</article>		
	</div>
	<div class="right">
		<?php } else {
			include( locate_template('template-parts/story-block.php', false, false) );
		 } endwhile; ?>
	</div>
	</section>
<?php 
endif;
wp_reset_postdata();
?>