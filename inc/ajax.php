<?php

/*
*   QCity
*/

add_action('wp_ajax_nopriv_qcity_load_more', 'qcity_load_more');
add_action('wp_ajax_qcity_load_more', 'qcity_load_more');

function qcity_load_more(){

    $paged = $_POST['page'] + 1;

    $query = new WP_Query( array(
        'post_type'     => 'post',
        'post_status'   => 'publish',
        'paged'         => $paged,
        'post__not_in'  => $postIDs
    ));    
   
    if( $query->have_posts() ):

        while( $query->have_posts() ): $query->the_post();

            include( locate_template('template-parts/story-block.php', false, false) );            

        endwhile;

    else:    

        echo 0;

    endif;

    wp_reset_postdata();

    die();
}

/*
*   AJAX Call for Events Load more
*/

add_action('wp_ajax_nopriv_qcity_events_load_more', 'qcity_events_load_more');
add_action('wp_ajax_qcity_events_load_more', 'qcity_events_load_more');

function qcity_events_load_more(){

    $paged = $_POST['page'] + 1;
    $today = date('Ymd');

    $query = new WP_Query( array(
        'post_type'     => 'event',
        'post_status'   => 'publish',
        'paged'         => $paged,
        //'post__not_in'  => $postIDs
        'meta_query' => array(
                            array(
                                'key'       => 'event_date',
                                'compare'   => '>=',
                                'value'     => $today,
                            ),
        ),
        /*'tax_query' => array(
            array(
                'taxonomy' => 'event_category', // your custom taxonomy
                'field' => 'slug',
                'terms' => array( 'standard' ) // the terms (categories) you created
            )
        )*/
    ));    
   
    if( $query->have_posts() ):
        echo '<section class="sponsored">';
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
*   Counter of Main Menu for Jobs and Events
*/

function get_category_counter($category){  
    /*$args = array(
                'post_type' => $category,
                'post_status' => 'publish'
    ); 

    $loop = new WP_Query( $args );*/
   

    $count      = wp_count_posts( $category );
    $total      = $count->publish;
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

