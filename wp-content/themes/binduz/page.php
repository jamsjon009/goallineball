<?php
/**
 * The template for displaying all pages
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package 
 */

    get_header();
    $blog_sidebar = binduz_option('blog_sidebar',3);
    $column       = ($blog_sidebar == 1 || !is_active_sidebar('sidebar-1')) ? 'col-lg-12' : 'col-lg-8';

?>
    <main id="qs__blog__main__container" class="qs__blog__main__container qs__single__page"> <!-- Main Container Start -->
        <div class="qs__blog__inner__container"> <!-- Inner Container Start -->
            <div class="container qs__blog__container"> <!-- Inner Blog Container Start -->
                <div class="row"> <!-- Main Row Start -->
                    <?php
                        if($blog_sidebar == 2):
                            get_sidebar();
                        endif;
                    ?>
                    <div class="<?php echo esc_attr($column); ?>"> <!-- Content Column Start -->
                        <div class="qs__page__content">
                            <?php
                                while ( have_posts() ) :
                                    
                                    the_post();

                                    get_template_part( 'template-parts/blog/contents/content', 'page' );

                                    // If comments are open or we have at least one comment, load up the comment template.
                                    if ( comments_open() || get_comments_number() ) :
                                        comments_template();
                                    endif;

                                endwhile; // End of the loop.
                            ?>
                        </div>
                    </div> <!-- Content Column End -->
                    <?php
                        if($blog_sidebar == 3):
                            get_sidebar();
                        endif;
                    ?>
                </div> <!-- Main Row End -->
            </div> <!-- Inner Blog Container End -->
        </div> <!-- Inner Container End -->
    </main> <!-- Main Container End -->
<?php
get_footer();