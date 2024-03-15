<?php
/**  
 * no banner
 * breadcrumb.php
 * Template Name: Breadcrumb Template
 **/

    get_header();
    get_template_part( 'template-parts/breadcrumb/part','breadcrumb' );

  ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class(['page-full-width-content','er-binduz-breadcrumb-tmp']);?> role="main">
        <div class="page-content">
            <?php while ( have_posts() ) : the_post(); ?>
                <?php the_content(); ?>
            <?php endwhile; ?>
        </div>
    </div>
  <?php 
  get_footer();

