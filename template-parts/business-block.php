<?php 
$img    = get_field('business_photo');
$phone  = get_field('phone');
$email  = get_field('email');
$email  = antispambot($email);

 ?>
 


<article class="story-block" style="text-align: left">
    <div class="photo">
        <?php if( $img ) { ?>
            <img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
        <?php } elseif( has_post_thumbnail() ) {
                the_post_thumbnail('thirds');
            } else { ?>
                <img src="<?php bloginfo('stylesheet_directory'); ?>/images/default.png">
            <?php } ?>
        
    </div>
    <h3><?php the_title(); ?></h3>
    <div class="desc">
        <div><span class="bold">Phone:</span> <?php echo $phone; ?></div>
        <div><span class="bold">Email:</span> <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></div>
        <div class="">
            <a href="<?php the_permalink(); ?>" class="bold">More Info</a>
        </div>
    </div>
    
</article>
