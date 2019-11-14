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

function get_category_counter($category){   
    $count      = wp_count_posts( $category );
    $total      = $count->publish;
   return $total;
}

