<?php 
if( is_tax() ) {
	$img = get_the_post_thumbnail('63060'); // Page = Qcity Biz
} else {
	$img = get_the_post_thumbnail();
}
?>

<div class="banner">
	<?php echo $img; ?>
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