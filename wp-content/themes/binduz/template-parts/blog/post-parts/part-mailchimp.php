   
<?php

  if( binduz_option('blog_single_mailchimp','no') != 'yes' ){
      return;
  }

  $top_title          = binduz_option('blog_mailchimp_top_title','newsletter');
  $_title             = binduz_option('blog_mailchimp_title','newsletter');
  $default_icon       = BINDUZ_IMG.'/icon/icon-4.png';
  $mailchimp_icon     = binduz_option('blog_mailchimp_img');
  
  if(shortcode_exists('mc4wp_form')){
    $mailchimp_shortcode = get_option('mc4wp_default_form_id','');
  }

  if(isset($mailchimp_icon['url']) && $mailchimp_icon['url'] !=''){
    $default_icon  = $mailchimp_icon['url'];  
  }


?>

<div class="binduz-er-blog-post-newsletter">
    <div class="binduz-er-populer-news-sidebar-newsletter author-page-newsletter mt-40">
        <div class="binduz-er-newsletter-box text-center">
            <img src="<?php echo esc_url($default_icon); ?>" alt="<?php echo esc_attr__('Mail Icon','binduz') ?>">
            <?php if($top_title !=''): ?>
                <p><?php echo esc_html($top_title); ?></p>
            <?php endif; ?>
            <?php if($_title !=''): ?>
                <h3 class="binduz-er-title"><?php echo esc_html($_title); ?></h3>
            <?php endif; ?>
            <div class="binduz-er-input-box">
                <?php echo do_shortcode( "[mc4wp_form id=$mailchimp_shortcode]" ); ?>  
            </div>
        </div>
    </div>
</div>