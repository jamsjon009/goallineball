<?php

   $sidebar            = '';
   $sidebar_box_shadow = binduz_option('sidebar_box_shadow','no');
   $override           = binduz_meta_option( get_the_id(),'override_default_layout','no' );
   
   if($sidebar_box_shadow =='yes'){
      $sidebar = 'box_shadow_sidebar';
   }
   
   if(is_singular('post')){  

      if(binduz_meta_option(get_the_id(),'sidebar_box_shadow','no') == 'yes' ){
         $sidebar = 'box_shadow_sidebar';  
      }else{
         $sidebar = '';  
      }
      
   }
   
?>

<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
         <div class="col-lg-3 qs__blog__sidebar qs__blog__widget">
            <aside class="qs__blog__widget__area <?php echo esc_attr($sidebar); ?>">
               <?php dynamic_sidebar( 'sidebar-1' ); ?>
            </aside>
         </div>
<?php endif; ?>

