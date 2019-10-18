<?php 
if( is_tax() ) {
	$img = get_field('story_image','63060'); // Page = Qcity Biz
	$imgMob = get_field('story_image_mobile','63060');
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
		<h1 class="biz">Find a QCity local business.</h1>
		<div class="row-2">
			
			<div class="banner-button find">All Categories
			<?php 
			$terms = get_terms( array(
			    'taxonomy' => 'business_category',
			    'hide_empty' => false,
			) );
				if(is_array($terms)&&!empty($terms)):?>
                        <ul>
                            <?php foreach($terms as $term):?>
                                <li>
                                    <a href="<?php echo get_term_link($term->term_id);?>"><?php echo $term->name;?></a> 
                                </li>
                            <?php endforeach;?>
                        </ul>
                    <?php endif;?>
			</div>
			<div class="search">
				<form action="/" method="get" class="biz">
				    <input class="searchfield" type="text" name="s" id="search"  onfocus="if(this.value=='<?php _e( 'search' ); ?>'){this.value='';}" onblur="if(this.value==''){this.value='<?php _e( 'search' ); ?>';}" value="<?php _e( 'search' ); ?>"/>
				    <input class="searchicon" type="image" alt="Search" src="<?php bloginfo( 'template_url' ); ?>/images/search.png" />
				</form>
			</div>	
		</div><!--.row-1-->
		<a href="">Add your Business To This Directory ></a>
	</div>
</div>