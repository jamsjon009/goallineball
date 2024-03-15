    <?php 
        $featured_video = binduz_meta_option($post->ID,'featured_video');
     ?>
    <?php if( $settings['show_video'] =='yes' && $featured_video !='' ): ?>

        
        <div class="binduz-er-play">
            <a class="binduz-er-video-popup" href="<?php echo esc_url($featured_video); ?>">
                <?php if($settings['meta_video_icon']['library'] !=''): ?>
                    <?php \Elementor\Icons_Manager::render_icon( $settings['meta_video_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                <?php else: ?>
                    <?php \Elementor\Icons_Manager::render_icon( $settings['meta_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                <?php endif; ?>
            </a>
        </div>
    <?php endif; ?>