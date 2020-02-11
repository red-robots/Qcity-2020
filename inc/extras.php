<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package ACStarter
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function acstarter_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'acstarter_body_classes' );


function search_filter_church($query) {
    if ( ! is_admin() && $query->is_main_query() ) {
        if ( $query->is_search ) {
            $query->set( 'post_type', 'church_listing' );
        }
    }
}
add_action( 'pre_get_posts', 'search_filter_church' );

function search_filter_business($query) {
    if ( ! is_admin() && $query->is_main_query() ) {
        if ( $query->is_search ) {
            $query->set( 'post_type', 'business_listing' );
        }
    }
}
add_action( 'pre_get_posts', 'search_filter_business' );


function email_obfuscator($string) {
    $output = '';
    if($string) {
        $emails_matched = ($string) ? extract_emails_from($string) : '';
        if($emails_matched) {
            foreach($emails_matched as $em) {
                $encrypted = antispambot($em,1);
                $replace = 'mailto:'.$em;
                $new_mailto = 'mailto:'.$encrypted;
                $string = str_replace($replace, $new_mailto, $string);
                $rep2 = $em.'</a>';
                $new2 = antispambot($em).'</a>';
                $string = str_replace($rep2, $new2, $string);
            }
        }
        $output = apply_filters('the_content',$string);
    }
    return $output;
}


add_filter( 'taxonomy_archive ', 'slug_tax_event_category' );
function slug_tax_event_category( $template ) {
    if ( is_tax( 'event_cat' ) ) {
         global $wp_query;
         $page = $wp_query->query_vars['paged'];
        if ( $page = 0 ) {
            $template = get_stylesheet_directory(). '/taxonomy-event-category.php';
        }
    }

    return $template;

}


/*
*   Related Posts by category
*/

function qcity_related_posts() {
 
    $post_id = get_the_ID();
    $cat_ids = array();
    $categories = get_the_category( $post_id );
 
    if ( $categories && !is_wp_error( $categories ) ) {
 
        foreach ( $categories as $category ) {
 
            array_push( $cat_ids, $category->term_id );
 
        }
 
    }

    $current_post_type = get_post_type( $post_id );
     
    $args = array(
        'category__in'      => $cat_ids,
        'post_type'         => $current_post_type,
        'post_status'       => 'publish',
        'posts_per_page'    => '5',
        'post__not_in'      => array( $post_id )
    );

    $query = new WP_Query( $args );
 
    if ( $query->have_posts() ) :   ?>
        <aside class="related-posts">
            <h3>
                <?php _e( 'Related Posts', 'qcity' ); ?>
            </h3>
            <ul class="related-posts">
                <?php
     
                    while ( $query->have_posts() ) :
     
                        $query->the_post();
     
                        ?>
                        <li>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </li>
                        <?php
     
                    endwhile;
     
                ?>
            </ul>
        </aside>
        <?php
     
    endif;
     
    wp_reset_postdata();
 
}


/*
*   Youtube iframe setup
*/

function youtube_setup( $src ){
    
    parse_str( parse_url( $src, PHP_URL_QUERY), $query);
    $id = $query['v'];
    $url = "https://www.youtube.com/embed/" . $id;
    
    return $url;
}

/*
*   Advertisements
*/

function get_ads_script($slug)
{
    $ad_script = '';
    $ads_params = array();

    $ad_post = get_page_by_path( $slug, OBJECT, 'ad' );

    $args = array(       
        'post_type'         => 'ad',
        'post_status'       => 'publish',
        'p'                 => $ad_post->ID,        
    );

    $query = new WP_Query( $args );

    if ( $query->have_posts() ) :   

         while ( $query->have_posts() ) :
     
            $query->the_post();

            $ad_enable = get_field('enable_ad');
            if( $ad_enable == 'Yes' ):

                $ad_script      = get_field('ad_script');
                $ads_label      = get_field('ads_label');
                $ads_link_text  = get_field('ads_link_text');
                $ads_link_url   = get_field('ads_link_url');

                $ads_params = array(
                    'ad_script'     => $ad_script,
                    'ads_label'     => $ads_label,
                    'ads_link_text' => $ads_link_text,
                    'ads_link_url'  => $ads_link_url
                );            
            endif;

        endwhile;

    endif;

    wp_reset_postdata();

    return $ads_params;
}

