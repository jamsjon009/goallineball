<?php

/**
 * author.php
 *
 * The default template for displaying content.
 */
 
?>

  <div class="author-post">  
      <article <?php post_class('post');?>>
         <?php get_template_part( 'template-parts/blog/contents/format/standard', get_post_format( ) );  ?>
      </article>
   </div>