<?php

/*
*   QCity
*/

add_action('wp_ajax_nopriv_qcity_load_more', 'qcity_load_more');
add_action('wp_ajax_qcity_load_more', 'qcity_load_more');

function qcity_load_more(){


    $paged = $_POST['page'] + 1;

   
    $query = new WP_Query();
    $query->query( array(
        'post_type'     => 'post',
        'post_status'   => 'publish',
        'paged'         => $paged,
        'post__not_in'  => $postIDs
    ) );

    if( $query->has_posts() ):

        while( $query->has_posts() ): $query->the_post();

            //include( locate_template('template-parts/story-block.php', false, false) );
            get_template_part( 'template-parts/story-block');

        endwhile;

    else:    

        echo 0;

    endif;

    wp_reset_postdata();

    die();
}

function get_category_counter($category){
    //$cat_ID     = get_cat_ID( $_POST['category'] );
   // $cat_ID     = get_cat_ID( 'Job' );
    //$category   = get_category($cat_ID);
    $count      = wp_count_posts( $category );
    $total      = $count->publish;
   return $total;
    //echo var_dump($count);

}

