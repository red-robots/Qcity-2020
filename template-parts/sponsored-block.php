<?php 
$i++;
$img 		= get_field('event_image');
$category 	= get_field('choose_categories');
$venue 		= get_field('name_of_venue');

$img 		= get_field('event_image');
$date 		= get_field("event_date", false, false);
$date 		= new DateTime($date);
$enddate 	= get_field("end_date", false, false);
$enddate 	= ( !empty($enddate) ) ? new DateTime($enddate) : $date;

$date_start 	= strtotime($date->format('Y-m-d'));
$date_stop 		= strtotime($enddate->format('Y-m-d'));
$now 			= strtotime(date('Y-m-d'));

if( $img ){
	$image = $img['url'];
} elseif ( has_post_thumbnail() ) {
	$image = get_the_post_thumbnail('thirds');
	//var_dump($image);
} else {
	$image = get_template_directory_uri() . '/images/default.png';
}

//var_dump($venue);
?>
<article class="story-block">
	<div class="photo event-photo" style="background-image: url(<?php echo $image; ?>);">		
		<div class="category">			
			<?php echo qcity_get_terms(get_the_ID(), 'event_cat'); ?>
		</div>
	</div>
	<div class="event-desc">
		<h3><?php the_title(); ?></h3>
		<div class="event-desc-text brown"><?php echo $date->format('l'); ?>, <?php echo $date->format('F j, Y'); ?></div>
		<div class="event-desc-text"><?php echo $venue; ?></div>
	</div>
	
	<!--
	<div class="description">
		<div class="date">
			<div><?php //echo $date->format('l'); ?></div>
			<?php //echo $date->format('F j, Y'); ?>	
		</div>
		<div class="location">
			<?php //echo $venue; ?>
		</div>
	</div>
	-->
	<div class="article-link"><a href="<?php the_permalink(); ?>"></a></div>
</article>