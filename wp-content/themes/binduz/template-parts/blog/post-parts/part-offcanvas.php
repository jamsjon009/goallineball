<?php

    $offcanvas_logo      = binduz_option('general_offcanvas_logo');
    $contact_info        = binduz_option('general_offcanvas_contact_info');
    $offcanvas_logo_url  = binduz_src( 'general_offcanvas_logo', BINDUZ_IMG . '/logo-6.png' );
    
?>

    <!--====== OFFCANVAS MENU PART START ======-->

    <div class="binduz-er-news-off_canvars_overlay"></div>
    <div class="binduz-er-news-offcanvas_menu">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="binduz-er-news-offcanvas_menu_wrapper">
                        <div class="binduz-er-news-canvas_close">
                            <a href="javascript:void(0)"><i class="fal fa-times"></i></a>
                        </div>
                       
                        <?php get_template_part( 'template-parts/topbar/social','offcanvas');  ?>
                        
                        <div class="binduz-er-news-logo mb-30 mt-30">
                            <?php echo  binduz_text_logo()?'<h1 class="logo-title">':''; ?> 
                                <a href="<?php echo esc_url(home_url('/')); ?>">
                                    <?php if(binduz_text_logo()): ?> 
                                    <?php echo esc_html(binduz_text_logo()); ?>
                                    <?php else: ?>
                                        <img  class="img-fluid" src="<?php echo esc_url($offcanvas_logo_url); ?>" alt="<?php echo get_bloginfo('name') ?>">
                                    <?php endif; ?>
                                </a>
                            <?php echo binduz_text_logo()?'</h1>':''; ?>
                        </div>
                        <div class="text-left">
                             <?php get_template_part( 'template-parts/navigations/nav', 'offcanvas' ); ?>
                        </div>
                        <div class="binduz-er-news-offcanvas_footer">
                           
                             <?php if(binduz_option('general_about_site') !=''): ?>
                                <?php echo wpautop( binduz_option('general_about_site') ); ?>
                             <?php endif; ?>
                             <?php if(is_array($contact_info)): ?>
                                <ul>
                                    <?php foreach($contact_info as $item): ?>
                                        <li>
                                            <i class="<?php  echo esc_attr($item['icon_class']) ?>"></i> 
                                            <?php if($item['type'] =='phone'): ?>
                                                <a href="tel:<?php echo esc_attr( str_replace([' ','-'],[''],$item['title'])); ?>" >
                                                    <?php echo esc_html($item['title']) ?> 
                                                </a>
                                            <?php elseif($item['type'] =='email'): ?>
                                                <a href="mailto:<?php echo esc_attr( $item['title']); ?>" >
                                                      <?php echo esc_html($item['title']) ?> 
                                                </a>
                                            <?php else: ?>  
                                                <?php echo esc_html($item['title']) ?> 
                                            <?php endif; ?>  
                                         </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== OFFCANVAS MENU PART ENDS ======-->