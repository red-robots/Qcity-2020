<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */
//$storyImage = get_field( 'story_image' );

$mod = the_modified_date('M j, Y', '', '', false);
// echo '<pre>';
// print_r($mod);
// echo $mod;
// echo '</pre>';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); 

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<div class="category"><?php get_template_part('template-parts/primary-category'); ?></div>
			By <?php the_author(); ?> 
			<?php echo get_the_date(); if($mod){echo' | Updated '.$mod;} ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'acstarter' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			// wp_link_pages( array(
			// 	'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'acstarter' ),
			// 	'after'  => '</div>',
			// ) );
		?>
	</div><!-- .entry-content -->

	<div class="tags">
	<?php 
		// $tags = get_the_tag_list();
		// echo '<pre>';
		// print_r($tags);
		// echo '</pre>';
	 ?>
		 <?php echo get_the_tag_list(
		 	'<span class="title">This Story is Tagged: </span> ',
		 	', '
		 ); ?>
	</div>

	<div class="share">
		<?php echo do_shortcode('[social_warfare]'); ?>
	</div>

	
	<footer class="entry-footer">
		<!-- <div class="share"></div> -->
		
		<div class="author-block">
		<?php 
			$aName = get_the_author_meta('display_name');
			$aDesc = get_the_author_meta('description');

			$chooseAuthor = get_field( 'choose_author' );
			$size         = 'thumbnail';
			$authorPhoto  = null;
			
			// echo '<pre>';
			// print_r($aUrl);
			// echo '</pre>';
		?>
			<a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
				<div class="left">
				
					<div class="photo">
						<?php 
						if ( $chooseAuthor != '' ):
							$authorID   = $chooseAuthor['ID'];
							$authorPhoto = get_field( 'custom_picture', 'user_' . $authorID );
						else:
							$authorPhoto = get_field('custom_picture','user_'.get_the_author_meta('ID'));
						endif;
						if ( $authorPhoto ):
							echo wp_get_attachment_image( $authorPhoto, $size );
						endif; //  if photo  ?>
					</div>
				</div>
				<div class="info">
					<h3><?php echo $aName; ?></h3>
					<?php echo $aDesc; ?>
				</div>
			</a>
		</div>

		<section class="comments">
			<?php //echo do_shortcode( '[Fancy_Facebook_Comments]' ); ?>
			<div id="disqus_thread"></div>
			<script>
			    /**
			     *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
			     *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables
			     */
			    
			    var disqus_config = function () {
			        this.page.url = '<?php echo get_permalink(); ?>';  // Replace PAGE_URL with your page's canonical URL variable
			        this.page.identifier = '<?php echo get_permalink(); ?>'; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
			    };
			    
			    (function() {  // REQUIRED CONFIGURATION VARIABLE: EDIT THE SHORTNAME BELOW
			        var d = document, s = d.createElement('script');
			        
			        s.src = 'https://EXAMPLE.disqus.com/embed.js';  // IMPORTANT: Replace EXAMPLE with your forum shortname!
			        
			        s.setAttribute('data-timestamp', +new Date());
			        (d.head || d.body).appendChild(s);
			    })();
			</script>
			<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
		</section>

	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
