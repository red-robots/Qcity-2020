<?php
if( is_archive() ) {
	$img = get_field('story_image','54'); // Page = Events
	$imgMob = get_field('story_image_mobile','54');
} else {
	$img = get_field('story_image');
	$imgMob = get_field('story_image_mobile');
}
?>

<div class="banner">
	<picture>
		<source media="(max-width: 600px)"
	            srcset="<?php echo $imgMob['url']; ?>" alt="<?php echo $imgMob['alt']; ?>">
	    <source media="(min-width: 601px)"
	            srcset="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
	    <img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
	</picture>
	<div class="banner-info">
		<div class="titles">
			<h1>Whats Happening, Charlotte</h1>
			<div class="sub">The Qcity's Going Out Guide</div>
		</div>
		<div class="row-2">
			
			
			<div class="search">
				<form action="/" method="get" class="biz">
				    <input class="searchfield" type="text" name="s" id="search"  onfocus="if(this.value=='<?php _e( 'search' ); ?>'){this.value='';}" onblur="if(this.value==''){this.value='<?php _e( 'search' ); ?>';}" value="<?php _e( 'search' ); ?>"/>
				    <input class="searchicon" type="image" alt="Search" src="<?php bloginfo( 'template_url' ); ?>/images/search.png" />
				</form>
			</div>	

		</div><!--.row-2-->
		<?php get_template_part('template-parts/event-btn'); ?>
	</div>
</div>