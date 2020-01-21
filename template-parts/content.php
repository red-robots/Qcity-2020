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

$guest_author 	=  get_field('author_name') ;
$hide_ads 		= get_field('hide_ads');

//var_dump($hide_ads);

?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">

		<div class="content-single-page">		
			<?php
			if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">				
					<div>By <?php echo ( $guest_author ) ? $guest_author : get_the_author(); ?> </div>
					<div><?php echo get_the_date(); if($mod){echo' | Updated '.$mod;} ?></div>
				</div><!-- .entry-meta -->
			<?php endif; ?>
		</div>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<div class="content-single-page">
		<?php

			/*if( $hide_ads ):

				add_filter('the_content', 'qcity_add_incontent_ad');
				the_content( sprintf(
					 //translators: %s: Name of current post.
					 wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'acstarter' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );

			else:*/

				the_content( sprintf(
						 //translators: %s: Name of current post.
						 wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'acstarter' ), array( 'span' => array( 'class' => array() ) ) ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );

			//endif;		
			
		?>
		</div>
	</div><!-- .entry-content -->

	<div class="content-single-page">

		<div class="tags">	
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

	</div>
</article><!-- #post-## -->
