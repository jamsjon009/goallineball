
<?php $audio_link = binduz_meta_option( get_the_ID(), 'featured_audio' );?>

<div class="binduz-er-author-item mb-40">
    <?php if ( $audio_link != '' ): ?>
    <div class="binduz-er-thumb">
        <?php echo wp_oembed_get( $audio_link ); ?>
    </div>
    <?php endif;?>
    <div class="binduz-er-content">
        <?php binduz_post_meta();?>
        <?php if ( get_the_title() ): ?>
            <h3 class="binduz-er-title"><a href="<?php echo esc_url( get_the_permalink() ); ?>"> <?php echo esc_html(wp_trim_words( get_the_title(), apply_filters( 'binduz_blog_crop_title', 12 ),'' )); ?> </a></h3>
        <?php endif;?>
    </div>
</div>