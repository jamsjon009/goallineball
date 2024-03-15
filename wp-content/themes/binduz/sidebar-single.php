<?php

   $sidebar            = '';
   $override           = binduz_meta_option( get_the_id(),'override_default_layout','no' );
   $post_layout        = binduz_option('post_header_layout','style2');

   if(is_singular('post')){  
    
      if($override == 'yes'){  
          $post_layout = binduz_meta_option(get_the_id(),'post_header_layout','style1');
      }
      
   }

   if($post_layout=='style1'){
      
      $sidebar = 'pt-60';
   }
   
?>

<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
         <div class="col-lg-3 qs__blog__sidebar populer-news-sidebar qs__blog__widget">
            <aside class="qs__blog__widget__area <?php echo esc_attr($sidebar); ?>">
               <?php dynamic_sidebar( 'sidebar-1' ); ?>
            </aside>
         </div>
<?php endif; ?>

