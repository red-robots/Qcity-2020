<?php

/*
*       Display Business Categories
*/           

    foreach($business_category as $category):  
        if( $category->count > 0 ):
     ?>
        
        <div class="cat">
            <a href="<?php echo get_term_link($category->term_id); ?>">
                <div class="icon">
                    <?php //echo $category['category_icon']; ?>
                </div>
                <h2><?php echo $category->name; ?></h2>
            </a>
        </div>
    <?php 
        endif;
    endforeach;