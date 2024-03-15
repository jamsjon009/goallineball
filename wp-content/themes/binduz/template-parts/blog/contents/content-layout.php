<?php
/**
 * content-layout.php
 *
 * The default template for displaying content.
 */

   $blog_layout  = binduz_option('blog_style','style1');
  
   if(is_category()){

        $override = binduz_term_option(get_queried_object_id(),'override_default','no');
        if($override == 'yes'){
            $blog_layout = binduz_term_option(get_queried_object_id(),'blog_style','style1');
        }
          
   }
  
?>
  <?php if($blog_layout != 'style1'): ?> 
        <?php if($blog_layout == 'style2'): ?>
            <article <?php post_class(['post','binduz-cat-post','binduz-category-style2']);?>>
               <?php get_template_part( 'template-parts/blog/category/style2/format/standard', get_post_format( ) );  ?>
            </article>
         <?php elseif($blog_layout == 'style3') : ?>
            <article <?php post_class(['post','binduz-cat-post','binduz-category-style3']);?>>
               <?php get_template_part( 'template-parts/blog/category/style3/format/standard', get_post_format( ) );  ?>
            </article>
        <?php elseif($blog_layout == 'style4') : ?>
            <article <?php post_class(['post','binduz-cat-post','binduz-category-style4']);?>>
               <?php get_template_part( 'template-parts/blog/category/style4/format/standard', get_post_format( ) );  ?>
            </article>   
        <?php elseif($blog_layout == 'style5') : ?>
            <article <?php post_class(['post','binduz-cat-post','binduz-category-style5']);?>>
               <?php get_template_part( 'template-parts/blog/category/style5/format/standard', get_post_format( ) );  ?>
            </article> 
        <?php elseif($blog_layout == 'style6') : ?>
            <article <?php post_class(['post','binduz-cat-post','binduz-category-style6']);?>>
               <?php get_template_part( 'template-parts/blog/category/style6/format/standard', get_post_format( ) );  ?>
            </article>      
         <?php else: ?>
            <article <?php post_class(['post','binduz-cat-post']);?>>
               <?php get_template_part( 'template-parts/blog/contents/format/standard', get_post_format( ) );  ?>
            </article>
      <?php endif; ?>
 <?php else: ?>
      <article <?php post_class(['post','binduz-post', 'binduz-category-style1']);?>>
         <?php get_template_part( 'template-parts/blog/contents/format/standard', get_post_format( ) );  ?>
      </article>
 <?php endif; ?>
     