


    <div class="binduz-er-content er-post-style1">
        <?php binduz_post_meta(); ?>
            <h3 class="title binduz-er-title"> <?php echo get_the_title(); ?></h3>
        <?php binduz_post_footer_meta() ?>
    </div>
    <div class="row binduz__post__content__warp">
        <?php $share =  binduz_social_share(); ?>
        <div class="col-lg-<?php echo esc_attr($share?'10':'12'); ?>">
                <?php if( get_the_content() ) : ?>
                    <div class="binduz-er-blog-details-box">
                        <?php the_content(); ?>
                        <?php binduz_link_pages(); ?>
                    </div>
                <?php endif; ?>
                <?php get_template_part( 'template-parts/blog/post-parts/part','tags' );  ?>
                <?php binduz_post_nav(); ?>
                <?php 
                    get_template_part( 'template-parts/blog/post-parts/part','mailchimp' );
                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;
                ?>
        </div>
    </div>
