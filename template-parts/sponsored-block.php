<?php 
$i++;
$img 		= get_field('story_image');
$category 	= get_field('choose_categories');
$venue 		= get_field('name_of_venue');

//var_dump($venue);
?>
<article class="story-block">
	<div class="photo">
		<?php if( $img ) { ?>
			<img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
		<?php } elseif( has_post_thumbnail() ) {
				the_post_thumbnail('thirds');
			} else { ?>
				<img src="<?php bloginfo('stylesheet_directory'); ?>/images/default.png">
			<?php } ?>
		<div class="category">
			<a href="<?php echo get_category_link( $category[0]->term_id ); ?>"><?php echo $category[0]->name; ?></a>
		</div>
	</div>
	<h3><?php the_title(); ?></h3>
	<div class="description">
		<div class="date">
			<div><?php echo $date->format('l'); ?></div>
			<?php echo $date->format('F j, Y'); ?>	
		</div>
		<div class="location">
			<?php echo $venue; ?>
		</div>
	</div>
	<div class="article-link"><a href="<?php the_permalink(); ?>"></a></div>
</article>