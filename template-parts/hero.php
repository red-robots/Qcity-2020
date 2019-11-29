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
	'post_status'  => 'publish',
	'post__in' => get_option('sticky_posts'),
	'ignore_sticky_posts' => 1
));
if ($wp_query->have_posts()) : ?>
<section class="stickies">
	<div class="left ">

	<?php while ($wp_query->have_posts()) :  $wp_query->the_post(); $i++;
		// collect id's to not repeat below
		$postIDs[] = get_the_ID();
		$date = get_the_date();
		$img = get_field('story_image');
		
		//var_dump($img);
		
		// First Post
		if( $i == 1 ) {
	?>
	
		<article class="big-post">
			<?php if( has_post_thumbnail() ) { 
					the_post_thumbnail(); 
			 } elseif( $img ) { ?>					 
					<img src="<?php echo $img['sizes']['photo']; ?>" alt="<?php echo $img['alt']; ?>">
			<?php } else { ?>
					<img src="<?php bloginfo('stylesheet_directory'); ?>/images/default.png">
			<?php } ?>
			
			<div class="article-link"><a href="<?php the_permalink(); ?>"></a></div>
			<div class="info">
				<div class="category">
					<?php include( locate_template('template-parts/primary-category.php', false, false) ); ?>
				</div>
				<h3><?php the_title(); ?></h3>
				<div class="desc">
					<?php the_excerpt(); ?>
				</div>
				<div class="by">
					By: <?php the_author();?> | <?php echo get_the_date(); ?>
				</div>
			</div>
		</article>		
	</div>
	<div class="right">
		<?php } else { ?>
		<?php 
			$i++;
			//$img = get_field('story_image');

			?>
			<article class="story-block">
				<div class="photo">
					<?php if( has_post_thumbnail() ) { 
							the_post_thumbnail(); 
						 } elseif( $img ) { ?>					 
								<img src="<?php echo $img['sizes']['thirds']; ?>" alt="<?php echo $img['alt']; ?>">
						<?php } else { ?>
								<img src="<?php bloginfo('stylesheet_directory'); ?>/images/default.png">
						<?php } ?>
					<div class="category">
						<?php include( locate_template('template-parts/primary-category.php', false, false) ); ?>
					</div>
					
				</div>
				<h3><?php the_title(); ?></h3>
				<span class="mobile-toggle"><?php echo get_the_excerpt(); ?></span>
				<div class="desc">
					
				</div>
				<div class="by">
					By: <?php the_author(); ?> | <?php the_date(); ?>
				</div>
				<div class="article-link"><a href="<?php the_permalink(); ?>"></a></div>
			</article>
		<?php 
			//include( locate_template('template-parts/story-block.php', false, false) );
		 } endwhile; ?>
	</div>
	</section>
<?php 
endif;
wp_reset_postdata();
?>