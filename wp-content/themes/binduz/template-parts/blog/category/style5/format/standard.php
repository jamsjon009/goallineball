
<?php 

  $blog_image_size = binduz_option('blog_image_size','thumbnail');

  if( is_category() ){

        $override = binduz_term_option(get_queried_object_id(),'override_default','no');
        if( $override == 'yes' ){
            $blog_image_size = binduz_term_option(get_queried_object_id(),'blog_image_size','style1');
        }
      
   }
   
?>
<div class="binduz-er-news-viewed-most">
    <?php if( has_post_thumbnail() ): ?>
        <div class="binduz-er-thumb">
            <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_id(), $blog_image_size)); ?>" alt="<?php the_title_attribute(); ?>">
        </div>
    <?php endif; ?>
    <div class="binduz-er-content">
        <div class="binduz-er-meta-item">
            <?php binduz_random_category_retrip(); ?>
            <div class="binduz-er-meta-date">
                <span><i class="fal fa-calendar-alt"></i> <?php echo esc_html(get_the_date( get_option('date_format') )); ?> </span>
            </div>
        </div>
        <h4 class="binduz-er-title"><a href="<?php echo esc_url(get_the_permalink()); ?>"> <?php echo esc_html(wp_trim_words( get_the_title(), apply_filters( 'binduz_blog_crop_title', 12 ),'' )); ?> </a></h4>
        <div class="binduz-er-meta-author">
            <?php echo get_avatar( get_the_author_meta( 'ID' ), 40 ) ?>
            <span><?php echo esc_html__('By','binduz'); ?> <span><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" > <?php echo esc_html(get_the_author()); ?> </a></span></span>
        </div>
    </div>
</div>