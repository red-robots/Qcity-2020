<?php 
if( is_archive() ) {
	$img = get_the_post_thumbnail('54'); // Page = Events
} else {
	$img = get_the_post_thumbnail();
}
?>

<div class="banner">
	<?php echo $img; ?>
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
		<div class="bottom">
			<div class="btn">
				<a href="">Post an Event</a>
			</div>
			<div class="btn">
				<div class="banner-button find">Event Categories
				<?php 
				$terms = get_terms( array(
				    'taxonomy' => 'eveny_category',
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
			</div>
			<div class="btn">
				<a href="">Events This Weekend</a>
			</div>
		</div>
	</div>
</div>