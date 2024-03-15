<?php if($settings['show_post_meta'] == 'yes'): ?>
 
  <?php if($settings['show_date'] =='yes'): ?>    
    
        <div class="binduz-er-meta-date">
            <span>
                <?php if($settings['meta_date_icon']['library'] !=''): ?>
                  <?php \Elementor\Icons_Manager::render_icon( $settings['meta_date_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                <?php else: ?>
                  <?php \Elementor\Icons_Manager::render_icon( $settings['meta_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                <?php endif; ?>
            <?php echo esc_html(get_the_date( get_option('date_format'),$post->ID )); ?></span>
        </div>
  
  <?php endif; ?>
<?php endif; ?>