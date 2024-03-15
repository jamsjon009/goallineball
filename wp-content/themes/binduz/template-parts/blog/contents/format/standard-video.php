<?php

 $url = binduz_meta_option(get_the_id(),'featured_video');
		
?>
<div class="binduz-er-author-item binduz-video-post mb-40">
    <?php if( has_post_thumbnail() ): ?>
        <div class="binduz-er-thumb">
            <?php 
              
                if ( !empty( $url ) ) {	
     		        echo '<div class="post-media">'.wp_oembed_get( $url ).'</div>';
     	        }

            ?>
            <?php if ( empty( $url ) ) {	 ?>
                <img src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" alt="<?php the_title_attribute(); ?>">
            <?php } ?>

        </div>
    <?php endif; ?>
    <div class="binduz-er-content">
        <?php binduz_post_meta(); ?>
        <?php if( get_the_title() ) : ?>
           <h3 class="binduz-er-title"><a href="<?php echo esc_url(get_the_permalink()); ?>"> <?php echo esc_html(wp_trim_words( get_the_title(), apply_filters( 'binduz_blog_crop_title', 12 ),'' )); ?> </a></h3>
        <?php endif; ?>
        <?php if ( get_the_content() ): ?>
            <div class="binduz-er-post-content"><?php binduz_excerpt(); ?></div>
        <?php endif; ?>
        <?php binduz_post_footer_meta(); ?>
    </div>
</div>