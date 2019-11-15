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
        //'post__not_in'  => $postIDs
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
*   Counter of Main Menu for Jobs and Events
*/

function get_category_counter($category){   
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

