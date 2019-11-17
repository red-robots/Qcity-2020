<article class="story-block">
	<div class="photo">		
		<?php if( has_post_thumbnail() ) {
				the_post_thumbnail('thirds');
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
		by: <?php the_author(); ?> | <?php the_date(); ?>
	</div>
	<div class="article-link"><a href="<?php the_permalink(); ?>"></a></div>
</article>