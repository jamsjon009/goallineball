<?php if($settings['show_content']): ?>
    <p class="er-binduz-news-content">
        <?php echo esc_html(wp_trim_words( get_the_excerpt(), $settings['post_content_crop'],'' )); ?>
    </p>
<?php endif; ?>