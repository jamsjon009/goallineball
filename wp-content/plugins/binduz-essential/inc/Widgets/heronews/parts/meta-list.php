<?php
        if($settings['show_post_meta'] == 'yes'): 
            echo '<div class="binduz-er-meta-list">';
                echo '<ul>';  
                    if( function_exists( 'binduz_get_postview' ) && $settings['show_view_count'] =='yes' ):
                            echo '<li><i class="fal fa-eye"></i>'. binduz_get_postview(get_the_id()) .'</li>';
                    endif;
                    if( function_exists('element_ready_get_fb_share_count') && $settings[ 'show_social_share' ] =='yes' ):
                        echo '<li><i class="fal fa-heart"></i>'. element_ready_get_fb_share_count(get_the_ID()) .'</li>';
                    endif;
                    if( $settings['show_comment'] ):
                        echo '<li><i class="fal fa-comments"></i>'. esc_html(get_comments_number(get_the_ID())) .'</li>';
                    endif;
                echo '</ul>';
            echo '</div>';
        endif;

?>