<?php

    $binduz_social_links = binduz_option('general_social_links',[]);

    if( !is_array($binduz_social_links) ){
      return;
    }

    if(count($binduz_social_links)<=0){
      return;
    }
    

?>



        <div class="binduz-er-news-social">
            <ul>
               <?php foreach($binduz_social_links as $social): ?>
                    <li>
                      <a href="<?php echo esc_url($social['url']); ?>">
                        <i class="<?php echo esc_attr($social['icon_class']); ?>"></i>
                      </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
       