/*
*   Search for Jobs content
*/

function have_content( $term_id )
{
    $content = false;
    $args = array(
            'post_type'     => 'job',
            'post_status'   => 'publish',
            'tax_query' => array( 
                    array(
                        'taxonomy' => 'job_cat',
                        'field' => 'id',
                        'terms' => $term_id,
                        'include_children' => false,
                        'operator' => 'IN'
                      )
            )

    );

    $query = new WP_Query( $args );

    if( $query->have_posts() ):

        $content = true;

    else:  

        $content = false;

    endif;
    wp_reset_postdata();

    return $content;
}

/*
*   Adding Ads inside single article
*/


add_filter('the_content', 'qcity_add_incontent_ad');
function qcity_add_incontent_ad( $content )
{   
    $hide_ads = (defined('HIDE_ADS') && HIDE_ADS ) ? true : false;
    if( is_single() && ( get_post_type() === 'post' ) && !$hide_ads ){
        $content_block  = explode('<p>',$content);
        $ads_6th        = get_ads_script('single-article-after-6th-paragraph');
        $ads_12th       = get_ads_script('single-article-after-12th-paragraph');
        if( !empty($content_block[5]) && $ads_6th)
        {               
            $content_block[5] .= '</div>
                            <div class="brown-bar"><div class="qcity-ads-label">'. $ads_6th['ads_label'] .' <a href="'. $ads_6th['ads_link_url'] .'">'. $ads_6th['ads_link_text'] .'</a> </div>'. $ads_6th['ad_script'] .'</div>
                            <div class="content-single-page">';
        }
        if( !empty($content_block[11]) && $ads_12th)
        {               
            $content_block[11] .= '</div>
                            <div class="brown-bar"><div class="qcity-ads-label">'. $ads_12th['ads_label'] .' <a href="'. $ads_12th['ads_link_url'] .'">'. $ads_12th['ads_link_text'] .'</a> </div>'. $ads_12th['ad_script'] .'</div>
                            <div class="content-single-page">';
        }
        for($i=1; $i<count($content_block); $i++)
        {   
            $content_block[$i] = '<p>'.$content_block[$i];
        }
        $content = implode('',$content_block);
    } elseif( is_page('business-directory-sign-up') ){

        //add_filter( 'gform_pre_render', 'qcity_insert_packages' );

        $content_block  = explode('<p>',$content);

        //r_dump($content_block);

        if( !empty($content_block[2])){

            $packages = get_field('packages');

            if( $packages ): 
                    $content_block[2] .= '<section class="tiers membership-thirds pricing-grid signup">';
                foreach( $packages as $package): 
                        
                        $title  = $package['package_title'];
                        $desc   = $package['package_details'];

                        if( $title ):
                            $content_block[2] .= '<div class="third plan">
                            <h3>'. $title .'</h3> '. $desc .'
                            </div>
                            ';
                        endif;                         
                endforeach;
                $content_block[2] .= '</section>';     
                ?>
            <?php endif; ?>    

        <?php }

            for($i=1; $i<count($content_block); $i++)
            {   
                $content_block[$i] = '<p>'.$content_block[$i];
            }
            $content = implode('',$content_block);   

    }
    return $content;    
}

function qcity_insert_packages()
{
    $content_block = '';
    if( is_page('business-directory-sign-up') ){

        $packages = get_field('packages');

        $content_block = '<section class="tiers membership-thirds pricing-grid signup">';

        foreach( $packages as $package): 
                        
                        $title  = $package['package_title'];
                        $desc   = $package['package_details'];

                        if( $title ):
                            $content_block .= '<div class="third plan">
                            <h3>'. $title .'</h3> '. $desc .'
                            </div>
                            ';
                        endif;                         
        endforeach;
        $content_block .= '</section>';
    } // page 
    return $content_block;
}

