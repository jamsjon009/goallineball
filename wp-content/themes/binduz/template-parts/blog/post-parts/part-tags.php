<?php 

   $binduz_tag_list = get_the_tags( get_the_id() );
   
   if( !is_array($binduz_tag_list) ){
      return;  
   }

?>

<div class="binduz-er-social-share-tag d-block d-sm-flex justify-content-between align-items-center">
      <div class="binduz-er-tag">
         <ul>
            <?php foreach($binduz_tag_list as $tag): ?>
               <li><a href="<?php echo esc_url(get_tag_link($tag)); ?>"> <?php echo esc_html($tag->name); ?></a></li>
            <?php endforeach; ?>   
         </ul>
      </div>
      <?php binduz_social_share_style2(); ?>
</div>
   