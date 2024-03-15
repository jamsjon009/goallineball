<?php if( $settings['show_social_share'] =='yes' ): ?>
    <div class="binduz-er-news-share">
        <a href="<?php the_permalink() ?>" data-social="facebook">
            <?php if($settings['meta_share_icon']['library'] !=''): ?>
                <?php \Elementor\Icons_Manager::render_icon( $settings['meta_share_icon'], [ 'aria-hidden' => 'true' ] ); ?>
            <?php else: ?>
                <?php \Elementor\Icons_Manager::render_icon( $settings['meta_icon'], [ 'aria-hidden' => 'true' ] ); ?>
            <?php endif; ?>
        </a>
    </div>
<?php endif; ?>