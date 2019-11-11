<?php 
$i++;
$img = get_field('story_image');

?>
<article class="story-block">
	<div class="photo">
		<?php if( $img ) { ?>
			<img src="<?php echo $img['sizes']['thirds']; ?>" alt="<?php echo $img['alt']; ?>">
		<?php //} elseif( has_post_thumbnail() ) {
				//the_post_thumbnail();
			} else { ?>
				<img src="<?php bloginfo('stylesheet_directory'); ?>/images/default.png">
			<?php } ?>
		<div class="category">
			<?php include( locate_template('template-parts/primary-category.php', false, false) ); ?>
		</div>
		
	</div>
	<h3><?php the_title(); ?></h3>
	<span><?php echo get_the_excerpt(); ?></span>
	<div class="desc">
		
	</div>
	<div class="by">
		by: <?php the_author(); ?>
	</div>
	<div class="article-link"><a href="<?php the_permalink(); ?>"></a></div>
</article>