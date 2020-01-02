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

			<section class="footer-section">

				<div class="logo-footer desktop-version" style="padding-left:20px">
					<img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo-footer.png">
				</div>
				<div class="footer-nav">
					<div class="footer-main-nav">
						<?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?>
					</div>
					<div class="footer-submenu-nav">
						<?php wp_nav_menu(array('theme_location'=>'burger','menu_class'=>'main','container'=>'ul')); ?>
					</div>				
				</div><!-- .site-info -->
				<div class="social">
					<div class="desktop-version">
						<h3 >Follow Us</h3>
					</div>				
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
				<div class="footer-newsletter desktop-version">
					<h3>Join our community to reveive email updates</h3>
					<div class="">
						<a class="btn" href="<?php bloginfo('url'); ?>/email-signup">Subscribe</a>
					</div>
				</div>
				
			</section>

			


		</div><!-- wrapper -->
		<div class="site-footer-overlay"></div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php 

get_template_part('template-parts/popups');

wp_footer(); 

?>

<script>
	$(document).ready(function($){
		if ($(window).width() < 767) {

	        // When the user scrolls the page, execute myFunction
	        //window.onscroll = function() {myFunction()};

	        // Get the header
	        var header = document.getElementById("fixed");
	         header.classList.add("sticky");

	        // Get the offset position of the navbar
	        var sticky = 0;

	        // Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
	        function myFunction() {
	          if (window.pageYOffset > sticky) {
	            header.classList.add("sticky");
	          } else {
	            header.classList.remove("sticky");
	          }
	        }

	    }
	    
	});
</script>

</body>
</html>
