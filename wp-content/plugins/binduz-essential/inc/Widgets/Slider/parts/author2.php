<?php if($settings['show_post_meta'] == 'yes'): ?>
      <?php if($settings['show_author'] == 'yes'): ?> 
        <div class="binduz-er-meta-author">
        <?php echo get_avatar( get_the_author_meta( 'ID' ), 40 ) ?>
            <span><?php echo esc_html('By','binduz-essential') ?> <span> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" > <?php echo esc_html(get_the_author()); ?> </a> </span></span>
        </div>
      <?php endif; ?>
<?php endif; ?>

