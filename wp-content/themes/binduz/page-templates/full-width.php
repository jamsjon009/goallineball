<?php

/**
 * full-wdith.php
 *
 * Template Name: Full Width Template
 * Template Post Type: page, post
 */
   get_header(); 

?>
<div id="post-<?php the_ID(); ?>" <?php post_class('page-full-width-content');?> role="main">
    <div class="page-content">
        <?php while ( have_posts() ) : the_post(); ?>
            <?php the_content(); ?>
        <?php endwhile; ?>
    </div>
</div>
<?php get_footer();