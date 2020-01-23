<section class="home-bottom">
	
	<div class="jobs mobile-gap">		
        <script async src="https://modules.wearehearken.com/qcitymetro/embed/4551.js"></script>
	</div>

    <!--- West End Connect -->
	<div class="biz-dir mobile-gap" style="background-color: none">
        <header class="before-footer-title ">
            <h2 >West End Connect</h2>
        </header>

        <div class="footer-content-list">
            <?php
                $args = array(
                        'post_type'         => 'post',
                        'posts_per_page'    => 5,
                        'post_status'       => 'publish',  
                        'category_name'     => 'offers-invites',
                );
                $trending = new WP_Query( $args );
                if( $trending->have_posts() ):                    
                    while( $trending->have_posts() ): $trending->the_post();
                        $guest_author =  get_field('author_name');
                        $author = ( $guest_author ) ? $guest_author : get_the_author();
                        echo '<div class="footer-content-list-item">';
                        echo '<h3>'. get_the_title() .'</h3>';
                        echo '<div class="footer-content-author"><span class="footer-author">'. $author .'</span> <span class="footer-content-date">'. date('M. j, Y', strtotime(get_the_date() )) .'</span></div>';
                        echo '</div>';
                    endwhile;                    
                endif; 
                wp_reset_postdata();
            ?>
        </div>

    </div>
	
	<!--- Trending Articles -->
	<div class="ad" >
       <header class="before-footer-title ">
            <h2 >Trending Articles</h2>
        </header>

        <div class="footer-content-list">
            <?php
                $args = array(
                        'post_type'         => 'post',
                        'posts_per_page'    => 5,
                        'post_status'       => 'publish',  
                );
                $trending = new WP_Query( $args );
                if( $trending->have_posts() ):                    
                    while( $trending->have_posts() ): $trending->the_post();
                        $guest_author =  get_field('author_name');
                        $author = ( $guest_author ) ? $guest_author : get_the_author();
                        echo '<div class="footer-content-list-item">';
                        echo '<h3>'. get_the_title() .'</h3>';
                        echo '<div class="footer-content-author"><span class="footer-author">'. $author .'</span> <span class="footer-content-date">'. date('M. j, Y', strtotime(get_the_date() )) .'</span></div>';
                        echo '</div>';
                    endwhile;                    
                endif; 
                wp_reset_postdata();
            ?>
        </div>
		
	</div>
</section>