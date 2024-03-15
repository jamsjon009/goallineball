 
<?php

    $paged       = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $post_count  = $wp_query->post_count;
    $found_posts = $wp_query->found_posts;

 ?>
<?php if ( $wp_query->max_num_pages > 1 ) : ?>
    <div class="flex center binduz_blog_loadmore">
        <div data-foundposts="<?php echo esc_attr( $found_posts ) ?>" data-page="<?php echo esc_attr($paged); ?>" class="load-more binduz_loadmore">
            <span> <?php echo esc_attr__( 'Load More Articles','binduz'); ?> </span>
        </div>
    </div>
<?php endif; ?>

