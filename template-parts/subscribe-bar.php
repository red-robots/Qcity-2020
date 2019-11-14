<?php
    
    $subscribe_text         = get_field('subscribe_text');
    $subscribe_link         = get_field('subscribe_link');
    $subscribe_button_name  = get_field('subscribe_button_name');

?>

<div class="subscribe-wrap">
	<div class="subscribe">
		Have you signed up to receive our daily news and events listings? <a href="<?php echo ($subscribe_link) ? $subscribe_link : '/email-signup';  ?>"><?php echo ($subscribe_button_name) ? $subscribe_button_name : 'Subscribe';  ?></a>
	</div>
</div>