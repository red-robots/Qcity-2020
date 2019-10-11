<?php 
$bp = get_field('business_photo');
$phone = get_field('phone');
$email = get_field('phone');
$email = antispambot($email);

 ?>
 <article class="biz">
	 <?php if( $bp ) { ?>
	 	<img src="<?php echo $bp['url'] ?>" alt="<?php echo $bp['alt'] ?>">
 	<?php } ?>
 	<h2><?php the_title(); ?></h2>
 	<div class="detail">
 		<b>Phone:</b> <?php echo $phone; ?>
 	</div>
 	<div class="detail">
 		<b>Email:</b> <?php echo $email; ?>
 	</div>
 	<div class="detail">
 		<a href="<?php the_permalink(); ?>">More Info</a>
 	</div>
 </article>