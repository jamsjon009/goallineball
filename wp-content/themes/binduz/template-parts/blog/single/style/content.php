


    <div class="binduz-er-content">
        <?php binduz_post_meta(); ?>
        <h3 class="title binduz-er-title"> <?php echo get_the_title(); ?></h3>
        <?php binduz_post_footer_meta() ?>
    </div>
    <div class="row">
        <?php $share =  binduz_social_share(); ?>
        <div class="col-lg-<?php echo esc_attr($share?'10':'12'); ?>">
            <div class="binduz-er-blog-details-box">
                <?php the_content(); ?>
               <?php get_template_part( 'template-parts/blog/post-parts/part','tags' );  ?>
                <div class="qs__blog__posts__navigation">
                 <?php binduz_post_nav(); ?>
                </div>
            </div>
        </div>
    </div>
