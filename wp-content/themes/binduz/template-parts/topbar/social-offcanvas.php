<?php

    $binduz_social_links = binduz_option('general_social_links',[]);
    $icon_type = binduz_option('offcanvas_social_icon_type','no');
    
    if( !is_array($binduz_social_links) ){
      return;
    }

    if(count($binduz_social_links)<=0){
      return;
    }

?>

    <ul class="text-center">
        <?php foreach($binduz_social_links as $social): ?>
            <li>
                <a href="<?php echo esc_url($social['url']); ?>">
                  <?php if($icon_type == 'yes' && isset($social['icon_class'])): ?>
                    <i class="<?php  echo esc_attr($social['icon_class']) ?>"></i>
                
                  <?php else: ?>
                    <?php echo esc_html($social['title']); ?>
                    <?php endif; ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
