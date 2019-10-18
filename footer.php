<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ACStarter
 */
$facebook = get_field('facebook_link', 'option');
$instagram = get_field('instagram_link', 'option');
$twitter = get_field('twitter_link', 'option');
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="wrapper">
			<div class="logo-footer">
				<img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo-footer.png">
			</div>
			<div class="footer-nav">
				<?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?>
			</div><!-- .site-info -->
			<div class="social">
				<h3>Follow Us</h3>
				<?php if($facebook){ ?>
					<a href="<?php echo $facebook; ?>"><i class="fab fa-facebook-square fa-2x"></i></a>
				<?php } ?>
				<?php if($instagram){ ?>
					<a href="<?php echo $instagram; ?>"><i class="fab fa-instagram fa-2x"></i></a>
				<?php } ?>
				<?php if($twitter){ ?>
					<a href="<?php echo $twitter; ?>"><i class="fab fa-twitter-square fa-2x"></i></a>
				<?php } ?>
			</div>
			<div class="footer-newsletter">
				<h3>Join our community to reveive email updates</h3>
				<div class="">
					<a class="btn" href="<?php bloginfo('url'); ?>/email-signup">Subscribe</a>
				</div>
			</div>
	</div><!-- wrapper -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php 

get_template_part('template-parts/popups');

wp_footer(); 

?>

</body>
</html>
