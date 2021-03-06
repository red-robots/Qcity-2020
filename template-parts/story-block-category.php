<?php
	$image = "";
	if( has_post_thumbnail() ) {
		$image = get_the_post_thumbnail_url();
	} else { 
		$image = get_template_directory_uri() . '/images/default.png';
	}

	$height = ( is_archive() ) ? ' height: 200px' : '';

	$guest_author =  get_field('author_name') ;
?>

<article class="story-block">
	<div class="photo story-image" style="background-image: url('<?php echo $image; ?>'); <?php echo $height; ?> " >		
		<?php /*if( has_post_thumbnail() ) {
				the_post_thumbnail('thirds');
			} else { 
				$image = get_template_directory_uri() . '/images/default.png';
				?>
				<img src="<?php echo $image; ?>">
			<?php }  */ ?>
		<div class="category">
			<?php include( locate_template('template-parts/primary-category.php', false, false) ); ?>
		</div>
		
	</div>
	<h3><?php the_title(); ?></h3>	
	<div class="desc">
		<span><?php echo get_the_excerpt(); ?></span>
	</div>
	<div class="by">
		By <?php echo ( $guest_author ) ? $guest_author : get_the_author(); ?> | <?php echo get_the_date(); ?>
	</div>
	<div class="article-link"><a href="<?php the_permalink(); ?>"></a></div>
</article>