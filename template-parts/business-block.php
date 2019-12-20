<?php 
$img    = get_field('business_photo');
$phone  = get_field('phone');
$email  = get_field('email');
$email  = antispambot($email);

if($img){
    $image = $img['url'];
} elseif( has_post_thumbnail() ){
    $image = get_the_post_thumbnail('thirds');
} else {
    $image = get_template_directory_uri() . '/images/default.png';
}

 ?>


 


<article class="story-block business_category" style="text-align: left">
    <a href="<?php echo get_the_permalink(); ?>">
    <div class="photo" style="background-image: url('<?php echo $image; ?>');">
        
        <?php /*if( $img ) { ?>
            <img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
        <?php } elseif( has_post_thumbnail() ) {
                the_post_thumbnail('thirds');
            } else { ?>
                <img src="<?php bloginfo('stylesheet_directory'); ?>/images/default.png">
            <?php } */ ?>
        
    </div> 
    </a>   
    <div class="desc" style="padding: 0 20px;">
        <h3><?php echo get_the_title(); ?></h3>
        <div><span class="bold">Phone:</span> <?php echo esc_html($phone); ?></div>
        <div><span class="bold">Email:</span> <a href="mailto:<?php echo antispambot($email, 1); ?>"><?php echo esc_html(strtolower($email)); ?></a></div>
        <div class="">
            <a href="<?php echo get_the_permalink(); ?>" class="bold">More Info</a>
        </div>
    </div>
    
</article>
