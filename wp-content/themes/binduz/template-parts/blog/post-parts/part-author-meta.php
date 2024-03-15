<?php

    $author_image = binduz_option( 'blog_single_author_image','no');
    $author       = binduz_option('blog_single_author','yes');

?>

<?php if($author =='yes'): ?>

    <div class="single__post__author__meta <?php echo esc_attr($author_image=='no'?'p-0':''); ?>">

        <?php if($author =='yes' && $author_image == 'yes' ):?>

            <div class="author_img">
                <div class="author_img_wrap post__author">
                    <?php
                    echo get_avatar( get_the_author_meta( 'ID' ), 55 );
                    ?>
                </div>
            </div>

        <?php endif; ?>

            <div class="author__data">
                <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>">
                    <?php if($author_image == 'no'): ?>
                    <i class="fas fa-user"></i>
                    <?php endif; ?>
                    <?php echo esc_html(get_the_author_meta( 'display_name' )); ?>
                </a>
                <span><?php echo date_i18n(get_option('date_format')); ?></span>
            </div>

    </div>

<?php endif; ?>