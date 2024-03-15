

    <?php if ( has_post_thumbnail() && !post_password_required() ) : ?>
        <div class="binduz-er-thumb">
            <img src="<?php echo esc_url(get_the_post_thumbnail_url(null,'full')); ?>" alt=" <?php the_title_attribute(); ?>">
        </div>
    <?php endif; ?>
    <div class="bindus__post__details__content">
        <div class="binduz-er-content">
            <?php binduz_post_meta(); ?>
            <?php if( get_the_title() ) : ?>
            <h3 class="binduz-er-title"> <?php echo get_the_title(); ?></h3>
            <?php endif; ?>
            <?php binduz_post_footer_meta() ?>
        </div>
        <?php if( get_the_content() ) : ?>
        <div class="binduz-er-blog-details-box">
            <?php the_content(); ?>
            <?php binduz_link_pages(); ?>
        </div>
        <?php endif; ?>
        <?php get_template_part( 'template-parts/blog/post-parts/part','tags' );  ?>
        <?php binduz_post_nav(); ?>
        <?php 
            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;
        ?>
        <?php get_template_part( 'template-parts/blog/post-parts/part','related' );  ?>
    </div>
      
