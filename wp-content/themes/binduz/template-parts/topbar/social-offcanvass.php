<?php

    $binduz_social_links = binduz_option('general_social_links',[]);
    
    if( !is_array($binduz_social_links) ){
      return;
    }
    if(count($binduz_social_links)<=0){
      return;
    }

?>
<div class="binduz-er-news-header-social">
    <ul class="text-center">
        <?php foreach($binduz_social_links as $social): ?>
            <li>
                <a href="<?php echo esc_url($social['url']); ?>">
                  <?php echo esc_html($social['title']); ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
