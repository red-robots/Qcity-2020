<?php 
$i++;
$img = get_field('story_image');

?>
<article class="story-block">
	<div class="photo">
		<?php if( $img ) { ?>
			<img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
		<?php } elseif( has_post_thumbnail() ) {
				the_post_thumbnail();
			} else { ?>
				<img src="<?php bloginfo('stylesheet_directory'); ?>/images/default.png">
			<?php } ?>
		
	</div>
	<h3><?php the_title(); ?></h3>
	<div class="desc">
		<div class="date">
			<?php echo $date->format('D | M j, Y'); ?>	
		</div>
	</div>
	<div class="article-link"><a href="<?php the_permalink(); ?>"></a></div>
</article>