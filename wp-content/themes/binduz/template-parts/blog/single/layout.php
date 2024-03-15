<?php

    $override    = binduz_meta_option(get_the_id(),'override_default_layout','no');
    $post_layout = binduz_option('post_header_layout','style2');
    // override layout
    
    if($override == 'yes'){  
        $post_layout = binduz_meta_option(get_the_id(),'post_header_layout','style1');
    }
    
  
    get_template_part( 'template-parts/blog/single/content', $post_layout );