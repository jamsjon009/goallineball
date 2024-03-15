<?php $audio_link = binduz_meta_option( get_the_ID(), 'featured_audio' );?>
<div class="binduz-er-latest-news-item">
    <?php if ( $audio_link != '' ): ?>
        <div class="binduz-er-thumb">
            <?php echo wp_oembed_get( $audio_link ); ?>
        </div>
    <?php endif; ?>
    <div class="binduz-er-content">
        <?php binduz_random_category_retrip(); ?>
        <h5 class="binduz-er-title"><a href="<?php echo esc_url(get_the_permalink()); ?>"> <?php echo esc_html(wp_trim_words( get_the_title(), apply_filters( 'binduz_blog_crop_title', 12 ),'' )); ?></a></h5>
        <div class="binduz-er-meta-item">
            <div class="binduz-er-meta-author">
            <span><?php echo esc_html__('By','binduz'); ?> <span><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" > <?php echo esc_html(get_the_author()); ?> </a></span></span>
            </div>
            <div class="binduz-er-meta-date">
            <span><i class="fal fa-calendar-alt"></i> <?php echo esc_html(get_the_date( get_option('date_format') )); ?> </span>
            </div>
        </div>
    </div>
</div>