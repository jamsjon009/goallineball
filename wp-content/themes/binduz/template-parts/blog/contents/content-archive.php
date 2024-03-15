<?php

/**
 * content.php
 *
 * The default template for displaying content.
 */

  $blog_column = binduz_option('blog_column','col-lg-12 col-md-6 col-sm-12');

  if(is_category()){

    $override = binduz_term_option(get_queried_object_id(),'override_default','no');

    if( $override == 'yes' ){
        $blog_column = binduz_term_option(get_queried_object_id(),'blog_column','style1');
    }
      
  }

?>  
    <?php

      echo '<div class="row">';

          if ( have_posts() ) :

            /* Start the Loop */
            while ( have_posts() ) :
              the_post();

              /*
              * Include the Post-Type-specific template for the content.
              * If you want to override this in a child theme, then include a file
              * called content-___.php (where ___ is the Post Type name) and that will be used instead.
              */
              echo '<div class="'.$blog_column.'">';
                get_template_part( 'template-parts/blog/contents/content','layout');
              echo "</div>";
            endwhile;

          else :

            get_template_part( 'template-parts/blog/contents/content', 'none' );

          endif;
          
      echo "</div>";

    ?>