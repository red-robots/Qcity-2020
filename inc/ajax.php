<?php

/*
*   QCity
*/

add_action('wp_ajax_nopriv_qcity_load_more', 'qcity_load_more');
add_action('wp_ajax_qcity_load_more', 'qcity_load_more');

function qcity_load_more(){

    $base_post = $_POST['basepoint'];

    $paged      = $_POST['page'] + 1;
    $perpage    = 6;
    $cat_id     = get_category_by_slug( 'sponsored-post' );

    $offset     =  $base_post;    

    $args = array(
            'post_type'             => 'post',
            'post_status'           => 'publish',
            'paged'                 => $paged,
            'post__not_in'          => $postIDs,
            'category__not_in'      => array( $cat_id->term_id ),
            'posts_per_page'        => $perpage,
            'offset'                => $offset ,
        );

    $query = new WP_Query( $args );    
   
    if( $query->have_posts() ):

        while( $query->have_posts() ): $query->the_post();

            include( locate_template('template-parts/story-block.php', false, false) );   

            get_template_part( 'template-parts/separator');  

            $base_post++;       

        endwhile;

        wp_reset_postdata();

    else:    

        echo 0;

    endif;

    

    die();
}

/*
*   AJAX Call for Events Load more
*/

add_action('wp_ajax_nopriv_qcity_events_load_more', 'qcity_events_load_more');
add_action('wp_ajax_qcity_events_load_more', 'qcity_events_load_more');

function qcity_events_load_more(){

    $paged      = $_POST['page'] + 1;
    $today      = date('Ymd');
    $postID     = $_POST['postID'];
    $perpage    = $_POST['perPage'];
    $base_post  = $_POST['basepoint'];
    $offset     =  $base_post;

    $query = new WP_Query( array(
        'post_type'         => 'event',
        'post_status'       => 'publish',
        'paged'             => $paged,
        'order'             => 'ASC',
        'meta_key'          => 'event_date',
        'orderby'           => 'event_date',
        'posts_per_page'    => $perpage,
        'post__not_in'      => explode(',', $postID),
        'offset'            => $offset ,
        'meta_query'        => array(
                                'relation' => 'OR',
                                array(
                                    'key'       => 'event_date',
                                    'compare'   => '>=',
                                    'value'     => $today,
                                ),
                                array(
                                    'key'       => 'end_date',
                                    'compare'   => '>=',
                                    'value'     => $today,
                                ),
        ),        
    ));    
   
    if( $query->have_posts() ):
        echo '<section class="events">';
        while( $query->have_posts() ): $query->the_post();

            $img    = get_field('event_image');
            $date   = get_field("event_date", false, false);
            $date   = new DateTime($date);
            $enddate = get_field("end_date", false, false);
            $enddate = new DateTime($enddate);

            include( locate_template('template-parts/sponsored-block.php') );            

        endwhile;
        echo '</section>';
    else:    

        echo 0;

    endif;

    wp_reset_postdata();

    die();
}

/*
*       Business Directory Main page
*/

add_action('wp_ajax_nopriv_qcity_business_load_more', 'qcity_business_load_more');
add_action('wp_ajax_qcity_business_load_more', 'qcity_business_load_more');

function qcity_business_load_more(){
    $paged = $_POST['page'] + 1;

    $query = new WP_Query( array(        
        'post_type'         => 'business_listing',
        'post_status'       => 'publish',
        'paged'             => $paged,
        //'posts_per_page'    => 6,
    ));

    if( $query->have_posts() ):
        echo '<section class="sponsored">';
        while ( $query->have_posts()): $query->the_post(); 

            get_template_part( 'template-parts/business-block' );

        endwhile;
        echo '</section>';
    else:    

        echo 0;

    endif;

    wp_reset_postdata();

    die();

}

/*
*   Business Diretory Load More footer
*/

add_action('wp_ajax_nopriv_qcity_business_directory_load_more', 'qcity_business_directory_load_more');
add_action('wp_ajax_qcity_business_directory_load_more', 'qcity_business_directory_load_more');

function qcity_business_directory_load_more()
{
    $paged = $_POST['page'] + 1;

    $query = new WP_Query( array(        
        'post_type'         => 'business_listing',
        'post_status'       => 'publish',
        'paged'             => $paged,
        'posts_per_page'    => 6,
    ));

    if( $query->have_posts() ):

        while ( $query->have_posts()): $query->the_post(); $i++; 
            
            if( $i == 2 ) {
                $cl = 'even';
                $i = 0;
            } else {
                $cl = 'odd';
            }

            $phone      = get_field('phone');
            $website    = get_field('website');

            echo '<tr class="row ' . $cl.'">
                        <td>'. get_the_title() .'</td>';
                   echo '<td>'. $phone .'</td>';
                   echo '<td>
                            <a href="'. $website.'" target="_blank">View Website</a>
                        </td>
                    </tr>';

        endwhile;

    else:    

        echo 0;

    endif;

    wp_reset_postdata();

    die();
}

/*
*   Sidebar Load More
*/

add_action('wp_ajax_nopriv_qcity_sidebar_load_more', 'qcity_sidebar_load_more');
add_action('wp_ajax_qcity_sidebar_load_more', 'qcity_sidebar_load_more');

