<?php 
/*$page = get_posts( array( 'name' => 'business-directory', 'post_type' => 'page' ) );

if ( $page )
{
    $page_id = $page[0]->ID;
}*/

$args = array(
	'pagename' 		=> 'business-directory',
	'post_status'	=> 'publish',
);

$query = 

if( is_tax() ) {
	$img = get_field('story_image','63060'); // Page = Qcity Biz
	$imgMob = get_field('story_image_mobile','63060');
} else {
	$img = get_field('story_image');
	$imgMob = get_field('story_image_mobile');
}

$add_business = get_field('add_your_business');
$add_business_link = get_field('add_business_link');
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
			<div class="search mobile_hide">
				<form  method="get" class="biz" id="form_search">
				    <input class="searchfield" type="text" name="search_text" id="search"  />
				    <input type="hidden" class="post_type" name="type" value="business_listing">
				    <input class="searchicon" type="image" alt="Search" src="<?php bloginfo( 'template_url' ); ?>/images/search.png" />
				</form>
			</div>	
		</div><!--.row-1-->
		<a href="<?php echo ($add_business_link) ? $add_business_link : '';  ?>"><?php echo ($add_business) ? $add_business : ''; ?></a>
	</div>
</div>