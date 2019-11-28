<?php 
// if( is_archive() ) {
// 	$img = get_field('banner_image','48778'); // Page = Jobs
// } else {
// 	$img = get_field('banner_image');
// }
if( is_archive() ) {
	$img = get_field('story_image','48778'); // Page = Jobs
	$imgMob = get_field('story_image_mobile','48778');
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
				<form  method="get" class="biz" id="form_search">
				    <input class="searchfield" type="text" name="search_text" id="search"  />
				    <input type="hidden" class="post_type" name="type" value="job">
				    <input class="searchicon" type="image" alt="Search" src="<?php bloginfo( 'template_url' ); ?>/images/search.png" />
				</form>
			</div>	

		</div><!--.row-2-->
		<div class="bottom">
			<div class="btn">
				<a class="pop" href="<?php bloginfo('url'); ?>/post-a-job">Post an Job</a>
			</div>
			<div class="btn">
				<div class="banner-button find">Find a Job
				<?php 
				$terms = get_terms( array(
				    'taxonomy' => 'job_cat',
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
				<a href="<?php bloginfo('url'); ?>/why-this-jobs-board-matters/">More Info</a>
			</div>
		</div>
	</div>
</div>