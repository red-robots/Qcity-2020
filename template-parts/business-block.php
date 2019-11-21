<?php 
$img    = get_field('business_photo');
$phone  = get_field('phone');
$email  = get_field('email');
$email  = antispambot($email);

 ?>
 
<div class="jobs-page">
    <div class="biz-job-wrap">
            <div class="job">
                <div class="img">
                    <img src="<?php echo $img['url']; ?>"  alt="<?php echo $img['alt']; ?>">
                </div>
                <div class="info">
                    <h3 class="featured_business_header"><?php the_title(); ?></h3>
                    <h4>Phone: <?php echo $phone; ?></h4>
                    <h4>Email: <?php echo $email; ?></h4>                    
                </div>
                <div class="view">
                    <div class="viewlink">
                        <a href="<?php the_permalink(); ?>">More Info</a>
                    </div>
                </div>
            </div>
    </div>
</div>
