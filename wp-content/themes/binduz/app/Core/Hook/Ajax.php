<?php
/*************************************
/*******  Load More Blog  ********
**************************************/


function binduz_post_ajax_loading_cb()
{  
    
    $settings =  $_REQUEST["settings"];
    
	   $arg = [
            'post_type'        => 'post',
            'post_status'      => 'publish',
            'paged'            => sanitize_text_field($_REQUEST['paged']),
            'suppress_filters' => false,
	    ];
    
    if($settings['type'] == 'tags'){
        // validate data
        $arg['tag__in'] = [ sanitize_text_field($settings['s']) ];
    }

    if($settings['type'] == 'category'){
         // validate data
        $arg['category__in'] = [ sanitize_text_field($settings['s']) ];
    }
 
    $allpostloding = new WP_Query($arg);
    $index = 0;
    global $step;
    $step = 'first';

    while($allpostloding->have_posts()){ $allpostloding->the_post(); 
      
      get_template_part( 'template-parts/blog/contents/content' );   
    
    }

    wp_reset_postdata();
    wp_die();
  
}

add_action( 'wp_ajax_nopriv_binduz_post_ajax_loading', 'binduz_post_ajax_loading_cb' );
add_action( 'wp_ajax_binduz_post_ajax_loading', 'binduz_post_ajax_loading_cb' );





