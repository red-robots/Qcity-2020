<?php
/**
 * Template Name: Church Listings
 */

get_header();
get_template_part('template-parts/banner-church');
$obj=get_queried_object();
// echo '<pre>';
// print_r($obj);
// echo '</pre>';
?>
<div class="wrapper">
	<div class="content-area">
		<header class="section-title ">
			<h2 class="dark-gray"><?php echo $obj->name; ?></h2>
		</header>
	</div>
</div>
<div class="wrapper">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			/*
				Jobs 


			*/
				if ( have_posts() ) : ?>
				<section class="church-list">
					<?php while ( have_posts() ) : the_post();

	
							include(locate_template('template-parts/church.php')) ;


					 	endwhile; 

					 	pagi_posts_nav();

					 	?>
					</section>
				<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->




<?php get_sidebar('church'); ?>
</div>
<?php get_footer();
