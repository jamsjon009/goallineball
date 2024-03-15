 
    <?php 

        $blog_sidebar = binduz_option('post_sidebar_layout',3);
        $override     = binduz_meta_option(get_the_id(),'override_default_layout','no');
        $banner_image = '';
        // override sidebar layout

        if($override == 'yes'){  
            $blog_sidebar = binduz_meta_option(get_the_id(),'post_sidebar_layout',1);
        }

        $column = ($blog_sidebar == 1 || !is_active_sidebar('sidebar-1')) ? 'col-lg-12 mx-auto' : 'col-lg-9';

        $_blog_image = wp_get_attachment_url( get_post_thumbnail_id(get_the_id()) );
 

    ?>
        <?php get_template_part( 'template-parts/breadcrumb/part','breadcrumb2' );  ?>
        <section class="binduz-er-author-item-area pb-20">
            <div class="container qs__blog__container">
                <div class="row"> <!-- Main Row Start -->
                    
                    <!-- Widget Column start -->
                    <?php
                        if($blog_sidebar == 2):
                            get_sidebar('single');
                        endif;
                    ?>
                    <!-- Widget Column End -->
                    <div class="<?php echo esc_attr($column); ?> qs__blog__post"> <!-- Content Column Start -->
                        <div class="qs__post__details">
                            <?php
                                while ( have_posts() ) :

                                    the_post();
                            
                                    ?>

                                    <article id="post-<?php the_ID(); ?>" <?php post_class(["binduz-er-author-item","post-single",'mb-40']); ?>>
                                        <?php
                                            get_template_part( 'template-parts/blog/single/style/content','style2' ); 
                                        ?>
                                    </article> 
                                
                                    <?php

                                endwhile; // End of the loop.
                            ?>
                        </div>						
                    </div> <!-- Content Column End -->

                    <!-- Widget Column start -->
                    <?php
                        if($blog_sidebar == 3):
                            get_sidebar('single');
                        endif;
                    ?>
                    <!-- Widget Column End -->

                </div> <!-- Main Row End -->
            </div>
        </section>
        <?php binduz_set_postview(); ?>