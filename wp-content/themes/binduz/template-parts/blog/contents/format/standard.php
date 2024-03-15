
<div class="binduz-er-author-item mb-40">
    <?php if( has_post_thumbnail() ): ?>
        <div class="binduz-er-thumb">
           
            <img src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" alt="<?php the_title_attribute(); ?>">
        </div>
    <?php endif; ?>
    <div class="binduz-er-content">
        <?php binduz_post_meta(); ?>
        <?php if( get_the_title() ) : ?>
           <h3 class="binduz-er-title"><a href="<?php echo esc_url(get_the_permalink()); ?>"> <?php echo esc_html(wp_trim_words( get_the_title(), apply_filters( 'binduz_blog_crop_title', 12 ),'' )); ?> </a></h3>
        <?php endif; ?>
        <?php if ( get_the_content() ): ?>
            <div class="binduz-er-post-content"><?php binduz_excerpt();?></div>
        <?php endif; ?>
        <?php binduz_post_footer_meta(); ?>
    </div>
</div>