function qcity_sidebar_load_more()
{
    $paged      = $_POST['page'] + 1;
    $qp         = $_POST['qp'];
    $post_id    = $_POST['postid'];

    if( $qp == 'entertainment' ){
        $args = array(     
                'category_name'     => 'Entertainment',        
                'post_type'         => 'post',        
                'post__not_in'      => array( $post_id ),
                'post_status'       => 'publish',
                'posts_per_page'    => 5,    
                'paged'             => $paged          
            );
    } elseif ( $qp == 'black-business' ){

        $args = array(     
                    'category_name'     => 'black-business',        
                    'post_type'         => 'post',        
                    'post__not_in'      => array( $post_id ),
                    'post_status'       => 'publish',
                    'posts_per_page'    => 5,    
                    'paged'             => $paged          
                );

    } else {
        $args = array(
            'post_type'         => $qp,
            'posts_per_page'    => 6,
            'post_status'       => 'publish',
            'paged'             => $paged   
        );
    }

    $query = new WP_Query( $args );

    if( $query->have_posts() ):

        while( $query->have_posts() ): $query->the_post();

            if( $qp == 'black-business' ){
                get_template_part( 'template-parts/sidebar-black-biz-block');
            } else {
                get_template_part( 'template-parts/sidebar-block');
            }

            

        endwhile;

    else:

        echo 0;

    endif;
    wp_reset_postdata();

    die();
}


/*
*   Search for Church
*/

add_action('wp_ajax_nopriv_qcity_church_search', 'qcity_church_search');
add_action('wp_ajax_qcity_church_search', 'qcity_church_search');

function qcity_church_search()
{
    $value  = sanitize_text_field($_GET['search_keyword']);
    $type   = sanitize_text_field($_GET['post_type']);

    if( empty($value) ){
        return;
    }

    $args = array(
        'post_type'         => $type, 
        'post_status'       => 'publish',
        'order'             => 'ASC',
        'orderby'           => 'title',
        'posts_per_page'    => -1,
        's'                 => $value        
    );

    $query = new WP_Query($args);

    $churchlist     = array();
    $search_result  = '';

    if( $query->have_posts() ):
        if( $type == 'church_listing' ){
            echo '<section class="church-list">';
        } elseif( $type == 'event' ){
            echo '<section class="events" style="margin-bottom: 30px">';
        } elseif( $type == 'business_listing' ){
            echo '<section class="sponsored">';
        } elseif( $type == 'job' ){
            echo '<div class="jobs-page">
                        <div class="biz-job-wrap">';
        }
        
        while( $query->have_posts() ): $query->the_post();

            switch ($type) {
                case "church_listing":
                    include(locate_template('template-parts/church.php')) ;
                    break;
                case "event":
                    include( locate_template('template-parts/sponsored-block.php') );
                    break;
                case "business_listing":
                    get_template_part( 'template-parts/business-block' );
                    break;
                case "job":
                    include(locate_template('template-parts/jobs-block.php')) ;
                    break;    
                default:
                    get_template_part( 'template-parts/story-block');
            }

        endwhile;
        pagi_posts_nav();

        if( $type == 'job' ){
            echo '</div></div>';
        } else {
            echo '</section>';  
        }
            

    else:

        echo 0;

    endif;

    wp_reset_postdata();

    die();

    
}





/*
*   Counter of Main Menu for Jobs and Events
*/

function get_category_counter( $category ){  
    
    if( $category == 'event' ) {

        $today = date('Ymd');
        $args = array(
                'post_type'   => $category,
                'post_status' => 'publish',
                'meta_query' => array(
                        array(
                            'key'       => 'event_date',
                            'compare'   => '>=',
                            'value'     => $today,
                        ),
                ),
        ); 

        $loop = new WP_Query( $args );        

        $total = $loop->found_posts;
   

    } else {

        $count      = wp_count_posts( $category );
        $total      = $count->publish;

    }

   return $total;
}

/*
*   Checking the post have sponsor
*/

function posts_have_sponsors($post_id, $sponsor_id)
{
    $next_id        = 0;
    $post_arr       = array();
    $sponsor_arr    = array();

    $args = array(     
        'category_name'     => 'Offers & Invites',        
        'post_type'         => 'post',        
        'post__not_in'      => array( $post_id ),
        'post_status'       => 'publish',
        'posts_per_page'    => 1,
        'meta_query'        => array(
                                array(
                                    'key' => 'sponsors', 
                                    'value' => '"' . $sponsor_id . '"', 
                                    'compare' => 'LIKE'
                                )
                            )
    );

    $posts_array = get_posts( $args );

    return ($posts_array) ? $posts_array[0] : 0;
    
}


/*
*   Getting All Categories
*/

function get_business_category_items(){
    //$args = array('number' => '-1',);
    $terms = get_terms('business_category');
   //asort($terms);
    $name = array_column($terms, 'name');

    array_multisort($name, SORT_ASC, $terms);
    return $terms;
}

function get_sponsor_paid(){
        $args = array(     
            'category_name'     => 'Offers & Invites',        
            'post_type'         => 'post',        
            'post_status'       => 'publish',
            'posts_per_page'    => 1,
            'orderby'           => 'rand', 
        );

        $wp_query = new WP_Query($args);

        return $wp_query;
}


add_filter( 'get_the_archive_title', function ($title) {    
    if ( is_category() ) {    
            $title = single_cat_title( '', false );    
        } elseif ( is_tag() ) {    
            $title = single_tag_title( '', false );    
        } elseif ( is_author() ) {    
            $title = '<span class="vcard">' . get_the_author() . '</span>' ;    
        } elseif ( is_tax() ) { //for custom post types
            $title = sprintf( __( '%1$s' ), single_term_title( '', false ) );
        }    
    return $title;    
});


function qcity_get_terms($postID, $term){

    $terms_list = wp_get_post_terms($postID, $term);
    $output = '';

    $i = 0;
    foreach( $terms_list as $term){ 
        $i++;
        if( $i == 1){
            $output .= '<a href="'. get_term_link($term) .'">'. $term->name .'</a>';
        }
        //$output .= '<a href="'. get_term_link($term) .'">'. $term->name .'</a>';
    }

    return $output;

}